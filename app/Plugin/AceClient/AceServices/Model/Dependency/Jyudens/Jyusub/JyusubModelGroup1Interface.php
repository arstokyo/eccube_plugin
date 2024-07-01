<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyusub;

use Plugin\AceClient\AceServices\Model\Dependency\Card;
use Plugin\AceClient\AceServices\Model\Dependency\Point;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for JyusubModelGroup1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyusubModelGroup1Interface extends JyusubModelBaseInterface,
                                             Card\CardModelLevel2Interface,
                                             Card\CardModelLevel3Interface,
                                             Point\HasPointMaxInterface,
                                             Denpyo\HasWebOrderNoInterface     
{

    /**
     * Get 通販プロ伝票番号
     * 
     * @return ?int
     */
    public function getTpdenno(): ?int;

    /**
     * Set 通販プロ伝票番号
     * 
     * @param int|null $tpdenno
     * @return $this
     */
    public function setTpdenno(int|null $tpdenno): static;
    
}