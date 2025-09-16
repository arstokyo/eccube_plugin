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

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;
use Plugin\AceClient43\AceServices\Model\Response\Member\GetRireki\RirekiModelInterface;

/**
 * Interface for MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemberModelInterface extends HasMessageModelInterface, AsListDenormalizableInterface
{


    /**
     * Get Rireki
     *
     * @return RirekiModelInterface
     */
    public function getRireki(): RirekiModelInterface;

    /**
     * Set Rireki
     *
     * @param RirekiModelInterface $rireki
     *
     * @return void
     */
    public function setRireki(RirekiModelInterface $rireki): void;

    /**
     * Get RirekiDetail
     *
     * @return RirekiDetailModel[]|null
     */
    public function getRirekiDetail(): ?array;

    /**
     * Set RirekiDetail
     *
     * @param RirekiDetailModel[]|null $rirekiDetail
     *
     * @return void
     */
    public function setRirekiDetail(?array $rirekiDetail): void;

    /**
     * Get MailJyuden
     *
     * @return MailJyudenModel[]|null
     */
    public function getMailJyuden(): ?array;

    /**
     * Set MailJyuden
     *
     * @param MailJyudenModel[]|null $mailJyuden
     *
     * @return void
     */
    public function setMailJyuden(?array $mailJyuden): void;
}
