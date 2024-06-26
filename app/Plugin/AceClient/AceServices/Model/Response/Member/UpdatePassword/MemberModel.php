<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\UpdatePassword;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelTrait;

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