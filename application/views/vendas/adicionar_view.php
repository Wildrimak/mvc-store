<!doctype html>
<html lang="pt-br">

<head>
    <title>Realizar Venda</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

</head>

<body>

    <?php echo form_open('vendas/salvar'); ?>
    <div align="center">

        <div>
            <h5>Selecione o produto</h5>

            <select id="produto" name="produtos_id" onchange="myFunction()">

                <?php
                    foreach ($produtos as $produto) {
                        echo "<option value='";
                        echo $produto->id;
                        echo "'>";
                        echo $produto->descricao . "</option>";
                    }
                ?>

            </select>
        </div>

        <div>
            <h5>Quantidade</h5>
            <input type="number" id="quantidade" step="1" min="1" name="quantidade" value="1" onchange="myFunction()"/>
        </div>

        <div>
            <h5>Selecione a forma de pagamento</h5>
            <select id="forma_pagamento" name="forma_pagamento" onchange="myFunction()">
                <option value="1">DINHEIRO</option>
                <option value="2">CARTÃO</option>
                <option value="3">CHEQUE</option>
                <option value="4">BOLETO</option>
            </select>
        </div>

        <div>
            <h5>Valor do produto escolhido</h5>
            <input id="valor_do_produto" name="valor_do_produto" onchange="myFunction()" readonly>
        </div>

        <div>
            <h5>Data</h5>
            <input type="datetime-local" name="data" onchange="myFunction()" value="<?php echo date('Y-m-d\TH:i'); ?>">
        </div>

        <div>
            <h5>Valor total da sua compra</h5>
            <input id="valor_total" type="number" step="0.01" name="valor_total" value="" readonly>
        </div>

        <div>
            <h5>Selecione o cliente</h5>

            <select name="clientes_id" onchange="myFunction()">

                <?php
                    foreach ($clientes as $cliente) {
                        echo "<option value='";
                        echo $cliente->id;
                        echo "'>";
                        echo $cliente->nome . "</option>";
                    }
                ?>

            </select>
        </div>

        <div>
            <input type="submit" onchange="myFunction()" value="Submit" />
        </div>

    </div>
    <?php echo form_close() ?>


    <script type="text/javascript">
    
        document.getElementById("forma_pagamento").selectedIndex = "0";
        var produtos_organizados = [];
    
        function organize(element, index, javascript_array){
            produtos_organizados[element["id"]] = element; 
        }

        <?php
            $js_array = json_encode($produtos);
            echo "var javascript_array = ". $js_array . ";\n";
        ?>


        javascript_array.forEach(organize);

        document.getElementById('produto').value = -1;

        function myFunction() {

            var produto_escolhido = document.getElementById('produto').value;            
            var quantidade = document.getElementById('quantidade').value;
            var formaPagamento = document.getElementById("forma_pagamento");
            var forma = formaPagamento.options[formaPagamento.selectedIndex].text;
           
            if (forma == "DINHEIRO") {
                var preco = produtos_organizados[produto_escolhido]["preco_vista"];
                document.getElementById("valor_do_produto").value = preco;
            } else {
                var preco = produtos_organizados[produto_escolhido]["preco_prazo"];
                document.getElementById("valor_do_produto").value = preco;
            }

            document.getElementById('valor_total').value = quantidade * preco;
        }

    </script>

</body>

</html>