<?php
class msg {
    public function get() {
        header('Content-Type:application/json; charset=utf-8');
        $Referrer = isset($_POST['referrer']) ? $_POST['referrer'] : '';
        $UA = $_SERVER['HTTP_USER_AGENT'];
        $Msg = [];
        array_push($Msg, ['text' => '<a href="http://t.cn/Ev6yO34" target="_blank">1.硅云，专注于服务中小型网站，PHP云虚拟主机销量领先</a><br><a href="http://tool.liumingye.cn/alipay/index.html" target="_blank">2.每日一次，领支付宝红包</a>']);
        if (strstr($Referrer, 'www.baidu.com')) {
            array_push($Msg, ['text' => '欢迎通过百度搜索访问的你！', 'style' => '', 'time' => 3000]);
        }
        if (strstr($UA, 'CoolMarket')) {
            array_push($Msg, ['text' => '欢迎通过酷安访问的你！', 'style' => '', 'time' => 3000]);
        }
        array_push($Msg, ['text' => '02月25号 更新<br>修复 myfreemp3 搜索', 'style' => '', 'time' => 3000]);
        response($Msg, 200, '');
        exit();
    }
}