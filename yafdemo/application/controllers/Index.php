<?php
#对于Controller的加载, Yaf将只会尝试去加载默认Module的Controller, 也就是只在"{项目路径}/controllers" 目录下寻找
class IndexController extends  Yaf_Controller_Abstract{
    public function init(){                                    //在执行每个action时都会首先调用该init()方法
        /* 首先关闭自动渲染 */
        Yaf_Dispatcher::getInstance()->disableView();            //第一种方法：关闭自动Render
//        Yaf_Dispatcher::getInstance()->autoRender(false);      //第二种方法：关闭自动Render
//        echo 'init function';
    }


    public function indexAction(){
//        $this->display("index");
        header("content-type:text/html;charset=utf-8");
//        $this->getView()->assign(['title'=>111]);
        $conn = mysql_connect("localhost","root","root");
        mysql_select_db("pj");
        $result = mysql_query("set names utf8");
//        $result = mysql_query("select * from students where id = ".addslashes($_GET['id'])." or ".chr(0xbf).chr(0x27)."1=1".chr(0xbf).chr(0x27));
        $result = mysql_query("select * from students where id = '".addslashes($_GET['id']));
        echo "select * from students where id = ".addslashes($_GET['id']);
//        echo "select * from students where id = ".$_GET['id'];
        while($row = mysql_fetch_array($result)){
            print_r($row);
        }
//        $this->render("index");
    }



    public function xhprofAction(){


//        $data = xhprof_disable();   //返回运行数据
//        // xhprof_lib在下载的包里存在这个目录,记得将目录包含到运行的php代码中
//        include_once "xhprof_lib.php";
//        include_once "xhprof_runs.php";
//        $objXhprofRun = new XHProfRuns_Default("d:/xhprof");
//        $run_id = $objXhprofRun->save_run($data,"gaos");
        //$this->display('index',['title'=>'gaos display']);
    }

    public function loginAction(){

    }

    public function autoRenderAction(){
        echo 'index action start<br>';
        //$this->display('/../admin/index',['title'=>'gaos display']); //调用display跟自动render没有关系 ,display可以通过在参数最前面加/../ 从而来调用其他view目录下的phtml文件
        //$this->getView()->assign('title','gaos auto render');    //自动render的是调用的与Controller目录对应的view模版文件
                                                                    // 关闭自动reader后 $this->getView()获取不到view模版，所以关闭自动reader后,这样写没效果。
        //$this->getView()->assign('title','gaos auto render');     //这个的输出不是马上输出，是最终yaf response时的输出值，所以 这部分的输出在 index action end的后面
        echo 'index action end<br>';

        //最终结果如下
        /*
            index action start
            gaos display
            index action end
            gaos auto render
         */
    }
    public function disableViewAction(){
        Yaf_Dispatcher::getInstance()->disableView();   //关闭自动render
        //$this->display('index',['title'=>'gaos']);    //调用display跟自动render没有关系
    }

    public function libraryAction(){
        Yaf_Dispatcher::getInstance()->disableView();   //关闭自动render
//        加载声明在library中的类
//        要点一：若在php.ini中声明了全局library类库时，则加载全局library中的类
//        查找规则：Yaf将在如下路径寻找类Foo_Dummy_Bar{类库路径(php.ini中指定的yaf.library)}/Foo/Dummy/Bar.php
//        要点二：若没有在php.ini中声明了全局library类库时，则加载本地library中的类
//        查找规则：Yaf将在如下路径寻找类Foo_Dummy_Bar{{项目路径}/library}/Foo/Dummy/Bar.php
//        要点三：若在php.ini中声明了全局library类库，此时要加载本地library中的类
//        则应该先注册本地类
//        规则申明, 凡是以Test开头的类, 都是本地类
        $loader = Yaf_Loader::getInstance();
        $loader->registerLocalNamespace(array('Test'));
        $test = new Test_Local();
        echo $test->consoleAction();
        $test = new Test_Test();
        echo $test->consoleAction();
    }
}