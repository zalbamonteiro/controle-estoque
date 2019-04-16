    <main>
        <div class="container">                
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <h2>Adicionar novo Produto</h2>    
                    <form action="add" method="post">
                        <div class="form-group">
                            <label>Nome: </label>
                            <input type="text" name="nome" id="nome" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tipo: </label>
                            <input type="text" name="tipo" id="tipo" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Valor: </label>
                            <input type="text" name="valor" id="valor" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Quantidade em estoque: </label>
                            <input type="text" name="estoque" id="estoque" class="form-control" required>
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