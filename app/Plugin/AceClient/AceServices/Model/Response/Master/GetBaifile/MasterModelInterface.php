<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetBaifile;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;

/**
 * Interface for MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MasterModelInterface extends HasMessageModelInterface,
                                       AsListDenormalizableInterface
{
    /**
    * Get Baifile
    *
    * @return BaifileModel[]|null
    */
    public function getBaifile(): ?array;

    /**
     * Set Baifile
     *
     * @param BaifileModel[]|null $baifile
     * @return void
     */
    public function setBaifile(?array $baifile): void;
}