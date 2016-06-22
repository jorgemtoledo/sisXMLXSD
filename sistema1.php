<?php
include_once 'banco_de_dados.php';
include_once 'includes/header.php';
?>

    <div class="container"><br><br>
    <div><br><br>
    </div>
    <a href="converteSistema1.php" class="btn btn-primary btn-lg " role="button">Converter Sistema 1</a><br><br>

  <table class="table table-striped">
            <tr>
                <th>CPF</th>
                <th>Nome</th>
                <th>Sexo</th>
                <th>Data Nascimento</th>
                <th>Credito</th>
            </tr>
            <?php foreach($pdo->query('SELECT * FROM cliente') as $c): ?>
                <tr>
                    <td><?php echo $c['cpf']; ?></td>
                    <td><?php echo $c['nome']; ?></td>
                    <td><?php echo $c['sexo']; ?></td>
                    <td><?php echo $c['data_nasc']; ?></td>
                    <td><?php echo $c['credito']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>

<?php
    include_once 'includes/footer.php';
?>