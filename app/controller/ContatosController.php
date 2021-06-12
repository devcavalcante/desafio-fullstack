<?php
class ContatosController
{
    public function create($paramId)
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/view/contatos'); 
        $twig = new \Twig\Environment($loader); 
        $template = $twig->load('create.html');

        $parametros = array();
        $cliente = Cliente::selecionaPorId($paramId);

        $parametros = array();
        $parametros['id'] = $cliente->id;

        $conteudo = $template->render($parametros);
        echo $conteudo;
    }

    public function change($paramId)
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/view/contatos'); //vai criar um objeto para carregar a pasta que tem as views
        $twig = new \Twig\Environment($loader); // cria objeto enviroment que carrega o objeto loader
        $template = $twig->load('update.html');

        $contato = Contato::selecionaPorId($paramId);

        $parametros = array();
        $parametros['id'] = $contato->id;
        $parametros['nome'] = $contato->nome;
        $parametros['telefone'] = $contato->telefone;
        $parametros['email'] = $contato->email;
        $parametros['idcliente'] = $contato->idcliente;

        $conteudo = $template->render($parametros);
        echo $conteudo;
    }

    public function update()
    {
        try {
            Contato::update($_POST);
            echo '<script>alert("Contato alterado com sucesso!");</script>';
            echo '<script>location.href="http://localhost/desafio/?pagina=cliente&id=' . $_POST['idcliente'] . '"</script>';
        } catch (Exception $e) {
            echo '<script>alert("' . $e->getMessage() . '")</script>';
            echo '<script>location.href="http://localhost/desafio/?pagina=admin&metodo=change&id=' . $_POST['id'] . '"</script>';
        }
    }

    public function delete($paramId)
    {
        $contato = Contato::selecionaPorId($paramId);
        try {
            Contato::delete($paramId);

            echo '<script>alert("Contato excluido com sucesso!");</script>';
            echo '<script>location.href="http://localhost/desafio?pagina=cliente&id=' . $contato->idcliente . '"</script>';
        } catch (Exception $e) {
            echo '<script>alert("' . $e->getMessage() . '")</script>';
            echo '<script>location.href="http://localhost/desafio"</script>';
        }
    }
}
