<?php

namespace Plugin\AceClient43\Util\ModelResolver;

use Plugin\AceClient43\Util\Mapper\OverviewMapper;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerInterface;

/**
 * モデルリゾルバー用キャッシュウォーマー
 * -----------------------------------------------------------------------------
 * 概要:
 * - Symfony のキャッシュウォームアップ時に、リクエスト/レスポンス/依存モデルの解決結果を
 *   キャッシュプール（cache.ace.model）へ事前投入します。
 * - ランタイムでの初回解決コストを削減し、パフォーマンスを向上させます。
 *
 * 実装ポイント:
 * - キャッシュプール（CacheItemPoolInterface）と ModelResolver を DI で受け取ります。
 * - リクエスト/レスポンスの検索パス（$requestSearchPaths, $responseSearchPaths）を外部から注入可能。
 * - いずれも未指定の場合は FilesystemAdapter('cache.ace.model') と新規 ModelResolver をフォールバック利用。
 * - ウォームアップ処理は失敗に強い（例外は握りつぶし、デプロイを阻害しません）。
 */
class ModelResolverWarmer implements CacheWarmerInterface
{
    /**
     * @var ModelResolver
     */
    private ModelResolver $resolver;

    /**
     * @var array<int,string>
     */
    private array $requestSearchPaths = [];

    /**
     * @var array<int,string>
     */
    private array $responseSearchPaths = [];

    /**
     * @var array<int,string>
     */
    private array $dependencySearchPaths = [];

    public function __construct(
        ModelResolver $resolver,
        array $requestSearchPaths = [],
        array $responseSearchPaths = [],
        array $dependencySearchPaths = [],
    ) {
        $this->resolver = $resolver;

        // 注入がなければデフォルトパスを利用
        $this->requestSearchPaths = !empty($requestSearchPaths) ? $requestSearchPaths : [
            'Plugin/'.OverviewMapper::PLUGIN_NAME.'/AceServices/Model/Request',
            'Customize/AceClient/Model/Request',
        ];

        $this->responseSearchPaths = !empty($responseSearchPaths) ? $responseSearchPaths : [
            'Plugin/'.OverviewMapper::PLUGIN_NAME.'/AceServices/Model/Response',
            'Customize/AceClient/Model/Response',
        ];

        $this->dependencySearchPaths = !empty($dependencySearchPaths) ? $dependencySearchPaths : [
            'Customize/AceClient/Model/Dependency',
            'Plugin/'.OverviewMapper::PLUGIN_NAME.'/AceServices/Model/Dependency',
        ];
    }

    public function isOptional(): bool
    {
        // Optional so cache warmup doesn't fail the deployment if resolution has issues
        return true;
    }

    /**
     * @param string $cacheDir
     *
     * @return array<string>
     */
    public function warmUp(string $cacheDir): array
    {
        $resolver = $this->resolver;

        $appPath = dirname(__DIR__, 4);

        // 注入された検索パス（未指定時はコンストラクタで設定されたデフォルトを使用）
        $requestPaths = $this->requestSearchPaths;
        $responsePaths = $this->responseSearchPaths;

        // 依存モデルも外部から注入された検索パスを使用
        $dependencyPaths = $this->dependencySearchPaths;

        // 全ての型（インターフェースおよびクラス）を収集
        $requestTypes = $this->gatherTypes($appPath, $requestPaths);
        $responseTypes = $this->gatherTypes($appPath, $responsePaths);
        $dependencyTypes = $this->gatherTypes($appPath, $dependencyPaths);

        // Requestモデルをウォーム
        foreach ($requestTypes as $type) {
            try {
                $resolver->findRequestModel($type);
            } catch (\Throwable $e) {
                // 失敗してもウォームアップ全体は継続
            }
        }

        // Responseモデルをウォーム
        foreach ($responseTypes as $type) {
            try {
                $resolver->findResponseModel($type);
            } catch (\Throwable $e) {
                // 失敗してもウォームアップ全体は継続
            }
        }

        // Dependencyモデルはリクエスト/レスポンス両方のキーでウォーム
        foreach ($dependencyTypes as $type) {
            try {
                $resolver->findRequestModel($type);
            } catch (\Throwable $e) {
                // 継続
            }
            try {
                $resolver->findResponseModel($type);
            } catch (\Throwable $e) {
                // 継続
            }
        }

        return [];
    }

    /**
     * 指定パス配下の全ての PHP ファイルから、FQCN を導出して返します。
     * - インターフェースだけでなく、具象クラスも対象とします。
     * - 認識できたクラス/インターフェースのみを返し、重複は排除します。
     *
     * @param string $appPath
     * @param array<int,string> $searchPaths
     *
     * @return array<int,string> FQCN 一覧（interface_exists() または class_exists() が true のもの）
     */
    private function gatherTypes(string $appPath, array $searchPaths): array
    {
        $types = [];

        foreach ($searchPaths as $searchPath) {
            $basePath = $appPath.'/'.$searchPath;
            if (!is_dir($basePath)) {
                continue;
            }

            $finder = new Finder();
            $finder->files()->name('*.php')->in($basePath);

            foreach ($finder as $file) {
                $fqcn = $this->classNameFromFile($file->getPathname(), $searchPath, $appPath);
                if (!is_string($fqcn)) {
                    continue;
                }
                if (\interface_exists($fqcn) || \class_exists($fqcn)) {
                    $types[$fqcn] = $fqcn;
                }
            }
        }

        return \array_values($types);
    }

    private function classNameFromFile(string $filePath, string $searchPath, string $appPath): ?string
    {
        $fullSearchPath = rtrim($appPath.'/'.$searchPath, '/').'/';

        if (strpos($filePath, $fullSearchPath) !== 0) {
            return null;
        }

        $relativePath = substr($filePath, strlen($fullSearchPath));
        $relativePath = str_replace('.php', '', $relativePath);
        $relativePath = str_replace('/', '\\', $relativePath);

        $namespace = str_replace('/', '\\', $searchPath);

        return $namespace.'\\'.$relativePath;
    }
}
