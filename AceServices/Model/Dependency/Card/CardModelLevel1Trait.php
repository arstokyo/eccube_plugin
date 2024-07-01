<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Card;

use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Card Model Level 1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait CardModelLevel1Trait
{
    use CnameTrait;

     /** @var ?string $ccode カード会社コード */
     protected ?string $ccode = null;

     /** @var ?string $cno カード番号 */
     protected ?string $cno = null;
 
     /** @var ?AceDateTime\AceDateTimeInterface $ckigen カード有効期限 */
     protected ?AceDateTime\AceDateTimeInterface $ckigen = null;
 
     /** @var ?int $cpay カード支払方法 */
     protected ?int $cpay = null; 
 
     /** @var ?int $kaisuu カード支払回数 */
     protected ?int $kaisuu = null;
 
     /** @var ?string $syounin カード承認番号 */
     protected ?string $syounin = null;
 
     /**
     * {@inheritDoc}
     */
    public function getCcode(): ?string
    {
        return $this->ccode;
    }

    /**
     * {@inheritDoc}
     */
    public function setCcode(string|null $ccode): static
    {
        $this->ccode = $ccode;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCno(): ?string
    {
        return $this->cno;
    }

    /**
     * {@inheritDoc}
     */
    public function setCno(string|null $cno): static
    {
        $this->cno = $cno;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCkigen(): ?AceDateTime\AceDateTimeInterface
    {
        return $this->ckigen;
    }

    /**
     * {@inheritDoc}
     */
    public function setCkigen(\DateTime|string|null $ckigen): static
    {
        $this->ckigen = AceDateTime\AceDateTimeFactory::makeAceDateTime($ckigen, 'Ym');
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCpay(): ?int
    {
        return $this->cpay;
    }

    /**
     * {@inheritDoc}
     */
    public function setCpay(int|null $cpay): static
    {
        $this->cpay = $cpay;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKaisuu(): ?int
    {
        return $this->kaisuu;
    }

    /**
     * {@inheritDoc}
     */
    public function setKaisuu(int|null $kaisuu): static
    {
        $this->kaisuu = $kaisuu;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSyounin(): ?string
    {
        return $this->syounin;
    }

    /**
     * {@inheritDoc}
     */
    public function setSyounin(string|null $syounin): static
    {
        $this->syounin = $syounin;
        return $this;
    }
}