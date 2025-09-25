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

namespace Plugin\AceClient43\AceServices\Model\Request\Jyuden\DecisionCart;

use Plugin\AceClient43\AceServices\Model\Request\Prm\PrmModelInterface;

interface IdPrmModelInterface extends PrmModelInterface
{
    /**
     * Get Syid
     *
     * @return string
     */
    public function getSyid(): string;

    /**
     * Set Syid
     *
     * @param string $syid
     *
     * @return self
     */
    public function setSyid(string $syid): self;

    /**
     * Get Options
     *
     * @return OptionsModelInterface
     */
    public function getOptions(): OptionsModelInterface;

    /**
     * Set Options
     *
     * @param OptionsModelInterface $options
     *
     * @return self
     */
    public function setOptions(OptionsModelInterface $options): self;
}
