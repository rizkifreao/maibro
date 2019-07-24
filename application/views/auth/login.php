<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="none" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="admin login">
    <title>MAIBRO</title>	
    <link rel="icon" type="image/png" href="<?=base_url('public')?>/web/img/logo.png">
    <link rel="stylesheet" href="<?=base_url('assets');?>/dist/css/app.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?=base_url('assets');?>/adminLte/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <style>
        body {
            background-image:url("<?=base_url('public')?>/web/img/background1.jpg");
            background-color: #FFFFFF;
        }
        body.login .login-sidebar {
            border-top:5px solid #22A7F0;
        }
        @media (max-width: 767px) {
            body.login .login-sidebar {
                border-top:0px !important;
                border-left:5px solid #22A7F0;
            }
        }
        body.login .form-group-default.focused{
            border-color:#22A7F0;
        }
        .login-button, .bar:before, .bar:after{
            background:#22A7F0;
        }
    </style>
    <link href="<?=base_url('assets');?>/dist/css/font-googleapis.css" rel="stylesheet">
    <link href="<?=base_url('assets');?>/dist/css/fontLogin.css" rel="stylesheet">
</head>
<body class="login">
<div class="container-fluid">
    <div class="row">
        <div class="faded-bg animated"></div>
        <div class="hidden-xs col-sm-7 col-md-8">
            <div class="clearfix">
                <div class="col-sm-12 col-md-10 col-md-offset-2">
                    <div class="logo-title-container">
                            <img class="img-responsive pull-left flip logo hidden-xs animated fadeIn" src="<?=base_url('public');?>/web/img/logo-icon-light.png" alt="Logo Icon">
                            <div class="copy animated fadeIn">
                            <h1>MAIBRO</h1>
                            <p>Selamat Datang di Aplikasi Pelayanan Klaim Asuransi</p>
                        </div>
                    </div> <!-- .logo-title-container -->
                </div>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-5 col-md-4 login-sidebar">

            <div class="login-container">

                <p>Sign In Below:</p>

                 <?php echo form_open("auth/login");?>
                <!-- <form action="Login/index/" method="POST" id="loginForm"> -->
                    <input type="hidden" name="_token" value="M8lnF6WvN46d6e5X9HnVtY7YCNWfaoyjjYyOGAWe">
                    <div class="form-group form-group-default" id="emailGroup">
                        <label>E-mail</label>
                        <div class="controls">
                            <input type="email" name="identity" id="identity" value="" placeholder="E-mail" class="form-control" required>
                         </div>
                    </div>

                    <div class="form-group form-group-default" id="passwordGroup">
                        <label>Password</label>
                        <div class="controls">
                            <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
                        </div>
                    </div>

                    <?php 
                    $data = array(
                        'class'         => 'btn btn-block login-button',
                        'value'         => 'true',
                        'type'          => 'submit',
                        'content'       => '<span class="signingin hidden"><span class="voyager-refresh"></span> Logging in...</span>
                        <span class="signin">Login</span>'
                    );
                    echo form_button($data);
                    //echo form_button("btnsubmit","Login","class='btn btn-block login-button '");
                    ?>
              <!-- </form> -->
              <?php echo form_close();?>

              <div style="clear:both"></div>

              <?php if($this->session->flashdata("message")):?>
                <div class="alert alert-red">
                <ul class="list-unstyled">
                            <li>These credentials do not match our records. <?= form_error('identity'); ?></li>
                        </ul>
                </div>
                <?php 
                $this->session->unset_userdata("message");
                endif; 
                ?>

              
            </div> <!-- .login-container -->

        </div> <!-- .login-sidebar -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
 <!-- jQuery 3 -->
 <script src="<?=base_url('assets');?>/adminLte/bower_components/jquery/dist/jquery.min.js"></script>
 <!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('assets');?>/adminLte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
<script>
    var btn = document.querySelector('button[type="submit"]');
    var form = document.forms[0];
    var email = document.querySelector('[name="identity"]');
    var password = document.querySelector('[name="password"]');
    btn.addEventListener('click', function(ev){
        if (form.checkValidity()) {
            btn.querySelector('.signingin').className = 'signingin';
            btn.querySelector('.signin').className = 'signin hidden';
        } else {
            ev.preventDefault();
        }
    });
    email.focus();
    document.getElementById('emailGroup').classList.add("focused");

    // Focus events for email and password fields
    email.addEventListener('focusin', function(e){
        document.getElementById('emailGroup').classList.add("focused");
    });
    email.addEventListener('focusout', function(e){
       document.getElementById('emailGroup').classList.remove("focused");
    });

    password.addEventListener('focusin', function(e){
        document.getElementById('passwordGroup').classList.add("focused");
    });
    password.addEventListener('focusout', function(e){
       document.getElementById('passwordGroup').classList.remove("focused");
    });

</script>
</body>
</html>
