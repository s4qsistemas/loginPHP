<?php
session_start();
if (isset($_POST['usuario']) && isset($_POST['password'])) {
    include 'conexion.php';
    
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $password = mysqli_real_escape_string($conexion, $_POST['password']);
    
    $consulta = "SELECT u.*, c.nombre AS categoria
                 FROM usuarios u
                 JOIN categoria c ON u.categoria_id = c.id
                 WHERE u.nombre = '$usuario'";
    
    $resultado = $conexion->query($consulta);
    
    if ($resultado->num_rows > 0) {
        $usuario_datos = $resultado->fetch_assoc();
        
        if (password_verify($password, $usuario_datos['password'])) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['categoria'] = $usuario_datos['categoria'];
            
            switch ($usuario_datos['categoria']) {
                case 'avanzado':
                    echo 1;
                    break;
                case 'medio':
                    echo 2;
                    break;
                case 'básico':
                    echo 3;
                    break;
            }
        } else {
            echo 0;
        }
    } else {
        echo 0;
    }
}
?>
