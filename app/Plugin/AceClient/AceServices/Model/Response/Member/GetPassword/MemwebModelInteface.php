<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetPassword;

use Plugin\AceClient\AceServices\Model\Dependency\Mail;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Symfony\Component\Serializer\Annotation\SerializedName;


/**
 * Interface for MemwebModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemwebModelInteface extends Mail\HasMailInterface,
                                      NoCategory\HasPassWdInterface
{
    /**
    * {@inheritDoc}
    */
    #[SerializedName('EMAIL')]
    public function setMail(?string $mail): static;
}