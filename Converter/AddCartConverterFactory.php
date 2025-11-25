<?php

namespace Plugin\AceClient43\Converter;

use Plugin\AceClient43\AceServices\Model\Request\Jyuden\AddCart\AddCartRequestModelInterface;
use Plugin\AceClient43\Converter\Corrector\AddCartRequestCorrectorInterface;

/**
 * AddCartコンバータファクトリ
 *
 * フロータイプに基づいて不変のコンバータインスタンスを生成し、
 * リクエスト補正器（Corrector）を管理します。
 *
 * 責務：
 * - AddCartRequestConverterの生成とフロー設定
 * - JyumeiDataConverterの単一インスタンス管理とフロー設定
 * - AddCartRequestCorrectorの適用管理
 *
 * 使用例：
 * ```php
 * $factory = $container->get(AddCartConverterFactory::class);
 * $converter = $factory->createAddCartRequestConverter(AddCartFlow::cartAdd());
 * $jyumeiConverter = $factory->createJyumeiDataConverter(AddCartFlow::cartAdd());
 * ```
 */
class AddCartConverterFactory
{
    /** @var AddCartRequestConverterInterface|null AddCartRequestConverterの単一インスタンス */
    private ?AddCartRequestConverterInterface $addCartRequestConverter = null;

    /** @var iterable<AddCartRequestCorrectorInterface> AddCartRequestCorrectorのコレクション */
    private iterable $addCartRequestCorrectors;

    /** @var JyumeiDataConverterInterface 全フローで共有されるJyumeiDataConverter */
    private JyumeiDataConverterInterface $jyumeiDataConverter;

    /**
     * コンストラクタ
     *
     * @param iterable<AddCartRequestCorrectorInterface> $addCartRequestCorrectors
     * @param AddCartRequestConverterInterface $addCartRequestConverters
     * @param JyumeiDataConverterInterface $jyumeiDataConverter
     */
    public function __construct(
        iterable $addCartRequestCorrectors,
        AddCartRequestConverterInterface $addCartRequestConverters,
        JyumeiDataConverterInterface $jyumeiDataConverter,
    ) {
        $this->addCartRequestConverter = $addCartRequestConverters;
        $this->addCartRequestCorrectors = $addCartRequestCorrectors;
        $this->jyumeiDataConverter = $jyumeiDataConverter;
    }

    /**
     * 指定されたフロー用の不変なAddCartRequestConverterを生成
     *
     * @param AddCartFlow $flow 対象フロー
     *
     * @return AddCartRequestConverterInterface フロー設定済みの不変なコンバータ
     */
    public function createAddCartRequestConverter(AddCartFlow $flow): AddCartRequestConverterInterface
    {
        // 不変性を保証するためクローンを作成し、フローを設定
        $immutableConverter = clone $this->addCartRequestConverter;
        $immutableConverter->setFlow($flow);

        return $immutableConverter;
    }

    /**
     * 指定されたフロー用のJyumeiDataConverterを取得（フロー設定済み）
     *
     * このメソッドは共有インスタンスのフローを設定して返します。
     * 注意: 返されるインスタンスは共有されているため、フローは一時的な設定となります。
     *
     * @param AddCartFlow $flow 対象フロー
     *
     * @return JyumeiDataConverterInterface フロー設定済みのコンバータ
     */
    public function createJyumeiDataConverter(AddCartFlow $flow): JyumeiDataConverterInterface
    {
        $immutableConverter = clone $this->jyumeiDataConverter;
        $immutableConverter->setFlow($flow);

        return $immutableConverter;
    }

    /**
     * 登録されている全てのAddCartRequestCorrectorを適用
     *
     * 補正器が存在しない場合は何もしません。
     * 指定されたフローをサポートする補正器のみが適用されます。
     * 補正器は優先順位（priority）の降順で適用されます。
     *
     * @param AddCartRequestModelInterface $request 補正対象のリクエスト
     * @param AddCartFlow $flow 現在のフロー
     * @param array $context 補正コンテキスト
     * @param array $options 追加オプション
     *
     * @return void リクエストは参照渡しで変更される
     */
    public function applyCorrections(
        AddCartRequestModelInterface $request,
        AddCartFlow $flow,
        array $context,
        array $options = [],
    ): void {
        foreach ($this->addCartRequestCorrectors as $corrector) {
            if ($corrector->supports($flow)) {
                $corrector->correct($request, $flow, $context, $options);
            }
        }
    }
}
