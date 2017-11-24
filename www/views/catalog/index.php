<?php
    include ROOT.'/views/layouts/header.php';
?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2 class="title">Категории</h2>
                            <div class="panel-group"> 
                                <?php foreach ($categories as $category) { 
                                    echo <<<HERE
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a href="/category/{$category['id']}">
                                                        {$category['title']}
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
HERE;
                                }  ?>
                                
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-9">
                        <div class="products"><!--products-->
                            <h2 class="title">Товары</h2>
                                <?php foreach ($products as $product) { 
                                    echo <<<HERE
                                        <div class="col-sm-4">
                                            <div class="single-product">
                                                    <div class="image">
HERE;
                                $img = '/images/products/product'.$product['id'].'.jpg';
                                    if (!file_exists(ROOT.$img))
                                        $img =  '/images/main/no_image.png';
                                ?>
                                                        <img src="<?php echo $img;?>" class="product-image"/>
                                                <?php 
                                                        if ($product['is_new']) 
                                                            echo "<img src='/images/main/new.png' class = 'new'>";
                                                            echo <<<HERE
                                                    </div>
                                                    <h2><a href ="/product/{$product['id']}" class= "product-view">{$product['title']}</a></h2>
                                                    <h2>{$product['price']} рублей</h2>
                                                    <a href="#" id = "{$product['id']}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> В корзину</a>
                                            </div>
                                        </div>
                                        
HERE;
                                }  ?> 
                        </div><!--products-->
                        <div class="col-sm-12"><?php  echo $pagination->get(); ?></div>
                    </div>
                </div>
            </div>
        </section>
<?php
    include ROOT.'/views/layouts/footer.php';
?>

