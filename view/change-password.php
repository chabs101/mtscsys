<?php include('inc_common/session.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Change Password | <?php include('inc_common/title_name.php');?></title>
          
        <!-- END META SECTION -->
        <?php include('inc_common/main_css.php');?>        

    </head>
<!--         <audio id="notifalert">
            <source src="" type="audio/mpeg">
        </audio> -->
<body>
        <?php include('inc_common/top_navigation.php');?>        

        <div id="layoutSidenav">
            <?php include('inc_common/page_sidebar.php');?>        

            <div id="layoutSidenav_content">

                <main>
                    <div class="container-fluid">
                        <h5 class="mb-0">&nbsp;</h5>
                        <div class="row">
                           <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                <h5>CHANGE PASSWORD</h5>
                                <form id="changePasswordForm">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Old Password</label>
                                    <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Password">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Password">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Confirm Password</label>
                                    <input type="password" class="form-control" id="input_confirm_password" name="input_confirm_password" placeholder="Password">
                                  </div>
                                </form>
                              
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary float-right" id="changePassBtn">SUBMIT</button>

                                </div>
                            </div>
                              
                           </div> 
                        </div>        
                    </div>
                </main>
<!-- MODAL -->

<!-- MODAL END -->
                <?php include('inc_common/footer.php'); ?>
            </div>
        </div>
        <?php include('inc_common/main_js.php');?>  
        <script>
            changePasswordForm = document.querySelector("#changePasswordForm");       
            changePassBtn = document.querySelector("#changePassBtn");

            changePassBtn.addEventListener('click', async()=> {
                const formData = new FormData(changePasswordForm);
                changePasswordForm = document.querySelector("#changePasswordForm");
                validateInput = {};
                changePasswordForm.querySelectorAll("input, select").forEach((el) => {
                    validateInput[el.getAttribute('name')] = el.value;
                });
                constraints = {
                    old_password :{
                        presence : {allowEmpty:false}
                    },
                    new_password :{
                        presence : {allowEmpty:false},
                        length: {
                            minimum:5,
                            maximum:11
                        }
                    },
                    input_confirm_password :{
                        presence : {allowEmpty:false},
                        equality : "new_password",
                        length: {
                            minimum:5,
                            maximum:11
                        }
                    },
                };

                resultValidate = validate(validateInput,constraints); //true or false
                if(resultValidate) {
                    resultMessage = "";
                    for(var index in resultValidate) {
                        resultMessage += resultValidate[index][0] +" \n ";
                        document.querySelector("#"+index).classList.add("is-invalid");
                    }

                         swal({
                            position: 'center',
                            icon: 'warning',
                            title: "Ooops !",
                            text: resultMessage,
                            timer: 1500
                          });
                         return;
                }
                console.log(resultValidate);


                fetch('../controller/api/setup-user/change-password.php', {
                   method: 'POST',
                   // header : {
                   //  'Accept': 'application/json',
                   //  'Content-Type': 'application/json',
                   // },
                   body : formData
                })
                .then(response => response.json())
                .then((data) => {
                    if(data[0].success) {
                         swal({
                            position: 'center',
                            icon: 'success',
                            title: data[0].message,
                            showConfirmButton: false,
                            timer: 1000
                          });  

                        changePasswordForm.querySelectorAll("input, select").forEach((el) => {
                            el.classList.remove("is-invalid");
                        });

                        return;
                     }

                         swal({
                            position: 'center',
                            icon: 'error',
                            title: data[0].message ?? "Something went wrong.",
                            timer: 1000
                          });  
                        return;

                });

            });
        </script>      
</body>
</html>






