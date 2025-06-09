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

namespace Plugin\AceClient43\Bridge\Helper;

use Eccube\Entity\Customer;
use Eccube\Entity\CustomerAddress;
use Plugin\AceClient43\AceServices\Model\Request\Member\DeleteHaisoAdrs\DeleteHaisoAdrsRequestModel;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMemAdr as RequestRegMemAdr;
use Plugin\AceClient43\AceServices\Model\Request\Member\RegMemAdr\RegMemAdrRequestModel;

/**
 * 顧客住所ブリッジヘルパークラス
 */
class CustomerAddressBridgeHelper
{
    /**
     * 顧客の住所を新規作成または更新するためのリクエストモデルを生成
     *
     * @param CustomerAddress $address 住所エンティティ
     * @param string $syid システムID
     *
     * @return RegMemAdrRequestModel
     */
    public function createRegMemAdrRequestModel(CustomerAddress $address, string $syid): RegMemAdrRequestModel
    {
        $customer = $address->getCustomer();
        $fullName = mb_convert_kana(sprintf('%s　%s', $address->getName01(), $address->getName02()), 'KVA');
        $fullKana = mb_convert_kana(sprintf('%s　%s', $address->getKana01(), $address->getKana02()), 'KVA');

        return (new RegMemAdrRequestModel())
            ->setId($syid)
            ->setPrm((new RequestRegMemAdr\MemberPrmModel())
                ->setNmember((new RequestRegMemAdr\NmemberModel())
                    ->setCode($customer->getAceCustomerId())
                    ->setEda($address->getAceEdaNo())
                    ->setZip($address->getPostalCode())
                    ->setAdr1($address->getPref()->getName())
                    ->setAdr2($address->getAddr01())
                    ->setAdr3($address->getAddr02())
                    ->setTel($address->getPhoneNumber())
                    ->setSimei($fullName)
                    ->setKana($fullKana)
                )
            );
    }

    /**
     * 顧客住所を削除するためのリクエストモデルを生成
     *
     * @param Customer $customer 顧客エンティティ
     * @param CustomerAddress $address 住所エンティティ
     * @param string $syid システムID
     *
     * @return DeleteHaisoAdrsRequestModel
     */
    public function createDeleteHaisoAdrsRequestModel(Customer $customer, CustomerAddress $address, string $syid): DeleteHaisoAdrsRequestModel
    {
        return (new DeleteHaisoAdrsRequestModel())
            ->setId($syid)
            ->setMcode($customer->getAceCustomerId())
            ->setEda($address->getAceEdaNo());
    }
}
