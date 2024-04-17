<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Request\Jyuden;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\JyudenRequestInterface;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\JyudenRequestAbstract;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

class AddCartRequestModel extends JyudenRequestAbstract implements JyudenRequestInterface
{

    /** @var int $id Ace System ID  */
    #[Groups('xml')]
    #[SerializedName('id')]
    public ?int $id;

    #[Groups('xml')]
    #[SerializedName('sessid')]
    /** @var string $sessid Session ID */
    public ?string $sessid;

    #[Groups('xml')]
    #[SerializedName('prm')]
    /** @var ?PrmModel $prm Order Info */
    public ?PrmModel $prm;

    /**
     * Set ID
     * 
     * @param int $id
     * @return AddCartRequestModel
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Set Order Info
     * 
     * @param Jyuden\AddCart\PrmModel $prm
     * @return AddCartRequestModel
     */
    public function setPrm(PrmModel $prm): self
    {
        $this->prm = $prm;
        return $this;
    }

    /**
     * Set Session ID
     * 
     * @param string $sessid
     * @return AddCartRequestModel
     */
    public function setSessid(string $sessid): self
    {
        $this->sessid = $sessid;
        return $this;
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