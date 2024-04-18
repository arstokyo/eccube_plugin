<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Request\Jyuden;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\JyudenRequestInterface;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\JyudenRequestAbstract;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\SerializedName;

class AddCartRequestModel extends JyudenRequestAbstract implements AddCartRequestModelInterface
{

    /** @var int $id Ace System ID  */
    // #[SerializedName('xid')]
    private ?int $id;

    #[SerializedName('sessid')]
    /** @var string $sessid Session ID */
    private string $sessid;

    #[SerializedName('prm')]
    /** @var ?PrmModel $prm Order Info */
    private ?PrmModel $prm;

    /**
     * Set SystemID
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
     * Set オーダー情報
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
     * Set セッションID
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
     * Get Id
     * 
     * @return ?int
     */

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get セッションID
     * 
     * @return string
     */
    public function getSessid(): string
    {
        return $this->sessid;
    }

    /**
     * Get オーダー情報
     * 
     * @return ?PrmModel
     */
    public function getPrm(): ?PrmModel
    {
        return $this->prm;
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