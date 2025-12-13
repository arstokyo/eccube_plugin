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

namespace Plugin\AceClient43\Command;

final class ProductRepeatImportV2Command extends AbstractProductRepeatImportCommand
{
    protected static $defaultName = 'eccube:aceclient:import-product-repeat-v2';

    protected function configure()
    {
        parent::configure();
        $this
            ->setHelp('このコマンドは通販Aceから商品を繰り返しインポートします。【推奨】バッチインポート方式を使用します。')
            ->setDescription('[推奨] 通販Aceから商品を繰り返しインポートするコマンド（V2・バッチ処理）');
    }

    protected function getTargetImportCommandName(): string
    {
        return 'eccube:aceclient:import-product-v2';
    }
}
