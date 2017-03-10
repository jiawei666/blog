<?php
class IndexAction extends Action {
    //主页

    public function index(){
        if(!(isset($_SESSION['rusername']) && $_SESSION['rusername']!='')){
            $this->redirect('Index/login');
        }
        $user=D('user');
        $root_username=$_SESSION['rusername'];
        $limit=$user->field('limit')->where("username='{$root_username}'")->select();
        $limit=$limit[0]['limit'];
        if($limit==0){
            //实例化文章表
            $msg=D('message');
            import('ORG.Util.Page');// 导入分页类
            $mcount=$msg->count();// 查询满足要求的总记录数
            $Page= new Page($mcount,5);// 实例化分页类 传入总记录数和每页显示的记录数
            $show = $Page->show();// 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $titlelist=$msg->relation(true)->limit($Page->firstRow.','.$Page->listRows)->order('time desc')->select();
            $this->assign('show',$show);
            $this->assign('titlelist',$titlelist);

            //实例化评论表
            $comment=D('comment');
            $comment_count=$comment->where("isnew=1")->count();// 查询满足要求的总记录数
            $Page= new Page($comment_count,9);// 实例化分页类 传入总记录数和每页显示的记录数
            $comment_show = $Page->show();// 分页显示输出
            $comment_arr=$comment->relation(true)->limit($Page->firstRow.','.$Page->listRows)->where("isnew=1")->order('time desc')->select();
            $c_count=$comment->relation(true)->where("isnew=1")->count();
            $this->assign('comment_arr',$comment_arr);
            $this->assign('comment_count',$c_count);
            $this->assign('comment_show',$comment_show);
        }else{
            $this->assign('limit',1);
        }
        $this->display();
    }
    //删除文章
    public function del(){
            $id=$_POST['id'];
            $msg=D('message');
            $res=$msg->where("id={$id}")->delete();
            $comment=D('comment');
           $res2= $comment->where("mid={$id}")->delete();
    }
    //验证用户名是否可用 执行ajax
    public function doreg(){
        $i=null;
        $user=D('user');
        $username=$_GET['username'];
        $where['username']=$username;
        $count=$user->where($where)->count();
        if($count){
            echo 11;//用户已经存在
        }else{
            //用户不存在
            $i=preg_match('/^[a-zA-Z0-9_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]+$/',$username);
            if($i==1){
                echo 1;
            }else{
                echo 123;
            }//1为匹配到，123为没匹配到
        }
    }
    //注册后台用户
    public function adduser(){
        $user=D('user');
        $root_username=$_SESSION['rusername'];
        $limit=$user->field('limit')->where("username='{$root_username}'")->select();
        $limit=$limit[0]['limit'];
        if($limit==0){
            import('ORG.Net.UploadFile');
            $upload = new UploadFile();// 实例化上传类
            $upload->maxSize  = 3145728 ;// 设置附件上传大小
            $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->savePath =  './Public/rootUploads/';// 设置附件上传目录
            if(!$upload->upload()) {// 上传错误提示错误信息
                $this->error($upload->getErrorMsg());
            }else{// 上传成功 获取上传文件信息
                $info =  $upload->getUploadFileInfo();
            }
            if(isset($_POST['zjusername'])){
                if($_POST['zjusername']==''||$_POST['password']==''){
                    $this->error('注册失败，请按要求填写信息');
                }
                $ruser=D('user');
                $zju=$data['username']=$_POST['zjusername'];
                $zjcount=$user->where("username='{$zju}'")->count();
                if($zjcount){
                    $this->error('用户已存在');
                }
                $data['password']=$_POST['password'];
                $data['limit']=0;
                $data['filename']=$info[0]['savename'];
                $res=$ruser->add($data);
                if($res){
                    $this->success('注册成功',U('Index/index'));
                }else{
                    $this->error('注册失败');
                }
            }
            if(isset($_POST['username'])){
                if($_POST['username']==''||$_POST['password']==''){
                    $this->error('注册失败，请按要求填写信息');
                }
                $ruser=D('user');
                $ptu=$data['username']=$_POST['username'];
                $count=$user->where("username='{$ptu}'")->count();
                if($count){
                    $this->error('用户已存在');
                }
                $data['password']=$_POST['password'];
                $data['limit']=1;
                $data['filename']=$info[0]['savename'];
                $res=$ruser->add($data);
                if($res){
                    $this->success('注册成功',U('Index/index'));
                }else{
                    $this->error('注册失败');
                }
            }
        }else{
            $this->error('没有权限');
        }

    }
    //显示全选评论
    public function showallcomment(){
        $arr=$_POST;
        $comment=D('comment');
        foreach($arr as $k=>$val){
            $data['show']=$val;
            $data['isnew']=0;//变成已经阅读评论
            $res=$comment->where("id={$k}")->save($data);
        }
        $this->success('执行成功');
    }
    //显示单个评论
    public function doshowsinglecmt(){
        $id=$_POST['id'];
        $comment=D('comment');
        if($_POST['isshow']==1){
            $data['show']=1;
        }else{
            $data['show']=0;
            $comment->where("id={$id}")->delete();
        }
        $data['isnew']=0;//变成已经阅读评论
        $res=$comment->where("id={$id}")->save($data);
    }
    //修改文章ajax，把数据取出赋值到ueditor中
    public function modify(){
        $id=$_POST['id'];
        $msg=D('message');
        $arr=$msg->where("id={$id}")->select();
        $data['title']=$arr[0]['title'];
        $data['content']=$arr[0]['content'];
        $data=json_encode($data);
        echo $data;
    }
    //添加或者修改文章
    public function addmsg(){
        $msg=D('message');
        if($_POST['title']!='' && $_POST['editorValue']!=''){
            $data['title']=$_POST['title'];
            $data['content']=strip_tags($_POST['editorValue']);
            $data['time']=time();
            $data['uid']=$_SESSION['rid'];
            if(isset($_POST['add']) && $_POST['add']==''){
                $res=$msg->add($data);
                if($res){
                    $this->success('添加文章成功');
                }else{
                    $this->error('添加文章失败');
                }
            }
            if(isset($_POST['modify']) && $_POST['modify']!==''){
                $id=$_POST['modify'];
                $res2=$msg->where("id={$id}")->save($data);
                if($res2){
                    $this->success('修改文章成功');
                }else{
                    $this->error('修改文章失败');
                }
            }
        }else{
            $this->error('请输入正确信息');
        }

    }
    //登录后台页面
    public function login(){
        $this->display();
    }
    //执行登录控制
    public function dologin(){
        $user=M('user');
        $username=$_POST['username'];
        $password=$_POST['password'];
        $code=$_POST['code'];
        if($_SESSION['verify']!=md5($code)) {
            $this->error('验证码错误');
        }
        $where['username']=$username;
        $where['password']=$password;
        $count=$user->where($where)->count();
        if($count>0){
            $find=$user->where($where)->find();
            $id=$find['id'];
            $_SESSION['rid']=$id;
            $_SESSION['rusername']=$username;
            $this->redirect('Index/index');
        }else{
            $this->error('用户不存在');
        }
    }
    //退出登陆
    public function logout(){
        $_SESSION=array();
        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),'',time()-1,'/');
        }
        $this->redirect('Index/index');
    }
}