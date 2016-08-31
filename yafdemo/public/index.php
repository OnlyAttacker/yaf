<?php
// cpu:XHPROF_FLAGS_CPU 内存:XHPROF_FLAGS_MEMORY
// 如果两个一起：XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY



define("APP_PATH",dirname(__FILE__)."/../");
//$app = new Yaf_Application(APP_PATH."/conf/application.ini");
//$app->run();

//xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);

$application = new Yaf_Application(APP_PATH."/conf/application.ini");
$application
    ->bootstrap()
    ->run();

///* 关闭自动响应, 交给rd自己输出*/
//$response =
//    $application->getDispatcher()->returnResponse(TRUE)->getApplication()->run();
//
///** 输出响应*/
//$response->response();      //$response->response()的返回值是Controller没有关闭自动render时，
//                            //在action中调用 $this->getView()->assign('title','gaos');时的输出值，或者自动render()的值
//                            //并不代表是整个程序中输出的值.

