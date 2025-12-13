<?php

namespace Plugin\AceClient43\Converter;

/**
 * AddCartコンバータファクトリ
 *
 * フロータイプに基づいて不変のコンバータインスタンスを生成し、
 *
 * 責務：
 * - AddCartRequestConverterの生成とフロー設定
 * - JyumeiDataConverterの単一インスタンス管理とフロー設定
 *
 * 使用例：
 * ```php
 * $factory = $container->get(AddCartConverterFactory::class);
 * $converter = $factory->createAddCartRequestConverter(AddCartFlow::cartAdd());
 * $jyumeiConverter = $factory->createJyumeiDataConverter(AddCartFlow::cartAdd());
 * ```
 */
final class AddCartConverterFactory
{
    private AddCartRequestConverterInterface $addCartRequestConverter;
    private JyumeiDataConverterInterface $jyumeiDataConverter;

    /**
     * コンストラクタ
     *
     * @param AddCartRequestConverterInterface $addCartRequestConverters
     * @param JyumeiDataConverterInterface $jyumeiDataConverter
     */
    public function __construct(
        AddCartRequestConverterInterface $addCartRequestConverters,
        JyumeiDataConverterInterface $jyumeiDataConverter,
    ) {
        $this->addCartRequestConverter = $addCartRequestConverters;
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
}
