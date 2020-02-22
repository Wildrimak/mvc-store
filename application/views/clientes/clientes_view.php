<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Clientes">

    <title>Clientes</title>

    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css');?>">
</head>

<body class="text-center">

    <nav class="navbar navbar-dark justify-content-between bg-dark">

        <ul class="nav">
            <li class="nav-item">
                <?php echo anchor('usuarios', 'Home', 'title="usuarios" class="nav-link active"') ?>
            </li>
            <li class="nav-item">
                <?php echo anchor('produtos', 'Ver produtos', 'title="produtos" class="nav-link active"') ?>
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


    <div>

        <table class="table table-hover">
            <?php 
            echo "<tr>
                    <th scope='col'>Id</th>
                    <th scope='col'>Nome</th>
                    <th scope='col'>RG</th>
                    <th scope='col'>Endereço</th>
                    <th scope='col'>Número</th>
                    <th scope='col'>Estado</th>
                    <th scope='col'>Cidade</th>
                    <th scope='col'>Renda</th>
                    <th scope='col'>Cadastrado por</th>
                    <th scope='col'>Created</th>
                    <th scope='col'>Status</th>
                    <th scope='col'>Editar</th>
                    <th scope='col'>Deletar</th>
                </tr>";
                foreach ($clientes as $cliente) {
                    echo "<tr>";
                    foreach ($cliente as $key => $value) {
                        if ($key != "cpf") {
                            echo "<td>".$value."</td>"; 
                        }
                    }
                    echo "<td>". anchor('clientes/editar/'.$cliente->id.'', 'Editar', 'title="editar" id="links"') ."</td>";
                    echo "<td>". anchor('clientes/deletar/'.$cliente->id.'', 'Deletar', 'title="deletar" id="links"')."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
        <?php echo anchor('clientes/adicionar', 'Cadastrar novo cliente', 'title="adicionar" ') . "<br>" ?>
        <?php echo anchor('usuarios', 'Retornar', 'title="usuarios" id="links"') ?>

    </div>

</body>

</html>