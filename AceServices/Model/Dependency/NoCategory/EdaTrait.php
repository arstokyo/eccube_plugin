<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

trait EdaTrait
{
     /** @var int|string|null $eda 納品先枝番号 */
     protected int|string|null $eda = null;

    /**
      * {@inheritDoc}
      */
     public function getEda(): int|string|null
     {
         return $this->eda;
     }
 
     /**
      * {@inheritDoc}
      */
     public function setEda(int|string|null $eda)
     {
         $this->eda = $eda;
         return $this;
     }
}