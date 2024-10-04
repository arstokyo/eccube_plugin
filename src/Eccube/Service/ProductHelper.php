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

namespace Eccube\Service;

use Plugin\AceClient;
use Eccube\Entity\Product;
use Plugin\AceClient\AceServices\Model\Request\Goods\GetZaiko\GetZaikoRequestModel;
use Plugin\AceClient\AceServices\Model\Response\Goods\GetZaiko\GetZaikoResponseModel;
use Doctrine\ORM\EntityManagerInterface;
use Plugin\AceClient\Util\Mapper\OverviewMapper;

class ProductHelper {

    /**
     * @var AceClient\AceClient
     * */
    public AceClient\AceClient $aceClient;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    public function __construct(
        AceClient\AceClient $aceClient,
        EntityManagerInterface $entityManager,
    ) {
        $this->aceClient = $aceClient;
        $this->entityManager = $entityManager;
    }

    /**
     * Get stock from ACE and update stock in EC
     *
     * @param Product $product
     */
    public function getStockAce(Product $product): void
    {
        $zaiko = new GetZaikoRequestModel();
        $getZaikoModel = $zaiko->setId(OverviewMapper::ACE_TEST_SYID)
                         ->setGdid($product->getProductClasses()[0]->getCode())
                         ->setSouko("10");

        try {
            $response = $this->aceClient->makeGoodsService()
                                        ->makeGetZaikoMethod()
                                        ->withRequest($getZaikoModel)
                                        ->send();
            if ($response->getStatusCode() === 200) {
                /** @var GetZaikoResponseModel $responseObj */
                $responseObj = $response->getResponse();
                $stock =  $responseObj->getMaster()->getGoods()->getZaiko();
                $this->updateStockEc($product, $stock);
                }
            } catch(\Throwable $e) {
                $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
            } catch(\Throwable $e) {
                $message1 = $e->getMessage() ?? 'One Error Occurred when sending request.';
        }
    }

    /**
     * Update stock in EC
     *
     * @param Product $product
     * @param string $stock
     */
    public function updateStockEc(Product $product, string $stock): void
    {
        $productClass = $product->getProductClasses()[0];
        $productStock = $productClass->getProductStock();
        $productStock->setStock($stock);
        $productClass->setStock($stock);
        $this->entityManager->persist($productStock);
        $this->entityManager->persist($productClass);
        $this->entityManager->flush();
    }
}