<?php

namespace App\Func\Hello\Controller;

use App\Func\Base\Controller\BaseController;
use Slim\App;

/**
 * Helloコントローラー。
 */
class HelloController extends BaseController {

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

        return $this->render('/Func/Hello/Front/View/Hello', []);
    }

    /**
     * 話す処理。
     */
    public function actionTalk() {

        $params = $this->getRequestParams();

        $data = ['talkMessage'=>"Hi, I came from space."];

        return $this->renderJson($data);
    }
}