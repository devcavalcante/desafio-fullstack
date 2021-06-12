<?php
class Cliente
{
    public static function selecionaTodos() 
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM cliente ORDER BY id ASC";
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Cliente')) {
            $resultado[] = $row;
        }

        return $resultado;
    }

    public static function selecionaPorId($idClient)
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM cliente WHERE id = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $idClient, PDO::PARAM_INT);
        $sql->execute();

        $resultado = $sql->fetchObject('Cliente');

        if (!$resultado) {
            throw new Exception("Não foi encontrado nenhum registro no banco");
        } else {
            $resultado->contatos = Contato::selecionarContatos($resultado->id);
        }
        return $resultado;
    }

    public static function insert($dadosPost)
    {
        if (empty($dadosPost['nome']) or empty($dadosPost['telefone']) or empty($dadosPost['email'])) {
            throw new Exception("Preencha todos os campos");
            return false;
        }

        $con = Connection::getConn();
        $now = new DateTime();

        $sql = $con->prepare('INSERT INTO cliente (nome, telefone, email, data_registro) VALUES (:nome, :tel, :email, :data_r)');
        $sql->bindValue(':nome', $dadosPost['nome']);
        $sql->bindValue(':email', $dadosPost['email']);
        $sql->bindValue(':tel', $dadosPost['telefone']);
        $sql->bindValue(':data_r', $now->format('Y-m-d'));
        $res = $sql->execute();

        if ($res == 0) {
            throw new Exception("falha ao inserir publicação");
            return false;
        }

        return true;
    }

    public static function update($params)
    {
        $con = Connection::getConn();

        $sql = "UPDATE cliente SET nome = :nome, email = :email, telefone = :tel WHERE id = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $params['id']);
        $sql->bindValue(':email', $params['email']);
        $sql->bindValue(':tel', $params['telefone']);
        $sql->bindValue(':nome', $params['nome']);
        $resultado = $sql->execute();

        if ($resultado == 0) {
            throw new Exception("falha ao alterar publicação");
            return false;
        }

        return true;
    }

    public static function delete($id)
    {
        $con = Connection::getConn();

        $sql = "DELETE FROM cliente WHERE id = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $id);
        $resultado = $sql->execute();

        if ($resultado == 0) {
            throw new Exception("falha ao deletar a publicação");
            return false;
        }

        return true;
    }
}
