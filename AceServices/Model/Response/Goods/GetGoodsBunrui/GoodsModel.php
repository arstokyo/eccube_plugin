<?php
namespace Plugin\AceClient\AceServices\Model\Response\Goods\GetGoodsBunrui;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou;

/**
 * Class for GoodsModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GoodsModel implements GoodsModelInterface
{
    use NoCategory\NameTrait,
        Bikou\ThreeNotesTrait;

    /** @var ?string $kubun 分類区分 */
    protected ?string $kubun = null;

    /** @var ?string $fcid 分類ID */
    protected ?string $fcid = null;

    /**
     * {@inheritDoc}
     */
    public function getKubun(): ?string
    {
        return $this->kubun;
    }

    /**
     * {@inheritDoc}
     */
    public function setKubun(?string $kubun)
    {
        $this->kubun = $kubun;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFcid(): ?string
    {
        return $this->fcid;
    }

    /**
     * {@inheritDoc}
     */
    public function setFcid(?string $fcid)
    {
        $this->fcid = $fcid;
        return $this;
    }
}