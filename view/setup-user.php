<?php include('inc_common/session.php');?>
<?php 
    $_SESSION['user']['role'] != 1 ? header('Location:./dashboard') : "";
?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Users | <?php include('inc_common/title_name.php');?></title>
          
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
                            <div class="col-xl-12">
                                <div class="card mb-4">
                                    <div class="card-body">
                                    
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input class="form-control" type="text" placeholder="Search name/username" id="search-input"/>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" id="search-btn" type="button"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class=" offset-md-2 col-md-2">
                                                <div class="form-group">
                                                    <button class="btn btn-success float-right" id="create-btn" data-toggle="modal" data-target="#userModal">
                                                       <span class="fa fa-plus"></span> 
                                                        CREATE
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="userTbl" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Username</th>
                                                    <th>Gender</th>
                                                    <th>Date</th>
                                                    <th width="9%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="7" class="text-center">Please search...</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> 
                                   </div>
                                </div>
                            </div>


                        </div>        
                    </div>
                </main>
<!-- MODAL -->

<div id="userModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" >
      <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">USER</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <div class="modal-body">
        <form id="userForm"  enctype="multipart/form-data">
            
            <div class="form-row">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="control-label">First Name :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="hidden" id="user_id" name="user_id"/>
                        <input class="form-control" type="text" id="first_name" name="first_name" required="true">
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="control-label">Last Name :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="text" id="last_name" name="last_name"/>
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
                        <label class="control-label">User Role <b class="color-red">*</b>&nbsp;</label>
                        <select class="form-control" id="role_id" name="role_id">
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label class="control-label">Username :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="text" id="username" name="username" required="true">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Password :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="password" id="password" name="password"/>
                    </div>
                </div>

                <div class="col-lg-1">
                        <label class="control-label">&nbsp;</label>
                        <button class="form-control btn btn-default" type="button" id="show-password-btn">
                            <span class="fa fa-eye-slash"></span>
                        </button>                    
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
      
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-sm btn-primary" style="color:white;" id="saveUserBtn">SUBMIT</button>
      </div>

    </div>
  </div>
</div>
<!-- MODAL END -->
            </div>
        </div>
        <?php include('inc_common/main_footer.php'); ?>
        <?php include('inc_common/main_js.php');?>  
