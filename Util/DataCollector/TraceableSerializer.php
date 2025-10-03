<?php

namespace Plugin\AceClient43\Util\DataCollector;

use Plugin\AceClient43\Util\Serializer\SerializerSupportInterface;
use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Stopwatch\Stopwatch;

/**
 * トレース可能なシリアライザーデコレーター
 *
 * シリアライザーのパフォーマンス測定のためのラッパークラス。
 * serialize()とdeserialize()操作の実行時間を計測し、開発環境でのデバッグとプロファイリングを支援します。
 *
 * 主な機能：
 * - シリアライズ/デシリアライズ操作の実行時間を計測
 * - 各操作の詳細情報（フォーマット、データ型、データサイズなど）を記録
 * - Symfony Stopwatchと統合してプロファイラーで可視化
 * - 元のシリアライザーの全機能を透過的に委譲
 *
 * 使用例：
 * ```php
 * $traceable = new TraceableSerializer($originalSerializer, $stopwatch, 'soap_xml');
 * $xml = $traceable->serialize($data, 'xml'); // 実行時間が記録される
 * $operations = $traceable->getTracedOperations(); // トレース情報を取得
 * ```
 */
class TraceableSerializer implements SerializerInterface, SerializerSupportInterface, NormalizerInterface, DenormalizerInterface, EncoderInterface, DecoderInterface
{
    /** @var SerializerInterface ラップされた元のシリアライザー */
    private SerializerInterface $serializer;

    /** @var Stopwatch|null パフォーマンス計測用のストップウォッチ */
    private ?Stopwatch $stopwatch;

    /** @var string シリアライザーの識別名（'default', 'soap_xml'など） */
    private string $serializerName;

    /** @var array トレースされた操作の履歴 */
    private array $tracedOperations = [];

    /**
     * コンストラクタ
     *
     * @param SerializerInterface $serializer ラップする元のシリアライザー
     * @param Stopwatch|null $stopwatch パフォーマンス計測用のストップウォッチ（オプション）
     * @param string $serializerName シリアライザーの識別名（デフォルト: 'default'）
     */
    public function __construct(
        SerializerInterface $serializer,
        ?Stopwatch $stopwatch = null,
        string $serializerName = 'default',
    ) {
        $this->serializer = $serializer;
        $this->stopwatch = $stopwatch;
        $this->serializerName = $serializerName;
    }

    /**
     * データをシリアライズし、実行時間を計測
     *
     * 元のシリアライザーのserialize()メソッドを呼び出し、
     * その実行時間と関連情報を記録します。
     *
     * @param mixed $data シリアライズするデータ
     * @param string $format 出力フォーマット（'xml', 'json'など）
     * @param array $context シリアライズコンテキスト
     *
     * @return string シリアライズされた文字列
     */
    public function serialize($data, string $format, array $context = []): string
    {
        $eventName = sprintf('serializer.%s.serialize', $this->serializerName);
        $startTime = microtime(true);

        if ($this->stopwatch) {
            $this->stopwatch->start($eventName, 'serializer');
        }

        try {
            $result = $this->serializer->serialize($data, $format, $context);
            $endTime = microtime(true);

            $this->tracedOperations[] = [
                'operation' => 'serialize',
                'serializer' => $this->serializerName,
                'format' => $format,
                'data_type' => is_object($data) ? get_class($data) : gettype($data),
                'duration' => $endTime - $startTime,
                'result_length' => strlen($result),
                'timestamp' => $startTime,
            ];

            return $result;
        } finally {
            if ($this->stopwatch) {
                $this->stopwatch->stop($eventName);
            }
        }
    }

    /**
     * データをデシリアライズし、実行時間を計測
     *
     * 元のシリアライザーのdeserialize()メソッドを呼び出し、
     * その実行時間と関連情報を記録します。
     *
     * @param mixed $data デシリアライズする文字列データ
     * @param string $type デシリアライズ先のクラス名
     * @param string $format 入力フォーマット（'xml', 'json'など）
     * @param array $context デシリアライズコンテキスト
     *
     * @return mixed デシリアライズされたオブジェクト
     */
    public function deserialize($data, string $type, string $format, array $context = []): mixed
    {
        $eventName = sprintf('serializer.%s.deserialize', $this->serializerName);
        $startTime = microtime(true);

        if ($this->stopwatch) {
            $this->stopwatch->start($eventName, 'serializer');
        }

        try {
            $result = $this->serializer->deserialize($data, $type, $format, $context);
            $endTime = microtime(true);

            $this->tracedOperations[] = [
                'operation' => 'deserialize',
                'serializer' => $this->serializerName,
                'format' => $format,
                'target_type' => $type,
                'data_length' => is_string($data) ? strlen($data) : 0,
                'duration' => $endTime - $startTime,
                'timestamp' => $startTime,
            ];

            return $result;
        } finally {
            if ($this->stopwatch) {
                $this->stopwatch->stop($eventName);
            }
        }
    }

