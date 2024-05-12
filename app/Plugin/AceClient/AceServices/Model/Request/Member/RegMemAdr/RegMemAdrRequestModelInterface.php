<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMemAdr;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory\HasIdInterface;

/**
 * Interface RegMemAdrRequestInterface
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface RegMemAdrRequestModelInterface extends RequestModelInterface, HasIdInterface
{

    /**
     * Get 顧客住所　情報
     *
     * @return string|null|object
     */
    public function getPrm(): string|null|object;

    /**
     * Set 顧客住所　情報
     *
     * @param Request\Member\RegMemAdr\MemberPrmModel $prm
     * @return self
     */
    public function setPrm(MemberPrmModelInterface $prm): self;

}