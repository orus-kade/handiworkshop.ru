function resizeImg(i){
    if ($(i).width()>=$(i).height()){
        $(i).removeClass("full-width"); 
        $(i).addClass("full-height"); 
    }
    else{                       
        $(i).removeClass("full-height"); 
        $(i).addClass("full-width");   
    }            
    var top = ($(i).parent().height()-$(i).height())/2;
    var left = ($(i).parent().width()-$(i).width())/2;
    $(i).css("position", "absolute");
    $(i).css("top", top);
    $(i).css("left", left);
    $(i).css("visibility", "visible");
}

$(".image .product-image").load(function(){                      
    resizeImg($(this));
});
$(window).load(function(){                 
    $(".image .product-image").each(function(){                      
        resizeImg($(this));
    });
});
$(window).resize(function(){                 
    $(".image .product-image").each(function(){                      
        resizeImg($(this));
    });
});
$(document).ready(function(){                    
    $(".add-to-cart").click(function () {
        var id = $(this).attr("id");
        $.post("/cart/addAjax/"+id, {}, function (data) {
            $("#cart-count").html(data);
        });
        return false;
    });
});
