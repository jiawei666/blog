<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加文章</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/header.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/jiantou.css" />
    <script type="text/javascript" src="__PUBLIC__/Js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/header.js"></script>
    <script type="text/javascript" src="__ROOT__/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="__ROOT__/ueditor/ueditor.all.js"></script>
    <link rel="stylesheet" href="__ROOT__/ueditor/lang/zh-cn/zh-cn.js"/>
</head>
<body style="background-color:#030b20">
    <div class="header">
        <div class="yingyong logo" >
            Jiawei
        </div>
        <div class="yingyong" id="yy1">
            <a href="__APP__/Index/index">首页</a>
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
            <a href="__APP__/Add/index">添加文章</a>
            <a href="__APP__/Login/logout">退出登录</a>
        </div>
    </div>
        <div class="cbg">
            <img src="__PUBLIC__/img/header.jpg" width=70% height=100%>
        </div>
    <div class="center" style="height: 630px">
        <form action="__URL__/add" method="post" style="text-align: center">
            <div style="font-size: 30px">标题:<input type="text" name="title" style="width: 300px;height: 30px;"></div>
            <script id="editor" type="text/plain" style="width:100%;height:450px;"></script>
            <input type="submit" value="提交">
        </form>

    </div>


    <div class="bottom" style="margin-top: 900px">
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
<script type="text/javascript">
    var ue=UE.getEditor('editor', {toolbars: [['emotion','|','bold', 'italic', 'underline', 'fontborder','|','simpleupload','|','justifyleft', 'justifycenter', 'justifyright', 'justifyjustify',]], autoHeightEnabled: true, autoFloatEnabled: true});
</script>
</html>