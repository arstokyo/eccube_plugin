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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Message;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * MessageModelExtend1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MessageModelExtend2 extends MessageModelExtend1 implements MessageModelExtend2Interface
{
    use NoCategory\CodeTrait;
    use NoCategory\TaikaiTrait;

    /**
     * Address
     *
     * @var ?string
     */
    protected ?string $adress = null;

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdress(?string $adress)
    {
        $this->adress = $adress;

        return $this;
    }
}
