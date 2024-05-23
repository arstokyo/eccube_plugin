<?php

namespace Plugin\AceClient\AceServices\Model\Response\Goods\GetGoodsMany;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelTrait;
use Plugin\AceClient\AceServices\Model;
use Plugin\AceClient\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class for GoodsModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GoodsModel implements GoodsModelInterface
{
    use HasMessageModelTrait;

    /**
     * @var Model\Dependency\Good\GoodModelGroup3Interface[]|null $Good Good
     */
    private ?array $Good = null;

    /**
     * {@inheritDoc}
     */
    public function getGood(): ?array
    {
        return $this->Good;
    }

    /**
     * {@inheritDoc}
     */
    public function setGood(array|null $good): void
    {
        $this->Good = $good;
    }
    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'Goods' => Model\Dependency\Good\GoodModelGroup3::class
               ];
    }
}