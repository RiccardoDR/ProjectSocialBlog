<form id="loginForm" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="popup">
        <div class="content">
            <a class="close-btn"><span aria-hidden="true"><i class="fa fa-remove"></i></span></a>
            <h3 class="title"> Form di accesso </h3>
            <p class="description">Accedi qui usando Username & Password</p>
            <p class="errorLogin2" style="color: #f93d00">  • Le credenziali inserite non sono corrette! </p>
            <div class="form-group2">
                <span class="input-icon2"><i class="fa fa-user"></i></span>
                <input type="text" id="User" name="Username" class="form-control" placeholder="Username">
                <h3 class="errorLogin1" style="color: #f93d00">  • 'Username' è richiesto </h3>
            </div>
            <div class="form-group2">
                <span class="input-icon2"><i class="fas fa-key"></i></span>
                <input type="password" id="Pass" name="password" class="form-control" placeholder="Password">
                <h3 class="errorPass" style="color: #f93d00">  • 'Password' è richiesto </h3>
            </div>
            <button type="submit" class="log"> Accedi </button>
            <script>
                $('.errorLogin1').hide();
                $('.errorLogin2').hide();
                $('.errorPass').hide();
                $('.log').click(function(e) {
                    var i = 0;
                    if($('#User').val() == "") {
                        i++;
                        $('.errorLogin1').show();
                    }
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

