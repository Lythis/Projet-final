$( "#notliked" ).click(function() {
    $.ajax({
        url: "fonctions/addLike.php",
        method: "post",
        body: $idQuestion,
    });
});