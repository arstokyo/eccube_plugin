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

namespace Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart;

use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyuden\JyudenModelGroup2Interface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory\HasSessIdInterface;

/**
 * Interface for JyudenModel
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyudenModelInterface extends JyudenModelGroup2Interface, HasSessIdInterface
{
}
