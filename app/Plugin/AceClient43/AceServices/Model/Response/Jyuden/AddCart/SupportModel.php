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

namespace Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart;

/**
 * Model for Support (ACE受注サポート行)
 *
 * ACE API から返却される <support> 要素の1行を表します。
 * フィールドは Jyuden.response の仕様に準拠します。
 */
class SupportModel
{
    public const POINT_GIVE_KBN = 2;

    /** @var int|null システムID */
    protected ?int $syid = null;

    /** @var int|null 伝票番号 */
    protected ?int $nouno = null;

    /** @var int|null 枝番 */
    protected ?int $edano = null;

    /** @var int|null サポートID */
    protected ?int $spid = null;

    /** @var int|null 付与区分 */
    protected ?int $givekbn = null;

    /** @var int|null 付与ID */
    protected ?int $giveid = null;

    /** @var int|null 行番号 */
    protected ?int $line = null;

    /** @var float|null 数量 */
    protected ?float $suu = null;

    /** @var float|null 単価（税抜/税込はAPI仕様に準拠） */
    protected ?float $tanka = null;

    public function getSyid(): ?int
    {
        return $this->syid;
    }

    public function setSyid($syid): void
    {
        $this->syid = $syid !== null && $syid !== '' ? (int) $syid : null;
    }

    public function getNouno(): ?int
    {
        return $this->nouno;
    }

    public function setNouno($nouno): void
    {
        $this->nouno = $nouno !== null && $nouno !== '' ? (int) $nouno : null;
    }

    public function getEdano(): ?int
    {
        return $this->edano;
    }

    public function setEdano($edano): void
    {
        $this->edano = $edano !== null && $edano !== '' ? (int) $edano : null;
    }

    public function getSpid(): ?int
    {
        return $this->spid;
    }

    public function setSpid($spid): void
    {
        $this->spid = $spid !== null && $spid !== '' ? (int) $spid : null;
    }

    public function getGivekbn(): ?int
    {
        return $this->givekbn;
    }

    public function setGivekbn($givekbn): void
    {
        $this->givekbn = $givekbn !== null && $givekbn !== '' ? (int) $givekbn : null;
    }

    public function getGiveid(): ?int
    {
        return $this->giveid;
    }

    public function setGiveid($giveid): void
    {
        $this->giveid = $giveid !== null && $giveid !== '' ? (int) $giveid : null;
    }

    public function getLine(): ?int
    {
        return $this->line;
    }

    public function setLine($line): void
    {
        $this->line = $line !== null && $line !== '' ? (int) $line : null;
    }

    public function getSuu(): ?float
    {
        return $this->suu;
    }

    public function setSuu($suu): void
    {
        $this->suu = $suu !== null && $suu !== '' ? (float) $suu : null;
    }

    public function getTanka(): ?float
    {
        return $this->tanka;
    }

    public function setTanka($tanka): void
    {
        $this->tanka = $tanka !== null && $tanka !== '' ? (float) $tanka : null;
    }

    public function getEarnablePoints(): int
    {
        return $this->getGivekbn() === self::POINT_GIVE_KBN && $this->suu !== null && $this->tanka !== null ? (int) ($this->suu * $this->tanka) : 0;
    }
}
