<?php
class RelatoriosController
{
    public function index()
    {
        try {
            $relatorio = Relatorio::exibeTodos();

            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('report.html');

            $parametros = array();
            $parametros['clientes'] = $relatorio;

            $conteudo = $template->render($parametros);
            echo $conteudo;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
