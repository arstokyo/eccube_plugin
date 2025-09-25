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
 * Class DetailModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class DetailModel implements DetailModelInterface
{
    /**
     * Hanmei
     *
     * @var HanmeiModel[]|null
     */
    protected ?array $hanmei = null;

    /**
     * {@inheritDoc}
     */
    public function getHanmei(): ?array
    {
        return $this->hanmei;
    }

    /**
     * {@inheritDoc}
     */
    public function setHanmei(?array $hanmei): self
    {
        $this->hanmei = $hanmei;

        return $this;
    }
}
