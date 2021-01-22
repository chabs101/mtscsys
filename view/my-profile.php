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
                                <h5>MY PROFILE</h5>
                                <form id="changeMyProfileForm" enctype="multipart/form-data">

            
                                    <div class="form-row">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="control-label">First Name :<b class="color-red">*</b>&nbsp;</label>
                                                <input class="form-control" type="hidden" id="user_id" name="user_id" value="<?=$_SESSION['user']['id']?>"/>
                                                <input class="form-control" type="text" id="first_name" name="first_name" required="true" value="<?=$_SESSION['user']['first_name']?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="control-label">Last Name :<b class="color-red">*</b>&nbsp;</label>
                                                <input class="form-control" type="text" id="last_name" name="last_name" value="<?=$_SESSION['user']['last_name']?>"/>
                                            </div>
                                        </div>

                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label class="control-label">Gender :<b class="color-red">*</b>&nbsp;</label>
                                                <select class="form-control"id="gender" name="gender">
                                                    <option value="-">-</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="control-label">Username :<b class="color-red">*</b>&nbsp;</label>
                                                <input class="form-control" type="text" id="username" name="username" required="true" value="<?=$_SESSION['user']['username']?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Upload Image :&nbsp;</label>
                                                <input type="file" class="form-control" id="image_url" name="image_url"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Image Preview :&nbsp;</label><br>
                                                <image id="imagePreview" class="img img-fluid"/>
                                            </div>
                                        </div>
                                    </div>

                                
                                </form>
                              
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary float-right" id="submitBtn">SUBMIT</button>

                                </div>
                            </div>
                              
                           </div> 
                        </div>        
                    </div>
                </main>
<!-- MODAL -->

<!-- MODAL END -->
            </div>
        </div>
        <?php include('inc_common/main_footer.php'); ?>
        <?php include('inc_common/main_js.php');?>  
        <script>
            var gender = "<?=$_SESSION['user']['gender']?>";
            var imageUserUrl = "<?=$_SESSION['user']['image_url']?>";
            changeMyProfileForm = document.querySelector("#changeMyProfileForm");       
            submitBtn = document.querySelector("#submitBtn");
            document.querySelector("#gender").value = gender;
                
                if(imageUserUrl != "") {
                    document.querySelector("#imagePreview").setAttribute("src","../storage/img/user_images/"+imageUserUrl);
                }else {
                    document.querySelector("#imagePreview").setAttribute("src","../storage/img/default_pic.png");
                }


            document.querySelector("#image_url").addEventListener('change',(e)=> {
                var uploadFile = e.target.files[0];
                var reader = new FileReader();
                var imageType = /image.*/;
                var fileSize = Math.round((uploadFile.size/1024));//1024 = 1mb
                if(!uploadFile.type.match(imageType)) {
                    swal({
                        position: 'center',
                        icon: 'error',
                        title: "Please select image.",
                        timer: 1500
                    });
                    document.querySelector("#imagePreview").setAttribute("src","../storage/img/default_pic.png")
                    document.querySelector("#image_url").value = "";
                    return;
                }
                // console.log(uploadFile)
                if(fileSize >=1024) {
                    swal({
                        position: 'center',
                        icon: 'error',
                        title: "Please not more than 1mb.",
                        timer: 1500
                    });
                    document.querySelector("#imagePreview").setAttribute("src","../storage/img/default_pic.png")
                    document.querySelector("#image_url").value = "";
                    return;                        
                }
                reader.onload = ()=> {
                    document.querySelector("#imagePreview").setAttribute("src",reader.result)
                }   
                reader.readAsDataURL(uploadFile);
            });

            submitBtn.addEventListener('click', async()=> {
                const formData = new FormData(changeMyProfileForm);
                changeMyProfileForm = document.querySelector("#changeMyProfileForm");
                validateInput = {};
                changeMyProfileForm.querySelectorAll("input, select").forEach((el) => {
                    validateInput[el.getAttribute('name')] = el.value;
                });
                constraints = {
                    first_name :{
                        presence : {allowEmpty:false}
                    },
                    last_name :{
                        presence : {allowEmpty:false}
                    },
                    gender :{
                        presence : {allowEmpty:false}
                    }
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


                fetch('../controller/api/setup-user/change-profile.php', {
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

                        changeMyProfileForm.querySelectorAll("input, select").forEach((el) => {
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






