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
                                            <div class="panel-heading 
HERE;
                                    if ($product['category'] == $category['id'])
                                        echo "active";
                                    echo <<<HERE
                                            ">
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
                        <div class="product-details"><!--product-details-->
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="view-product">
                                        <?php $img = '/images/products/product'.$product['id'].'.jpg';
                                    if (!file_exists(ROOT.$img))
                                        $img =  '/images/main/no_image.png';
                                ?>
                                                        <img src="<?php echo $img;?>" class="product-image"/>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="single-product"><!--/product-information-->
                                        <?php if ($product['is_new']){
                                            echo " <img src='/images/main/new.jpg'>";
                                        }
                                        ?>
                                        <h2><?php echo $product['title']?></h2>
                                        <br>
                                        Код товара: <?php echo $product['id']?>
                                        <h2><?php echo $product['price']?> рублей</h2>
                                        <br>
                                        <a href="#" id = "<?php echo $product['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> В корзину</a>
                                    </div><!--/product-information-->
                                </div>
                            </div>                               
                                <div class="col-sm-12 product-description">
                                    <h2>Описание товара</h2>
                                    <p><?php echo $product['description']?></p>
                                </div>
                        </div><!--/product-details-->

                    </div>
                </div>
            </div>
        </section>
<?php
    include ROOT.'/views/layouts/footer.php';
?>
        
