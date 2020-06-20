$( "#notliked" ).click(function() {
    $.ajax({
        url: "fonctions/addLike.php",
        method: "post",
        body: $idQuestion,
    });
});

$(document).ready(function(){
    $("div.heart").hover(function(){
        $("i.heart1").css("color", 'red');
        $("i.heart2").css("color", 'red');
    },function(){
        $("i.heart1").css("color","black");
        $("i.heart2").css("color","black");
    });
});