    // ===================================================================================================
    // SerializerSupportInterface 実装
    // ===================================================================================================

    /**
     * 指定されたAPIタイプとフォーマットをサポートするか確認
     *
     * @param string $apiType APIタイプ（'soap', 'rest'など）
     * @param string $format フォーマット（'xml', 'json'など）
     *
     * @return bool サポートする場合true
     */
    public function supports(string $apiType, string $format): bool
    {
        if ($this->serializer instanceof SerializerSupportInterface) {
            return $this->serializer->supports($apiType, $format);
        }

        return true;
    }

    /**
     * シリアライザーの優先順位を取得
     *
     * @return int 優先順位（高いほど優先される）
     */
    public function getPriority(): int
    {
        if ($this->serializer instanceof SerializerSupportInterface) {
            return $this->serializer->getPriority();
        }

        return 0;
    }

    // ===================================================================================================
    // NormalizerInterface 実装
    // ===================================================================================================

    /**
     * オブジェクトを配列または単純型に正規化
     *
     * @param mixed $object 正規化するオブジェクト
     * @param string|null $format フォーマット
     * @param array $context 正規化コンテキスト
     *
     * @return array|string|int|float|bool|\ArrayObject|null 正規化された値
     *
     * @throws \BadMethodCallException|\Symfony\Component\Serializer\Exception\ExceptionInterface ラップされたシリアライザーが正規化をサポートしていない場合
     */
    public function normalize($object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        if ($this->serializer instanceof NormalizerInterface) {
            return $this->serializer->normalize($object, $format, $context);
        }

        throw new \BadMethodCallException('The wrapped serializer does not support normalization');
    }

    public function supportsNormalization($data, ?string $format = null, array $context = []): bool
    {
        if ($this->serializer instanceof NormalizerInterface) {
            return $this->serializer->supportsNormalization($data, $format, $context);
        }

        return false;
    }

    // DenormalizerInterface implementation
    public function denormalize($data, string $type, ?string $format = null, array $context = []): mixed
    {
        if ($this->serializer instanceof DenormalizerInterface) {
            return $this->serializer->denormalize($data, $type, $format, $context);
        }

        throw new \BadMethodCallException('The wrapped serializer does not support denormalization');
    }

    public function supportsDenormalization($data, string $type, ?string $format = null, array $context = []): bool
    {
        if ($this->serializer instanceof DenormalizerInterface) {
            return $this->serializer->supportsDenormalization($data, $type, $format, $context);
        }

        return false;
    }

    // EncoderInterface implementation
    public function encode($data, string $format, array $context = []): string
    {
        if ($this->serializer instanceof EncoderInterface) {
            return $this->serializer->encode($data, $format, $context);
        }

        throw new \BadMethodCallException('The wrapped serializer does not support encoding');
    }

    public function supportsEncoding(string $format, array $context = []): bool
    {
        if ($this->serializer instanceof EncoderInterface) {
            return $this->serializer->supportsEncoding($format, $context);
        }

        return false;
    }

    // DecoderInterface implementation
    public function decode(string $data, string $format, array $context = []): mixed
    {
        if ($this->serializer instanceof DecoderInterface) {
            return $this->serializer->decode($data, $format, $context);
        }

        throw new \BadMethodCallException('The wrapped serializer does not support decoding');
    }

    public function supportsDecoding(string $format, array $context = []): bool
    {
        if ($this->serializer instanceof DecoderInterface) {
            return $this->serializer->supportsDecoding($format, $context);
        }

        return false;
    }

    /**
     * トレースされた操作の履歴を取得
     *
     * 各操作には以下の情報が含まれます：
     * - operation: 操作タイプ（'serialize' または 'deserialize'）
     * - serializer: シリアライザー名
     * - format: フォーマット
     * - data_type: データ型（serialize時）
     * - target_type: ターゲット型（deserialize時）
     * - duration: 実行時間（秒）
     * - timestamp: 実行開始時刻
     * - result_length: 結果の長さ（serialize時）
     * - data_length: データの長さ（deserialize時）
     *
     * @return array トレース情報の配列
     */
    public function getTracedOperations(): array
    {
        return $this->tracedOperations;
    }

    /**
     * トレースされた操作の履歴をリセット
     *
     * テストやプロファイリングの開始前に使用します。
     *
     * @return void
     */
    public function reset(): void
    {
        $this->tracedOperations = [];
    }

    /**
     * ラップされている元のシリアライザーを取得
     *
     * 元のシリアライザーに直接アクセスする必要がある場合に使用します。
     *
     * @return SerializerInterface 元のシリアライザー
     */
    public function getInnerSerializer(): SerializerInterface
    {
        return $this->serializer;
    }
}
