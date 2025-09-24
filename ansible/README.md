# EC-CUBE 開発環境セットアップ

Ansibleを使用してEC-CUBE開発環境の構築を自動化します。

## 前提条件

- Ansible 2.9以上
- Python 3.x
- 対象マシンへのSSHアクセス

## 設定方法

1. **ホスト変数の設定**

`host_vars/127.0.0.1.yml`を編集:
```yaml
ansible_user: 開発ユーザー名
ansible_ssh_pass: SSHパスワード
ansible_become_pass: sudoパスワード
```

2. **変数のカスタマイズ（任意）**

`group_vars/all.yml`で以下の設定を変更可能:
- PHP設定
- Apache設定
- データベース認証情報
- EC-CUBE固有の設定

## 使用方法

1. **初期セットアップ**

```bash
# 環境構築の実行
ansible-playbook -i hosts.ini playbooks/provisions.yml
```

2. **開発サービスの起動**

```bash
# MySQL、Symfonyサーバー、アセットウォッチャーの起動
ansible-playbook -i hosts.ini playbooks/serve.yml
```

## ディレクトリ構造

```
ansible/
├── group_vars/
│   └── all.yml          # 共通変数
├── host_vars/
│   └── 127.0.0.1.yml    # ホスト固有の変数
├── playbooks/
│   ├── provisions.yml    # 環境構築用プレイブック
│   └── serve.yml        # サービス起動用プレイブック
├── roles/
│   ├── apache/          # Apache設定
│   ├── php/            # PHP設定
│   ├── docker/         # Docker設定
│   └── ...
└── hosts.ini           # インベントリファイル
```

## 利用可能なロール

- `php`: PHP 8.2と必要な拡張機能
- `apache`: Apacheウェブサーバーの設定
- `docker`: DockerとDocker Compose
- `composer`: Composerパッケージマネージャー
- `yarn`: Node.jsとYarn
- `symfony-cli`: Symfony CLIツール

## 開発ワークフロー

1. リポジトリのクローン
2. ホスト変数の設定
3. provisionsプレイブックの実行
4. serveプレイブックの実行
5. `http://localhost:8000`でサイトにアクセス

## トラブルシューティング

- **権限の問題**: `host_vars`のユーザー設定を確認
- **MySQLの接続**: Dockerコンテナの状態を確認
- **Apacheのエラー**: `/var/log/apache2`のログを確認

## メンテナンス

設定を更新する場合:
1. ロールのタスクや変数を修正
2. 特定のロールを再実行:
```bash
ansible-playbook -i hosts.ini playbooks/provisions.yml --tags="php,apache"
```

## 注意事項

- 開発環境専用の設定です
- パスワードなどの機密情報は本番環境では適切に管理してください
- 問題が発生した場合は、まずログを確認してください