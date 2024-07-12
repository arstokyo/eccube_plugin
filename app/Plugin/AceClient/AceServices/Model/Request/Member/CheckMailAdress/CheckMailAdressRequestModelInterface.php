<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\CheckMailAdress;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\Mail\HasMailAdressInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory\HasIdInterface;

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