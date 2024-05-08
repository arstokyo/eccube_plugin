<?php

namespace Plugin\AceClient\AceServices\Model\Response\Message;

trait HasMessageResponseExtend1Trait
{
    /**
     * エラーメッセージ
     *
     * @var MesageModelExtend1 $Message
     */
    protected MesageModelExtend1 $Message;

    /**
     * {@inheritDoc}
     */
    public function getMessage(): MessageModelExtend1Interface
    {
        return $this->Message;
    }

    /**
     * {@inheritDoc}
     */
    public function setMessage(MesageModelExtend1 $message)
    {
        $this->Message = $message;
    }

}