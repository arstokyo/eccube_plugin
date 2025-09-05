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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetRirekiDetail;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetRireki\RirekiModelInterface;

/**
 * Class for MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MemberModel implements MemberModelInterface
{
    use HasMessageModelTrait;

    /**
     * @var RirekiModelInterface Rireki
     */
    private ?RirekiModelInterface $Rireki = null;

    /**
     * @var RirekiDetailModelInterface[]|null RirekiDetail
     */
    private ?array $RirekiDetail = null;

    /**
     * @var MailJyudenModelInterface[]|null MailJyuden
     */
    private ?array $MailJyuden = null;

    /**
     * {@inheritDoc}
     */
    public function getRireki(): RirekiModelInterface
    {
        return $this->Rireki;
    }

    /**
     * {@inheritDoc}
     */
    public function setRireki(RirekiModelInterface $rireki): void
    {
        $this->Rireki = $rireki;
    }

    /**
     * {@inheritDoc}
     */
    public function getRirekiDetail(): ?array
    {
        return $this->RirekiDetail;
    }

    /**
     * {@inheritDoc}
     */
    public function setRirekiDetail(?array $rirekiDetail): void
    {
        $this->RirekiDetail = $rirekiDetail;
    }

    /**
     * {@inheritDoc}
     */
    public function getMailJyuden(): ?array
    {
        return $this->MailJyuden;
    }

    /**
     * {@inheritDoc}
     */
    public function setMailJyuden(?array $mailJyuden): void
    {
        $this->MailJyuden = $mailJyuden;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'RirekiDetail' => RirekiDetailModel::class,
            'MailJyuden' => MailJyudenModel::class,
        ];
    }
}
