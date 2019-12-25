<?php

namespace App\Http\GraphQL\Mutations;

use App\Product;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class AddProductToShoppingCart
{
    public function resolve($rootValue, array $args, GraphQLContext $context)
    {
        if ($context->user()->shoppingCart == null){
            $shoppingCart = $context->user()->shoppingCart()->create();
        }else{
            $shoppingCart = $context->user()->shoppingCart;
        }
        return ['user' => $shoppingCart->addProduct(Product::findOrFail($args['productId']))];
    }
}
