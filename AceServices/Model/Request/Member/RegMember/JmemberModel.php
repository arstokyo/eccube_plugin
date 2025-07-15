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

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Person;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;

/**
 * Class for 納品先Model
 *
 * @author kmorino
 */
class JmemberModel implements JmemberModelInterface
{
    use Person\PersonLevel2ExtractTrait;
    use Person\PersonLevel4Trait;
    use NoCategory\TaikaiTrait;
    use NoCategory\PassWdTrait;
    use NoCategory\IcodeTrait;
    use Person\User\UserIdTrait;
    use PhoneAndPC\MobileIdTrait;
    use Point\PointTrait;
    use Point\PointKindTrait;

    /** @var MemMailModel[] */
    private array $memmail = [];

    /** @var PassWdRemModelInterface|null */
    private ?PassWdRemModelInterface $passwdrem = null;

    /**
     * {@inheritDoc}
     */
    public function getMemmail(): array
    {
        return $this->memmail;
    }

    /**
     * {@inheritDoc}
     */
    public function setMemmail(array $memmail): self
    {
        $this->memmail = $memmail;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPasswdrem(): ?PassWdRemModelInterface
    {
        return $this->passwdrem;
    }

    /**
     * {@inheritDoc}
     */
    public function setPasswdrem(?PassWdRemModelInterface $passwdrem): self
    {
        $this->passwdrem = $passwdrem;

        return $this;
    }
}
