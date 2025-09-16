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

namespace Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart;

/**
 * Model for Detail
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class DetailModel implements DetailModelInterface
{
    /** @var JyumeiModelInterface[]|null */
    private ?array $jyumei = null;

    /**
     * {@inheritDoc}
     */
    public function getJyumei(): ?array
    {
        return $this->jyumei;
    }

    /**
     * {@inheritDoc}
     */
    public function setJyumei(?array $jyumei): self
    {
        $this->jyumei = $jyumei;

        return $this;
    }
}
