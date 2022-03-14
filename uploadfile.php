<?php      
class UploadFile{
    public function upload(){
        $target_dir = "image/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "<script>alert('Sorry, only JPG, JPEG, PNG files are allowed.')</script>";
            return null;
        }

        if ($_FILES["file"]["size"] > 2097152) {
            echo "<script>alert('Sorry, your file is too large.')</script>";
            return null;
        }

        $file = move_uploaded_file($_FILES["file"]["tmp_name"],  $target_file);
        return  $target_file;
    }
}
