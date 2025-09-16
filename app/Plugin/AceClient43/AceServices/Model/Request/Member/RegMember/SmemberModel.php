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

namespace Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient43\AceServices\Model\Dependency\Person;

/**
 * Class for 請求先顧客情報
 *
 * @author kmorino
 */
class SmemberModel implements SmemberModelInterface
{
    use Person\PersonLevel4Trait;
    use Person\PersonLevel2ExtractTrait;

    /** @var MemMailModelInterface|null */
    private ?MemMailModelInterface $memmail = null;

    /**
     * {@inheritDoc}
     */
    public function getMemmail(): ?MemMailModelInterface
    {
        return $this->memmail;
    }

    /**
     * {@inheritDoc}
     */
    public function setMemmail(?MemMailModelInterface $memmail): self
    {
        $this->memmail = $memmail;

        return $this;
    }
}
