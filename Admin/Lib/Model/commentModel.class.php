<?php
/**
 * Created by PhpStorm.
 * User: Eminem
 * Date: 2017/1/5
 * Time: 12:49
 */
class commentModel extends RelationModel{
    protected $_link = array(
        //comment belongs samlluser，添加username字段
        'Dept'=> array(
            'mapping_type'=>BELONGS_TO,
            'class_name'=>'samlluser',
            'foreign_key'=>'uid',
            'mapping_name'=>'samlluser',
            'mapping_fields'=>'username',
            'as_fields'=>'username',
        ),
        //comment belongs user，添加回复人的fusername(fid)字段
        'Dept1'=> array(
            'mapping_type'=>BELONGS_TO,
            'class_name'=>'samlluser',
            'foreign_key'=>'fid',
            'mapping_name'=>'samlluser',
            'mapping_fields'=>'username',
            'as_fields'=>'username:fusername',
        ),
        //comment belongs message，添加回复人的ftitle字段
        'Dept2'=> array(
            'mapping_type'=>BELONGS_TO,
            'class_name'=>'message',
            'foreign_key'=>'mid',
            'mapping_name'=>'message',
            'mapping_fields'=>'title',
            'as_fields'=>'title:ftitle',
        ),
    );
}