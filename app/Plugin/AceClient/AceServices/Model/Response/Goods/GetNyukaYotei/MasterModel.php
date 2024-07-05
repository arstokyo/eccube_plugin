<?php

namespace Plugin\AceClient\AceServices\Model\Response\Goods\GetNyukaYotei;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class for MasterModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MasterModel implements MasterModelInterface
{
    use HasMessageModelTrait;

    /**
     * @var GoodsModel[]|null $Goods Goods
     */
    private ?array $Goods = null;

    /**
     * {@inheritDoc}
     */
    public function getGoods(): ?array{
        return $this->Goods;
    }

    /**
     * {@inheritDoc}
     */
    public function setGoods(array|null $goods): void{
        $this->Goods = $goods;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'Goods' =>GoodsModel::class
               ];
    }
}