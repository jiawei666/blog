<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文章详情</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/header.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/jiantou.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/comment.css" />
    <script type="text/javascript" src="__PUBLIC__/Js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/header.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/docomment.js"></script>

    <script type="text/javascript" charset="utf-8" src="__ROOT__/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="__ROOT__/ueditor/ueditor.all.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="__ROOT__/ueditor/lang/zh-cn/zh-cn.js"></script>
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
<div class="cbg">
    <img src="__PUBLIC__/img/header.jpg" width=70% height=100%>
</div>
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
                    <?php echo ($vo["title"]); ?>
                </div>
                <div class="ubottomc">
                    <?php echo ($vo["content"]); ?>
                </div>
            </div>
        </div><?php endforeach; endif; ?>
    <div style="text-align: center"><?php echo ($show); ?></div>


    <!--用户信息界面-->
    <div class="dUuser" style="top:34%">
        <div class="Uuserid"><P style="float: right;margin: 0;margin-right: 10px;"> <a href="__APP__/Index/user?username=<?php echo ($username); ?>"><?php echo ($username); ?></a></P></div>
        <a href="__APP__/Index/user"><img src="__PUBLIC__/Uploads/<?php echo ($img); ?>" class="dUuser"></a>
    </div>
    <!--没登录则隐藏用户信息界面-->
    <script>
        if('<?php echo ($username); ?>'==''){
            $('div[class="dUuser"]').css('display','none');
            $('div[class="login"]').html('<a href="__APP__/Login/login">登录</a><a href="__APP__/Register/index">注册</a>')
        }else{
            $('div[class="Uuser"]').css('display','block');
        }
    </script>
   <!--评论界面-->
    <div class="container">
        <s>
            <i></i>
        </s>
        <div class="content">
            <?php if(is_array($clist)): foreach($clist as $key=>$cv): ?><div class="commentusn">
                    <div class="commentcnt">
                        <a href="#" style="color: #00a0e9"><?php echo ($cv["username"]); ?></a>:<?php echo ($cv["content"]); ?>
                        <a style="float: right;color: #00a0e9;cursor: pointer">回复</a>
                    </div>

                    <hr>
                    <div class="commenttm">
                        <?php echo (date('m-d H:m',$cv["time"])); ?>
                    </div>

                </div><?php endforeach; endif; ?>
        </div>
        <div class="comment">
            <div class="commentt">发表回复</div>
            <form action="__APP__/Index/addcomment" method="post">
                <input type="hidden" value="<?php echo ($mid); ?>" name="mid">
                <div class="commentc">
                    <textarea id="editor" style="width: 100%;height: 50px;"></textarea>
                </div>
                <div class="commentb">回复</div>
            </form>
        </div>

    </div>
    <br />
<script>
    $('.commentb').click(function(){
        var mid='<?php echo ($mid); ?>';
            $('input[type="hidden"]').val(mid);
            $('form').submit();
            });
</script>
</div>
<div class="bottom"
     style="
        position: relative;
        left: 0;
        bottom: 0;
        ">
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