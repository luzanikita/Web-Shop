<?php session_start(); ?>
<?php include_once "header.php"; ?>

<div class="container">
    <div class="text-center"><h2>Products</h2></div>
    <form action="methods/add.php" method="POST">
    <?php 
        if ($_SESSION['amount-error'] > 0) {
        ?>
        <div class="alert alert-danger">
            <strong>Error: </strong><?php echo "Amount have to be in range from 0 to 1000" ?>.
        </div>
    <?php }?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th width="5%">ID</th>
                <th class="width-25p">Item</th>
                <th class="width-25p">Price</th>
                <th class="width-25p">Amount</th>
            </tr>
            </thead>
            <tbody>

            <?php
                $index = 0;
                $products = include "data/stock.php";
                foreach ($products as $item => $cost):
                    $index++;
            ?>
                <tr>
                    <td><?php echo $index; ?></td>
                    <td><?php echo $item; ?></td>
                    <td><?php echo bcadd($cost, 0, 2); ?> $</td>
                    <td>
                        <input name="<?php echo $item; ?>" class="form-control number-small inline-block" type="number" value="0" min="0" max="1000000000">
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center">
            <input name="submitbtn" type="submit" class="btn btn-danger" value="Add">
        </div>
    </form>
</div>

<?php include_once "footer.php"; ?>