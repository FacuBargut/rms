<?php

/* Getting file name */
$filename = $_FILES['file']['name'];

/* Location */
$location = "img/".$filename;
$uploadOk = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);

/* Valid Extensions */
$valid_extensions = array("jpg","jpeg","png");
/* Check file extension */
if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
   $uploadOk = 0;
}

if($uploadOk == 0){
   echo 0;
}else{
   /* Upload file */
   if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
      echo $location;
   }else{
      echo 0;
   }
}


// $targetDir = "D:\phppot_uploads";
// if(is_array($_FILES)) {
// if(is_uploaded_file($_FILES['myfile']['tmp_name'])) {
// if(move_uploaded_file($_FILES['myfile']['tmp_name'],"$targetDir/".$_FILES['myfile']['name'])) {
// echo "File uploaded successfully";
// }
// }
// }

?>