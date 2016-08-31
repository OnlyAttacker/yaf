<?php
#对于Controller的加载, Yaf将只会尝试去加载默认Module的Controller, 也就是只在"{项目路径}/controllers" 目录下寻找
class AdminController extends  Yaf_Controller_Abstract{
    public function init(){                                    //在执行每个action时都会首先调用该init()方法
        /* 首先关闭自动渲染 */
//        Yaf_Dispatcher::getInstance()->disableView();            //第一种方法：关闭自动Render
//        Yaf_Dispatcher::getInstance()->autoRender(false);      //第二种方法：关闭自动Render
//        echo 'init function';
    }
}