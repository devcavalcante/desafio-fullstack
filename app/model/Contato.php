<?php

class Contato
{
    public static function selecionarContatos($idCliente)
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM contato WHERE idcliente = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $idCliente, PDO::PARAM_INT);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Contato')) {
            $resultado[] = $row;
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

        $sql = $con->prepare('INSERT INTO contato (nome, telefone, email, idcliente) VALUES (:nome, :tel, :email, :idc)');
        $sql->bindValue(':nome', $dadosPost['nome']);
        $sql->bindValue(':email', $dadosPost['email']);
        $sql->bindValue(':tel', $dadosPost['telefone']);
        $sql->bindValue(':idc', $dadosPost['idcliente']);
        $sql->execute();

        if ($sql->rowCount()) {
            return true;
        }
        throw new Exception("falha ao inserir contato");
    }

    public static function selecionaPorId($idClient)
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM contato WHERE id = :id";
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

    public static function update($params)
    {
        $con = Connection::getConn();

        $sql = "UPDATE contato SET nome = :nome, email = :email, telefone = :tel WHERE id = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $params['id']);
        $sql->bindValue(':email', $params['email']);
        $sql->bindValue(':tel', $params['telefone']);
        $sql->bindValue(':nome', $params['nome']);
        $resultado = $sql->execute();

        if ($resultado == 0) {
            throw new Exception("falha ao alterar contato");
            return false;
        }

        return true;
    }

    public static function delete($id)
    {
        $con = Connection::getConn();

        $sql = "DELETE FROM contato WHERE id = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $id);
        $resultado = $sql->execute();

        if ($resultado == 0) {
            throw new Exception("falha ao deletar o contato");
            return false;
        }

        return true;
    }
}
