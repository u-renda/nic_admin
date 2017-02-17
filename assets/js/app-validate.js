$(function () {
    // Member Create
    if (document.getElementById('member_create_page') != null) {
        $("#the_form").validate({
            rules: {
                idcard_type: "required",
                idcard_address: "required",
                shipment_address: "required",
                id_provinsi: "required",
                id_kota: "required",
                birth_place: "required",
                birth_date: "required",
                shirt_size: "required",
                status: "required",
                name: {
                    required: true,
                    remote: {
                        url: "check_member_name",
                        type: "post",
                        data: {
                            name: function() {
                                return $("#name").val();
                            }
                        }
                    }
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "check_member_email",
                        type: "post",
                        data: {
                            email: function() {
                                return $("#email").val();
                            }
                        }
                    }
                },
                idcard_number: {
                    required: true,
                    digits: true,
                    remote: {
                        url: "check_member_idcard_number",
                        type: "post",
                        data: {
                            idcard_number: function() {
                                return $("#idcard_number").val();
                            }
                        }
                    }
                },
                postal_code: {
                    required: true,
                    digits: true
                },
                phone_number: {
                    required: true,
                    digits: true,
                    remote: {
                        url: "check_member_phone_number",
                        type: "post",
                        data: {
                            phone_number: function() {
                                return $("#phone_number").val();
                            }
                        }
                    }
                }
            },
            messages: {
                name: {
                    remote:"Name already exist."
                },
                email: {
                    remote: "Email already exist."
                },
                idcard_number: {
                    remote: "ID card number already exist."
                },
                phone_number: {
                    remote: "Phone number already exist."
                }
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                id = element.attr('id');
                error.appendTo($('#errorbox_'+id));
            },
            submitHandler: function(form) {
                $('.modal-title').text('Please wait...');
                $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
                $('.modal-dialog').addClass('modal-sm');
                $('#myModal').modal('show');
                $.ajax(
                {
                    type: "POST",
                    url: form.action,
                    data: $(form).serialize(), 
                    cache: false,
                    success: function(data)
                    {
                        $('#myModal').modal('hide');
                        var response = $.parseJSON(data);
                        
                        noty({dismissQueue: true, force: true, layout: 'top', theme: 'defaultTheme', text: response.msg, type: response.type, timeout: 2000});
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
                return false;
            }
        });
    }
    
    // Member Edit
    if (document.getElementById('member_edit_page') != null) {
        $("#the_form").validate({
            rules: {
                idcard_type: "required",
                idcard_address: "required",
                shipment_address: "required",
                id_provinsi: "required",
                id_kota: "required",
                birth_place: "required",
                birth_date: "required",
                shirt_size: "required",
                status: "required",
                name: {
                    required: true,
                    remote: {
                        url: "check_member_name",
                        type: "post",
                        data: {
                            name: function() {
                                return $("#name").val();
                            },
                            selfname: function() {
                                return $("#selfname").val();
                            }
                        }
                    }
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "check_member_email",
                        type: "post",
                        data: {
                            email: function() {
                                return $("#email").val();
                            },
                            selfemail: function() {
                                return $("#selfemail").val();
                            }
                        }
                    }
                },
                idcard_number: {
                    required: true,
                    digits: true,
                    remote: {
                        url: "check_member_idcard_number",
                        type: "post",
                        data: {
                            idcard_number: function() {
                                return $("#idcard_number").val();
                            },
                            selfidcard_number: function() {
                                return $("#selfidcard_number").val();
                            }
                        }
                    }
                },
                postal_code: {
                    required: true,
                    digits: true
                },
                phone_number: {
                    required: true,
                    digits: true,
                    remote: {
                        url: "check_member_phone_number",
                        type: "post",
                        data: {
                            phone_number: function() {
                                return $("#phone_number").val();
                            },
                            selfphone_number: function() {
                                return $("#selfphone_number").val();
                            }
                        }
                    }
                }
            },
            messages: {
                name: {
                    remote:"Name already exist."
                },
                email: {
                    remote: "Email already exist."
                },
                idcard_number: {
                    remote: "ID card number already exist."
                },
                phone_number: {
                    remote: "Phone number already exist."
                }
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                id = element.attr('id');
                error.appendTo($('#errorbox_'+id));
            },
            submitHandler: function(form) {
                $('.modal-title').text('Please wait...');
                $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
                $('.modal-dialog').addClass('modal-sm');
                $('#myModal').modal('show');
                $.ajax(
                {
                    type: "POST",
                    url: form.action,
                    data: $(form).serialize(), 
                    cache: false,
                    success: function(data)
                    {
                        console.log(data);
                        $('#myModal').modal('hide');
                        var response = $.parseJSON(data);
                        
                        noty({dismissQueue: true, force: true, layout: 'top', theme: 'defaultTheme', text: response.msg, type: response.type, timeout: 2000});
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
                return false;
            }
        });
    }
    
    // Post Create
    if (document.getElementById('post_create_page') != null) {
        $("#the_form").validate({
            rules: {
                title: "required",
                status: "required",
                type: "required",
                is_event: "required",
                content: "required"
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                id = element.attr('id');
                error.appendTo($('#errorbox_'+id));
            },
            submitHandler: function(form) {
                tinyMCE.triggerSave();
                $('.modal-title').text('Please wait...');
                $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
                $('.modal-dialog').addClass('modal-sm');
                $('#myModal').modal('show');
                $.ajax(
                {
                    type: "POST",
                    url: form.action,
                    data: $(form).serialize(), 
                    cache: false,
                    success: function(data)
                    {
                        $('#myModal').modal('hide');
                        var response = $.parseJSON(data);
                        noty({dismissQueue: true, force: true, layout: 'top', theme: 'defaultTheme', text: response.msg, type: response.type, timeout: 2000});
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
                return false;
            }
        });
        
        $('.date-picker').datepicker({
            orientation: "auto left",
            format: "dd M yyyy",
            setDate: new Date(),
            autoclose: true,
            todayHighlight: true
        });
        
		$(".image_option").hide();
        $(".video_option").hide();
        $('.media').change(function() {
            if (this.value == 'image') {
                $(".image_option").show();
                $(".video_option").hide();
            }
            else if (this.value == 'video') {
                $(".video_option").show();
                $(".image_option").hide();
            }
			else {
				$(".image_option").hide();
				$(".video_option").hide();
			}
        });
    }
    
    // Post Edit
    if (document.getElementById('post_edit_page') != null) {
        $("#the_form").validate({
            rules: {
                title: "required",
                status: "required",
                type: "required",
                is_event: "required",
                content: "required"
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                id = element.attr('id');
                error.appendTo($('#errorbox_'+id));
            },
            submitHandler: function(form) {
                tinyMCE.triggerSave();
                $('.modal-title').text('Please wait...');
                $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
                $('.modal-dialog').addClass('modal-sm');
                $('#myModal').modal('show');
                $.ajax(
                {
                    type: "POST",
                    url: form.action,
                    data: $(form).serialize(), 
                    cache: false,
                    success: function(data)
                    {
                        $('#myModal').modal('hide');
                        var response = $.parseJSON(data);
                        noty({dismissQueue: true, force: true, layout: 'top', theme: 'defaultTheme', text: response.msg, type: response.type, timeout: 2000});
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
                return false;
            }
        });
        
        $('.date-picker').datepicker({
            orientation: "auto left",
            format: "dd M yyyy",
            autoclose: true
        });
        
        $('#change_media').hide();
        $('#change_image').hide();
        $('#change_video').hide();
        $('#checkboxMedia').click(function(){
            if($(this).is(":checked")) {
                $('#change_media').show();
                $('input[type="radio"]').click(function(){
                    if($(this).attr("value")=="image"){
                        $('#change_image').show();
                        $('#change_video').hide();
                    } else if($(this).attr("value")=="video"){
                        $('#change_image').hide();
                        $('#change_video').show();
                    } else {
                        $('#change_image').hide();
                        $('#change_video').hide();
                    }
                });
            } else {
                $('#change_media').hide();
            }
        });
    }
    
    // Event Create
    if (document.getElementById('event_create_page') != null) {
        $("#the_form").validate({
            rules: {
                title: "required",
                status: "required",
                date: "required"
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                id = element.attr('id');
                error.appendTo($('#errorbox_'+id));
            },
            submitHandler: function(form) {
                $('.modal-title').text('Please wait...');
                $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
                $('.modal-dialog').addClass('modal-sm');
                $('#myModal').modal('show');
                $.ajax(
                {
                    type: "POST",
                    url: form.action,
                    data: $(form).serialize(), 
                    cache: false,
                    success: function(data)
                    {
                        $('#myModal').modal('hide');
                        var response = $.parseJSON(data);
                        noty({dismissQueue: true, force: true, layout: 'top', theme: 'defaultTheme', text: response.msg, type: response.type, timeout: 2000});
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
                return false;
            }
        });
    }
    
    // Product Create
    if (document.getElementById('product_create_page') != null) {
        $("#the_form").validate({
            rules: {
                photo: "required",
                description: "required",
                status: "required",
                name: {
                    required: true,
                    remote: {
                        url: "check_product_name",
                        type: "post",
                        data: {
                            name: function() {
                                return $("#name").val();
                            }
                        }
                    }
                },
                price_public: {
                    required: true,
                    digits: true
                },
                price_member: {
                    required: true,
                    digits: true
                },
                quantity: {
                    required: true,
                    digits: true
                }
            },
            messages: {
                name: {
                    remote:"Name already exist."
                }
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                id = element.attr('id');
                error.appendTo($('#errorbox_'+id));
            },
            submitHandler: function(form) {
                $('.modal-title').text('Please wait...');
                $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
                $('.modal-dialog').addClass('modal-sm');
                $('#myModal').modal('show');
                $.ajax(
                {
                    type: "POST",
                    url: form.action,
                    data: $(form).serialize(), 
                    cache: false,
                    success: function(data)
                    {
                        $('#myModal').modal('hide');
                        var response = $.parseJSON(data);
                        noty({dismissQueue: true, force: true, layout: 'top', theme: 'defaultTheme', text: response.msg, type: response.type, timeout: 2000});
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
                return false;
            }
        });
    }
    
    // Admin Create
    if (document.getElementById('admin_create_page') != null) {
        $("#the_form").validate({
            rules: {
                username: "required",
                name: {
                    required: true,
                    remote: {
                        url: "check_admin_name",
                        type: "post",
                        data: {
                            name: function() {
                                return $("#name").val();
                            }
                        }
                    }
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "check_admin_email",
                        type: "post",
                        data: {
                            email: function() {
                                return $("#email").val();
                            }
                        }
                    }
                },
                password: {
                    required: true,
                    minlength: 6
                },
                initial: {
                    required: true,
                    maxlength: 1,
                    remote: {
                        url: "check_admin_initial",
                        type: "post",
                        data: {
                            initial: function() {
                                return $("#initial").val();
                            }
                        }
                    }
                }
            },
            messages: {
                name: {
                    remote:"Name already exist."
                },
                email: {
                    remote:"Email already exist."
                },
                initial: {
                    remote:"Initial already exist."
                },
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                id = element.attr('id');
                error.appendTo($('#errorbox_'+id));
            },
            submitHandler: function(form) {
                $('.modal-title').text('Please wait...');
                $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
                $('.modal-dialog').addClass('modal-sm');
                $('#myModal').modal('show');
                $.ajax(
                {
                    type: "POST",
                    url: form.action,
                    data: $(form).serialize(), 
                    cache: false,
                    success: function(data)
                    {
                        $('#myModal').modal('hide');
                        var response = $.parseJSON(data);
                        noty({dismissQueue: true, force: true, layout: 'top', theme: 'defaultTheme', text: response.msg, type: response.type, timeout: 2000});
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
                return false;
            }
        });
    }
    
    // Admin Edit
    if (document.getElementById('admin_edit_page') != null) {
        $("#the_form").validate({
            rules: {
                username: "required",
                name: {
                    required: true,
                    remote: {
                        url: "check_admin_name",
                        type: "post",
                        data: {
                            name: function() {
                                return $("#name").val();
                            }
                        }
                    }
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "check_admin_email",
                        type: "post",
                        data: {
                            email: function() {
                                return $("#email").val();
                            }
                        }
                    }
                },
                password: {
                    required: true,
                    minlength: 6
                },
                initial: {
                    required: true,
                    maxlength: 1,
                    remote: {
                        url: "check_admin_initial",
                        type: "post",
                        data: {
                            initial: function() {
                                return $("#initial").val();
                            }
                        }
                    }
                }
            },
            messages: {
                name: {
                    remote:"Name already exist."
                },
                email: {
                    remote:"Email already exist."
                },
                initial: {
                    remote:"Initial already exist."
                },
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                id = element.attr('id');
                error.appendTo($('#errorbox_'+id));
            },
            submitHandler: function(form) {
                $('.modal-title').text('Please wait...');
                $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
                $('.modal-dialog').addClass('modal-sm');
                $('#myModal').modal('show');
                $.ajax(
                {
                    type: "POST",
                    url: form.action,
                    data: $(form).serialize(), 
                    cache: false,
                    success: function(data)
                    {
                        $('#myModal').modal('hide');
                        var response = $.parseJSON(data);
                        noty({dismissQueue: true, force: true, layout: 'top', theme: 'defaultTheme', text: response.msg, type: response.type, timeout: 2000});
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
                return false;
            }
        });
    }
    
    // Image Album Create
    if (document.getElementById('image_album_create_page') != null) {
        $("#the_form").validate({
            rules: {
                name: "required",
                date: "required"
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                id = element.attr('id');
                error.appendTo($('#errorbox_'+id));
            },
            submitHandler: function(form) {
                $('.modal-title').text('Please wait...');
                $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
                $('.modal-dialog').addClass('modal-sm');
                $('#myModal').modal('show');
                $.ajax(
                {
                    type: "POST",
                    url: form.action,
                    data: $(form).serialize(), 
                    cache: false,
                    success: function(data)
                    {
                        $('#myModal').modal('hide');
                        var response = $.parseJSON(data);
                        noty({dismissQueue: true, force: true, layout: 'top', theme: 'defaultTheme', text: response.msg, type: response.type, timeout: 2000});
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
                return false;
            }
        });
    }
    
    // FAQ Create
    if (document.getElementById('faq_create_page') != null) {
        $("#the_form").validate({
            rules: {
                question: "required",
                answer: "required"
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                id = element.attr('id');
                error.appendTo($('#errorbox_'+id));
            },
            submitHandler: function(form) {
                $('.modal-title').text('Please wait...');
                $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
                $('.modal-dialog').addClass('modal-sm');
                $('#myModal').modal('show');
                $.ajax(
                {
                    type: "POST",
                    url: form.action,
                    data: $(form).serialize(), 
                    cache: false,
                    success: function(data)
                    {
                        $('#myModal').modal('hide');
                        var response = $.parseJSON(data);
                        noty({dismissQueue: true, force: true, layout: 'top', theme: 'defaultTheme', text: response.msg, type: response.type, timeout: 2000});
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
                return false;
            }
        });
    }
    
    // Preferences Create
    if (document.getElementById('preferences_create_page') != null) {
        $("#the_form").validate({
            rules: {
                key: "required",
                value: "required"
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                id = element.attr('id');
                error.appendTo($('#errorbox_'+id));
            },
            submitHandler: function(form) {
                tinyMCE.triggerSave();
                $('.modal-title').text('Please wait...');
                $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
                $('.modal-dialog').addClass('modal-sm');
                $('#myModal').modal('show');
                $.ajax(
                {
                    type: "POST",
                    url: form.action,
                    data: $(form).serialize(), 
                    cache: false,
                    success: function(data)
                    {
                        $('#myModal').modal('hide');
                        var response = $.parseJSON(data);
                        noty({dismissQueue: true, force: true, layout: 'top', theme: 'defaultTheme', text: response.msg, type: response.type, timeout: 2000});
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
                return false;
            }
        });
    }
    
    // Preferences Edit
    if (document.getElementById('preferences_edit_page') != null) {
        $("#the_form").validate({
            rules: {
                key: "required",
                value: "required"
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                id = element.attr('id');
                error.appendTo($('#errorbox_'+id));
            },
            submitHandler: function(form) {
                tinyMCE.triggerSave();
                $('.modal-title').text('Please wait...');
                $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
                $('.modal-dialog').addClass('modal-sm');
                $('#myModal').modal('show');
                $.ajax(
                {
                    type: "POST",
                    url: form.action,
                    data: $(form).serialize(), 
                    cache: false,
                    success: function(data)
                    {
                        $('#myModal').modal('hide');
                        var response = $.parseJSON(data);
                        noty({dismissQueue: true, force: true, layout: 'top', theme: 'defaultTheme', text: response.msg, type: response.type, timeout: 2000});
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
                return false;
            }
        });
    }
    
    // Member Transfer Edit
    if (document.getElementById('member_transfer_edit_page') != null) {
        $("#the_form").validate({
            rules: {
                date: "required",
                account_name: "required",
                status: "required"
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                id = element.attr('id');
                error.appendTo($('#errorbox_'+id));
            },
            submitHandler: function(form) {
                tinyMCE.triggerSave();
                $('.modal-title').text('Please wait...');
                $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
                $('.modal-dialog').addClass('modal-sm');
                $('#myModal').modal('show');
                $.ajax(
                {
                    type: "POST",
                    url: form.action,
                    data: $(form).serialize(), 
                    cache: false,
                    success: function(data)
                    {
                        $('#myModal').modal('hide');
                        var response = $.parseJSON(data);
                        noty({dismissQueue: true, force: true, layout: 'top', theme: 'defaultTheme', text: response.msg, type: response.type, timeout: 2000});
                        if (response.type == 'success')
                        {
                            setTimeout("location.href = '"+response.location+"'",2000);
                        }
                    }
                });
                return false;
            }
        });
        
        $('.date-picker').datepicker({
            orientation: "auto left",
            format: "dd M yyyy",
            setDate: new Date(),
            autoclose: true,
            todayHighlight: true
        });
    }
});

/*
 * Upload image
 */
(function($) {
    // Post Create
	if (document.getElementById('post_create_page') != null) {
		$("#photo").fileinput({
			'showUpload':false,
			'showRemove': false,
			'uploadUrl': newPathname + 'upload_image',
			'previewZoomSettings': {
				image: { width: "auto", height: "auto" }
			},
			'previewZoomButtonIcons': {
				prev: '',
				next: '',
			},
			'uploadExtraData': {
				watermark: 'true',
				type: 'post'
			},
			'allowedFileTypes': ['image'],
			'dropZoneEnabled': false,
			'uploadAsync': true,
			'maxFileCount': 1,
            'autoReplace': true,
		}).on('fileuploaded', function(event, data, previewId, index) {
			var form = data.form, files = data.files, extra = data.extra,
				response = data.response, reader = data.reader;
			var div = $('#div_photo');
			div.append('<input type="hidden" name="photo" id="input_photo" value="'+response.image+'">');
		}).on('fileclear', function(event) {
			$("#input_photo").remove();
		});
	}
    
    // Admin Create
	if (document.getElementById('admin_create_page') != null) {
        $("#photo").fileinput({
			'showUpload':false,
			'showRemove': false,
			'uploadUrl': newPathname + 'upload_image',
			'previewZoomSettings': {
				image: { width: "auto", height: "auto" }
			},
			'previewZoomButtonIcons': {
				prev: '',
				next: '',
			},
			'uploadExtraData': {
				watermark: 'false',
				type: 'admin'
			},
			'allowedFileTypes': ['image'],
			'dropZoneEnabled': false,
			'uploadAsync': true,
			'maxFileCount': 1,
            'autoReplace': true,
		}).on('fileuploaded', function(event, data, previewId, index) {
			var form = data.form, files = data.files, extra = data.extra,
				response = data.response, reader = data.reader;
			var div = $('#div_photo');
			div.append('<input type="hidden" name="photo" id="input_photo" value="'+response.image+'">');
		}).on('fileclear', function(event) {
			$("#input_photo").remove();
		});
    }
    
    // Member Create
	if (document.getElementById('member_create_page') != null) {
		$("#idcard_photo").fileinput({
			'showUpload': false,
			'showRemove': false,
			'uploadUrl': newPathname + 'upload_image',
			'previewZoomSettings': {
				image: { width: "auto", height: "auto" }
			},
			'previewZoomButtonIcons': {
				prev: '',
				next: '',
			},
			'uploadExtraData': {
				watermark: 'false',
				type: 'member'
			},
			'allowedFileTypes': ['image'],
			'dropZoneEnabled': false,
			'uploadAsync': true,
			'maxFileCount': 1,
            'autoReplace': true,
		}).on('fileuploaded', function(event, data, previewId, index) {
			var form = data.form, files = data.files, extra = data.extra,
				response = data.response, reader = data.reader;
			var div = $('#div_idcard');
			div.append('<input type="hidden" name="idcard_photo" id="input_idcard" value="'+response.image+'">');
		}).on('fileclear', function(event) {
			$("#input_idcard").remove();
		});
		
		$("#photo").fileinput({
			'showUpload':false,
			'showRemove': false,
			'uploadUrl': newPathname + 'upload_image',
			'previewZoomSettings': {
				image: { width: "auto", height: "auto" }
			},
			'previewZoomButtonIcons': {
				prev: '',
				next: '',
			},
			'uploadExtraData': {
				watermark: 'false',
				type: 'member'
			},
			'allowedFileTypes': ['image'],
			'dropZoneEnabled': false,
			'uploadAsync': true,
			'maxFileCount': 1,
            'autoReplace': true,
		}).on('fileuploaded', function(event, data, previewId, index) {
			var form = data.form, files = data.files, extra = data.extra,
				response = data.response, reader = data.reader;
			var div = $('#div_photo');
			div.append('<input type="hidden" name="photo" id="input_photo" value="'+response.image+'">');
		}).on('fileclear', function(event) {
			$("#input_photo").remove();
		});
        
        $('.date-picker').datepicker({
            orientation: "auto left",
            format: "dd M yyyy",
            autoclose: true,
            todayHighlight: true
        });
        
		$("#id_provinsi").change(function() {
			var id_provinsi = $(this).find("option:selected").attr("id");
			var dataString = 'id_provinsi='+ id_provinsi
			$.ajax({
				url: 'extra/check_kota_lists',
				type: "POST",
				data: dataString,
				beforeSend : function (){
					$('#id_kota').html('<i class="fa fa-spinner fa-spin"></i>');
				},
				success: function(data) {
					$('#id_kota').html(data);
				},
				error: function(data){
				}
			});
		});
	}
    
    // Member Edit
    if (document.getElementById('member_edit_page') != null) {
        $("#idcard_photo").fileinput({
			'showUpload': false,
			'showRemove': false,
			'uploadUrl': newPathname + 'upload_image',
			'previewZoomSettings': {
				image: { width: "auto", height: "auto" }
			},
			'previewZoomButtonIcons': {
				prev: '',
				next: '',
			},
			'uploadExtraData': {
				watermark: 'false',
				type: 'member'
			},
			'allowedFileTypes': ['image'],
			'dropZoneEnabled': false,
			'uploadAsync': true,
			'maxFileCount': 1,
            'autoReplace': true,
		}).on('fileuploaded', function(event, data, previewId, index) {
			var form = data.form, files = data.files, extra = data.extra,
				response = data.response, reader = data.reader;
			$("#default_idcard_photo").remove();
            var div = $('#change_idcard_photo');
			div.append('<input type="hidden" name="idcard_photo" id="input_idcard" value="'+response.image+'">');
		}).on('fileclear', function(event) {
			$("#input_idcard").remove();
		});
		
		$("#photo").fileinput({
			'showUpload':false,
			'showRemove': false,
			'uploadUrl': newPathname + 'upload_image',
			'previewZoomSettings': {
				image: { width: "auto", height: "auto" }
			},
			'previewZoomButtonIcons': {
				prev: '',
				next: '',
			},
			'uploadExtraData': {
				watermark: 'false',
				type: 'member'
			},
			'allowedFileTypes': ['image'],
			'dropZoneEnabled': false,
			'uploadAsync': true,
			'maxFileCount': 1,
            'autoReplace': true,
		}).on('fileuploaded', function(event, data, previewId, index) {
			var form = data.form, files = data.files, extra = data.extra,
				response = data.response, reader = data.reader;
            $("#default_photo").remove();
            var div = $('#change_photo');
			div.append('<input type="hidden" name="photo" id="input_photo" value="'+response.image+'">');
		}).on('fileclear', function(event) {
			$("#input_photo").remove();
		});
		
		$("#transfer_photo2").fileinput({
			'showUpload':false,
			'showRemove': false,
			'uploadUrl': newPathname + 'upload_image',
			'previewZoomSettings': {
				image: { width: "auto", height: "auto" }
			},
			'previewZoomButtonIcons': {
				prev: '',
				next: '',
			},
			'uploadExtraData': {
				watermark: 'false',
				type: 'member'
			},
			'allowedFileTypes': ['image'],
			'dropZoneEnabled': false,
			'uploadAsync': true,
			'maxFileCount': 1,
            'autoReplace': true,
		}).on('fileuploaded', function(event, data, previewId, index) {
			var form = data.form, files = data.files, extra = data.extra,
				response = data.response, reader = data.reader;
            var div = $('#change_transfer_photo');
			div.append('<input type="hidden" name="transfer_photo2" id="input_transfer2" value="'+response.image+'">');
		}).on('fileclear', function(event) {
			$("#input_transfer2").remove();
		});
        
        $("#id_provinsi").change(function() {
			var id_provinsi = $(this).find("option:selected").attr("id");
			var dataString = 'id_provinsi='+ id_provinsi
			$.ajax({
				url: 'extra/check_kota_lists',
				type: "POST",
				data: dataString,
				beforeSend : function (){
					$('#id_kota').html('<i class="fa fa-spinner fa-spin"></i>');
				},
				success: function(data) {
					$('#id_kota').html(data);
				},
				error: function(data){
				}
			});
		});

        $('.date-picker').datepicker({
            orientation: "auto left",
            format: "dd M yyyy",
            autoclose: true
        });
        
        $('#change_photo').hide();
        $('#change_idcard_photo').hide();
        $('#change_password').hide();
        $('#change_transfer_photo').hide();
        $('#change_status').hide();
        
        $('#checkboxPhoto').click(function(){
            if($(this).is(":checked")){
                $('#change_photo').show();
            } else {
                $('#change_photo').hide();
            }
        });
        $('#checkboxIDcard').click(function(){
            if($(this).is(":checked")) {
                $('#change_idcard_photo').show();
            } else {
                $('#change_idcard_photo').hide();
            }
        });
        $('#checkboxPassword').click(function(){
            if($(this).is(":checked")) {
                $('#change_password').show();
            } else {
                $('#change_password').hide();
            }
        });
        $('#checkboxPhotoTransfer').click(function(){
            if($(this).is(":checked")) {
                $('#change_transfer_photo').show();
            } else {
                $('#change_transfer_photo').hide();
            }
        });
        
        $("#status").change(function() {
            if ($(this).val() == 3) {
                $('#change_status').show();
            }
            else
            {
                $('#change_status').hide();
            }
        });
    }
    
    // Member Transfer Edit
	if (document.getElementById('member_transfer_edit_page') != null) {
		$("#photo").fileinput({
			'showUpload':false,
			'showRemove': false,
			'uploadUrl': newPathname + 'upload_image',
			'previewZoomSettings': {
				image: { width: "auto", height: "auto" }
			},
			'previewZoomButtonIcons': {
				prev: '',
				next: '',
			},
			'uploadExtraData': {
				watermark: 'false',
				type: 'member_transfer'
			},
			'allowedFileTypes': ['image'],
			'dropZoneEnabled': false,
			'uploadAsync': true,
			'maxFileCount': 1,
            'autoReplace': true,
		}).on('fileuploaded', function(event, data, previewId, index) {
			var form = data.form, files = data.files, extra = data.extra,
				response = data.response, reader = data.reader;
			var div = $('#div_photo');
			div.append('<input type="hidden" name="photo" id="input_photo" value="'+response.image+'">');
		}).on('fileclear', function(event) {
			$("#input_photo").remove();
		});
	}
    
}).apply(this, [jQuery]);

function provinsi_create() {
    var grid = 'grid_provinsi';
	$.ajax(
	{
		type: "POST",
		url: newPathname + 'provinsi_create',
		data: '',
		cache: false,
		success: function(data)
		{
			$('.modal-dialog').addClass('modal-sm');
			$('.modal-dialog').removeClass('modal-lg');
			$('.modal-title').text('Provinsi Create');
			$('.modal-body').html(data);
			$('#myModal').modal('show');
            
            $("#the_form").validate({
                rules: {
                    provinsi: {
                        required: true,
                        remote: {
                            url: "check_provinsi",
                            type: "post",
                            data: {
                                provinsi: function() {
                                    return $("#provinsi").val();
                                }
                            }
                        }
                    }
                },
                messages: {
                    provinsi: {
                        remote:"Name already exist."
                    }
                },
                errorElement: "div",
                errorPlacement: function(error, element) {
                    id = element.attr('id');
                    error.appendTo($('#errorbox_'+id));
                },
                submitHandler: function(form) {
                    $('.modal-title').text('Please wait...');
                    $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
                    $('.modal-dialog').addClass('modal-sm');
                    $('#myModal').modal('show');
                    $.ajax(
                    {
                        type: "POST",
                        url: form.action,
                        data: $(form).serialize(), 
                        cache: false,
                        success: function(data)
                        {
                            $('#myModal').modal('hide');
                            var response = $.parseJSON(data);
                            $('#' + grid).data('kendoGrid').dataSource.read();
                            $('#' + grid).data('kendoGrid').refresh();
                            noty({dismissQueue: true, force: true, layout: 'top', theme: 'defaultTheme', text: response.msg, type: response.type, timeout: 2000});
                        }
                    });
                    return false;
                }
            });
		}
	});
	return false;
}

function kota_create() {
    var grid = 'grid_kota';
    var id = $("#create_button").val();
	$.ajax(
	{
		type: "POST",
		url: newPathname + 'kota_create',
		data: 'id=' + id,
		cache: false,
		success: function(data)
		{
			$('.modal-dialog').addClass('modal-sm');
			$('.modal-dialog').removeClass('modal-lg');
			$('.modal-title').text('Kota Create');
			$('.modal-body').html(data);
			$('#myModal').modal('show');
            
            $("#the_form").validate({
                rules: {
                    kota: {
                        required: true,
                        remote: {
                            url: "check_kota",
                            type: "post",
                            data: {
                                id_provinsi: function() {
                                    return id;
                                },
                                kota: function() {
                                    return $("#kota").val();
                                }
                            }
                        }
                    },
                    price: {
                        required: true,
                        digits: true
                    }
                },
                messages: {
                    kota: {
                        remote:"Name already exist."
                    }
                },
                errorElement: "div",
                errorPlacement: function(error, element) {
                    id = element.attr('id');
                    error.appendTo($('#errorbox_'+id));
                },
                submitHandler: function(form) {
                    $('.modal-title').text('Please wait...');
                    $('.modal-body').html('<i class="fa fa-spinner fa-spin" style="font-size: 34px;"></i>');
                    $('.modal-dialog').addClass('modal-sm');
                    $('#myModal').modal('show');
                    $.ajax(
                    {
                        type: "POST",
                        url: form.action,
                        data: $(form).serialize(), 
                        cache: false,
                        success: function(data)
                        {
                            $('#myModal').modal('hide');
                            var response = $.parseJSON(data);
                            $('#' + grid).data('kendoGrid').dataSource.read();
                            $('#' + grid).data('kendoGrid').refresh();
                            noty({dismissQueue: true, force: true, layout: 'top', theme: 'defaultTheme', text: response.msg, type: response.type, timeout: 2000});
                        }
                    });
                    return false;
                }
            });
		}
	});
	return false;
}