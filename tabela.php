<?php
require_once "conexao.php";

$conn = new Conexao();

$sql = "SELECT * FROM usuarios";
$stmt = $conn->conexao->query($sql);
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
</head>
<body>

<div class="container mt-5">
    
    <table id="userTable" class="table table-bordered">
        <thead>
        <tr>
            <th>CPF</th>
            <th>Nome</th>>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= $usuario['cpf'] ?></td>
                <td><?= $usuario['nome'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<button id="limparTabela" class="btn btn-danger">Limpar Tabela</button>
<button id="botaoVoltar"><a href="home.php" >Login</a></button>
<a href="cadastrar.php">Cadastrar Usuario</a>

<!-- DataTables JS (Bootstrap 5) -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function() {
            var table = $('#userTable').DataTable();

            // Evento de clique para o botão "Limpar Tabela"
            $("#limparTabela").click(function() {
                table.clear().draw();
                

            });
        });
    </script>


</script>
</body>
</html>