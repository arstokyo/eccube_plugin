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

namespace Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyumei\JyumeiModelGroup1;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Model for Jyumei
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class JyumeiModel extends JyumeiModelGroup1 implements JyumeiModelInterface
{
    /**
     * 商品情報に付随するフリーフィールドを
     * JSON文字列として保持するプロパティ
     *
     * @var string|null
     */
    #[SerializedName('jyumeifree')]
    private ?string $jyumeiFree = null;

    public function getJyumeiFree(): ?string
    {
        return $this->jyumeiFree;
    }

    /**
     * 配列をnull除外してJSONに変換し、プロパティにセットする
     */
    public function setJyumeiFree(?array $free): self
    {
        $filteredFree = array_filter($free, function ($value) {
            return $value !== null;
        });
        $this->jyumeiFree = json_encode($filteredFree);

        return $this;
    }
}
