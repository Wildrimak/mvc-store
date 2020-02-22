<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Produtos">

    <title>Produtos</title>

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
                <?php echo anchor('vendas', 'Realizar Venda', 'title="vendas" class="nav-link active"') ?>
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
                <th scope='col'>Id</th>
                <th scope='col'>Descrição</th>
                <th scope='col'>Detalhamento</th>
                <th scope='col'>Preço a vista</th>
                <th scope='col'>Preço a prazo</th>
                <th scope='col'>Cadastrado por</th>
                <th scope='col'>Created</th>
                <th scope='col'>Status</th>
                <th scope='col'>Editar</th>
                <th scope='col'>Deletar</th>
            </tr>";
            foreach ($produtos as $produto) {
            echo "<tr>";
                foreach ($produto as $key => $value) {
                
                    if($key != "codigo_barras") {
                        echo "<td>".$value."</td>";
                    }
                }
                echo "<td>". anchor('produtos/editar/'.$produto->id.'', 'Editar', 'title="editar" id="links"') ."
                </td>";
                echo "<td>". anchor('produtos/deletar/'.$produto->id.'', 'Deletar', 'title="deletar" id="links"')."
                </td>";
                echo "</tr>";
            }
            ?>
        </table>
        <?php echo anchor('produtos/adicionar', 'Cadastrar novo produto', 'title="adicionar" id="links"') . "<br>" ?>
        <?php echo anchor('usuarios', 'Retornar', 'title="usuarios" id="links"') ?>

    </div>

</body>

</html>