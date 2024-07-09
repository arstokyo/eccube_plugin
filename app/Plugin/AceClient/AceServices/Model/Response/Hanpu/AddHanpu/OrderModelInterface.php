<?php

namespace Plugin\AceClient\AceServices\Model\Response\Hanpu\AddHanpu;

use Plugin\AceClient\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient\AceServices\Model\Response;

/**
 * Interface for OrderModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface OrderModelInterface extends HasMessageModelInterface,
                                      Response\AsListDenormalizableInterface
{
    /**
     * Get Handen
     *
     * @return HandenModel|null
     */
    public function getHanden(): ?HandenModel;

    /**
     * Set Handen
     *
     * @param HandenModel|null $handen
     * @return void
     */
    public function setHanden(?HandenModel $handen): void;

    /**
     * Get Hanmei
     *
     * @return HanmeiModel[]|null
     */
    public function getHanmei(): ?array;

    /**
     * Set Hanmei
     *
     * @param HanmeiModel[]|null $hanmei
     * @return void
     */
    public function setHanmei(?array $hanmei): void;

    /**
     * Get Jyusub
     *
     * @return JyusubModel|null
     */
    public function getJyusub(): ?JyusubModel;

    /**
     * Set Jyusub
     *
     * @param JyusubModel|null $jyusub
     * @return void
     */
    public function setJyusub(?JyusubModel $jyusub): void;

    /**
     * Get Jyuden
     *
     * @return JyudenModel|null
     */
    public function getJyuden(): ?JyudenModel;

    /**
     * Set Jyuden
     *
     * @param JyudenModel|null $jyuden
     * @return void
     */
    public function setJyuden(?JyudenModel $jyuden): void;

    /**
     * Get Jyumei
     *
     * @return JyumeiModel[]|null
     */
    public function getJyumei(): ?array;

    /**
     * Set Jyumei
     *
     * @param JyumeiModel[]|null $jyumei
     * @return void
     */
    public function setJyumei(?array $jyumei): void;

    /**
     * Get Point
     *
     * @return PointModel|null
     */
    public function getPoint(): ?PointModel;

    /**
     * Set Point
     *
     * @param PointModel|null $point
     * @return void
     */
    public function setPoint(?PointModel $point): void;

    /**
     * Get MailJyuden
     *
     * @return MailJyudenModel|null
     */
    public function getMailJyuden(): ?MailJyudenModel;

    /**
     * Set MailJyuden
     *
     * @param MailJyudenModel|null $mailJyuden
     * @return void
     */
    public function setMailJyuden(?MailJyudenModel $mailJyuden): void;

    /**
     * Get Coupon
     *
     * @return CouponModel|null
     */
    public function getCoupon(): ?CouponModel;

    /**
     * Set Coupon
     *
     * @param CouponModel|null coupon
     * @return void
     */
    public function setCoupon(?CouponModel $coupon): void;
}