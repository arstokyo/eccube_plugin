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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\RegMemAdr;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class for Member Model
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class MemberModel implements MemberModelInterface
{
    use HasMessageModelTrait;

    /** @var NmemModel|null Nmem */
    private ?NmemModel $nmember = null;

    /**
     * {@inheritDoc}
     */
    public function getNmember(): ?NmemModel
    {
        return $this->nmember;
    }

    /**
     * {@inheritDoc}
     */
    public function setNmember(?NmemModel $nmember): self
    {
        $this->nmember = $nmember;

        return $this;
    }
}
