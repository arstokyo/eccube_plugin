# EC-CUBE 開発者ガイド

## セットアップ手順

### 1. プロジェクトのクローン
```bash
git clone [repository-url]
cd ec-cube
```

### 2. Ansibleのインストール
```bash
# Ubuntu/Debian
sudo apt update
sudo apt install ansible

# Python依存関係のインストール
pip install ansible-core
```

### 3. Ansible Playbook の実行
```bash
ansible-playbook ansible/playbooks/dev.yml -i ansible/hosts.ini
```

### 4. テンプレートコードの設定
`.env`ファイルを編集し、使用するテンプレートコードを設定します：
```bash
ECCUBE_TEMPLATE_CODE=target_template_code
```

### 5. アセットの監視
```bash
yarn watch
```

### 6. 開発サーバーの起動（既に起動中の場合は飛ばす）
```bash
symfony serve --allow-http --allow-all-ip -d
```

## Stimulus Controller の開発

### コントローラーの作成
コントローラーは `assets/controllers` ディレクトリに配置します。

例：
```typescript
// assets/controllers/hello_controller.ts
import { Controller } from '@hotwired/stimulus'

export default class extends Controller<HTMLElement> {
    static targets = [ "name" ]
    declare nameTarget: HTMLInputElement

    connect() {
        console.log("Hello, Stimulus!", this.element)
    }
}
```

### コントローラーの使用
```twig
<div data-controller="hello">
    <input data-hello-target="name">
</div>
```

## Twigコンポーネントの開発

### コンポーネントの場所
デフォルトのコンポーネントディレクトリ：
```
templates/components/
```

### 基本的なコンポーネント
```twig
{# templates/components/alert.html.twig #}
<div {{ attributes.defaults({class: 'alert'}) }}>
    {{ content }}
</div>
```


## Live コンポーネントの開発

### PHPコンポーネントの作成
コンポーネントは `app/Customize/Twig/Components` ディレクトリに配置します：

```php
// filepath: app/Customize/Twig/Components/LiveProductSearch.php
namespace Customize\Twig\Components;

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent()]
class LiveProductSearch
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public string $query = '';

    public function __construct(
        private ProductRepository $productRepository,
    ) {
    }

    public function getProducts(): array
    {
        return $this->productRepository->findBy(['name' => $this->query]);
    }
}
```

### Twigテンプレートの作成
```twig
{# templates/components/live_product_search.html.twig #}
<div>
    <input 
        type="text" 
        name="query" 
        value="{{ query }}"
        data-model="query"
    >

    <ul>
        {% for product in this.products %}
            <li>{{ product.name }}</li>
        {% endfor %}
    </ul>
</div>
```

### コンポーネントの使用
任意のTwigテンプレートで以下のように呼び出します：

```twig
<twig:component name="Customize:LiveProductSearch">
    {# オプションでプロパティを渡すことができます #}
    <twig:bind name="query">初期値</twig:bind>
</twig:component>
```

### Live コンポーネントの重要な点

1. **コンポーネントクラスの設定**
   - `#[AsLiveComponent()]` アトリビュートを必ず付与
   - `DefaultActionTrait` を使用
   - 変更可能なプロパティには `#[LiveProp(writable: true)]` を設定

2. **命名規則**
   - PHPクラス: `組織名\Twig\Components` 名前空間に配置
   - Twigテンプレート: `templates/components/` に配置
   - ファイル名はクラス名をスネークケースに変換

3. **データバインディング**
   - `data-model`: 双方向バインディング
   - `data-action`: イベントハンドリング
   - `this.メソッド名`: コンポーネントのメソッドアクセス

4. **ライフサイクル**
   - コンポーネントは状態を保持
   - プロパティの変更で自動的に再レンダリング
   - `mount()` メソッドで初期化処理が可能

5. **ベストプラクティス**
   - 単一責任の原則に従う
   - 適切なバリデーションの実装
   - パフォーマンスを考慮したクエリの作成

## 開発の注意点

1. コントローラーの命名規則
   - キャメルケースで記述
   - ファイル名は `_controller.js` で終わる

2. コンポーネントのベストプラクティス
   - 再利用可能なコンポーネントを心がける
   - props の型を明確にする
   - コンポーネントは単一責任の原則に従う

3. アセットビルド
   - 開発時は `yarn watch` を常時実行
   - 本番ビルドは `yarn build` を使用

4. デバッグ
   - Symfony プロファイラーを活用
   - ブラウザの開発者ツールでStimulusデバッグ

## トラブルシューティング

- **Stimulusコントローラーが動作しない場合**
  - コントローラー名とDOM要素の`data-controller`属性が一致しているか確認
  - JavaScriptコンソールでエラーを確認

- **コンポーネントが表示されない場合**
  - キャッシュのクリア: `php bin/console cache:clear`
  - テンプレートパスが正しいか確認

- **アセットビルドエラー**
  - `node_modules`を削除して`yarn install`を再実行
  - Webpackのログを確認