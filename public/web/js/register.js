/**
 * Created by tk on 2018/1/26.
 */
$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#username').blur(function(){
        var  phone=$('#username').val();
        $.ajax({
            type: "POST",
            url: isExistUrl,
            data: {phone:phone},
            dataType: "json",
            success: function (data) {
                if (data.code!=200)  {
                    layer.alert(data.msg.msg, {
                        skin: 'layui-layer-lan' //样式类名
                        ,closeBtn: 0
                    });
                }
            }
        });
    })


//        $(function () {
//            $('form').bootstrapValidator({
//                message: 'This value is not valid',
//                feedbackIcons: {
//                    valid: 'glyphicon glyphicon-ok',
//                    invalid: 'glyphicon glyphicon-remove',
//                    validating: 'glyphicon glyphicon-refresh'
//                },
//                fields: {
//                    username: {
//                        message: '请输入正确的手机号',
//                        validators: {
//                            notEmpty: {
//                                message: '手机号不能为空'
//                            },
//                            stringLength: {
//                                min: 11,
//                                max: 11,
//                                message: '手机号的长度11位'
//                            },
//                            regexp: {
//                                regexp: /^[0-9_\.]+$/,
//                                message: '手机号只能是数字'
//                            },
//                        },
//                    },
//                    captcha: {
//                        validators: {
//                            notEmpty: {
//                                message: '请输入验证码'
//                            }
//                        }
//                    },
//                    //密码验证
//                    password: {
//                        validators: {
//                            notEmpty: {
//                                message: '密码不能为空'
//                            },
//                            stringLength: {
//                                min: 6,
//                                max: 12,
//                                message: '密码长度为6-12位'
//                            },
//                            regexp: {
//                                regexp: /^[a-zA-Z0-9_\.]+$/,
//                                message: '密码只能是字母和数字'
//                            },
//                        }
//                    },
//                }
//            });
//        });



});
$('#form_submit').on("click",function(){
    var username=$("#username").val();
    var password=$("#password").val();
    var new_password=$("#new_password").val();
    var clock=$("#clock_id").val();
    console.log(username,password,new_password,clock)
    if(username!=''&&password!=''&&new_password!=''&&clock!=''){
        $(e).attr('disabled', true);
        $.ajax({
            type: "POST",
            url: formPost,
            data: $('form').serialize(),
            dataType: "json",
            success: function (data) {
                if (data.code == 200) {
                    var msg = data.data.message;
                    msg = msg ? msg : '操作成功';
                    layer.alert(msg, {
                        skin: 'layui-layer-lan' //样式类名
                        , closeBtn: 0
                    }, function () {
                        window.location.href = url;
                    });

                } else {
                    layer.alert(data.msg.msg, {
                        skin: 'layui-layer-lan' //样式类名
                        , closeBtn: 0
                    });
                    $(e).attr('disabled', false);
                }
            }
        });
    }
    if(username==''){
        var show_user=document.getElementById('show_username')
        show_user.style.display='block'
    }else{
        var show_user=document.getElementById('show_username');
        show_user.style.display='none'
    }
    if(password==''){
        var show_pas=document.getElementById('password_ts');
        show_pas.style.display='block'
    }else{
        var show_pas=document.getElementById('password_ts');
        show_pas.style.display='block'
    }
    if(new_password==''){
        var new_passwords=document.getElementById('new_password_ts');
        new_passwords.style.display='block'
    }else{
        var new_passwords=document.getElementById('new_password_ts');
        new_passwords.style.display='block'
    }
    if( clock==''){
        var clocks=document.getElementById('clock_idd');
        clocks.style.display='block'
    }else{
        var clocks=document.getElementById('clock_idd');
        clocks.style.display='block'
    }
})