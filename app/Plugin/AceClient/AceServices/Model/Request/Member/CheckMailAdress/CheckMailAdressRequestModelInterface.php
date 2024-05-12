<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\CheckMailAdress;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Mail\HasMailAdressInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory\HasIdInterface;

/**
 * Interface CheckMailAdressRequestInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface CheckMailAdressRequestModelInterface extends RequestModelInterface,
                                                  HasMailAdressInterface,
                                                  HasIdInterface
{
    
}