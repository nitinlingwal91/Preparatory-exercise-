$(document).ready(function() {
    $('.editbtn').click(function() {
        var id = $(this).data('id');
        $('.edit_user_id').val(id);
        $('#editModal').modal('show');
    });
});