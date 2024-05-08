<?php

namespace Plugin\AceClient\AceServices\Model\Response\Message;
use Plugin\AceClient\AceServices\Model\Response\Message\MessageModelInterface;
/**
 * Interface for Message ModelExtend1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MessageModelExtend1Interface extends MessageModelInterface
{
    /**
     * Get メールアドレス
     */
    public function getAddress(): ?string;

    /**
     * Set メールアドレス
     *
     * @param ?string $address
     * @return void
     */
    public function setAddress(?string $address);

    /**
     * Get 結果
     */
    public function getResult(): ?string;

    /**
     * Set 結果
     *
     * @param ?string $result
     * @return void
     */
    public function setResult(?string $result);
    /**
     * Get 顧客コード
     */
    public function getCode(): ?string;
    /**
     * Set 顧客コード
     *
     * @param ?string $code
     * @return void
     */
    public function setCode(?string $code);
    /**
     * Get 退会フラグ
     */
    public function getTaikai(): ?string;

    /**
     * Set 退会フラグ
     *
     * @param ?string $taikai
     * @return void
     */
    public function setTaikai(?string $taikai);
}