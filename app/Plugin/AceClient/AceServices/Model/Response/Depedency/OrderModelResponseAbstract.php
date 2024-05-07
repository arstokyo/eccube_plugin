<?php

namespace Plugin\AceClient\AceServices\Model\Response\Depedency;

use Plugin\AceClient\AceServices\Model\Response\Message\HasMessageResponseTrait;

/**
 * Abstract class for OrderModelResponse
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class OrderModelResponseAbstract implements OrderModelResponseInterface
{
    use HasMessageResponseTrait;
}