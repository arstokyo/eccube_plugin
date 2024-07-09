<?php
namespace Plugin\AceClient\AceServices\Model\Response\Goods\GetNyukaYotei;

use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Class for GoodsModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GoodsModel implements GoodsModelInterface
{
    use Good\GdidTrait,
        NoCategory\NameTrait,
        NoCategory\SuuTrait;

    /** @var ?AceDateTime\AceDateTime $nyday 入荷予定日 */
    protected ?AceDateTime\AceDateTime $nyday = null;

    /**
     * {@inheritDoc}
     */
    public function getNyday()
    {
        return $this->nyday;
    }

    /**
     * {@inheritDoc}
     */
    public function setNyday($nyday)
    {
        $this->nyday = AceDateTime\AceDateTimeFactory::makeAceDateTime($nyday);
        return $this;
    }
}