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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\RegMemwebEmail;

use Plugin\AceClient43\AceServices\Model\Dependency\Mail;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface for MemwebModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface MemwebModelInterface extends Mail\HasMailInterface, NoCategory\HasMbidInterface
{
    /**
     * {@inheritDoc}
     */
    /** @SerializedName("EMAIL") */
    public function setMail(?string $mail);
}
