<?php

namespace app\constant;

// 统一在此处定义 App 级的常量，如MySQL、Redis、日志等等
class App
{
    // MySQL
    const DB_CONNECTION_DEFAULT = 'default';
    
    // Redis
    const REDIS_CONNECTION_DEFAULT = 'default';
    
    // Log
    const LOG_DEFAULT = 'default';
    const LOG_TEST    = 'test';
}