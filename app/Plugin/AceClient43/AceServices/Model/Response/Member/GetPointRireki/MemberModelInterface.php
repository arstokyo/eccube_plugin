<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetPointRireki;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;

/**
 * Interface for Member Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemberModelInterface extends HasMessageModelInterface,
                                       AsListDenormalizableInterface
{
    /**
     * Get Point
     *
     * @return PointModel[]|null
     */
    public function getPoint(): ?array;

    /**
     * Set Point
     *
     * @param PointModel[]|null $point
     * @return void
     */
    public function setPoint(?array $point): void;
}