<?php

namespace app\controller;

use support\Db;
use support\Request;

class IndexController
{
    public function index(Request $request)
    {
        return json(['code' => 0, 'msg' => 'ok']);
    }
}
