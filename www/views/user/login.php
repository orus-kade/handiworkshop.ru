<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title">Вход на сайт</h2>
            </div>
            <div class="col-sm-8 col-sm-offset-2 padding-right">
                <div class="form">
                    <h4><?php if($error) echo $error;?></h4>
                    <form action="#" method="post">
                        <p>Ваш email</p>
                        <label id="labelEmail" class="hidden">Неправильный email (example@email.com)</label>
                        <input type="text" name="email" placeholder="E-mail" value="<?php echo $email;?>"/>
                        <p>Пароль</p>
                        <label id="labelPassword" class="hidden">Пароль должен быть не короче 8-ми символов!</label>
                        <input type="password" name="password" placeholder="Пароль" value=""/>
                        <input type="submit" name="submit" class="btn btn-default" value="Вход" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="/js/login.js"></script>


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
    
    $("[name = password]").on('input', function(){
    if (this.value.length<8){
            document.getElementById('labelPassword').className='visible'; 
        }
        else{
            document.getElementById('labelPassword').className='hidden'; 
        }
   })

</script>