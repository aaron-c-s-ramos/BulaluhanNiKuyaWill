<?php
session_start();
session_destroy();
session_start();

if (isset($_POST['submit']))
{
    include("connection.php");

    $sql = "SELECT * FROM tbl_admin ORDER BY admin_id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $logins = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $userName = $row['username'];
        $passWord = $row['password'];

        $logins[$userName] = $passWord;
    }

    $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
    $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

    if (isset($logins[$Username]) && $logins[$Username] == $Password) {
        $_SESSION['Username'] = $Username;
        $_SESSION['Password'] = $Password;
        header("location:index.php");
        exit;
    }
    else
    {
        $loginError = "<span style='color:red' class='fs-3'>Invalid Login Details</span>";
    }
}
?>
<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Admin Login - Bulaluhan ni Kuya Will</title>
        <!-- Bootstrap CSS for responsive design and components -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image" href="assets/img/favicon.ico">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous" defer></script>
    </head>
    <body class="bg-success bg-gradient">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 mt-0 pt-0">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 bg-light bg-gradient">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Login</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="Username" name="Username" type="text" placeholder="Username" />
                                                <label for="Username">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="Password" name="Password" type="password" placeholder="Password" />
                                                <label for="Password">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a href="resetPassword.php">Forgot Password?</a>
                                                <button type="submit" class="btn btn-lg btn-primary" id="submit" name="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container" <?php if (!isset($loginError)) { echo 'hidden';} ?>>
                        <div class="row justify-content-center">
                            <div class="col-lg-4 mt-5 pt-3">
                                <div class="card rounded alert alert-danger">
                                    <div class="card-body text-center">
                                        <?php echo $loginError; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto bg-light bg-gradient">
                    <div class="container-fluid px-4">
                        <div class="text-center">
                            <div class="text-mute">Copyright &copy; Bulaluhan ni Kuya Will 2023</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- Bootstrap JavaScript bundle for handling UI components -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
        <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
        <script src="js/scripts.js" defer></script>
    </body>
</html>
