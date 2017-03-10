/**
 * Created by Eminem on 2016/12/22.
 */
//用户名光标失去时执行ajax
var ui=false;
var pi=false;
var rpi=false;
$(function(){
    $("input[name='username']").focusout(function() {
        var username = $("input[name='username']").val();
        $.get('http://localhost:8080/Blog/home.php/Register/docheck', {'username': username}, function (data) {
            if(data==123) {
                $("input[name='username']").css('border', '1px solid red');
                $('#error').html('用户名格式错误');
                $('#error').css('color', 'red');

            }else{
                if(data==11) {
                    $("input[name='username']").css('border', '1px solid red');
                    $('#error').html('用户已经存在');
                    $('#error').css('color', 'red');
                }else{
                    $("input[name='username']").css('border', '1px solid #00aaaa');
                    $('#error').html('用户可用');
                    $('#error').css('color', 'black');
                    ui=true;
                }
            }
        })
    });
//密码光标失去时执行正则匹配
    $("#pwd").focusout(function checkPwd2() {
        var pwd= $("#pwd").val();
        if (/^[0-9a-zA-Z_]{6,15}$/.test(pwd)) {
            $("#errpwd").html("密码符合要求");
            pi=true;
        }
        else {
            $("#errpwd").html("密码输入有误，请按要求输入");
        }
    })
//确认密码
    $("#repwd").focusout(function checkPwd2() {
        var pwd= $("#pwd").val();
        var repwd= $("#repwd").val();
        if(pwd!=''){
            if(pwd==repwd){
                $("#errrepwd").html("密码一致");
                rpi=true;
            }else{
                $("#errrepwd").html("密码不一致");
            }
        }else{
            $("#errrepwd").html("请先输入密码");
        }
    })
//光标聚集时执行表单样式

//
$('#submit').mouseenter(function () {
    $(this).css('background-color','indianred');
});
    $('#submit').mouseleave(function () {
        $(this).css('background-color','#8D0000');
    });

    $('#submit').click(function () {
        if(ui && pi && rpi){
            $("form[name='myform']").submit();
        }else{
            alert('请按要求填写信息');
        }
    })
})
