<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetMemAnk;

/**
 * Interface for MemAnkModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemAnkModelInterface
{
    /**
     * Get 顧客ID
     *
     * @return ?string
     */
    public function getMbid(): ?string;

    /**
     * Set 顧客ID
     *
     * @param ?string $mbid
     * @return $this
     */
    public function setMbid(?string $mbid): static;

    /**
     * Get フリー項目区分
     *
     * @return ?int
     */
    public function getKubun(): ?int;

    /**
     * Set フリー項目区分
     *
     * @param ?int $kubun
     * @return $this
     */
    public function setKubun(?int $kubun): static;

    /**
     * Get 回答番号
     *
     * @return ?int
     */
    public function getAnsno(): ?int;

    /**
     * Set 回答番号
     *
     * @param ?int $ansno
     * @return $this
     */
    public function setAnsno(?int $ansno): static;

    /**
     * Get アンケートID
     *
     * @return ?string
     */
    public function getAnsid(): ?string;

    /**
     * Set アンケートID
     *
     * @param ?string $ansid
     * @return $this
     */
    public function setAnsid(?string $ansid): static;
}