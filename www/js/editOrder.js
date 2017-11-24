document.getElementById('save').onclick = function(){
        f = true;
        if (parseInt(document.getElementById('count').value)<=0 || document.getElementById('count').value.match(/^[1-9]+[0-9]*$/) == null) {
                document.getElementById('labelCount').className='visible'; 
                f = false;     
            }
            else{
                document.getElementById('labelCount').className='hidden'; 
            }
        return f; 
    }
