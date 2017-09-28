$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#update_form').on('click', function () {

        var first_name = $("input[name='first_name']").val();
        var last_name = $("input[name='last_name']").val();
        var work_number = $("input[name='work_number']").val();
        var private_number = $("input[name='private_number']").val();

        $.ajax({
            url: "{{ $profile->id }}" + '/update',
            type: 'POST',
            dataType: 'json',
            data: {first_name: first_name, last_name: last_name,
                work_number: work_number, private_number: private_number},
            success: function (data) {
                // if ($.isEmptyObject(data.error)) {
                //  alert(data.success);
                // }else{
                //  printErrorMsg(data.error);
                //}
            }
        });

    });

});


