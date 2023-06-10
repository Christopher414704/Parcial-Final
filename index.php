<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta>
    <title>Document</title>
</head>
<body>

<style> 
table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            text-align: left;
            padding: 8px;
        }
        
        th {
            background-color: #333;
            color: white;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <table>
        <?php foreach ($datos as $fila): ?>
        <tr>
            <?php foreach ($fila as $dato): ?>
            <td><?php echo $dato; ?></td>
            <?php endforeach; ?>
        </tr>
        <?php endforeach; ?>
    </table>


</style>




<?php 

    // Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "Umg$2023";
$dbname = "0907231218";

// Crear la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Consulta SELECT para recuperar la información de la tabla Alumno

$sql = "INSERT INTO Alumno (Carnet, Nombre, Grado, Telefono) VALUES ('0907-23-1218', 'Cristofer Antonio', 'Ingenieria en sistemas', 31434501)";


$sql = "SELECT * FROM Alumno";
$result = $conn->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Imprimir los datos en forma de tabla
    echo "<table>
            <tr>
                <th>Carnet</th>
                <th>Nombre</th>
                <th>Grado</th>
                <th>Teléfono</th>
            </tr>";
    // Recorrer los resultados y mostrarlos en filas de la tabla
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["Carnet"]."</td>
                <td>".$row["Nombre"]."</td>
                <td>".$row["Grado"]."</td>
                <td>".$row["Telefono"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron registros.";
}

// Cerrar la conexión a la base de datos
$conn->close();

 ?>
    
</body>
</html>