<?php

namespace Plugin\AceClient\AceServices\Model\Response\Hanpu\GetHanpuRireki;

use Plugin\AceClient\AceServices\Model\Dependency\Hanpu\Handen;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\Card;

/**
 * Class for HandenModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HandenModel implements HandenModelInterface
{
    use Handen\HandenModelGroup1Trait,
        Handen\HandenModelGroup2Trait,
        Denpyo\DennoTrait,
        Card\CedaTrait;

    /** @var ?int $nowcnt 現在回数 */
    protected ?int $nowcnt = null;

    /**
     * Hanmei
     *
     * @var HanmeiModel $hanmei
     */
    protected ?HanmeiModel $hanmei  = null;

    /**
     * {@inheritDoc}
     */
    public function getNowcnt(): ?int
    {
        return $this->nowcnt;
    }

    /**
     * {@inheritDoc}
     */
    public function setNowcnt(?int $nowcnt)
    {
        $this->nowcnt = $nowcnt;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    function getHanmei(): ?HanmeiModel
    {
        return $this->hanmei;
    }

    /**
    * {@inheritDoc}
    */
    function setHanmei(?HanmeiModel $hanmei): void
    {
        $this->hanmei = $hanmei;
    }
}