# helloVuejs
Vue.jsのSFC（単一ファイルコンポーネント）＋PHPでWebアプリケーションを構築する

## ツールなどのインストール

### Node.jsのインストール

[Node.js](https://nodejs.org/ja/)

### Composerのインストール

[Composer](https://getcomposer.org/)

### ApacheとPHPのインストール

こちらのページの[Apacheの設定](https://qiita.com/ison12/items/364cf5341651dd385ea3#xampp%E3%81%AE%E3%82%A4%E3%83%B3%E3%82%B9%E3%83%88%E3%83%BC%E3%83%AB)を実施

## インストール方法

    cd [Git cloneしたディレクトリ or Downloadディレクトリ]
    npm install
    composer install

## 起動方法

以下のコマンドでNode.jsのWebサーバーが起動できます。

    npm run start

各画面の表示

- [Hello画面](http://localhost:8080/hello-vuejs/hello)
- [Goodbye画面](http://localhost:8080/hello-vuejs/goodbye)

## ビルド方法

以下のコマンドでbundle.jsが生成されます。

    npm run build

## 元になった記事
[Vue.jsのSFC（単一ファイルコンポーネント）＋PHPでWebアプリケーションを構築する - バックエンド環境編](https://qiita.com/ison12/items/364cf5341651dd385ea3)