<div class="FullScreenBG border" style="background-image: url('./assets/img/BG.png');">


    <!-- <div id="login" class="cardDiv login">

        <div class="logo">
            <img src="./assets/img/Logo.png" alt="" srcset="">
            <h3>BE<span class="gold">LL</span>UCCI</h3>
            <h6 class="gold">Investments Holding</h6>
        </div>
        <form method="post" id="loginForm" name="loginForm">
            <input type="text" name="username" id="username" placeholder="Email" class="form-control">
            <input type="password" name="userpass" id="userpass" placeholder="Password" class="form-control">
            <input type="submit" class="btn btn-primary btn-block" id="btn_login" name="btn_login" value="Sign In">
            <?= $DB->IsSuccess ? '' : '<p class="text-danger">' . $DB->Messsage . '</p>'  ?>
        </form>

    </div> -->

    <div class="CardDiv">
        <div class="logo">
            <img src="./assets/img/Logo.png" alt="" srcset="">
            <h3>BE<span class="gold">LL</span>UCCI</h3>
            <h6 class="gold">Investments Holding</h6>
        </div>
        <form method="post">
            <input type="text" name="username" id="username" placeholder="Email" class="form-control">
            <input type="password" name="userpass" id="userpass" placeholder="Password" class="form-control">
            <input type="submit" class="btn btn-primary btn-block" id="btn_login" name="btn_login" value="Sign In">
            <?= $DB->IsSuccess ? '' : '<p class="text-danger">' . $DB->Messsage . '</p>'  ?>
        </form>
    </div>


    <!-- ishara 15/03/2023 -->
    <div id="LoadSpiner" style="display: none; color: #B8874F !important; z-index:9999;position: fixed;">
        <div class="text-center"><i class="fa-solid fa fa-spinner fa-spin fa-5x"></i>
            <p>Please Wait!</p>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#btn_login').on('click', function(e) {

                $('#loginForm').validate({
                    rules: {
                        username: {
                            required: true,
                        },
                        userpass: {
                            required: true,
                        },

                    },
                    // messages: {}, 
                    submitHandler: function(form) {
                        event.preventDefault();
                        var username = $('input[name=username]').val();
                        var password = $('input[name=userpass]').val();

                        $.ajax({
                            type: 'POST',
                            url: 'model/loginauth.php',
                            data: {
                                username: username,
                                password: password,
                                action: "GetUsersData",
                            },
                            dataType: 'json',
                            success: function(response) {
                                console.log(response);
                                if (response.status == '200') {
                                    console.log('response success');
                                    console.log(response);
                                    toastr["success"](response.message)

                                    $('#LoadSpiner').css({
                                        display: 'block'
                                    });
                                    $('#body-content').css({
                                        opacity: 0.5,
                                    });

                                    $('#LoadSpiner').fadeIn();
                                    setTimeout(() => {
                                        $('#body-content').css({
                                            opacity: 1,
                                        });
                                        post_to_url('<?= WEB_ROOT ?>');
                                    }, "1000");
                                }
                                if (response.status == '500') {
                                    console.log('error');
                                    toastr["error"](response.message);
                                }
                            },
                            error: function(error) {
                                toastr["error"]('internal server error');
                            }
                        });


                    }

                });
            });

        });
    </script>
</div>