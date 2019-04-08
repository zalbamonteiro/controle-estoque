<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        
    <title>Teste - Trabalho</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">                    
                    <a class="navbar-brand" href="<?php echo site_url(); ?>">Controle de Estoque</a>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">                
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <h2>Editar novo Produto </h2>    
                    <form action="<?php echo site_url('/produtos/update'); ?>" method="post">
                        <div class="form-group">
                            <label>Nome: </label>
                            <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $prod[0]->nome ?>" required>
                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $prod[0]->id ?>">
                        </div>
                        <div class="form-group">
                            <label>Tipo: </label>
                            <input type="text" name="tipo" id="tipo" class="form-control" value="<?php echo $prod[0]->tipo ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Valor: </label>
                            <input type="text" name="valor" id="valor" class="form-control" value="<?php echo $prod[0]->valor ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Quantidade em estoque: </label>
                            <input type="text" name="estoque" id="estoque" class="form-control" value="<?php echo $prod[0]->estoque ?>" required>
                        </div>
                        <button class="btn btn-primary"> Salvar </button>
                    </form>
                    <?php if(isset($mensagens)) echo $mensagens; ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>