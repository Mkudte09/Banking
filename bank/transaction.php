<?php
require 'header.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Transaction</title>
</head>
<style>
h1 {
    text-align: center;
    font-weight: bold;
}

table,
td,
th {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 10px 10px;
    text-align: center;
    margin: auto auto;
}

div {
    text-align: center;
}

.transfer {
    text-align: left;
    margin: 10px 150px;
}

.dropdown {
    text-align: left;
    margin: 10px 150px;
}

</style>
<body>
<form method="post" class="tabletext" >
    <div>
        <br>
        <h1>Transaction</h1>
        <br>
        <table style="width:80%">
            <tr>
                <th width="5%">ID</th>
                <th width="20%">Customer Name</th>
                <th width="35%">Email</th>
                <th width="15%">Balance</th>
            </tr>
            <tr>
                <?php
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM `users` WHERE customer_id=$id";
                    $result = mysqli_query($conn, $sql);
                }
                while($row = mysqli_fetch_assoc($result))
            {
                ?>
                <td><?php echo $row['customer_id'];?></td>
                <td><?php echo $row['customer_name'];?></td>
                <td><?php echo $row['customer_email'];?></td>
                <td><?php echo $row['customer_balance'];?></td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <br>
        <?php
    if(isset($_POST['submit']))
        {
            $from = $_GET['id'];
            $to = $_POST['to'];
            $amount = $_POST['amount'];

            $from_sql = "SELECT * FROM users WHERE customer_id = $from";
            $from_result = mysqli_query($conn, $from_sql);
            $from_row = mysqli_fetch_assoc($from_result);

            $to_sql = "SELECT * FROM users WHERE customer_id = $to";
            $to_result = mysqli_query($conn, $to_sql);
            $to_row = mysqli_fetch_assoc($to_result);

            if($amount > $from_row['customer_balance'])
            {
     
                echo '<script type="text/javascript">';
                 echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
                 echo '</script>';
            }
            else{
                //sender account update after transaction 
                $newbalance = $from_row['customer_balance'] - $amount;
                $sql = "UPDATE users SET customer_balance=$newbalance where customer_id= $from";
                $result = mysqli_query($conn, $sql);

                //recivers account update after succesfully transaction
                $newbalance = $to_row['customer_balance'] + $amount;
                $sql = "UPDATE users SET customer_balance=$newbalance where customer_id= $to";
                $result = mysqli_query($conn, $sql);

                $sender = $from_row['customer_name'];
                $receiver = $to_row['customer_name'];
                $sql = "INSERT INTO transaction(`sender`, `reciver`, `amount`) VALUES('$sender', '$receiver', '$amount')";
                $result= mysqli_query($conn, $sql);

                if($result)
                {
                    echo "<script> alert('Transaction Successful');
                     window.location = 'transactionhistory.php';
                   </script>";   
               }
               $newbalance = 0;
               $amount= 0;
            }
        }
  
        ?>
 
            <label>
                <h4>Transfer To:</h4><label>
                    <select name="to"  class="form-control"  required>
                    <option value="" disabled selected>Choose To Transfer</option>

                    <?php
                    $sql = "SELECT * FROM users WHERE customer_id <> $id";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                    ?>
                        <option class="table" value="<?php echo $row['customer_id'];?>"><?php echo $row['customer_name'];?></option>
                        <?php }?>
                    </select>
                    <br>
                    <br>
                    <label>
                        <h4>Amount:</h4><label>
                        <input class="form-control" type="number" min="1" id="number" 
                        name="amount" required>
                    <br>
                    <br>
                    <br>
                    <button name="submit" type="submit" value="update">Make Payment</button>
        </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
<?php
include 'footer.php';
?>