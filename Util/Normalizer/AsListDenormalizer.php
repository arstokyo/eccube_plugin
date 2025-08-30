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

namespace Plugin\AceClient43\Util\Normalizer;

use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;
use Plugin\AceClient43\Exception\DataTypeMissMatchException;
use Plugin\AceClient43\Exception\NotDeserializableException;
use Plugin\AceClient43\Util\ModelResolver\ModelResolver;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Denormalizer for AsList Response
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AsListDenormalizer implements DenormalizerAwareInterface, SerializerAwareInterface, DenormalizerInterface
{
    use DenormalizerAwareTrait;

    private ModelResolver $modelResolver;

    public function __construct(
        ModelResolver $modelResolver,
    ) {
        $this->modelResolver = $modelResolver;
    }

    private array $cachePath = [];

    /**
     * {@inheritdoc}
     *
     * @throws DataTypeMissMatchException
     * @throws NotDeserializableException
     *
     * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
     */
    public function denormalize($data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (!\in_array(AsListDenormalizableInterface::class, class_implements($type), true)) {
            throw new DataTypeMissMatchException('AsListDenormalizer Error: Expected AsListDenormalizableInterface object');
        }

        if (isset($context['deserialization_path'])) {
            $this->cachePath[] = $context['deserialization_path'];
        }

        $asListProperty = $type::fetchAsListProperty();

        foreach ($asListProperty as $key => $value) {
            if (strpos($value, 'Customize') === 0) {
                continue;
            }

            if (!\is_string($value) || !\class_exists($value)) {
                throw new DataTypeMissMatchException(sprintf('AsListDenormalizer Error: Expected class name for property "%s" in type "%s".', $key, $type));
            }

            $asListProperty[$key] = $this->modelResolver->findResponseModel($value);
        }

        try {
            foreach ($data as $key => $value) {
                if (\is_array($value) && \array_key_exists($key, $asListProperty)) {
                    if (\array_key_exists('@diffgr:id', $value)) {
                        $value = [$value];
                    }

                    $subContext = $context;
                    $subContext['deserialization_path'] = ($context['deserialization_path'] ?? false) ? sprintf('%s[%s]', $context['deserialization_path'], $key) : "[$key]";
                    $data[$key] = $this->denormalizer->denormalize($value, $asListProperty[$key].'[]', $format, $subContext);
                }
            }

            // 一度配列→オブジェクト配列への展開が完了した印としてフラグを付与し、再入を防止
            $finalContext = $context;
            $finalContext['__as_list_done'] = true;

            $result = $this->denormalizer->denormalize($data, $type, $format, $finalContext);
        } catch (\Throwable $e) {
            if (isset($context['deserialization_path'])) {
                $this->unsetCachePath($context['deserialization_path']);
            }
            throw new NotDeserializableException(sprintf('Could not deserialize as list response. %s', $e->getMessage()), $e);
        }

        if (isset($context['deserialization_path'])) {
            $this->unsetCachePath($context['deserialization_path']);
        }

        return $result;
    }

    /**
     * Unset cached path
     *
     * @param string $path
     *
     * @return void
     */
    private function unsetCachePath($path): void
    {
        if (($key = array_search($path, $this->cachePath)) !== false) {
            unset($this->cachePath[$key]);
        }
    }

    /**
     * {@inheritdoc}
     *
     * 1) 対象クラスが AsListDenormalizableInterface を実装しているか確認
     * 2) 既に一次展開済みの場合は、ただ委譲する（再入防止・後続処理継続）
     * 3) 無限ループ回避のため、キャッシュ済みの deserialization_path と一致する場合は false を返す
     */
    public function supportsDenormalization($data, string $type, ?string $format = null, array $context = []): bool
    {
        // 1) インターフェース実装確認
        if (!\in_array(AsListDenormalizableInterface::class, class_implements($type), true)) {
            return false;
        }

        // 2) 既に一次展開済みの場合は、ただ委譲する（再入防止・後続処理継続）
        if (isset($context['__as_list_done']) && $context['__as_list_done'] === true) {
            return false;
        }

        // 3) 無限ループ回避: キャッシュと現在のパスが一致していれば処理しない
        if (isset($context['deserialization_path'])) {
            return !\in_array($context['deserialization_path'], $this->cachePath, true);
        }

        // パス情報がない場合は許可
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function setSerializer(SerializerInterface $serializer)
    {
        if (!$serializer instanceof DenormalizerInterface) {
            throw new InvalidArgumentException('Expected a serializer that also implements DenormalizerInterface.');
        }

        $this->setDenormalizer($serializer);
    }

    public function getSupportedTypes(?string $format)
    {
        return [
            AsListDenormalizableInterface::class => false,
        ];
    }
}
