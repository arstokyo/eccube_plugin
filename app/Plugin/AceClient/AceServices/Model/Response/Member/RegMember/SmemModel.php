<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\RegMember;

use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel6ExtractTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Mail\FiveMelmagaTrait;

/**
 * Smem Model
 * 
 * @author kmorino
 */
class SmemModel implements SmemModelInterface
{
    use PersonLevel6ExtractTrait,
        FiveMelmagaTrait;
}