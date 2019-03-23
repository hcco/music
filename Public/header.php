<?php if(basename($_SERVER['PHP_SELF']) == basename(__FILE__)) exit;?>
<header class="am-topbar am-topbar-inverse">
<div class="am-container">
<p class="am-topbar-brand"><a href="./" class="am-topbar-logo"><?php echo $title;?></a></p>
<a class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#doc-topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></a>
<div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
<ul class="am-nav am-nav-pills am-topbar-nav">
<li<?php if ($title=="在线工具") echo ' class="am-active"';?>><a href="/">首页</a></li>
<li<?php if ($title=="音乐解析") echo ' class="am-active"';?>><a href="/music">音乐</a></li>
<li<?php if ($title=="视频解析") echo ' class="am-active"';?>><a href="/video">视频</a></li>
<li<?php if ($title=="全能图床") echo ' class="am-active"';?>><a href="/tuchuang">图床</a></li>
<li><a href="https://www.liumingye.cn/">博客</a></li>
</ul>
<div class="am-topbar-right">
<a class="am-btn am-btn-primary am-topbar-btn am-btn-sm" data-am-modal="{target: '#fenxiang'}">分享</a>
<a class="am-btn am-btn-primary am-topbar-btn am-btn-sm" data-am-modal="{target: '#zanzhu'}">赞助</a>
</div>
</div>
</div>
</header>