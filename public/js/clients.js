$(document).ready(function () {
    $('#stalltype_id').on('change', function () {
        var stallTypeId = $(this).val();
        if (stallTypeId) {
            $.ajax({
                url: '/get-stall-numbers/' + stallTypeId,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#stall_number_id').empty();
                    if (data) {
                        $.each(data, function (key, value) {
                            $('#stall_number_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    } else {
                        $('#stall_number_id').append('<option value="">No Stall Numbers Found</option>');
                    }
                }
            });
        } else {
            $('#stall_number_id').empty();
            $('#stall_number_id').append('<option value="">Select Stall Number</option>');
        }
    });
});