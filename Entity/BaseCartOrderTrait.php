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

use Plugin\AceClient43\Entity\Constants\TorihikiKubun;

trait BaseCartOrderTrait
{
    /**
     * @var int
     *
     * @ORM\Column(name="ace_torihiki_kubun", type="integer", length=1, nullable=false, options={"comment":"ACE取引区分"})
     */
    private int $ace_torihiki_kubun = TorihikiKubun::TSUDO_BARAI;

    /**
     * Ace決済ID
     *
     * @ORM\Column(name="ace_ksid", type="integer", length=4, options={"comment":"ACE決済ID"})
     *
     * @var int
     */
    private int $ace_ksid;

    /**
     * ace_torihiki_kubunの値を取得する
     *
     * @return int
     */
    public function setAceTorihikiKubun(int $ace_torihiki_kubun): self
    {
        $this->ace_torihiki_kubun = $ace_torihiki_kubun;

        return $this;
    }

    /**
     * ace_torihiki_kubunの値を取得する
     *
     * @return int
     */
    public function getAceTorihikiKubun(): int
    {
        return $this->ace_torihiki_kubun;
    }

    /**
     * Ace決済IDを取得する
     *
     * @return int
     */
    public function getAceKsid(): int
    {
        return $this->ace_ksid;
    }

    /**
     * Ace決済IDを設定する
     *
     * @param int $ace_ksid
     *
     * @return self
     */
    public function setAceKsid(int $ace_ksid): self
    {
        $this->ace_ksid = $ace_ksid;

        return $this;
    }
}
