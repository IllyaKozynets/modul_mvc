<?php

return array(
    
    'category/analytics/([0-9]+)'=>'news/analytic/$1',
    'category/analytics'=>'news/analytic/1',
    'category/([a-z]+)/([0-9]+)'=>'news/category/$1/$2',
    'category/([a-z]+)'=>'news/category/$1/1',
    'find'=>'news/find',
    "news/([0-9]+)"=>"news/view/$1",
    "tags/([a-z]+)"=>"news/tags/$1",
    'user/logout'=>'user/logout',
    "user/register"=>'user/register',
    "user/login"=>"user/login",
    "comments/id-([0-9]+)/page-([0-9]+)"=>'user/comments/$1/$2',
    'comments/id-([0-9]+)'=>'user/comments/$1/1',
    'admin/categories/add' => 'adminCategory/add',
    'admin/comments'=>'adminComments/index',
    'admin/categories' => 'adminCategory/index',
    'admin/news/add' => 'adminNews/add',
    'admin/reclam'=>'adminReclam/add',
    'admin/news' => 'adminNews/index',
    'reclam/([0-9]+)'=>'reclam/index/$1',
    'admin'=>'admin/index',

    ""=>"news/index"
    

);