<?php
    session_start(); 
    include_once "header.php";
    $errors = include("methods/login_validation.php");
?>

<form action="login.php" method="POST">
        <div class="row">

            <div class="container">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    
                    <?php if (count($errors) > 0) { ?>
                        <?php foreach ($errors as $key => $value) { ?>
                            <div class="alert alert-danger">
                                <strong>Error: </strong><?php echo $value; ?>.
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <div class="text-center"><h2>Login</h2></div><br>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Name</label>
                        <div class="col-10">
                            <input name="login" class="form-control" type="text" value="<?php echo $_POST['login']; ?>" placeholder="User" id="example-text-input">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-password-input" class="col-2 col-form-label">Password</label>
                        <div class="col-10">
                            <input name="password" class="form-control" type="password" placeholder="123456" value="<?php echo $_POST['password']; ?>" id="example-password-input">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submitbtn" align="center" class="btn btn-success btn-danger">Login</button>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </form>

<?php include_once "footer.php"; ?>