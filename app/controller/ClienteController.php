<?php
class ClienteController
{
    public function index($params)
    {
        try {
            $cliente = Cliente::selecionaPorId($params);

            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('single.html');

            $parametros = array();
            $parametros['id'] = $cliente->id;
            $parametros['nome'] = $cliente->nome;
            $parametros['telefone'] = $cliente->telefone;
            $parametros['email'] = $cliente->email;
            $parametros['contatos'] = $cliente->contatos;

            $conteudo = $template->render($parametros);
            echo $conteudo;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function store()
    {
        try {
            Contato::insert($_POST);
            echo '<script>alert("Contato adicionado com sucesso!");</script>';
            echo '<script>location.href="http://localhost/desafio/?pagina=cliente&id=' . $_POST['idcliente'] . '"</script>';
        } catch (Exception $e) {
            echo '<script>alert("' . $e->getMessage() . '")</script>';
            echo '<script>location.href="http://localhost/desafio?pagina=cliente&id=' . $_POST['idcliente'] . '"</script>';
        }
    }
}
