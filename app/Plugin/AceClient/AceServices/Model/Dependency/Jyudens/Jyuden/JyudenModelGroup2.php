<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyuden;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\GiftAndCampaign;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\Day;
use Plugin\AceClient\AceServices\Model\Dependency\Person\Nmember;
use Plugin\AceClient\AceServices\Model\Dependency\OkuriAndNouhin;
use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;
use Plugin\AceClient\Utils\Converter\NumberConverter;

/**
 * Model for Jyuden Group2
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class JyudenModelGroup2 implements JyudenModelGroup2Interface
{
    use JyudenModelBaseTrait,
        NoCategory\IdTrait,
        GiftAndCampaign\GiftNoTrait,
        Denpyo\DenkuTrait,
        Denpyo\MemIdTrait,
        Day\DayModelGroup1Trait,
        Nmember\NcodeTrait,
        Nmember\NadrTrait,
        OkuriAndNouhin\OkuriSuuTrait,
        OkuriAndNouhin\OkuriNoTrait,
        OkuriAndNouhin\OkuriNusiTrait,
        Good\GtotalTrait,
        Cost\TTotalTrait,
        Cost\SyoukeiTrait,
        Cost\TotalTrait,
        Cost\Tax\TaxTrait,
        Cost\Tax\UTTotalTrait,
        Cost\Tax\UtaxTrait,
        Cost\Tax\HTTotalTrait,
        Cost\Tax\TaxTotalTrait,
        Cost\Souryou\SouryouZnTrait,
        Cost\Tesuu\TesuuZnTrait,
        Cost\Nebiki\NebikiZnTrait;  

        /** @var ?float $gtotalzn  税抜き商品合計 */
        protected ?float $gtotalzn = null;

        /** @var ?int $hrcd 返品理由コード */
        protected ?int $hrcd = null;

        /** @var ?int $nouhin 納品書印刷フラグ */
        protected ?int $nouhin = null;

        /** @var ?string $tncode 新規入力担当者コード */
        protected ?string $tncode = null;

        /** @var ?float $tyousei 伝票調整額 */
        protected ?float $tyousei = null;

        /** @var ?int $ydaysuu 出荷予定回数 */
        protected ?int $ydaysuu = null;

        /**
         * {@inheritDoc}
         */
        public function getGtotalzn(): ?float
        {
            return $this->gtotalzn;
        }

        /**
         * {@inheritDoc}
         */
        public function setGtotalzn(?string $gtotalzn): static
        {
            $this->gtotalzn = NumberConverter::stringWithCommaToFloat($gtotalzn);
            return $this;
        }

        /**
         * {@inheritDoc}
         */
        public function getHrcd(): ?int
        {
            return $this->hrcd;
        }

        /**
         * {@inheritDoc}
         */
        public function setHrcd(?int $hrcd): static
        {
            $this->hrcd = $hrcd;
            return $this;
        }

        /**
         * {@inheritDoc}
         */
        public function getNouhin(): ?int
        {
            return $this->nouhin;
        }

        /**
         * {@inheritDoc}
         */
        public function setNouhin(?int $nouhin): static
        {
            $this->nouhin = $nouhin;
            return $this;
        }

        /**
         * {@inheritDoc}
         */
        public function getTncode(): ?string
        {
            return $this->tncode;
        }

        /**
         * {@inheritDoc}
         */
        public function setTncode(?string $tncode): static
        {
            $this->tncode = $tncode;
            return $this;
        }

        /**
         * {@inheritDoc}
         */
        public function getTyousei(): ?float
        {
            return $this->tyousei;
        }

        /**
         * {@inheritDoc}
         */
        public function setTyousei(?string $tyousei): static
        {
            $this->tyousei = NumberConverter::stringWithCommaToFloat($tyousei);
            return $this;
        }

        /**
         * {@inheritDoc}
         */
        public function getYdaysuu(): ?int
        {
            return $this->ydaysuu;
        }

        /**
         * {@inheritDoc}
         */
        public function setYdaysuu(?int $ydaysuu): static
        {
            $this->ydaysuu = $ydaysuu;
            return $this;
        }
}