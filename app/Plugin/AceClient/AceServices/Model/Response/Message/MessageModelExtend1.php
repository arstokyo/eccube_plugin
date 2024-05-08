<?php

namespace Plugin\AceClient\AceServices\Model\Response\Message;

/**
 * MessageModelExtend1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MessageModelExtend1 extends MessageModel implements MessageModelExtend1Interface
{
    /**
     * Address
     *
     * @var ?string $address
     */
    protected ?string $address = null;

    /**
     * Result
     *
     * @var ?string $result
     */
    protected ?string $result = null;

    /**
     * Code
     *
     * @var ?string $code
     */
    protected ?string $code = null;

    /**
     * Taikai
     *
     * @var ?string $taikai
     */
    protected ?string $taikai = null;
    /**
     * {@inheritDoc}
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * {@inheritDoc}
     */
    public function setAddress(?string $address)
    {
        $this->address = $address;
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

    /**
     * {@inheritDoc}
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * {@inheritDoc}
     */
    public function setCode(?string $code)
    {
        $this->code = $code;
    }

    /**
     * {@inheritDoc}
     */
    public function getTaikai(): ?string
    {
        return $this->taikai;
    }

    /**
     * {@inheritDoc}
     */
    public function setTaikai(?string $taikai)
    {
        $this->taikai = $taikai;
    }
}