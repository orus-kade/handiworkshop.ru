document.forms[0].onsubmit = function(){
        f = true;
        if (this.elements['name'].value.trim().length<2){
            document.getElementById('labelName').className='visible'; 
            f = false;     
        }
        else{
            document.getElementById('labelName').className='hidden'; 
        }
        if (this.elements['phone'].value.match(/^(\+7|8)-\d{3}-\d{3}-\d{2}-\d{2}$/) == null){
            document.getElementById('labelPhone').className='visible'; 
            f = false; 
        } 
        else{
            document.getElementById('labelPhone').className='hidden'; 
        }
        return f;
    }
