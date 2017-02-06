<style type="text/css">
    body {
        padding-top: 70px;
        background-color: #fff;
        color: #000000;
    }
    a{
        color: #002166;
    }
    a:hover{
        text-decoration: none;
        color: #fff;
    }
    .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background: rgba(20,20,20,0.1);
        border: 2px solid rgba(255,255,255,0.3);
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
        -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
        box-shadow: 0 1px 2px rgba(0,0,0,.05);
        color: #ffffff;
    }
    .form-signin:hover{
        border: 2px solid #fff;
    }
    .form-signin .form-signin-heading,
    .form-signin {
        margin-bottom: 10px;
        color:#1A1A1A;
    }
    .form-signin input[type="text"],
    .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        width: 300px;
        margin-bottom: 15px;
        padding: 7px 9px;
    }
    .text-center{
        text-align: center;
    }
</style>

<script type="text/javascript">
    $(function(){
        $("#btnLogin").click(function() {
            var username=$("#username").val();
            var password=$("#password").val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('login/cek_login')?>",
                dataType: "text",
                data: "username="+username+"&password="+password,
                cache:false,
                success: function(data){
                    $(".loading").fadeIn(500).fadeOut(500)
                        .queue(function(){
                            window.location = "<?php echo site_url('dashboard') ?>";
                        });
                }
            });
            return false;
        });
    });

</script>
<div class="loading navbar-fixed-top" style="display: none">
    <div class="progress progress-primary progress-striped active">
        <div class="bar" style="width: 100%;"></div>
    </div>
</div>

<br>
<form class="form-signin" method="" action="">
    <hr>
    <h4 class="form-signin-heading text-center">PT. NESTLE INDONESIA - MALANG</h4>
    <p class="text-center">
        <em>Silahkan Masuk Terlebih Dahulu</em>
    </p>
    <hr>
    <input id="username" type="text" placeholder="Username" name="username" required>
    <input id="password" type="password" placeholder="Password" name="password" required>
    <button id="btnLogin" class="btn btn-large" type="submit">Masuk</button>
</form>
