<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetRireki;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class for MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MemberModel implements MemberModelInterface
{
    use HasMessageModelTrait;

    /**
     * @var RirekiModelInterface[]|null $Rireki Rireki
     */
    private ?array $Rireki = null;

    /**
     * {@inheritDoc}
     */
    public function getRireki(): ?array
    {
        return $this->Rireki;
    }

    /**
     * {@inheritDoc}
     */
    public function setRireki(?array $rireki): void
    {
        $this->Rireki = $rireki;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return ['Rireki' => RirekiModel::class];
    }
    
}