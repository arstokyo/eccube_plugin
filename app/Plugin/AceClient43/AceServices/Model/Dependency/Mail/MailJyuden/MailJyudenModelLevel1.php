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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Mail\MailJyuden;

use Plugin\AceClient43\AceServices\Model\Dependency\Mail;

/**
 * Class For MailJyudenModelLevel1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MailJyudenModelLevel1 implements MailJyudenModelLevel1Interface
{
    use Mail\MailTrait;

    /** @var ?string 注文コメント(お客様) */
    protected ?string $tbikou = null;

    /**
     * {@inheritDoc}
     */
    public function getTbikou(): ?string
    {
        return $this->tbikou;
    }

    /**
     * {@inheritDoc}
     */
    public function setTbikou(?string $tbikou)
    {
        $this->tbikou = $tbikou;

        return $this;
    }
}
