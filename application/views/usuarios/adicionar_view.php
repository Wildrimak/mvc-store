<!doctype html>
<html lang="pt-br">

    <head>
        <title>Adicionar usuario</title>
    </head>

    <body>
        <?php echo anchor('usuarios', 'Retornar', 'title="usuarios" id="links"') ?>
        <?php echo form_open('usuarios/salvar'); ?>
            <div align="center">

                <div>
                    <?php if( $this->session->flashdata('authError') )
                        {
                            echo $this->session->flashdata('authError');
                        }
                    ?>
                </div>

                <div>
                    <h5>Nome</h5>
                    <?php echo form_error('nome'); ?>
                    <input type="text" name="nome" value="<?php echo set_value('nome'); ?>" />
                </div>

                <div>
                    <h5>Matricula</h5>
                    <?php echo form_error('matricula'); ?>
                    <input type="text" name="matricula" value="<?php echo set_value('matricula'); ?>"/>    
                </div>

                <div>
                    <h5>Senha</h5>
                    <?php echo form_error('senha'); ?>
                    <input type="password" name="senha" value="<?php echo set_value('senha'); ?>" />
                </div>

                <div>
                    <h5>Confirmar Senha</h5>
                    <?php echo form_error('confirmar_senha'); ?>
                    <input type="password" name="confirmar_senha" value="<?php echo set_value('confirmar_senha'); ?>" />
                </div>

                <div>
                    <input type="submit" value="Submit" />
                </div>

            </div>
        <?php echo form_close() ?>

    </body>

</html>