<?php

namespace Plugin\AceClient\AceServices\Model\Response\Hanpu\DecisionHanpu;

use Plugin\AceClient\AceServices\Model\Dependency\Hanpu\Hanmei;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

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