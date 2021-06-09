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
          <nav class="navbar navbar-expand-lg navbar-dark disabled" style="background-color:cadetblue">
            <div class="container-fluid">
              <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="./index.php"><img src="./assets/favicon.ico" style="border-radius:25%;"/>  Tech Bank</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item ">
                    <a class="nav-link active" aria-current="page" href="#" onclick="alerthome();">Home</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav><hr />
      </div>
    </div>

    <div class="cointainer-fluid">
      <div class="row mx-auto">
        <div class="col-sm-6 mx-auto">
          <form method="post" action="transferd.php">
              <label for="t_from" class="form-lable">Transfering From</label>
              <input value="<?php $t_from = $_GET['t_from']; echo $t_from;?>" class="form-control" name="t_from"/>
              <label for="t_to" class="form-lable">Transfering To</label>
              <input class="form-control" name="t_to" value="<?php $t_to = $_GET['t_to']; echo $t_to ?>"/>
              <label for="amount" class="form-lable">Enter Amount</label>
              <input type="number" class="form-control" name="amount" required/>
              <input type="submit" class="btn btn-primary" value="Proceed" min="1" />
              <div class="invalid-feedback">
                  Please enter amount
              </div>
          </form>
        </div>
      </div>
    </div>


    <script>
        function alerthome() {
            var txt;
            if (confirm("Do you want to cancel the Transaction!!")) {
                window.location.reload("./index.php")
            }
        }
    </script>

</body>
</html>
