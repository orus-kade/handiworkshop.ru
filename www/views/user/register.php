<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title">Регистрация на сайте</h2>
            </div>
            <div class="col-sm-8 col-sm-offset-2 padding-right">
                <p><?php if ($result) 
                        echo "Вы зарегистрированы!";
                    else{ ?>
                </p>
                <div class="form"><!--sign up form-->
                     <h4><?php if($error) echo $error;?></h4>                    
                        <form action="" method="post">
                            <p>Ваша имя</p>
                            <label id="labelName" class="hidden">Имя должно быть не короче 2-х символов!</label>
                            <input type="text" name="name" placeholder="Имя" value="<?php echo $name;?>"/>
                            <p>Ваш email</p>
                            <label id="labelEmail" class="hidden">Неправильный email! (example@email.com)</label>
                            <input type="text" name="email" placeholder="E-mail" value="<?php echo $email;?>"/>
                            <p>Пароль</p>
                            <label id="labelPassword" class="hidden">Пароль должен быть не короче 8-ми символов!</label>
                            <input type="password" name="password" placeholder="Пароль" value="<?php echo $password;?>"/>
                            <input type="submit" name="submit" class="btn btn-default" value="Регистрация" />
                        </form>
                    </div><!--/sign up form-->
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<script src="/js/register.js"></script>


<?php include ROOT . '/views/layouts/footer.php'; ?>

<script type="text/javascript">
    $("[name = email]").on('input', function(){
    if (this.value.match(/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)*\.[a-z]+/) == null){
        document.getElementById('labelEmail').className='visible'; 
    } 
    else{
        document.getElementById('labelEmail').className='hidden'; 
    }
   })
    $("[name = name]").on('input', function(){
    if (this.value.trim().length<2){
            document.getElementById('labelName').className='visible';    
        }
        else{
            document.getElementById('labelName').className='hidden'; 
        }
   })
    $("[name = password]").on('input', function(){
    if (this.value.length<8){
            document.getElementById('labelPassword').className='visible'; 
        }
        else{
            document.getElementById('labelPassword').className='hidden'; 
        }
   })

</script>