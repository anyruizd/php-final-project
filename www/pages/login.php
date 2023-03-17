<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    // prepare the SQL statement
    $sql = "SELECT * FROM playerAuth WHERE userName = ? AND passCode = ?";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);

    // execute the SQL statement
    $result = mysqli_stmt_get_result($stmt);

    // check if there is a matching user
    if (mysqli_num_rows($result) > 0) {
        // fetch the user data
        $row = mysqli_fetch_assoc($result);

        // verify the password
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username; // set the session variable
            header("Location: dashboard.php"); // redirect to the dashboard page
        } else {
            $error = 'Invalid username or password';
        }
    } else {
        $error = 'Invalid username or password';
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="connect">Connect</button>
                            <a class="btn btn-secondary" href="/registration">Register</a>
                        </form>

                        <?php if($error){ ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Atention!</strong> <?= $error ?>
                            </div>
                        <?php } ?>
                        
                        <script>
                          var alertList = document.querySelectorAll('.alert');
                          alertList.forEach(function (alert) {
                            new bootstrap.Alert(alert)
                          })
                        </script>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>

        const form = document.querySelector('form');
        const username = form.querySelector('#username');
        const password = form.querySelector('#password');

        form.addEventListener('submit', (event) => {
            // Check if username and password are correct
            if (!checkCredentials(username.value, password.value)) {
                alert('Sorry, you entered a wrong username or password!');
                event.preventDefault();
                return;
            }

            // Start session and redirect to first level game
            startSession();
            window.location.href = 'first-level-game.html';
        });

        function checkCredentials(username, password) {
            // Check if username and password are correct
            // Return true if credentials are correct, false otherwise
        }

        function startSession() {
            // Start session
        }

    </script>
</body>

</html>