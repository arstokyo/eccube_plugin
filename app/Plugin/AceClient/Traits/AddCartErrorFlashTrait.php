<?php

namespace Plugin\AceClient43\Traits;

use Symfony\Component\HttpFoundation\Session\FlashBagAwareSessionInterface;

trait AddCartErrorFlashTrait
{
    private function addCartErrorFlash(string $message, $namespace = 'front'): void
    {
        $session = $this->requestStack->getSession();

        if (!$session instanceof FlashBagAwareSessionInterface) {
            log_error('セッションがFlashBagAwareSessionInterfaceを実装していないため、エラーメッセージを追加できません。');
        }

        $session->getFlashBag()->add('eccube.'.$namespace.'.request.error', $message);
    }
}
