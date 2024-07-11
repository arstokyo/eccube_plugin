<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\RegMemwebEmail;

use Plugin\AceClient\AceServices\Model\Dependency\Mail;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for MemwebModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemwebModelInterface extends Mail\HasMailInterface,
                                       NoCategory\HasMbidInterface
{

    /**
     * {@inheritDoc}
     */
    /** @SerializedName("EMAIL") */
    public function setMail(?string $mail);
}