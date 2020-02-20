<!DOCTYPE html>
<html>

    <head>
        <title>Usuarios</title>
    </head>

    <body>

        <div align="center">
            <?php echo anchor('logout', 'Logout', 'title="logout" id="links"') ?>
            <table border="1">
            <?php 
            echo "<tr>
                    <th>id</th>
                    <th>nome</th>
                    <th>matricula</th>
                    <th>senha</th>
                    <th>created</th>
                    <th>status</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>";
                foreach ($usuarios as $usuario) {
                    echo "<tr>";
                    foreach ($usuario as $key => $value) {
                        echo "<td>".$value."</td>"; 
                    }
                    echo "<td>". anchor('usuarios/editar/'.$usuario->id.'', 'Editar', 'title="editar" id="links"') ."</td>";
                    echo "<td>". anchor('usuarios/deletar/'.$usuario->id.'', 'Deletar', 'title="deletar" id="links"')."</td>";
                    echo "</tr>";
                }
            ?>
            </table>
            <?php echo anchor('usuarios/adicionar', 'Cadastrar novo usuário', 'title="adicionar" id="links"') ?>
            <?php echo anchor('clientes', 'Ver clientes', 'title="clientes" id="links"') ?>
            <?php echo anchor('produtos', 'Ver produtos', 'title="produtos" id="links"') ?>
            <?php echo anchor('vendas', 'Realizar Venda', 'title="vendas" id="links"') ?>
        </div>

    </body>

</html>