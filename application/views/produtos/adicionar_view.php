<!doctype html>
<html lang="pt-br">

    <head>
        <title>Adicionar produto</title>
    </head>

    <body>

        <?php echo form_open('produtos/salvar'); ?>
            <div align="center">

                <div>
                    <h5>Descrição</h5>
                    <?php echo form_error('descricao'); ?>
                    <input type="text" name="descricao" value="<?php echo set_value('descricao'); ?>" />
                </div>

                <div>
                    <h5>Detalhamento</h5>
                    <?php echo form_error('detalhamento'); ?>
                    <input type="text" name="detalhamento" value="<?php echo set_value('detalhamento'); ?>" />
                </div>

                <div>
                    <h5>Valor a vista</h5>
                    <?php echo form_error('preco_vista'); ?>
                    <input type="number" step="0.01" name="preco_vista" value="<?php echo set_value('preco_vista'); ?>" />
                </div>

                <div>
                    <h5>Valor a prazo</h5>
                    <?php echo form_error('preco_prazo'); ?>
                    <input type="number" step="0.01" name="preco_prazo" value="<?php echo set_value('preco_prazo'); ?>" />
                </div>
                
                <div>
                    <h5>Código de barras</h5>
                    <?php echo form_error('codigo_barras'); ?>
                    <input type="text" name="codigo_barras" value="<?php echo set_value('codigo_barras'); ?>" />
                </div>

                <div>
                    <input type="submit" value="Submit" />
                </div>

            </div>
        <?php echo form_close() ?>

    </body>

</html>