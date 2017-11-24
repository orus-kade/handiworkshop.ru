    document.forms[0].onsubmit = function(){
        f = true;
        if (this.elements['title'].value.trim().length==0){
            document.getElementById('labelTitle').className='visible'; 
            f = false;     
        }
        else{
            document.getElementById('labelTitle').className='hidden'; 
        }
        if (this.elements['price'].value.match(/^[1-9]+[0-9]*$/) == null || parseInt(this.elements['price'].value) <=0){
            document.getElementById('labelPrice').className='visible'; 
            f = false;     
        }
        else{
            document.getElementById('labelPrice').className='hidden'; 
        }
        return f;
    }