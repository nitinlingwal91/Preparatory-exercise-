function wishlist(id,book_id){
    jquery.ajax({
        url : '../view/wishlist.view.php',
        type : 'post',
        data : 'id = '+id+'&book_id='+book_id,
        success : function(result){
            if(type == 'not_login'){
                window.location.href='../controller/auth/reader_login.php';
            }
            
        }
    });
}