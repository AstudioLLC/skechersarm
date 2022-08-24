<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'slide-list',
            'slide-create',
            'slide-edit',
            'slide-delete',
            'blog-list',
            'blog-create',
            'blog-edit',
            'blog-delete',
            'brand-list',
            'brand-create',
            'brand-edit',
            'brand-delete',
            'career-list',
            'career-create',
            'career-edit',
            'jobRequest-list',
            'career-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'homeBanner-list',
            'homeBanner-create',
            'homeBanner-edit',
            'homeBanner-delete',
            'order-list',
            'order-edit',
            'order-delete',
            'page-list',
            'page-create',
            'page-edit',
            'page-delete',
            'comment-list',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'questionAnswer-list',
            'questionAnswer-create',
            'questionAnswer-edit',
            'questionAnswer-delete',
            'store-list',
            'store-create',
            'store-edit',
            'store-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'gallery-list',
            'gallery-create',
            'gallery-edit',
            'gallery-delete',
            'filter-list',
            'filter-create',
            'filter-edit',
            'filter-delete',
            'criteria-list',
            'criteria-create',
            'criteria-edit',
            'criteria-delete',
            'poll-list',
            'poll-create',
            'poll-edit',
            'poll-delete',
            'trash-list',
            'trash-create',
            'trash-edit',
            'trash-delete',
            'trash-restore'

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
