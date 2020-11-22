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
            <?php if(isset($user) && $user['id'] && $user['role_id'] == 1 ){?>
            <a class="navbar-brand" href="<?= base_url('users') ?>">
                Dashboard
            </a>
            <?php }elseif(isset($user) && $user['id'] && $user['role_id'] == 2 ){?>
                <a class="navbar-brand" href="<?= base_url('subscriptions/'.$user['id']) ?>">
                    Subscriptions
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

                    <?php if(isset($user) && $user['id']){?>
                       <li class="nav-item">
                           <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
                       </li>
                      <?php }?>
                </ul>
            </div>
        </div>
    </nav>