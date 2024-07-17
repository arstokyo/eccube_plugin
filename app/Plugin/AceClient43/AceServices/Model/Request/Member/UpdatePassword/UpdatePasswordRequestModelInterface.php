<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\UpdatePassword;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Interface UpdatePassword Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface UpdatePasswordRequestModelInterface extends RequestModelInterface,
                                                      NoCategory\HasPassWdInterface,
                                                      NoCategory\HasSyidInterface,
                                                      NoCategory\HasMbidInterface
{
    /**
    * {@inheritDoc}
    */
    /** @SerializedName("password") */
    public function setPasswd(?string $passwd);
}