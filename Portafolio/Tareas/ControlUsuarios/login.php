<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <script defer src="./login.js"></script>
</head>

<body>
<?php 

    if(isset($_GET["errorRegistro"])) 
    {
        $mensajeError="";

        if ($_GET["errorRegistro"] == "Campos_Registro_Vacio") {
            $mensajeError = "Campos vacíos"; 
        }elseif($_GET["errorRegistro"] == "Correo_ya_existe"){
            $mensajeError = "El correo ingresado no se encuentra disponible";
        }elseif($_GET["errorRegistro"] == "Nombre_usuario_ya_existe"){
            $mensajeError = "El nombre de usuario ingresado no se encuentra disponible";
        }elseif($_GET["errorRegistro"] == "Formato_invalido"){
            $mensajeError = "La contraseña debe tener un tamaño minimo de 8 caracteres(mayúsculas,
            minúsculas y números)";
        }
        ?>
            <div class="alert alert-danger alert-dismissible fade show mensajeError" role="alert">
            <?php echo $mensajeError ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php
    }
?>
    <div class="contenidoPrincipal">
        <div class="cajon" id="cajon">
            <!-- Tomado de Boostrap -->
            <ul class="nav nav-tabs " id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active estiloNav" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true"> Iniciar Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link estiloNav" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">Registrarse</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active estiloTab" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <form action="./validacionesPHP/validacionesLogin.php" class="estiloForm" method = "post">

                        <div class="input-group inputs">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" name="email" class="form-control" id="email" placeholder="@email" value="<?php 
                                if(isset($_SESSION['email-login'])){
                                echo $_SESSION['email-login'];
                                } else {
                                echo "";
                                }
                            ?>">
                        </div>

                        <div class="input-group ">
                            <span class="input-group-addon "><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password"
                                placeholder="Contraseña" >
                        </div>
                        <?php 

                            if(isset($_GET["error"])) 
                            {
                                $mensajeError="";

                                if ($_GET["error"] == "Campos_vacios") {
                                    $mensajeError = "Campos vacíos"; 
                                }elseif($_GET["error"] == "Credenciales_incorrectas"){
                                    $mensajeError = "Credenciales incorrectas";
                                }
                                ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo $mensajeError ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                <?php
                            }
                        ?>
                        <div class="textoFont">
                            <a href="javascript:modal();">Olvidé mi
                                contraseña</a>
                            <br>
                            <a data-toggle= "modal" data-target = "#cambioContrasenna" >Restablecer contraseña</a>
                        </div>

                        <div class="botonIngresar">
                            <button id="btnIngresar" type="submit" name = "submit" class="btn-block boton "><a class="aFont"
                                    href="#"></a>INGRESAR </a></button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade estiloTab" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="./validacionesPHP/validacionesRegistro.php" method = "post"  >

                        <div class="row">

                            <div class="col">
                                <label for="nombreRegistro">Nombre*</label>
                                <input id="nombreRegistro" name = "nombreRegistro" type="text" class="form-control" placeholder="Nombre" value="<?php 
                                if(isset($_SESSION["nombre-registro"])){
                                    echo $_SESSION["nombre-registro"];
                                } else {
                                    echo "";
                                }
                            ?>">

                            </div>
                            <div class="col">
                                <label for="apellidoRegistro">Apellidos*</label>
                                <input id="apellidoRegistro" name="apellidosRegistro" type="text" class="form-control" placeholder="Apellidos">
                            </div>
                            <div class="col">
                                <label for="formGroupExampleInput2">Contacto*</label>
                                <input type="tel" class="form-control" id="contacto" placeholder="8888-88-88"
                                    name="telefonoRegistro" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" >
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="start">Fecha de nacimiento*</label>
                            <input type="date" class="form-control" id="start" name="trip-start" >
                                
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="inputEmail4">Correo electrónico*</label>
                                    <input type="email" class="form-control" id="emailRegistro" name="emailRegistro" placeholder="@email">
                                </div>
                                <div class="col">
                                    <label for="formGroupExampleInput">Contraseña*</label>
                                    <input type="password" class="form-control" id="contrasennaRegistro" name="contrasennaRegistro"
                                        placeholder="Contraseña" >
                                    <div class="collapse" id="collapseExample4">
                                        <div class="card card-body campoRequeridoEstilo">
                                            La contraseña debe tener un tamaño minimo de 8 caracteres(mayúsculas,
                                            minúsculas y números).
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="inputEmail4">Login de indentificación*</label>
                                    <input type="text" class="form-control" id="login" placeholder="Nombre usuario"
                                        name="nombreUsuario" >
                                </div>
                            </div>
                        </div>


                        <div class="botonIngresar">
                        <!-- onclick="validarContrasenna(event)" -->
                            <button  id="btnEnviar" type="submit" name="submit" class="btn-block boton "><a class="aFont" href="#"></a>
                                ENVIAR</a></button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
        <div id="flotante" class="formaModal" style="display:none;" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div id="modalBody" class="modal-body">
                        ""
                    </div>
                    <div class="modal-footer">
                        <div id="close"><a href="javascript:cerrarModalConfimacion();">Cerrar</a></div>
                    </div>
                </div>
            </div>
        </div>

        <div id="cambioContrasenna" class=" modal fade " tabindex="-1" role="dialog"  >
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div id="bodyModal" class="modal-body">
                        <form action="./validacionesPHP/validacionesCambioContrasenna.php" class="form-group" method = "post">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Ingrese la contraseña actual*</label>
                                <input type="password" class="form-control" id="contrasennaActual"  name= "contrasennaActual" placeholder="Contraseña actual">

                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body campoRequeridoEstilo"> Campo vacío.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Ingrese la contraseña nueva*</label>
                                <input type="password" class="form-control" id="contrasennaNueva" name="contrasennaNUeva"
                                    placeholder="Contraseña nueva">
                                <div class="collapse" id="collapseExample2">
                                    <div class="card card-body campoRequeridoEstilo">
                                        Campo vacío.
                                    </div>
                                </div>
                                <div class="collapse" id="collapseExample5">
                                    <div class="card card-body campoRequeridoEstilo">
                                        La contraseña debe tener un tamaño minimo de 8 caracteres(mayúsculas,
                                        minúsculas y números).
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Reescriba la contraseña nueva*</label>
                                <input type="password" class="form-control" id="contrasennaNueva2" name = "contrasennaNueva2"placeholder="Contraseña nueva"></textarea>
                                <div class="collapse" id="collapseExample3">
                                    <div class="card card-body campoRequeridoEstilo"> Campo vacío.</div>
                                </div>
                                <div class="collapse" id="collapseExample6">
                                    <div class="card card-body campoRequeridoEstilo">
                                        La contraseñas debe ser igual a la anterior.
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div><button data-dismiss = "modal" >Cancelar</a></div>
                                <div><button type="submit" name = "submit" >Enviar solicitud</button></div>
                            </div>

                        </form>
                    </div>
                    
                </div>
            </div>
        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <div class="animation-area">

        <ul class="box-area">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</body>

</html>