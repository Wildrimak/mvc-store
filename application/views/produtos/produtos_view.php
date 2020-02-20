<!DOCTYPE html>
<html>

    <head>
        <title>Produtos</title>
    </head>

    <body>

        <div align="center">
            <?php echo anchor('logout', 'Logout', 'title="logout" id="links"') ?>
            <table border="1">
            <?php 
            echo "<tr>
                    <th>id</th>
                    <th>descrição</th>
                    <th>detalhamento</th>
                    <th>preço a vista</th>
                    <th>preço a prazo</th>
                    <th>codigo de barras</th>
                    <th>cadastrado por</th>
                    <th>created</th>
                    <th>status</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>";
                foreach ($produtos as $produto) {
                    echo "<tr>";
                    foreach ($produto as $key => $value) {
                        echo "<td>".$value."</td>"; 
                    }
                    echo "<td>". anchor('produtos/editar/'.$produto->id.'', 'Editar', 'title="editar" id="links"') ."</td>";
                    echo "<td>". anchor('produtos/deletar/'.$produto->id.'', 'Deletar', 'title="deletar" id="links"')."</td>";
                    echo "</tr>";
                }
            ?>
            </table>
            <?php echo anchor('produtos/adicionar', 'Cadastrar novo produto', 'title="adicionar" id="links"') ?>
            <?php echo anchor('usuarios', 'Retornar', 'title="usuarios" id="links"') ?>
    
        </div>

    </body>

</html>