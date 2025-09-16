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

use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Class for メールアドレスModel
 *
 * @author v.t.nguyen@ar-system.co.jp
 */
class MemMailModel implements MemMailModelInterface
{
    /**
     * @var MemMailChildModelInterface[]
     *
     * @SerializedName("memmail_child")
     */
    private array $memmailChild = [];

    /**
     * {@inheritDoc}
     */
    public function getMemmailChild(): array
    {
        return $this->memmailChild;
    }

    /**
     * {@inheritDoc}
     */
    public function setMemmailChild(array $memmailChild): self
    {
        $this->memmailChild = $memmailChild;

        return $this;
    }
}
