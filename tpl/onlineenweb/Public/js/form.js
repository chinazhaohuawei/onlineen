// 验证账号是否存在
var bBtn = false;
$('#InputAccount').bind('focus', function () {
	bBtn = true;
}).bind('blur', function () {
	if ( $(this).val().length && bBtn ) {
		$.ajax({
    		type : 'post',
    		url : $('#login-form').attr('action'),
    		data : {
    			'username' : $('#InputAccount').val(),
    			'password' : 1
    		},
    		success : function (data) {
    			if (data.info == '用户名不存在！') {
    				bBtn = false;
    				$('#InputAccount').parent().find($('.error')).text('');
    				$('#InputAccount').parent().append('<span class="error">'+ data.info + '</span>');
    			}else{
    				$('#InputAccount').parent().find($('.error')).text('');
    			}
    		}
    	});
	}else{
		$('#InputAccount').parent().find($('.error')).text('');
	}
});

// 登录验证
$("#login-form").validate({
	submitHandler: function(form) {

		$('#login-form .login_shadow').show('slow');

    	$.ajax({
    		type : 'post',
    		url : $(form).attr('action'),
    		data : {
    			'username' : $('#InputAccount').val(),
    			'password' : $('#InputPassword').val(),
    			'rememberPwd' : $('#rememberPwd').val(),
    		},
    		success : function (data) {

    			$('#login-form .shadow-text').text(data.info);

    			if (data.status) { //登录成功
    				$('#login-form .shadow-text').css('color' , '#5cc2e2');
    				setTimeout(function () {

    					window.location.href = gVars.ROOT + '/index.php?g=Portal&m=Project&a=index';
    				}, 1000);
    			}else {
    				$('#login-form .shadow-text').css('color' , 'red');
    				$('#login-form .login_shadow').delay(1000).hide('slow');
    			}
    		}
    	});
    },
	rules: {
      username: {
        required: true,
      },
      password: {
        required: true,
        minlength: 5
      }
    },
    errorClass: 'error',
	errorElement: "span",
	errorPlacement: function(error, element) {
		$(element).parent().append(error);
	},
	messages: {
		username: {
			required: "请输入账号",
		},
		password: {
			required: "请输入密码",
			minlength: "密码太短",
		}
	}
});

// 用户名账号是否存在
$('#registerEmail').bind('focus', function () {
	bBtn = true;
}).bind('blur', validateUser);

function validateUser() {
	var errorElement = $('#registerEmail-error');
	if (errorElement.text()) {
    	$('#registerEmail').parents('.form-group').find($('#validateEmail')).remove();
		return;
	}

	if ( $(this).val().length && bBtn) {
		$.ajax({
    		type : 'post',
    		url : gVars.ROOT + '/index.php?g=User&m=Register&a=validateUser',
    		data : {
    			'email' : $('#registerEmail').val(),
    		},
    		success : function (data) {
    			if (data.status) {
    				$('#registerEmail').parents('.form-group').find($('#validateEmail')).remove();
    				$('#registerEmail').parents('.form-group').append('<span id="validateEmail" class="success">'+ data.info + '</span>');
    			}else{
    				$('#registerEmail').parents('.form-group').find($('#validateEmail')).remove();
    				$('#registerEmail').parents('.form-group').append('<span id="validateEmail" class="error">'+ data.info + '</span>');
    			}
    		}
    	});
	}else{
		$('#registerEmail').parent().find($('.error')).text('');
	}
}
$('#registerEmail').bind('keydown', function () {
	var errElement = $('#registerEmail-error');
	if (errElement.text()) {
    	$('#registerEmail').parents('.form-group').find($('#validateEmail')).remove();
	}
});

// 注册验证

$('#register_form').validate({

	submitHandler : function (form) {
		$('.register_shadow').show('slow');
		$.ajax({
			type : 'post',
			url : $(form).attr('action'),
			data : {
				email : $('#registerEmail').val(),
				username : $('#registerUsername').val(),
				password : $('#registerPwd').val(),
				repassword : $('#registerRePwd').val(),
				verify : $('#register-verify').val(),
				terms : true
			},
			success :function(data) {
				console.log(data);
				if ( data.status ) {
					$('.register_shadow').find($('.shadow_text')).text(data.info);
					setTimeout(function () {
						window.location.href = gVars.ROOT + '/index.php?g=Portal&m=project&a=index';
					}, 1000);
				}else{

					$('.register_shadow').find($('.shadow_text')).text(data.info);
					setTimeout(function () {
						$('.register_shadow').hide('slow');
						$('.verify_img').click();
					}, 1000);
					if ( data.info != '验证码错误！' ) {
						$('#register-verify').css('border-color', '#449d44');
					}else {
						$('#register-verify').css('border-color', 'red');
						// $('#register_form button[type="submit"]').attr('disabled', 'true');
					}
				}
				
			}
		});
	},
	debug : true,
	rules : {
		email : {
			email: true,
			required : true,
		},
		username : {
			required : true,
			minlength : 5
		},
		password : {
			required : true,
			minlength : 5
		},
		repassword : {
			required : true,
			minlength : 5,
			equalTo : '#registerPwd',
		}
	},
	errorPlacement : function (error, element) {
		$(element).parent().after(error);
	},
	errorElement : 'span',
	errorClass : 'error',
	messages : {
		email : {
			required : '请输入有效的电子邮件地址！',
			email : '请输入有效的电子邮件地址！'
		},
		username : {
			required : '请输入用户名！',
			minlength : '用户名长度过短！',
		},
		password : {
			required : '请输入密码！',
			minlength : '密码长度太短！',
		},
		repassword : {
			required : '再输入一次密码！',
			minlength : 5, 
			equalTo : '两次输入密码不一致！'
		}
	}
});
