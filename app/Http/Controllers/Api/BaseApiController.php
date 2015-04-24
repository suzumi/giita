<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

/**
 * APIのスーパークラス
 */
abstract class BaseApiController extends Controller
{
    /* API処理成功 */
    const STATUS_SUCCESS = 1;
    /* API処理失敗 */
    const STATUS_ERROR = 0;
    /* API認証失敗 */
    const STATUS_AUTH_ERROR = -1;

    /**
     * レスポンスJSONを生成する
     * @param int $code 結果コード
     * @param array $data レスポンスに含めるデータ
     * @return \Response::json
     */
    protected function buildJson($code, $data = null)
    {
        $json = \Response::json([
                'code' => $code,
            ] + ($data ?: []));
        return $json;
    }

    /**
     * 成功時のJSONを生成する
     * @param array $data レスポンスに含めるデータ
     * @return \Response::json
     */
    protected function buildSuccess($data = null)
    {
        return $this->buildJson(self::STATUS_SUCCESS, $data);
    }

    /**
     * 失敗時のJSONを生成する
     * @param array $data レスポンスに含めるデータ
     * @return \Response::json
     */
    protected function buildError($data = null)
    {
        return $this->buildJson(self::STATUS_ERROR, $data);
    }

    /**
     * API認証失敗時のJSONを生成する
     * @param array $data レスポンスに含めるデータ
     * @return \Response::json
     */
    protected function buildAuthError($data = null)
    {
        return $this->buildJson(self::STATUS_AUTH_ERROR, $data);
    }
}
