<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title">Добавить новый товар</h2>
            </div>
        </div>
        <div class="row"> 
            <div class="col-sm-6 col-sm-offset-1">
                <div class="admin-form">
                    <form action="#" method="post" enctype="multipart/form-data">
                        <p>Название товара</p>
                        <label id = "labelTitle" class = "hidden">Введите название</label>
                        <input type="text" name="title" placeholder="" value="">
                        <p>Стоимость, руб.</p>
                        <label id = "labelPrice" class = "hidden">Введите цену (положительное число)</label>
                        <input type="text" name="price" placeholder="" value="">
                        <p>Категория</p>
                        <select name="category_id">
                            <?php foreach ($categories as $category){ ?>
                                <option value="<?php echo $category['id']; ?>">
                                    <?php echo $category['title']; ?>
                                </option>
                             <?php }?>
                        </select>
                        <p>Изображение товара</p>
                        <input type="file" name="image" placeholder="" value="">
                        <p>Детальное описание</p>
                        <textarea name="description" class ="description"></textarea>
                        <p>Новинка</p>
                        <select name="is_new">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>
                        <p>Видимость</p>
                        <input type="checkbox" name="visible" checked="checked">
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src='/js/create.js'></script>
<?php include ROOT . '/views/layouts/footer.php'; ?>