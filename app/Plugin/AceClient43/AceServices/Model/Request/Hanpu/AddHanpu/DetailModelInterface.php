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

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\AddHanpu;

/**
 * Interface for DetailModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface DetailModelInterface
{
    /**
     * Get Hanmei
     *
     * @return HanmeiModel[]|null
     */
    public function getHanmei(): ?array;

    /**
     * Set Hanmei
     *
     * @param HanmeiModel[]|null $hanmei
     *
     * @return self
     */
    public function setHanmei(?array $hanmei): self;
}
