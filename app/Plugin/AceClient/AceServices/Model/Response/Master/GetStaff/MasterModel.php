<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetStaff;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelTrait;

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
     * @var StaffModel[]|null $staff
     */
    protected ?array $staff  = null;

    /**
     * {@inheritDoc}
     */
    function getStaff(): ?array
    {
        return $this->staff;
    }

    /**
    * {@inheritDoc}
    */
    function setStaff(?array $staff): void
    {
        $this->staff = $staff;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
                'staff' => StaffModel::class
               ];
    }
}