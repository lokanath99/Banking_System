<!DOCTYPE HTML>
<html>
<head>
    <title>Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/favicon.ico" />
</head>
<body style=" background: url('./assets/TechBank.jpg') no-repeat center center fixed;">

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:cadetblue" >
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="./index.php"><img src="./assets/favicon.ico" style="border-radius:25%;"/>  Tech Bank</a>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item ">
              <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
            </li>
            <li>
                <a class="nav-link active" aria-current="page" href="./customer_details.php">Customers</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <?php
        $acc_no = $_GET['id'];
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
        $sql = "SELECT name, acc_no, email, phone, balance  FROM customer WHERE acc_no = $acc_no";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $name =  $row["name"];
                $acc_no = $row["acc_no"];
                $email = $row['email'];
                $phone = $row['phone'];
                $balance = $row['balance'];
                echo '<div class="container-fluid>
                        <div class="row">
                            <div class="col-sm-4 mx-auto text-center">
                            <div class="card mx-auto" style="width: 18rem;">
                            <img src="assets/customer.png" class="card-img-top" style="height:80%;width:100%" alt="customer.jpg">
                            <div class="card-body">
                                <h5 class="card-title card-header">'."Name - $name".'</h5>
                                    <p class="card-text">'."Account Number - $acc_no".'</p>
                                    <p class="card-text">'."email - $email".'</p>
                                    <p class="card-text">'."phone - $phone".'</p>
                                    <p class="card-footer">'."Banance - $balance".'</p>
                                    <button'."  " ."onclick="."transact($acc_no);"." " .'class="btn btn-primary">Transfer Money</button>
                             </div>
                        </div>
                    </div>
                </div>
                </div>';
            }
        }
        else {
             echo "0 results";
        }
        $conn->close();

    ?>

    <script>
         function transact(acc_no) {
            console.log(acc_no);
            window.location.href = '/Banking_System/transact.php?id=' + acc_no;
    }

    </script>

</body>
</html>
