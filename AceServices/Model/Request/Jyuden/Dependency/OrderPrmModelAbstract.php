<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Request\Dependency\PrmModelRequestAbstract;
use Symfony\Component\Serializer\Annotation\Ignore;

abstract class OrderPrmModelAbstract extends PrmModelRequestAbstract implements OrderPrmModelInterface
{

    /** @var Request\Jyuden\Dependency\MemberModelInterface $member 顧客情報*/
    protected MemberModelInterface $member;

    #[Ignore]
    protected const XML_ROOT_NOT_NAME = 'order';

    /**
     * Set 顧客情報
     * 
     * @param Request\Jyuden\Dependency\MemberModelAbstract $member
     * @return Request\Jyuden\Dependency\OrderPrmModelAbstract
     */
    public function setMember(MemberModelInterface $member): self
    {
        $this->member = $member;
        return $this;
    }

    /**
     * Get 顧客情報
     * 
     * @return Request\Jyuden\Dependency\MemberModelAbstract
     */
    public function getMember(): MemberModelAbstract
    {
        return $this->member;
    }

    public function setXmlSerializeOptions(): array
    {
        return array_merge(parent::setXmlSerializeOptions(), ['xml_root_node_name'=> self::XML_ROOT_NOT_NAME ],);
    }

}