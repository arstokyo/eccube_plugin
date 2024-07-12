<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Message;
use GuzzleHttp\Psr7\MessageTrait;

/**
 * MessageModel
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class MessageModel implements MessageModelInterface
{
   use Message1Trait,
       Message2Trait;
}