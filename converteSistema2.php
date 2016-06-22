<?php
include_once 'banco_de_dados.php';
include_once 'includes/header.php';
?>

    <div class="container"><br><br>
    <div><br><br>

    </div>


<?php
$link = mysql_connect("localhost", "####", "#####") or print (mysql_error()); 
mysql_select_db("sistemaXML", $link) or print(mysql_error());

$XML = "";
$XML .= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<clientes>\n";
$Query = "SELECT * from cliente2";
  $Result=mysql_query($Query);
  $NumFields = mysql_num_fields($Result);
$row = true;
while ($row = mysql_fetch_row($Result)){
	$XML .= "<cliente>\n";

	for ($i=0; $i < $NumFields; $i++)
    {
	    $XML .= "\n<" . mysql_field_name($Result, $i) . ">" . $row[$i] . "</" . mysql_field_name($Result, $i) . ">\n";
    }
	$XML .= "</cliente>\n";
}

$XML .= "</clientes>";
// echo ($XML);
echo  "<h1>Arquivo XML criado com sucesso!</h1>";
mysql_close();
?>

<?php 
	//Gera o arquivo xml
	file_put_contents('sistemaCliente2.xml',$XML);
?>

<?php

$link = mysql_connect("localhost", "###", "######") or print (mysql_error()); 
mysql_select_db("sistemaXML", $link) or print(mysql_error());

$XML = "";
$XML .= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<clientes>\n";
$Query = "SELECT cliente, count(cliente) as quantidade, sum(valor) as somar FROM vendas GROUP BY cliente";
  $Result=mysql_query($Query);
  $NumFields = mysql_num_fields($Result);

$row = true;

while ($row = mysql_fetch_row($Result)){
  $XML .= "<vendas>\n";

  for ($i=0; $i < $NumFields; $i++)
    {
      $XML .= "\n<" . mysql_field_name($Result, $i) . ">" . $row[$i] . "</" . mysql_field_name($Result, $i) . ">\n";
    }
  $XML .= "</vendas>\n";
}

$XML .= "</clientes>";
// echo ($XML);
mysql_close();
?>

<?php 
  //Gera o arquivo xml
  file_put_contents('sistemaVendas.xml',$XML);
?>



<a href="sistemaCliente2.xml" class="btn btn-primary btn-lg " role="button"> Dados Clientes Sistema 2</a><br><br>
<a href="validarSistema2.php" class="btn btn-warning btn-lg " role="button"> Validar XSD Sistema 2</a><br><br>

<a href="sistemaVendas.xml" class="btn btn-success btn-lg " role="button"> Vendas Clientes Sistema 2</a><br><br>
<a href="validarVendasSistema2.php" class="btn btn-warning btn-lg " role="button"> Valida XSD Vendas Sistema 2</a>




    </div>

<?php
    include_once 'includes/footer.php';
?>

