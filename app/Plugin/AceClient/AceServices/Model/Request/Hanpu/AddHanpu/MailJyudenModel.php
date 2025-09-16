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

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Mail;

/**
 * Class MailJyudenModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MailJyudenModel implements MailJyudenModelInterface
{
    use Mail\MailTrait;

    /** @var ?string 伝票メール情報 */
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
