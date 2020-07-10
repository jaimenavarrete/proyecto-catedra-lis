<?php
if(isset($rol)){
    if($rol == 1){
        echo '
            <header>
                <div id="navegador">
                    <input type="checkbox" id="menu-bar">
                    <label for="menu-bar" class="fa fa-bars icon" style="font-size:36px"></label>
                    <a href="perfil.php"><img class="circular--squaremin" src="img/user.png" /></a>
                    <a href="logout.php" class="cerrar">Cerrar Sesión <i class="fa fa-sign-out icon"></i> </a>
                    <nav class="menu">
                        <ul>
                        <div class="separador-links">
                            <li><a href="perfil.php">Mi perfil<i class="fa fa-user icon"></i></a></li>
                            <li><a href="grupos.php">Grupos<i class="fa fa-users icon"></i></a></li>
                            <li><a href="inscripcion_materias.php">Inscripción <i class="fa fa-pencil-square-o icon"></i></a></li>
                            <li><a href="reportes.php">Reportes <i class="fa fa-book icon"></i></a></li>
                            <li><a href="gestion.php">Gestión <i class="fa fa-cog icon"></i></a></li>                        </ul>
                    </nav>
                </div>
            </header>';
    }else if($rol == 2){
        echo '
            <header>
                <div id="navegador">
                    <input type="checkbox" id="menu-bar">
                    <label for="menu-bar" class="fa fa-bars icon" style="font-size:36px"></label>
                    <a href="perfil.php"><img class="circular--squaremin" src="img/user.png" /></a>
                    <a href="logout.php" class="cerrar">Cerrar Sesión <i class="fa fa-sign-out icon"></i> </a>
                    <nav class="menu">
                        <ul>
                        <div class="separador-links">
                            <li><a href="perfil.php">Mi perfil<i class="fa fa-user icon"></i></a></li>
                            <li><a href="grupos.php">Ver grupos<i class="fa fa-users icon"></i></a></li>
                            <li><a href="inscripcion_materias.php">Crear grupos<i class="fa fa-pencil-square-o icon"></i></a></li>
                            <li><a href="reportes.php">Reportes <i class="fa fa-book icon"></i></a></li>
                            </div>
                        </ul>
                    </nav>
                </div>
            </header>';
    }else if($rol == 3){
        echo '
            <header>
                <div id="navegador">
                    <input type="checkbox" id="menu-bar">
                    <label for="menu-bar" class="fa fa-bars icon" style="font-size:36px"></label>
                    <a href="perfil.php"><img class="circular--squaremin" src="img/user.png" /></a>
                    <a href="logout.php" class="cerrar">Cerrar Sesión <i class="fa fa-sign-out icon"></i> </a>
                    <nav class="menu">
                        <ul>
                        <div class="separador-links">
                            <li><a href="perfil_admin.php">Mi perfil<i class="fa fa-user icon"></i></a></li>
                            <li><a href="reportes.php">Reportes <i class="fa fa-book icon"></i></a></li>
                            <li><a href="gestion.php">Gestión <i class="fa fa-cog icon"></i></a></li>
                            </div>
                        </ul>
                    </nav>
                </div>
            </header>';
    }
}
?>