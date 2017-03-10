<?php
/**
 * Created by PhpStorm.
 * User: Eminem
 * Date: 2017/1/6
 * Time: 15:59
 */
/*验证码类*/
class PublicAction extends Action{
    public function code(){
        import('ORG.Util.Image');
        Image::buildImageVerify();

    }
}