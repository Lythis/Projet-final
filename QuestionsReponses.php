
        <?php
            require_once('includes/header.php');
        ?>
 <body>
 <?php 
    require_once('includes/nav-bar.php');
    ?>
    <div class="card responsive-bootstrap-card m-card">
        <h5 class="card-header"><img class="picture-user-small" src="profile-picture/lythis.jpg" alt=""> <b></b> a posé la question</h5>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text"></p>
            <a class="btn btn-primary toggle-btn"></a>
        </div>
    </div>

    <div class="card hidden-answer responsive-bootstrap-card">
        <div class="card-body">
            <div class="card mb-2">
                <div class="card-header">
                    <img class="picture-user-small" src="profile-picture/leo.jpg" alt=""> <b></b> a répondu :
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p></p>
                        <footer class="blockquote-footer"></footer>
                    </blockquote>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <img class="picture-user-small" src="profile-picture/kyllian.jpg" alt=""> <b></b>  a répondu :
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p></p>
                        <footer class="blockquote-footer"></footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

    <div class="bas-page">
    <?php
        require_once('includes/footer.php');
    ?>
    </div>
</html>
