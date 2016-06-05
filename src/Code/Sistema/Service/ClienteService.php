<?php

namespace Code\Sistema\Service;

use Code\Sistema\Entity\Cliente;
use Code\Sistema\Mapper\ClienteMapper;

class ClienteService
{
    public function insert(array $data)
    {
        $clienteEntity = new Cliente();
        $clienteEntity->setNome($data['nome']);
        $clienteEntity->setEmail($data['email']);

        $clienteMapper = new ClienteMapper();
        $resultado = $clienteMapper->insert($clienteEntity);

        return $resultado;
    }
}