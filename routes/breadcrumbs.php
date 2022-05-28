<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('login', function (BreadcrumbTrail $trail): void {
    $trail->push('Login',"");
});

Breadcrumbs::for('admin.dashboard', function (BreadcrumbTrail $trail): void {
    $trail->push('Dashboard', route('admin.dashboard'));
});

Breadcrumbs::for('admin.company.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.dashboard');
    $trail->push('Companies', route('admin.company.index'));
});

Breadcrumbs::for('admin.company.edit', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.company.index');
    $trail->push('Company edit', "");
});

Breadcrumbs::for('admin.company.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.company.index');
    $trail->push('Company create', "");
});

Breadcrumbs::for('admin.company.show', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.company.index');
    $trail->push('Company show', "");
});

Breadcrumbs::for('admin.pack.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.dashboard');
    $trail->push('Pack', route('admin.pack.index'));
});

Breadcrumbs::for('admin.pack.edit', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.pack.index');
    $trail->push('Pack edit', "");
});

Breadcrumbs::for('admin.pack.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.pack.index');
    $trail->push('Pack create', "");
});

Breadcrumbs::for('admin.pack.show', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.pack.index');
    $trail->push('Pack show', "");
});

Breadcrumbs::for('admin.user.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Users', "");
});

Breadcrumbs::for('admin.user.edit', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.user.index');
    $trail->push('User edit', "");
});

Breadcrumbs::for('admin.user.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.user.index');
    $trail->push('User create', "");
});



