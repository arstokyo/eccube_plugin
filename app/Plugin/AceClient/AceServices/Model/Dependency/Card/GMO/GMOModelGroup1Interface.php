<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Card\GMO;

/**
 * Interface for GMOグループ1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface GMOModelGroup1Interface
{
    /**
     * Get GMO会員ID
     * 
     * @return string|null
     */
    public function getGmomemberid(): ?string;

    /**
     * Set GMO会員ID
     * 
     * @param string|null $gmomemberid
     * @return $this
     */
    public function setGmomemberid(?string $gmomemberid);

    /**
     * Get GMOオーダーID
     * 
     * @return string|null
     */
    public function getGmoorderid(): ?string;

    /**
     * Set GMOオーダーID
     * 
     * @param string|null $gmoorderid
     * @return $this
     */
    public function setGmoorderid(?string $gmoorderid);

    /**
     * Get GMO取引ID
     * 
     * @return string|null
     */
    public function getGmotorihikiid(): ?string;

    /**
     * Set GMO取引ID
     * 
     * @param string|null $gmotorihikiid
     * @return $this
     */
    public function setGmotorihikiid(?string $gmotorihikiid);

    /**
     * Get GMO取引パスワード
     * 
     * @return string|null
     */
    public function getGmotorihikipw(): ?string;

    /**
     * Set GMO取引パスワード
     * 
     * @param string|null $gmotorihikipw
     * @return $this
     */
    public function setGmotorihikipw(?string $gmotorihikipw);

}