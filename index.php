<?php

require_once 'app/core/Core.php';

require_once 'lib/database/Connection.php';

require_once 'app/controller/HomeController.php';
require_once 'app/controller/ErroController.php';
require_once 'app/controller/ClienteController.php';
require_once 'app/controller/AdminController.php';
require_once 'app/controller/ContatosController.php';
require_once 'app/controller/RelatoriosController.php';

require_once 'app/model/Cliente.php';
require_once 'app/model/Contato.php';
require_once 'app/model/Relatorio.php';

require_once 'vendor/autoload.php'; 
$template = file_get_contents('app/template/estrutura.html');

ob_start();
$core = new Core;
$core->start($_GET);

$saida = ob_get_contents(); 
ob_end_clean();

$tplPronto = str_replace('{{area_dinamica}}', $saida, $template); 
echo $tplPronto;
