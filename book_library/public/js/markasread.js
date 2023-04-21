function wishlist(id, book_id){
    $.ajax({
        url : '../view/wishlist.view.php',
        type : 'POST',
        data : 'id=' + id + '&book_id=' + book_id,
        success : function(result){
            if(result == 'not_login'){
                window.location.href='../controller/auth/reader_login.php';
            }
        }
    });
}