<?php

namespace Plugin\AceClient43\Traits;

use Doctrine\Common\Annotations\Annotation\Required;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;

trait GetUserTrait
{
    private TokenStorageInterface $tokenStorage;

    /**
     * @Required
     */
    public function setTokenStorage(TokenStorageInterface $tokenStorage): void
    {
        $this->tokenStorage = $tokenStorage;
    }

    protected function getUser(): ?UserInterface
    {
        if (null === $token = $this->tokenStorage->getToken()) {
            return null;
        }

        return $token->getUser();
    }

    protected function isUserAuthenticated(): bool
    {
        return $this->getUser() instanceof UserInterface;
    }
}
