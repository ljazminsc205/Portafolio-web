<?php
session_start( );

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
                    <form action="perfil.php" class="estiloForm" method = "post">
                        <div class="input-group inputs">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="email" name="email" class="form-control" id="email" placeholder="@email" required>
                        </div>
                        <div class="input-group ">
                            <span class="input-group-addon "><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password"
                                placeholder="Contraseña" required>
                        </div>
                        <div class="textoFont">
                            <a href="javascript:modal();">Olvidé mi
                                contraseña</a>
                            <br>
                            <a href="javascript:modalContrasenna();">Restablecer contraseña</a>
                        </div>

                        <div class="botonIngresar">
                            <button id="btnIngresar" type="submit" class="btn-block boton "><a class="aFont"
                                    href="#"></a>INGRESAR </a></button>
                        </div>

                    </form>
                </div>
                <div class="tab-pane fade estiloTab" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="perfil.php">

                        <div class="row">

                            <div class="col">
                                <label for="nombreRegistro">Nombre*</label>
                                <input id="nombreRegistro" type="text" class="form-control" placeholder="Nombre"
                                    required>

                            </div>
                            <div class="col">
                                <label for="apellidoRegistro">Apellidos*</label>
                                <input id="apellidoRegistro" type="text" class="form-control" placeholder="Apellidos"
                                    required>
                            </div>
                            <div class="col">
                                <label for="formGroupExampleInput2">Contacto*</label>
                                <input type="tel" class="form-control" id="contacto" placeholder="8888-88-88"
                                    name="phone" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="start">Fecha de nacimiento*</label>
                            <input type="date" class="form-control" id="start" name="trip-start" min="2018-01-01"
                                required>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="inputEmail4">Correo electrónico*</label>
                                    <input type="email" class="form-control" id="emailRegistro" placeholder="@email"
                                        required>
                                </div>
                                <div class="col">
                                    <label for="formGroupExampleInput">Contraseña*</label>
                                    <input type="password" class="form-control" id="contrasennaRegistro"
                                        placeholder="Contraseña" required>
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
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="botonIngresar">
                            <button onclick="validarContrasenna(event)" id="btnEnviar" type="submit"
                                class="btn-block boton "><a class="aFont" href="#"></a>
                                ENVIAR
                                </a></button>
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

        <div id="cambioContrasenna" class="formaModal" style="display:none;" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div id="bodyModal" class="modal-body">
                        <form class="form-group">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Ingrese la contraseña actual*</label>
                                <input type="password" class="form-control" id="contrasennaActual"
                                    placeholder="Contraseña actual" required>

                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body campoRequeridoEstilo">
                                        Campo vacío.
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Ingrese la contraseña nueva*</label>
                                <input type="password" class="form-control" id="contrasennaNueva"
                                    placeholder="Contraseña nueva" required>
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
                                <input type="password" class="form-control" id="contrasennaNueva2"
                                    placeholder="Contraseña nueva" required></textarea>
                                <div class="collapse" id="collapseExample3">
                                    <div class="card card-body campoRequeridoEstilo">
                                        Campo vacío.
                                    </div>
                                </div>
                                <div class="collapse" id="collapseExample6">
                                    <div class="card card-body campoRequeridoEstilo">
                                        La contraseñas debe ser igual a la anterior.
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div type="submit"><a href="javascript:cerrarModalContrasennaCancelar();">Cancelar</a></div>
                        <div type="submit"><a href="javascript:cerrarModalContrasenna(event);">Enviar
                                solicitud</a></div>
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