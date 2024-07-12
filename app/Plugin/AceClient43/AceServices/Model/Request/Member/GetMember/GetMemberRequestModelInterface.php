<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetMember;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Person\User\HasUserIdInterface;

/**
 * Interface for Get Member Request
 *
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
interface GetMemberRequestModelInterface extends RequestModelInterface, NoCategory\HasIdInterface,
                                                 HasUserIdInterface, NoCategory\HasPassWdInterface
{


}