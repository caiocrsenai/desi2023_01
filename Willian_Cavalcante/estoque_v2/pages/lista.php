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
                        <th>Excluir</th>
                        <th width="10px">Excluir</th>
                        <th width="10px">Excluiraa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM produtos";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_object()) 
                        
                        {
                    ?>
                     <?php foreach ($produtos as $produto): ?>
                            <tr>
                                <td><?= $produto['id'] ?></td>
                                <td><?= $produto['name'] ?></td>
                                <td><?= $produto['description'] ?></td>
                                <td><?= $produto['price'] ?></td>
                                <td><?= $produto['quantity'] ?></td>
                                <td>
                                    <a href="?page=lista&id=<?php echo $row->id; ?>" onclick="return confirm('Tem certeza que deseja excluir este produto?')" class="btn-status color-blue">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <div class="delete-user btn-status color-red" data-id="<?php echo $row->id; ?>">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
