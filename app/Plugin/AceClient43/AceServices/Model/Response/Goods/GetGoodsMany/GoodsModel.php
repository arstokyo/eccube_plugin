<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetGoodsMany;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;
use Plugin\AceClient43\AceServices\Model;

/**
 * Class for GoodsModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GoodsModel implements GoodsModelInterface
{
    use HasMessageModelTrait;

    /**
     * @var GoodModelInterface[]|null $Good Good
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
    public function setGood(?array $good): void
    {
        $this->Good = $good;
    }
    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'Goods' => GoodModel::class
               ];
    }
}