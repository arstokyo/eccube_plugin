<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Card;

use Plugin\AceClient\AceServices\Model\Dependency\Card\GMO\GMOModelGroup1Interface;

/**
 * Interface for Card Level 2
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface CardModelLevel2Interface extends GMOModelGroup1Interface
{

    /**
     * Get SPS顧客ID
     * 
     * @return string|null
     */
    public function getSpscustomerid(): ?string;

    /**
     * Set SPS顧客ID
     * 
     * @param string|null $spscustomerid
     * @return $this
     */
    public function setSpscustomerid(?string $spscustomerid);

    /**
     * Get SPSトラッキングID
     * 
     * @return string|null
     */
    public function getSpstid(): ?string;

    /**
     * Set SPSトラッキングID
     * 
     * @param string|null $spstid
     * @return $this
     */
    public function setSpstid(?string $spstid);

    /**
     * Get VeriTransステータス
     * 
     * @return string|null
     */
    public function getVeristatus(): ?string;

    /**
     * Set VeriTransステータス
     * 
     * @param string|null $veristatus
     * @return $this
     */
    public function setVeristatus(?string $veristatus);

    /**
     * Get VeriTrans取引ID
     * 
     * @return string|null
     */
    public function getVeriorderid(): ?string;

    /**
     * Set VeriTrans取引ID
     * 
     * @param string|null $veriorderid
     * @return $this
     */
    public function setVeriorderid(?string $veriorderid);
    
}