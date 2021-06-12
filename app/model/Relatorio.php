<?php
class Relatorio
{
    public static function exibeTodos()
    {
        $con = Connection::getConn();

        $sql = "SELECT cliente.nome, cliente.telefone, cliente.email, contato.nome nomeContato, contato.telefone telefoneContato, contato.email emailContato
        FROM cliente
        LEFT JOIN contato ON cliente.id = contato.idcliente";
        $sql = $con->prepare($sql);
        $sql->execute();

        $resultado = array();

        while ($row = $sql->fetchObject('Cliente')) {
            $resultado[] = $row;
        }

        return $resultado;
    }
}
