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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\DeleteSbpsCustId;

use Plugin\AceClient43\AceServices\Model\Response\ResponseModelAbtract;

/**
 * Class GetSbpsCustIdResponseModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GetSbpsCustIdResponseModel extends ResponseModelAbtract implements GetSbpsCustIdResponseModelInterface
{
    /**
     * @var GetsbpscustidModelInterface
     */
    protected GetsbpscustidModelInterface $Member;

    /**
     * {@inheritDoc}
     */
    public function getGetSbpsCustId(): GetsbpscustidModelInterface
    {
        return $this->Member;
    }

    /**
     * {@inheritDoc}
     */
    public function setGetSbpsCustId(GetsbpscustidModel $member): void
    {
        $this->Member = $member;
    }
}
