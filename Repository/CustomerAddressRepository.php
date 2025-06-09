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

namespace Plugin\AceClient43\Repository;

use Doctrine\Persistence\ManagerRegistry as RegistryInterface;
use Eccube\Entity\CustomerAddress;
use Eccube\Repository\CustomerAddressRepository as BaseCustomerAddressRepository;
use Eccube\Repository\ShippingRepository;

class CustomerAddressRepository extends BaseCustomerAddressRepository
{
    private ShippingRepository $shippingRepository;

    public function __construct(RegistryInterface $registry, ShippingRepository $shippingRepository)
    {
        parent::__construct($registry);
        $this->shippingRepository = $shippingRepository;
    }

    /**
     * お届け先を削除します.
     *
     * @param CustomerAddress $CustomerAddress
     */
    public function delete($CustomerAddress)
    {
        $em = $this->getEntityManager();
        $em->remove($CustomerAddress);

        $Shipping = $this->shippingRepository->findOneBy(['customer_address' => $CustomerAddress]);
        if ($Shipping) {
            $Shipping->setCustomerAddress(null);
            $this->shippingRepository->save($Shipping);
        }

        $em->flush();
    }
}
