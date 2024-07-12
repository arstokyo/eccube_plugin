<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\UpdateTaikai;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */

class MemberModel implements MemberModelInterface
{
    use HasMessageModelTrait;
    /**
     * Memweb
     *
     * @var MemwebModel $memweb
     */
    protected ?MemwebModel $memweb  = null;

    /**
     * {@inheritDoc}
     */
    function getMemweb(): ?MemwebModel
    {
        return $this->memweb;
    }

    /**
    * {@inheritDoc}
    */
    function setMemweb(?MemwebModel $memweb): void
    {
        $this->memweb = $memweb;
    }
}