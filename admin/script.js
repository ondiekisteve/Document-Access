$(document).ready(function () {
    $('#viewDocuments,#viewUsers,#viewCompanies,#viewDeparts').DataTable();
    $("#accordion").accordion({navigation: true});
    $('#masterdoc').on('click', function(e) {
        if($(this).is(':checked',true))
        {
            $(".sub_chk").prop('checked', true);
        }
        else
        {
            $(".sub_chk").prop('checked',false);
        }
    });
    $('#masterdepart').on('click', function(e) {
        if($(this).is(':checked',true))
        {
            $(".sub_chk").prop('checked', true);
        }
        else
        {
            $(".sub_chk").prop('checked',false);
        }
    });
    $('#mastercompany').on('click', function(e) {
        if($(this).is(':checked',true))
        {
            $(".sub_chk").prop('checked', true);
        }
        else
        {
            $(".sub_chk").prop('checked',false);
        }
    });
    $('#delete_all').on('click', function(e) {
        var allVals = [];
        var msg=$('#message');
        var selectedIds=$('#selectedIds');
        $(".sub_chk:checked").each(function() {
            allVals.push($(this).attr('data-id'));
        });
        //alert(allVals.length); return false;
        if(allVals.length <=0)
        {
            alert("Please select row.");
        }
        else {
            //$("#loading").show();
            WRN_PROFILE_DELETE = "Are you sure you want to delete this Documents?";
            var check = confirm(WRN_PROFILE_DELETE);
            if(check == true){
                //for server side

                var join_selected_values = allVals.join(",");

                $.ajax({

                type: "POST",
                url: "deleteDocument.php",
                cache:false,
                data: 'ids='+join_selected_values,
                success: function(response)
                {
                   msg.html(response);
                    setTimeout(function() {
                        msg.fadeOut();
                    }, 2000 );
                }
                });
                //for client side
                $.each(allVals, function( index, value ) {
                    $('table tr').filter("[data-row-id='" + value + "']").remove();
                });


            }
        }
    });
    $('#delete_allDepart').on('click', function(e) {
        var allVals = [];
        var msg=$('#message2');
        var selectedIds=$('#selectedIds');
        $(".sub_chk:checked").each(function() {
            allVals.push($(this).attr('data-id'));
        });
        //alert(allVals.length); return false;
        if(allVals.length <=0)
        {
            alert("Please select row.");
        }
        else {
            //$("#loading").show();
            WRN_PROFILE_DELETE = "Are you sure you want to delete this Departments?";
            var check = confirm(WRN_PROFILE_DELETE);
            if(check == true){
                //for server side

                var join_selected_values = allVals.join(",");

                $.ajax({

                    type: "POST",
                    url: "deleteDepartment.php",
                    cache:false,
                    data: 'ids='+join_selected_values,
                    success: function(response)
                    {
                        msg.html(response);
                        setTimeout(function() {
                            msg.fadeOut();
                        }, 2000 );
                    }
                });
                //for client side
                $.each(allVals, function( index, value ) {
                    $('table tr').filter("[data-row-id='" + value + "']").remove();
                });


            }
        }
    });
    $('#delete_allcompanies').on('click', function(e) {
        var allVals = [];
        var msg=$('#message2');
        var selectedIds=$('#selectedIds');
        $(".sub_chk:checked").each(function() {
            allVals.push($(this).attr('data-id'));
        });
        //alert(allVals.length); return false;
        if(allVals.length <=0)
        {
            alert("Please select row.");
        }
        else {
            //$("#loading").show();
            WRN_PROFILE_DELETE = "Are you sure you want to delete this Companies?";
            var check = confirm(WRN_PROFILE_DELETE);
            if(check == true){
                //for server side

                var join_selected_values = allVals.join(",");

                $.ajax({

                    type: "POST",
                    url: "deleteCompany.php",
                    cache:false,
                    data: 'companyids='+join_selected_values,
                    success: function(response)
                    {
                        msg.html(response);
                        setTimeout(function() {
                            msg.fadeOut();
                        }, 2000 );
                    }
                });
                //for client side
                $.each(allVals, function( index, value ) {
                    $('#viewCompanies tr').filter("[data-row-id='" + value + "']").remove();
                });


            }
        }
    });
    $('.company').on('change',function () {
       var company=$('.company').val();
       $.ajax({
           url:'addDocument.php',
           type:'json',
           method:'GET',
           data:{
               company:company
           },success:function (response) {
               var result=$.parseJSON(response);
               var string='';
               if(result.length==0){
                   string += "<option>No Department associated with company</option>";
               }else {
                   $.each(result, function (key, value) {
                       string += "<option value='+"+value['id']+"+'>"+ value['depart_name'] + "</option>";
                   });
               }
               $('.department').html(string);
           }
       });
    });
    $('#email').on('keyup blur',function () {
        var email=$('#email');
        var validUser=$('#validUser');
        $.ajax(
            {
                url:'validateUser.php',
                dataType:'text',
                data:{
                    email:email.val()
                },
                method:'POST',
                success:function (response) {
                    if(response.indexOf('Already')>0){
                        email.css('border','1px solid red');
                    }else {
                        email.css('border','');
                    }
                    validUser.html(response);
                }
            }
        )
    });
    $('#company').on('keyup blur',function () {
        var company=$('#company');
        var msg=$('#msg');
        var add=$('#add');
        $.ajax(
            {
                url:'addCompany.php',
                dataType:'text',
                data:{
                    company:company.val(),
                },
                method:'POST',
                success:function (response) {
                    msg.html(response);
                    if(response.indexOf('Already Exist')>0){
                        add.addClass('disabled');
                    }else {
                        add.removeClass('disabled');
                    }
                }
            }
        )
    });
    $('#depart_name').on('keyup blur',function () {
        var depart_name=$('#depart_name');
        var msg=$('#msg');
        var addDepart=$('#addDepart');
        $.ajax(
            {
                url:'addDepartment.php',
                dataType:'text',
                data:{
                    departmentName:depart_name.val(),
                },
                method:'POST',
                success:function (response) {
                    msg.html(response);
                    if(response.indexOf('Already Exist')>0){
                        addDepart.addClass('disabled');
                    }else {
                        addDepart.removeClass('disabled');
                    }
                }
            }
        )
    });
    $('#delete_all2').on('click', function(e) {
        var allVals = [];
        var msg=$('#message2');
        var selectedIds=$('#selectedIds');
        $(".sub_chk:checked").each(function() {
            allVals.push($(this).attr('data-id'));
        });
        //alert(allVals.length); return false;
        if(allVals.length <=0)
        {
            alert("Please select row.");
        }
        else {
            //$("#loading").show();
            WRN_PROFILE_DELETE = "Are you sure you want to delete this Documents?";
            var check = confirm(WRN_PROFILE_DELETE);
            if(check == true){
                //for server side

                var join_selected_values = allVals.join(",");

                $.ajax({

                    type: "POST",
                    url: "deleteUser.php",
                    cache:false,
                    data: 'ids='+join_selected_values,
                    success: function(response)
                    {
                        msg.html(response);
                        setTimeout(function() {
                            msg.fadeOut();
                        }, 2000 );
                    }
                });
                //for client side
                $.each(allVals, function( index, value ) {
                    $('table tr').filter("[data-row-id='" + value + "']").remove();
                });


            }
        }
    });
    $('#editUser').on('click',function () {
        var form=$('#editUserForm');
        var fname=$('#fname');
        var lname=$('#fname');
        var email=$('#email');
        var company=$('#company');
        var department=$('#department');
        var superUser = $(".superUser:checked").val();
        var editId=$('#editId');
        var msg = $("#message2");
        if(isNotEmpty(fname) && isNotEmpty(lname) && isNotEmpty(email) && isNotEmpty(company) && isNotEmpty(department) && isNotEmpty(company)){
            $.ajax(
                {
                    url:'editUser.php',
                    method:'POST',
                    dataType:'text',
                    data:{
                        fname:fname.val(),
                        editId:editId.val(),
                        lname:lname.val(),
                        email:email.val(),
                        department:department.val(),
                        company:company.val(),
                        superUser:superUser
                    },
                    success:function (response) {
                        msg.html(response);
                        msg.fadeIn(10).fadeOut(3000);
                        // setTimeout(function () {
                        //     msg.fadeOut();
                        // }, 2000);
                    }
                }
            )
        }
    });
    $('#updateDocument').on('click',function () {
        var form=$('#editDocumentForm');
        var msg=$('#message');
        var formData = new FormData(form[0]);
        msg.html('<i class="btn btn-success">Loading...</i>');
        $.ajax(
            {
                url:'editDocument.php',
                method:'POST',
                dataType:'text',
                enctype:'multipart/form-data',
                data:formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success:function (response) {
                    msg.html(response);
                    msg.fadeIn(10).fadeOut(3000);
                    // setTimeout(function() {
                    //     msg.fadeOut();
                    // }, 2000 );
                }
            }
        )
    });
    $('.btn_delete').on('click',function () {
        var id=$(this).data("id3");
        var msg=$('#message');
        WRN_PROFILE_DELETE = "Are you sure you want to delete this Documents?";
        var check = confirm(WRN_PROFILE_DELETE);
        if(check == true) {
            $.ajax({
                type: "POST",
                url: "deleteDocument.php",
                data: {
                    'id': id
                },
                success: function (response) {
                    msg.html(response);
                    setTimeout(function () {
                        msg.fadeOut();
                    }, 2000);
                }
            });
        }
        //for client side
            $('table tr').filter("[data-row-id='" + id + "']").remove();
    });
    $('.btn_deleteuser').on('click',function () {
        var id=$(this).data("id3");
        var msg=$('#message2');
        WRN_PROFILE_DELETE = "Are you sure you want to delete this Documents?";
        var check = confirm(WRN_PROFILE_DELETE);
        if(check == true) {
            $.ajax({
                type: "POST",
                url: "deleteUser.php",
                data: {
                    'id': id
                },
                success: function (response) {
                    msg.html(response);
                    setTimeout(function () {
                        msg.fadeOut();
                    }, 2000);
                }
            });
        }
        //for client side
        $('table tr').filter("[data-row-id='" + id + "']").remove();
    });
    $('.btn_deletedepart').on('click',function () {
        var id=$(this).data("id3");
        var msg=$('#message2');
        WRN_PROFILE_DELETE = "Are you sure you want to delete this Department?";
        var check = confirm(WRN_PROFILE_DELETE);
        if(check == true) {
            $.ajax({
                type: "POST",
                url: "deleteDepartment.php",
                data: {
                    'id': id
                },
                success: function (response) {
                    msg.html(response);
                    setTimeout(function () {
                        msg.fadeOut();
                    }, 2000);
                }
            });
        }
        //for client side
        $('table tr').filter("[data-row-id='" + id + "']").remove();
    });
    $('.btn_deletecompany').on('click',function () {
        var id=$(this).data("id3");
        var msg=$('#message2');
        WRN_PROFILE_DELETE = "Are you sure you want to delete this Company?";
        var check = confirm(WRN_PROFILE_DELETE);
        if(check == true) {
            $.ajax({
                type: "POST",
                url: "deleteCompany.php",
                data: {
                    'id': id
                },
                success: function (response) {
                    msg.html(response);
                    setTimeout(function () {
                        msg.fadeOut();
                    }, 2000);
                }
            });
        }
        //for client side
        $('table tr').filter("[data-row-id='" + id + "']").remove();
    });
    $('#registerUser').on('click',function () {
        var fname=$('#fname');
        var lname=$('#fname');
        var email=$('#email');
        var company=$('#company');
        var department=$('#department');
        var superUser = $(".superUser:checked").val();
        var msg = $("#message2");
        if(isNotEmpty(fname) && isNotEmpty(lname) && isNotEmpty(email) && isNotEmpty(company) && isNotEmpty(department) && isNotEmpty(company)){
            $.ajax(
                {
                    url:'register.php',
                    method:'POST',
                    dataType:'text',trtrtrtrtrgghgh
                    data:{
                        registerUser:'registerUser',
                        fname:fname.val(),
                        lname:lname.val(),
                        email:email.val(),
                        department:department.val(),
                        company:company.val(),
                        superUser:superUser
                    },
                    success:function (response) {
                        msg.html(response);
                        msg.fadeIn(10).fadeOut(3000);
                        $("#registerForm")[0].reset();
                        // setTimeout(function () {
                        //     msg.fadeOut();
                        //     $('#fname,#lname,#email').val('')
                        // }, 2000);
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
                    url:'addCompany.php',
                    method:'POST',
                    dataType:'text',
                    data:{
                        add:'add',
                        name:company.val()
                    },
                    success:function (response) {
                        msg.html(response);
                        msg.fadeIn(10).fadeOut(3000);
                        $("#companyForm")[0].reset();
                        // setTimeout(function () {
                        //     msg.fadeOut();
                        //     $('#company').val('')
                        // }, 2000);
                    }
                }
            )
        }
    });
    $('#updateCompany').on('click',function () {
        var company=$('#company');
        var editId=$('#editId');
        var msg=$('#message');
        if(isNotEmpty(company)){
            $.ajax(
                {
                    url:'editCompany.php',
                    method:'POST',
                    dataType:'text',
                    data:{
                        editId:editId.val(),
                        name:company.val()
                    },
                    success:function (response) {
                        msg.html(response);
                        msg.fadeIn(10).fadeOut(3000);
                        // setTimeout(function () {
                        //     msg.fadeOut();
                        // }, 2000);
                    }
                }
            )
        }
    });
    $('#addDepart').on('click',function () {
        var depart_name=$('#depart_name');
        var companyId=$('#companyId');
        var msg=$('#departMessage');
        if(isNotEmpty(depart_name) && isNotEmpty(companyId)){
            $.ajax(
                {
                    url:'addDepartment.php',
                    method:'POST',
                    dataType:'text',
                    data:{
                        addDepart:'addDepart',
                        depart_name:depart_name.val(),
                        companyId:companyId.val()
                    },
                    success:function (response) {
                        msg.html(response);
                        msg.fadeIn(10).fadeOut(3000);
                        $("#departmentForm")[0].reset();

                        // setTimeout(function () {
                        //     msg.fadeOut();
                        //     $('#depart_name').val('')
                        // }, 2000);
                    }
                }
            )
        }
    });
    $('#updateDepart').on('click',function () {
        var depart_name=$('#depart_name');
        var companyId=$('#companyId');
        var departId=$('#departId').val();
        var msg=$('#departMessage');
        if(isNotEmpty(depart_name) && isNotEmpty(companyId)){
            $.ajax(
                {
                    url:'editDepartment.php',
                    method:'POST',
                    dataType:'text',
                    data:{
                        departId:departId,
                        depart_name:depart_name.val(),
                        companyId:companyId.val()
                    },
                    success:function (response) {
                        msg.html(response);
                        msg.fadeIn(10).fadeOut(3000);
                        // setTimeout(function () {
                        //     msg.fadeOut();
                        // }, 2000);
                    }
                }
            )
        }
    });

    $('#addDocument').on('click',function () {
        var form=$('#documentForm');
        var msg=$('#message');
        var title=$('#title')
        var description=$('#description')
        var company=$('#company')
        var department=$('#department')
        var document=$('#document')
        var formData = new FormData(form[0]);
        if(isNotEmpty(title) && isNotEmpty(description) && isNotEmpty(company) && isNotEmpty(department) && isNotEmpty(document)){
            msg.html('<i class="btn btn-success">Loading...</i>');
            $.ajax(
                {
                    url:'addDocument.php',
                    method:'POST',
                    dataType:'text',
                    enctype:'multipart/form-data',
                    data:formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    cache: false,
                    success:function (response) {
                        msg.html(response);
                        msg.fadeIn(10).fadeOut(3000);
                        $("#documentForm")[0].reset();
                        // setTimeout(function() {
                        //     msg.fadeToggle();
                        //     // $('#title, #description,#document').val('')
                        // }, 4000 );
                    }
                }
            )
        }
    });
    $('#departmentForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            depart_name: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply Department Name'
                    }
                }
            },
            companyId: {
                validators: {
                    // stringLength: {
                    //     min: 2,
                    // },
                    notEmpty: {
                        message: 'Please supply Company Name'
                    }
                }
            }

        }

    });
    $('#companyForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply Company Name'
                    }
                }
            }
        }
    });
    $('#registerForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields:{
            fname: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply First Name'
                    }
                }
            },
            lname: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply Last Name'
                    }
                }
            },
            email: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply Email Address'
                    },
                    emailAddress: {
                        message: 'The value is not a valid email address'
                    }
                }
            },
            company: {
                validators: {
                    // stringLength: {
                    //     min: 2,
                    // },
                    notEmpty: {
                        message: 'Please supply Company'
                    }
                }
            },
            department: {
                validators: {
                    // stringLength: {
                    //     min: 2,
                    // },
                    notEmpty: {
                        message: 'Please supply Department'
                    }
                }
            }

        }
    });
    $('#documentForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            title: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply Title'
                    }
                }
            },
            description: {
                validators: {
                    stringLength: {
                        min: 10,
                        max: 1000,
                        message:'Please enter at least 10 characters and no more than 200'
                    },
                    notEmpty: {
                        message: 'Please supply a document description'
                    }
                }
            },
            company: {
                validators: {
                    // stringLength: {
                    //     min: 2,
                    // },
                    notEmpty: {
                        message: 'Please supply Company'
                    }
                }
            },
            department: {
                validators: {
                    // stringLength: {
                    //     min: 2,
                    // },
                    notEmpty: {
                        message: 'Please supply Department'
                    }
                }
            },
            document: {
                validators: {
                    stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply A file to be uploaded'
                    }
                }
            }
        }
    });
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


