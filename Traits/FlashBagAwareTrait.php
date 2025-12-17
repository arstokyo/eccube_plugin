<?php

namespace Plugin\AceClient43\Traits;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Contracts\Service\Attribute\Required;

trait FlashBagAwareTrait
{
    private RequestStack $requestStack;

    /**
     * @required
     */
    public function setRequestStack(RequestStack $requestStack): void
    {
        $this->requestStack = $requestStack;
    }
}
