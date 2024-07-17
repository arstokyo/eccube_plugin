<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetId;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class IdModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class IdModel implements IdModelInterface
{
    use NoCategory\IdTrait;
    /** @var ?string $idName ID名 */

    protected ?string $idName = null;

    /**
     * {@inheritDoc}
     */
    public function getIdName(): ?string
    {
        return $this->idName;
    }

    /**
     * {@inheritDoc}
     */
    public function setIdName(?string $idName)
    {
        $this->idName = $idName;
        return $this;
    }
}
