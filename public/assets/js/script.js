$('#formId').submit(function(e){
    e.preventDefault();
    var redirectUrl = $(this).data('route');
    var storeUrl = $(this).attr('action');
    var formData = $(this).serialize();
    $.ajax({
        type: "POST",
        url: storeUrl,
        data: formData,
        success:function(res){
            alert(res.message);
            window.location.href = redirectUrl;
        },
        error:function(error){
            err = error.responseJSON;
            alert(err.message);
        }
    });
});

//======================================
// delete item code
var delete_id = 0;
var deleteUrl = '';
$('.deleteItem').on('click',function(){
    deleteUrl = $(this).data('href');
    delete_id = $(this).data('id');
});

$('#deleteFormId').submit(function(e){
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: deleteUrl,
        data: {'_token':$("meta[name='csrf-token']").attr('content')},
        success:function(res){
            alert(res.message);
            $('#remove_'+delete_id).remove();
        },
        error:function(error){
            err = error.responseJSON;
            alert(err.message);
        }
    });
});
// ======================================

