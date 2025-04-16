<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title><?= $title ?></title>
    <style>
        body {
            background-color: #f5f5f5;
        }

        .main-title {
            color: #333;
            font-size: 2.5rem;
            font-weight: bold;
            padding: 10px 0;
        }

        .form-container, .table-container {
            background-color: #ffffff;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-info {
            background-color: #495057;
            border-color: #495057;
        }

        .table-container {
            overflow-x: auto; /* Permite o scroll horizontal */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #6c757d;
            color: #fff;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <h1 class="main-title">Listagem de Pessoas</h1>
            </div>
        </div>

        <div class="form-container">
            <form method="get" action="<?= base_url('dashboard/pesquisar')?>">
                <div class="form-row align-items-end">
                    <div class="form-group col-md-3">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="busca" name="busca" placeholder="Digite o nome">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tipo">Tipo de Pessoa</label>
                        <select class="form-control" id="tipo" name="tipo">
                            <option value="">Selecione</option>
                            <option value="PF">Física</option>
                            <option value="PJ">Jurídica</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="data_inicio">Data de Nascimento (De)</label>
                        <input type="date" class="form-control" id="data_inicio" name="data_inicio">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="data_fim">Data de Nascimento (Até)</label>
                        <input type="date" class="form-control" id="data_fim" name="data_fim">
                    </div>
                    <div class="form-group col-md-2 align-self-end">
                        <button type="submit" class="btn btn-primary btn-block">Buscar</button>
                    </div>
                    <div class="form-group col-md-2 align-self-end">
                    <a href="<?= base_url('index.php/dashboard/new') ?>" class="btn btn-info btn-block">Cadastrar Usuário</a>

                    </div>
                </div>
            </form>
        </div>

        <div class="table-container">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>CPF</th>
                        <th>Data de Nascimento</th>
                        <th>Endereço</th>
                        <th>Bairro</th>
                        <th>CEP</th>
                        <th>Estado</th>
                        <th>Cidade</th>
                        <th>Telefone</th>
                        <th>Celular</th>
                        <th>Inscrição Estadual</th>
                        <th>Observações</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($pessoas_cadastradas as $pessoas_cadastradas) :?>
                    <tr>
                        <td><?= $pessoas_cadastradas['id']?></td>
                        <td><?= $pessoas_cadastradas['nome']?></td>
                        <td><?= $pessoas_cadastradas['tipo']?></td>
                        <td><?= $pessoas_cadastradas['cpf']?></td>
                        <td><?= $pessoas_cadastradas['data_nascimento']?></td>
                        <td><?= $pessoas_cadastradas['endereco']?></td>
                        <td><?= $pessoas_cadastradas['bairro']?></td>
                        <td><?= $pessoas_cadastradas['cep']?></td>
                        <td><?= $pessoas_cadastradas['estado']?></td>
                        <td><?= $pessoas_cadastradas['cidade']?></td>
                        <td><?= $pessoas_cadastradas['telefone']?></td>
                        <td><?= $pessoas_cadastradas['celular']?></td>
                        <td><?= $pessoas_cadastradas['inscricao_estadual']?></td>
                        <td><?= $pessoas_cadastradas['observacao']?></td>
                        <td>
                            
                            <a href="<?= base_url()?>dashboard/editar/<?= $pessoas_cadastradas['id']?>" class="btn btn-primary btn-sm btn-waring">Editar</a>
                            <a href="<?= base_url()?>dashboard/delete/<?= $pessoas_cadastradas['id']?>" class="btn btn-danger btn-sm" onclick="confirm('Você deseja apagar o cadastro?') ">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2LcBeirfP7EVSc6Q0BEjpmI1zYGGo//Q5Vcgf+3DdE" crossorigin="anonymous"></script>
</body>
</html>
