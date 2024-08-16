<?php

$sql = "SELECT * FROM user";
$stmt = $con->query($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container-box flex-1">
    <div class="cb-header">
        <div class="cb-title">Vendas</div>
    </div>
    <div class="cb-body">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Data de nascimento</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row) {
                        echo ' <tr>
                                <td>
                                    <div class="tbl-info-circle-ct">
                                        <span class="circle"
                                            style="background-color: #04d182;">CB</span>
                                            ' . $row['name'] . '
                                    </div>
                                </td>
                                <td>' . $row['birthdate'] . '</td>
                                <td>' . $row['email'] . '</td>
                                <td>
                                    <div class="tbl-status color-green">Aprovado</div>
                                </td>
                            </tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>