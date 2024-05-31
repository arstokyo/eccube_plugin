<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Request;

/**
 * Model for Detail
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class DetailModel implements DetailModelInterface
{

    /** @var Request\Jyuden\AddCart\JyumeiModelInterface[]|null $jyumei */
    private ?array $jyumei = null;

    /**
    * {@inheritDoc}
    */
    public function getJyumei(): ?array
    {
        return $this->jyumei;
    }

    /**
    * {@inheritDoc}
    */
    public function setJyumei(?array $jyumei): self
    {
        $this->jyumei = $jyumei;
        return $this;
    }

}