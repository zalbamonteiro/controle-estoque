    <main>
        <div class="container">                
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <h2>Editar Fornecedores </h2>    
                    <form action="<?php echo site_url('/fornecedores/update'); ?>" method="post">
                    <div class="form-group">
                            <label>Nome </label>
                            <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $forn[0]->nome ?>" required>
                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $forn[0]->cod_fornecedor ?>">
                        </div>
                        <div class="form-group">
                            <label>CNPJ </label>
                            <input type="number" maxlength="14" name="cnpj" id="cnpj" class="form-control" value="<?php echo $forn[0]->cnpj ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Endereço </label>
                            <input type="text" name="endereco" id="enredeco" class="form-control" value="<?php echo $forn[0]->endereco?>" required>
                        </div>
                        <div class="form-group">
                            <label>E-mail </label>
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo $forn[0]->email?>" required>
                        </div>
                        <div class="form-group">
                            <label>UF </label>
                            <input type="text" maxlength="2" name="estado" id="estado" class="form-control" value="<?php echo $forn[0]->estado?>" required>
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