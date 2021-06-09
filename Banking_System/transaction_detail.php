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

            $sql = "SELECT * FROM transactions";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                $i = 1;
                // output data of each row
                while($row = $result->fetch_assoc()) {

                $t_no =  $row["T_no"];
                $t_from = $row["t_from"];
                $t_to = $row["t_to"];
                $amount = $row["amount"];

                echo "<div class="."col-sm-3".">"."<br/>";
                echo "<div class="."card".">";
                echo "<div class="."card-body".">";
                echo "<p class="."card-header " .">".'Transaction ID '."$t_no"."</p>";
                echo "<p class="."card-text" .">".'Transferd from Acc '."$t_from"."</p>";
                echo "<p class="."card-text" .">".'Transferd To Acc '."$t_to"."</p>";
                echo "<p class="."card-footer" .">".'Amount - '."$amount"."</p>";

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
        <br />
        <button class="btn btn-primary mx-auto text-center" style="margin:auto;text-align:center" onclick="viewDetails()">home</button>
      </div>


      <script>
          function viewDetails() {
              window.location.href = '/Banking_System/index.php';
            }
      </script>

</body>
</html>
