<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eccube\Session\Storage\Handler;

use Skorp\Dissua\SameSite;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;

/**
 * SameSite=None 互換を提供するセッションハンドラのラッパー.
 *
 * 注意:
 * - もともと StrictSessionHandler を継承していましたが、MemcachedSessionHandler が
 *   SessionUpdateTimestampHandlerInterface を実装している環境ではラップ禁止の例外が発生するため、
 *   本クラスはインターフェース実装＋委譲方式に変更しています。
 * - セッションの実体処理は委譲先($handler)に任せ、本クラスはクッキー属性や destroy 時の
 *   SameSite=None 対応に専念します。
 */
class SameSiteNoneCompatSessionHandler implements \SessionHandlerInterface, \SessionUpdateTimestampHandlerInterface
{
    /** @var \SessionHandlerInterface */
    private $handler;

    /** @var string */
    private $sessionName;

    /** @var bool */
    private $debugMode;

    public function __construct(\SessionHandlerInterface $handler)
    {
        $this->handler = $handler;
        $this->debugMode = (bool) env('APP_DEBUG', false);

        if (!headers_sent()) {
            // 追加: 任意の cookie_domain を環境変数から適用可能に
            $cookieDomainEnv = env('ECCUBE_COOKIE_DOMAIN', '');
            if ($cookieDomainEnv !== '') {
                ini_set('session.cookie_domain', $cookieDomainEnv);
            }

            // 既存の設定（維持）
            ini_set('session.cookie_secure', $this->getCookieSecure());
            ini_set('session.cookie_samesite', $this->getCookieSameSite());
            ini_set('session.cookie_path', $this->getCookiePath());
            ini_set('session.cookie_httponly', '1');

            // 追加: クロスサーバ安定化のための推奨オプション（非破壊）
            ini_set('session.gc_maxlifetime', (string) env('ECCUBE_GC_MAXLIFETIME', '3600'));
            ini_set('session.cookie_lifetime', '0');
            ini_set('session.use_cookies', '1');
            ini_set('session.use_only_cookies', '1');
            ini_set('session.use_strict_mode', '1');

            // セッション名統一（既存の値優先）
            $sessionName = env('ECCUBE_COOKIE_NAME', ini_get('session.name') ?: 'eccube');
            ini_set('session.name', $sessionName);
        }
    }

    /**
     * リクエストに乗ってきたセッションCookie値（もしあれば）を取得（デバッグ用）
     */
    private function getRequestCookieSessionId(): ?string
    {
        $request = Request::createFromGlobals();
        $cookieName = $this->sessionName ?: (ini_get('session.name') ?: 'PHPSESSID');

        return $request->cookies->get($cookieName);
    }

    #[\ReturnTypeWillChange]
    public function open($savePath, $sessionName): bool
    {
        $this->sessionName = $sessionName;

        if ($this->debugMode) {
            $cookieSid = $this->getRequestCookieSessionId();
            error_log(sprintf(
                '[Session][%s] open: name=%s cookieSid=%s phpSessionId(before)=%s',
                gethostname(),
                $sessionName,
                $cookieSid ?? '(none)',
                session_id() ?: '(empty)'
            ));
        }

        $result = $this->handler->open($savePath, $sessionName);

        if (!$result && $this->debugMode) {
            error_log(sprintf('[Session][%s] open: handler open failed', gethostname()));
        }

        return $result;
    }

    public function read(string $sessionId): string
    {
        try {
            $data = $this->handler->read($sessionId);

            if ($this->debugMode) {
                $cookieSid = $this->getRequestCookieSessionId();
                $hasData = ($data !== '');
                error_log(sprintf(
                    '[Session][%s] read: id=%s hasData=%s size=%d cookieSid=%s',
                    gethostname(),
                    $sessionId,
                    $hasData ? 'YES' : 'NO',
                    strlen($data),
                    $cookieSid ?? '(none)'
                ));

                if ($hasData) {
                    $sessionData = @unserialize($data);
                    if (is_array($sessionData)) {
                        $hasCsrfKey = array_key_exists('_csrf', $sessionData) || array_key_exists('_token', $sessionData);
                        error_log(sprintf('[Session][%s] read: hasCsrfKey=%s', gethostname(), $hasCsrfKey ? 'YES' : 'NO'));
                    }
                }
            }

            return $data;
        } catch (\Exception $e) {
            if ($this->debugMode) {
                error_log(sprintf('[Session][%s] read error: id=%s err=%s', gethostname(), $sessionId, $e->getMessage()));
            }

            return '';
        }
    }

