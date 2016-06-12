<?php

namespace Code\Sistema\Mapper;

use Code\Sistema\Entity\Cliente;

class ClienteMapper
{
    private $dados = [
        [
            'id' => 0,
            'nome' => 'Cliente 1',
            'email' => 'cliente1@email.com'
        ],
        [
            'id' => 1,
            'nome' => 'Cliente 2',
            'email' => 'cliente2@email.com'
        ]
    ];

    public function insert(Cliente $cliente)
    {
        return [
            'success' => true
        ];
    }

    public function update($id, $cliente)
    {
        return [
            'success' => true
        ];
    }

    public function delete($id)
    {
        return [
            'success' => true
        ];
    }

    public function fetchAll()
    {
        return $this->dados;
    }

    public function find($id)
    {
        return $this->dados[$id];
    }
}