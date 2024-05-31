<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetMemberName;

use Plugin\AceClient\AceServices\Model\Dependency\Mail;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Model for Member1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class Member1Model implements Member1ModelInterface
{
    use NoCategory\NameTrait;

    /** @var ?string $mbid 顧客ID */
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
