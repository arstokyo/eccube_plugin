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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\UpdatePassword;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface UpdatePassword Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface UpdatePasswordRequestModelInterface extends RequestModelInterface, NoCategory\HasPassWdInterface, NoCategory\HasSyidInterface, NoCategory\HasMbidInterface
{
    /**
     * {@inheritDoc}
     */
    /** @SerializedName("password") */
    public function setPasswd(?string $passwd);
}
