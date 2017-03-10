<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($username); ?></title>

    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/header.css" />
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/jiantou.css" />
    <script type="text/javascript" src="__PUBLIC__/Js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Js/header.js"></script>

    <style>
        .User{
            position: fixed;
            top:30%;
            left: 40%;
            width: 300px;
            height: 300px;
            border-radius: 300px;
            border: 2px solid #afafaf;
            box-shadow: #666 0px 0px 2000px;
        }
        .Userbg{
            background: url("__PUBLIC__/img/Desert.jpg");
            background-size: cover;
        }

        .Userid{
            position: absolute;
            left: 78%;
            top:78%;
            background-color:#3B5900;
            width: 150px;
            height: 30px;
            box-shadow: #666 0px 0px 50px;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body class="Userbg">

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

    <div class="User">
        <div class="Userid"><P style="float: right;margin: 0;margin-right: 10px;"> <a> <?php echo ($username); ?></a></P></div>
        <img src="__PUBLIC__/Uploads/<?php echo ($img); ?>" class="User">
    </div>
</body>
</html>