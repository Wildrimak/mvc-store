<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Vendas">

    <title>Vendas</title>

    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css');?>">
</head>

<body class="text-center">

    <nav class="navbar navbar-dark justify-content-between bg-dark">

        <ul class="nav">
            <li class="nav-item">
                <?php echo anchor('usuarios', 'Home', 'title="usuarios" class="nav-link active"') ?>
            </li>
            <li class="nav-item">
                <?php echo anchor('clientes', 'Ver clientes', 'title="clientes" class="nav-link active"') ?>
            </li>
            <li class="nav-item">
                <?php echo anchor('produtos', 'Ver produtos', 'title="produtos" class="nav-link active"') ?>
            </li>
        </ul>

        <ul class="nav">
            <li class="nav-item">
                <?php echo anchor('logout', 'Logout', 'title="logout" class="nav-link active"') ?>
            </li>
        </ul>
    </nav>


    <div class="container">

        <table class="table table-hover">
            <?php 
            echo "<tr>
                    <th>Id</th>
                    <th>Produto</th>
                    <th>Cliente</th>
                    <th>Quantidade</th>
                    <th>Forma de pagamento</th>
                    <th>Data</th>
                    <th>Valor Total</th>
                    <th>Usuário</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Status</th>
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
        <?php echo anchor('vendas/adicionar', 'Realizar nova venda', 'title="adicionar"') . "<br>" ?>
        <?php echo anchor('usuarios', 'Retornar', 'title="usuarios" id="links"') ?>

    </div>

</body>

</html>