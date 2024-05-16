<?php
include("session-checker.php");

if (isset($_POST['submit']))
{
    include("connection.php");

    try
    {
        $username = $_SESSION['Username'];
        $password = $_POST['password'];

        $sql = 'UPDATE tbl_admin
                SET password = :password
                WHERE username = :username';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        $stmt->execute();
        $changeSuccess = "<span style='color:green' class='fs-3'>Your password has been changed. Please login again.</span>";
        session_destroy();
    }
    catch (Exception $e)
    {
        echo $sql . "<br>" . $e->getMessage();
        echo $sql . "<br>" . $e->getTraceAsString();
    }
}
?>
<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Change Password - Bulaluhan ni Kuya Will</title>
        <!-- Bootstrap CSS for responsive design and components -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image" href="assets/img/favicon.ico">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous" defer></script>
    </head>
    <body class="bg-image">
        <script src="js/scripts.js" defer></script>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 mt-5 pt-3">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 bg-light bg-gradient">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Change Password</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3 text-muted text-center">Enter your new password.</div>
                                        <form method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" name="password" type="password" placeholder="Password" required />
                                                <label for="password">Password</label>
                                            </div>
                                            <div class="text-center mt-4 mb-0">
                                                <button type="submit" class="btn btn-lg btn-primary" id="submit" name="submit">Change</button>
                                                <button type="button" class="btn btn-lg btn-primary" id="back" name="back" onclick="window.location.href='index.php';">Back</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container" <?php if (!isset($changeSuccess)) { echo 'hidden';} ?>>
                        <div class="row justify-content-center">
                            <div class="col-lg-5 mt-3 pt-3">
                                <div class="card rounded alert alert-success">
                                    <div class="card-body text-center">
                                        <?php echo $changeSuccess; ?>
                                        <br>
                                        <button type="button" class="btn btn-lg btn-primary mt-3" onclick="window.location.href='login.php';">Login</button>
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
                        <div class="text-center small">
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
    </body>
</html>