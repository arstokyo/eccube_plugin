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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

interface RegMemberRequestModelInterface extends RequestModelInterface, NoCategory\HasIdInterface, NoCategory\HasSessIdInterface
{
    /**
     * Set オーダー情報
     *
     * @param MemberPrmModelInterface $prm
     *
     * @return self
     */
    public function setPrm(MemberPrmModelInterface $prm): self;

    /**
     * Get オーダー情報
     *
     * @return MemberPrmModelInterface
     */
    public function getPrm(): MemberPrmModelInterface;

    /**
     * {@inheritDoc}
     */
    /** @SerializedName("sessid") */
    public function setSessId(?string $sessId);
}
