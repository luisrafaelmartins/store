<?php

return [
    'orders' => [
        'pk' => 'id',
        'route' => 'orders',
        'title' => 'Encomendas',
        'deletable' => false,
        'editable' => true,
        'list' => [
            'shipname' => 'Nome',
            'shipemail' => 'Email',
            'phone' => 'Telefone',
            'total' => 'Total',
            'address' => 'Endereço',
            'postal_code' => 'Código Postal',
            'order_number' => 'nª Factura',
        ],
        'fields' => [
            'shipped' => [
                'name' => 'shipped',
                'designation' => 'Enviado',
                'type' => 'checkbox',
                'visible' => true,
            ],
            'shipname' => [
                'name' => 'shipname',
                'designation' => 'Nome',
                'type' => 'input',
                'visible' => true,
            ],
            'shipemail' => [
                'name' => 'shipemail',
                'designation' => 'Email',
                'type' => 'input',
                'visible' => true,
            ],
            'phone' => [
                'name' => 'phone',
                'designation' => 'Telefone',
                'type' => 'input',
                'visible' => true,
            ],
            'submit' => [
                'name' => 'save',
                'designation' => 'Guardar',
                'type' => 'submit',
                'visible' => true,
            ],
        ]
    ],
    'products' => [
        'pk' => 'id',
        'route' => 'products',
        'title' => 'Produtos',
        'deletable' => true,
        'editable' => true,
        'list' => [
            'id' => 'ID',
            'name' => 'Nome',
            'designation' => 'Descrição',
            'brand' => 'Marca',
            'category' => 'Categoria',
            'type' => 'Tipo',
            'stock' => 'Stock',
            'available' => 'Disponível',
        ],
        'fields' => [
            'id' => [
                'name' => 'id',
                'designation' => 'id',
                'type' => 'hidden',
                'visible' => false,
            ],
            'name' => [
                'name' => 'name',
                'designation' => 'Nome',
                'type' => 'input',
                'visible' => true,
            ],
            'designation' => [
                'name' => 'designation',
                'designation' => 'Descrição',
                'type' => 'textarea',
                'visible' => true,
            ],
            'brand_id' => [
                'name' => 'brand_id',
                'designation' => 'Marca',
                'type' => 'dropdown',
                'visible' => true,
                'list' => 'brands',
            ],
            'brand' => [
                'name' => 'brand',
                'designation' => 'Nova Marca',
                'type' => 'input',
                'visible' => false,
            ],
            'category_id' => [
                'name' => 'category_id',
                'designation' => 'Categoria',
                'type' => 'dropdown',
                'visible' => true,
                'list' => 'categories',
            ],
            'category' => [
                'name' => 'category',
                'designation' => 'Nova Categoria',
                'type' => 'input',
                'visible' => false,
            ],
            'type_id' => [
                'name' => 'type_id',
                'designation' => 'Tipo',
                'type' => 'dropdown',
                'visible' => true,
                'list' => 'types'
            ],
            'type' => [
                'name' => 'type',
                'designation' => 'Novo Tipo',
                'type' => 'input',
                'visible' => false,
            ],
            'available' => [
                'name' => 'available',
                'designation' => 'Disponível',
                'type' => 'checkbox',
                'visible' => true,
            ],
            'stock' => [
                'name' => 'stock',
                'designation' => 'Stock',
                'type' => 'input',
                'visible' => true,
            ],
            'submit' => [
                'name' => 'save',
                'designation' => 'Guardar',
                'type' => 'submit',
                'visible' => true,
            ],
        ]
    ],
];