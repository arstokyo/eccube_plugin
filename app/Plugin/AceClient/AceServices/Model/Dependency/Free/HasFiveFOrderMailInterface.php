<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Interface For Has Five Free Shuka Mail 
 * 
 * @author Ars-Phuoc <>
 */
interface HasFiveForderMailInterface
{
    /**
     * Get 注文確認ﾒｰﾙｱﾄﾞﾚｽ1
     * 
     * @return ?string
     */
    public function getFreeOrderMail1(): ?string;

    /**
     * Set 注文確認ﾒｰﾙｱﾄﾞﾚｽ1
     * 
     * @param ?string $freeordermail1
     */
    public function setFreeOrderMail1(?string $freeordermail1);
    /**
     * Get 注文確認ﾒｰﾙｱﾄﾞﾚｽ2
     * 
     * @return ?string
     */
    public function getFreeOrderMail2(): ?string;

    /**
     * Set 注文確認ﾒｰﾙｱﾄﾞﾚｽ2
     * 
     * @param ?string $freeordermail2
     */
    public function setFreeOrderMail2(?string $freeordermail2);

    /**
     * Get 注文確認ﾒｰﾙｱﾄﾞﾚｽ3
     * 
     * @return ?string
     */
    public function getFreeOrderMail3(): ?string;

    /**
     * Set 注文確認ﾒｰﾙｱﾄﾞﾚｽ3
     * 
     * @param ?string $freeordermail3
     */
    public function setFreeOrderMail3(?string $freeordermail3);

    /**
     * Get 注文確認ﾒｰﾙｱﾄﾞﾚｽ4
     * 
     * @return ?string
     */
    public function getFreeOrderMail4(): ?string;

    /**
     * Set 注文確認ﾒｰﾙｱﾄﾞﾚｽ4
     * 
     * @param ?string $freeordermail4
     */
    public function setFreeOrderMail4(?string $freeordermail4);

    /**
     * Get 注文確認ﾒｰﾙｱﾄﾞﾚｽ5
     * 
     * @return ?string
     */
    public function getFreeOrderMail5(): ?string;

    /**
     * Set 注文確認ﾒｰﾙｱﾄﾞﾚｽ5
     * 
     * @param ?string $freeordermail5
     */
    public function setFreeOrderMail5(?string $freeordermail5);

}