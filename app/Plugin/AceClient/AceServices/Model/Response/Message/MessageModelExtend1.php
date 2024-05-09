<?php

namespace Plugin\AceClient\AceServices\Model\Response\Message;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * MessageModelExtend1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MessageModelExtend1 extends MessageModel implements MessageModelExtend1Interface
{
    use NoCategory\CodeTrait, 
        NoCategory\TaikaiTrait;

    /**
     * Address
     *
     * @var ?string $adress
     */
    protected ?string $adress = null;

    /**
     * Result
     *
     * @var ?string $result
     */
    protected ?string $result = null;

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdress(?string $adress)
    {
        $this->adress = $adress;
    }

    /**
     * {@inheritDoc}
     */
    public function getResult(): ?string
    {
        return $this->result;
    }

    /**
     * {@inheritDoc}
     */
    public function setResult(?string $result)
    {
        $this->result = $result;
    }

}