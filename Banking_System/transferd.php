<!DOCTYPE html>
<html>

<head>
    <title>customer_details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/favicon.ico" />
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:cadetblue" >
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="#">Tech Bank</a>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item ">
              <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

        <?php
            $amount = $_POST['amount'];
            $t_from = $_POST['t_from'];
            $t_to = $_POST['t_to'];
            $servername = "localhost";
            $username = "bank";
            $password = "1999";
            $dbname = "banking";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }


            $sql = "SELECT balance FROM customer WHERE acc_no = $t_from";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                // output data of each row
                while($row = $result->fetch_assoc()) {
                $upbalance = $row['balance']-$amount;
                if($upbalance < 0){
                    echo '<p class="info" >Balance is low </p>';
                    exit();
                }
                  else{
                  $sql1 = "UPDATE customer SET Balance = $upbalance WHERE acc_no = $t_from";
                  $conn->query($sql1);
                  }
                }

            } else {
                echo "0 results";
            }

            $sql2 = "SELECT balance FROM customer WHERE acc_no = $t_to";
            $result = $conn->query($sql2);

            if ($result->num_rows > 0) {

                // output data of each row
                while($row = $result->fetch_assoc()) {

                $upbalance = $row['balance'] + $amount;
                $sql3 = "UPDATE customer SET Balance = $upbalance WHERE acc_no = $t_to";
                $conn->query($sql3);
                $transid = rand(10,1000000000);
                $sql4 = "INSERT INTO transactions(T_no, t_from, t_to, amount) VALUES ($transid,$t_from,$t_to,$amount)";
                $conn->query($sql4);

              }
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>

    <div class="container-fluid">
        <div class="row mx-auto">
                <div class="alert alert-primary" role="alert">
                  <div class="col-sm-6 mx-auto">
                    Transfer Successfull Click OK to return to HOME Page
                </div>
                <button class="btn btn-success" onclick="rethome();">OK</button>
                <a type="button" class="btn btn-primary" href="./transaction_detail.php">View Transactions</a>
             </div>
        </div>
    </div>

    <script>
        function rethome() {
            window.location.replace("./index.php");
        }
    </script>

</body>
</html>
