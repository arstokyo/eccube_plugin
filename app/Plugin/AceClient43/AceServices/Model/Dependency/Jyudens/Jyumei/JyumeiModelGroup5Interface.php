<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyumei;

use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\GiftAndCampaign;

/**
 * Interface for JyumeiModelGroup5
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface JyumeiModelGroup5Interface extends JyumeiModelGroup3Interface,
                                             Denpyo\HasLineInterface,
                                             Good\HasGcodeInterface,
                                             Good\HasGNameInterface,
                                             NoCategory\HasSuuInterface,
                                             Cost\Tanka\HasTankaInterface,
                                             GiftAndCampaign\HasCKbnInterface
{
}