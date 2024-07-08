<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\AddHanpu;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

interface AddHanpuRequestModelInterface extends RequestModelInterface,
                                                NoCategory\HasIdInterface,
                                                NoCategory\HasSessIdInterface
{
    /**
     * Set オーダー情報
     *
     * @param Request\Hanpu\AddHanpu\HanpuPrmModel $prm
     * @return self
     */
    public function setPrm(HanpuPrmModelInterface $prm): self;

    /**
     * Get オーダー情報
     *
     * @return Request\Hanpu\AddHanpu\HanpuPrmModel
     */
    public function getPrm(): HanpuPrmModelInterface;
}