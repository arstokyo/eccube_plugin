<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetStaff;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class MasterModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MasterModel implements MasterModelInterface
{
    use HasMessageModelTrait;

    /**
     * Staff
     *
     * @var StaffModel[]|null
     */
    protected ?array $staff = null;

    /**
     * {@inheritDoc}
     */
    public function getStaff(): ?array
    {
        return $this->staff;
    }

    /**
     * {@inheritDoc}
     */
    public function setStaff(?array $staff): void
    {
        $this->staff = $staff;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'staff' => StaffModel::class,
        ];
    }
}
