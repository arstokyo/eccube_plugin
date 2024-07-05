<?php

namespace Plugin\AceClient\AceServices\Model\Response\Hanpu\GetHanpuRireki;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class for HanpuModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HanpuModel implements HanpuModelInterface
{
    use HasMessageModelTrait;

    /**
     * @var HandenModel[]|null $handen handen
     */
    private ?array $handen = null;

    /**
     * {@inheritDoc}
     */
    public function getHanden(): ?array
    {
        return $this->handen;
    }

    /**
     * {@inheritDoc}
     */
    public function setHanden(array|null $handen): void
    {
        $this->handen = $handen;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'Handen' =>HandenModel::class
               ];
    }
}