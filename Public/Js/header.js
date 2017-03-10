/**
 * Created by Eminem on 2016/12/20.
 */
    $(function() {
        $('#yy2,#yy3,#yy4,#yy5').mouseenter(function () {
            $(this).css('background-color', 'black')
            $(this).children(':last').show(0);
        })
        $('#yy2,#yy3,#yy4,#yy5').mouseleave(function () {
            $(this).css('color', 'white')
            $(this).css('background-color', '#333')
            $(this).children(':last').hide(0);
        })
        $('#yy1').mouseenter(function () {
            $(this).css('background-color', 'black')
        })
        $('#yy1').mouseleave(function () {
            $(this).css('background-color', '#333')
        })
        $('#aaa1>li,#aaa2>li,#aaa3>li,#aaa4>li').mouseenter(function () {
            $(this).css('background-color', '#333');
            $(this).css('color', 'white');
            $(this).children().css('color', 'white');
        })
        $('#aaa1>li,#aaa2>li,#aaa3>li,#aaa4>li').mouseleave(function () {
            $(this).css('background-color', '#cad2d3');
            $(this).css('color', 'black');
            $(this).children().css('color', 'black');
        })

        //左侧滚动条拉动时头像大小变化
        window.onscroll=function(){
            var t=document.body.scrollTop||document.documentElement.scrollTop;
            if(t>150){
                $(".Uuser").hide(200);
                $(".sUuser").show(200);
            }else{
                $(".Uuser").show(200);
                $(".sUuser").hide(200);
            }
        }
        //右侧工具栏动画
        $('.area:eq(0),.area:eq(1),.area:eq(2),.area:eq(3)').mouseenter(function(){

            $(this).find('img:eq(0)').css('display','none');
            $(this).find('img:eq(1)').css('display','block');
            $(this).css('background','#1296db');

        });
        $('.area:eq(0),.area:eq(1),.area:eq(2),.area:eq(3)').mouseleave(function(){
            $(this).find('img:eq(0)').css('display','block');
            $(this).find('img:eq(1)').css('display','none');
            $(this).css('background','#FAFAFA');
        });
        $('.area:eq(1)').mouseenter(function(){
            $(this).find('div').show(400);
            $(this).find('div').animate({width:'+150px'},'400');
        });
        $('.area:eq(1)').mouseleave(function(){
            $(this).find('div').hide(0);
            $(this).find('div').css('width','0px');
        });
        //用户信息回复区  如果为0，则隐藏
        if($('div[class="fcount"]').find('a:eq(0)').html()==0){
            $('div[class="fcount"]').css('display','none');
            $('div[class="fcomment"]').hide();
        }else{
            $('div[class="fcount"]').css('display','block');
        }
        //点击数字显示回复的详情
        $('div[class="fcount"]').click(function(){
            $('div[class="fcomment"]').css('display','block');
        });
        $('div[class="fcomment"]').mouseleave(function(){
            $(this).css('display','none');
        });
          //已读 图片js
        $('div[name="rm"]').find('img:eq(0)').mouseenter(function () {
            $(this).hide(0);
            $(this).next().show(0);
        });
        $('div[name="rm"]').find('img:eq(1)').mouseleave(function () {
            $(this).hide(0);
            $(this).prev().show(0);
        });
        //点击已读执行ajax
        $('div[name="rm"]').find('img:eq(1)').click(function(){
            var tt=$(this).parent();
            var cid=$(this).next().html();
            $.get('http://localhost:8080/Blog/home.php/Comment/dorm', {'cid': cid}, function (data) {
                if(data==11){
                    var fcount=$('div[class="fcount"]').find('a:eq(0)').html();
                    tt.css('display','none');
                    fcount=--fcount;
                    $('div[class="fcount"]').find('a:eq(0)').html(fcount);
                    if($('div[class="fcount"]').find('a:eq(0)').html()==0){
                        $('div[class="fcount"]').css('display','none');
                        $('div[class="fcomment"]').hide();
                    }else{
                        $('div[class="fcount"]').css('display','block');
                        $('div[class="fcomment"]').show();
                    }
                }
            })
        })
    })



