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
 * Interface for Detail Model
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface DetailModelInterface
{
    /**
     * Get Jyumeis
     *
     * @return JyumeiModelInterface[]|null
     */
    public function getJyumei(): ?array;

    /**
     * Set Jyumeis
     *
     * @param JyumeiModel[]|null $jyumei
     *
     * @return self
     */
    public function setJyumei(?array $jyumei): self;
}
