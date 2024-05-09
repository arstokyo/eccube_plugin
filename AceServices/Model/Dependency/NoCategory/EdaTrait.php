<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

trait EdaTrait
{
     /** @var string|null $eda 納品先枝番号 */
     protected ?string $eda = null;

    /**
      * {@inheritDoc}
      */
     public function getEda(): string|null
     {
         return $this->eda;
     }
 
     /**
      * {@inheritDoc}
      */
     public function setEda(string|null $eda)
     {
         $this->eda = $eda;
         return $this;
     }
}