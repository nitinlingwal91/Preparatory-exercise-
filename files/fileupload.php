<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <?php include "links/link.php" ?>
    <style><?php include "css/custom.css"?></style>
    <title>fileupload</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="uploadfile"><br><br>
        <input type="submit" name="submit" value="Upload File">

 
    </form>
</body>
</html>
<?php


// $filename = $_FILES["uploadfile"]["name"];
// $tempname = $_FILES["uploadfile"]["tmp_name"];
// $folder = "images/".$filename;
// echo $folder;

// move_uploaded_file($tempname, $folder);



// print_r($_FILES["uploadfile"]);

?>
<img src= echo $folder hight="100px" width="100px"; -->


<div class="container col-md-6">
                                    <img id="frame" src="" class="img-fluid" />
                                        <div class="mb-5">
                                            <label for="Image" class="form-label"></label>
                                            <input class="form-control" type="file" id="formFile" onchange="preview()">
                                            <button onclick="clearImage()" class="btn btn-primary mt-3">upload</button>
                                        </div>
                                        
                                    </div>

                                    <script>
                                        function preview() {
                                            frame.src = URL.createObjectURL(event.target.files[0]);
                                        }

                                        function clearImage() {
                                            document.getElementById('formFile').value = null;
                                            frame.src = "";
                                        }
                                    </script>