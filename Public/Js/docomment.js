/**
 * Created by Eminem on 2016/12/25.
 */
$(function() {
    var ue=UE.getEditor('editor', {toolbars: [['']], autoHeightEnabled: true, autoFloatEnabled: true});

    //评论回复
    $("div[class='commentcnt']").find('a:last').click(function() {
        ue.execCommand('cleardoc');
        var username=$(this).parent().find('a:eq(0)').html();
        ue.ready(function() {
            ue.setContent("@"+'<a style="color: #00a0e9;cursor: pointer">'+username+'</a>'+':');
        });
        window.scrollTo(0,1500);
        ue.focus();
    })
})