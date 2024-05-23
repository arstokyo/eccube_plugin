<?php

namespace Customize\Entity;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation\EntityExtension;
use Eccube\Entity\Master\Pref;
use \Doctrine\Common\Collections\Collection;

/**
  * @EntityExtension("Eccube\Entity\Customer")
 */
trait CustomerTrait
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="mem_id", type="string", length=255, nullable=true, options={"comment":"ACE顧客ID"}, unique=true)
     */
    private ?string $mem_id = null;


    /**
     * Get the value of mem_id
     * 
     * @return string|null
     */
    public function getMemId(): ?string
    {
        return $this->mem_id;
    }

    /**
     * Set the value of mem_id
     * 
     * @param string|null $mem_id
     * @return self
     */
    public function setMemId(?string $mem_id): self
    {
        $this->mem_id = $mem_id;
        return $this;
    }

}