    public function write(string $sessionId, string $data): bool
    {
        try {
            $result = $this->handler->write($sessionId, $data);

            if (!$result) {
                error_log(sprintf('[Session][%s] CRITICAL: write failed id=%s', gethostname(), $sessionId));
            }

            return $result;
        } catch (\Exception $e) {
            error_log(sprintf('[Session][%s] write error: id=%s err=%s', gethostname(), $sessionId, $e->getMessage()));

            return false;
        }
    }

    #[\ReturnTypeWillChange]
    public function updateTimestamp($sessionId, $data): bool
    {
        try {
            if ($this->handler instanceof \SessionUpdateTimestampHandlerInterface) {
                $result = $this->handler->updateTimestamp($sessionId, $data);
            } else {
                $result = $this->write($sessionId, $data);
            }

            if ($this->debugMode) {
                error_log(sprintf(
                    '[Session][%s] updateTimestamp: id=%s success=%s',
                    gethostname(),
                    $sessionId,
                    $result ? 'YES' : 'NO'
                ));
            }

            return $result;
        } catch (\Exception $e) {
            error_log(sprintf('[Session][%s] updateTimestamp error: id=%s err=%s', gethostname(), $sessionId, $e->getMessage()));

            return false;
        }
    }

    public function destroy($sessionId): bool
    {
        if ($this->debugMode) {
            error_log(sprintf('[Session][%s] destroy: id=%s', gethostname(), $sessionId));
        }

        if (!headers_sent() && filter_var(ini_get('session.use_cookies'), FILTER_VALIDATE_BOOLEAN)) {
            if (!$this->sessionName) {
                throw new \LogicException(sprintf('Session name cannot be empty, did you forget to call "open()" in "%s"?.', \get_class($this)));
            }

            setcookie($this->sessionName, '', [
                'expires' => time() - 3600,
                'path' => $this->getCookiePath(),
                'domain' => ini_get('session.cookie_domain'),
                'secure' => filter_var(ini_get('session.cookie_secure'), FILTER_VALIDATE_BOOLEAN),
                'httponly' => filter_var(ini_get('session.cookie_httponly'), FILTER_VALIDATE_BOOLEAN),
                'samesite' => $this->getCookieSameSite(),
            ]);
        }

        return $this->handler->destroy($sessionId);
    }

    public function close(): bool
    {
        return $this->handler->close();
    }

    /**
     * {@inheritdoc}
     */
    #[\ReturnTypeWillChange]
    public function gc($maxlifetime): int|false
    {
        return $this->handler->gc($maxlifetime);
    }

    public function validateId(string $id): bool
    {
        if ($this->handler instanceof \SessionUpdateTimestampHandlerInterface) {
            return $this->handler->validateId($id);
        }

        if ($id === '' || !is_string($id)) {
            return false;
        }

        return \preg_match('/^[A-Za-z0-9,-]{1,128}$/', $id) === 1;
    }

    // 既存ヘルパ（維持）
    public function getCookieSameSite()
    {
        if ($this->shouldSendSameSiteNone() && $this->getCookieSecure()) {
            return Cookie::SAMESITE_NONE;
        }

        return '';
    }

    public function getCookiePath()
    {
        return env('ECCUBE_COOKIE_PATH', '/');
    }

    public function getCookieSecure()
    {
        $request = Request::createFromGlobals();

        return $request->isSecure() ? '1' : '0';
    }

    private function shouldSendSameSiteNone()
    {
        $userAgent = array_key_exists('HTTP_USER_AGENT', $_SERVER) ? $_SERVER['HTTP_USER_AGENT'] : null;

        return SameSite::handle($userAgent);
    }
}
