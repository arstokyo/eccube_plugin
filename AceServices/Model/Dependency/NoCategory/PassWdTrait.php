<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for パスワード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PassWdTrait
{
    /** @var string $passwd パスワード */
    protected ?string $passwd = null;

    /**
     * {@inheritDoc}
     */
    public function getPasswd(): ?string
    {
        return $this->passwd;
    }

    /**
     * {@inheritDoc}
     */
    public function setPasswd(?string $passwd): static
    {
        $this->passwd = $passwd;
        return $this;
    }
}