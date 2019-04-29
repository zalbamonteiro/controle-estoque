<main>
        <div class="container">                
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <h2>Adicionar novo Fornecedor</h2>                       
                </div>
                <div class="col-xs-6 col-xs-offset-3">
                    
                </div>
                <div class="col-xs-6 col-xs-offset-3">
                    <hr/>
                </div>
                <div class="col-xs-6 col-xs-offset-3">
                    <form action="<?php echo site_url('fornecedores/add') ?>" method="post">                        
                        <div class="form-group">
                            <label>Nome </label>
                            <input type="text" name="nome" id="nome" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>CNPJ </label>
                            <input type="number" maxlength="14" name="cnpj" id="cnpj" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Endereço </label>
                            <input type="text" name="endereco" id="enredeco" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>E-mail </label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>UF </label>
                            <input type="text" maxlength="2" name="estado" id="estado" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Produto </label>                            
                            <select class="form-control" name="produto" class="form-control" required>
                                <?php foreach($produtos as $prod): ?>
                                    <option value="<?php echo $prod['id']; ?>"><?php echo $prod['nome']; ?></option>
                                <?php endforeach; ?>
                            </select>
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