<?php

namespace Plugin\AceClient\AceService\Model\Request\Jyuden;

class AddCartRequestModel extends JyudenRequestAbstract implements JyudenRequestInterface
{
    /** @var int Ace System ID */
    private ?int $id;
    /** @var string Session ID */
    private ?string $sessid;

    /** @var AddCartRequestPrm Order Info */
    private ?AddCartRequestPrm $prm;

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
     * @param AddCartRequestPrm $prm
     */
    public function SetPrm(AddCartRequestPrm $prm)
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