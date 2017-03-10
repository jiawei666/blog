<?php
/**
 * Created by PhpStorm.
 * User: Eminem
 * Date: 2016/12/22
 * Time: 20:22
 */
class RegisterAction extends Action{
    public function index(){
        $this->display();
    }
    public function docheck(){
        $i=null;
        $user=M('samlluser');
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
            }//1为匹配到，0为没匹配到
        }
    }
    public function doreg(){
        //添加上传类
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = 3145728 ;// 设置附件上传大小
        $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath =  './Public/Uploads/';// 设置附件上传目录
        if(!$upload->upload()){// 上传错误提示错误信息
            $this->error($upload->getErrorMsg());
        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
        }
        $user=M('samlluser');
        if($_SESSION['verify']==md5($_POST['code'])){
            if($_POST['username']==''||$_POST['password']==''){
                $this->error('注册失败');
            }else{
                $data['username']=$_POST['username'];
                $data['password']=$_POST['password'];
                $data['sex']=$_POST['sex'];
                $data['filename']=$info[0]['savename'];
                $i=$user->add($data);
                if($i){
                    $this->success('注册成功,马上登陆',U('/Login/login'));
                }else{
                    $this->error('注册失败');
                }
            }
        }else{
            $this->error('验证码错误');
        }
    }

}