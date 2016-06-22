<?php
include_once 'banco_de_dados.php';
include_once 'includes/header.php';
?>
    <div class="container"><br><br>
    <div><br><br>
    </div>
    <?php
    // $link = mysql_connect("host=localhost dbname=sistemaJean user=root password=root##");
    $link = mysql_connect("localhost", "####", "####") or print (mysql_error()); 
    mysql_select_db("sistemaXML", $link) or print(mysql_error());
    // print "Conexão e Seleção OK!";

    $XML = "";
    $XML .= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<clientes>\n";
    $Query = "SELECT * from cliente";
    	$resultado=mysql_query($Query);
    	while($row=mysql_fetch_array($resultado) )
    	{
    		$remove = array(".", "-");
    		$XML .=  "\n<cliente>";
    		$row['cpf'] = str_replace($remove, "", $row['cpf']);

    		$XML .=   "\n<cpf>".$row['cpf']."</cpf>";

    		$XML .=   "\n<nome>".$row['nome']."</nome>";

    		// Valida o sexo
    		if($row['sexo'] == "1")
    			$sexo="M";
    		else if($row['sexo'] == "2")
    			$sexo = "F";
    		$XML .=   "\n<sexo>".$sexo."</sexo>";

    		// Calcula idade
    		$barra = "/";
    		$anoSemBarra = str_replace($barra, "", $row['data_nasc']);
    		$anoNascimento = substr($anoSemBarra,-4);
    		$anoSemBarra = substr($anoSemBarra,-4);
    		$mesNascimento = substr($anoSemBarra,-2);
    		$idade = 2016 - $anoNascimento;
    		if($mesNascimento>6){
    			$idade = $idade - 1;
    		}
    		$XML .=   "\n<data_nasc>".$idade."</data_nasc>";

    		// Valida o credito
    		if($row['credito']>0){
    			$XML .=   "\n<credito>"."S"."</credito>";
    		}
    		else{
    			$XML .=   "\n<credito>"."N"."</credito>";
    		}
    		$XML .=   "\n</cliente>";
    	}
    $XML .=   "\n</clientes>";

    // echo ($XML);
    echo  "<h1>Arquivo XML criado com sucesso!</h1>";
    mysql_close();?>

    <?php
    	//Gera o arquivo xml
    	file_put_contents('sistemaCliente1.xml',$XML);
    ?>
    <a href="sistemaCliente1.xml" class="btn btn-primary btn-lg " role="button"> Dados XML Sistema 1</a>
    <a href="validarSistema1.php" class="btn btn-warning btn-lg " role="button"> Validar XSD Sistema 1</a>
    </div>

<?php
    include_once 'includes/footer.php';
?>