<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
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
        <a href="__APP__/Login/logout">退出登录</a>
    </div>
</div>

<!--nike图片-->
<div class="cbg">
    <img src="__PUBLIC__/img/header.jpg" width=70% height=100%>
</div>

<!--时钟跟仓鼠部分-->
<div class="clockcs">
    <embed wmode="transparent" src="http://chabudai.sakura.ne.jp/blogparts/honehoneclock/honehone_clock_tr.swf"
           quality="high" bgcolor="white" width="200px" height="70" name="honehoneclock"
           align="middle" allowscriptaccess="always" type="application/x-shockwave-flash"
           pluginspage="http://www.macromedia.com/go/getflashplayer"><br>
        <object type="application/x-shockwave-flash" style="outline:none;"
                data="http://cdn.abowman.com/widgets/hamster/hamster.swf?up_bodyColor=f0e9cc&amp;
                    up_feetColor=D4C898&amp;up_eyeColor=000567&amp;up_wheelSpokeColor=DEDEDE&amp;up_wheelColor=FFFFFF&amp;
                    up_waterColor=E0EFFF&amp;up_earColor=b0c4de&amp;up_wheelOuterColor=FF4D4D&amp;up_snoutColor=F7F4E9&amp;
                    up_bgColor=F0E4E4&amp;up_foodColor=cba920&amp;up_wheelCenterColor=E4EB2F&amp;up_tailColor=E6DEBE&amp;
                    " width="100%" height="147px">

        </object>
</div>

<!--网页中部文章-->
<div class="center">
    <?php if(is_array($list)): foreach($list as $key=>$vo): ?><div class="user">
            <div class="utop">
                <div class="utophp">
                    <img src="__PUBLIC__/rootUploads/<?php echo ($vo["filename"]); ?>">
                </div>
                <div class="utopid">
                    <a> <?php echo ($vo["username"]); ?></a>
                </div>
                <div class="utopdate"><?php echo (date('Y-m-d',$vo["time"])); ?></div>
            </div>
            <div class="ubottom">
                <div class="ubottomt">
                    <a href="__APP__/Index/detial?id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a>
                </div>
                <hr>
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
    <div class="Uuserid"><P style="float: right;margin: 0;margin-right: 10px;"> <a href="__APP__/Index/user?username=<?php echo ($username); ?>"><?php echo ($username); ?></a></P></div>
    <a href="__APP__/Index/user"><img src="__PUBLIC__/Uploads/<?php echo ($img); ?>" class="Uuser"></a>
</div>
<!--用户信息界面small-->
<div class="sUuser" style="top:34%">
    <div class="sUuserid"><P style="float: right;margin: 0;margin-right: 10px;"> <a href="__APP__/Index/user?username=<?php echo ($username); ?>"><?php echo ($username); ?></a></P></div>
    <a href="__APP__/Index/user"><img src="__PUBLIC__/Uploads/<?php echo ($img); ?>" class="sUuser"></a>
</div>
<!--搜索栏-->
<div class="search">
    <div class="area">
        <img src="__PUBLIC__/img/home.png">
        <a href="__APP__/Index/index"><img src="__PUBLIC__/img/home1.png" style="display: none"></a>
    </div>
    <div class="area">
        <img src="__PUBLIC__/img/search.png">
        <img src="__PUBLIC__/img/search1.png" style="display: none">
        <div><form method="post" action="__URL__/index">
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

<!--网页底部-->
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