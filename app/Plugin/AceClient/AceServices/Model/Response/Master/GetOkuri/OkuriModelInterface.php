<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetOkuri;

use Plugin\AceClient\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for OkuriModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface OkuriModelInterface extends Haiso\HasOcodeInterface,
                                      Haiso\HasOnameInterface,
                                      Haiso\HasHcodeInterface,
                                      Haiso\HasHnameInterface,
                                      Good\HasJyouonInterface,
                                      Good\HasReizouInterface,
                                      Good\HasReitouInterface,
                                      NoCategory\HasKubunInterface
{
    /**
     * Get 代引区分
     */
    public function getKubun(): ?int;

    /**
     * Set 代引区分
     */
    public function setKubun(?int $kubun);
}