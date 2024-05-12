<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Message;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * MessageModelExtend1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class MessageModelExtend2 extends MessageModelExtend1 implements MessageModelExtend2Interface
{
    use NoCategory\CodeTrait, 
        NoCategory\TaikaiTrait;

    /**
     * Address
     *
     * @var ?string $adress
     */
    protected ?string $adress = null;

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

}