<?php

namespace Plugin\AceClient\AceServices\Model\Response\Hanpu\AddHanpu;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class for OrderModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class OrderModel implements OrderModelInterface
{
    use HasMessageModelTrait;

    /**
     * @var HandenModel|null $handen handen
     */
    private ?HandenModel $handen = null;

    /**
     * @var HanmeiModel[]|null $hanmei hanmei
     */
    private ?array $hanmei = null;

    /**
     * @var JyusubModel|null $jyusub jyusub
     */
    private ?JyusubModel $jyusub = null;

    /**
     * @var JyudenModel|null $jyuden jyuden
     */
    private ?JyudenModel $jyuden = null;

    /**
     * @var JyumeiModel[]|null $jyumei jyumei
     */
    private ?array $jyumei = null;

    /**
     * @var PointModel|null $point point
     */
    private ?PointModel $point = null;

    /**
     * @var MailJyudenModel|null $mailJyuden mailJyuden
     */
    private ?MailJyudenModel $mailJyuden = null;

    /**
     * @var CouponModel|null $coupon Coupon
     */
    private ?CouponModel $coupon = null;

    /**
     * {@inheritDoc}
     */
    public function getHanden(): ?HandenModel{
        return $this->handen;
    }

    /**
     * {@inheritDoc}
     */
    public function setHanden(HandenModel|null $handen): void{
        $this->handen = $handen;
    }

    /**
     * {@inheritDoc}
     */
    public function getHanmei(): ?array{
        return $this->hanmei;
    }

    /**
     * {@inheritDoc}
     */
    public function setHanmei(array|null $hanmei): void{
        $this->hanmei = $hanmei;
    }

    /**
     * {@inheritDoc}
     */
    public function getJyusub(): ?JyusubModel{
        return $this->jyusub;
    }

    /**
     * {@inheritDoc}
     */
    public function setJyusub(JyusubModel|null $jyusub): void{
        $this->jyusub = $jyusub;
    }

    /**
     * {@inheritDoc}
     */
    public function getJyuden(): ?JyudenModel{
        return $this->jyuden;
    }

    /**
     * {@inheritDoc}
     */
    public function setJyuden(JyudenModel|null $jyuden): void{
        $this->jyuden = $jyuden;
    }

    /**
     * {@inheritDoc}
     */
    public function getJyumei(): ?array{
        return $this->jyumei;
    }

    /**
     * {@inheritDoc}
     */
    public function setJyumei(array|null $jyumei): void{
        $this->jyumei = $jyumei;
    }

    /**
     * {@inheritDoc}
     */
    public function getPoint(): ?PointModel{
        return $this->point;
    }

    /**
     * {@inheritDoc}
     */
    public function setPoint(PointModel|null $point): void{
        $this->point = $point;
    }

    /**
     * {@inheritDoc}
     */
    public function getMailJyuden(): ?MailJyudenModel{
        return $this->mailJyuden;
    }

    /**
     * {@inheritDoc}
     */
    public function setMailJyuden(MailJyudenModel|null $mailJyuden): void{
        $this->mailJyuden = $mailJyuden;
    }

    /**
     * {@inheritDoc}
     */
    public function getCoupon(): ?CouponModel{
        return $this->coupon;
    }

    /**
     * {@inheritDoc}
     */
    public function setCoupon(CouponModel|null $coupon): void{
        $this->coupon = $coupon;
    }

    /**
     * {@inheritDoc}
     */
    public static function fetchAsListProperty(): array
    {
        return [
            'hanmei' => HanmeiModel::class,
            'jyumei' => JyumeiModel::class
        ];
    }
}