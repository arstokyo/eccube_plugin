<?php

namespace Plugin\AceClient\AceServices\Model\Dependency;

class  OrderPrmModelAbstract extends PrmModelAbstract implements OrderPrmModelInterface
{
    /** @var OrderModelInterface オーダー情報 */
    protected OrderModelInterface $order;

}