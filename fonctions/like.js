
$(document).ready(function(){
    if($(".liked1").is(':visible')){
    $(".liked1").click(function(){ 
        var like = $(this).first().attr( "id" ).split(',');
        var questionId = like[0];
        var connexionId = like[1];                 
        console.log(like);      
        $.ajax({
            url: 'fonctions/addLike.php',
            type: "POST",
            data: {'id' : questionId, 'idConnect' : connexionId},  
            success: function (data) {
                console.log(data);
                $("i.notliked1").css("display","none");
                $("i.liked1").css("display", "true");
                location.reload();
            },
        });
    });
        }
        if($(".notliked1").is(':visible')){
        $(".notliked1").click(function(){
            var like = $(this).first().attr( "id" ).split(',');
            var questionId = like[0];
            var connexionId = like[1];   
            console.log(like);
            $.ajax({
                url: 'fonctions/addlike.php',
                type: "POST",
                data: {'id' : questionId, 'idConnect' : connexionId},  
                success: function (data) {
                    console.log(data);
                    $("i.liked1").css("display","true");
                    $("i.notliked1").css("display", "none");
                    location.reload();
                     },                 
                });
            });
        }
});
