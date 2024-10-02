<?php

$pdo = new PDO("mysql:host=localhost;dbname=estoque", "produtos");



$stmt = $pdo->query("SELECT * FROM produtos");
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
if (!empty($_GET['id'])) {
    $idUser = $_GET['id'];

    $sql = "DELETE FROM produtos WHERE produtos.id = " . $idUser . ";";

    $result = $con->query($sql);
    if ($con->affected_rows > 0) {
        echo "<script>alert('Produto excluido com sucesso!')</script>";
    }
}
?>

<div class="container-box flex-1">
    <div class="cb-header">
        <div class="cb-title">Controle de Estoque</div>
    </div>
    <div class="cb-body">
        <div class="table-container">
            <table>
                <thead>
                    <a href="?page=cadastrar-produto">Adicionar Produto</a>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th width="10px">Editar</th>
                        <th width="10px">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM produtos";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($produto = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?= $produto['id'] ?></td>
                                <td><?= $produto['name'] ?></td>
                                <td><?= $produto['description'] ?></td>
                                <td><?= $produto['price'] ?></td>
                                <td><?= $produto['quantity'] ?></td>
                                <td>
                                    <a href="?page=cadastrar-produto&id=<?php echo $produto['id']; ?>" class="btn-status color-blue">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="delete-user btn-status color-red" href="?page=lista&id=<?php echo $produto['id']; ?>" data-id="<?php echo $produto['id']; ?>">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>