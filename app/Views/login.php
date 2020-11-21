<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


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
                    User not exists
                </div>
            <?php } ?>
            <?=form_open('login_user', ['id' => 'login_user']);?>
            <form>

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

</body>
</html>
