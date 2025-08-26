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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetRireki;

use Plugin\AceClient43\AceServices\Model\Request\Prm\PrmModelAbstract;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

class IdPrmModel extends PrmModelAbstract implements IdPrmModelInterface
{
    private ?string $syid = null;

    private ?OptionsModelInterface $options = null;
    public const PRM_NODE_NAME = 'id';

    /**
     * {@inheritDoc}
     */
    public function getSyid(): string
    {
        return $this->syid;
    }

    /**
     * {@inheritDoc}
     */
    public function setSyid(string $syid): self
    {
        $this->syid = $syid;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getOptions(): OptionsModelInterface
    {
        return $this->options;
    }

    /**
     * {@inheritDoc}
     */
    public function setOptions(OptionsModelInterface $options): self
    {
        $this->options = $options;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function ensureParameterNotMissing(): void
    {
        if (empty($this->syid)) {
            throw new MissingRequestParameterException($this->compilePropertyName('syid'));
        }
    }

    /**
     * {@inheritDoc}
     */
    public function fetchPrmNodeName(): string
    {
        return self::PRM_NODE_NAME;
    }
}
