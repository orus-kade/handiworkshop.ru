<?php include ROOT . '/views/layouts/header.php'; ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title">Редактирование данных</h2>
            </div>
            <div class="col-sm-8 col-sm-offset-2">
                <p><?php if ($result) 
                        echo "Данные сохранены!";
                    else{ ?>
                </p>
                <div class="form">                     
                        <form action="" method="post">
                            <p>Ваша имя</p>
                            <label id="labelName" class="hidden">Имя должно быть не короче 2-х символов!</label>
                            <input type="text" name="name" placeholder="Имя" value="<?php echo $name;?>"/>
                            <p>Номер телефона</p>
                            <label id="labelPhone" class="hidden">Неправильный формат номера телефона! +7-000-000-00-00</label>
                            <input type="text" name="phone" placeholder="+7-000-000-00-00" value="<?php echo $ph_number;?>"/>
                            <p>Новый пароль</p>
                            <label id="labelNewPassword" class="hidden">Пароль должен быть не короче 8-ми символов!</label>
                            <input type="password" name="newPassword" placeholder="Новый пароль" value=""/>
                            <input type="submit" name="submit" class="btn btn-default" value="Сохранить" />
                        </form>
                    </div>
                <?php } ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<script src="/js/edit.js"></script>

<?php include ROOT . '/views/layouts/footer.php'; ?>

<script type="text/javascript">
   $("[name = phone]").mask("+7-999-999-99-99"); 
   $("[name = name]").on('input', function(){
    if (this.value.trim().length<2){
            document.getElementById('labelName').className='visible';    
        }
        else{
            document.getElementById('labelName').className='hidden'; 
        }
   })
   $("[name = newPassword]").on('input', function(){
    if (this.value.length<8  && this.value.length!=0){
            document.getElementById('labelNewPassword').className='visible'; 
        }
        else{
            document.getElementById('labelNewPassword').className='hidden'; 
        }
   })
</script>
