$(document).ready(function() {
    $('.deletebtn').click(function() {
        var id = $(this).data('id');
        $('.delete_user_id').val(id);
        $('#DeleteModal').modal('show');
    });
});

