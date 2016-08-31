<?php
class Bootstrap extends Yaf_Bootstrap_Abstract{
    protected $config;
    public function _initConfig(Yaf_Dispatcher $dispatcher){
        //加载配置
        $this->config = Yaf_Application::app()->getConfig();
        Yaf_Registry::set('config', $this->config);
        //加载本地类
        $yaf_loader = Yaf_Loader::getInstance();
        $yaf_loader->registerLocalNamespace(array("Test"));
        //引入配置参数
//        Loader::import("Core/config.php");

    }
    public function _initView(Yaf_Dispatcher $dispatcher){
        //加载配置
        //$view= new Smarty_Adapter(null, Yaf_Registry::get("config")->get("smarty"));
        //Yaf_Dispatcher::getInstance()->setView($view);
    }
}