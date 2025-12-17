<?php

namespace Plugin\AceClient43\Traits;

use Symfony\Component\HttpFoundation\Session\FlashBagAwareSessionInterface;

trait AddShoppingErrorFlashTrait
{
    private function addShoppingErrorFlash(string $message, $namespace = 'front'): void
    {
        $session = $this->requestStack->getSession();

        if (!$session instanceof FlashBagAwareSessionInterface) {
            log_error('セッションがFlashBagAwareSessionInterfaceを実装していないため、エラーメッセージを追加できません。');
        }

        $session->getFlashBag()->add('eccube.'.$namespace.'.error', $message);
    }
}
