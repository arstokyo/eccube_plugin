<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetReminder;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Mail\HasMailAdressInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory\HasIdInterface;

/**
 * Interface CheckMailAdressRequestInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetReminderRequestInterface extends RequestModelInterface,
                                                  HasMailAdressInterface,
                                                  HasIdInterface
{
}