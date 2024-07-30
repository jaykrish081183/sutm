$(document).ready(function(){
    setTimeout(function() { $("div.alert").hide(); }, 3000);
    var form = '#contact-form';
    $(form).on('submit',function(event){
        event.preventDefault();
        var url = $(this).attr('data-action');
        $.ajax({
            url: url,
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(result){
                if(result.errors)
                {
                    $('#cotact_us_danger').html('');
                    $.each(result.errors, function(key, value){
                        $('#cotact_us_danger').show();
                        $('#cotact_us_danger').append('<li>'+value+'</li>');
                    });
                    setTimeout(function() { $('#cotact_us_danger').hide(); }, 3000);
                }
                else
                {
                    $('#cotact_us_success').show();
                    $('#cotact_us_success').append('<li>'+result.success+'</li>');
                    $('#cotact_us_danger').hide();
                    $('#contact-form')[0].reset();
                    setTimeout(function() { $("#cotact_us_success").hide(); }, 3000);
                }
            }
        });
    })
});
