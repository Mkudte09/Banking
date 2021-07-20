<?php
require 'header.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>TSF Bank Users</title>
</head>
<style>
    h1{
        text-align:center;
        font-weight:bold;
    }
    table,td, th {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 10px 10px;
  text-align:center;
  margin:auto auto;
}
.box{
    border:solid black 1px;
    background-color:black;
    text-decoration:none;
    color:white;
    padding:5px 5px;
}

    </style>
<body>

    <div>
        <br>
        <h1>Customers List</h1>
        <br>
        <table style="width:80%">
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Balance</th>
                <th >Action</th>
            </tr>
            <tr>
                <?php 
                $sql = "SELECT * FROM `users`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) 
               {?>
                <td><?php echo $row['customer_id'];?></td>
                <td><?php echo $row['customer_name'];?></td>
                <td><?php echo $row['customer_email'];?></td>
                <td><?php echo $row['customer_balance'];?></td>
                <td><a class ="box" href = "transaction.php?id=<?php echo $row['customer_id'];?>">TRANSFER</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
<?php 
require 'footer.php';
?>