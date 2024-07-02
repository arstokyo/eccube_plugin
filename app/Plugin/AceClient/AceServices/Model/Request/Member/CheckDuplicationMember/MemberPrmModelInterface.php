<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\CheckDuplicationMember;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Address;
use Plugin\AceClient\AceServices\Model\Dependency\Mail;
use Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Plugin\AceClient\AceServices\Model\Request\Prm\PrmModelInterface;


/**
 * Interface MemberPrmModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemberPrmModelInterface extends NoCategory\HasNameInterface,
                                          NoCategory\HasKanaInterface,
                                          Address\HasZipInterface,
                                          Address\HasAdrInterface,
                                          Mail\HasMailInterface,
                                          PhoneAndPC\HasTelInterface,
                                          PrmModelInterface
{
    /**
    * {@inheritDoc}
    */
    /** @SerializedName("email") */
    public function setMail(?string $mail);
}