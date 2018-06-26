<html>
    <head>
        <title>Shop</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="libs/bootstrap/css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-default">
                <div class="container">
                    <ul class="nav navbar-nav nav-center width-full">
                        <li class="width-25p text-center"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li class="width-25p text-center"><a href="products.php"><span class="glyphicon glyphicon-list-alt"></span> Products</a></li>
                        <li class="width-25p text-center"><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                        <?php if(!isset($_SESSION['logged'])) { ?>
                            <li class="width-25p text-center"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <?php } else { ?>
                            <li class="width-15p text-center"><a class="inlineLink" href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                            <li class="text-center" width="10%"><a href="methods/logout.php"><span class="glyphicon glyphicon-log-out"></span></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </header>