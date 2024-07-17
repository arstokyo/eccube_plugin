<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\GetRirekiDetail;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class for MemberModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MemberModel implements MemberModelInterface
{
    use HasMessageModelTrait;

    /**
     * @var RirekiDetailModelInterface[]|null $RirekiDetail RirekiDetail
     */
    private ?array $RirekiDetail = null;

    /**
     * @var MailJyudenModelInterface[]|null $MailJyuden MailJyuden
     */
    private ?array $MailJyuden = null;

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
                'MailJyuden'   => MailJyudenModel::class
               ];
    }
}