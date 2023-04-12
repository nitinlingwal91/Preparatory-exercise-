const editBtns = document.querySelectorAll('.editbtn');

  editBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const id = btn.dataset.id;
      const formId = document.getElementById('id');
      formId.value = id;
    });
  });

  
$(document).ready(function() {
    $('.editbtn').click(function() {
        var id = $(this).data('id');
        $.ajax({
            url: '../controller/update.con.php',
            type: 'POST',
            data: {id: id},
            success: function(response) {
                var data = JSON.parse(response);
                $('#edit_id').val(data.id);
                $('#edit_fname').val(data.user_fname);
                $('#edit_lname').val(data.user_lname);
                $('#edit_email').val(data.user_email);
                $('#role').val(data.user_role);
                $('#editModal').modal('show');
            }
        });
    });
});

