<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetRirekiDetail;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient\AceServices\Model\Response\AsListDenormalizableInterface;


/**
 * Interface for MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemberModelInterface extends HasMessageModelInterface,
                                       AsListDenormalizableInterface
{
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
     * @return void
     */
    public function setMailJyuden(?array $mailJyuden): void;
}