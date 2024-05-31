<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyusub;

use Plugin\AceClient\AceServices\Model\Dependency\Card;
use Plugin\AceClient\AceServices\Model\Dependency\Point;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Model for Jyusub Group1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class JyusubModelGroup1 implements JyusubModelGroup1Interface
{
    use JyusubModelBaseTrait,
        Card\CardModelLevel2Trait,
        Card\CardModelLevel3Trait,
        Point\PointMaxTrait,
        Denpyo\WebOrderNoTrait;

    /** @var ?int $tpdenno 通販プロ伝票番号 */
    private ?int $tpdenno = null;

    /**
     * {@inheritDoc}
     */
    public function getTpdenno(): int|null
    {
        return $this->tpdenno;
    }

    /**
     * {@inheritDoc}
     */
    public function setTpdenno(int|null $tpdenno): static
    {
        $this->tpdenno = $tpdenno;
        return $this;
    }

}