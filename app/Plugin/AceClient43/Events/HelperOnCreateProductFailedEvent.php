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

namespace Plugin\AceClient43\Events;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\EventDispatcher\Event;

class HelperOnCreateProductFailedEvent extends Event
{
    public OutputInterface $output;

    public array $processedProductsClasses;

    public array $options;

    public EntityManagerInterface $entityManager;

    public function __construct(
        array $processedProductsClasses,
        array $options,
        EntityManagerInterface $entityManager,
        ?OutputInterface $output = null,
    ) {
        $this->processedProductsClasses = $processedProductsClasses;
        $this->output = $output;
        $this->options = $options;
        $this->entityManager = $entityManager;
    }
}
