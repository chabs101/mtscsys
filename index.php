<!DOCTYPE html>
<?php 
    require_once('./controller/DBConn.php');
    $db = new DBconn();
	session_start();
    $db->checkRememberToken();
	if(isset($_SESSION[$_ENV["database_name"].'-fullname'])) {
		header('Location:view/dashboard');
	}

?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login | <?php include('./view/inc_common/title_name.php');?></title>
        <link href="./assets/css/styles.css" type="text/css" rel="stylesheet" />
        <link href="./assets/css/animate.css" rel="stylesheet" />
        <link rel="stylesheet" href="./assets/css/fontawesome/css/all.css"/>
        <style>
            .bg-secondary {
                background:linear-gradient(#0000008f,#007bff63), url(./assets/img/P5310007.jpg) !important;
                background-repeat: no-repeat !important;
                background-position: top !important;
                background-size: 100%, 100% !important;
            }

            .bg-light {
                background-color: rgb(6 6 6 / 72%) !important;
                color:white !important;
            }

            .bg-light .text-muted {
                color: white !important;
            }

            .card { 
                background-color: rgb(255 255 255 / 92%) !important;
            }

        </style>
    </head>
    <body class="bg-secondary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 animate__animated animate__pulse">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4"><b>MTSC Seed Tracker</b></h3>
                                            <h5 style="color:red;" id="invalid_credentials">Invalid Username or Password.</h5>
                                        </div>
                                    <div class="card-body">
                                        <form action="#" id="login-form" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Username</label>
                                                <input class="form-control py-4" id="input_username" name="input_username"  placeholder="Enter username" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" type="password" id="input_password" name="input_password"  placeholder="Enter password" />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="remember_me" type="checkbox" name="remember_me" />
                                                    <label class="custom-control-label" for="remember_me">Remember password</label>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0">
                                                <button class="btn btn-primary float-right" id="login-btn" type="button">Login</button>   
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <?php include('./view/inc_common/footer.php');?>
        </div>

        <script>
            document.querySelector("footer").classList.remove("py-4");
            document.querySelector("footer").classList.add("py-1");
            var loginBtn = document.querySelector('#login-btn');
            var formData = {};
            var invalid_credentials = document.querySelector("#invalid_credentials");			
            invalid_credentials.hidden = true;
            // document.querySelectorAll('#login-form input').forEach((el) => {
            //     formData[el.name] = el.value;
            //     // console.log(el.name);
            //     // console.log(el)
            // });
            // console.log(document.querySelectorAll('#login-form input'))
            // console.log(JSON.stringify(formData));
            document.querySelectorAll("#input_password, #input_username").forEach((el)=> {
                el.addEventListener('keyup',  function(e){
                    if(e.keyCode == 13) {
                        loginBtn.click();
                    }
                }); 
            });
            loginBtn.addEventListener('click', async function() {
    		    var arr = {};
    		    var input_username     = document.getElementById('input_username');
                var input_password  = document.getElementById('input_password');
                var remember_me  = document.getElementById('remember_me');

    		    arr["input_username"]    = input_username.value;
                arr["input_password"] = input_password.value;
                arr["remember_me"] = remember_me.checked;
            	console.log(JSON.stringify(arr))
                fetch('./controller/api/authenticate.php', {
                   method: 'POST',
                   header : {
	                'Accept': 'application/json',
	                'Content-Type': 'application/json',
                   },
                   body : JSON.stringify(arr)
                })
                .then(response => response.json())
                .then((data) => {
                	console.log(data)
                    if(data[0].success) {
                        invalid_credentials.hidden = true;
                        window.location.href = "./view/dashboard";
                        return;
                    }
                    invalid_credentials.hidden = false;
                });
            });          
        </script>
    </body>
</html>
