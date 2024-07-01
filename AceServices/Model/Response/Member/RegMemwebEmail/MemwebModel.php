<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\RegMemwebEmail;

use Plugin\AceClient\AceServices\Model\Dependency\Mail;

/**
 * Model for MemwebModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MemwebModel implements MemwebModelInterface
{
    use Mail\MailTrait;

    /** @var ?string $mbid 行番号 */
    protected ?string $mbid = null;

    /**
     * {@inheritDoc}
     */
    public function getMbid(): ?string
    {
        return $this->mbid;
    }

    /**
     * {@inheritDoc}
     */
    public function setMbid(?string $mbid)
    {
        $this->mbid = $mbid;
        return $this;
    }
}
