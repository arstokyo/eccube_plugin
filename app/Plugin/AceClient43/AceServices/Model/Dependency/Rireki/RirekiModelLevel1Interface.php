<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Rireki;

use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\OkuriAndNouhin;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;

/**
 * Interface for RirekiLevel1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface RirekiModelLevel1Interface extends Day\HasDayInterface,
                                             Denpyo\HasDennoInterface,
                                             Denpyo\HasDenkuInterface,
                                             Denpyo\HasDenKbnInterface,
                                             Denpyo\HasJnameInterface,
                                             OkuriAndNouhin\HasOkuriNoInterface,
                                             Day\HasSdateInterface,
                                             Point\HasPointPInterface,
                                             Point\HasPointMInterface,
                                             Day\HasHdayInterface
{

}