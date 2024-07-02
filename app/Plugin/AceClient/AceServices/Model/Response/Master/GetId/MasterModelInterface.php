<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetId;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient\AceServices\Model\Response\AsListDenormalizableInterface;

/**
 * Interface for MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MasterModelInterface extends HasMessageModelInterface,
                                       AsListDenormalizableInterface
{
    /**
    * Get Id
    *
    * @return IdModel[]|null
    */
    public function getId(): ?array;

    /**
     * Set Id
     *
     * @param IdModel[]|null $id
     * @return void
     */
    public function setId(?array $id): void;
}