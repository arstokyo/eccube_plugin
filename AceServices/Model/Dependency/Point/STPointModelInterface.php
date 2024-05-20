<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Point;

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface for Has STPointModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface STPointModelInterface extends HasPointInterface
{
    /**
     * Get ポイント算出日付
     *
     * @return string|int|null
     */
    public function getIday(): string|int|null;

    /**
     * Set ポイント算出日付
     *
     * @param string|int|null $iday
     * @return $this
     */
    public function setIday(string|int|null $iday): static;

    /**
     * Get 最新購入日
     *
     * @return string|int|null
     */
    #[SerializedName('inppoint_maxday')]
    public function getInppointMaxday(): string|int|null;

    /**
     * Set 最新購入日
     *
     * @param string|int|null $inppointMaxday
     * @return $this
     */
    #[SerializedName('inppoint_maxday')]
    public function setInppointMaxday(string|int|null $inppointMaxday): static;
}