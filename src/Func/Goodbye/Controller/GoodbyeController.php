<?php

namespace App\Func\Goodbye\Controller;

use App\Func\Base\Controller\BaseController;
use Slim\App;

/**
 * Goodbyeコントローラー。
 */
class GoodbyeController extends BaseController {

    /**
     * コンストラクタ。
     * @param App $app アプリケーションオブジェクト
     */
    public function __construct(App $app) {
        parent::__construct($app);
    }

    /**
     * 表示処理。
     */
    public function actionIndex() {

        return $this->render('/Func/Goodbye/Front/View/Goodbye', []);
    }

}