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
     * @param ?string $freeOrderMail1
     */
    public function setFreeOrderMail1(?string $freeOrderMail1);
    /**
     * Get 注文確認ﾒｰﾙｱﾄﾞﾚｽ2
     * 
     * @return ?string
     */
    public function getFreeOrderMail2(): ?string;

    /**
     * Set 注文確認ﾒｰﾙｱﾄﾞﾚｽ2
     * 
     * @param ?string $freeOrderMail2
     */
    public function setFreeOrderMail2(?string $freeOrderMail2);

    /**
     * Get 注文確認ﾒｰﾙｱﾄﾞﾚｽ3
     * 
     * @return ?string
     */
    public function getFreeOrderMail3(): ?string;

    /**
     * Set 注文確認ﾒｰﾙｱﾄﾞﾚｽ3
     * 
     * @param ?string $freeOrderMail3
     */
    public function setFreeOrderMail3(?string $freeOrderMail3);

    /**
     * Get 注文確認ﾒｰﾙｱﾄﾞﾚｽ4
     * 
     * @return ?string
     */
    public function getFreeOrderMail4(): ?string;

    /**
     * Set 注文確認ﾒｰﾙｱﾄﾞﾚｽ4
     * 
     * @param ?string $freeOrderMail4
     */
    public function setFreeOrderMail4(?string $freeOrderMail4);

    /**
     * Get 注文確認ﾒｰﾙｱﾄﾞﾚｽ5
     * 
     * @return ?string
     */
    public function getFreeOrderMail5(): ?string;

    /**
     * Set 注文確認ﾒｰﾙｱﾄﾞﾚｽ5
     * 
     * @param ?string $freeOrderMail5
     */
    public function setFreeOrderMail5(?string $freeOrderMail5);

}