<?php

namespace App\GraphQL\Queries;

use App\Models\Product;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ProductsByCategoryQuery extends Query
{
    protected $attributes = [
        'name' => 'productsByCategory',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Product'));
    }

    public function args(): array
    {
        return [
            'category' => [
                'type' => Type::string(),
            ],
        ];
    }

    public function resolve($root, array $args)
    {
        return Product::where('category', $args['category'])->get();
    }
}