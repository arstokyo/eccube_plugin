<?php

namespace Plugin\AceClient43\EventListener;

use Plugin\AceClient43\Bridge\OrderBridge;
use Plugin\AceClient43\Events\EccubeEvents\Events;
use Plugin\AceClient43\Events\EccubeEvents\OnPurchaseCompleteEvent;
use Plugin\AceClient43\Exception\CouldNotCreateOrderException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * 購入完了イベント購読リスナー
 *
 * 挙動（現状実装）:
 * - セッションキー "ace_client_creating_order"（bool）で注文確定処理の実行中フラグを管理します。
 * - フラグが既に存在する場合は「別の注文処理が進行中」とみなし、本処理を中断（return）します。
 * - フラグが存在しない場合は true を設定し、処理終了時（finally）に必ず削除します。
 *
 * 注意:
 * - 本フラグは受注IDを保持しません。よって同一セッション内では、どの受注であっても
 *   実行中は同時並行の注文確定処理を抑止します（セッション単位の排他）。
 * - 重複イベントの発火や画面多重送信による二重実行を防止するための最小限のガードです。
 */
class OnPurchaseCompleteListener implements EventSubscriberInterface
{
    public const ACE_CLIENT_CREATING_ORDER = 'ace_client_creating_order.';

    private OrderBridge $orderBridge;

    public function __construct(
        OrderBridge $orderBridge,
    ) {
        $this->orderBridge = $orderBridge;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::ON_PURCHASE_COMPLETE => ['onComplete', 100],
        ];
    }

    /**
     * @throws CouldNotCreateOrderException
     */
    public function onComplete(OnPurchaseCompleteEvent $event): void
    {
        $request = $event->request;
        $Order = $event->Order;
        $orderId = $Order->getId();

        if (!$request->hasSession()) {
            log_error('[Ace注文処理] ['.$orderId.'] セッションが存在しませんため、注文処理を中断します。');

            return;
        }

        if (method_exists($Order, 'getAceOrderId') && $aceOrderId = $Order->getAceOrderId()) {
            log_warning('[Ace注文処理] ['.$orderId.'] 注文はすでに通販Aceと連携ずみのため、注文処理を中断します。', [
                'ace_order_id' => $aceOrderId,
            ]);

            return;
        }

        if ($request->getSession()->has(self::ACE_CLIENT_CREATING_ORDER.$orderId)) {
            log_warning('[Ace注文処理] ['.$orderId.'] 注文処理中に別の注文処理が開始されましたため、本注文処理を中断します。');

            return;
        }

        foreach ($Order->getShippings() as $Shipping) {
            try {
                $request->getSession()->set(self::ACE_CLIENT_CREATING_ORDER.$orderId, true);
                $request->getSession()->save();

                log_info('[Ace注文処理] ['.$orderId.'] 通販Aceの注文確定処理を開始します。');

                $this->orderBridge->create(
                    $Shipping,
                    $event->decisionOptions,
                    $event->shouldFlush,
                    $event->options,
                );

                log_info('[Ace注文処理] ['.$orderId.'] 通販Aceの注文確定処理が完了しました。');
            } catch (\Throwable $e) {
                log_error('[Ace注文処理] ['.$orderId.'] 注文処理中にエラーが発生しました。', [$e->getMessage()]);

                if ($e instanceof CouldNotCreateOrderException) {
                    throw $e;
                }

                throw new CouldNotCreateOrderException('通販Aceの注文処理中にエラーが発生しました。', $e);
            } finally {
                log_info('[Ace注文処理] ['.$orderId.'] 注文処理中のセッションを削除します。');
                $request->getSession()->remove(self::ACE_CLIENT_CREATING_ORDER.$orderId);
            }
        }
    }
}
