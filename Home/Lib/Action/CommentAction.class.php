<?php
/**
 * Created by PhpStorm.
 * User: Eminem
 * Date: 2017/1/2
 * Time: 18:12
 */
class CommentAction extends Action{
    public function dorm(){
        $cid=$_GET['cid'];
        $comment=D('comment');
        $data['status']=0;
        $res=$comment->where("id={$cid}")->save($data);
        if($res){
            echo 11;
        }else{
            echo 111;
        }
    }
}