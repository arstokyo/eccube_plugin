<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Person;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;
use Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Class for 納品先Model
 * 
 * @author kmorino
 */
class JmemberModel implements JmemberModelInterface
{
    use Person\PersonLevel2ExtractTrait,
        Person\PersonLevel4Trait,
        NoCategory\TaikaiTrait,
        NoCategory\PassWdTrait,
        NoCategory\IcodeTrait,
        Person\User\UserIdTrait,
        PhoneAndPC\MobileIdTrait,
        Point\PointTrait,
        Point\PointKindTrait;

    /** @var MemMailModelInterface|null $memmail */
    private ?MemMailModelInterface $memmail = null;

    /** @var PassWdRemModelInterface|null $passwdrem */
    private ?PassWdRemModelInterface $passwdrem = null;

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