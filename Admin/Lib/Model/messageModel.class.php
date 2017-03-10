<?php
/**
 * Created by PhpStorm.
 * User: Eminem
 * Date: 2016/12/22
 * Time: 19:34
 */
class messageModel extends RelationModel{
    protected $_link = array(
        //message belongs user，添加username字段
        'Dept'=> array(
            'mapping_type'=>BELONGS_TO,
            'class_name'=>'user',
            'foreign_key'=>'uid',
            'mapping_name'=>'user',
            'mapping_fields'=>'username',
            'as_fields'=>'username',
        ),
        //message belongs user，添加filename字段
        'Dept2'=> array(
            'mapping_type'=>BELONGS_TO,
            'class_name'=>'user',
            'foreign_key'=>'uid',
            'mapping_name'=>'user',
            'mapping_fields'=>'filename',
            'as_fields'=>'filename',
        ),
    );
}