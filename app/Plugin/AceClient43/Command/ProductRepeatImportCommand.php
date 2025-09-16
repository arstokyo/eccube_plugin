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

namespace Plugin\AceClient43\Command;

use Eccube\Repository\MemberRepository;
use Plugin\AceClient43\Traits\ProductImportTrait;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ProductRepeatImportCommand extends Command
{
    use ProductImportTrait;

    protected static $defaultName = 'eccube:aceclient:import-product-repeat';

    private MemberRepository $memberRepository;

    public function __construct(
        MemberRepository $memberRepository,
    ) {
        parent::__construct();
        $this->memberRepository = $memberRepository;
    }

    protected function configure()
    {
        $this
            ->addArgument('creatorId', InputArgument::REQUIRED, '作成者ID')
            ->addOption('duration', null, InputOption::VALUE_OPTIONAL, '時間区間の分割 (例: 6 months, 1 year)', '6 months')
            ->addOption('repeat', null, InputOption::VALUE_OPTIONAL, 'リピート回数 (0 = 1回のみ実行)', 1)
            ->addOption('updateFrom', null, InputOption::VALUE_OPTIONAL, '更新対象開始日 (例: -1 year, -6 months)', '-1 year')
            ->addOption('updateTo', null, InputOption::VALUE_OPTIONAL, '更新対象終了日 (例: now, -6 months)', 'now')
            ->setHelp('このコマンドは通販Aceから商品を繰り返しインポートします。')
            ->setDescription('通販Aceから商品を繰り返しインポートするコマンド');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $creator = $this->validateCreatorId($input, $output, $this->memberRepository);
        if (null === $creator) {
            return Command::FAILURE;
        }

        $repeatCount = $this->validateRepeatCount($input, $output);
        if ($repeatCount === null) {
            return Command::FAILURE;
        }

        $duration = $this->validateDuration($input, $output);
        if ($duration === null) {
            return Command::FAILURE;
        }

        $updateDates = $this->validateDateTimeOptions($input, $output, '-1 year', '+1 day');
        if (null === $updateDates) {
            return Command::FAILURE;
        }

        [$updateFrom, $updateTo] = $updateDates;

        // 時間範囲をdurationで分割
        $timeChunks = $this->createTimeChunks($updateFrom, $updateTo, $duration);

        // repeat=0なら1回、repeat=2なら2回実行
        $totalRounds = max(1, $repeatCount);

        // エラー情報を格納する配列
        $errors = [];

        $output->writeln('<info>通販Aceの商品リピートインポートを開始します</info>');
        $output->writeln(sprintf('<info>全体実行回数: %d</info>', $totalRounds));
        $output->writeln(sprintf('<info>期間数: %d</info>', count($timeChunks)));
        $output->writeln(sprintf('<info>期間間隔: %s</info>', $duration));
        $output->writeln(sprintf(
            '<info>全体期間: %s から %s まで</info>',
            $updateFrom->format('Y-m-d H:i:s'),
            $updateTo->format('Y-m-d H:i:s')
        ));

        $output->writeln('<comment>=== 期間詳細 ===</comment>');
        foreach ($timeChunks as $index => $chunk) {
            $output->writeln(sprintf('<comment>期間 %d: %s ～ %s</comment>',
                $index + 1,
                $chunk['from']->format('Y-m-d H:i:s'),
                $chunk['to']->format('Y-m-d H:i:s')
            ));
        }
        $output->writeln('<comment>================================================================</comment>');

        // 全体処理をrepeat回数分実行
        try {
            for ($repeatRound = 0; $repeatRound <= $totalRounds; $repeatRound++) {
                $output->writeln(sprintf('<comment>===== 全体実行 %d/%d =====</comment>', $repeatRound, $totalRounds));
                // 各期間を順番に実行
                foreach ($timeChunks as $chunkIndex => $chunk) {
                    $chunkFrom = $chunk['from'];
                    $chunkTo = $chunk['to'];

                    $output->writeln(sprintf('<comment>--- 期間 %d/%d (全体実行 %d)---</comment>', $chunkIndex + 1, count($timeChunks), $repeatRound));
                    $output->writeln(sprintf('<info>期間時間範囲: %s から %s まで</info>',
                        $chunkFrom->format('Y-m-d H:i:s'),
                        $chunkTo->format('Y-m-d H:i:s')
                    ));

                    try {
                        $result = $this->executeProductImportCommand(
                            $creator->getId(),
                            $chunkFrom,
                            $chunkTo,
                            $output,
                            $chunkIndex,
                            count($timeChunks),
                            $repeatRound
                        );

                        if ($result) {
                            $output->writeln(sprintf('<info>期間 %d 完了</info>', $chunkIndex + 1));
                        } else {
                            $message = 'executeProductImportCommand failure';
                            $errors[] = [
                                'round' => $repeatRound,
                                'chunk' => $chunkIndex + 1,
                                'from' => $chunkFrom->format('Y-m-d H:i:s'),
                                'to' => $chunkTo->format('Y-m-d H:i:s'),
                                'message' => $message,
                            ];
                            $output->writeln(sprintf('<error>期間 %d でエラーが発生しました</error>', $chunkIndex + 1));
                        }
                    } catch (\Throwable $e) {
                        $errors[] = [
                            'round' => $repeatRound,
                            'chunk' => $chunkIndex + 1,
                            'from' => $chunkFrom->format('Y-m-d H:i:s'),
                            'to' => $chunkTo->format('Y-m-d H:i:s'),
                            'message' => $e->getMessage(),
                        ];
                        $output->writeln(sprintf('<error>期間 %d で予期しないエラーが発生しました: %s</error>',
                            $chunkIndex + 1, $e->getMessage()));
                    }
                }

                $output->writeln(sprintf('<info>全体実行 %d 完了</info>', $repeatRound));
            }
        } finally {
            if (!empty($errors)) {
                $output->writeln('<error>===== エラー一覧 =====</error>');
                foreach ($errors as $err) {
                    $output->writeln(sprintf(
                        '<error>全体実行 %d, 期間 %d (%s ～ %s): %s</error>',
                        $err['round'],
                        $err['chunk'],
                        $err['from'],
                        $err['to'],
                        $err['message']
                    ));
                }
            }
        }

        $output->writeln(sprintf('<info>===== リピートインポート完了 =====</info>'));

        return empty($errors) ? Command::SUCCESS : Command::FAILURE;
    }

    /**
     * 単一のインポート処理を実行する（コマンド呼び出し）
     *
     * @param int $creatorId
     * @param \DateTime $updateFrom
     * @param \DateTime $updateTo
     * @param OutputInterface $output
     * @param int $chunkIndex
     * @param int $totalChunks
     * @param int $repeatRound
     *
     * @return bool
     */
    private function executeProductImportCommand(int $creatorId, \DateTime $updateFrom, \DateTime $updateTo, OutputInterface $output, int $chunkIndex = 0, int $totalChunks = 1, int $repeatRound = 1): bool
    {
        try {
            // コマンドの引数を準備
            $arguments = [
                'command' => 'eccube:aceclient:import-product',
                'creatorId' => $creatorId,
                '--updateFrom' => $updateFrom->format('Y-m-d H:i:s'),
                '--updateTo' => $updateTo->format('Y-m-d H:i:s'),
                '--chunkIndex' => $chunkIndex,
                '--totalChunks' => $totalChunks,
                '--repeatRound' => $repeatRound,
            ];

            $arrayInput = new ArrayInput($arguments);

            // Get application instance
            $application = $this->getApplication();
            if (!$application instanceof Application) {
                throw new \RuntimeException('Application instance not available');
            }

            // コマンドを実行
            $returnCode = $application->doRun($arrayInput, $output);

            if ($returnCode === Command::SUCCESS) {
                // 成功時は適当な数値を返す（実際の数は取得困難）
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $e) {
            $output->writeln(sprintf('<error>コマンド実行中にエラーが発生しました: %s</error>', $e->getMessage()));

            return false;
        }
    }

    /**
     * 時間範囲をdurationで分割して期間を作成する
     *
     * @param \DateTime $fromDate
     * @param \DateTime $toDate
     * @param string $duration
     *
     * @return array
     */
    private function createTimeChunks(\DateTime $fromDate, \DateTime $toDate, string $duration): array
    {
        $chunks = [];
        $interval = \DateInterval::createFromDateString($duration);

        $currentFrom = clone $fromDate;
        $finalTo = clone $toDate;
        $chunkCount = 0;

        while ($currentFrom < $finalTo) {
            $chunkCount++;
            $currentTo = clone $currentFrom;
            $currentTo->add($interval);

            // 最後の期間は終了日まで
            if ($currentTo >= $finalTo) {
                $currentTo = clone $finalTo;
                if ($currentFrom->getTimestamp() < $currentTo->getTimestamp()) {
                    $chunks[] = [
                        'from' => clone $currentFrom,
                        'to' => clone $currentTo,
                    ];
                }
                break; // 最後の期間なので終了
            }

            $chunks[] = [
                'from' => clone $currentFrom,
                'to' => clone $currentTo,
            ];

            $currentFrom = clone $currentTo;
        }

        return $chunks;
    }

    /**
     * リピート回数を検証する
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int|null
     */
    private function validateRepeatCount(InputInterface $input, OutputInterface $output): ?int
    {
        $repeat = $input->getOption('repeat');

        if (!is_numeric($repeat)) {
            $output->writeln('<error>リピート回数は数値でなければなりません。</error>');

            return null;
        }

        $repeatCount = (int) $repeat;
        if ($repeatCount < 0) {
            $output->writeln('<error>リピート回数は0以上でなければなりません。</error>');

            return null;
        }

        return $repeatCount;
    }

    /**
     * 待機時間を検証する
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return string|null
     */
    private function validateDuration(InputInterface $input, OutputInterface $output): ?string
    {
        $duration = $input->getOption('duration');

        try {
            $interval = \DateInterval::createFromDateString($duration);
            if ($interval === false) {
                throw new \Exception('Invalid duration format');
            }

            return $duration;
        } catch (\Exception $e) {
            $output->writeln(sprintf('<error>デュレーションの形式が無効です: %s</error>', $duration));

            return null;
        }
    }
}
