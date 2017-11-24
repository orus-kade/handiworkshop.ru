<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Главная</title>
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/font-awesome.min.css" rel="stylesheet">
        <link href="/css/main2.css" rel="stylesheet">
             
    </head><!--/head-->

    <body>
        <header id="header"><!--header-->
            <div class="header-top"><!--header-top-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="/"><img src="/images/main/logo.png" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="/cart/"><i class="fa fa-shopping-cart"></i> Корзина (<span id = "cart-count"><?php echo Cart::countItems(); ?></span>)</a></li>
                                    <?php if(User::isGuest()) {?>
                                    <li><a href="/user/register/"><i class="fa fa-lock"></i> Регистрация</a></li>
                                    <li><a href="/user/login/"><i class="fa fa-lock"></i> Вход</a></li>
                                    <?php }
                                    else {
                                        if(User::isAdmin()){ ?>                                    
                                        <li><a href="/admin"><i class="fa fa-lock"></i> Админпанель</a></li>
                                        <?php } ?>
                                    <li><a href="/cabinet/"><i class="fa fa-user"></i> Личный кабинет</a></li>
                                    <li><a href="/user/logout/"><i class="fa fa-unlock"></i> Выход</a></li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-top-->

            <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav">
                                    <li><a href="/">Главная</a></li>
                                    <li><a href="/catalog/">Каталог</a></li>
                                    <li><a href="/cart/">Корзина</a></li> 
                                    <li><a href="/about/">О магазине</a></li>
                                    <li><a href="/contacts/">Контакты</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-bottom-->
            
        </header><!--/header-->