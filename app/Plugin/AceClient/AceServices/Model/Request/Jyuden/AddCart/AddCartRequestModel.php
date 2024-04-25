<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\JyudenRequestAbstract;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Serializer\Annotation\SerializedName;

class AddCartRequestModel extends JyudenRequestAbstract implements AddCartRequestModelInterface
{
    /** @var int $id Ace System ID  */
    private ?int $id;

    #[SerializedName("sessId")]
    /** @var string $sessId Session ID */
    private string $sessId;

    /** @var ?OrderPrmModel $prm Order Info */
    private ?OrderPrmModel $prm;

    #[Ignore]
    private const XML_NODE_NAME = 'addCart';

    /**
     * Set SystemID
     * 
     * @param int $id
     * @return Request\Jyuden\AddCart\AddCartRequestModel
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Set オーダー情報
     * 
     * @param Request\Jyuden\AddCart\OrderPrmModel $prm
     * @return Request\Jyuden\AddCart\AddCartRequestModel
     */
    public function setPrm(OrderPrmModel $prm): self
    {
        $this->prm = $prm;
        return $this;
    }

    /**
     * Set セッションID
     * 
     * @param string $sessId
     * @return Request\Jyuden\AddCart\AddCartRequestModel
     */
    #[SerializedName("sessId")]
    public function setSessId(string $sessId): self
    {
        $this->sessId = $sessId;
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
    public function getSessId(): string
    {
        return $this->sessId;
    }

    /**
     * Get オーダー情報
     * 
     * @return string|null|object
     */
    public function getPrm(): string|null|object
    {
        return $this->prm->toData();
    }

    /**
     * {@inheritDoc}
     *
     */
    public function ensureValidParameters(): bool
    {
        if (empty($this->id)) { return false; }
        if (empty($this->sessId)) { return false; }
        if (empty($this->prm)) { return false; }
        return true;
    }

    /**
     * Get Xml Node Name
     * 
     * @return string
     */
    public function getXmlNodeName(): string
    {
        return self::XML_NODE_NAME;
    }

}