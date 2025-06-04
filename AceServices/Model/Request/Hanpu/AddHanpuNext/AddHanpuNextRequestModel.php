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

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpuNext;

use Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu\AddHanpuRequestModel as ParentModel;
use Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu\HanpuPrmModelInterface;

class AddHanpuNextRequestModel extends ParentModel
{
    public const XML_NODE_NAME = 'addHanpuNext';

    /**
     * @param HanpuPrmModel $prm
     */
    public function setPrm(HanpuPrmModelInterface $prm): self
    {
        $this->prm = $prm;

        return $this;
    }
}
