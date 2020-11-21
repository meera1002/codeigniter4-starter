<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title></title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('users') ?>">
                Dashboard
            </a>
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
                   <?php if(!isset($id)){?>
                    <li class="nav-item">
                        <a class="nav-link" >login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" >Register</a>
                    </li>
                    <?php }else{?>
                       <li class="nav-item">
                           <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
                       </li>
                      <?php }?>
                </ul>
            </div>
        </div>
    </nav>