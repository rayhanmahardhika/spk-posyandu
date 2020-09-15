<!-- <html>
    <head>
        <title>Register</title>
    </head>
    <body>

        <h1>Register</h1>

        <form action="/register/process" method="post">
            {{ csrf_field() }}
            <table>

                <tr>
                    <td>
                        username
                    </td>
                    <td>
                        <input type="text" name="username">
                    </td>
                </tr>

                <tr>
                    <td>
                        password
                    </td>
                    <td>
                        <input type="password" name="password">
                    </td>
                </tr>

                <tr>
                    <td>
                        role
                    </td>
                    <td>
                        <select name="role">
                            <option value="kader">kader</option>
                            <option value="dokter">dokter</option>
                        </select>
                    </td>
                </tr>

            </table>
            <input type="submit" value="Register">
        </form>

    </body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login User</title>

<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/joshua-coleman-AVqs0ItdMQM-unsplash.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
            <span class="login100-form-title p-b-41">
					Daftar Akun
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5"action="/register/process" method="post">
                    @csrf
                    <input type="hidden" name="role" value="1">

                    <div class="wrap-input100 validate-input" data-validate = "Enter your name">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate="Select Role">
                    <select class="custom-select input100" name="role">
                        <option selected>Anda Dokter atau Kader ?</option>
                        <option value="kader">kader</option>
                        <option value="dokter">dokter</option>
                    </select>
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-32">
					<p>Sudah punya akun? </p> &nbsp <a class="text-primary" href="/login">Klik Disini untuk Login</a>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Daftar
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
