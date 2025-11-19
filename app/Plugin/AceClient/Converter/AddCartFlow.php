<?php

namespace Plugin\AceClient43\Converter;

/**
 * AddCart APIを使用するフロータイプ
 */
class AddCartFlow
{
    /** カート追加フロー */
    public const CART_ADD = 'cart_add_cart';

    /** 注文確認画面でのカート追加フロー */
    public const SHOPPING_ADD = 'shopping_add_cart';

    /** 注文作成フロー */
    public const CREATE_ORDER = 'create_order';

    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * カート追加フローを作成
     */
    public static function cartAdd(): self
    {
        return new self(self::CART_ADD);
    }

    /**
     * 注文確認画面でのカート追加フローを作成
     */
    public static function shoppingAdd(): self
    {
        return new self(self::SHOPPING_ADD);
    }

    /**
     * 注文作成フローを作成
     */
    public static function createOrder(): self
    {
        return new self(self::CREATE_ORDER);
    }

    /**
     * 文字列からフローを作成
     *
     * @throws \InvalidArgumentException
     */
    public static function fromString(string $value): self
    {
        if (!in_array($value, [self::CART_ADD, self::SHOPPING_ADD, self::CREATE_ORDER], true)) {
            throw new \InvalidArgumentException(sprintf('無効なフロー: %s', $value));
        }

        return new self($value);
    }

    /**
     * フロー値を取得
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * カート追加フローかどうか
     */
    public function isCartAdd(): bool
    {
        return $this->value === self::CART_ADD;
    }

    /**
     * 注文確認画面でのカート追加フローかどうか
     */
    public function isShoppingAdd(): bool
    {
        return $this->value === self::SHOPPING_ADD;
    }

    /**
     * 注文作成フローかどうか
     */
    public function isCreateOrder(): bool
    {
        return $this->value === self::CREATE_ORDER;
    }

    /**
     * 他のフローと等しいかどうか
     */
    public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }
}
