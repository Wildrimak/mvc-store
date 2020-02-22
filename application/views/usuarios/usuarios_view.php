<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Usuários">

    <title>Usuários</title>

    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css');?>">
</head>

<body class="text-center">

    <nav class="navbar navbar-dark justify-content-between bg-dark">

        <ul class="nav">
            <li class="nav-item">
                <?php echo anchor('clientes', 'Ver clientes', 'title="clientes" class="nav-link active"') ?>
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

    <div class="container">

        <table class="table table-hover">
            <?php
            echo "<tr>
                    <th scope='col'>Id</th>
                    <th scope='col'>Nome</th>
                    <th scope='col'>Matricula</th>
                    <th scope='col'>Created</th>
                    <th scope='col'>Status</th>
                    <th scope='col'>Editar</th>
                    <th scope='col'>Deletar</th>
                </tr>";
                foreach ($usuarios as $usuario) {
                    echo "<tr>";
                    foreach ($usuario as $key => $value) {
                        if ($key != "senha") {
                            echo "<td>".$value."</td>";
                        }
                    }
                    echo "<td>". anchor('usuarios/editar/'.$usuario->id.'', 'Editar', 'title="editar" id="links"') ."</td>";
                    echo "<td>". anchor('usuarios/deletar/'.$usuario->id.'', 'Deletar', 'title="deletar" id="links"')."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
        <?php echo anchor('usuarios/adicionar', 'Cadastrar novo usuário', 'title="adicionar" id="links"') ?>

    </div>

</body>

</html>