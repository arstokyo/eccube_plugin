<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart;

use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyuden\JyudenModelGroup2Interface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory\HasSessIdInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface for JyudenModel
 *
 * 拡張フィールド:
 * - planned_shipping_day: 出荷予定日（AceDateTime）
 * - planned_shipping_count: 出荷予定日算出に用いた営業日カウント
 * - planned_shipping_time: 出荷予定時刻/時間帯などの追加情報
 */
interface JyudenModelInterface extends JyudenModelGroup2Interface, HasSessIdInterface
{
    /**
     * 出荷予定日（AceDateTime）
     *
     * @return \DateTimeInterface|null
     */
    public function getPlannedShippingDay(): ?\DateTimeInterface;

    /**
     * 出荷予定日を設定
     *
     * 受け取れる値:
     * - \DateTime
     * - Ymd 等の文字列
     * - null
     *
     * 実装側では AceDateTimeFactory::makeAceDateTime() で正規化してください。
     *
     * @param string|null $day
     *
     * @SerializedName("PLANNED_SHIPPING_DAY")
     *
     * @return self
     */
    public function setPlannedShippingDay(?string $day): self;

    /**
     * 出荷予定日の営業日カウント
     *
     * @return int|null
     */
    public function getPlannedShippingCount(): ?int;

    /**
     * 出荷予定日の営業日カウントを設定
     *
     * @param int|null $count
     *
     * @SerializedName("PLANNED_SHIPPING_COUNT")
     *
     * @return self
     */
    public function setPlannedShippingCount(?int $count): self;

    /**
     * 出荷予定の時間（任意。時間帯や時刻の文字列）
     *
     * @return string|null
     */
    public function getPlannedShippingTime(): ?string;

    /**
     * 出荷予定の時間を設定
     *
     * @param string|null $time
     *
     * @SerializedName("PLANNED_SHIPPING_TIME")
     *
     * @return self
     */
    public function setPlannedShippingTime(?string $time): self;
}
