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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Mail;

/**
 * Trait for MailAdress
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait MailAdressTrait
{
    /** @var ?string メールアドレス */
    protected ?string $mailadress = null;

    /**
     * {@inheritDoc}
     */
    public function getMailadress(): ?string
    {
        return $this->mailadress;
    }

    /**
     * {@inheritDoc}
     */
    public function setMailadress(?string $mailadress)
    {
        $this->mailadress = $mailadress;

        return $this;
    }
}
