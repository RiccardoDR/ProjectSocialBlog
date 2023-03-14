<form id="registerForm" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="popup2">
        <div class="content">
            <a class="close-btn2"><span aria-hidden="true"><i class="fa fa-remove"></i></span></a>
            <h3 class="title2"> Form di registrazione </h3>
            <p class="description">Iscriviti qui ed inserisci i dati</p>
            <h3 class="errorRegisterUsername" style="color: #f93d00"> • L'username inserito è già stato scelto </h3>
            <div class="form-group">     
                <span class="input-icon"><i class="fa fa-user"></i></span>
                <input type="text" id="Nome" class="form-control" name="Nome" placeholder="Nome">
                <h3 class="errorNome" style="color: #f93d00">  • 'Nome' è richiesto </h3> 
            </div>
            <div class="form-group">
                <span class="input-icon"><i class="fa fa-user"></i></span>
                <input type="text" id="Cognome" class="form-control" name="Cognome" placeholder="Cognome">
                <h3 class="errorCognome" style="color: #f93d00">  • 'Cognome' è richiesto </h3> 
            </div>
            <div class="form-group">
                <span class="input-icon"><i class="fa fa-phone"></i></span>
                <input type="number" id="Telefono" class="form-control" name="Telefono" placeholder="Telefono">
                <h3 class="errorTelefono" style="color: #f93d00">  • 'Telefono' è richiesto </h3> 
                <h3 class="errorTelefono2" style="color: #f93d00">  • 'Telefono' deve essere di 10 cifre </h3> 
            </div>
            <div class="form-group">
                <span class="input-icon"><i class="fa fa-city"></i></span>
                <input type="text" id="Città" class="form-control" name="Città" placeholder="Città">
                <h3 class="errorCittà" style="color: #f93d00">  • 'Città' è richiesto </h3> 
            </div>
            <div class="form-group">              
                <span class="input-icon"><i class="fa fa-map-marker"></i></span>
                <input type="text" id="Indirizzo" class="form-control" name="Indirizzo" placeholder="Indirizzo">
                <h3 class="errorIndirizzo" style="color: #f93d00">  • 'Indirizzo' è richiesto </h3> 
            </div>
            <div class="form-group">
                <span class="input-icon"><i class="fa fa-calendar"></i></span>
                <input type="number" id="Anni" class="form-control" name="Anni" placeholder="Anni">
                <h3 class="errorAnni" style="color: #f93d00">  • 'Anni' è richiesto </h3> 
                <h3 class="errorAnni2" style="color: #f93d00">  • 'Anni' non deve superare 100 </h3> 
            </div>
            <a class="sub1"> Continua con la registrazione </a>
            <script>
                $('.errorRegisterUsername').hide();
                $('.errorNome').hide();
                $('.errorCognome').hide();
                $('.errorTelefono').hide();
                $('.errorTelefono2').hide();
                $('.errorCittà').hide();
                $('.errorIndirizzo').hide();
                $('.errorAnni').hide();
                $('.errorAnni2').hide();
                $('.sub1').click(function() {
                    var i = 0;
                    if($("input[name='Nome']").val() == "") {
                        i++;
                        $('.errorNome').show();
                    } else { $('.errorNome').hide(); }
                    if($("input[name='Cognome']").val() == "") {
                        i++;
                        $('.errorCognome').show();
                    } else { $('.errorCognome').hide(); }
                    if($("input[name='Telefono']").val() == "") {
                        i++;
                        $('.errorTelefono').show();
                    } else { 
                        $('.errorTelefono').hide(); 
                        if($("input[name='Telefono']").val().length != 10) {
                            i++;
                            $('.errorTelefono2').show();
                        } else { $('.errorTelefono2').hide(); } 
                    }
                    if($("input[name='Città']").val() == "") {
                        i++;
                        $('.errorCittà').show();
                    } else { $('.errorCittà').hide(); }
                    if($("input[name='Indirizzo']").val() == "") {
                        i++;
                        $('.errorIndirizzo').show();
                    } else { $('.errorIndirizzo').hide(); }
                    if($("input[name='Anni']").val() == "") {
                        i++;
                        $('.errorAnni').show();
                    } else { $('.errorAnni').hide(); }
                    if($("input[name='Anni']").val() > 100) {
                        i++;
                        $('.errorAnni2').show();
                    } else { $('.errorAnni2').hide(); }
                    if (i == 0) {
                        $('.popup3').addClass('active');
                        $('.popup2').removeClass('active');
                    }
                })
            </script>
        </div>
    </div>
    <div class="popup3">
        <div class="content">
            <a class="close-btn2"><span aria-hidden="true"><i class="fa fa-remove"></i></span></a>
            <h3 class="title2"> Form di registrazione </h3>
            <p class="description">Iscriviti qui ed inserisci i dati</p>
            <div class="form-group">
                <span class="input-icon"><i class="fa fa-id-card-o"></i></span>
                <input type="text" id="Codice_Fiscale" class="form-control" name="Codice_Fiscale" placeholder="Codice Fiscale">
                <h3 class="errorCodice" style="color: #f93d00">  • 'Codice Fiscale' è richiesto </h3>
                <h3 class="errorCodice2" style="color: #f93d00">  • 'Codice Fiscale' deve essere di 16 cifre </h3>
            </div>
            <div class="form-group">     
                <span class="input-icon"><i class="fa fa-user"></i></span>         
                <input type="text" id="Username" class="form-control" name="Username" placeholder="Username">
                <h3 class="errorUsername" style="color: #f93d00">  • 'Username' è richiesto </h3>
                @if ($errors->first('Username'))
                    <script>
                        $('.errorRegisterUsername').show();
                        $('.popup2').addClass('active');
                        $('.container').addClass('blur');
                    </script> 
                @endif
            </div>
            <div class="form-group">
                <span class="input-icon"><i class="fas fa-key"></i></span>
                <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                <h3 class="errorPassword1" style="color: #f93d00">  • 'Password' è richiesto </h3>
                <h3 class="errorPassword2" style="color: #f93d00">  • 'Password' deve essere di minimo 8 caratteri </h3>
            </div>
            <div class="form-group">
                <span class="input-icon"><i class="fas fa-key"></i></span>
                <input type="password" id="Conferma-password" class="form-control" name="Password_confirmation" placeholder="Conferma password">
                <h3 class="errorPassConfirmed1" style="color: #f93d00">  • 'Conferma password' è richiesto </h3>
                <h3 class="errorPassConfirmed2" style="color: #f93d00">  • Le due password non coincidono </h3>
            </div>
            <a class="sub2"> Ci siamo quasi </a>
            <script>
                $('.errorCodice').hide();
                $('.errorCodice2').hide();
                $('.errorUsername').hide();
                $('.errorPassword1').hide();
                $('.errorPassword2').hide();
                $('.errorPassConfirmed1').hide();
                $('.errorPassConfirmed2').hide();
                $('.sub2').click(function() {
                    var i = 0;
                    if($("input[name='Codice_Fiscale']").val() == "") {
                        i++;
                        $('.errorCodice').show();
                    } else { 
                        $('.errorCodice').hide(); 
                        if($("input[name='Codice_Fiscale']").val().lengtH > 16 || $("input[name='Codice_Fiscale']").val().length < 16) {
                            i++;
                            $('.errorCodice2').show();
                        } else { $('.errorCodice2').show(); }
                    }
                    if($("input[name='Username']").val() == "") {
                        i++;
                        $('.errorUsername').show();
                    } else { $('.errorUsername').hide(); }
                    if($("input[name='password']").val() == "") {
                        i++;
                        $('.errorPassword1').show();
                    } else { 
                        $('.errorPassword1').hide(); 
                        if($("input[name='password']").val().length < 8) {
                            i++;
                            $('.errorPassword2').show();
                        } else { $('.errorPassword2').hide(); }
                    }
                    if($("input[name='Password_confirmation']").val() == "") {
                        i++;
                        $('.errorPassConfirmed1').show();
                    } else { 
                        $('.errorPassConfirmed1').hide(); 
                        if($("input[name='Password_confirmation']").val() != $("input[name='password']").val()) {
                            i++;
                            $('.errorPassConfirmed2').show();
                        } else { $('.errorPassConfirmed2').hide(); }
                    }
                    if (i == 0) {
                        $('.popup4').addClass('active');
                        $('.popup3').removeClass('active');
                    }
                })
            </script>
        </div>
    </div>
    <div class="popup4">
        <div class="content">
            <a class="close-btn2"><span aria-hidden="true"><i class="fa fa-remove"></i></span></a>
            <h3 class="title2"> Form di registrazione </h3>
            <p class="description">Iscriviti qui ed inserisci i dati</p>
            <div class="visibily">
                <p> Vuoi essere visibile anche agli altri utenti? </p>
                <input type="radio" id="visible" value="s" name="Visibilità" checked>
                <label for="visible">Si</label>
                <input type="radio" id="invisible" value="n" name="Visibilità">
                <label for="invisible">No</label><br>
            </div>
            <div class="desc">
                <textarea id="Descrizione" class="textarea" name="Descrizione" cols="50" placeholder="Inserisci una breve descrizione del tuo profilo"></textarea>
                <h3 class="errorDescrizione" style="color: #f93d00">  • 'Descrizione' è richiesto </h3>
            </div>
            <button type="submit" class="sub3"> Completa la registrazione </button>
            <script>
                $('.errorDescrizione').hide();
                $('.sub3').click(function(e) {
                    var i = 0;
                    if($("#Descrizione").val() == "") {
                        i++;
                        $('.errorDescrizione').show();
                    } else { $('.errorDescrizione').hide(); }
                    if (i == 0) {
                        $('.popup4').removeClass('active');
                    } else { e.preventDefault(); }
                })
            </script>
        </div>
    </div>
</form>