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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Person\Nmember;

use Plugin\AceClient43\AceServices\Model\Dependency\Address;
use Plugin\AceClient43\AceServices\Model\Dependency\Bikou\ThreeAdrBikouTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Person;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Class For Nmem Model Group1
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class NmemberModelGroup1 extends NmemberModel implements NmemberModelGroup1Interface
{
    use Person\PersonLevel1Trait;
    use Address\FourAdrTrait;
    use ThreeAdrBikouTrait;
    use PhoneAndPC\TelTrait;
    use PhoneAndPC\FaxTrait;
    use Address\ZipTrait;

    /** @var ?string 氏名 */
    protected ?string $adrName = null;

    /**
     * {@inheritDoc}
     */
    public function getAdrName(): ?string
    {
        return $this->adrName;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdrName(?string $adrName)
    {
        $this->adrName = $adrName;

        return $this;
    }
}
