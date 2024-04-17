<?php

namespace Plugin\AceClient\AceService\Model\Dependency;

class  OrderPrmModelAbstract extends PrmModelAbstract implements OrderPrmModelInterface
{
    /** @var OrderModelAbstract  オーダー情報 */
    protected OrderModelAbstract $order;

}