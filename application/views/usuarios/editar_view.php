<!doctype html>
<html lang="pt-br">

    <head>
        <title>Editar usuario</title>
    </head>

    <body>

        <?php echo anchor('usuarios', 'Retornar', 'title="usuarios" id="links"') ?>
        <?php echo form_open('usuarios/atualizar/'.$id.''); ?>
            <div align="center">

                <h3>Editando usuario</h3>

                <div>
                    <?php if( $this->session->flashdata('authError') )
                        {
                            echo $this->session->flashdata('authError');
                        }
                    ?>
                </div>

                <div>
                    <h5>Novo nome</h5>
                    <?php echo form_error('nome'); ?>
                    <input type="text" name="nome" value="<?php echo set_value('nome'); ?>" />
                </div>

                <div>
                    <h5>Nova matricula</h5>
                    <?php echo form_error('matricula'); ?>
                    <input type="text" name="matricula" value="<?php echo set_value('matricula'); ?>"/>    
                </div>


                <div>
                    <h5>Nova senha</h5>
                    <?php echo form_error('nova_senha'); ?>
                    <input type="password" name="nova_senha" value="<?php echo set_value('nova_senha'); ?>" />
                </div>

                <div>
                    <h5>Confirmar nova Senha</h5>
                    <?php echo form_error('confirmar_senha'); ?>
                    <input type="password" name="confirmar_senha" value="<?php echo set_value('confirmar_senha'); ?>" />
                </div>


                <div>
                    <h5>Status</h5>
                    <?php echo form_error('status'); ?>
                    <input type="number" name="status" min="0" max="1" value="<?php echo set_value('status'); ?>" />
                </div>

                <div>
                    <h5>Digite sua senha para confirmar as alterações</h5>
                    <?php echo form_error('senha'); ?>
                    <input type="password" name="senha" value="<?php echo set_value('senha'); ?>" />
                </div>
                
                <div>
                    <input type="submit" value="Submit" />
                </div>

            </div>
        <?php echo form_close() ?>

    </body>

</html>