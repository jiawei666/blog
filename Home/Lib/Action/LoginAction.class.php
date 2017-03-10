<?php
/**
 * Created by PhpStorm.
 * User: Eminem
 * Date: 2016/12/22
 * Time: 13:43
 */
class LoginAction extends Action{
    public function index(){
        if(!(isset($_SESSION['username']) && $_SESSION['username']!='')){
            $this->redirect('Index/index');
        }
        if(isset($_POST['search'])&&$_POST['search']!==''){
            $search=$_POST['search'];
            //搜索条件
            $where['title']=array('like',"%{$search}%",'OR');
            $where['content']=array('like',"%{$search}%",'OR');
            $where['username']=array('like',"%{$search}%",'OR');
            $where['time']=array('like',"%{$search}%",'OR');
            $where['_logic']='OR';
            //实例化文章信息表获取文章信息并且导入分页类
            $msg=D('message');
            import('ORG.Util.Page');//导入分页类
            $count=$msg->where($where)->count();// 查询满足要求的总记录数
            $Page= new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
            $show = $Page->show();// 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $arr=$msg->relation(true)->limit($Page->firstRow.','.$Page->listRows)->order('time desc')->where($where)->select();
            //为没有头像的用户自动添加默认头像
            foreach($arr as $k=>$val){
                if($val['filename']==''){
                    $arr[$k]['filename']='hp.jpg';
                }
            }
            //截取文章，只显示前800个字符
            foreach($arr as $k=>$val){
                $arr[$k]['content']=msubstr($arr[$k]['content'],0,800);
            }
            //实例化用户表获取头像
            $id=$_SESSION['id'];
            $user=D('samlluser');
            $img=$user->field('filename')->where("id={$id}")->select();
            $img=$img[0]['filename'];
            $this->assign('img',$img);
            //分配模版
            if($arr){
                //实例化评论表，取得评论信息//获取评论数量
                $fcom=D('comment');
                $fcomwhere['fid']=$id;
                $fcomwhere['status']=1;
                $fcount=$fcom->where($fcomwhere)->count();
                $this->assign('count',$fcount);
                //获取评论相关内容；
                $farr=$fcom->relation(true)->order('time desc')->where($fcomwhere)->select();
                $this->assign('farr',$farr);
                $this->assign('show',$show);
                $this->assign('list',$arr);
                $this->assign('username',$_SESSION['username']);
            }else{
                $this->error('没有结果');
            }
            $this->display();
        }else{
            //实例化文章信息表获取文章信息并且导入分页类
            $msg=D('message');
            import('ORG.Util.Page');// 导入分页类
            $count=$msg->count();// 查询满足要求的总记录数
            $Page= new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
            $show = $Page->show();// 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $arr=$msg->relation(true)->limit($Page->firstRow.','.$Page->listRows)->order('time desc')->select();
            //为没有头像的用户自动添加默认头像
            foreach($arr as $k=>$val){
                if($val['filename']==''){
                    $arr[$k]['filename']='hp.jpg';
                }
            }
            //截取文章，只显示前800个字符
            foreach($arr as $k=>$val){
                $arr[$k]['content']=msubstr($arr[$k]['content'],0,800);
            }
            //实例化用户表获取头像
            $user=D('samlluser');
            $id=$_SESSION['id'];
            $img=$user->field('filename')->where("id={$id}")->select();
            $img=$img[0]['filename'];
            //assign头像图片路径
            $this->assign('img',$img);



            //实例化评论表，取得评论信息//获取评论数量
            $fcom=D('comment');
            $fcomwhere['fid']=$id;
            $fcomwhere['status']=1;
            $fcount=$fcom->where($fcomwhere)->count();
            $this->assign('count',$fcount);
                //获取评论相关内容；
            $farr=$fcom->relation(true)->order('time desc')->where($fcomwhere)->select();
            $this->assign('farr',$farr);

            //分配模版
            $this->assign('show',$show);
            $this->assign('list',$arr);
            $this->assign('username',$_SESSION['username']);
            $this->display();
        }
    }
    public function login(){
        $this->display();
    }
    public function dologin(){
        $user=M('samlluser');
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
            $_SESSION['id']=$id;
            $_SESSION['username']=$username;
            $this->success('登录成功',U('Login/index'));
        }else{
            $this->error('用户不存在');
        }
    }
    public function logout(){
        $_SESSION=array();
        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),'',time()-1,'/');
        }
        $this->redirect('Index/index');
    }
}