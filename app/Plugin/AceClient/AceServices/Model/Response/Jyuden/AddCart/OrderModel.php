<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Model for Order.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class OrderModel implements OrderModelInterface
{
    use HasMessageModelTrait;

    /** @var JyusubModel|null $jyusub  */
    private ?JyusubModel $jyusub = null;

    /** @var JyudenModel|null $jyuden  */
    private ?JyudenModel $jyuden = null;

    /** @var JyumeiModel[]|null $jyumei  */
    private ?array $jyumei = null;

    /** @var PointModel|null $point */
    private ?PointModel $point = null;

    /** @var MailJyudenModel|null $mailjyuden */
    private ?MailJyudenModel $mailjyuden = null;


    /**
     * {@inheritDoc}
     */
    public function getJyusub(): ?JyusubModel
    {
        return $this->jyusub;
    }

    /**
     * {@inheritDoc}
     */
    public function setJyusub(?JyusubModel $jyusub): void
    {
        $this->jyusub = $jyusub;
    }

    /**
     * {@inheritDoc}
     */
    public function getJyuden(): ?JyudenModel
    {
        return $this->jyuden;
    }

    /**
     * {@inheritDoc}
     */
    public function setJyuden(?JyudenModel $jyuden): void
    {
        $this->jyuden = $jyuden;
    }

    /**
     * {@inheritDoc}
     */
    public function getJyumei(): ?array
    {
        return $this->jyumei;
    }

    /**
     * {@inheritDoc}
     */
    public function setJyumei(?array $jyumei): void
    {
        $this->jyumei = $jyumei;
    }

    /**
     * {@inheritDoc}
     */
    public function getPoint(): ?PointModel
    {
        return $this->point;
    }

    /**
     * {@inheritDoc}
     */
    public function setPoint(?PointModel $point): void
    {
        $this->point = $point;
    }

    /**
     * {@inheritDoc}
     */
    public function getMailJyuden(): ?MailJyudenModel
    {
        return $this->mailjyuden;
    }

    /**
     * {@inheritDoc}
     */
    public function setMailJyuden(?MailJyudenModel $mailjyuden): void
    {
        $this->mailjyuden = $mailjyuden;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'jyumei' => JyumeiModel::class
        ];
    }

}