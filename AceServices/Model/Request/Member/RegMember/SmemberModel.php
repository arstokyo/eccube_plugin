<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\RegMember;

use Plugin\AceClient\AceServices\Model\Dependency\Person;

/**
 * Class for 請求先顧客情報
 * 
 * @author kmorino
 */
class SmemberModel implements SmemberModelInterface
{
    use Person\PersonLevel4Trait,
        Person\PersonLevel2ExtractTrait;

       /** @var MemMailModelInterface|null $memmail */
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