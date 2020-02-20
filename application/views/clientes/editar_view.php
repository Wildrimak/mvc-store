<!doctype html>
<html lang="pt-br">

    <head>
        <title>Editar Cliente</title>
    </head>

    <body>

        <?php echo form_open('clientes/atualizar/'.$id.''); ?>
            <div align="center">

                <h3>Editando cliente</h3>

                <div>
                    <h5>Nome</h5>
                    <?php echo form_error('nome'); ?>
                    <input type="text" name="nome" value="<?php echo set_value('nome'); ?>" />
                </div>

                <div>
                    <h5>CPF</h5>
                    <?php echo form_error('cpf'); ?>
                    <input type="text" name="cpf" value="<?php echo set_value('cpf'); ?>" />
                </div>
                
                <div>
                    <h5>RG</h5>
                    <?php echo form_error('rg'); ?>
                    <input type="text" name="rg" value="<?php echo set_value('rg'); ?>" />
                </div>
                
                <div>
                    <h5>Endereço</h5>
                    <?php echo form_error('endereco'); ?>
                    <input type="text" name="endereco" value="<?php echo set_value('endereco'); ?>" />
                </div>

                <div>
                    <h5>Numero</h5>
                    <?php echo form_error('numero'); ?>
                    <input type="number" step="1" min="0" name="numero" value="<?php echo set_value('numero'); ?>" />
                </div>

                <div>
                    <h5>Estado</h5>
                    <?php echo form_error('estado'); ?>
                    <input type="text" name="estado" value="<?php echo set_value('estado'); ?>"/>    
                </div>

                <div>
                    <h5>Cidade</h5>
                    <?php echo form_error('cidade'); ?>
                    <input type="text" name="cidade" value="<?php echo set_value('cidade'); ?>"/>    
                </div>

                <div>
                    <h5>Renda</h5>
                    <?php echo form_error('renda'); ?>
                    <input type="number" step="0.01" name="renda" value="<?php echo set_value('renda'); ?>" />
                </div>


                <div>
                    <input type="submit" value="Submit" />
                </div>

            </div>
        <?php echo form_close() ?>

    </body>

</html>