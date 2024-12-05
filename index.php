<?php session_start();?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
    <meta charset="UTF-8">
    <title>Página Principal</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
 </head>
 <body>
    <label>
        <p>Nombre de Usuario</p>
        <p><input type="text" id="usuario" placeholder="Usuario" required></p>
    </label><br>
    <label>
        <p>Contraseña</p>
        <p><input type="password" id="password" placeholder="Contraseña" required></p>
    </label><br>
    <p><button onclick="confirmar()">Iniciar Sesión</button></p>
    <p><span id="result"></span></p>
    <script>
        function confirmar() {
            var user = $('#usuario').val();
            var pass = $('#password').val();

            $.ajax({
                url: 'validar.php',
                type: 'POST',
                data: { usuario: user, password: pass }
            }).done(function(resp) {
                switch (parseInt(resp)) {
                    case 1:
                        location.href = './principal_avanzado.php';
                        break;
                    case 2:
                        location.href = './principal_medio.php';
                        break;
                    case 3:
                        location.href = './principal_basico.php';
                        break;
                    default:
                        $("#result").html("<strong>¡Error!</strong>Usuario o contraseña incorrectos.");
                }
            })
        }
    </script>
 </body>
 </html>