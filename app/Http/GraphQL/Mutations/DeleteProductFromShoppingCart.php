<?php

namespace App\Http\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class DeleteProductFromShoppingCart
{
    public function resolve($rootValue, array $args, GraphQLContext $context)
    {
        $shoppingCart = tap($context->user()->shoppingCart, function ($shoppingCart) use ($args) {
            $shoppingCart->products()->detach($args['productId']);
        });

        return [
            'user' => $shoppingCart->user
        ];
    }
}
