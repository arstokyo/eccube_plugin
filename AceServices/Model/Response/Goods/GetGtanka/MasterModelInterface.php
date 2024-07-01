<?php

namespace Plugin\AceClient\AceServices\Model\Response\Goods\GetGtanka;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Good\GoodTankaModelGroup1;
use Plugin\AceClient\AceServices\Model\Response\AsListDenormalizableInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;


/**
 * Interface for MasterModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MasterModelInterface extends HasMessageModelInterface,
                                       AsListDenormalizableInterface
{
    /**
     * Get Gzai
     *
     * @return GoodTankaModelGroup1[]|null
     */
    public function getGzai(): ?array;

    /**
     * Set Gzai
     *
     * @param GoodTankaModelGroup1[]|null $gzai
     * @return void
     */
    /** @SerializedName("Gtanka") */
    public function setGzai(?array $gzai): void;
}