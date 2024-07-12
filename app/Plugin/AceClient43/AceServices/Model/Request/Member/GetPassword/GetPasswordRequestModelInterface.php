<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetPassword;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Mail;

/**
 * Interface GetPassword Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetPasswordRequestModelInterface extends RequestModelInterface,
                                           NoCategory\HasIdInterface,
                                           Mail\HasMailInterface
{
}