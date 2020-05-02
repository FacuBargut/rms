<?php

if($_FILES["file"]["name"] != ""){
   $test = explode(".", $_FILES["file"]["name"]);
   $extension = end($test);
   $name = rand(100,999).'.'.$extension;
   $location = '../../img/upload/'.$name;
   // $location = substr($location,3);
   move_uploaded_file($_FILES["file"]["tmp_name"],$location);
   echo '<img src="'.substr($location,3).'" height="150" width="225" class="img-thumbail"/>'  ;
   // echo $location;
}

?>