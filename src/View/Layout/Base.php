<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Cache-Control" content="no-cache">
        <meta http-equiv="Expires" content="Mon, 26 Jul 1997 05:00:00 GMT">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale = 1.0, maximum-scale = 1.0, user-scalable = no">

        <title>Hello Vue.js</title>

    </head>

    <body class="layout-base">

        <div id="app" v-cloak>
        </div>

        <?php /* グローバル関連の定義 */ ?>
        <script type="text/javascript">

            // アプリケーションコンテキストの定義（アプリケーション全体で使用したいデータ等を定義、イミュータブルなオブジェクトにする）
            var AppContext = Object.freeze({
                name: 'Hello Vue.js',
                baseUrl: '<?= $__baseUrl ?>',
                requestParams: <?= json_encode($__requestParams) ?>,
                contentsComponentPath: '<?= $__contentsViewPath ?>',
                contentsComponentId: '<?= $__contentsViewName ?>Component',
                contentsData: <?= json_encode($__contentsData) ?>
            });

        </script>

        <?php /* バンドルファイルの読み込み */ ?>
        <?php /* ※本ファイルの読み込み後に、main.jsで定義したグローバル変数などが読み込みできるようになる */ ?>
        <script src="<?= $__baseUrl . '/dist/bundle.js?' . filemtime(PUBLIC_PATH . 'dist/bundle.js') ?>" ></script>

        <?php /* Vue.js生成 */ ?>
        <script type="text/javascript">
            // Vue.js生成
            window.AppFuncs.createVuejs(AppContext.contentsComponentPath, AppContext.contentsComponentId);
        </script>

    </body>

</html>