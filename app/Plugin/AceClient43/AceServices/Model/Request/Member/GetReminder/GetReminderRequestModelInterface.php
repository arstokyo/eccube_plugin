<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetReminder;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\Mail\HasMailAdressInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory\HasIdInterface;

/**
 * Interface CheckMailAdressRequestInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetReminderRequestModelInterface extends RequestModelInterface,
                                                  HasMailAdressInterface,
                                                  HasIdInterface
{
}