<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpuNext;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu\AddHanpuRequestModel as ParentModel;
use Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu\HanpuPrmModelInterface;

class AddHanpuNextRequestModel extends ParentModel
{
    const XML_NODE_NAME = 'addHanpuNext';

    /**
     * @param Request\Hanpu\AddHanpuNext\HanpuPrmModel $prm
     */
    public function setPrm(HanpuPrmModelInterface $prm): self
    {
        $this->prm = $prm;
        return $this;
    }

}