<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Login">

    <title>Adicionar novo usuário</title>

    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css');?>">
</head>


<body class="text-center">

    <?php echo form_open('usuarios/salvar', 'class="form-singin col-md-12"'); ?>
    <div class="container">

        <div>
            <h3 class="h3 mb-3 font-weight-normal"> Cadastre um novo usuário admin para o sistema!</h3>
        </div>


        <div>
            <?php 
                if( $this->session->flashdata('authError') )
                    {
                        echo $this->session->flashdata('authError');
                    }
                ?>
        </div>

        <div>
            <div>
                <?php echo form_error('nome'); ?>
                <input type="text" placeholder="Escreva seu nome" name="nome" class="form-control" value="<?php echo set_value('nome'); ?>" />
            </div>

            <div>
                <?php echo form_error('matricula'); ?>
                <input type="text" placeholder="Digite uma matricula " class="form-control" name="matricula"
                    value="<?php echo set_value('matricula'); ?>" />
            </div>

            <div>
                <?php echo form_error('senha'); ?>
                <input type="password" placeholder="Digite sua senha" class="form-control" name="senha" value="<?php echo set_value('senha'); ?>" />
            </div>

            <div>
                <?php echo form_error('confirmar_senha'); ?>
                <input type="password" placeholder="Confirme sua senha " class="form-control" name="confirmar_senha"
                    value="<?php echo set_value('confirmar_senha'); ?>" />
            </div>
        </div>
        <div>
            <div>
                <input type="submit" class="btn btn-lg btn-primary btn-block" value="Cadastrar" />
            </div>
        </div>

    </div>
    <?php echo form_close() ?>

    <?php echo anchor('usuarios', 'Retornar', 'title="usuarios" id="links"') ?>
</body>

</html>