<script>

            var userModal = new BSN.Modal("#userModal");
            var searchBar = document.querySelector("#search-input");
            var searchBtn = document.querySelector("#search-btn");
            var createBtn = document.querySelector("#create-btn");
            var showPasswordBtn = document.querySelector("#show-password-btn");
            var userTbl   = document.querySelector("#userTbl");
            var saveUserBtn = document.querySelector("#saveUserBtn");
            var userForm = document.querySelector("#userForm");
            userDataCollection = {};
            var isEditModal = false;
            // userModal.show();

    setTimeout(()=>{
        awAllClick();
    },500);    

    awAllClick = () => {
        searchBar.value = "all";
        searchBtn.click();
        searchBar.value = "";   
    }
    searchBar.addEventListener('keyup',(e)=> {
        if(searchBar.value.length == 0 ) {
            awAllClick();
        }

       if(e.keyCode == 13) {
          searchBtn.click();
        }
    });


    document.querySelector("#imagePreview").setAttribute("src","../storage/img/default_pic.png")

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

    loadRole = () => {
                document.querySelector("#role_id").innerHTML = "<option>-</option>";
                fetch('../controller/api/setup-role/get-role.php?search=all', {
                   method: 'GET',
                   header : {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                   }
                })
                .then(response => response.json())
                .then((data) => {
                    if(data.length > 0) {
                        data.forEach((dt)=> {
                            genDiv = document.createElement('option');
                            genDiv.innerHTML = dt.role_name;
                            genDiv.value = dt.role_id;
                            document.querySelector("#role_id").appendChild(genDiv);

                        });
                    }

                });
    }
        loadRole();

    searchBtn.addEventListener('click', async function() {

        if(searchBar.value.length > 0) {
           userDataCollection = await fetch('../controller/api/setup-user/get-user.php?search='+searchBar.value, {
               method: 'GET',
               header : {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
               }
            })
            .then(response => response.json());
        }

        userTbl.getElementsByTagName('tbody')[0].innerHTML = "";
        if(userDataCollection.length > 0) {

            userDataCollection.forEach(function(data, index){
            tableRef = userTbl.getElementsByTagName('tbody')[0];
            // console.log(data);
                newRow = tableRef.insertRow(tableRef.rows.length);
                newRowHtml = '<tr>\
                            <td><small>'+(data.first_name ?? "n/a") +" "+ (data.last_name ?? "n/a") +'</small></td>\
                            <td><small>'+(data.username ?? "n/a")+'</small></td>\
                            <td><small>'+(data.gender ?? "n/a")+'</small></td>\
                            <td><small>'+(data.created_at ? moment(data.created_at).format('MMMM D, YYYY') : "n/a")+'</small></td>\
                            <td>\
                                <div class="action-btn float-right">\
                                    <button class="btn btn-sm btn-warning disable-user-btn d-none" data-index-id="'+ index +'" data-user-id="'+ data.user_id +'"><span class="fa fa-user-alt-slash" data-index-id="'+ index +'" data-user-id="'+ data.user_id +'"></span></button>\
                                    <button class="btn btn-sm btn-primary edit-btn" data-index-id="'+ index +'" data-user-id="'+ data.user_id +'"><span class="fa fa-pencil-alt" data-index-id="'+ index +'" data-user-id="'+ data.user_id +'"></span></button>\
                                    <button class="btn btn-sm btn-danger delete-btn" data-index-id="'+ index +'" data-user-id="'+ data.user_id +'"><span class="fa fa-times" data-index-id="'+ index +'" data-user-id="'+ data.user_id +'"></span></button>\
                                </div>\
                            </td>  \
                            </tr>';
                // console.log(newRowHtml)
                newRow.innerHTML = newRowHtml;
            });
            return;
        }

        userDataCollection = {};
        tableRef = userTbl.getElementsByTagName('tbody')[0];
        newRow = tableRef.insertRow(tableRef.rows.length);
        newRowHtml = '<tr><td colspan="5" class="text-center">No record found.</td></tr>';
        newRow.innerHTML = newRowHtml;
        console.log("no data.")
    });

    document.addEventListener('click', e => {
        var targetElement = e.target || e.srcElement;
        if(e.target.closest('.disable-user-btn')) {
             swal({
                position: 'center',
                icon: "warning",
                title: "Are you sure you want to disable this user ?",
                dangerMode:true,
                buttons:true
              })
              .then(async (yesBtn)=> {
                // if(yesBtn) {

                //     id = targetElement.getAttribute('data-id');
                //     fetch('../controller/api/setup-user/disable-user.php?id='+id, {
                //        method: 'GET',
                //     })
                //     .then(response => response.json())
                //     .then((data) => {
                //         if(data.success) {
                //              swal({
                //                 position: 'center',
                //                 icon: 'success',
                //                 title: "Disabled Successfully.",
                //                 timer: 1000
                //               });  
                //             awAllClick();
                //             return;
                //         }
                //         if(!data.success) {
                //              swal({
                //                 position: 'center',
                //                 icon: 'error',
                //                 title: data[0].message,
                //                 timer: 2000
                //               });  
                //             awAllClick();
                //             return;
                //         }
                //     });

                //     return;
                // }
              });       
        }
    });


    document.addEventListener('click', e => {
        var targetElement = e.target || e.srcElement;
        if(e.target.closest('.edit-btn')) {
            isEditModal = true;
            insertUserDataCollection(targetElement.getAttribute('data-index-id'));
            userModal.show();
            
            return;
        }
    });

    document.addEventListener('click', e => {
        var targetElement = e.target || e.srcElement;
        if(e.target.closest('.delete-btn')) {
             swal({
                position: 'center',
                icon: "warning",
                title: "Are you sure ?",
                text : "You will not able to recover this data.",
                dangerMode:true,
                buttons:true
              })
              .then(async (yesBtn)=> {
                if(yesBtn) {

                    id = targetElement.getAttribute('data-user-id');
                    fetch('../controller/api/setup-user/delete-user.php?id='+id, {
                       method: 'GET',
                    })
                    .then(response => response.json())
                    .then((data) => {
                        if(data.success) {
                             swal({
                                position: 'center',
                                icon: 'success',
                                title: "Deleted Successfully.",
                                showConfirmButton: false,
                                timer: 1000
                              });  
                            awAllClick();
                            return;
                         }
                    });

                    return;
                }
              });       
        }
    });

    createBtn.addEventListener('click', () => {
        document.querySelector("#userForm").reset();
        document.querySelector("#user_id").value = "";
        document.querySelector("#image_url").value = "";      
        document.querySelector("#imagePreview").setAttribute("src","../storage/img/default_pic.png")
        isEditModal = false;
        return;
    });

            saveUserBtn.addEventListener('click', async()=> {
                const formData = new FormData(userForm);
                validateInput = validate.collectFormValues(userForm)
                constraints = {
                    first_name :{
                        presence : {allowEmpty:false}
                    },
                    last_name :{
                        presence : {allowEmpty:false}
                    },
                    gender :{
                        presence : {allowEmpty:false}
                    },
                    role_id :{
                        presence : {allowEmpty:false}
                    },
                    username :{
                        presence : {allowEmpty:false}
                    }
                };
                resultValidate = validate(validateInput,constraints); //true or false
                if(resultValidate) {
                    resultMessage = "";
                    for(var index in resultValidate) {
                        resultMessage += resultValidate[index][0] +"<br>";
                    }

                         swal({
                            position: 'center',
                            icon: 'error',
                            title: resultMessage,
                            showConfirmButton: false,
                            timer: 1500
                          });
                         return;
                }
                console.log(resultValidate);


                fetch('../controller/api/setup-user/save-user.php', {
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
                        document.querySelector("#userForm").reset();
                        awAllClick();
                        userModal.dispose();
                        return;
                     }

                     if(!data[0].success) {
                         swal({
                            position: 'center',
                            icon: 'error',
                            title: data[0].message,
                            showConfirmButton: false,
                            timer: 1000
                          }); 
                         return;
                     }

                     swal({
                        position: 'center',
                        icon: 'error',
                        title: "Something Went Wrong.",
                        showConfirmButton: false,
                        timer: 1000
                      });  
                     return;
                });

            });

    spb = 0;
    showPasswordBtn.addEventListener("click", () => {
        if(spb==0) {
            spb = 1;
            showPasswordBtn.firstElementChild.classList.remove("fa-eye-slash");
            showPasswordBtn.firstElementChild.classList.add("fa-eye");
            document.querySelector("#password").type = "text";
            return;
        }
            showPasswordBtn.firstElementChild.classList.remove("fa-eye");
            showPasswordBtn.firstElementChild.classList.add("fa-eye-slash");
            document.querySelector("#password").type = "password";
            spb = 0;
    });

    insertUserDataCollection = (index) => {
            editRow = userDataCollection[index]; 
            document.querySelector("#user_id").value         = editRow.user_id; 
            document.querySelector("#first_name").value      = editRow.first_name; 
            document.querySelector("#last_name").value       = editRow.last_name; 
            document.querySelector("#gender").value          = editRow.gender; 
            document.querySelector("#username").value        = editRow.username; 
            document.querySelector("#role_id").value        = editRow.role_id; 
                if(editRow.image_url != "") {
                    document.querySelector("#imagePreview").setAttribute("src","../storage/img/user_images/"+editRow.image_url);
                    return;
                }
                    document.querySelector("#imagePreview").setAttribute("src","../storage/img/default_pic.png")

    }

</script>      
</body>
</html>






