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

/**
 * Class For MailJyudenModelLevel2
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MailJyudenModelLevel2 extends MailJyudenModelLevel1 implements MailJyudenModelLevel2Interface
{
    /** @var ?int メール区分 */
    protected ?int $mailkbn = null;

    /** @var ?string 受注メールコメント */
    protected ?string $jbikou = null;

    /** @var ?string 出荷メールコメント */
    protected ?string $sbikou = null;

    /**
     * {@inheritDoc}
     */
    public function getMailkbn(): ?int
    {
        return $this->mailkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setMailkbn(?int $mailkbn)
    {
        $this->mailkbn = $mailkbn;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getJbikou(): ?string
    {
        return $this->jbikou;
    }

    /**
     * {@inheritDoc}
     */
    public function setJbikou(?string $jbikou)
    {
        $this->jbikou = $jbikou;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSbikou(): ?string
    {
        return $this->sbikou;
    }

    /**
     * {@inheritDoc}
     */
    public function setSbikou(?string $sbikou)
    {
        $this->sbikou = $sbikou;

        return $this;
    }
}
