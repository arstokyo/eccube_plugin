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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetOkuriHkTime;

use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface for Okuri Hk Time Response Model
 *
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */
interface OkuriHkTimeModelInterface extends Haiso\HasOcodeInterface, Haiso\HasOnameInterface, Haiso\HasOsubnameInterface, Denpyo\HasDenkuNumInterface, Haiso\HasHcodeInterface, Haiso\HasHnameInterface, Good\HasJyouonInterface, Good\HasReizouInterface, Good\HasReitouInterface, Haiso\HasHkCodeInterface, Haiso\HasHkNameInterface
{
    /**
     * Set 伝票区分
     *
     * @param ?int $denkuNum
     *
     * @return $this
     */
    /** @SerializedName("KUBUN") */
    public function setDenkuNum(?int $denkuNum);
}
