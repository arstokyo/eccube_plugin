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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\UpdateTaikai;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelInterface;

/**
 * Interface UpdateTaikai Response Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface UpdateTaikaiResponseModelInterface extends ResponseModelInterface
{
    /**
     * Get Member
     *
     * @return MemberModel
     */
    public function getMember(): MemberModel;

    /**
     * Set Member
     *
     * @return void
     */
    public function setMember(MemberModel $member): void;
}
