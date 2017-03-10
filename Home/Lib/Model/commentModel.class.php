<?php
/**
 * Created by PhpStorm.
 * User: Eminem
 * Date: 2016/12/25
 * Time: 20:59
 */
class commentModel extends RelationModel{
    protected $_auto = array (
        array('time','time',1,'function'),
        array('uid','getid',1,'callback') ,
    );
    protected function getid(){
        return $_SESSION['id'];
    }
    protected $_link = array(
        //comment belongs samlluser，添加fusername字段
        'Dept2'=> array(
            'mapping_type'=>BELONGS_TO,
            'class_name'=>'samlluser',
            'foreign_key'=>'fid',
            'mapping_name'=>'samlluser',
            'mapping_fields'=>'username',
            'as_fields'=>'username:fusername',
        ),
        //comment belongs samlluser，添加username字段
        'Dept'=> array(
            'mapping_type'=>BELONGS_TO,
            'class_name'=>'samlluser',
            'foreign_key'=>'uid',
            'mapping_name'=>'samlluser',
            'mapping_fields'=>'username',
            'as_fields'=>'username',
        ),

        //comment belongs message，添加fmessage字段
        'Dept3'=> array(
            'mapping_type'=>BELONGS_TO,
            'class_name'=>'message',
            'foreign_key'=>'mid',
            'mapping_name'=>'message',
            'mapping_fields'=>'title',
            'as_fields'=>'title:ftitle',
        ),
    );
}