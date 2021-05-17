<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('index'));
});

// Home > Shop
Breadcrumbs::for('shop', function ($trail) {
    $trail->parent('home');
    $trail->push('Shop', route('shop.index'));
});

// Home > Shop > [Product]
Breadcrumbs::for('product', function ($trail, $product) {
  $trail->parent('shop');
  $trail->push($product->name, route('products.show', $product->id));
});

/* // Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
}); */