<?php

namespace Plugin\AceClient\AceService\Model\DependencyModel;

class  OrderPrmModelAbstract extends PrmModelAbstract implements OrderPrmModelInterface
{
    /** @var OrderModelAbstract  オーダー情報 */
    protected OrderModelAbstract $order;

}