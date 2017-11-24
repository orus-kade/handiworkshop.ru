<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title">Управление пользователями</h2>
            </div>
        </div>
        <div class="row"> 
            <div class="col-sm-12">            
                <h3>Список пользователей</h3>
                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>Email</th>
                        <th>Кол-во заказов</th>
                        <th>Заказы</th>
                        <th>Администратор</th>
                        <th>Редактировать</th>
                        <th>Удалить</th>                       
                    </tr>
                    <?php foreach ($users as $user){ ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['ph_number']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['count']; ?></td>
                            <td>
                                <?php
                                if ($user['count']){
                                    echo "<a href='/admin/user/orders/{$user['id']}'' title='Заказы''><i class='fa fa-shopping-cart'></i></a>";
                                }
                                ?>
                            </td>
                            <td><input type="checkbox" name="admin" disabled
                            <?php if ($user['admin']) 
                                echo "checked";
                            ?>
                            ></td>
                            <td><a href="/admin/user/edit/<?php echo $user['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                            <td>
                                <?php
                                if ($user['count']==0){
                                    echo "<a href='/admin/product/user/{$user['id']}'' title='Удалить''><i class='fa fa-times'></i></a>";
                                }
                                ?>                               
                            </td>                            
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>

