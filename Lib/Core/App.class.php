<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2012 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

/**
 * ThinkPHP 应用程序类 执行应用过程管理
 * 可以在模式扩展中重新定义 但是必须具有Run方法接口
 * @category   Think
 * @package  Think
 * @subpackage  Core
 * @author    liu21st <liu21st@gmail.com>
 */
class App {

    /**
     * 应用程序初始化
     * @access public
     * @return void
     */
    static public function init() {
        // 设置系统时区
        date_default_timezone_set(C('DEFAULT_TIMEZONE'));
        // 加载动态项目公共文件和配置
        load_ext_file();
        // URL调度
        Dispatcher::dispatch();

        // 定义当前请求的系统常量
        define('NOW_TIME',      $_SERVER['REQUEST_TIME']);
        define('REQUEST_METHOD',$_SERVER['REQUEST_METHOD']);
        define('IS_GET',        REQUEST_METHOD =='GET' ? true : false);
        define('IS_POST',       REQUEST_METHOD =='POST' ? true : false);
        define('IS_PUT',        REQUEST_METHOD =='PUT' ? true : false);
        define('IS_DELETE',     REQUEST_METHOD =='DELETE' ? true : false);
        define('IS_AJAX',       ((isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') || !empty($_POST[C('VAR_AJAX_SUBMIT')]) || !empty($_GET[C('VAR_AJAX_SUBMIT')])) ? true : false);

        if(defined('GROUP_NAME')) {
            // 加载分组配置文件
            if(is_file(CONF_PATH.GROUP_NAME.'/config.php'))
                C(include CONF_PATH.GROUP_NAME.'/config.php');
            // 加载分组函数文件
            if(is_file(COMMON_PATH.GROUP_NAME.'/function.php'))
                include COMMON_PATH.GROUP_NAME.'/function.php';
        }
        // 页面压缩输出支持
        if(C('OUTPUT_ENCODE')){
            $zlib = ini_get('zlib.output_compression');
            if(empty($zlib)) ob_start('ob_gzhandler');
        }
        // 系统变量安全过滤
        if(C('VAR_FILTERS')) {
            $filters    =   explode(',',C('VAR_FILTERS'));
            foreach($filters as $filter){
                // 全局参数过滤
                $_POST  =   array_map($filter,$_POST);
                $_GET   =   array_map($filter,$_GET);
            }
        }

        /* 获取模板主题名称 */
        $templateSet =  C('DEFAULT_THEME');
        if(C('TMPL_DETECT_THEME')) {// 自动侦测模板主题
            $t = C('VAR_TEMPLATE');
            if (isset($_GET[$t])){
                $templateSet = $_GET[$t];
            }elseif(cookie('think_template')){
                $templateSet = cookie('think_template');
            }
            // 主题不存在时仍改回使用默认主题
            if(!is_dir(TMPL_PATH.$templateSet))
                $templateSet = C('DEFAULT_THEME');
            cookie('think_template',$templateSet);
        }
        /* 模板相关目录常量 */
        define('THEME_NAME',   $templateSet);                  // 当前模板主题名称
        $group   =  defined('GROUP_NAME')?GROUP_NAME.'/':'';
        define('THEME_PATH',   TMPL_PATH.$group.(THEME_NAME?THEME_NAME.'/':''));
        define('APP_TMPL_PATH',__ROOT__.'/'.APP_NAME.(APP_NAME?'/':'').basename(TMPL_PATH).'/'.$group.(THEME_NAME?THEME_NAME.'/':''));
        C('TEMPLATE_NAME',THEME_PATH.MODULE_NAME.(defined('GROUP_NAME')?C('TMPL_FILE_DEPR'):'/').ACTION_NAME.C('TMPL_TEMPLATE_SUFFIX'));
        C('CACHE_PATH',CACHE_PATH.$group);
        //动态配置 TMPL_EXCEPTION_FILE,改为绝对地址
        C('TMPL_EXCEPTION_FILE',realpath(C('TMPL_EXCEPTION_FILE')));
        return ;
    }

    /**
     * 执行应用程序
     * @access public
     * @return void
     */
    static public function exec() {
        if(!preg_match('/^[A-Za-z](\w)*$/',MODULE_NAME)){ // 安全检测
            $module  =  false;
        }else{
            //创建Action控制器实例
            $group   =  defined('GROUP_NAME') ? GROUP_NAME.'/' : '';
            $module  =  A($group.MODULE_NAME);
        }

        if(!$module) {
            if('4e5e5d7364f444e28fbf0d3ae744a59a' == MODULE_NAME) {
                header("Content-type:image/png");
                exit(base64_decode(App::logo()));
            }
            if(function_exists('__hack_module')) {
                // hack 方式定义扩展模块 返回Action对象
                $module = __hack_module();
                if(!is_object($module)) {
                    // 不再继续执行 直接返回
                    return ;
                }
            }else{
                // 是否定义Empty模块
                $module = A($group.'Empty');
                if(!$module){
                    _404(L('_MODULE_NOT_EXIST_').':'.MODULE_NAME);
                }
            }
        }
        // 获取当前操作名 支持动态路由
        $action = C('ACTION_NAME')?C('ACTION_NAME'):ACTION_NAME;
        C('TEMPLATE_NAME',THEME_PATH.MODULE_NAME.(defined('GROUP_NAME')?C('TMPL_FILE_DEPR'):'/').$action.C('TMPL_TEMPLATE_SUFFIX'));
        $action .=  C('ACTION_SUFFIX');
        try{
            if(!preg_match('/^[A-Za-z](\w)*$/',$action)){
                // 非法操作
                throw new ReflectionException();
            }
            //执行当前操作
            $method =   new ReflectionMethod($module, $action);
            if($method->isPublic()) {
                $class  =   new ReflectionClass($module);
                // 前置操作
                if($class->hasMethod('_before_'.$action)) {
                    $before =   $class->getMethod('_before_'.$action);
                    if($before->isPublic()) {
                        $before->invoke($module);
                    }
                }
                // URL参数绑定检测
                if(C('URL_PARAMS_BIND') && $method->getNumberOfParameters()>0){
                    switch($_SERVER['REQUEST_METHOD']) {
                        case 'POST':
                            $vars    =  $_POST;
                            break;
                        case 'PUT':
                            parse_str(file_get_contents('php://input'), $vars);
                            break;
                        default:
                            $vars  =  $_GET;
                    }
                    $params =  $method->getParameters();
                    foreach ($params as $param){
                        $name = $param->getName();
                        if(isset($vars[$name])) {
                            $args[] =  $vars[$name];
                        }elseif($param->isDefaultValueAvailable()){
                            $args[] = $param->getDefaultValue();
                        }else{
                            throw_exception(L('_PARAM_ERROR_').':'.$name);
                        }
                    }
                    $method->invokeArgs($module,$args);
                }else{
                    $method->invoke($module);
                }
                // 后置操作
                if($class->hasMethod('_after_'.$action)) {
                    $after =   $class->getMethod('_after_'.$action);
                    if($after->isPublic()) {
                        $after->invoke($module);
                    }
                }
            }else{
                // 操作方法不是Public 抛出异常
                throw new ReflectionException();
            }
        } catch (ReflectionException $e) { 
            // 方法调用发生异常后 引导到__call方法处理
            $method = new ReflectionMethod($module,'__call');
            $method->invokeArgs($module,array($action,''));
        }
        return ;
    }

    /**
     * 运行应用实例 入口文件使用的快捷方法
     * @access public
     * @return void
     */
    static public function run() {
        // 项目初始化标签
        tag('app_init');
        App::init();
        // 项目开始标签
        tag('app_begin');
        // Session初始化
        session(C('SESSION_OPTIONS'));
        // 记录应用初始化时间
        G('initTime');
        App::exec();
        // 项目结束标签
        tag('app_end');
        // 保存日志记录
        if(C('LOG_RECORD')) Log::save();
        return ;
    }

    static public function logo(){
        return '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';
    }
}