<footer class="pF">
    <div class="footer-log">
        <div class="icon-log">
            <i class="fab fa-dribbble"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-github"></i>
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-google"></i>
        </div>
        
        
        <hr id="bar">
        <div>
            <p > © 2019 Page protected by reCAPTCHA and subject to Google's <span id="white">Privacy Policy</span> and <span id="white">Terms of service</span></p>
        </div>
    </div>
    
    <script type="text/javascript" src="./script/Jquery.js" > </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6c2421ea48.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
    <script type="text/javascript" src="./reponses.js"></script>
    <script type="text/javascript" src="./fonctions/like.js"></script>
    <!-- Scripts pour le bootstrap + compte de caractères dans les textarea -->
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (div.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <script>
        $(document)
        .one('focus.autoExpand', 'textarea.autoExpand', function(){
            var savedValue = this.value;
            this.value = '';
            this.baseScrollHeight = this.scrollHeight;
            this.value = savedValue;
        })
        .on('input.autoExpand', 'textarea.autoExpand', function(){
            var minRows = this.getAttribute('data-min-rows')|0, rows;
            this.rows = minRows;
            rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 16);
            this.rows = minRows + rows;
        });
    </script>
    <script>
        $(document).ready(function(e) {
            
            $('#question, #validationCustom01 , #desc').keyup(function() {
                
                var nombreCaractere = $(this).val().length;
                
                var nombreMots = jQuery.trim($(this).val()).split(' ').length;
                if($(this).val() === '') {
                    nombreMots = 0;
                }   
                
                var msg = ' ' + nombreMots + ' mot(s) | ' + nombreCaractere + ' Caractere(s) / 250';
                $('#compteur').text(msg);
                
                if(nombreCaractere == 250 ){{  $('#compteur').addClass("mauvais"); $('#compteur').removeClass("presque");} }else{ if (nombreCaractere > 199 && nombreCaractere < 250) { $('#compteur').addClass("presque"); } else { $('#compteur').removeClass("presque"); $('#compteur').removeClass("mauvais"); }  
            }}) 
            $('#categQuestion').keyup(function() {
                
                var nombreCaractere = $(this).val().length;
                
                var nombreMots = jQuery.trim($(this).val()).split(' ').length;
                if($(this).val() === '') {
                    nombreMots = 0;
                }   
                
                var msg = ' ' + nombreMots + ' mot(s) | ' + nombreCaractere + ' Caractere(s) / 150';
                $('#compteur2').text(msg);
                
                if(nombreCaractere == 150 ){{  $('#compteur2').addClass("mauvais"); $('#compteur2').removeClass("presque");} }else{ if (nombreCaractere > 99 && nombreCaractere < 150) { $('#compteur2').addClass("presque"); } else { $('#compteur2').removeClass("presque"); $('#compteur2').removeClass("mauvais"); }  
            }})  
            
            
        });
    </script>
    <script> 
        $(document).ready(function() {
            $("#image-edit_onclick").click(function() {
                $("#image-edit img.top").toggleClass("transparent");
            });
        });
    </script>
    <script>
        $(document).ready(function(){
    $("select.list2").change(function(){
        var listDeTri = $(this).children("option:selected").val();
        if(listDeTri == "categ"){
            $("select.categ").css("display","block")
            $("select.list2").css("display","none")
            
}
    });
    });
    </script>
    <script>
        $(function(){
            var defaultValue = $("option.defaut").val();
            $("button.reset").click(function () {
                $("select.list2").val(defaultValue).css("display","block");
                $("select.categ").css("display","none",);
            });
        });
    </script>
    <script>
    $(document).ready(function(){
        $("select.categ").change(function(){
                var textCateg = $(this).children("option:selected").text();
            });
        laCategorie = GetCookie("categorie");
        leTriagea = GetCookie("triagea");
        if(leTriagea =='0' || laCategorie.val === null){
            $("select.list2").val(defaultValue).css("display","block");
                $("select.categ").css("display","none");

            }
            else{
                $("select.list2").css("display","none")
                $("select.categ").css("display","block").val(laCategorie).text(textCateg)
                }


        });
    </script>
    
    <script>
        function getCookieVal(offset) {
    var endstr=document.cookie.indexOf (";", offset);
    if (endstr==-1) endstr=document.cookie.length;
    return unescape(document.cookie.substring(offset, endstr));
}
function GetCookie (name) {
    var arg=name+"=";
    var alen=arg.length;
    var clen=document.cookie.length;
    var i=0;
    while (i<clen) {
    var j=i+alen;
    if (document.cookie.substring(i, j)==arg) return getCookieVal (j);
    i=document.cookie.indexOf(" ",i)+1;
    if (i==0) break;
    }
    return null;
}
    </script>  
</footer>
</body>
</html>