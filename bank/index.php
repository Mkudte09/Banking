<?php
include 'header.php';?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>TSF Bank</title>
</head>
<style>
.image-holder {
    width: 50%;

}

.card{
  margin:10px 10px;
}

.align {
    display: flex;
    flex-direction: column;
    margin:auto auto;
}

.main-image {
    margin: 120px 120px;
}
.container{
  display:flex;

}

</style>

<body>

    <div class="container">
        <div class="image-holder">
            <img class="main-image" src="images/banking.jpg" height="396" width="624">
        </div>
        <div class="align">
            <div class="card" style="width: 15rem;">
                <img src="images/users.png"  width="50px" height="50px" class="card-img-right" alt="...">
                <div class="card-body">
                    <p class="card-text"><a href="users.php">View Users</a></p>
                </div>
            </div>
            <div class="card" style="width: 15rem;">
                <img src="images/transaction.jpg" width="50px" height="50px" class="card-img-right" alt="...">
                <div class="card-body">
                    <p class="card-text"><a href="users.php">Tranfer Money</a></p>
                </div>
            </div>
            <div class="card" style="width: 15rem;">
                <img src="images/transaction_history.png"  width="50px" height="50px" class="card-img-right" alt="...">
                <div class="card-body">
                    <p class="card-text"><a href="transactionhistory.php">View Transaction History</a></p>
                </div>
            </div>
        </div>
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
include 'footer.php';?>