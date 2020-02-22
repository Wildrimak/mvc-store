<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Novo produto">

    <title>Adicionar novo produto</title>

    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css');?>">
</head>

<body class="text-center">

    <?php echo form_open('produtos/salvar', 'class="form-singin col-md-12"'); ?>
    <div class="container">

        <div>
            <h3 class="h3 mb-3 font-weight-normal"> Cadastre um novo produto para o sistema!</h3>
        </div>

        <div>
            <?php echo form_error('descricao'); ?>
            <input type="text" class="form-control" placeholder="Descrição do produto: (max: 45)" name="descricao" value="<?php echo set_value('descricao'); ?>" />
        </div>

        <div>
            <?php echo form_error('detalhamento'); ?>
            <input type="text" class="form-control" placeholder="Descreva mais sobre o produto: " name="detalhamento" value="<?php echo set_value('detalhamento'); ?>" />
        </div>

        <div>
            <?php echo form_error('preco_vista'); ?>
            <input type="number" class="form-control" placeholder="Valor do produto a dinheiro: " step="0.01" name="preco_vista" value="<?php echo set_value('preco_vista'); ?>" />
        </div>

        <div>
            <?php echo form_error('preco_prazo'); ?>
            <input type="number" step="0.01"  class="form-control" placeholder="Valor do produto nas demais formas de pagamento: "  name="preco_prazo" value="<?php echo set_value('preco_prazo'); ?>" />
        </div>

        <div>
            <?php echo form_error('codigo_barras'); ?>
            <input type="text" name="codigo_barras"  class="form-control" placeholder="Digite o código de barras do produto: " value="<?php echo set_value('codigo_barras'); ?>" />
        </div>

        <div>
            <div>
                <input type="submit" class="btn btn-lg btn-primary btn-block" value="Cadastrar" />
            </div>
        </div>
        <?php echo anchor('produtos', 'Retornar', 'title="produtos" ') ?>

    </div>
    <?php echo form_close() ?>

</body>

</html>