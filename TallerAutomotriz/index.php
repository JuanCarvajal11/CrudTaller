<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap v5.1.3 CDNs -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>LOGIN | TALLLER AUTOMOTRIZ</title>
</head>

<body class="">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="login bg-body-secondary">
                    <h1 class="text-center">Bienvenido!</h1>
                    <form class="needs-validation" action="./config/Process.php" method="post">
                        <div class="form-group was-validated">
                            <label class="form-label" for="email">Email address</label>
                            <input class="form-control" type="email" id="email" name="email" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Please enter your email address
                            </div>
                        </div>
                        <div class="form-group was-validated">
                            <label class="form-label" for="password">Password</label>
                            <input class="form-control" type="password" id="password" name="pass" autocomplete="off" required>
                            <div class="invalid-feedback">
                                Please enter your password
                            </div>
                        </div>
                        <input class="btn btn-success w-100 mt-3" type="submit" value="SIGN IN" name="login">
                    </form>

                </div>
            </div>
        </div>

    </div>
</body>

</html>