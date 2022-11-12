<form id="loginForm" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="popup">
        <div class="content">
            <a class="close-btn"><span aria-hidden="true"><i class="fa fa-remove"></i></span></a>
            <h3 class="title"> Form di accesso </h3>
            <p class="description">Accedi qui usando Email & Password</p>
            <p class="errorLogin2" style="color: #f93d00">  • Le credenziali inserite non sono corrette! </p>
            <div class="form-group">
                <span class="input-icon"><i class="fa fa-user"></i></span>
                <input type="email" id="EmailLog" name="email" class="form-control" placeholder="Email">
                <p class="errorLogin1" style="color: #f93d00">  • 'Email' è richiesto </p>
            </div>
            <div class="form-group">
                <span class="input-icon"><i class="fas fa-key"></i></span>
                <input type="password" id="Pass" name="password" class="form-control" placeholder="Password">
                <p class="errorPass" style="color: #f93d00">  • 'Password' è richiesto </p>
            </div>
            <button type="submit" class="log"> Accedi </button>
            <script>
                $('.errorLogin1').hide();
                $('.errorLogin2').hide();
                $('.errorPass').hide();
                $('.log').click(function(e) {
                    var i = 0;
                    console.log()
                    if($('#EmailLog').val() == "") {
                        console.log("SI")
                        i++;
                        $('.errorLogin1').show();
                    } else { $('.errorLogin1').hide(); }

                    if($('#Pass').val() == "") {
                        i++;
                        $('.errorPass').show();
                    } else { $('.errorPass').hide(); }

                    if(i == 0) {
                        $('.popup').removeClass('active');
                        $('.container').removeClass('blur');
                    } else { event.preventDefault(); }
                })
            </script>
        </div>
    </div>
</form>