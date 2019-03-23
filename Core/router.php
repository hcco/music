<?php
/*
	全能音乐解析路由函数
*/
define('MODULE_DIR', APP_PATH . 'Controller/');
define('VIEW_DIR', APP_PATH . 'View/');
$root = $_SERVER['SCRIPT_NAME'];
$request = $_SERVER['REQUEST_URI'];
$SE_STRING = str_replace(str_replace('index.php', '', $root), '', $request);
if (isset($_SERVER['QUERY_STRING'])) {
    $SE_STRING = str_replace('?' . $_SERVER['QUERY_STRING'], '', $SE_STRING);
}
if (strpos($SE_STRING, 'index.php') === 0) {
    $SE_STRING = str_replace('index.php', '', $SE_STRING);
}
$ary_url = ['controller' => 'home', 'method' => 'index', 'pramers' => []];
$ary_se = explode('/', $SE_STRING);
$se_count = count($ary_se);
//路由控制
if ($se_count === 0 || $se_count === 1) {
    if ($SE_STRING !== '') {
        $ary_url['controller'] = basename($SE_STRING, ".php");
    }
    $module_name = $ary_url['controller'];
    $module_file = VIEW_DIR . $module_name . '.php';
} elseif ($se_count > 1) { //计算后面的参数，key-value
    $ary_url['controller'] = $ary_se[0] != '' ? $ary_se[0] : 'home';
    $ary_url['method'] = (isset($ary_se[1]) && $ary_se[1] != '') ? $ary_se[1] : 'index';
    if (isset($ary_se[2]) && $ary_se[2]) {
        $count = count($ary_se);
        if ($count === 3 || ($count === 4 && $ary_se[3] === '')) {
            $ary_url['pramers'] = $ary_se[2];
        } else {
            $ary_url['pramers'] = [];
            for ($i = 2;$i < $count;$i = $i + 2) {
                if (isset($ary_se[$i + 1])) {
                    $ary_kv_hash = array(strtolower($ary_se[$i]) => $ary_se[$i + 1]);
                    $ary_url['pramers'] = array_merge($ary_url['pramers'], $ary_kv_hash);
                }
            }
        }
    }
    $module_name = $ary_url['controller'];
    $module_file = MODULE_DIR . $module_name . '.php';
}
$method_name = $ary_url['method'];
if (file_exists($module_file)) {
    require $module_file;
    $obj_module = new $module_name(); //实例化模块m
    if (!method_exists($obj_module, $method_name)) {
        send_http_status(404, TRUE);
        exit();
    } else {
        if (is_callable(array($obj_module, $method_name))) {
            $get_return = $obj_module->$method_name($ary_url['pramers']);
            if (!is_null($get_return)) {
                echo ($get_return);
            }
        } else {
            send_http_status(404, TRUE);
            exit();
        }
    }
} else {
    send_http_status(404, TRUE);
    exit();
}
?>