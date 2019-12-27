<?php

        include "../../class/producto.php";
        include "../../class/usuario.php";
        session_start();


        $userID =  $_SESSION['usuario']->getID();


        $compra = producto::registerPurchase($_SESSION['carrito'], $userID);

        if($compra == "Hubo un problema con la compra"){
                echo "Hubo un problema con la compra";        ;
                exit;
        }
        
        $buscarUltimoPedido = producto::getLastPurchase($userID);

        if($buscarUltimoPedido == "No se encontro el ultimo pedido"){
                echo "No se encontro el ultimo pedido del usuario";
                exit;
        }

        $idPedido = $buscarUltimoPedido->id;

        $pedidoDetalle = producto::registerPurchaseDetail($_SESSION['carrito'],$idPedido);









