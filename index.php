<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>stkpush</title>
    
    <!-- Bootstrap CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles -->
    <style>
        body {
            background-color: goldenrod;
        }
        .container {
            display: flex;
            align-items: center;
        }
        .image {
            margin-right: 20px;
        }
        .text {
            font-size: 16px;
        }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Refresh</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="balance.html">Wallet</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit"><a href="signin.php">Sign Out</a></button>
    </form>
  </div>
</nav>

<!-- package showcase -->
<section id="product" class="bg-dark p-5">
    <div class="text-center text-light">
        <h1>PICK A PACKAGE TO BEGIN</h1>
    </div>

    <?php if (isset($_GET['error'])) { ?>
    <div class="bg-primary text-light text-center">
        <!-- Error message goes here -->
    </div>
    <?php } ?>

    <div class="container">
        <div class="row">
            <!-- Bronze package -->
            <div class="col">
                <div class="card bg-light mb-3">
                    <div class="card-body text-center">
                        <img class="rounded" src="image/bronce.png" alt="Bronze Package">
                        <h3 class="card-title mb-3 text-primary">ksh.1000</h3>
                        <h4 class="card-title mb-3 text-primary">BRONZE PACKAGE</h4>
                        <p class="lead">TOTAL INCOME: 1800</p>
                        <p>NUMBER OF DAYS: 30</p>
                        <p>DAILY INCOME: 60</p>
                        <form class="form" action="action.php" method="POST">
                            <input type="hidden" class="form-control" name="amount" value="1000" required>
                            <input type="number" class="form-control" name="phone" value="" placeholder="mpesa phone">
                            <button type="submit" name="submit" class="btn btn-info mt-6">INVEST NOW</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Silver package -->
            <div class="col">
                <div class="card bg-light mb-3">
                    <div class="card-body text-center">
                        <img class="rounded" src="image/silver.png" alt="Silver Package">
                        <h3 class="card-title mb-3 text-primary">ksh.3200</h3>
                        <h4 class="card-title mb-3 text-primary">SILVER PACKAGE</h4>
                        <p class="lead">TOTAL INCOME: 4800</p>
                        <p>NUMBER OF DAYS: 30</p>
                        <p>DAILY INCOME: 160</p>
                        <form class="form" action="action.php" method="POST">
                            <input type="hidden" class="form-control" name="amount" value="3200" required>
                            <input type="number" class="form-control" name="phone" value="" placeholder="mpesa phone">
                            <button type="submit" name="submit" class="btn btn-info mt-6">INVEST NOW</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Gold package -->
            <div class="col">
                <div class="card bg-light mb-3">
                    <div class="card-body text-center">
                        <img class="rounded" src="image/gold.png" alt="Gold Package">
                        <h3 class="card-title mb-3 text-primary">ksh.12000</h3>
                        <h4 class="card-title mb-3 text-primary">GOLD PACKAGE</h4>
                        <p class="lead">TOTAL INCOME: 16500</p>
                        <p>NUMBER OF DAYS: 30</p>
                        <p>DAILY INCOME: 550</p>
                        <form class="form" action="action.php" method="POST">
                            <input type="hidden" class="form-control" name="amount" value="12000" required>
                            <input type="number" class="form-control" name="phone" value="" placeholder="mpesa phone">
                            <button type="submit" name="submit" class="btn btn-info mt-6">INVEST NOW</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Emerald package -->
            <div class="col">
                <div class="card bg-light mb-3">
                    <div class="card-body text-center">
                        <img class="rounded" src="image/emerald.png" alt="Emerald Package">
                        <h3 class="card-title mb-3 text-primary">ksh.45000</h3>
                        <h4 class="card-title mb-3 text-primary">EMERALD PACKAGE</h4>
                        <p class="lead">TOTAL INCOME: 66900</p>
                        <p>NUMBER OF DAYS: 30</p>
                        <p>DAILY INCOME: 2230</p>
                        <form class="form" action="action.php" method="POST">
                            <input type="hidden" class="form-control" name="amount" value="45000" required>
                            <input type="number" class="form-control" name="phone" value="" placeholder="mpesa phone">
                            <button type="submit" name="submit" class="btn btn-info mt-6">INVEST NOW</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer mt-auto py-3 bg-light text-center">
    <div class="container">
        <span class="text-muted">&copy; <?php echo date("Y"); ?> All rights reserved. Email: <a href="mailto:marsinterafricallc@gmail.com">marsinterafricallc@gmail.com</a></span>
    </div>
</footer>

<!-- Bootstrap JS and jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
