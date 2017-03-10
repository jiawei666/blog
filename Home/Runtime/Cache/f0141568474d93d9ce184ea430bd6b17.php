<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/header.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/login.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/jiantou.css" />
    <script type="text/javascript" src="__PUBLIC__/Js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/header.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/dologin.js"></script>
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

        <div class="Login">
            <h2>账号登录</h2>
            <div>
                <form action="__URL__/dologin" method="post">
                    <div class="Loginuser">
                            <p >
                                <img src="__PUBLIC__/img/user1.jpg">
                                <input placeholder="请输入用户名" name="username">
                            </p>
                    </div>
                    <div class="Loginuser">
                        <p >
                            <img src="__PUBLIC__/img/psd.jpg">
                            <input type="password" placeholder="请输入密码" name="password">
                        </p>

                    </div>

                    <div class="Logincode" >
                        <input placeholder="请输入验证码" style="border: 0px;width: 230px;height:30px;border-radius:5px; " name="code">
                        <img src="__APP__/Public/code" onclick="this.src=this.src+'?'+Math.random()"  style="float: right">
                    </div>

                    <div class="Loginbuttom" >
                        登录
                    </div>
                    <p style="float: right;margin-right: 20px">
                        <a href="__APP__/Register/index">注册账号</a>
                    </p>


                </form>
            </div>
        </div>

<div class="bottom"
     style="
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