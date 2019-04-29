<main>
        <div class="container">                
            <div class="row">
                <div class="col-xs-12">
                    <h2>Gerenciamento de fornecedores</h2>
                    <hr>
                </div>
            </div>
            <div class="row">                
                <div class="col-xs-6">
                    <a href="<?php echo site_url('/fornecedores/adicionar') ?>" class="btn btn-primary" >Adicionar novo</a><br/><br/>
                </div>
                <div class="col-xs-6">
                    <form class="navbar-form navbar-right" method='post' action="<?php echo site_url('/fornecedores/search'); ?>">
                        <div class="form-group">
                            <input type="text" class="form-control" name="search" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="<?php echo site_url('/fornecedores') ?>" class="btn btn-default">Limpar filtro</a>
                    </form>
                </div>
                <div class="col-xs-12">
                    <table class="table table-bordered">
                        <?php foreach($fornecedores as $forn): ?>
                        <tr>
                            <td><?php echo '#'.$forn['cod_fornecedor']; ?></td>
                            <td><?php echo 'Nome: '.$forn['fornecedor']; ?></td>
                            <td><?php echo 'CNPJ: '.$forn['cnpj']; ?></td>
                            <td><?php echo 'Produto: '.$forn['produto']; ?></td>
                            <td><?php echo 'Endereço:'.$forn['endereco']; ?></td>
                            <td><?php echo 'E-mail: '.$forn['email']; ?></td>
                            <td><?php echo 'Estado: '.$forn['estado']; ?></td>
                            <td><?php echo 'Status: '.$forn['status']; ?></td>
                            <td>
                            <a href="<?php echo site_url('/fornecedores/editar/'.$forn['cod_fornecedor']) ?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
                                <button class="btn btn-danger"  onClick="javascript: excluir(<?php echo $forn['cod_fornecedor'] ?>)"><span class="glyphicon glyphicon-trash"></span> Inativar</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <div class="col-xs-12">
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="<?php echo site_url('fornecedores/authenticate') ?>" method="post">
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
                                        <input type="hidden" class="form-control" name="forn_id" id="forn_id">
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
            $("#forn_id").val(id);
            $('#myModal').modal('show');
        }

        function excluir(id){
            $("#action").val("deletar");
            $("#forn_id").val(id);
            $('#myModal').modal('show');
        }
    </script>
</body>
</html>