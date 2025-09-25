<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetReminder;

use Plugin\AceClient43\AceServices\Model\Dependency\Mail\HasMailAdressInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory\HasIdInterface;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * Interface CheckMailAdressRequestInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetReminderRequestModelInterface extends RequestModelInterface, HasMailAdressInterface, HasIdInterface
{
}
