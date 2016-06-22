<?php

libxml_use_internal_errors(true);

/* Cria um novo objeto da classe DomDocument */
$objDom = new DomDocument();

/* Carrega o arquivo XML */
$objDom->load("sistemaVendas.xml");

/* Tenta validar os dados utilizando o arquivo XSD */
if (!$objDom->schemaValidate("sistemaVendas.xsd")) {

    $arrayAllErrors = libxml_get_errors();
   
    // print_r($arrayAllErrors);

     echo "<pre>";
        print_r($arrayAllErrors);
        echo "</pre>";
   
} else {

    /* XML validado! */
    echo "XML obedece a regras definidas no arquivo XSD!";
   
}

?>