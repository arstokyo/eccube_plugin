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

use Plugin\AceClient43\AceServices\Model\Dependency\Person;

class MemberOrderModel implements MemberOrderModelInterface
{
    /**
     * @var ?Person\Nmember\NmemberModelInterface
     */
    private ?Person\Jmember\JmemberModelInterface $jmember = null;

    /**
     * @var ?Person\Nmember\NmemberModelInterface
     */
    private ?Person\Nmember\NmemberModelInterface $nmember = null;

    /**
     * @var ?Person\Smember\SmemberModelInterface
     */
    private ?Person\Smember\SmemberModelInterface $smember = null;

    /**
     * {@inheritDoc}
     */
    public function setJmember(?Person\Jmember\JmemberModelInterface $jmember): self
    {
        $this->jmember = $jmember;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setNmember(?Person\Nmember\NmemberModelInterface $nmember): self
    {
        $this->nmember = $nmember;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setSmember(?Person\Smember\SmemberModelInterface $smember): self
    {
        $this->smember = $smember;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getJmember(): ?Person\Jmember\JmemberModelInterface
    {
        return $this->jmember;
    }

    /**
     * {@inheritDoc}
     */
    public function getNmember(): ?Person\Nmember\NmemberModelInterface
    {
        return $this->nmember;
    }

    /**
     * {@inheritDoc}
     */
    public function getSmember(): ?Person\Smember\SmemberModelInterface
    {
        return $this->smember;
    }
}
