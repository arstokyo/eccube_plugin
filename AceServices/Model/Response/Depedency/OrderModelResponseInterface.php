<?php

namespace Plugin\AceClient\AceServices\Model\Response\Depedency;

use Plugin\AceClient\AceServices\Model\Dependency\OrderModelInterface as BaseOrderModelInterface;
use Plugin\AceClient\AceServices\Model\Response\Message\HasMessageResponseInterface;

/**
 * Interface for ResponseOrderModel
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface OrderModelResponseInterface extends BaseOrderModelInterface, HasMessageResponseInterface
{

}