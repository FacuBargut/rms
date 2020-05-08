<?php
    include "../../class/usuario.php";
    $user = $_POST['user'];
    $idUser = $_POST['idUser'];
    $update = usuario::modifyUserFromAdmin($user,$idUser);
    
    echo $update; 

    // newUserName, newUserSurname, newUserMail, newUserPassword, newUserActive, newUserAdmin,newUserTelephone


?>