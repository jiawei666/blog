<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
        if(isset($_SESSION['username']) && $_SESSION['username']!=''){
            $this->redirect('Login/index');
        }
        //有搜索条件则执行第一项
        if(isset($_POST['search'])&&$_POST['search']!==''){
            $search=$_POST['search'];
            $msg=D('message');
            //搜索条件
            $where['title']=array('like',"%{$search}%",'OR');
            $where['content']=array('like',"%{$search}%",'OR');
            $where['username']=array('like',"%{$search}%",'OR');
            $where['time']=array('like',"%{$search}%",'OR');
            $where['_logic']='OR';
            import('ORG.Util.Page');// 导入分页类
            $count=$msg->where($where)->count();// 查询满足要求的总记录数
            $Page= new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
            $show = $Page->show();// 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $arr=$msg->relation(true)->limit($Page->firstRow.','.$Page->listRows)->order('time desc')->where($where)->select();
            foreach($arr as $k=>$val){
                if($val['filename']==''){
                    $arr[$k]['filename']='hp.jpg';
                }
            }
            foreach($arr as $k=>$val){
                $arr[$k]['content']=msubstr($arr[$k]['content'],0,800);
            }
            if($arr){
                $this->assign('show',$show);
                $this->assign('list',$arr);
                $this->assign('username',$_SESSION['username']);

            }else{
                $this->error('没有结果');
            }
            $this->display();
        }else{
            $msg=D('message');
            import('ORG.Util.Page');// 导入分页类
            $count=$msg->count();// 查询满足要求的总记录数
            $Page= new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
            $show = $Page->show();// 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $arr=$msg->relation(true)->limit($Page->firstRow.','.$Page->listRows)->order('time desc')->select();
            foreach($arr as $k=>$val){
                if($val['filename']==''){
                    $arr[$k]['filename']='hp.jpg';
                }
            }
            foreach($arr as $k=>$val){
                $arr[$k]['content']=msubstr($arr[$k]['content'],0,800);
            }
            $this->assign('show',$show);
            $this->assign('list',$arr);
            $this->assign('username',$_SESSION['username']);
            $this->display();
        }
    }
    //我的文章页面
   /* public function my(){
        if(!(isset($_SESSION['username']) && $_SESSION['username']!='')){
            $this->error('请先登录');
        }
        if(isset($_POST['search'])&&$_POST['search']!==''){
            $search=$_POST['search'];
            $id=$_SESSION['id'];
            $msg=D('message');
            //搜索条件
            $where['title']=array('like',"%{$search}%",'OR');
            $where['content']=array('like',"%{$search}%",'OR');
            $where['username']=array('like',"%{$search}%",'OR');
            $where['time']=array('like',"%{$search}%",'OR');
            $where['_logic']='OR';

            import('ORG.Util.Page');// 导入分页类
            $count=$msg->where($where)->count();// 查询满足要求的总记录数
            $Page= new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
            $show = $Page->show();// 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $arr=$msg->relation(true)->limit($Page->firstRow.','.$Page->listRows)->where($where)->order('time desc')->select();
                foreach($arr as $k=>$val){
                    if($val['filename']==''){
                        $arr[$k]['filename']='hp.jpg';
                    }
                }
                foreach($arr as $k=>$val){
                    $arr[$k]['content']=msubstr($arr[$k]['content'],0,800);
                }
                //实例化用户表获取头像
                $user=D('samlluser');
                $img=$user->field('filename')->where("id={$id}")->select();
                if(empty($img[0]['filename'])){
                    $img='hp.jpg';
                }else{
                    $img=$img[0]['filename'];
                }
                $this->assign('img',$img);
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
                $id=$_SESSION['id'];
                $msg=D('message');
                import('ORG.Util.Page');// 导入分页类
                $count=$msg->where("uid={$id}")->count();// 查询满足要求的总记录数
                $Page= new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
                $show = $Page->show();// 分页显示输出
                // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
                $arr=$msg->relation(true)->limit($Page->firstRow.','.$Page->listRows)->where("uid={$id}")->order('time desc')->select();
                foreach($arr as $k=>$val){
                    if($val['filename']==''){
                        $arr[$k]['filename']='hp.jpg';
                    }
                }
                foreach($arr as $k=>$val){
                    $arr[$k]['content']=msubstr($arr[$k]['content'],0,800);
                }
                //实例化用户表获取头像
                $user=D('samlluser');
                $img=$user->field('filename')->where("id={$id}")->select();
                if(empty($img[0]['filename'])){
                    $img='hp.jpg';
                }else{
                    $img=$img[0]['filename'];
                }
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
                $this->assign('show',$show);
            if($arr){
                $this->assign('list',$arr);
            }else{
                $this->error('没有结果');
            }
                $this->assign('username',$_SESSION['username']);
                $this->display();

        }

    }*/
    //文章详情页面
    public  function detial(){
        $id=$_GET['id'];
        //实例化文章
        $msg=D('message');
        $arr=$msg->relation(true)->where("id={$id}")->select();
        foreach($arr as $k=>$val){
            if($val['filename']==''){
                $arr[$k]['filename']='hp.jpg';
            }
        }
        //实例化用户表获取头像
        $uuid=$_SESSION['id'];
        $user=D('samlluser');
        $img=$user->field('filename')->where("id={$uuid}")->select();
        $img=$img[0]['filename'];
        $this->assign('img',$img);
        //实例化评论
        $cmt=D('comment');
        $where['mid']=$id;
        $where['show']=1;
        $arr2=$cmt->relation(true)->where($where)->order('time desc')->select();
        $this->assign('clist',$arr2);
        $this->assign('mid',$id);
        $this->assign('list',$arr);
        $this->assign('username',$_SESSION['username']);
        $this->display();
    }
    //添加评论进数据库
    public function addcomment(){
        $mid=$_POST['mid'];
        $comment=strip_tags($_POST['editorValue']);
        //实例化用户表看是否有人@
        $user=D('samlluser');
        $usernamearr=$user->field('username')->select();
        foreach($usernamearr as $val){
            $fusername=$val['username'];
            $str='@'.$fusername;
            if(strstr($comment,$str)!==false){
                $fid=$user->field('id')->where("username='{$fusername}'")->select();
                $data['fid']=$fid[0]['id'];
                $data['status']=1;
            }
        }
        $comment=msubstr($comment,0,100,'utf-8',false);
        //把评论添加进数据库
        $cmt=D('comment');
        $data['content']=$comment;
        $data['time']=time();
        $data['uid']=$_SESSION['id'];
        $data['mid']=$mid;
        $i=$cmt->add($data);
        if($i){
            $this->success('评论成功，待管理员审核',U('Index/detial?id='.$mid));
        }else{
            $this->error('评论失败，请先登录！');
        }
    }
    //用户详情页面
    public function user(){
        $username=$_GET['username'];
        $user=D('samlluser');
        $img=$user->field('filename')->where("username='{$username}'")->select();
        if(empty($img[0]['filename'])){
            $img='hp.jpg';
        }else{
            $img=$img[0]['filename'];
        }
        $username1=$user->field('username')->where("username='{$username}'")->select();
        $username1=$username1[0]['username'];
        $this->assign('img',$img);
        $this->assign('username',$username1);
        $this->display();
    }
}