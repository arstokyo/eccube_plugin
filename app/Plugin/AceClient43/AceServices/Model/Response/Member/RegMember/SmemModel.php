<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\RegMember;

use Plugin\AceClient43\AceServices\Model\Dependency\Person\PersonLevel6ExtractTrait;
use Plugin\AceClient43\AceServices\Model\Dependency\Mail\FiveMelmagaTrait;

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