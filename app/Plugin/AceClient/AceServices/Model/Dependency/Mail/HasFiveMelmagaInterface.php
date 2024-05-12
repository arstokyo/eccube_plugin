<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Mail;

/**
 * Interface For 5つメルマガ区分
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasFiveMelmagaInterface
{
    /**
     * Get メルマガ区分1
     * 
     * @return ?int
     */
    public function getMelmaga1(): ?int;

    /**
     * Set メルマガ区分1
     * 
     * @param ?int $melmaga1
     */
    public function setMelmaga1(?int $melmaga1);

    /**
     * Get メルマガ区分2
     * 
     * @return ?int
     */
    public function getMelmaga2(): ?int;

    /**
     * Set メルマガ区分2
     * 
     * @param ?int $melmaga2
     */
    public function setMelmaga2(?int $melmaga2);

    /**
     * Get メルマガ区分3
     * 
     * @return ?int
     */
    public function getMelmaga3(): ?int;

    /**
     * Set メルマガ区分3
     * 
     * @param ?int $melmaga3
     */
    public function setMelmaga3(?int $melmaga3);

    /**
     * Get メルマガ区分4
     * 
     * @return ?int
     */
    public function getMelmaga4(): ?int;

    /**
     * Set メルマガ区分4
     * 
     * @param ?int $melmaga4
     */
    public function setMelmaga4(?int $melmaga4);

    /**
     * Get メルマガ区分5
     * 
     * @return ?int
     */
    public function getMelmaga5(): ?int;

    /**
     * Set メルマガ区分5
     * 
     * @param ?int $melmaga5
     */
    public function setMelmaga5(?int $melmaga5);

}