<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?= $title;?></title>
		<!-- CSS & JS -->
		<link href="/assets/css/bootstrap.min.css" rel="stylesheet"/>
		<script src="/assets/js/bootstrap.bundle.min.js"></script>
<style>
  *{
    margin: 0;
    padding: 0;
    /* outline: red dashed 1px; */
  }
  body{
    /* background-image: linear-gradient(135deg, #00CC88 10%, #038373 100%); */
    /* background-color: #00CC88; */
    background-image: url('../assets/img/bg3.png'); 
    background-size: cover;
    background-color: none;
  }
  .card{
    background-color: #ffffff02;
    backdrop-filter: blur(15px);
    border-color: #FFFFFF;
    /* box-shadow: #038373 20px 16px 26px 16px; */
    box-shadow: #038373 18px 16px 14px;
    box-shadow: blur;
  }
</style>
</head>

<body style="display: flex; justify-content: center; align-items: center; width: 100%; height: 100vh;">

    <div class="container">

        <!-- Outer Row -->
        <div class="d-flex" style="justify-content: center; align-items: center;">

            <div class="log col-5">

                <div class="card">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div>
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-white mb-4">Selamat Datang!</h1>
                                </div>
                                <form class="user" style="padding-top: 5%;">
                                    <div class="form-group mb-3">
                                        <input type="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Username">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <!-- <div class="form-group mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input m-0" id="customCheck">
                                                <label class="custom-control-label text-white align-top" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->
                                    <div class="form-group mb-3">
                                        <input class="form-check-input" type="checkbox" id="customCheck" onclick="showPassword()" >
                                        <label class="form-check-label text-white" for="customCheck">
                                            Check Password
                                        </label>
                                        </div>
                                    <div class="d-flex" style="justify-content: center; align-items: center;">
                                    <button href="" class="btn btn-primary" type="button" style="width: 30%">
                                        Login
                                    </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script>
        function showPassword(){
            var password = document.getElementById('exampleInputPassword');

            if(password.type === "password"){
                password.type = "text";
            } else {
                password.type = "password";
            }
        }
    </script>
</body>
</html>