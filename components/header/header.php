<nav class="navbar navbar-expand-sm bg-dark header-top">
    <a class="navbar-brand text-white logo" href="index.php">RMS-Rosario Music Shop</a>
    <form class="form-inline m-auto searchForm">
        <input class="form-control"
               type="search"
               placeholder="Search"
               >
        <button class="btn btn-info" type="submit"><i class="fas fa-search"></i></button>
    </form>
    <ul class="navbar-nav ml-auto userOptions">
        <?php
              if(!isset($_SESSION['usuario'])){
                ?>
                <li class="nav-item nav-item-user">
                    <a class="nav-link text-white" href="#">
                    <i class="fas fa-user"></i>
                    </a>       
                </li>
                <?php
              }else{
                ?>
                <li class="nav-item nav-item-loggedUser dropdown">
                    <a class="nav-link text-white" href="#" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
                        <?php echo substr($_SESSION['usuario']->getName(), 0, 1).substr($_SESSION['usuario']->getSurname(), 0, 1) ?>
                        
                    </a>
                    <div class="dropdown-menu menu dropdown-menu-right" aria-labelledby="dropdownMenuButton" >
                        <a style="padding: 10px 9px;" class="dropdown-item" href="./perfil">

                          <h5>
                              <span class="nav-item nav-item-loggedUser-min dropdown">
                                  <?php echo substr(trim($_SESSION['usuario']->getName()), 0, 1).substr(trim($_SESSION['usuario']->getSurname()), 0, 1) ?>
                              </span>
                              <?php echo trim($_SESSION['usuario']->getName())." ".trim($_SESSION['usuario']->getSurname()); ?>
                          </h5>
                          <p style="margin-left:17%;"><?php echo $_SESSION['usuario']->getEmail(); ?></p>
                          
                        </a>
                        <a class="dropdown-item" href="#">Historial de compras</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" id="closeSession" href="#">Cerrar sesión</a>
                    </div>       
                </li>
                <?php
              }
        ?>
        <li class="nav-item nav-item-shopping-cart">
            <a class="nav-link text-white" href="./chart">
                <i class="fas fa-shopping-cart">
                  <span class="cantItemChart"
                        style="display:<?php
                               if(isset($_SESSION['carrito'])){
                                 ?>block<?php
                               }else{
                                  ?>none<?php   
                               } ?>
                              ">
                      <?php
                        if(isset($_SESSION['carrito'])){
                          echo count($_SESSION['carrito']);
                        }else{
                          ?>0<?php
                        }
                      ?>
                      </span>
                    <?php
                    
                  ?>
                  
                </i>
            </a>       
        </li>
    </ul>


</nav>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark header-bottom">
        
        <div class="subnavbar-bottom collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <?php
            $instruments = producto::getTypeInstrument();
            for ($i=0; $i < count($instruments); $i++){
              
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $instruments[$i]->descripcion; ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <?php
                $category = producto::getCategoryInstrument($instruments[$i]->id);
                for ($j=0; $j < count($category); $j++){
                ?>
                  <a class="dropdown-item" href="listado?i=<?php echo $instruments[$i]->descripcion;?>&t=<?php echo $category[$j]->descripcion;?>"><?php echo $category[$j]->descripcion; ?></a>
                <?php
                }
              ?>
              </div>
            </li>
            <?php
              
            }
            ?>


<!--   
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Bajos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="listado?t=bass&c=electric">Electricos</a>
                <a class="dropdown-item" href="listado?bass&c=acoustic">Acusticos</a>
              </div>
            </li>
  
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Baterías
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="listado?t=drum&c=acoustic">Acusticas</a>
                <a class="dropdown-item" href="listado?t=drum&c=electric">Electricas</a>
                <a class="dropdown-item" href="listado?t=drum&c=plat">Platillos</a>
                <a class="dropdown-item" href="listado?t=drum&c=red">Redoblantes</a>
                <a class="dropdown-item" href="listado?t=drum&c=perc">Percusion</a>
              </div>
            </li> -->
          </ul>
        </div>
      </nav>

