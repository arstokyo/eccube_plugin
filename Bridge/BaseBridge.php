<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\Bridge;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Eccube\Session\Session;
use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelInterface;
use Plugin\AceClient43\Entity\Config;
use Plugin\AceClient43\Repository\ConfigRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Contracts\Service\Attribute\Required;

class BaseBridge
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var SessionInterface
     */
    protected $session;

    /**
     * @var ConfigRepository
     */
    protected $configRepository;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * @Required
     */
    public function setEntityManger(EntityManagerInterface $entityManager): void
    {
        $this->em = $entityManager;
    }

    /**
     * @Required
     */
    public function setSession(Session $session): void
    {
        $this->session = $session;
    }

    /**
     * @Required
     */
    public function setConfigRepository(ConfigRepository $configRepository): void
    {
        $this->configRepository = $configRepository;
    }

    /**
     * @Required
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }

    /**
     * @Required
     */
    public function setEventDispatcher(EventDispatcherInterface $eventDispatcher): void
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * システムIDを取得
     *
     * @return int|null
     *
     * @throws \LogicException
     */
    protected function getSyid(): ?string
    {
        $syid = $this->configRepository->findSyid();
        if (null === $syid) {
            throw new \LogicException('システムIDが設定されていません。');
        }

        return $syid;
    }

    /**
     * レスポンスがエラーかどうかを判定
     *
     * @param HasMessageModelInterface $response
     *
     * @return bool
     */
    protected function hasErrorMessage(HasMessageModelInterface $response): bool
    {
        $hasMessage1 = $response->getMessage()->getMessage1();
        $hasMessage2 = $response->getMessage()->getMessage2();

        if ($hasMessage1 || $hasMessage2) {
            $this->logger->error('通販Ace側の処理でエラーが発生しました', [
                'message1' => $hasMessage1,
                'message2' => $hasMessage2,
            ]);

            return true;
        }

        return false;
    }

    protected function getConfig(): Config
    {
        $config = $this->configRepository->get();
        if (null === $config) {
            throw new \LogicException('通販Aceの設定が見つかりません。');
        }

        return $config;
    }
}
