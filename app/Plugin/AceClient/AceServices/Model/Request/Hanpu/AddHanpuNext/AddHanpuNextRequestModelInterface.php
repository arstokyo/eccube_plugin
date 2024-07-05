<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpuNext;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

interface AddHanpuNextRequestModelInterface extends RequestModelInterface,
                                                NoCategory\HasIdInterface,
                                                NoCategory\HasSessIdInterface
{
    /**
     * Set オーダー情報
     *
     * @param Request\Hanpu\AddHanpuNext\HanpuPrmModel $prm
     * @return self
     */
    public function setPrm(HanpuPrmModel $prm): self;

    /**
     * Get オーダー情報
     *
     * @return Request\Hanpu\AddHanpuNext\HanpuPrmModel
     */
    public function getPrm(): HanpuPrmModelInterface;
}