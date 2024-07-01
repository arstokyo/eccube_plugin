<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetPassword;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Mail;

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