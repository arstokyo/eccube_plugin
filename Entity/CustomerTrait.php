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
 * @EntityExtension("Eccube\Entity\Customer")
 */
trait CustomerTrait
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="mem_id", type="string", length=255, nullable=true, options={"comment":"ACE顧客ID"}, unique=true)
     */
    private ?string $ace_mbid = null;

    /**
     * mem_idの値を取得する
     *
     * @return string|null
     */
    public function getAceMemberId(): ?string
    {
        return $this->ace_mbid;
    }

    /**
     * mem_idの値を設定する
     *
     * @param string|null $ace_mbid
     *
     * @return self
     */
    public function setAceMemberId(?string $ace_mbid): self
    {
        $this->ace_mbid = $ace_mbid;

        return $this;
    }
}
