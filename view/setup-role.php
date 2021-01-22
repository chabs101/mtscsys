<?php include('inc_common/session.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Setup Role | <?php include('inc_common/title_name.php');?></title>
          
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
                                            <div class="col-md-1">
                                                <label>&nbsp;</label>
                                                <div class="form-group">
                                                    <select class="form-control p-0" id="display_limit">
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <label class="control-label"> PRESS [<b>ALT + 1</b>] TO FOCUS SEARCH BAR</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="text" placeholder="Search..." id="search-input"/>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" id="search-btn" type="button"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class=" offset-md-2 col-md-2">
                                                <div class="form-group">
                                                    <button class="btn btn-success float-right" id="create-btn" data-toggle="modal" data-target="#roleModal">
                                                       <span class="fa fa-plus"></span> 
                                                        CREATE
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="roleTbl" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th width="30%">Date</th>
                                                    <!-- 24% -->
                                                    <th class="text-center" width="<?= $_SESSION['user']['role'] == 1 ? '4%' : '24%'?>">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3" class="text-center">Please search...</td>
                                                </tr>
                                            </tbody>

                                            <tfoot>
                                                <tr>
                                                    <td colspan="7">
                                                        <div class="float-right" id="table-pagination">
                                                            
                                                        <button class="btn btn-info btn-sm" id="btn-prev"><span class="fa fa-chevron-left"></span> Previous</button>
                                                        <button class="btn btn-info btn-sm" id="btn-next">Next <span class="fa fa-chevron-right"></span></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div> 
                                   </div>
                                </div>
                            </div>


                        </div>        
                    </div>
                </main>

<!-- Modals -->

<div id="roleModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">USER ROLE FORM</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

        <form id="roleForm">


            <div class="form-row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="control-label">Name :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="hidden" id="role_id" name="role_id"/>
                        <input class="form-control" type="text" id="role_name" name="role_name" required="true">
                    </div>
                </div>
            </div>

        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-sm btn-primary" style="color:white;" id="saveBtn">SUBMIT</button>
      </div>
    </div>
  </div>
</div>


<!-- Modals end -->

            </div>
        </div>
        <?php include('inc_common/main_footer.php'); ?>
        <?php include('inc_common/main_js.php');?>        
        <script src="../assets/js/rjc/setup-role.js"></script>
        <script>
            var roleUser = <?=$_SESSION['user']['role'];?>;
            // new autoComplete({
            //     selector: '#search-input',
            //     minChars: 2,
            //     source: async function(term, suggest){
            //         term = term.toLowerCase();
            //         var choices = ['ActionScript'];
            //         var matches = [];
            //        Dcollection = await fetch('../controller/api/seed-collection/get-seed-collection.php?search=all', {
            //            method: 'GET',
            //            header : {
            //             'Accept': 'application/json',
            //             'Content-Type': 'application/json',
            //            }
            //         })
            //         .then(response => response.json());

            //         asd = Dcollection.filter((data)=> {
            //                 const name  = data.species_name ? data.species_name.toUpperCase() : ''.toUpperCase(); 
            //                 const search = document.querySelector("#search-input").value.toUpperCase();;
            //                   if( name.indexOf(search) > -1 ) {
            //                     matches.push(name);
            //                     return name.indexOf(search) > -1;
            //                   }
            //         });
            //         matches.push("all");
            //         suggest(matches);
            //     }
            // });
        </script>
</body>
</html>
