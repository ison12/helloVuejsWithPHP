<?php

namespace App\Func\Base\Controller;

use App\Common\DB\DBObserver;
use App\Common\Exception\ServiceException;
use App\Common\Log\AppLogger;
use App\Common\Message\MessageManager;
use App\Common\ResponseCache\ResponseCache;
use App\Common\Session\SessionData;
use App\Common\Util\DBUtil;
use App\Constant\CommonConstant;
use App\Func\Login\Service\LoginService;
use SebastianBergmann\RecursionContext\Exception;
use Slim\App;
use Slim\Container;
use Slim\Exception\NotFoundException;
use Slim\Http\Response;
use Slim\Http\Stream;
use const SRC_PATH;

/**
 * 基本となるコントローラークラス。
 * コントローラクラスは、本クラスを継承すること。
 */
class BaseController {

    /**
     * @var App Appオブジェクト
     */
    protected $app;

    /**
     *
     * @var Container Containerオブジェクト
     */
    protected $container;

    /**
     * @var AppLogger ロガー
     */
    protected $logger;

    /**
     * @var string レイアウト名
     */
    protected $layoutName;

    /**
     * @var array リクエストパラメータ
     */
    protected $requestParams;

    /**
     * コンストラクタ。
     * @param App $app アプリケーションオブジェクト
     */
    public function __construct(App $app) {

        $this->app = $app;
        $this->container = $app->getContainer();
        $this->logger = $this->container['logger'];

        $this->layoutName = 'Base';
        $this->requestParams = null;

    }

    /**
     * リクエストパラメータを取得する。
     * @return array リクエストパラメータ
     */
    protected function getRequestParams(): array {

        if ($this->requestParams !== null) {
            return $this->requestParams;
        }

        $request = $this->container->request;

        $getParams = $request->getQueryParams() ?? [];
        $postPutParams = $request->getParsedBody() ?? [];

        $allParams = array_merge($getParams, $postPutParams);
        $this->requestParams = $allParams;

        return $allParams;
    }

    /**
     * 描画メソッド。
     * @param string $contentsViewPath コンテンツビューのパス … /srcディレクトリからのパスを指定する（例：/Func/Login/Front/View/Login）
     * @param array $contentsData データ
     * @param string $layoutName レイアウトページ名 … /src/View/Layout下のレイアウトページを指定する（例：Base.phpの場合は、"Base"と指定する）
     * @param array $importWidget インポートするWidget
     * @return type
     */
    protected function render(string $contentsViewPath, array $contentsData, string $layoutName = null) {

        if (!file_exists(SRC_PATH . $contentsViewPath . '.vue')) {
            // ファイルが存在しないため、例外を発行する（基本的には発生しないエラー）
            throw new \Exception("コンテンツビューファイル未存在エラー contentsViewPath={$contentsViewPath}");
        }

        $contentsViewName = basename($contentsViewPath);

        // レイアウトページの設定
        if ($layoutName === null) {
            $layoutName = $this->layoutName;
        }
        $layoutPhp = '/View/Layout/' . $layoutName . '.php';

        // コンテナから関連するオブジェクトを取得
        $container = $this->container;
        $request = $container->request;
        $response = $container->response;
        $renderer = $container->renderer;
        $baseUrl = $request->getUri()->getBasePath();

        // リクエストパラメーターを取得する
        $requestParams = $this->getRequestParams();

        // レイアウトページのデータオブジェクト
        $layoutDataObj = [
            '__baseUrl' => $baseUrl,
            '__requestParams' => $requestParams,
            '__contentsViewPath' => $contentsViewPath,
            '__contentsViewName' => $contentsViewName,
            '__contentsData' => $contentsData,
        ];

        return $renderer->render($response
                        , $layoutPhp
                        , $layoutDataObj);
    }

    /**
     * Json出力メソッド。
     * @param mixed $data The data
     * @param int $status The HTTP status code.
     * @param int $encodingOptions Json encoding options
     * @return type
     */
    protected function renderJson($data, int $status = null, int $encodingOptions = 0) {

        $response = $this->container->response;

        return $response->withJson($data, $status, $encodingOptions);
    }

}
