<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台登录</title>
    <script type="text/javascript" src="__PUBLIC__/Js/jquery-3.1.1.js"></script>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/admin.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/login.css" />
    <script type="text/javascript" src="__PUBLIC__/Js/admin.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/dologin.js"></script>
</head>
<body style="background-color: #c1ccb8">
<div class="Login">
    <h2>后台登录</h2>
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
        </form>
    </div>
</div>
</body>
</html>