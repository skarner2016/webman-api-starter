<?php

namespace app\controller;

use support\Db;
use support\Log;
use support\Redis;
use support\Request;
use app\constant\App;

class IndexController
{
    public function index(Request $request)
    {
        Log::channel(App::LOG_DEFAULT)->info('$message');
        Log::channel(App::LOG_TEST)->info('$message');
        
        $res1 = Db::connection(App::DB_CONNECTION_DEFAULT)->table('users')->first();
        $res2 = Redis::connection(App::REDIS_CONNECTION_DEFAULT)->get('abc');
        $res3 = $request->header('Content-Language');
        
        return json([
            'code' => 0,
            'msg'  => 'ok',
            'data' => [
                'res1' => $res1,
                'res2' => $res2,
                'res3' => $res3,
            ],
        ]);
    }
}
