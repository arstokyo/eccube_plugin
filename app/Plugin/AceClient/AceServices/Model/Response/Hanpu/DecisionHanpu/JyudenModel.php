<?php

namespace Plugin\AceClient\AceServices\Model\Response\Hanpu\DecisionHanpu;

use Plugin\AceClient\AceServices\Model\Dependency\Jyudens;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Class for JyudenModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class JyudenModel extends Jyudens\Jyuden\JyudenModelGroup2 implements JyudenModelInterface
{
    use Denpyo\DennoTrait;
}