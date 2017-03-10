/**
 * Created by Eminem on 2016/12/24.
 */
$(function() {
    $('.Loginbuttom').click(function(){
        $('form').submit();
    })
    $('.Loginbuttom').mouseenter(function(){
        $(this).css('background-color','indianred');
    })
    $('.Loginbuttom').mouseleave(function(){
        $(this).css('background-color','#8D0000');
    })
})
