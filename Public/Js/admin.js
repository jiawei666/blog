/**
 * Created by Eminem on 2017/1/4.
 */
$(function() {
    //实例化ueditor
    var ue=UE.getEditor('editor', {toolbars: [['emotion','|','bold', 'italic',
        'underline', 'fontborder','|','simpleupload','|','justifyleft', 'justifycenter',
        'justifyright', 'justifyjustify',]], autoHeightEnabled: true, autoFloatEnabled: true}
        ,{autoHeightEnabled: false}
    );
    //导航栏js
   $('div[class="option"]').mouseenter(function(){
       $(this).css('background','rgba(250,250,250,0.3)')
       $(this).find('ul').show(0);
   })
    $('div[class="option"]').mouseleave(function(){
        $(this).css('background','rgba(250,250,250,0)')
        $(this).find('ul').hide(0);
    })
    $('div[class="option"]').find('li').mouseenter(function () {
        $(this).css('background','rgba(0,160,210,0.3)');
    })
    $('div[class="option"]').find('li').mouseleave(function () {
        $(this).css('background-color','rgba(250,250,250,0)');
    })
    $('div[class="option"]').find('a').mouseenter(function(){
        $(this).css('text-decoration','underline');
    });
    $('div[class="option"]').find('a').mouseleave(function(){
        $(this).css('text-decoration','none');
    });
    //回到顶部按钮
    $('div[name="gotop"]:eq(1)').mouseenter(function(){
        $(this).hide(0);
        $('div[name="gotop"]:eq(0)').show(0);
    })
    $('div[name="gotop"]:eq(0)').mouseleave(function(){
        $(this).hide(0);
        $('div[name="gotop"]:eq(1)').show(0);
    })
    $('div[name="gotop"]:eq(0)').click(function(){
        $('body,html').animate({ scrollTop: 0 }, 500);
    });
    //导航栏分别对于滚动条位置
    $('div[class="option"]:eq(0)').find('a').click(function(){
        $('body,html').animate({ scrollTop: 1211 }, 1000);
    })
    $('div[class="option"]:eq(1)').find('a:eq(0)').click(function(){
        $('body,html').animate({ scrollTop: 630 }, 1000);
    })
    $('div[class="option"]:eq(1)').find('a:eq(1)').click(function(){
        $('body,html').animate({ scrollTop: 2471 }, 1000);
    })
    $('div[class="option"]:eq(2)').find('a').click(function(){
        $('body,html').animate({ scrollTop: 1841 }, 1000);
    })

    //注册表单验证
     //验证用户名

    $('input[name="username"]').focusout(function(){
        var username=$('#zjandpt').val();
        $.get('http://localhost:8080/Blog/admin.php/Index/doreg',{'username':username},function(data){
            if(data==123) {
                $('.regtf:eq(0)').find('img:eq(0)').hide(0);
                $('.regtf:eq(0)').find('img:eq(1)').show(0);
            }else{
                if(data==11) {
                    $('.regtf:eq(0)').find('img:eq(0)').hide(0);
                    $('.regtf:eq(0)').find('img:eq(1)').show(0);
                }else{
                    $('.regtf:eq(0)').find('img:eq(1)').hide(0);
                    $('.regtf:eq(0)').find('img:eq(0)').show(0);
                }
            }
        })
    })
      //验证密码
    $('input[name="password"]').focusout(function(){
        var pwd=$('input[name="password"]').val();
        if(/^[0-9a-zA-Z_]{6,15}$/.test(pwd)){
            $('.regtf:eq(1)').find('img:eq(1)').hide(0);
            $('.regtf:eq(1)').find('img:eq(0)').show(0);
        }else{
            $('.regtf:eq(1)').find('img:eq(0)').hide(0);
            $('.regtf:eq(1)').find('img:eq(1)').show(0);
        }
    })
    //注册按钮动画
    $('div[class="regbt"]').mouseenter(function(){
        $(this).css('background','rgba(255,255,255,0.6)')
        $(this).css('text-decoration','underline');
    })
    $('div[class="regbt"]').mouseleave(function(){
        $(this).css('background','rgba(255,255,255,0)')
        $(this).css('text-decoration','none');
    })
    $('div[class="regbt"]').click(function(){
        $('#form1').submit();
    })
    //导航栏选择添加终极用户或者普通用户
    $('#zjuser').click(function(){
        $('input[name="username"]').attr('name','zjusername');
        $('.regbt').html('注册终极用户');
    });
    $('#ptuser').click(function(){
        $('input[name="zjusername"]').attr('name','username');
        $('.regbt').html('注册普通作者');
    });
    //全选跟全不选
    $('#seall').click(function(){
        $('input[type="checkbox"]').prop("checked",true);
    })
    $('#seall+button').click(function(){
        $('input[type="checkbox"]').prop("checked",false);
    })
    $('#showsubmit').click(function(){
        $('input[type="checkbox"]').attr('value','1');
        $('#form2').submit();
    })
    $('#notshow').click(function(){
        $('input[type="checkbox"]').attr('value','0');
        $('#form2').submit();
    })
    //单一显示跟单一不显示 需要执行ajax
    $('a[name="singleshow"]').click(function(){
        var id = $(this).attr('id');
        var aa=$(this);
        var bb=$('div[class="titlelist"]:eq(2)')
        var url = "http://localhost:8080/Blog/admin.php/Index/doshowsinglecmt?ID=" + Math.random();
        setTimeout(function() { aa.parent().parent().load(url+"bb",{'id':id,'isshow':1},'');   }, 200);
    })
    $('a[name="singlenotshow"]').click(function(){
        var id = $(this).prev().attr('id');
        var aa=$(this);
        var bb=$('div[class="titlelist"]:eq(2)')
        var cc=$('#ccount').html();
        cc=--cc;
        var url = "http://localhost:8080/Blog/admin.php/Index/doshowsinglecmt?ID=" + Math.random();
        setTimeout(function() { aa.parent().parent().load(url+"bb",{'id':id,'isshow':0},'');   }, 500);
    })
    //删除文章ajax
    $('a[name=del]').click(function(){
        var id=$(this).next().attr('value');
        aa=$(this);
        var bb=$('div[class="titlelist"]:eq(0)')
        var url = "http://localhost:8080/Blog/admin.php/Index/del?ppp=" + Math.random();
        setTimeout(function() { aa.parent().parent().load(url+"bb",{'id':id},'');   }, 500);
    })
    //修改文章
    $('a[name="modify"]').click(function(){
        //点击修改文章滚动滚动条
        $('body,html').animate({scrollTop:2471},500);
        var id=$(this).prev().attr('value');
        $('input[name="add"]').val(id);
        $('input[name="add"]').attr('name','modify');
        $('input[type="submit"]').attr('value','修改文章')
        $.post('http://localhost:8080/Blog/admin.php/Index/modify',{'id':id},function(data) {
            var datas=JSON.parse(data);
            $('input[name="title"]').val(datas.title);
            ue.ready(function() {
                ue.setContent(datas.content);
            });
        })
        $('button[name="add"]').show(0);
    })
    //点击修改时出现添加文章按钮，实现添加文章
    $('button[name="add"]').click(function(){
        $('input[name="modify"]').val('');
        $('input[name="modify"]').attr('name','add');
        $('input[type="submit"]').attr('value','添加文章')
        $('input[name="title"]').val('');
        ue.ready(function() {
            ue.setContent('');
        });
    })
    //关闭浏览器自动清除session
    window.onunload(function(){
        session_destroy();
    });
})