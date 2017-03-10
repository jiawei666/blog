<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理系统</title>
    <script type="text/javascript" src="__PUBLIC__/Js/jquery-3.1.1.js"></script>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/admin.css" />
    <script type="text/javascript" src="__PUBLIC__/Js/admin.js"></script>
    <script type="text/javascript" src="__ROOT__/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="__ROOT__/ueditor/ueditor.all.js"></script>
    <link rel="stylesheet" href="__ROOT__/ueditor/lang/zh-cn/zh-cn.js"/>
</head>
<!--回到顶部链接-->
<div style="position: fixed;bottom:4%;right: 2%;display: none;background-color: whitesmoke;box-shadow: #000000 0px 0px 10px;border-radius: 10px" name="gotop">
    <img src="__PUBLIC__/img/img/top1.png" style="width: 60px;height: 60px;cursor: pointer">
</div>
<div style="position: fixed;bottom:4%;right: 2%;background-color: whitesmoke;box-shadow: #000000 0px 0px 10px;border-radius: 10px" name="gotop">
    <img src="__PUBLIC__/img/img/top.png" style="width: 60px;height: 60px;cursor: pointer">
</div>
<!--mp3插入-->
<div style="position: fixed;top: 10%;right: 3%;cursor: pointer">
    <audio controls style="height: 50px;" >
    <source src="__PUBLIC__/mp3/tne.mp3">
        你的浏览器不支持audio embedding feature.
</audio>
</div>
<!--导航栏-->
    <div>
        <div class="option"><a>用户</a>
            <ul>
                <li><a id="zjuser">添加终极用户</a></li>
                <li><a id="ptuser">添加普通作者</a></li>
            </ul>
        </div>
        <div class="option"><a>文章</a>
            <ul>
                <li><a>添加文章</a></li>
            </ul>
        </div>
        <div class="option"><a>评论</a><span style="background-color: #ca282c;border-radius: 6px" id="ccount"><?php echo ($comment_count); ?></span></div>
        <div class="option" style="float: right"><a href="__URL__/logout">退出</a></div>
    </div>

<!--小狗横副-->
    <div class="banner1" >

        <div>
            <hr>
            A slow sparrow should make an early start.<br>
            笨鸟先飞<br>
            Whether 'tis nobler in the mind to suffer
            The slings and arrows of outrageous fortune
            Or to take arms against a sea of troubles
            And by opposing end them. To die- to sleep-
            No more; and by a sleep to say we end
            The heartache and the thousand natural shocks
            That flesh is heir to. 'Tis a consummation
            Devoutly to be wish'd. To die- to sleep.
            To sleep- perchance to dream: ay, there's the rub!
            For in that sleep of death what dreams may come
            When we have shuffled off this mortal coil,
            Must give us pause. There's the respect
            That makes calamity of so long life.
            For who would bear the whips and scorns of time,
            Th' oppressor's wrong, the proud man's contumely,
            The pangs of despis'd love, the law's delay,
            The insolence of office, and the spurns
            That patient merit of th' unworthy takes,
            When he himself might his quietus make
            With a bare bodkin? Who would these fardels bear,
            To grunt and sweat under a weary life,
            But that the dread of something after death-
            The undiscover'd country, from whose bourn
            No traveller returns- puzzles the will,
            And makes us rather bear those ills we have
            Than fly to others that we know not of?
            Thus conscience does make cowards of us all,
            And thus the native hue of resolution
            Is sicklied o'er with the pale cast of thought,
            And enterprises of great pith and moment
            With this regard their currents turn awry
            And lose the name of action.
            <span>嘉炜</span>
            <hr>
        </div>
    </div>
<div id="limitshow">
<!--蓝色小横幅-->
    <div class="banner2">
        <img src="__PUBLIC__/img/img/snow.png">
        <img src="__PUBLIC__/img/img/snow.png">
        <img src="__PUBLIC__/img/img/snow.png">
    </div>
<!--文章列表-->
    <div>
        <div style="float: left;width: 40%;
        height: 509.633px;
        background: url('__PUBLIC__/img/img/pic01.jpg');
        background-size: cover;background-position: center;">
        </div>
        <div class="titlelist">
            <h1>文章列表</h1>
            <table style="margin-left: 20px;color: white;font-size: 20px">
                <?php if(is_array($titlelist)): foreach($titlelist as $key=>$tl): ?><tr>
                        <td><img src="__PUBLIC__/rootUploads/<?php echo ($tl["filename"]); ?>" style="max-width:65px;height: 65px;"></td>
                        <td><a href="#"><?php echo ($tl["username"]); ?></a>:<a href="#"><?php echo ($tl["title"]); ?></a></td>
                        <td>　　　　　　　　　　　　　　<a name="del">删除</a>
                            <input type="hidden" value="<?php echo ($tl["id"]); ?>">|<a name="modify">修改</a></td>
                    </tr><?php endforeach; endif; ?>
            </table>
            <div style="text-align: center"> <?php echo ($show); ?></div>
        </div>
    </div>
<!--紫色小横幅-->
    <div style="background-color: #7c00b4;float: left" class="banner2">
        <img src="__PUBLIC__/img/img/fj.png">
        <img src="__PUBLIC__/img/img/fj1.png">
        <img src="__PUBLIC__/img/img/fj2.png">
    </div>
