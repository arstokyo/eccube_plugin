<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Mail\MailJyuden;

/**
 * Interface For MailJyudenModelLevel2
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MailJyudenModelLevel2Interface extends MailJyudenModelLevel1Interface
{

    /**
     * Get メール区分
     *
     * @return ?int
     */
    public function getMailkbn(): ?int;

    /**
     * Set メール区分
     *
     * @param ?int $mailkbn
     */
    public function setMailkbn(?int $mailkbn);

    /**
     * Get 受注メールコメント
     *
     * @return ?string
     */
    public function getJbikou(): ?string;

    /**
     * Set 受注メールコメント
     *
     * @param ?string $jbikou
     */
    public function setJbikou(?string $jbikou);

    /**
     * Get 出荷メールコメント
     *
     * @return ?string
     */
    public function getSbikou(): ?string;

    /**
     * Set 出荷メールコメント
     *
     * @param ?string $sbikou
     */
    public function setSbikou(?string $sbikou);
}