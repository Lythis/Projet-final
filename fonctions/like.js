$(document).ready(function(){
    $(".notliked1").click(function(){
        var like = $( ".notliked1" ).first().attr( "id" ).split(',');
        var questionId = like[0];
        var connexionId = like[1]; 
        console.log(like);
        $.ajax({
            url: 'fonctions/addlike.php',
            type: "POST",
            data: {'id' : questionId, 'idConnect' : connexionId},  
            success: function (data) {
                console.log(data);
                $("i.heart1").css("color", 'red');
                $("i.heart1").css("display","true");
                $("i.heart2").css("display", "none");
                location.reload();
                 },                    
            });
    });
});
$(document).ready(function(){
    $(".liked1").click(function(){
        var like = $( ".liked1" ).first().attr( "id" ).split(',');
        var questionId = like[0];
        var connexionId = like[1]; 
        console.log(like);      
        $.ajax({
            url: 'fonctions/deleteLike.php',
            type: "POST",
            data: {'id' : questionId, 'idConnect' : connexionId},  
            success: function (data) {
                console.log(data);
                $("i.heart2").css("color", 'black');
                $("i.heart1").css("display","none");
                $("i.heart2").css("display", "true");
                location.reload();
            },
            error: function (data) {
                alert("Problème lors de la requête. Veuillez réessayer ultérieurement.");
            },
        });
    });
});