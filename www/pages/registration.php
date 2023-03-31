<?php
    session_start();
    
    include('./components/components.php');
    
    unset($_SESSION['login_error']);
    unset($_SESSION['login_success']);
    unset($_SESSION['update_error']);
    unset($_SESSION['update_success']);

    if (isset($_SESSION['username'])) {
        header('Location: ../pages/level.php');
    }

    if (isset($_SESSION['reg_error'])) {
        $errorMessage = $_SESSION['reg_error'];
    }

?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .vh-100 {
            height: 100vh;
        }
    </style>
</head>

<body class="vh-100 d-flex flex-column justify-content-between">
    <header>
        <?php
        echo createHeader();
        echo createNav();
        ?>
    </header>
    <article class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                if ($errorMessage) {
                    echo "<div class='alert alert-dismissible alert-danger fade show mt-3'>
                                $errorMessage
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                            </div>";
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        Register
                    </div>
                    <div class="card-body">
                        <form method="POST" action='../helpers/auth.php'>
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">Confirm Password:</label>
                                <input type="password" class="form-control" id="confirm-password" name="confirm-password" required>
                            </div>
                            <div class="form-group">
                                <label for="first-name">First Name:</label>
                                <input type="text" class="form-control" id="first-name" name="first-name" required>
                            </div>
                            <div class="form-group">
                                <label for="last-name">Last Name:</label>
                                <input type="text" class="form-control" id="last-name" name="last-name" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="create">Create</button>
                            <a href="login.php" class="btn btn-secondary" name="sign-in">Sign in</a>
                        </form>

                        <?php if($error){ ?>
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                <strong>Atention!</strong> <?= $error ?>
                            </div>
                        <?php } ?>

                    </div>
                </div>

            </div>
        </div>
    </article>
    <?php echo createFooter(); ?>
    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>