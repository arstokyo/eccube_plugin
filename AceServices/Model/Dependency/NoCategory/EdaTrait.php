<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

trait EdaTrait
{
     /** @var int|null $eda 納品先枝番号 */
     protected ?int $eda = null;

    /**
      * {@inheritDoc}
      */
     public function getEda(): int|null
     {
         return $this->eda;
     }
 
     /**
      * {@inheritDoc}
      */
     public function setEda(int|null $eda)
     {
         $this->eda = $eda;
         return $this;
     }
}