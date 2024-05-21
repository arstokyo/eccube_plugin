<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Message;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Message ModelExtend1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MessageModelExtend2Interface extends MessageModelExtend1Interface, NoCategory\HasTaikaiInterface,
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
     * @return $this
     */
    public function setAdress(?string $adress): static;

}