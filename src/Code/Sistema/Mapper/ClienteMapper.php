<?php

namespace Code\Sistema\Mapper;

use Code\Sistema\Entity\Cliente;

class ClienteMapper
{
    public function insert(Cliente $cliente)
    {
        return [
            'nome' => 'Cliente x',
            'email' => 'clientex@email.com'
        ];
    }

    public function fetchAll()
    {
        $dados = [
            [
                'nome' => 'Cliente 1',
                'email' => 'cliente1@email.com'
            ],
            [
                'nome' => 'Cliente 2',
                'email' => 'cliente2@email.com'
            ]
        ];

        return $dados;
    }
}