

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "links/link.php" ?>
    <style>
        <?php include "css/custom.css" ?>
    </style>
    <title>Delete page</title>
</head>

<body>
    <?php
    include "conn/connection.php";

    $id = $_GET['id'];
    
    $sql = "DELETE FROM book_data WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die('Error deleting record: ' . mysqli_error($con));
    }else{
    ?> 
    <script>
        alert ('Record deleted successfully');
        
    </script>
            
    <?php
    header("location: index.php");
    }
    


    ?>
</body>

</html>