<?php include('inc_common/session.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Seed Record | <?php include('inc_common/title_name.php');?></title>
          
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
                                                <label class="control-label"> PRESS [<b>ALT + 1</b>] TO FOCUS SEARCH BAR</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="text" placeholder="Search barcode/seed lot no/botanical name" id="search-input"/>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" id="search-btn" type="button"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                    <div class="table-responsive">
                                        <table class="table table-bordered small" id="seedCollectionTbl" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th width="5%">barcode</th>
                                                    <th>SeedLot No</th>
                                                    <th>Botanical Name</th>
                                                    <th>Address</th>
                                                    <th>Date</th>
                                                    <th width="26%">Action</th>
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

<!-- Modals -->
<div id="printModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-xl" style="height:100%;" role="document">
    <div class="modal-content" style="height: 100%;">
      <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">PRINT</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <iframe class="modal-body p-0" height="100%" src="" ></iframe>

    </div>
  </div>
</div>

<div id="seed-record-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">ASSESSMENT</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

        <form id="seedRecordForm">


            <div class="form-row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Tree Code :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="hidden" id="tree_assessment_id" name="tree_assessment_id"/>
                        <input class="form-control" type="hidden" id="seed_collection_id" name="seed_collection_id"/>
                        <input class="form-control" type="text" id="tree_code" name="tree_code">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Species Name :&nbsp;</label>
                        <input class="form-control" type="text" id="species_name" name="species_name" disabled="true" />
                    </div>
                </div>
                    
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Scientific Name : &nbsp;</label>
                        <input class="form-control" type="text" id="botanical_name" name="botanical_name" disabled="true"/>
                    </div>
                </div>

                
            </div>

            <div class="form-row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="control-label">Location :&nbsp;</label>
                        <input class="form-control" type="text" id="location" name="location" disabled="true" />
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Method:Natural / Plantation :&nbsp;</label>
                        <input class="form-control" type="text" id="method" name="method" />
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Topography :&nbsp;</label>
                        <input class="form-control" type="text" id="topography" name="topography" />
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Stem Diameter :&nbsp;</label>
                        <input class="form-control" type="number" id="stem_diamenter" name="stem_diamenter" />
                    </div>
                </div>

            </div>

            <div class="form-row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="control-label">Lat :&nbsp;</label>
                        <input class="form-control" type="text" id="lat" name="lat" disabled="true" />
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="control-label">Long :&nbsp;</label>
                        <input class="form-control" type="text" id="longi" name="longi" disabled="true" />
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="control-label">Altitude :&nbsp;</label>
                        <input class="form-control" type="text" id="alt" name="alt" disabled="true" />
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="control-label">Height :&nbsp;</label>
                        <input class="form-control" type="text" id="total_height" name="total_height" disabled="true" />
                    </div>
                </div>

            </div>

            <div class="form-row">
                    
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Stem Straightness :&nbsp;</label>
                        <input class="form-control" type="number" id="stem_straight" name="stem_straight" />
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Forking :&nbsp;</label>
                        <input class="form-control" type="number" id="forking" name="forking"/>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Circularity :&nbsp;</label>
                        <input class="form-control" type="number" id="circularity" name="circularity" />                        
                    </div>
                </div>

            </div>


            <div class="form-row">
                    
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="control-label">Tree Health :&nbsp;</label>
                        <input class="form-control" type="number" id="tree_health" name="tree_health" />
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="control-label">Branch Angle :&nbsp;</label>
                        <input class="form-control" type="number" id="branch_angle" name="branch_angle"/>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="control-label">Branch Thickness :&nbsp;</label>
                        <input class="form-control" type="number" id="branch_thickness" name="branch_thickness" />                        
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="control-label">CY :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="number" id="cy" name="cy" />                        
                    </div>
                </div>

            </div>


            <div class="form-row">
                    
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Branch Pruning :&nbsp;</label>
                        <input class="form-control" type="number" id="branch_pruning" name="branch_pruning" />
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="form-group">
                        <label class="control-label">Remarks :&nbsp;</label>
                        <input class="form-control" type="text" id="remarks" name="remarks" />
                    </div>
                </div>

            </div>



        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-sm btn-primary" style="color:white;" id="seedCollectionBtn">SUBMIT</button>
      </div>
    </div>
  </div>
</div>


<!-- Modals end -->

                <?php include('inc_common/footer.php'); ?>
            </div>
        </div>
        <?php include('inc_common/main_js.php');?>        
        <script src="../assets/js/rjc/assessment-table-species.js"></script>

</body>
</html>
