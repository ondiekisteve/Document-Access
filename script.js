$(document).ready(function(){
    $('#vieDepartments').hide();
    $('#login').on('click',function () {
        var username=$('#username');
        var password=$('#password');
        var msg=$('#message');
        if(isNotEmpty(username) && isNotEmpty(password)){
            $.ajax(
                {
                    url:'login.php',
                    method:'POST',
                    dataType:'text',
                    data:{
                        login:'login',
                        username:username.val(),
                        pwd:password.val()
                    },
                    beforeSend:function () {
                        $('#login').val("Connecting...");
                    },
                    success:function (response) {
                        if(response.indexOf('Successfully')>0){
                            window.location='user.php';
                        }if(response=='change password'){
                            window.location='changepassword.php';
                        }
                        else {
                            var options={
                                distance:'40',
                                direction:'left',
                                times:'3'
                            };
                            $('#shake').effect('shake',options,800);
                            $('#login').val("Login");
                            msg.html(response);
                        }
                    }
                }
            )
        }
    });
    $('#add').on('click',function () {
        var company=$('#company');
        var msg=$('#message');
        if(isNotEmpty(company)){
            $.ajax(
                {
                    url:'admin/addCompany.php',
                    method:'POST',
                    dataType:'text',
                    data:{
                        add:'add',
                        name:company.val()
                    },
                    success:function (response) {
                        msg.html(response);
                    }
                }
            )
        }
    });
    $('#addDepart').on('click',function () {
        var depart_name= $('#depart_name');
        var companyId=$('#companyId');
        var msg=$('#departMessage');
        if(isNotEmpty(depart_name,companyId)){
            $.ajax(
                {
                    url:'admin/addDepartment.php',
                    method:'POST',
                    dataType:'text',
                    data:{
                        addDepart:'addDepart',
                        depart_name:depart_name.val(),
                        companyId:companyId.val()
                    },
                    success:function (response) {
                        msg.html(response);
                    }
                }
            )
        }
    });
    $('#changePasswordForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            oldpwd: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply old Password'
                    }
                }
            },
            newpwd: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply new Password'
                    }
                    // identical: {
                    //     field: 'rpwd',
                    //     message: 'The password and its confirm are not the same'
                    // }
                }
            },
            rpwd: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please confirm your new Password'
                    },
                    identical: {
                        field: 'newpwd',
                        message: 'The Confirm and its password are not the same'
                    }
                }
            }
        }
    });
    $('#newpwd').on('keyup',function () {
        $('#newpwd').strengthify({
            zxcvbn: 'zxcvbn.js'
        })

        // Config the password strength meter with the following options.
        $('#newpwd,#rpwd').strengthify({
            zxcvbn: 'zxcvbn.js',
            onResult: function(result) {
                var submitBtn = $('input[type=button]');

                if (result.score < 3) {
                    submitBtn.prop('disabled', 'disabled');
                } else {
                    submitBtn.prop('disabled', false);
                }
            }
        })
        // $('#newpwd').strengthify({
        //     // messages displayed in the tooltip
        //     titles: [
        //         'Weakest',
        //         'Weak',
        //         'So-so',
        //         'Good',
        //         'Perfect'
        //     ],
        //     // choose now between tooltip and element or both
        //     tilesOptions:{
        //         tooltip: true,
        //         element: false
        //     },
        //     // display tooltips
        //     drawTitles: true,
        //     // display text messages
        //     drawMessage: false,
        //     // display strenth indicator bars
        //     drawBars: true,
        //     // element after which the strengthify element should be inserted
        //     $addAfter: null
        //
        // });
    })
});

function isNotEmpty(caller) {
    if(caller.val()==''){
        caller.css('border','1px solid red');
        return false;
    }
    else {
        caller.css('border','');
        return true;
    }

}