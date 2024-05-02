<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Trait for 3つフリーコード 名称
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait ThreeFnameTrait
{

    /** @var string|null $fname1 フリーコード1名称 */
    protected ?string $fname1 = null;

    /** @var ?string $fname2 フリーコード2名称 */
    protected ?string $fname2 = null;

    /** @var ?string $fname3 フリーコード3名称 */
    protected ?string $fname3 = null;

    /**
     * {@inheritDoc}
     */
    public function getFName1(): ?string
    {
        return $this->fname1;
    }

    public function setFName1(?string $fname1)
    {
        $this->fname1 = $fname1;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFName2(): ?string
    {
        return $this->fname2;
    }

    /**
     * {@inheritDoc}
     */
    public function setFName2(?string $fname2)
    {
        $this->fname2 = $fname2;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFName3(): ?string
    {
        return $this->fname3;
    }

    /**
     * {@inheritDoc}
     */
    public function setFName3(?string $fname3)
    {
        $this->fname3 = $fname3;
        return $this;
    }

}