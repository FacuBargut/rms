<?php

        session_start();
        if(isset($_SESSION['usuario'])){
            echo "Usuario logueado";
        }else{
            echo "Usuario aun no se logeo";
        }