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

namespace Plugin\AceClient43\Controller\Admin;

use Eccube\Controller\AbstractController;
use Eccube\Entity\Member;
use Plugin\AceClient43\Service\AceConfigService;
use Plugin\AceClient43\Service\ProductImportHelper;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ProductController extends AbstractController
{
    protected AceConfigService $aceConfigService;

    protected ProductImportHelper $productImportHelper;

    protected ValidatorInterface $validator;

    public const SYNC_FROM_ACE_TRIGGER = 'sync_from_ace';

    /**
     * @param AceConfigService $aceConfigService
     * @param ProductImportHelper $productImportHelper
     * @param ValidatorInterface $validator
     */
    public function __construct(
        AceConfigService $aceConfigService,
        ProductImportHelper $productImportHelper,
        ValidatorInterface $validator,
    ) {
        $this->aceConfigService = $aceConfigService;
        $this->productImportHelper = $productImportHelper;
        $this->validator = $validator;
    }

    /**
     * ACE商品同期処理
     *
     * @Route("/%eccube_admin_route%/aceclient/product/sync_from_ace", name="ace_client_admin_product_sync_from_ace", methods={"POST"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function syncFromAce(Request $request): JsonResponse
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            return $this->json([
                'success' => false,
                'message' => 'アクセス権限がありません。',
            ], 403);
        }

        // 入力値の検証
        $productIdsString = $request->request->get('ace_product_ids', '');

        $constraints = new Assert\Collection([
            'ace_product_ids' => [
                new Assert\NotBlank([
                    'message' => '商品IDを入力してください。',
                ]),
                new Assert\Regex([
                    'pattern' => '/^[0-9,\s]*$/',
                    'message' => '商品IDは数字とカンマのみ入力可能です。',
                ]),
            ],
        ]);

        $errors = $this->validator->validate(['ace_product_ids' => $productIdsString], $constraints);

        if (count($errors) > 0) {
            $errorMessages = [];
            foreach ($errors as $error) {
                $errorMessages[] = $error->getMessage();
            }

            return $this->json([
                'success' => false,
                'message' => implode("\n", $errorMessages),
            ]);
        }

        // 商品IDの解析
        $productIds = array_filter(
            array_map('trim', explode(',', $productIdsString)),
            function ($id) { return !empty($id); }
        );

        if (empty($productIds)) {
            return $this->json([
                'success' => false,
                'message' => '有効な商品IDがありません。',
            ]);
        }

        try {
            // 現在のユーザー情報を取得
            /** @var Member $user */
            $user = $this->getUser();

            // 商品インポート処理の実行
            $options['_trigger'] = self::SYNC_FROM_ACE_TRIGGER;
            $importCount = $this->productImportHelper->importByAceProductIds($user, $productIds, $options);

            if ($importCount > 0) {
                return $this->json([
                    'success' => true,
                    'message' => sprintf('%d件の商品を連携しました。', $importCount),
                    'count' => $importCount,
                ]);
            } else {
                return $this->json([
                    'success' => false,
                    'message' => '商品の連携に失敗しました。商品が見つからないか、連携できる商品がありませんでした。',
                    'count' => 0,
                ]);
            }
        } catch (\Exception $e) {
            log_error('商品連携処理でエラーが発生しました: '.$e->getMessage());

            return $this->json([
                'success' => false,
                'message' => '商品連携処理でエラーが発生しました: '.$e->getMessage(),
            ]);
        }
    }
}
