<?php
session_start();
include_once "header.php"; ?>

<div class="container">
    <div class="text-center"><h2>Cart</h2></div>
    <?php if(!empty($_SESSION['logged'])) { ?>
    <?php if (isset($_SESSION) && isset($_SESSION['cart']) && include("methods/empty_cart.php")) { ?>
        
            <table class="table table-striped">
                <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th class="width-15p">Item</th>
                    <th class="width-15p">Cost</th>
                    <th class="width-15p">Amount</th>
                    <th class="width-15p">Total cost</th>
                    <th class="width-15p">Remove</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $products = include "data/stock.php";
                $totalSum = 0;
                $index = 0;
                foreach ($_SESSION['cart'] as $item => $amount):
                    if ($amount == 0)
                        continue;
                    $index++;
                ?>
                    <tr>
                        <td width="5%"><?php echo $index; ?></td>
                        <td class="width-15p"><?php echo $item; ?></td>
                        <td class="width-15p"><?php echo $products[$item]; ?> $</td>
                        <td class="width-15p"><?php echo bcadd($amount, 0); ?></td>
                        <td class="width-15p"><?php echo bcmul($products[$item], $amount, 2); ?> $</td>
                        <td class="width-15p">
                            <form action="methods/remove.php" method="POST">
                                <input type="hidden" name="item" value="<?php echo $item; ?>">
                                <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </td>
                    </tr>
                <?php
                     $totalSum = bcadd($totalSum, bcmul($products[$item], $amount, 2), 2);
                    endforeach;
                ?>
                <tr>
                    <td>Total:</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $totalSum; ?> $</td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        <form action="methods/buy.php" method="POST">
            <div class="text-center"><input type="submit" class="btn btn-danger" value="Buy"></div>
        </form>
    <?php } else { ?>
        <div class="text-center"><a href="products.php">Your cart is empty. Go shopping!</a></div>
    <?php } ?>
    <?php } else { ?>
    <div class="text-center"><a href="login.php">Log in, please!</a></div>
    <?php } ?>
</div>

<?php include_once "footer.php"; ?>
