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
          <a class="navbar-brand" href="./index.php"><img src="./assets/favicon.ico" style="border-radius:25%;"/>  Tech Bank</a>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item ">
              <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
        <div class="row"><br />

        <?php
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

            $sql = "SELECT name, acc_no FROM customer";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                $i = 1;
                // output data of each row
                while($row = $result->fetch_assoc()) {

                $name =  $row["name"];
                $acc_no = $row["acc_no"];


                echo "<div class="."col-sm-3".">"."<br/>";
                echo "<div class="."card".">";
                echo '<img src="assets/customer.png" class="card-img-top" style="height:20%;width:100%" alt="customer.jpg">';
                echo "<div class="."card-body".">";
                echo "<p class="."card-title " .">"."$name"."</p>";
                echo "<p class="."card-text" .">"."$acc_no"."</p>";
                echo '<button class="btn btn-primary"'."id=$acc_no".'  '.'onclick="viewDetails(id)">View Details</button>';
                echo "</div>";
                echo "</div>";
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
    </div>

    <script>
        function viewDetails(acc_no) {
            console.log(acc_no);
            window.location.href = '/Banking_System/details.php?id=' + acc_no;
    }
    </script>

</body>
</html>
