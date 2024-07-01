<?php

namespace Plugin\AceClient\AceServices\Model\Request\Goods\GetZaikoAll;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Souko;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Symfony\Component\Serializer\Annotation\SerializedName;


/**
 * Interface GetZaikoAllRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetZaikoAllRequestModelInterface extends RequestModelInterface,
                                                    NoCategory\HasIdInterface,
                                                    Souko\HasSoukoInterface
{
    /**
     * {@inheritDoc}
     */
    /** @SerializedName("skid") */
    public function setSouko(?string $souko);

    /**
     * Get 開始行番号
     *
     * @return ?int
     */
    public function getRangefrom(): ?int;

    /**
     * Set 開始行番号
     *
     * @param ?int $rangefrom
     * @return $this
     */
    public function setRangefrom(?int $rangefrom);

    /**
     * Get 終了行番号
     *
     * @return ?int
     */
    public function getRangeto(): ?int;

    /**
     * Set 終了行番号
     *
     * @param ?int $rangeto
     * @return $this
     */
    public function setRangeto(?int $rangeto);
}