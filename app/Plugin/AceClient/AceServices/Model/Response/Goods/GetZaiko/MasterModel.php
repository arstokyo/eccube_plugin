<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetZaiko;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class for MasterModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MasterModel implements MasterModelInterface
{
    use HasMessageModelTrait;
    /**
     * @var GoodModel|null $Goods Goods
     */
    private ?GoodModel $Goods = null;

    /**
     * {@inheritDoc}
     */
    public function getGoods(): ?GoodModel{
        return $this->Goods;
    }

    /**
     * {@inheritDoc}
     */
    public function setGoods(?GoodModel $goods): void{
        $this->Goods = $goods;
    }
}