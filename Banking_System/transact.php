<!DOCTYPE html>
<html>
<head>
    <title>transact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/favicon.ico" />
</head>
<body>

<div class="container-fluid text-center">
    <div class="row">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:cadetblue" >
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="./index.php"><img src="./assets/favicon.ico" style="border-radius:25%;"/>  Tech Bank</a>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item ">
              <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link active" aria-current="page" href="./customer_details.php">Customers</a>
            </li>
          </ul>
        </div>
      </div>
    </nav><hr />

    <div class="row mx-auto">
    <div class="col-sm-12 mx-auto">
          <p class="alert alert-info" role="alert">Transfering from <?php $t_from = $_GET['id']; echo $t_from?></p>
          <p class="alert alert-danger alert-heading text-center" role="alert">Please select Account to transfer.</p>
    </div>
    </div>

            <?php
            $t_from = $_GET['id'];
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

            $sql = "SELECT name, acc_no FROM customer WHERE acc_no != $t_from";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                $i = 1;
                // output data of each row
                while($row = $result->fetch_assoc()) {

                $name =  $row["name"];
                $acc_no = $row["acc_no"];


                echo "<div class="."col-sm-3".">";
                echo '<a onclick='."transact($t_from,$acc_no);".'>';
                echo "<div class="."card".">";
                echo '<img src="assets/customer.png" class="card-img-top" style="height:80%;width:100%" alt="customer.jpg">';
                echo "<div class="."card-body".">";
                echo "<p class="."card-title" .">"."<strong>$name</strong>"."</p>";
                echo "<p class="."card-header" .">"."$acc_no"."</p>";
                echo "</div>";
                echo "</div>";
                echo '</a>';
                echo "</div>";
                $i+=1;
                }
                echo "</div>";
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>

    </div>

    <script>
        function transact(t_from, t_to) {
            window.location.href = '/Banking_System/transfer.php?t_from=' + t_from + '&t_to=' + t_to ;
    }
    </script>

</body>
</html>
