<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
/*Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('home'));
});

// Home > Category index
Breadcrumbs::for('cat-index', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('home');
    $trail->push($category->name_rus, route('cat-index', $category->name));
});

// Home > Category index > Post
Breadcrumbs::for('post-show', function (BreadcrumbTrail $trail, $category, $post) {
    $trail->parent('cat-index', $category->name);
    $trail->push('Detail page', route('post-show', $category->name, $post->slug));
});*/
