<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的博客</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/header.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/jiantou.css" />
    <script type="text/javascript" src="__PUBLIC__/Js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/header.js"></script>
</head>
<body style="background-color:#030b20">
<div class="header">
    <div class="yingyong logo" >
        Jiawei
    </div>
    <div class="yingyong" id="yy1">
        <a href="__URL__/index">首页</a>
    </div>
    <div class="yingyong" id="yy2">
        <a href="#" >博客</a>
        <!--<span class="d2"></span>-->
        <a href="#" class="test1"></a>
        <ul class="aa" id='aaa1' >
            <li ><a href="__APP__/Index/my">我的博客</a></li>
            <li ><a href="#">编写文章</a></li>
            <li ><a href="#">修改文章</a></li>
        </ul>
    </div>
    <div class="yingyong" id="yy3">
        <a href="#">杂志</a>
        <!--<span class="d2"></span>-->
        <a href="#" class="test1"></a>
        <ul class="aa" id='aaa2'>
            <li ><a href="#">查看杂志</a></li>
            <li ><a href="#">购买杂志</a></li>
            <li ><a href="#">我的订阅</a></li>
            <li ><a href="#">校园日志</a></li>
        </ul>
    </div>
    <div class="yingyong" id="yy4">
        <a href="#">圈子</a>
        <!--<span class="d2"></span>-->
        <a href="#" class="test1"></a>
        <ul class="aa" id='aaa3'>
            <li ><a href="#">朋友圈</a></li>
        </ul>
    </div>
    <div class="yingyong" id="yy5">
        <a href="#">论坛</a>
        <!--<span class="d2"></span>-->
        <a href="#" class="test1"></a>
        <ul class="aa" id='aaa4'>
            <li ><a href="#">百度论坛</a></li>
            <li ><a href="#">天涯论坛</a></li>
        </ul>
    </div>
    <div class="login">
        欢迎你，<?php echo ($username); ?> |
        <a href="__APP__/Add/index" style="display: none">添加文章</a>
        <a href="__APP__/Login/logout">退出登录</a>
    </div>
    <!--是否显示 添加文章-->
    <script>
        if('<?php echo ($username); ?>'=='jiawei') {
            $('div[class="login"]').find('a:eq(0)').show(0);
        }
    </script>
</div>
<div class="cbg">
    <img src="__PUBLIC__/img/header.jpg" width=70% height=100%>
</div>
<div class="center">
    <?php if(is_array($list)): foreach($list as $key=>$vo): ?><div class="user">
            <div class="utop">
                <div class="utophp">
                    <img src="__PUBLIC__/Uploads/<?php echo ($vo["filename"]); ?>">
                </div>
                <div class="utopid">
                    <?php echo ($vo["username"]); ?>
                </div>
                <div class="utopdate"><?php echo (date('Y-m-d',$vo["time"])); ?></div>
            </div>
            <div class="ubottom">
                <div class="ubottomt">
                    <?php echo ($vo["title"]); ?>
                </div>
                <div class="ubottomc">
                    <?php echo ($vo["content"]); ?>
                    <a href="__APP__/Index/detial?id=<?php echo ($vo["id"]); ?>">阅读详情</a>
                </div>
            </div>
        </div><?php endforeach; endif; ?>
    <div style="text-align: center"><?php echo ($show); ?></div>
</div>
<!--用户信息界面-->
<div class="Uuser" style="top:34%">
    <div class="fcount"><a><?php echo ($count); ?></a></div>
    <div class="fcomment">
        <div class="fdetial-jiantou"><img src="__PUBLIC__/img/qipao.png"></div>
        <div class="fdetial">
            <?php if(is_array($farr)): foreach($farr as $key=>$fdetial): ?><div style="margin-bottom: 3px" name="rm">
                    <a href="__APP__/Index/user?username=<?php echo ($fdetial["username"]); ?>"><?php echo ($fdetial["username"]); ?></a>
                    在“<a href="__APP__/Index/detial?id=<?php echo ($fdetial["mid"]); ?>"><?php echo ($fdetial["ftitle"]); ?></a>”中回复了你
                    <img src="__PUBLIC__/img/readed.png" style="cursor: pointer;margin-left: 7px">
                    <img src="__PUBLIC__/img/readed1.png" style="display: none;cursor: pointer;margin-left: 7px">
                    <h6 style="display: none"><?php echo ($fdetial["id"]); ?></h6>
                    <br>
                </div><?php endforeach; endif; ?>
        </div>
    </div>
    <div class="Uuserid"><P style="float: right;margin: 0;margin-right: 10px;"> <a href="__APP__/Index/user"><?php echo ($username); ?></a></P></div>
    <a href="__APP__/Index/user"><img src="__PUBLIC__/Uploads/<?php echo ($img); ?>" class="Uuser"></a>
</div>
<!--用户信息界面small-->
<div class="sUuser" style="top:34%">
    <div class="sUuserid"><P style="float: right;margin: 0;margin-right: 10px;"> <a href="__APP__/Index/user"><?php echo ($username); ?></a></P></div>
    <a href="__APP__/Index/user"><img src="__PUBLIC__/Uploads/<?php echo ($img); ?>" class="sUuser"></a>
</div>
<!--搜索栏-->
<div class="search">
    <div class="area">
        <a href="__APP__/Index/index"> <img src="__PUBLIC__/img/home.png">
        <img src="__PUBLIC__/img/home1.png" style="display: none"></a>
    </div>
    <div class="area">
        <img src="__PUBLIC__/img/search.png">
        <img src="__PUBLIC__/img/search1.png" style="display: none">
        <div><form method="post" action="__URL__/my">
            <input name="search" placeholder="文章" style="width: 90px">
            <input type="submit" value="search">
        </form></div>
    </div>
    <div class="area">
        <img src="__PUBLIC__/img/more.png">
        <img src="__PUBLIC__/img/more1.png" style="display: none">
    </div>
    <div class="area">
        <img src="__PUBLIC__/img/top.png">
        <a href="#top" target="_self"><img src="__PUBLIC__/img/top1.png" style="display: none;"></a>
    </div>
</div>
<div class="bottom">
    <a href="#">博客简介</a>|<a href="#">联系方式</a>|
    <a href="#">招贤纳士</a>|<a href="#">版权声明</a>|
    <a href="#">法律顾问</a>|<a href="#">问题报告</a>|
    <a href="#">合作伙伴</a>|<a href="#">反馈</a>
    <hr width=60% />
    博客所有人邮箱：957089263@qq.com|XXXX有限公司 版权所有|XXXX有限公司|XXXX网络技术有限公司
    <br>
    粤333363633366ICP 证 12345678 号|Copyright © 1995-2016, Jiawei.com, All Rights Reserved
</div>

</body>
</html>