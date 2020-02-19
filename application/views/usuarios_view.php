<!DOCTYPE html>
<html>
<head>
	<title>Usuarios</title>
</head>
<body>

    <table border="1">
    <?php 
        echo "<tr>
                <th>id</th>
                <th>nome</th>
                <th>matricula</th>
                <th>senha</th>
                <th>created</th>
                <th>status</th>
            </tr>";
        foreach ($usuarios as $usuario) {
            echo "<tr>";
            foreach ($usuario as $key => $value) {
                echo "<td>".$value."</td>";
            }
            echo "</tr>";
         }
     ?>
    </table>

</body>
</html>