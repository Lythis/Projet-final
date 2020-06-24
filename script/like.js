$(document).ready(function(){
    $(".press-button").click(function getdata(){
        $.ajax({
            url: './fonctions/addlike.php',
            type: "POST",
            data: {'#notliked' : notliked},         
            success : function (data) {
                var color = $("i.heart1").css('color'); 
                var display = $("i.heart2").css ('display')
                if (display == 'show'){   
                    $("i.heart1").css("color", 'red')  
                    $("i.heart2").css("display", 'none') 
                    $("i.heart1").css("display", 'show') 
                }
                else if( color == 'red'){
                    $("i.heart1").css("display", 'none')
                    $("i.heart2").css("display", 'show')  
                }
            }
        });
    });
});