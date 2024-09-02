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

namespace Eccube\Entity;

use Doctrine\ORM\Mapping as ORM;

trait UseCouponTrait
{
    /**
     * @var string
     *
     * @ORM\Column(name="counpon_code", type="string", length=50, nullable=true)
     */
    private $counpon_code = '';


    /**
     * Set counpon_code
     *
     * @param string $counpon_code
     *
     * @return Order
     */
    public function setCounponCode($counpon_code)
    {
        $this->counpon_code = $counpon_code;

        return $this;
    }

    /**
     * Get counpon_code
     *
     * @return string
     */
    public function getCounponCode()
    {
        return $this->counpon_code;
    }
}
