<?php

namespace Plugin\AceClient\AceService\Model\Request\Jyuden;

use Plugin\AceClient\AceService\Model\Request\Jyuden\Dependency\OrderPrmJyudenRequestModelForAddCart;

class AddCartRequestModel extends JyudenRequestAbstract implements JyudenRequestInterface
{
    /** @var int $id Ace System ID */
    private ?int $id;
    /** @var string $sessid Session ID */
    private ?string $sessid;

    /** @var OrderPrmJyudenRequestModelForAddCart $prm Order Info */
    private ?OrderPrmJyudenRequestModelForAddCart $prm;

    /**
     * Set ID
     * 
     * @param int $id
     */
    public function SetId(int $id)
    {
        $this->id = $id;
    }

    /**
     * Set Order Info
     * 
     * @param OrderPrmJyudenRequestModelForAddCart $prm
     */
    public function SetPrm(OrderPrmJyudenRequestModelForAddCart $prm)
    {
        $this->prm = $prm;
    }

    /**
     * Set Session ID
     * 
     * @param string $sessid
     */
    public function SetSessid(string $sessid)
    {
        $this->sessid = $sessid;
    }

    /**
     * Ensure Input Parameters are valid
     * 
     * @return bool
     */
    public function EnsureValidParameters(): bool
    {
        if (empty($this->id)) { return false; }
        if (empty($this->sessid)) { return false; }
        if (empty($this->prm)) { return false; }
        return true;
    }

}