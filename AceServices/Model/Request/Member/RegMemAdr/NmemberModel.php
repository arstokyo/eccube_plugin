<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr;

use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel2Trait;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou\ThreeBikouTrait;
use Plugin\AceClient\AceServices\Model\Request\Member\Dependency\NmemberModel as ParentModel;

/**
 * Class for 納品先Model
 * 
 */
class NmemberModel extends ParentModel implements NmemberModelInterface
{
  use PersonLevel2Trait,
      ThreeBikouTrait;

    /** @var int|null $betu 別枝番号 */
    protected ?int $betu = null;

    /** @var string|null $fax Fax番号 */
    protected ?string $fax = null;

    /**
     * {@inheritDoc}
     */
    public function getBetu(): int|null
    {
        return $this->betu;
    }

    /**
     * {@inheritDoc}
     */
    public function setBetu(int|null $betu)
    {
        $this->betu = $betu;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFax(): string|null
    {
        return $this->fax;
    }

    /**
     * {@inheritDoc}
     */
    public function setFax(string|null $fax)
    {
        $this->fax = $fax;
        return $this;
    }
   
}