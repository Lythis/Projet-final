<?php
    $title ='Live Question';
    require_once('includes/header.php');
    require_once('includes/tableaux.php');
?>

<body>
    <?php 
        require_once('includes/nav-bar.php');
    ?>
    <div class="hAcceuil">
        <div class="bloc1 .container-fluid">
            <div class="texte1 text-white">
                <h1>
                    Lorem ipsum dolor sit amet.
                </h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur quia, nihil impedit! Dolores magni ipsum facere adipisci ullam rem distinctio, pariatur iste, qui officiis. Adipisci voluptas ipsum illo corporis, voluptatibus!
                </p>
                <button type="button" class="boutton text-white">Bouton CTA</button>
            </div>
            <img class="image1" src="image/step-1.png">
        </div>
    </div>
    <div class="bloc2">

        <div class="rowe">
            <div class="col-sm">
                <img src="image/i1.png">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus id nunc quam. Integer eget ante ut neque interdum molestie pellentesque sit amet arcu. Phasellus ac nulla at lacus aliquet tristique.</p>
            </div>
            <div class="col-sm">
                <img src="image/i2.png">
                <h4>Ut posuere molestie</h4>
                <p>
                    egestas integer eget aliquet nibh praesent tristique magna sit amet purus gravida quis blandit turpis cursus in hac habitasse platea dictumst quisque sagittis purus sit amet volutpat consequat mauris nunc
                </p>
            </div>
            <div class="col-sm">
                <img src="image/i3.png">
                <h4>Vestibulum ut erat consectetur</h4>
                <p>sed vulputate mi sit amet mauris commodo quis imperdiet massa tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada proin libero nunc consequat interdum varius sit amet mattis vulputate enim nulla</p>
            </div>
        </div>
    </div>

    <div class="bloc3 .container-fluid">
        <div class="description">
            <h3>Aenean magna odio</h3>
            <p>eget sit amet tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra magna ac placerat vestibulum lectus mauris ultrices eros in cursus turpis massa</p>
        </div>

        <div>
            <div class="truc">
                <button type="button" class="btn1" data-toggle="collapse" data-target="#Lien1">Lien1</button>
                <button type="button" class="btn1  collapsed" data-toggle="collapse" data-target="#Lien2">Lien2</button>
                <button type="button" class="btn1 collapsed" data-toggle="collapse" data-target="#Lien3">Lien3</button>
            </div>
            <div id="Lien1" class="collapse show">
                <div class="bloc4 .container-fluid">
                    <img class="image1" src="image/step-2.jpg">
                    <div class="texte31">
                        <h3>Praesent vitae velit trisique old alos</h3>
                        <p>ultrices in iaculis nunc sed augue lacus viverra vitae congue eu consequat ac felis donec et odio pellentesque diam volutpat commodo sed egestas egestas fringilla</p>
                    </div>
                    <div class="carde1" style="">
                        <div class="card-body">
                            <img src="image/persona2.jpg">
                            <p>"hendrerit dolor magna eget est lorem ipsum dolor sit"</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="Lien2" class="collapse">
                <div class="bloc4 .container-fluid">
                    <img class="image2" src="image/step-2.jpg">
                    <div class="texte32">
                        <h3>Praesent vitae velit trisique old alos</h3>
                        <p>ultrices in iaculis nunc sed augue lacus viverra vitae congue eu consequat ac felis donec et odio pellentesque diam volutpat commodo sed egestas egestas fringilla</p>
                    </div>
                    <div class="carde2" style="">
                        <div class="card-body">
                            <img src="image/persona2.jpg">
                            <p>"hendrerit dolor magna eget est lorem ipsum dolor sit"</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="Lien3" class="collapse">
                <div class="bloc4 .container-fluid">
                    <img class="image1" src="image/step-2.jpg">
                    <div class="texte31">
                        <h3>Praesent vitae velit trisique old alos</h3>
                        <p>ultrices in iaculis nunc sed augue lacus viverra vitae congue eu consequat ac felis donec et odio pellentesque diam volutpat commodo sed egestas egestas fringilla</p>
                    </div>
                    <div class="carde1" style="">
                        <div class="card-body">
                            <img src="image/persona2.jpg">
                            <p>"hendrerit dolor magna eget est lorem ipsum dolor sit"</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="Lien1" class="collapse show">
            <div class="bloc6 .container-fluid">
                <div class="texte33">
                    <h3>Praesent vitae velit trisique old alos</h3>
                    <p>ultrices in iaculis nunc sed augue lacus viverra vitae congue eu consequat ac felis donec et odio pellentesque diam volutpat commodo sed egestas egestas fringilla</p>
                </div>
                <div class="carde3" style="">
                    <div class="card-body">
                        <img src="image/persona2.jpg">
                        <p>"hendrerit dolor magna eget est lorem ipsum dolor sit"</p>
                    </div>
                </div>
                <img src="image/step-2.jpg">
            </div>
        </div>
    </div>
    <div id="Lien2" class="collapse">
        <div class="bloc6 .container-fluid">
            <div class="texte33">
                <h3>Praesent vitae velit trisique old alos</h3>
                <p>ultrices in iaculis nunc sed augue lacus viverra vitae congue eu consequat ac felis donec et odio pellentesque diam volutpat commodo sed egestas egestas fringilla</p>
            </div>
            <div class="carde3" style="">
                <div class="card-body">
                    <img src="image/persona2.jpg">
                    <p>"hendrerit dolor magna eget est lorem ipsum dolor sit"</p>
                </div>
            </div>
        </div>
        <img src="image/step-2.jpg">

    </div>
    <div id="Lien3" class="collapse">
        <div class="bloc6 .container-fluid">
            <div class="texte33">
                <h3>Praesent vitae velit trisique old alos</h3>
                <p>ultrices in iaculis nunc sed augue lacus viverra vitae congue eu consequat ac felis donec et odio pellentesque diam volutpat commodo sed egestas egestas fringilla</p>
            </div>
            <div class="carde3">
                <div class="card-body">
                    <img src="image/persona2.jpg">
                    <p>"hendrerit dolor magna eget est lorem ipsum dolor sit"</p>
                </div>
            </div>
        </div>
        <img src="image/step-2.jpg">
    </div>
    <div class="useless">
        <div class="play">
            <p><img src="image/iPlay.png" alt="iPlay">"Nulla venenatis magna fringilla"</p>
        </div>
    </div>
    <div class="rose1">
        <span class="titre_rose">Etiam laot, alique sceleris.</span>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem   
            <p>accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.</p>
        </div>
        <div class="rose2">
            <div class="container_haut">
                <div class="marque1" id="kyan">
                    <img src="image/marque1.jpg" class="marque_image">
                    <p class="marque-text">Kyan Boards</p>
                </div>
                <div class="marque2">
                    <img src="image/marque2.jpg" class="marque_image">
                    <p class="marque-text">Atica</p>
                </div>
                <div class="marque2">
                    <img src="image/marque3.jpg" class="marque_image">
                    <p class="marque-text">Treva</p>
                </div>
                <div class="marque2">
                    <img src="image/marque4.jpg" class="marque_image">
                    <p class="marque-text">Kanba</p>
                </div>
            </div>
            <div class="container_bas">
                <div class="marque1" id="tvit">
                    <img src="image/marque5.jpg" class="marque_image">
                    <p class="marque-text">Tvit Forms</p>
                </div>
                <div class="marque2">
                    <img src="image/marque7.jpg" class="marque_image">
                    <p class="marque-text">Aven</p>
                </div>
                <div class="marque2">
                    <img src="image/marque6.jpg" class="marque_image">
                    <p class="marque-text">Utosia</p>
                </div>
            </div>  
        </div>
        <div class="faq">
            <span class="titre_faq">FAQ</span>
            <p class="faq-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem  
            accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.</p>
        </div>
        <div class="accordion" id="accordionExample">
            <?php foreach ($questions as $ask) { ?>
            <div class="card">
                <div class="card-head" id="<?php echo $ask ['idcard']?>">
                    <h2 class="mb-0">
                        <div class="card-align">
                            <p class="card-text"><?php echo $ask['question'];?></p>
                            <button class="btn btn-lien" type="button" data-toggle="collapse" data-target="#<?php echo $ask ['idcollapse']?>" aria-expanded="false" aria-controls="<?php echo $ask['idcollapse'] ?>">
                                <i class="fa fa-caret-right"></i>
                                <i class="fa fa-sort-down"></i>
                            </button>
                        </div>
                    </h2>
                </div>

                <div id="<?php echo $ask['idcollapse']?>" class="collapse " aria-labelledby="<?php echo $ask['idcard']?>" data-parent="#accordionExample">
                    <div class="card-body">
                        <?php echo $ask ["texte"];?>
                    </div>
                </div>
            </div>
                <?php } ?>
            </div>
            <p class="get-in">Still have unanswered questions?<a href="QuestionsReponses.php">Get in touch</a></p>
        </div>

        <?php 
        require_once('./includes/footer.php')

        ?>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
        <script src="https://kit.fontawesome.com/6c2421ea48.js" crossorigin="anonymous"></script>

    </body>
    </html>