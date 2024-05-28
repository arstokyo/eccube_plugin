<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetOkuriHkTime;

use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\Haiso;


/**
 * Interface for Okuri Hk Time Response Model
 * 
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */

interface OkuriHkTimeModelInterface extends Haiso\HasOcodeInterface, 
                                            Haiso\HasOnameInterface, 
                                            Haiso\HasOsubnameInterface, 
                                            Denpyo\HasDenkuNumInterface,
                                            Haiso\HasHcodeInterface,
                                            Haiso\HasHnameInterface,
                                            Good\HasJyouonInterface,
                                            Good\HasReizouInterface,
                                            Good\HasReitouInterface,
                                            Haiso\HasHkCodeInterface,
                                            Haiso\HasHkNameInterface
                                            {
                                                /**
                                                 * Get 配送伝票ID
                                                 * 
                                                 * @return int|null
                                                 */
                                                public function getOcode(): ?int;

                                                /**
                                                 * Set 配送伝票ID
                                                 * 
                                                 * @param int|null $ocode
                                                 * @return $this
                                                 */
                                                public function setOcode(?int $ocode): static;

                                                /**
                                                 * Get 配送伝票名称
                                                 * 
                                                 * @return ?string
                                                 */
                                                public function getOname(): ?string;

                                                /**
                                                 * Set 配送伝票名称
                                                 * 
                                                 * @param ?string $name
                                                 * @return $this
                                                 */
                                                public function setOname(?string $name): static;

                                                /**
                                                 * Get 配送伝票略称
                                                 * 
                                                 * @return ?string
                                                 */
                                                public function getOsubname(): ?string;

                                                /**
                                                 * Set 配送伝票略称
                                                 * 
                                                 * @param ?string $subname
                                                 * @return $this
                                                 */
                                                public function setOsubname(?string $subname): static;

                                                /**
                                                 * Get 伝票区分
                                                 * 
                                                 * @return int|null
                                                 */
                                                public function getDenkuNum(): ?int;

                                                /**
                                                 * Set 伝票区分
                                                 * 
                                                 * @param ?int $denkuNum
                                                 * @return $this
                                                 */
                                                public function setDenkuNum(?int $denkuNum): static;

                                                /**
                                                 * Get 配送会社ID
                                                 * 
                                                 * @return int|null
                                                 */
                                                public function getHcode(): ?int;

                                                /**
                                                 * Set 配送会社ID
                                                 * 
                                                 * @param ?int $hcode
                                                 * @return $this
                                                 */
                                                public function setHcode(?int $hcode): static;

                                                /**
                                                 * Get 配送会社名称
                                                 * 
                                                 * @return ?string
                                                 */
                                                public function getHname(): ?string;

                                                /**
                                                 * Set 配送会社名称
                                                 * 
                                                 * @param ?string $hname
                                                 * @return $this
                                                 */
                                                public function setHname(?string $hname): static;

                                                /**
                                                 * Get has 常温
                                                 * 
                                                 * @return int|null
                                                 */
                                                public function getJyouon(): ?int;

                                                /**
                                                 * Set has 常温
                                                 * 
                                                 * @param ?int $jyouon
                                                 * @return $this
                                                 */
                                                public function setJyouon(?int $jyouon): static;

                                                /**
                                                 * Get has 冷蔵
                                                 * 
                                                 * @return int|null
                                                 */
                                                public function getReizou(): ?int;

                                                /**
                                                 * Set has 冷蔵
                                                 * 
                                                 * @param ?int $reizou
                                                 * @return $this
                                                 */
                                                public function setReizou(?int $reizou): static;

                                                /**
                                                 * Get has 冷凍
                                                 * 
                                                 * @return int|null
                                                 */
                                                public function getReitou(): ?int;

                                                /**
                                                 * Set has 冷凍
                                                 * 
                                                 * @param ?int $reitou
                                                 * @return $this
                                                 */
                                                
                                                public function setReitou(?int $reitou): static;

                                                /**
                                                 * Get 配送時間ID
                                                 * 
                                                 * @return int|null
                                                 */
                                                public function getHkCode(): ?int;

                                                /**
                                                 * Set 配送時間ID
                                                 * 
                                                 * @param ?int $hkCode
                                                 * @return $this
                                                 */
                                                public function setHkCode(?int $hkCode): static;

                                                /**
                                                 * Get 配送時間名称
                                                 * 
                                                 * @return ?string
                                                 */
                                                public function getHkName(): ?string;

                                                /**
                                                 * Set 配送時間名称
                                                 * 
                                                 * @param ?string $hkname
                                                 * @return $this
                                                 */
                                                public function setHkName(?string $hkName): static;


                                            }
