// -----------------------------------------------------------------------------
// ライブラリのインポート
// -----------------------------------------------------------------------------
// JQuery
import $ from 'jquery';
// VueJs
import Vue from 'vue';

/**
 * アプリケーションの関数定義
 */
const AppFuncs = {

    /**
     * Vue.jsインスタンスを生成する。
     * @param {String} componentPath コンポーネントパス
     * @param {String} componentId コンポーネントID
     * @returns {Vue} Vue.jsインスタンス
     */
    createVuejs(componentPath, componentId) {

        // 動的インポートを実施
        //
        // componentPathを以下のルールで変換
        // 例）ログインの場合
        //    /Func/Login/Front/View/Login
        //     ↓
        //   ./Func/Login/Front/View/Login.vue
        const componentLoadPromise = import("./" + componentPath.replace(/^\//, "") + ".vue");

        componentLoadPromise.then(function (value) {
            // 動的インポート完了

            // VueのComponentのグローバル登録は、Vueインスタンス生成前に実施する必要あり
            Vue.component(componentId, value.default /* import関数の戻り値に default があるので、そちらを使用する（defaultエクスポート定義を読み込むという意味になる） */);
            // Vueインスタンスの生成
            const vm = new Vue({
                el: '#app',
                render: h => h(componentId)
            });

            return vm;
        });

    }

};

// -----------------------------------------------------------------------------
// グローバル変数の定義
// -----------------------------------------------------------------------------
window.$ = $; // jQueryオブジェクト
window.AppFuncs = AppFuncs;