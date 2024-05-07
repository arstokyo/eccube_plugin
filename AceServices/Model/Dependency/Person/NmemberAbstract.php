<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

/**
 * Abstract class for Nmember
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class NmemberAbstract implements NmemberInterface
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