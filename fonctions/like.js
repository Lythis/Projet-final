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
                $("i.liked1").css("display","true");
                $("i.notliked1").css("display", "none");
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
                $("i.notliked1").css("display","none");
                $("i.liked1").css("display", "true");
                location.reload();
                 },                    
            });
    });
});