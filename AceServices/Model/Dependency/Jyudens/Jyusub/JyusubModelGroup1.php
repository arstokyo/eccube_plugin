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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyusub;

use Plugin\AceClient43\AceServices\Model\Dependency\Card;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;

/**
 * Model for Jyusub Group1
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class JyusubModelGroup1 implements JyusubModelGroup1Interface
{
    use JyusubModelBaseTrait;
    use Card\CardModelLevel2Trait;
    use Card\CardModelLevel3Trait;
    use Point\PointMaxTrait;
    use Denpyo\WebOrderNoTrait;

    /** @var ?int 通販プロ伝票番号 */
    private ?int $tpdenno = null;

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
