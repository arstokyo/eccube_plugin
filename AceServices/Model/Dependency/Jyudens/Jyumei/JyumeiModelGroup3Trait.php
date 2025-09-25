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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyumei;

use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for Jyumei Group3
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait JyumeiModelGroup3Trait
{
    use Good\SubNameTrait;
    use Good\GkbnTrait;
    use NoCategory\TwoImagesTrait;
    use Cost\Tanka\NineTankaTrait;
    use NoCategory\KbnTrait;

    /** @var ?string 詳細メッセージ */
    private ?string $detailmsg = null;

    /**
     * {@inheritDoc}
     */
    public function getDetailmsg(): ?string
    {
        return $this->detailmsg;
    }

    /**
     * {@inheritDoc}
     */
    public function setDetailmsg(?string $detailmsg)
    {
        $this->detailmsg = $detailmsg;

        return $this;
    }
}
