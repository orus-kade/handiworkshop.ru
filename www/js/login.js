
document.forms[0].onsubmit = function(){
        f = true;
        if (this.elements['email'].value.match(/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)*\.[a-z]+/) == null){
            document.getElementById('labelEmail').className='visible';
            f = false; 
        } 
        else { document.getElementById('labelEmail').className='hidden';}
        if (this.elements['password'].value.length<8){
            document.getElementById('labelPassword').className='visible'; 
            f = false; 
        }
        else { document.getElementById('labelPassword').className='hidden';}
        return f;
    }
