<?php
	return array(
		'product/([0-9]+)' => 'product/view/$1', //actionView в ProductController

		'cabinet/edit' => 'cabinet/edit', //actionEdit в CabinetController
		'cabinet' => 'cabinet/index', //actionIndex в CabinetController

		'cart/checkout' => 'cart/checkout', //actionCheckout в CartController
		'cart/delete/([0-9]+)' => 'cart/delete/$1', //actionDelete в CartController
		'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', //actionAddAjax в CartController
		'cart/deleteall' => 'cart/deleteAll',
		'cart' => 'cart/index', //actionIndex в CartController
		
		'catalog/page([0-9]+)' => 'catalog/index/$1',
		'catalog' => 'catalog/index', //actionIndex в CatalogController

		'category/([0-9]+)/page([0-9]+)' => 'catalog/category/$1/$2', //actionCategory в CatalogController
		'category/([0-9]+)' => 'catalog/category/$1', //actionCategory в CatalogController

		'admin/order/deleteProduct/([0-9]+)' => 'adminOrder/deleteProduct/$1',
		'admin/order/editstatus/([0-9]+)' => 'adminOrder/editStatus/$1',
		'admin/order/edit/([0-9]+)' => 'adminOrder/edit/$1',
		'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',	
		'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',	
		'admin/order' => 'adminOrder/index',


		'admin/category/products/([0-9]+)' => 'adminCategory/products/$1', 
		'admin/category/edit/([0-9]+)' => 'adminCategory/edit/$1', 
		'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
		'admin/category/create' => 'adminCategory/create',
		'admin/category' => 'adminCategory/index',


		'admin/product/edit/([0-9]+)' => 'adminProduct/edit/$1', 
		'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
		'admin/product/create' => 'adminProduct/create', //actionCreate в AdminProductController
		'admin/product' => 'adminProduct/index', //actoinIndex в AdminProductController 

		'admin/user/orders/([0-9]+)' => 'adminOrder/orders/$1',
		'admin/user/edit/([0-9]+)' => 'adminUser/edit/$1', 
		'admin/user/delete/([0-9]+)' => 'adminUser/delete/$1',
		'admin/user/orders/([0-9]+)' => 'adminUser/orders/$1',
		'admin/user' => 'adminUser/index',
	
		'admin' => 'admin/index', //actoinIndex в AdminController

		'about' => 'site/about', //actionAbout в SiteController

		'contacts' => 'site/contacts',

		'user/orders' => 'user/orders',
		'user/logout' => 'user/logout', //actionLogout в UserController
		'user/login' => 'user/login', //actionLogin в UserController

		'user/register' => 'user/register', //actionRegister в UserController

		'' => 'site/index', //actionIndex в SiteController	
	);
?>