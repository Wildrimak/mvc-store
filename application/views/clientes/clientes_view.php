<!DOCTYPE html>
<html>

    <head>
        <title>Clientes</title>
    </head>

    <body>

        <div align="center">
            <?php echo anchor('logout', 'Logout', 'title="logout" id="links"') ?>
            <table border="1">
            <?php 
            echo "<tr>
                    <th>id</th>
                    <th>nome</th>
                    <th>cpf</th>
                    <th>rg</th>
                    <th>endereço</th>
                    <th>numero</th>
                    <th>estado</th>
                    <th>cidade</th>
                    <th>renda</th>
                    <th>cadastrado por</th>
                    <th>created</th>
                    <th>status</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>";
                foreach ($clientes as $cliente) {
                    echo "<tr>";
                    foreach ($cliente as $key => $value) {
                        echo "<td>".$value."</td>"; 
                    }
                    echo "<td>". anchor('clientes/editar/'.$cliente->id.'', 'Editar', 'title="editar" id="links"') ."</td>";
                    echo "<td>". anchor('clientes/deletar/'.$cliente->id.'', 'Deletar', 'title="deletar" id="links"')."</td>";
                    echo "</tr>";
                }
            ?>
            </table>
            <?php echo anchor('clientes/adicionar', 'Cadastrar novo cliente', 'title="adicionar" id="links"') ?>
            <?php echo anchor('usuarios', 'Retornar', 'title="usuarios" id="links"') ?>
    
        </div>

    </body>

</html>