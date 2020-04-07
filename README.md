# helloVuejs
Vue.jsのSFC（単一ファイルコンポーネント）＋PHPでWebアプリケーションを構築する

## ツールなどのインストール

### Apache+PHPのインストール

[こちらの記事](https://qiita.com/ison12/items/364cf5341651dd385ea3#apache%E3%81%AE%E8%A8%AD%E5%AE%9A)の以下を実施
1. Xamppのインストール
1. Apacheの設定
1. PHPの設定
1. Apacheの起動

### Node.jsのインストール

[Node.js](https://nodejs.org/ja/)

### Composerのインストール

[Composer](https://getcomposer.org/)

## インストール方法

    cd [Git cloneしたディレクトリ or Downloadディレクトリ]
    npm install
    composer install

## 起動方法

以下のコマンドでNode.jsのWebサーバーが起動できます。

    npm run start

上のコマンドを実行後、以下のURLで各画面へのアクセスが可能。

- [Hello画面](http://localhost:8080/hello-vuejs/hello)
- [Goodbye画面](http://localhost:8080/hello-vuejs/goodbye)

## ビルド方法

以下のコマンドでbundle.jsが生成されます。

    npm run build

## 元になった記事
[Vue.jsのSFC（単一ファイルコンポーネント）＋PHPでWebアプリケーションを構築する - バックエンド環境編](https://qiita.com/ison12/items/364cf5341651dd385ea3)