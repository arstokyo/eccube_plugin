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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetHaisoAdrs;

use Plugin\AceClient43\AceServices\Model\Dependency\Address\FourAdrTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Address\FourCdvAdrTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Bikou\ThreeAdrBikouTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory\EdaTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory\KanaTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Person\PersonLevel3ExtractTrait;

/**
 * Class GetPointRequestModel
 *
 * @author kmorino
 */
class GetHaisouAdrsModel implements GetHaisouAdrsModelInterface
{
    use PersonLevel3ExtractTrait;
    use ThreeAdrBikouTrait;
    use FourCdvAdrTrait;
    use FourAdrTrait;
    use KanaTrait;
    use EdaTrait;

    /** @var string 氏名 */
    protected ?string $cnvname = null;

    /**
     * {@inheritDoc}
     */
    public function getCnvName(): ?string
    {
        return $this->cnvname;
    }

    /**
     * {@inheritDoc}
     */
    public function setCnvName(?string $cnvname)
    {
        $this->cnvname = $cnvname;
    }
}
