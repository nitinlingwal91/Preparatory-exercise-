$(document).ready(function() {
  
  $('.editbtn').on('click', function() {
    
    var id = $(this).data('id');
    
    
    $('#editModal input[name="id"]').val(id);
  });
});