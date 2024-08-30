<div class="container-box flex-1">
    <div class="cb-header">
        <div class="cb-title">Vendas</div>
    </div>
    <div class="cb-body">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Usuário</th>
                        <th width="10px">Alterar</th>
                        <th width="10px">Remover</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM user";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_object()) {
                            ?>
                            <tr>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->email; ?></td>
                                <td><?php echo $row->username; ?></td>
                                <td>
                                    <a href="?page=usuario&id=<?php echo $row->id ?>" 
                                    class="btn-status color-blue">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-status color-red">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </div>
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