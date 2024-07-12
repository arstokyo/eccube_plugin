<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\CheckDuplicationMember;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Address;
use Plugin\AceClient43\AceServices\Model\Dependency\Mail;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Plugin\AceClient43\AceServices\Model\Request\Prm\PrmModelInterface;


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