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

namespace Plugin\AceClient43\EventListener;

use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Plugin\AceClient43\Security\Authenticator\CustomerAuthenticator;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * フロントのパスワードリセット画面のイベントリスナー
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class FrontForgotListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            EccubeEvents::FRONT_FORGOT_INDEX_INITIALIZE => 'onFrontForgotInitialize',
        ];
    }

    public function onFrontForgotInitialize(EventArgs $event)
    {
        $request = $event->getRequest();

        if ($request->query->has('login_email')) {
            return;
        }

        $session = $event->getRequest()->getSession();
        if (!$session->has(CustomerAuthenticator::RESET_PASSWORD_CUSTOMER)) {
            return;
        }

        /** @var FormBuilderInterface $builder */
        $builder = $event->getArgument('builder');

        $builder->get('login_email')
            ->setData($session->get(CustomerAuthenticator::RESET_PASSWORD_CUSTOMER));
    }
}
