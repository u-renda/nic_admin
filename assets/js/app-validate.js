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
});

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