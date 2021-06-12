<?php
class AdminController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/view'); //vai criar um objeto para carregar a pasta que tem as views
        $twig = new \Twig\Environment($loader); // cria objeto enviroment que carrega o objeto loader
        $template = $twig->load('admin.html');

        $objClientes = Cliente::selecionaTodos();

        $parametros = array();
        $parametros['clientes'] = $objClientes;

        $conteudo = $template->render($parametros);
        echo $conteudo;
    }

    public function create()
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/view'); //vai criar um objeto para carregar a pasta que tem as views
        $twig = new \Twig\Environment($loader); // cria objeto enviroment que carrega o objeto loader
        $template = $twig->load('create.html');

        $parametros = array();

        $conteudo = $template->render($parametros);
        echo $conteudo;
    }

    public function insert()
    {
        try {
            Cliente::insert($_POST);

            echo '<script>alert("Publicaçao inserida com sucesso!");</script>';
            echo '<script>location.href="http://localhost/desafio/"</script>';
        } catch (Exception $e) {
            echo '<script>alert("' . $e->getMessage() . '")</script>';
            echo '<script>location.href="http://localhost/desafio/?pagina=admin&metodo=create"</script>';
        }
    }

    public function change($paramId)
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/view'); //vai criar um objeto para carregar a pasta que tem as views
        $twig = new \Twig\Environment($loader); // cria objeto enviroment que carrega o objeto loader
        $template = $twig->load('update.html');

        $cliente = Cliente::selecionaPorId($paramId);

        $parametros = array();
        $parametros['id'] = $cliente->id;
        $parametros['nome'] = $cliente->nome;
        $parametros['telefone'] = $cliente->telefone;
        $parametros['email'] = $cliente->email;

        $conteudo = $template->render($parametros);
        echo $conteudo;
    }

    public function update()
    {
        try {
            Cliente::update($_POST);
            echo '<script>alert("Publicaçao alterada com sucesso!");</script>';
            echo '<script>location.href="http://localhost/desafio/"</script>';
        } catch (Exception $e) {
            echo '<script>alert("' . $e->getMessage() . '")</script>';
            echo '<script>location.href="http://localhost/desafio/?pagina=admin&metodo=change&id=' . $_POST['id'] . '"</script>';
        }
    }

    public function delete($paramId)
    {
        try {
            Cliente::delete($paramId);
            echo '<script>alert("Publicaçao excluida com sucesso!");</script>';
            echo '<script>location.href="http://localhost/desafio"</script>';
        } catch (Exception $e) {
            echo '<script>alert("' . $e->getMessage() . '")</script>';
            echo '<script>location.href="http://localhost/desafio"</script>';
        }
    }
}
