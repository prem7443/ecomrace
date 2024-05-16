<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration </h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5 ">
                <img src="../images/1.png" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="usrename" class="form-lable">Usrename</label>
                        <input type="text" id="username" name="username" placeholder="Enter your username"
                            required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-lable">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email"
                            required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-lable">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password"
                            required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm password" class="form-lable">ConfirmPassword</label>
                        <input type="confirm password" id="confirm password" name="confirm password" placeholder="Enter your confirm password"
                            required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration" value="Register">
                        <p class="small">Don't you have an account? <a href="admin_login.php">Login</a></p>
                    </div>
                </form>
            </div>

        </div>
</body>

</html>