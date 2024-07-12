<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient43\AceServices\Model\Request;

/**
 * Interface for Detail Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface DetailModelInterface
{

    /**
     * Get Jyumeis
     * 
     * @return Request\Jyuden\AddCart\JyumeiModelInterface[]|null
     */
    public function getJyumei(): ?array;

    /**
     * Set Jyumeis
     * 
     * @param Request\Jyuden\AddCart\JyumeiModel[]|null $jyumei
     * @return self
     */
    public function setJyumei(?array $jyumei): self;

}