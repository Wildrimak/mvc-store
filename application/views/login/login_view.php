<!doctype html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Login">
        
        <title>Login</title>
        
        <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css');?>">
    </head>

    <body class="text-center">

        <?php echo form_open('login', 'class="form-singin"'); ?>
            <div class="container" >

                <div>
                    <h1 class="h3 mb-3 font-weight-normal"> Realize seu Login!</h1>
                </div>

                <div>
                    <?php 
                        if ($this->session->flashdata('authError')) {
                                echo $this->session->flashdata('authError');
                        }
                    ?>
                    <h5>Matricula</h5>
                    <?php echo form_error('matricula'); ?>
                    <input type="text" name="matricula" class="form-control" value="<?php echo set_value('matricula'); ?>"/>    
                </div>

                <div>
                    <h5>Senha</h5>
                    <?php echo form_error('senha'); ?>
                    <input type="password" class="form-control" name="senha" autocomplete="on" value="<?php echo set_value('senha'); ?>" />
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="lembrar">
                    <label class="form-check-label" for="lembrar">Lembrar</label>
                </div>

                <div>
                    <input type="submit" class="btn btn-lg btn-primary btn-block" value="Submit" />
                </div>
            </div>
        <?php echo form_close() ?>

    </body>

</html>