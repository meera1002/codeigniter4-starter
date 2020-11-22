<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title></title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <?php if(isset($id)){?>
                <a class="navbar-brand" href="<?= base_url('users') ?>">
                    Dashboard
                </a>
            <?php }else{?>
                <a class="navbar-brand">
                    Please login/register to continue
                </a>
            <?php }?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->

                    <?php if(isset($id)){?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
                        </li>
                    <?php }?>
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
<div class="container">


    <div class="card bg-light">
        <article class="card-body mx-auto">
            <h4 class="card-title mt-3 text-center">Login</h4>
            <?php if(isset($validation) && $validation->listErrors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $validation->listErrors(); ?>
                </div>
            <?php } ?>
            <?php if(isset($notExtsts) && $notExtsts) { ?>
                <div class="alert alert-danger" role="alert">
                    User not exists or not verified
                </div>
            <?php } ?>
            <?=form_open('login_user', ['id' => 'login_user']);?>


                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email" class="form-control" placeholder="Email address" type="email" value="<?=isset($old['email'])?$old['email']:''?>">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control" placeholder="Create password" type="password" name="password">
                </div> <!-- form-group// -->

                <!-- form-group// -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Login  </button>
                </div> <!-- form-group// -->
                <p class="text-center">New user? <a href="<?= base_url('register') ?>">Register</a> </p>
                <?=form_close();?>
        </article>
    </div> <!-- card.// -->

</div>
</main>
</div>

</body>
</html>