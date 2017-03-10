<?php
/**
 * Created by PhpStorm.
 * User: Eminem
 * Date: 2016/12/18
 * Time: 16:24
 */
/*验证码类*/
class PublicAction extends Action{
    public function code(){
        import('ORG.Util.Image');
        Image::buildImageVerify();

    }

}