<?php

namespace Plugin\AceClient43\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Events;
use Eccube\Entity\CartItem;

/**
 * CartItem の数量や価格が変更された際に dirty フラグを true に設定する Doctrine サブスクライバ。
 *
 * 目的:
 * - ユーザーがカート画面を経由せずに購入フローへ進むことを防ぎ、カート上の変更を一旦「未確定(Dirty)」として扱う。
 *
 * 仕様(PreUpdate):
 * - 同一トランザクション内で dirty フィールド自体が変更されている場合は、他処理（例: 同期処理や明示的な確定処理）が状態を調整しているため何もしない。
 * - すでに dirty=true の場合は再設定しない（冪等性の確保）。
 * - プレゼント商品（present=true）は dirty 管理の対象外とし何もしない。
 * - 上記に該当しない場合に限り、quantity または price のいずれかが変更されていれば dirty=true をセットし、
 *   UnitOfWork の ChangeSet を再計算して確実にDB更新へ反映する。
 */
class CartItemDirtySubscriber implements EventSubscriber
{
    public function getSubscribedEvents(): array
    {
        return [
            Events::preUpdate,
        ];
    }

    /**
     * Doctrine preUpdate イベントハンドラ。
     *
     * 振る舞い:
     * - dirty が変更されている更新はスキップ（外部または上位の意図的な変更を尊重）。
     * - 既に dirty の場合、または present アイテムはスキップ。
     * - quantity / price の変更検知時に dirty=true を設定し、ChangeSet を再計算。
     *
     * @param PreUpdateEventArgs $args エンティティ更新前イベント引数
     */
    public function preUpdate(PreUpdateEventArgs $args): void
    {
        $entity = $args->getObject();

        if (!$entity instanceof CartItem) {
            return;
        }

        // 別処理が dirty を明示的に変更している場合は介入しない
        if ($args->hasChangedField('dirty')) {
            return;
        }

        // 既に dirty の場合は再設定しない
        // プレゼント商品は無視
        if ($entity->isDirty() || $entity->isPresent()) {
            return;
        }

        foreach (['quantity', 'price'] as $field) {
            if ($args->hasChangedField($field)) {
                // 変更が検出されたら未確定にする
                $entity->setDirty(true);

                // ChangeSet に dirty=true を反映
                $om = $args->getObjectManager();
                $uow = $om->getUnitOfWork();
                $meta = $om->getClassMetadata(CartItem::class);
                $uow->recomputeSingleEntityChangeSet($meta, $entity);

                break;
            }
        }
    }
}
