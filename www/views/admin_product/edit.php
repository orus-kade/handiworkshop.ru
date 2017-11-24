<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title">Редактировать товар</h2>
            </div>
        </div>
        <div class="row"> 
            <div class="col-sm-6 col-sm-offset-1">
                <h3>Редактировать товар #<?php echo $id; ?></h3>
                <div class="admin-form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <p>Название товара</p>
                        <label id = "labelTitle" class = "hidden">Введите название</label>
                        <input type="text" name="title" placeholder="" value="<?php echo $product['title']; ?>">
                        <p>Стоимость, руб.</p>
                        <label id = "labelPrice" class = "hidden">Введите цену (положительное число)</label>
                        <input type="text" name="price" placeholder="" value="<?php echo $product['price']; ?>">
                        <p>Категория</p>
                         <select name="category_id">
                            <?php foreach ($categories as $category){ ?>
                                <option value="<?php echo $category['id']; ?>"
                                    <?php if ($product['category'] == $category['id']) echo ' selected="selected"'; ?> >
                                    <?php echo $category['title']; ?>
                                </option>
                             <?php }?>
                        </select> 
                        <p>Изображение товара</p>
                        <?php $img = '/images/products/product'.$product['id'].'.jpg';
                                    if (!file_exists(ROOT.$img))
                                        $img =  '/images/main/no_image.png';
                                ?>
                        <img src="<?php echo $img; ?>" width="200" alt="" />
                        <input type="file" name="image" placeholder="" value="">
                        <p>Детальное описание</p>
                        <textarea name="description" class="description"><?php echo $product['description']; ?></textarea>
                        <p>Новинка</p>
                        <select name="is_new">
                            <option value="1" <?php if ($product['is_new'] == 1) echo ' selected="selected"'; ?>>Да</option>
                            <option value="0" <?php if ($product['is_new'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                        </select>
                        <p>Видимость</p>
                        <input type="checkbox" name="visible" 
                            <?php if ($product['visible']) 
                                echo "checked";
                            ?>
                        >
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить"> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src='/js/create.js'></script>

<?php include ROOT . '/views/layouts/footer.php'; ?>

