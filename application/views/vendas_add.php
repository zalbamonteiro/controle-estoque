<main>
        <div class="container">                
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <h2>Adicionar nova Venda</h2>   
                    <form class="navbar-form navbar-right" method='post' action="<?php echo site_url('/vendas/search_prod'); ?>">
                        <div class="form-group">
                            <input type="text" class="form-control" name="search" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-xs-6 col-xs-offset-3">
                    <?php if(isset($produtos)): ?>
                        <ul class="list-group">
                            <?php foreach($produtos as $prod): ?>
                                <li class="list-group-item">
                                    <?php echo $prod['nome']; ?>
                                    <button class="btn btn-primary" onClick="javascript: select_prod('<?php echo $prod['nome'] ?>', '<?php echo $prod['id'] ?>')"> Selecionar</button> 
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif;?>
                </div>
                <div class="col-xs-6 col-xs-offset-3">
                    <hr/>
                </div>
                <div class="col-xs-6 col-xs-offset-3">
                    <form action="<?php echo site_url('vendas/add') ?>" method="post">
                        <div class="form-group">
                            <label>produto: </label>
                            <input type="text" name="nome" id="nome" class="form-control" required>
                            <input type="hidden" class="form-control" name="id" id="id">
                        </div>
                        <div class="form-group">
                            <label>Qunatidade vendida: </label>
                            <input type="number" name="tipo" id="tipo" class="form-control" required>
                        </div>
                        <button class="btn btn-primary"> Salvar </button>
                    </form>
                    <?php if(isset($mensagens)) echo $mensagens; ?>
                </div>
            </div>
        </div>
    </main>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        function select_prod(nome, id){
            $("#nome").val(nome);
            $("#foridn_id").val(id);
        }
    </script>
</body>
</html>