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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\CheckDuplicationMember;

use Plugin\AceClient43\AceServices\Model\Dependency\Address;
use Plugin\AceClient43\AceServices\Model\Dependency\Mail;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;
use Plugin\AceClient43\AceServices\Model\Request\Prm\PrmModelInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface MemberPrmModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemberPrmModelInterface extends NoCategory\HasNameInterface, NoCategory\HasKanaInterface, Address\HasZipInterface, Address\HasAdrInterface, Mail\HasMailInterface, PhoneAndPC\HasTelInterface, PrmModelInterface
{
    /**
     * {@inheritDoc}
     */
    /** @SerializedName("email") */
    public function setMail(?string $mail);
}
