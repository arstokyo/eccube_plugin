<?php

namespace Plugin\AceClient\AceServices\Model\Response\Goods\GetZaiko;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Good\GoodModelGroup4;

/**
 * Class for MasterModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MasterModel implements MasterModelInterface
{
    use HasMessageModelTrait;
    /**
     * @var GoodModelGroup4|null $Goods Goods
     */
    private ?GoodModelGroup4 $Goods = null;

    /**
     * {@inheritDoc}
     */
    public function getGoods(): ?GoodModelGroup4{
        return $this->Goods;
    }

    /**
     * {@inheritDoc}
     */
    public function setGoods(GoodModelGroup4|null $goods): void{
        $this->Goods = $goods;
    }
}