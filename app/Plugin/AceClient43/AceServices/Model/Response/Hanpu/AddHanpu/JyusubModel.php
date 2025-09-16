<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Card;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class for JyusubModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class JyusubModel implements JyusubModelInterface
{
    use Jyudens\Jyusub\JyusubModelBaseTrait;
    use Card\CardModelLevel3Trait;
    use Card\GMO\GMOModelGroup1Trait;
    use NoCategory\SessIdTrait;
    use Denpyo\WebOrderNoTrait;

    /** @var ?string SPS会員ID */
    protected ?string $spscustomerid = null;

    /** @var ?string SPSトランザクションID */
    protected ?string $spstid = null;

    /** @var ?int 通販プロ伝票番号 */
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
