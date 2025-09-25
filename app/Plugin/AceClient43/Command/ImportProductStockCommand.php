<?php

namespace Plugin\AceClient43\Command;

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Repository\ProductClassRepository;
use Plugin\AceClient43\AceServices\Model\Response\WebApi\Goods\V1\GetStockByUpdate\V1GetStockByUpdateResponseModelInterface;
use Plugin\AceClient43\Bridge\ProductBridge;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * 在庫インポートコマンド（更新日ベース・ページネーション対応）
 *
 * 例:
 *  bin/console eccube:aceclient:import-product-stock --updateFrom="2024-01-01 00:00:00" --toDate="now" --skid="0000000" --limit=300
 */
class ImportProductStockCommand extends Command
{
    protected static $defaultName = 'eccube:aceclient:import-product-stock';

    private ProductBridge $productBridge;

    private ProductClassRepository $productClassRepository;

    private EntityManagerInterface $entityManager;

    protected LoggerInterface $logger;

    public function __construct(
        ProductBridge $productBridge,
        ProductClassRepository $productClassRepository,
        EntityManagerInterface $entityManager,
        LoggerInterface $consoleLogger,
    ) {
        parent::__construct();
        $this->productBridge = $productBridge;
        $this->productClassRepository = $productClassRepository;
        $this->entityManager = $entityManager;
        $this->logger = $consoleLogger;
    }

    protected function configure()
    {
        $this
            ->setDescription('通販Aceから在庫をインポートする（更新日ベース、ページネーション対応）')
            ->addOption('updateFrom', null, InputOption::VALUE_REQUIRED, '更新対象開始日時 (例: 2024-06-01 00:00:00)')
            ->addOption('toDate', null, InputOption::VALUE_OPTIONAL, '更新対象終了日時（未指定時は現在）')
            ->addOption('skid', null, InputOption::VALUE_OPTIONAL, '倉庫ID（未指定時はフィルタなし）')
            ->addOption('limit', null, InputOption::VALUE_OPTIONAL, '1ページ件数（既定: 300）', 300)
            ->addOption('startPage', null, InputOption::VALUE_OPTIONAL, '開始ページ（既定: 1）', 1)
            ->addOption('maxPages', null, InputOption::VALUE_OPTIONAL, '最大ページ数（任意、未指定で無制限）');
    }

    /**
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $logger = $this->logger;
        $updateFromStr = (string) $input->getOption('updateFrom');

        if ($updateFromStr === '') {
            $logger->error('<error>--updateFrom は必須です。</error>');

            return Command::FAILURE;
        }

        $updateFrom = new \DateTimeImmutable($updateFromStr);
        $toDate = $input->getOption('toDate') ? new \DateTimeImmutable((string) $input->getOption('toDate')) : null;
        $skid = $input->getOption('skid') ? (string) $input->getOption('skid') : null;
        $limit = (int) $input->getOption('limit');
        $page = (int) $input->getOption('startPage');
        $maxPages = $input->getOption('maxPages') !== null ? (int) $input->getOption('maxPages') : null;

        $logger->info(sprintf('<info>在庫インポート開始: from=%s to=%s skid=%s limit=%d startPage=%d</info>',
            $updateFrom->format('Y-m-d H:i:s'),
            $toDate ? $toDate->format('Y-m-d H:i:s') : '(now)',
            $skid ?: '(なし)',
            $limit,
            $page
        ));

        $processed = 0;
        $pagesProcessed = 0;
        do {
            /** @var V1GetStockByUpdateResponseModelInterface $resp */
            $resp = $this->productBridge->getStockByUpdateV1Response($updateFrom, $toDate, $skid, $page, $limit);

            $items = $resp->getItems();
            $logger->info(sprintf('<comment>ページ %d: 取得件数 %d</comment>', $resp->getPage(), count($items)));

            // 在庫更新
            foreach ($items as $item) {
                $aceProductId = $item->getGdid();
                $stock = max(0, $item->getZaiko());

                $productClass = $this->productClassRepository->findOneBy(['ace_product_id' => $aceProductId]);
                if (!$productClass) {
                    // 未登録の商品はスキップ
                    continue;
                }
                $productStock = $productClass->getProductStock();
                if ($productStock) {
                    $productStock->setStock($stock);
                }
                $productClass->setStock($stock);

                $this->entityManager->persist($productClass);
                if ($productStock) {
                    $this->entityManager->persist($productStock);
                }

                $processed++;
            }

            $this->entityManager->flush();
            $this->entityManager->clear();

            $hasMore = $resp->getHasMore();
            $page++;
            $pagesProcessed++;

            if ($maxPages !== null && $pagesProcessed >= $maxPages) {
                $logger->info('<info>最大ページ数に到達したため終了します。</info>');
                break;
            }
        } while ($hasMore);

        $logger->info(sprintf('<info>在庫インポート完了（更新件数: %d）</info>', $processed));

        return Command::SUCCESS;
    }
}
