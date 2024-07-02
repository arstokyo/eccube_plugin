<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetDurationOrderTotal;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class for MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MemberModel implements MemberModelInterface
{
    use HasMessageModelTrait;

    /**
     * @var TotalModel $total total
     */
    private ?TotalModel $total = null;

    /**
     * {@inheritDoc}
     */
    public function getTotal(): ?TotalModel
    {
        return $this->total;
    }

    /**
     * {@inheritDoc}
     */
    public function setTotal(?TotalModel $total): void
    {
        $this->total = $total;
    }
}