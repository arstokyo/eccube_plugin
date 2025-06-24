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

namespace Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyumei\JyumeiModelGroup1Interface;

/**
 * Interface for Jyumei
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyumeiModelInterface extends JyumeiModelGroup1Interface
{
    public function getJyumeiFree(): ?string;

    public function setJyumeiFree(?array $free): self;
}
