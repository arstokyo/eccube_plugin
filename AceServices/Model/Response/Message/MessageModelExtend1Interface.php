<?php

namespace Plugin\AceClient\AceServices\Model\Response\Message;

use Plugin\AceClient\AceServices\Model\Response\Message\MessageModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Message ModelExtend1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MessageModelExtend1Interface extends MessageModelInterface, NoCategory\HasTaikaiInterface,
                                               NoCategory\HasCodeInterface
{
    /**
     * Get メールアドレス
     */
    public function getAdress(): ?string;

    /**
     * Set メールアドレス
     *
     * @param ?string $adress
     * @return void
     */
    public function setAdress(?string $adress);

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

}