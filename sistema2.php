<?php
include_once 'banco_de_dados.php';
include_once 'includes/header.php';
?>

    <div class="container"><br><br>
    <div><br><br>
    </div>
    <a href="converteSistema2.php" class="btn btn-primary btn-lg " role="button">Converter Sistema 2</a><br><br>
    <?php
            if(isset($_SESSION['message'])){
                echo '<p class="message">'.$_SESSION['message'].'</p>';
                unset($_SESSION['message']);
            }
    ?>
    <div><h1>Clientes - Sistema 2 </h1></div><br><br>

        <table class="table table-striped">
            <tr>
                <th>CPF</th>
                <th>Nome</th>
                <th>Sexo</th>
                <th>Idade</th>
                <th>Ativo</th>
            </tr>
            <?php foreach($pdo->query('SELECT * FROM cliente2') as $c): ?>
                <tr>
                    <td><?php echo $c['cpf']; ?></td>
                    <td><?php echo $c['nome']; ?></td>
                    <td><?php echo $c['sexo']; ?></td>
                    <td><?php echo $c['idade']; ?></td>
                    <td><?php echo $c['ativo']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table><br>

        <div><h1>Vendas - Sistema 2 </h1></div><br><br>

        <table class="table table-striped">
            <tr>
                <th>Cliente</th>
                <th>Valor</th>
            </tr>
            <?php foreach($pdo->query('SELECT * FROM vendas') as $c): ?>
                <tr>
                    <td><?php echo $c['cliente']; ?></td>
                    <td><?php echo $c['valor']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table><br>


        <div><h1>Todal Valores Vendas - Sistema 2 </h1></div><br><br>

        <table class="table table-striped">
            <tr>
                <th>Cliente</th>
                <th>Valor</th>
            </tr>
            <?php foreach($pdo->query('SELECT cliente, count(cliente) as qt, sum(valor) as somar FROM vendas GROUP BY cliente') as $c): ?>
                <tr>
                    <td><?php echo $c['cliente']; ?></td>
                    <td><?php echo $c['somar']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>


    </div><!-- /.container -->


<?php
    include_once 'includes/footer.php';
?>