<!--注册部分-->
    <div>
        <div class="titlelist">
            <h1 style="margin-bottom: 0px">注册</h1>
            <div class="regiester">
                <div style="float: left">
                    <img src="__PUBLIC__/img/img/r-login.png"><br><br>
                    <img src="__PUBLIC__/img/img/r-password.png"><br><br>
                    <img src="__PUBLIC__/img/img/r-touxiang.png">
                </div>
                <div style="float: left">
                    <form action="__APP__/Index/adduser" method="post" enctype="multipart/form-data" id="form1">
                        <input style="width:300px;height:48px;color: black" name="username" id="zjandpt"><br><br>
                        <input type="password" style="width: 300px;height: 48px;color: black" name="password"><br><br>
                        <input type="file" style="width: 110%;height: 48px" name="filename">
                    </form>
                </div>
                <div style="float: left;margin-left: 12%;margin-top: 10px">
                    <div style="font-size: 20px" class="regtf">
                        <img src="__PUBLIC__/img/img/true.png" >
                        <img src="__PUBLIC__/img/img/flase.png"><br><br>
                    </div>
                    <div class="regtf">
                        <img src="__PUBLIC__/img/img/true.png" style="margin-top: 8px">
                        <img src="__PUBLIC__/img/img/flase.png" style="margin-top: 8px">
                    </div>
                </div>
                <div class="regbt">注册普通作者</div>
            </div>
        </div>
        <div style="float: left;width: 40%;
        height: 509.633px;
        background: url('__PUBLIC__/img/img/pic02.jpg');
        background-size: cover;background-position: center;">
        </div>
    </div>
<!--棕绿色小横幅-->
    <div style="background-color:#727f30;float: left" class="banner2">
        <img src="__PUBLIC__/img/img/r-feiji.png">
        <img src="__PUBLIC__/img/img/r-qipao.png">
        <img src="__PUBLIC__/img/img/r-paomian.png">
    </div>
<!--评论部分-->
<div>
    <div style="float: left;width: 40%;
        height: 509.633px;
        background: url('__PUBLIC__/img/img/pic03.jpg');
        background-size: cover;background-position: center;">
    </div>
    <div class="titlelist">
            <h1 style="margin-bottom: 60px">评论相关</h1>
            <table style="width: 95%;margin-left: 2%; color: white;font-size:20px">
                <form action="__URL__/showallcomment" id="form2" method="post">
                    <?php if(is_array($comment_arr)): foreach($comment_arr as $key=>$ca): ?><tr name="<?php echo ($ca["id"]); ?>">
                            <td> <a href="#" style="color: #5b9dd9"><?php echo ($ca["username"]); ?></a> 在 "<a href="#" style="color: #5b9dd9"><?php echo ($ca["ftitle"]); ?></a>"
                                中说：<span style="text-decoration: underline"><?php echo ($ca["content"]); ?></span> </td>
                                <td>
                                    <input type="checkbox" name="<?php echo ($ca["id"]); ?>" value="1">
                                    <a id="<?php echo ($ca["id"]); ?>" name="singleshow" style="cursor: pointer;">显示</a>
                                    <a name="singlenotshow" style="cursor: pointer">不显示</a>
                                </td>
                        </tr><?php endforeach; endif; ?>
                </form>
                <tr id="isallshowbnt"><td></td><td><button style="color: black" id="seall">全选</button> <button style="color: black">全不选</button>
                    <a href="#" id='showsubmit'>显示</a><a href="#" id="notshow">不显示</a>
                </td>
                </tr>
            </table>
        <div style="text-align: center"><?php echo ($comment_show); ?></div>
    </div>
</div>
</div>
<!--棕红色小横幅-->
<div style="background-color:#911d00;float: left" class="banner2">
    <img src="__PUBLIC__/img/img/40.png">
    <img src="__PUBLIC__/img/img/41.png">
    <img src="__PUBLIC__/img/img/42.png">
</div>
<!--添加文章部分-->
<div>
    <div class="titlelist" style="text-align: center">
        <h1 style="margin-bottom: 0px">添加|修改文章</h1>
        <button style="float: right;color: black;margin-right: 20px;display: none;" name="add">添加</button>
        <form style="height: 100%" action="__URL__/addmsg" method="post">
            <!--添加或者修改  把隐藏框的name改变-->
            <input type="hidden" name="add">
        <input style="width: 300px;height: 30px;color: black" max="30" placeholder="标题" name="title"><br>
        <textarea id="editor" style="width: 95%;height: 300px;margin-left: 2.5%"></textarea>
            <input type="submit" value="添加文章">
        </form>
    </div>
    <div style="float: left;width: 40%;
        height: 509.633px;
        background: url('__PUBLIC__/img/img/pic02.jpg');
        background-size: cover;background-position: center;">
    </div>
</div>
<!--网页底部-->
<div style="background-color:#918d8d;float: left;font-size: 30px;line-height: 70px;height: 70px" class="banner2">
   ©嘉炜
</div>
<!--没有用户权限时隐藏注册区域-->
<script>
    if('<?php echo ($limit); ?>'==1){
        $('#limitshow,div[class="option"]:eq(0),div[class="option"]:eq(2)').hide(0);
    }
</script>
<!--新评论为0时把全部显示区域隐藏-->
<script>
    if('<?php echo ($comment_count); ?>'==0){
        $('#ccount').hide(0);
        $('#isallshowbnt').hide(0);
        $('div[class=titlelist]:eq(2)').find('h1').html('没有新评论');
    }
</script>
</body>
</html>