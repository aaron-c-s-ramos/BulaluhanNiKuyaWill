<?php
if (isset($_POST['submit']))
{
    include("connection.php");

    $admin_id = $_POST['admin_id'];
    $username = $_POST['username'];
    $password = "admin";

    try
    {
        $sql = 'SELECT * FROM tbl_admin
                WHERE username = :username AND admin_id = :admin_id';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':admin_id', $admin_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row)
        {
            $sql = 'UPDATE tbl_admin
                    SET password = :password
                    WHERE admin_id = :admin_id';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':admin_id', $admin_id);
            $stmt->execute();

            $resetSuccess = "<span style='color:green' class='fs-3'>Your password has been reset. Please change it immediately.</span>";
        }
        else
        {
            $resetError = "<span style='color:red' class='fs-3'>Invalid Username or Admin ID</span>";
        }
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

        <title>Password Reset - Bulaluhan ni Kuya Will</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image" href="assets/img/favicon.ico">

        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-image">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>

        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 mt-0 pt-0">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 bg-light bg-gradient">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Password Recovery</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3 text-muted text-center">Enter your username and Admin ID. Your account password will be reset to it's default value.</div>
                                        <form method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="username" name="username" type="text" placeholder="Username" required />
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="admin_id" name="admin_id" type="number" placeholder="Admin ID" required />
                                                <label for="admin_id">Admin ID</label>
                                            </div>
                                            <div class="text-center mt-4 mb-0">
                                                <button type="submit" class="btn btn-lg btn-primary" id="submit" name="submit">Reset</button>
                                                <button type="button" class="btn btn-lg btn-primary" id="back" name="back" onclick="window.location.href='login.php';">Back</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container" <?php if (!isset($resetSuccess)) { echo 'hidden';} ?>>
                        <div class="row justify-content-center">
                            <div class="col-lg-5 mt-2 pt-2">
                                <div class="card rounded alert alert-success">
                                    <div class="card-body text-center">
                                        <?php echo $resetSuccess; ?>
                                        <br>
                                        <button type="button" class="btn btn-lg btn-primary mt-3" onclick="window.location.href='login.php';">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container" <?php if (!isset($resetError)) { echo 'hidden';} ?>>
                        <div class="row justify-content-center">
                            <div class="col-lg-5 mt-5 pt-3">
                                <div class="card rounded alert alert-danger">
                                    <div class="card-body text-center">
                                        <?php echo $resetError; ?>
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
    </body>
</html>