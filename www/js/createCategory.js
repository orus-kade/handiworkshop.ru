    document.forms[0].onsubmit = function(){
        f = true;
        if (this.elements['title'].value.trim().length==0){
            document.getElementById('labelTitle').className='visible'; 
            f = false;     
        }
        else{
            document.getElementById('labelTitle').className='hidden'; 
        }
        return f;
    }