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

/**
 * interface for メールアドレスModel
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface MemMailModelInterface
{
    /**
     * Get メールアドレス子モデル
     *
     * @return MemMailChildModelInterface[]|null メールアドレス子モデル
     */
    public function getMemmailChild(): array;

    /**
     * Set メールアドレス子モデル
     *
     * @param MemMailChildModelInterface[] $memmailChild メールアドレス子モデル
     *
     * @return self
     */
    public function setMemmailChild(array $memmailChild): self;
}
