$(document).ready(function() {
    function ToggleFade(target){ // Affiche ou cache l'élement
        $(target).hasClass('switch-tag') ? $(target).fadeOut(150) : $(target).css("display", "flex").hide().fadeIn(150);
        $(target).toggleClass('switch-tag');
    }

    $('[data-commentbutton^="answer-"]').on('click', function(){ // Répondre à
        var commentID = $(this).attr('data-commentbutton');
        var input = "textarea[data-commentfield=" + commentID + "]";
        var parentDiv = $(input).closest('div');

        ToggleFade(parentDiv);
        if ($(parentDiv).hasClass('switch-tag')){
            $(this).text('Annuler le commentaire');
        } else {
            $(this).text('Répondre au commentaire');
        }
    });

    $('[data-commentsend^="answer-"]').on('click', function(){ // Répondre à
        var commentID = $(this).attr('data-commentsend');
        var input = "textarea[data-commentfield=" + commentID + "]";
        var parentDiv = $(input).closest('div');

        var message = $(input).val();
        var respondTo = null;

        if (commentID.split('-')[0] == "answer"){
            respondTo = commentID.split('-')[0];
        }

        var dataString = "userID=" + userID + "&problemID=" + problemID + "&message=" + message + "&respondTo=" + respondTo;

        $.ajax({
            type: "POST",
            url: "./src/phpprocess/add-comment.php",
            data: dataString,
            success: function(data) {
                console.log(data);
            }
        });

        var comment = '<div class="comment" id="comment-'+commentID+'"><p class="comment-message">'+message+'</p>';

        $(parentDiv).html(comment);
    });
});