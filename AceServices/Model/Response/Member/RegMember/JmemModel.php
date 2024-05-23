<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\RegMember;

use Plugin\AceClient\AceServices\Model\Dependency\Person\PersonLevel6ExtractTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Mail\FiveMelmagaTrait;

/**
 * Jmem Model
 * 
 * @author kmorino
 */
class JmemModel implements JmemModelInterface
{
    use PersonLevel6ExtractTrait,
        FiveMelmagaTrait;
}