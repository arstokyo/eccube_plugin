<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\DecisionHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;


/**
 * Class for JyusubModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class JyusubModel implements JyusubModelInterface
{
    use Jyudens\Jyusub\JyusubModelBaseTrait,
        Denpyo\DennoTrait;
}