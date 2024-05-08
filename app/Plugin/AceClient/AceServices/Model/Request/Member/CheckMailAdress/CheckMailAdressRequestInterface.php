<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\CheckMailAdress;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory\HasMailAdressInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory\HasIdInterface;

/**
 * Interface CheckMailAdressRequestInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface CheckMailAdressRequestInterface extends RequestModelInterface,
                                                  HasMailAdressInterface,
                                                  HasIdInterface
{
    
}