<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title">Редактировать категорию</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-1">
                <div class="admin-form">
                    <form action="#" method="post">
                        <p>Название</p>
                        <label id = "labelTitle" class = "hidden">Введите название</label>
                        <input type="text" name="title" placeholder="" value="<?php  echo $category['title']; ?>">
                        <p>Видимость</p>
                        <input type="checkbox" name="visible" 
                            <?php if ($category['visible']) 
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
<script src='/js/createCategory.js'></script>
<?php include ROOT . '/views/layouts/footer.php'; ?>

