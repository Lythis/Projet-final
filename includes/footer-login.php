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
    
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6c2421ea48.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
    <script type="text/javascript" src="./reponses.js"></script>
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
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
            
            
        });
    </script>
    <script> 
        $(document).ready(function() {
            $("#image-edit_onclick").click(function() {
                $("#image-edit img.top").toggleClass("transparent");
            });
        });
    </script>
</footer>
</body>
</html>



