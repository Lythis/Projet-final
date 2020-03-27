<!DOCTYPE html>
<html lang="fr">
    <head>
          <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>acceuil</title>
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <?php
        require_once('./includes/nav-bar.php');
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
                    <h4>Suits your Style</h4>
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
                    <button type="button" class="btn couleur2" data-toggle="collapse" data-target="#Lien1">Lien1</button>
                    <button type="button" class="btn couleur2 collapsed" data-toggle="collapse" data-target="#Lien2">Lien2</button>
                    <button type="button" class="btn couleur2 collapsed" data-toggle="collapse" data-target="#Lien3">Lien3</button>
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
                <div class="carde3" style="">
                    <div class="card-body">
                        <img src="image/persona2.jpg">
                        <p>"hendrerit dolor magna eget est lorem ipsum dolor sit"</p>
                    </div>
                </div>
            </div>
            <img src="image/step-2.jpg">
        </div>

        <div class="bloc5 .container-fluid">
            <div class="texte4">
                <p> <img class="logo" src="image/iplay.png">
                    amet venenatis urna cursus</p>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    </body>
</html>
