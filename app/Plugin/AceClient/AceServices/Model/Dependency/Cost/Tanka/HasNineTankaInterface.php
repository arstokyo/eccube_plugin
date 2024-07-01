<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Tanka;

/**
 * interface for Has 9単価
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasNineTankaInterface
{
    /**
     * Get 単価1
     * 
     * @return float|null
     */
    public function getTanka1(): ?float;

    /**
     * Set 単価1
     * 
     * @param string|null $tanka1
     * @return $this
     */
    public function setTanka1(?string $tanka1);

    /**
     * Get 単価2
     * 
     * @return float|null
     */
    public function getTanka2(): ?float;

    /**
     * Set 単価2
     * 
     * @param string|null $tanka2
     * @return $this
     */
    public function setTanka2(?string $tanka2);

    /**
     * Get 単価3
     * 
     * @return float|null
     */
    public function getTanka3(): ?float;

    /**
     * Set 単価3
     * 
     * @param string|null $tanka3
     * @return $this
     */
    public function setTanka3(?string $tanka3);

    /**
     * Get 単価4
     * 
     * @return float|null
     */
    public function getTanka4(): ?float;

    /**
     * Set 単価4
     * 
     * @param string|null $tanka4
     * @return $this
     */
    public function setTanka4(?string $tanka4);

    /**
     * Get 単価5
     * 
     * @return float|null
     */
    public function getTanka5(): ?float;

    /**
     * Set 単価5
     * 
     * @param string|null $tanka5
     * @return $this
     */
    public function setTanka5(?string $tanka5);

    /**
     * Get 単価6
     * 
     * @return float|null
     */
    public function getTanka6(): ?float;

    /**
     * Set 単価6
     * 
     * @param string|null $tanka6
     * @return $this
     */
    public function setTanka6(?string $tanka6);

    /**
     * Get 単価7
     * 
     * @return float|null
     */
    public function getTanka7(): ?float;

    /**
     * Set 単価7
     * 
     * @param string|null $tanka7
     * @return $this
     */
    public function setTanka7(?string $tanka7);

    /**
     * Get 単価8
     * 
     * @return float|null
     */
    public function getTanka8(): ?float;

    /**
     * Set 単価8
     * 
     * @param string|null $tanka8
     * @return $this
     */
    public function setTanka8(?string $tanka8);

    /**
     * Get 単価9
     * 
     * @return float|null
     */
    public function getTanka9(): ?float;

    /**
     * Set 単価9
     * 
     * @param string|null $tanka9
     * @return $this
     */
    public function setTanka9(?string $tanka9);
    
}