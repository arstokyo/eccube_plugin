<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\DecisionHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Hanpu\Hanmei;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

/**
 * Class for HanmeiModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HanmeiModel implements HanmeiModelInterface
{
    use Hanmei\HanmeiModelBaseTrait,
        NoCategory\IdTrait,
        Denpyo\DennoTrait;
}