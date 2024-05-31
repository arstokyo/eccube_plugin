<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master2\GetHaisouDay;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;
use Plugin\AceClient\AceServices\Model\Response\AsSpecificNodeResponseInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface for Get Haisou Day Response Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface GetHaisouDayResponseModelInterface extends ResponseModelInterface, AsSpecificNodeResponseInterface
{
    
    /**
     * Get Day
     * 
     * @return ?int
     */
    public function getDay(): ?int;


    /**
     * Set Day
     * 
     * @param ?int $day 
     */
    #[SerializedName('getHaisouDayResult')]
    public function setDay(?int $day): void;
    
}