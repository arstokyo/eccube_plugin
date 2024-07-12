<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens;
use Plugin\AceClient43\AceServices\Model\Dependency\Card;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;


/**
 * Class for JyusubModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class JyusubModel implements JyusubModelInterface
{
    use Jyudens\Jyusub\JyusubModelBaseTrait,
        Card\CardModelLevel3Trait,
        Card\GMO\GMOModelGroup1Trait,
        NoCategory\SessIdTrait,
        Denpyo\WebOrderNoTrait;

    /** @var ?string $spscustomerid SPS会員ID */
    protected ?string $spscustomerid = null;

    /** @var ?string $spstid SPSトランザクションID */
    protected ?string $spstid = null;

    /** @var ?int $tpdenno 通販プロ伝票番号 */
    private ?int $tpdenno = null;

    /**
     * {@inheritDoc}
     */
    public function getSpscustomerid(): ?string
    {
        return $this->spscustomerid;
    }

    /**
     * {@inheritDoc}
     */
    public function setSpscustomerid(?string $spscustomerid)
    {
        $this->spscustomerid = $spscustomerid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSpstid(): ?string
    {
        return $this->spstid;
    }

    /**
     * {@inheritDoc}
     */
    public function setSpstid(?string $spstid)
    {
        $this->spstid = $spstid;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTpdenno(): ?int
    {
        return $this->tpdenno;
    }

    /**
     * {@inheritDoc}
     */
    public function setTpdenno(?int $tpdenno)
    {
        $this->tpdenno = $tpdenno;
        return $this;
    }
}