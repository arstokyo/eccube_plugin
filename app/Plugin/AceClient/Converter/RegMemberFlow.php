<?php

namespace Plugin\AceClient43\Converter;

/**
 * RegMember APIを使用するフロータイプ
 */
class RegMemberFlow
{
    /** フロント会員登録フロー */
    public const FRONT_NEW = 'front_new';

    /** フロント会員更新フロー */
    public const FRONT_UPDATE = 'front_update';

    /** 管理画面会員登録フロー */
    public const ADMIN_NEW = 'admin_new';

    /** 管理画面会員更新フロー */
    public const ADMIN_UPDATE = 'admin_update';

    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * フロント会員登録フローを作成
     */
    public static function frontNew(): self
    {
        return new self(self::FRONT_NEW);
    }

    /**
     * フロント会員更新フローを作成
     */
    public static function frontUpdate(): self
    {
        return new self(self::FRONT_UPDATE);
    }

    /**
     * 管理画面会員登録フローを作成
     */
    public static function adminNew(): self
    {
        return new self(self::ADMIN_NEW);
    }

    /**
     * 管理画面会員更新フローを作成
     */
    public static function adminUpdate(): self
    {
        return new self(self::ADMIN_UPDATE);
    }

    /**
     * 文字列からフローを作成
     *
     * @throws \InvalidArgumentException
     */
    public static function fromString(string $value): self
    {
        if (!in_array($value, [
            self::FRONT_NEW,
            self::FRONT_UPDATE,
            self::ADMIN_NEW,
            self::ADMIN_UPDATE,
        ], true)) {
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
     * フロント会員登録フローかどうか
     */
    public function isFrontNew(): bool
    {
        return $this->value === self::FRONT_NEW;
    }

    /**
     * フロント会員更新フローかどうか
     */
    public function isFrontUpdate(): bool
    {
        return $this->value === self::FRONT_UPDATE;
    }

    public function isFront(): bool
    {
        return in_array($this->value, [self::FRONT_NEW, self::FRONT_UPDATE], true);
    }

    /**
     * 管理画面会員登録フローかどうか
     */
    public function isAdminNew(): bool
    {
        return $this->value === self::ADMIN_NEW;
    }

    /**
     * 管理画面会員更新フローかどうか
     */
    public function isAdminUpdate(): bool
    {
        return $this->value === self::ADMIN_UPDATE;
    }

    public function isAdmin(): bool
    {
        return in_array($this->value, [self::ADMIN_NEW, self::ADMIN_UPDATE], true);
    }

    public function isNew(): bool
    {
        return in_array($this->value, [self::FRONT_NEW, self::ADMIN_NEW], true);
    }

    public function isUpdate(): bool
    {
        return in_array($this->value, [self::FRONT_UPDATE, self::ADMIN_UPDATE], true);
    }

    /**
     * 他のフローと等しいかどうか
     */
    public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }
}
