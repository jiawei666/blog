<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/header.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/jiantou.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/doreg.css" />
    <script type="text/javascript" src="__PUBLIC__/Js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/header.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/doreg.js"></script>

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
        <a href="__APP__/Login/login">登录</a>
        <a href="__APP__/Register/index">注册</a>
    </div>
</div>
<div class="cbg">
    <img src="__PUBLIC__/img/header.jpg" width=70% height=100%>
</div>
<div class="Reg">
    <h2>账号注册</h2>
    <div>
        <form action="__URL__/doreg" method="post" name="myform" enctype="multipart/form-data">
            <div class="fdiv">
                <input type="text" name="username" placeholder="用户名,必须大于两个字符">
                <h5 id="error"></h5>
            </div>
            <div class="fdiv">
                <input type="password" name="password" id="pwd" placeholder="密码,必须大于留个字符">
                <h5 id="errpwd"></h5>
            </div>
            <div class="fdiv">
                <input type="password" name="repassword" id="repwd" placeholder="确认密码">
                <h5 id="errrepwd"></h5>
            </div>
            <div style="margin-left: 100px;height: 20px">
                <input type="radio" value="1" name="sex">男
                <input type="radio" value="0" name="sex" style="margin-left: 90px">女
            </div>
            <div style="margin-left: 77px;margin-top: 13px">
                    头像:<input type="file" name="filename" style="width: 170px">
            </div>
            <div style="margin-left: 77px;margin-top: 13px">
                <input type="text" name="code" id="code" style="width: 148px;height: 25px;margin-bottom: 20px;" placeholder="请输入验证码">
                <img src="__APP__/Public/code" onclick="this.src=this.src+'?'+Math.random()" >

            </div>
            <div class="Regbuttom" id="submit">
                注册
            </div>
        </form>
    </div>
</div>


<div class="bottom" style="
        position: fixed;
        _position: absolute;
        z-index: 9999;
        left: 0;
        bottom: 0;">
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