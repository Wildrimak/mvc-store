<!DOCTYPE html>
<html>

    <head>
        <title>Vendas</title>
    </head>

    <body>

        <div align="center">
            <?php echo anchor('logout', 'Logout', 'title="logout" id="links"') ?>
            <table border="1">
            <?php 
            echo "<tr>
                    <th>id</th>
                    <th>produtos_id</th>
                    <th>clientes_id</th>
                    <th>quantidade</th>
                    <th>forma_pagamento</th>
                    <th>data</th>
                    <th>valor_total</th>
                    <th>usuarios_id</th>
                    <th>created</th>
                    <th>updated</th>
                    <th>status</th>
                </tr>";
                foreach ($vendas as $venda) {
                    echo "<tr>";
                    foreach ($venda as $key => $value) {
                        echo "<td>".$value."</td>"; 
                    }
                    echo "</tr>";
                }
            ?>
            </table>
            <?php echo anchor('vendas/adicionar', 'Realizar nova venda', 'title="adicionar" id="links"') ?>
            <?php echo anchor('usuarios', 'Retornar', 'title="usuarios" id="links"') ?>
    
        </div>

    </body>

</html>