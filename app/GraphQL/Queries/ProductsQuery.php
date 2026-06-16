<?php

namespace App\GraphQL\Queries;

use App\Models\Product;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class ProductsQuery extends Query
{
    protected $attributes = [
        'name' => 'products'
    ];

    public function type(): Type
    {
        return Type::listOf(app('graphql')->type('Product'));
    }

    public function resolve($root, array $args)
    {
        return Product::all();
    }
}