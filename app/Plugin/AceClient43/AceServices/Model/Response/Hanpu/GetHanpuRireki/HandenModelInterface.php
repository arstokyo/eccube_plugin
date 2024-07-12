<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\GetHanpuRireki;

use Plugin\AceClient43\AceServices\Model\Dependency\Hanpu\Handen;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Card;

/**
 * Interface for HandenModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HandenModelInterface extends Handen\HandenModelGroup1Interface,
                                       Handen\HandenModelGroup2Interface,
                                       Denpyo\HasDennoInterface,
                                       Card\HasCedaInterface
{
    /**
     * Get 現在回数
     *
     * @return int|null
     */
    public function getNowcnt(): ?int;

    /**
     * Set 現在回数
     *
     * @param int|null $nowcnt
     * @return $this
     */
    public function setNowcnt(?int $nowcnt);

    /**
    * Get Hanmei
    *
    * @return HanmeiModel
    */
    public function getHanmei(): ?HanmeiModel;

    /**
     * Set Hanmei
     *
     * @param HanmeiModel $hanmei
     * @return void
     */
    public function setHanmei(?HanmeiModel $hanmei): void;
}