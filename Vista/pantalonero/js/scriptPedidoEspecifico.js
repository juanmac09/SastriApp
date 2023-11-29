$(document).ready(function(){
    // Conmutación de pestañas:
    $(".tab a").on("click", function (e) {
        e.preventDefault();  
        $(this).parent().addClass("active"); 
        $(this).parent().siblings().removeClass("active"); 

        target = $(this).attr("href");  

        // Detén cualquier animación en curso y oculta el contenido actual antes de mostrar el nuevo contenido.
        $(".contenido-tab > div").stop().hide();

        $(target).fadeIn(600); 
    });
});

