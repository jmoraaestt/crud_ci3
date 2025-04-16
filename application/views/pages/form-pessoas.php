<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Cadastro'; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4"><?= isset($cadastro) ? 'Editar Cadastro' : 'Novo Cadastro'; ?></h1>
        <?php if(isset($cadastro)) : ?>
            <form action="<?= base_url('dashboard/update/'.$cadastro['id']) ?>" method="post">
        <?php else : ?>
            <form action="<?= base_url('dashboard/inserir') ?>" method="post">
        <?php endif; ?>
            <div class="form-group">
                <label for="nome">Nome</label>
                <!-- cadastro está definida e não é nula? - htmlspecialchars($cadastro['endereco'], ENT_QUOTES) - Converte caracteres especiais em  entidades HTML -->
                <input type="text" id="nome" name="nome" class="form-control" value="<?= isset($cadastro) ? htmlspecialchars($cadastro['nome'], ENT_QUOTES) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo</label>
                <select id="tipo" name="tipo" class="form-control" required>
                    <option value="" hidden></option>
                    <option value="PF" <?= (isset($cadastro) && $cadastro['tipo'] == 'PF') ? 'selected' : ''; ?>>Pessoa Física (PF)</option>
                    <option value="PJ" <?= (isset($cadastro) && $cadastro['tipo'] == 'PJ') ? 'selected' : ''; ?>>Pessoa Jurídica (PJ)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" class="form-control" value="<?= isset($cadastro) ? htmlspecialchars($cadastro['cpf'], ENT_QUOTES) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" value="<?= isset($cadastro) ? htmlspecialchars($cadastro['data_nascimento'], ENT_QUOTES) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" name="endereco" class="form-control" value="<?= isset($cadastro) ? htmlspecialchars($cadastro['endereco'], ENT_QUOTES) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="bairro">Bairro</label>
                <input type="text" id="bairro" name="bairro" class="form-control" value="<?= isset($cadastro) ? htmlspecialchars($cadastro['bairro'], ENT_QUOTES) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="cep">CEP</label>
                <input type="text" id="cep" name="cep" class="form-control" value="<?= isset($cadastro) ? htmlspecialchars($cadastro['cep'], ENT_QUOTES) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <select id="estado" name="estado" class="form-control" required>
                    <option value="" hidden></option>
                    <option value="SP" <?= (isset($cadastro) && $cadastro['estado'] == 'SP') ? 'selected' : ''; ?>>São Paulo</option>
                    <option value="RJ" <?= (isset($cadastro) && $cadastro['estado'] == 'RJ') ? 'selected' : ''; ?>>Rio de Janeiro</option>
                    <option value="MG" <?= (isset($cadastro) && $cadastro['estado'] == 'MG') ? 'selected' : ''; ?>>Minas Gerais</option>
                    <option value="ES" <?= (isset($cadastro) && $cadastro['estado'] == 'ES') ? 'selected' : ''; ?>>Espírito Santo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" id="cidade" name="cidade" class="form-control" value="<?= isset($cadastro) ? htmlspecialchars($cadastro['cidade'], ENT_QUOTES) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" name="telefone" class="form-control" value="<?= isset($cadastro) ? htmlspecialchars($cadastro['telefone'], ENT_QUOTES) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="celular">Celular</label>
                <input type="text" id="celular" name="celular" class="form-control" value="<?= isset($cadastro) ? htmlspecialchars($cadastro['celular'], ENT_QUOTES) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="inscricao_estadual">Inscrição Estadual</label>
                <input type="text" id="inscricao_estadual" name="inscricao_estadual" class="form-control" value="<?= isset($cadastro) ? htmlspecialchars($cadastro['inscricao_estadual'], ENT_QUOTES) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="observacao">Observações</label>
                <textarea name="observacao" id="observacao" class="form-control" rows="3"><?= isset($cadastro) ? htmlspecialchars($cadastro['observacao'], ENT_QUOTES) : ''; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
    
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7-beta.19/jquery.inputmask.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#cpf').inputmask('999.999.999-99');
            $('#data_nascimento').inputmask('99/99/9999');
            $('#cep').inputmask('99999-999');
            $('#telefone').inputmask('(99) 9999-9999');
            $('#celular').inputmask('(99) 99999-9999');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2LcBeirfP7EVSc6Q0BEjpmI1zYGGo//Q5Vcgf+3DdE" crossorigin="anonymous"></script>
</body>
</html>
