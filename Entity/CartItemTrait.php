<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation\EntityExtension;

/**
 * @EntityExtension("Eccube\Entity\CartItem")
 */
trait CartItemTrait
{
    use BaseItemTrait;

    /**
     * カートアイテムの未確定状態フラグ.
     *
     * 目的:
     * - ユーザーがカート画面を経由せずに購入フローへ進むことを防止するためのフラグです。
     * - 新規作成時は true（未確定）とし、数量や価格が変更された場合も true に戻します。
     *
     * クリア（false化）のタイミングは、別途アプリ側の適切なタイミングで行ってください。
     *
     * @var bool
     *
     * @ORM\Column(name="dirty", type="boolean", options={"default": true})
     */
    private $dirty = true;

    /**
     * 未確定状態かどうか.
     */
    public function isDirty(): bool
    {
        return (bool) $this->dirty;
    }

    /**
     * 未確定状態を設定.
     */
    public function setDirty(bool $dirty): self
    {
        $this->dirty = $dirty;

        return $this;
    }

    /**
     * 未確定にマークするヘルパー.
     */
    public function markDirty(): self
    {
        return $this->setDirty(true);
    }
}
