<?php
    session_start(); 
    include_once "header.php";
    $user = (include("data/users.php"))[$_SESSION['logged']];
?>

<div class="container">
        <form action="methods/save_info.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3">
                    <div style="width: 240px; overflow: hidden;" class="center-block">
                        <img width="240" height="320" src="<?php
                        if (isset($user['avatar'])) {
                            echo("images/" . $user['avatar']);
                        } else {
                            echo("images/default.jpg");
                        }
                        ?>"><br><br>
                        <center><b><?php echo $_SESSION['logged']; ?></b></center>
                    </div>
                </div>
                <div class="col-md-9">
                    <?php if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0) { ?>
                        <?php foreach ($_SESSION['errors'] as $key => $value) { ?>
                            <div class="alert alert-danger">
                                <strong>Error: </strong><?php echo $value; ?>.
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <input name="login" type="hidden" value="<?php echo $_SESSION['logged']; ?>">
                    <input name="password" type="hidden" value="<?php echo $user['password']; ?>">
                    <input name="user-avatar" type="hidden" value="<?php echo $user['avatar']; ?>">
                        <div class="form-group row">
                            <div class="col-sm-3 col-form-label">
                                <label for="input-firstname">Firstame:</label>
                            </div>
                            <div class="col-sm-10">
                                <input name="firstname" type="text" value="<?php echo $user['firstname']; ?>" class="form-control" id="input-firstname" placeholder="Firstname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 col-form-label">
                                <label for="input-secondname">Secondname:</label>
                            </div>
                            <div class="col-sm-10">
                                <input name="secondname" type="text" value="<?php echo $user['secondname']; ?>" class="form-control" id="input-secondname" placeholder="Secondname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 col-form-label">
                                <label for="input-birthday">Birthday:</label>
                            </div>
                            <div class="col-sm-10">
                                <div class="col-sm-1">
                                    Day: 
                                </div>
                                <div class="col-sm-2">
                                    <input name="dd" type="number" min="1" max="31" value="<?php echo $user['birthday'][0] ?>" class="form-control" id="input-birthday">
                                </div>
                                <div class="col-sm-1">
                                    Month:
                                </div>
                                <div class="col-sm-2">
                                    <input name="mm" type="number" min="1" max="12" value="<?php echo $user['birthday'][1] ?>" class="form-control" id="input-birthday">
                                </div>
                                <div class="col-sm-1">
                                    Year: 
                                </div>
                                <div class="col-sm-2">
                                    <input name="yyyy" type="number" min="1900" max="2002" value="<?php echo $user['birthday'][2] ?>" class="form-control" id="input-birthday">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 col-form-label">
                                <label for="input-avatar">Avatar:</label>
                            </div>
                            <div class="col-sm-10">
                                <input name="avatar" id="input-avatar" type="file">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 col-form-label">
                                <label for="input-description">Description:</label>
                            </div>
                            <div class="col-sm-10">
                                <textarea name="description" id="input-description" style="min-width: 100%; max-width: 100%; min-height: 150px; max-height: 150px;" class="form-group"><?php echo $user['description']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10 text-center">
                                <input type="submit" name="submitbtn" value="Save" class="btn btn-danger btn-primary">
                            </div>
                        </div>
                </div>
            </div>
        </form>
    </div>

<?php include_once "footer.php"; ?>