<main>
        <div class="container">                
            <div class="row">
                <div class="col-xs-12">
                    <h2>Gerenciamento de produtos</h2>
                    <hr>
                </div>
            </div>
            <div class="row">                
                <div class="col-xs-6">
                    <a href="<?php echo site_url('/vendas/adicionar') ?>" class="btn btn-primary" >Adicionar novo</a><br/><br/>
                </div>
                <div class="col-xs-6">
                    <form class="navbar-form navbar-right" method='post' action="<?php echo site_url('/vendas/search'); ?>">
                        <div class="form-group">
                            <select class="form-control" name="search">
                                <option> Seleciona um filtro ...</option>
                                <option value="estoque-positivo">Produtos com Estoque positivo</option>
                                <option value="estoque-negativo">Produtos com Estoque negativo</option>
                                <option value="estoque-zerado">Produtos com Estoque zerado</option>
                                <option value="mais-vendido">Produtos mais vendidos</option>
                                <option value="menos-vendido">Produtos menos vendidos</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="<?php echo site_url('/vendas') ?>" class="btn btn-default">Limpar filtro</a>
                    </form>
                </div>
                <div class="col-xs-12">
                    <table class="table table-bordered">
                        <?php foreach($vendas as $vend): ?>
                        <tr>
                            <td><?php echo '#'.$vend['id']; ?></td>
                            <td><?php echo 'Nome: '.$vend['nome']; ?></td>
                            <td><?php echo 'Tipo: '.$vend['tipo']; ?></td>
                            <td><?php echo 'Valor: R$'.str_replace('.',',',$vend['valor']); ?></td>
                            <td><?php echo 'estoque_entrada: '.$vend['estoque']; ?></td>
                            <td><?php echo 'vendas: '.$vend['vendas']; ?></td>
                            <td><?php echo 'estoque_loja: '.$vend['estoque_loja']; ?></td>
                            <td>    <button class="btn btn-danger"  onClick="javascript: excluir(<?php echo $vend['id'] ?>)"><span class="glyphicon glyphicon-trash"></span> Excluir/ Cancelar venda</button></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <div class="col-xs-12">
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="<?php echo site_url('vendas/authenticate') ?>" method="post">
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
        function excluir(id){
            $("#action").val("deletar");
            $("#prod_id").val(id);
            $('#myModal').modal('show');
        }
    </script>
</body>
</html>