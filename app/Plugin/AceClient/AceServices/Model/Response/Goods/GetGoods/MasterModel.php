<?php

namespace Plugin\AceClient\AceServices\Model\Response\Goods\GetGoods;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelTrait;
use Plugin\AceClient\AceServices\Model;

/**
 * Class for MasterModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MasterModel implements MasterModelInterface
{
    use HasMessageModelTrait;
    /**
     * @var Model\Dependency\Good\GoodModelGroup1Interface[]|null $Goods Goods
     */
    private ?array $Goods = null;

    /**
     * @var Model\Dependency\Good\GoodTankaModelGroup1Interface[]|null $Gtanka Gtanka
     */
    private ?array $Gtanka = null;

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
    public function getGtanka(): ?array{
        return $this->Gtanka;
    }

    /**
     * {@inheritDoc}
     */
    public function setGtanka(array|null $gtanka): void{
        $this->Gtanka = $gtanka;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'Goods' => Model\Dependency\Good\GoodModelGroup1::class,
                'Gtanka'   => Model\Dependency\Good\GoodTankaModelGroup1::class
               ];
    }
}