<?php

return [
    'discount_type_list' => [
        ['id' => 'Valor Fixo','name' => 'Valor Fixo'],
        ['id' => 'Percentagem','name' => 'Percentagem'],
    ],
    'orders' => [
        'pk' => 'id',
        'route' => 'orders',
        'title' => 'Encomendas',
        'deletable' => false,
        'editable' => true,
        'create' => false,
        'list' => [
            'id' => 'ID',
            'shipname' => 'Nome',
            'shipemail' => 'Email',
            'phone' => 'Telefone',
            'total' => 'Total',
            'address' => 'Endereço',
            'postal_code' => 'Código Postal',
            'order_number' => 'nª Factura',
        ],
        'fields' => [
            'id' => [
                'name' => 'id',
                'designation' => 'id',
                'type' => 'hidden',
                'visible' => false,
            ],
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
        'create' => true,
        'list' => [
            'id' => 'ID',
            'name' => 'Nome',
            'designation' => 'Descrição',
            'brand' => 'Marca',
            'category' => 'Categoria',
            'type' => 'Tipo',
            'price' => 'Preço',
            'price_tax' => 'IVA',
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
                'other' => true,
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
                'other' => true,
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
                'list' => 'types',
                'other' => true,
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
            'price' => [
                'name' => 'price',
                'designation' => 'Price',
                'type' => 'input',
                'visible' => true,
            ],
            'price_tax' => [
                'name' => 'price_tax',
                'designation' => 'IVA',
                'type' => 'input',
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

    'promotions' => [
        'pk' => 'id',
        'route' => 'promotions',
        'title' => 'Promoções',
        'deletable' => true,
        'editable' => true,
        'create' => true,
        'list' => [
            'id' => 'ID',
            'name' => 'Nome',
            'designation' => 'Descrição',
            'start_at' => 'Começo',
            'end_at' => 'Término',
            'discount' => 'Desconto',
            'discount_type' => 'Tipo de Desconto',
        ],
        'fields' => [
            'id' => [
                'name' => 'id',
                'designation' => 'ID',
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
            'start_at' => [
                'name' => 'start_at',
                'designation' => 'Começo',
                'type' => 'input',
                'visible' => true,
            ],
            'end_at' => [
                'name' => 'end_at',
                'designation' => 'Término',
                'type' => 'input',
                'visible' => true,
            ],
            'discount' => [
                'name' => 'discount',
                'designation' => 'Desconto',
                'type' => 'input',
                'visible' => true,
            ],
            'discount_type' => [
                'name' => 'discount_type',
                'designation' => 'Tipo de desconto',
                'type' => 'dropdown',
                'visible' => true,
                'list' => 'discount_type',
                'other' => false,
            ],
            /*'submit' => [
                'name' => 'save',
                'designation' => 'Guardar',
                'type' => 'submit',
                'visible' => true,
            ],*/
        ]
    ],
];