<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo\Jyuden;

/**
 * Interface for Has 受注方法名称
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasJnameInterface
{
    /**
     * Get 受注方法名称
     *
     * @return ?string
     */
    public function getJname(): ?string;

    /**
     * Set 受注方法名称
     *
     * @param ?string $jname
     */
    public function setJname(?string $jname);

}