<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMemwebEmail;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Mail;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface RegMemwebEmail Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface RegMemwebEmailRequestModelInterface extends RequestModelInterface,
                                                      Mail\HasMailInterface,
                                                      NoCategory\HasSyidInterface,
                                                      NoCategory\HasMbidInterface
{
    /**
    * {@inheritDoc}
    */
    /** @SerializedName("email") */
    public function setMail(?string $mail);
}