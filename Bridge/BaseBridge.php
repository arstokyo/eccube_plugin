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

namespace Plugin\AceClient43\Bridge;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Eccube\Session\Session;
use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelExtend1Interface;
use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\Entity\Config;
use Plugin\AceClient43\Service\AceConfigService;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Contracts\Service\Attribute\Required;

class BaseBridge
{
    use CreateRequestModelTrait;

    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var SessionInterface
     */
    protected $session;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * @var AceConfigService
     */
    protected $aceConfigService;

    /**
     * @Required
     */
    public function setEntityManger(EntityManagerInterface $entityManager): void
    {
        $this->em = $entityManager;
    }

    /**
     * @Required
     */
    public function setSession(Session $session): void
    {
        $this->session = $session;
    }

    /**
     * @Required
     */
    public function setAceConfigService(AceConfigService $aceConfigService): void
    {
        $this->aceConfigService = $aceConfigService;
    }

    /**
     * @Required
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

    /**
     * @Required
     */
    public function setEventDispatcher(EventDispatcherInterface $eventDispatcher): void
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * システムIDを取得
     *
     * @return string|null
     *
     * @throws \LogicException
     */
    protected function getSyid(): ?string
    {
        return $this->aceConfigService->getSyid();
    }

    /**
     * AceClient設定を取得
     *
     * @return Config|null
     */
    protected function getAceConfig(): ?Config
    {
        return $this->aceConfigService->getConfig();
    }

    /**
     * レスポンスがエラーかどうかを判定
     *
     * @param HasMessageModelInterface|HasMessageModelExtend1Interface $response
     *
     * @return bool
     */
    protected function hasErrorMessage($response): bool
    {
        if (method_exists($response->getMessage(), 'getResult')) {
            $isResultOk = 'OK' === $response->getMessage()->getResult();

            if (!$isResultOk) {
                $this->logger->error('通販Ace側の処理でエラーが発生しました', [
                    'result' => $response->getMessage()->getResult(),
                    'message1' => $response->getMessage()->getMessage1() ?? 'N/A',
                    'message2' => $response->getMessage()->getMessage2() ?? 'N/A',
                ]);
            }

            return !$isResultOk;
        }

        $hasMessage1 = $response->getMessage()->getMessage1();
        $hasMessage2 = $response->getMessage()->getMessage2();

        if ($hasMessage1 || $hasMessage2) {
            $this->logger->error('通販Ace側の処理でエラーが発生しました', [
                'message1' => $hasMessage1,
                'message2' => $hasMessage2,
            ]);

            return true;
        }

        return false;
    }
}
