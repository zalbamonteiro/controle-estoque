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
                <div class="col-xs-12">
                    <h2>Gerenciamento de produtos</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button onClick="javascript: add()" class="btn btn-primary" >Adicionar novo</button><br/><br/>
                </div>
                <div class="col-xs-12">
                    <ul class="list-group">
                        <?php foreach($produtos as $prod): ?>
                            <li class="list-group-item">
                                <div class="col-md-3">
                                    <?php echo '#'.$prod['id']; ?>
                                </div>
                                <div class="col-md-3">
                                    <?php echo 'Nome: '.$prod['nome']; ?>
                                </div>
                                <div class="col-md-3">
                                    <?php echo 'Valor: R$'.str_replace('.',',',$prod['valor']); ?>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-default" onClick="javascript: edit(<?php echo $prod['id'] ?>)"><span class="glyphicon glyphicon-pencil"></span> Editar</button>
                                    <button class="btn btn-danger"  onClick="javascript: excluir(<?php echo $prod['id'] ?>)"><span class="glyphicon glyphicon-trash"></span> Excluir</button>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-xs-12">
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="authenticate" method="post">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Acesso Restrito</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Para acessar a essa área, vocês deverá informar a senha de administrador.</p>                                    
                                    <div class="form-group">
                                        <label>Senha do administrador</label>
                                        <input type="password" class="form-control" name="password" required>
                                        <input type="hidden" class="form-control" name="action" id="action">
                                        <input type="hidden" class="form-control" name="prod_id" id="prod_id">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Entrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        function edit(id){
            $("#action").val("editar");
            $("#prod_id").val(id);
            $('#myModal').modal('show');
        }

        function excluir(id){
            $("#action").val("deletar");
            $("#prod_id").val(id);
            $('#myModal').modal('show');
        }

        function add(){
            $("#action").val("adicionar");
            $('#myModal').modal('show');
        }
    </script>
</body>
</html>