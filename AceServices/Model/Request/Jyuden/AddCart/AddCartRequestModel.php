<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Request\Jyuden;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\JyudenRequestInterface;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\JyudenRequestAbstract;

class AddCartRequestModel extends JyudenRequestAbstract implements JyudenRequestInterface
{
    /** @var int $id Ace System ID */
    private ?int $id;
    /** @var string $sessid Session ID */
    private ?string $sessid;

    /** @var ?PrmModel $prm Order Info */
    private ?PrmModel $prm;

    /**
     * Set ID
     * 
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * Set Order Info
     * 
     * @param Jyuden\AddCart\PrmModel $prm
     */
    public function setPrm(PrmModel $prm)
    {
        $this->prm = $prm;
    }

    /**
     * Set Session ID
     * 
     * @param string $sessid
     */
    public function setSessid(string $sessid)
    {
        $this->sessid = $sessid;
    }

    /**
     * Ensure Input Parameters are valid
     * 
     * @return bool
     */
    public function ensureValidParameters(): bool
    {
        if (empty($this->id)) { return false; }
        if (empty($this->sessid)) { return false; }
        if (empty($this->prm)) { return false; }
        return true;
    }

}