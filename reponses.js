$(document).ready(function(){
    $(".hidden-answer").hide();

    $(".toggle-btn").click(function(){
        $(".hidden-answer").toggle(1000);
        if ($(this).text() == "Afficher les réponses") { 
            $(this).text("Masquer les réponses"); 
        } else { 
            $(this).text("Afficher les réponses"); 
        };
    });
});