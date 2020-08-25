<?php include('inc_common/session.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Detailed Information | <?php include('inc_common/title_name.php');?></title>
          
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
                                                    <input class="form-control" type="text" placeholder="Search id/seed lot no/botanical name" id="search-input"/>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" id="search-btn" type="button"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="seedCollectionTbl" width="100%" cellspacing="0">
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
          <h5 class="modal-title" id="myModalLabel">DETAILED INFORMATION IDENTIFIED</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

        <form id="seedRecordForm">


            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Species Name :&nbsp;</label>
                        <input class="form-control" type="hidden" id="detailed_info_id" name="detailed_info_id"/>
                        <input class="form-control" type="hidden" id="seed_collection_id" name="seed_collection_id"/>
                        <input class="form-control" type="text" id="species_name" name="species_name" disabled="true" />
                    </div>
                </div>
                    
                <div class="col-lg-6">
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
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Owner :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="text" id="owner" name="owner" />
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="control-label">Contact No :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="text" id="contact_no" name="contact_no" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="control-label">Date Assessed :&nbsp;</label>
                        <input class="form-control" type="date" id="date_assess" name="date_assess" />
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
                        <label class="control-label">Topography :&nbsp;</label>
                        <input class="form-control" type="text" id="topography" name="topography" disabled="true" />
                    </div>
                </div>

            </div>

            <div class="form-row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="control-label">Access Road Description :&nbsp;</label>
                        <input class="form-control" type="text" id="access_road" name="access_road" />
                    </div>
                </div>
            </div>


            <div class="form-row">
                    
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Soil Type :&nbsp;</label>
                        <input class="form-control" type="text" id="soil_type" name="soil_type" />
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Total Area :&nbsp;</label>
                        <input class="form-control" type="text" id="total_area" name="total_area"/>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Year Established :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="number" step="1" id="year_establish" name="year_establish" />                        
                    </div>
                </div>

            </div>


            <div class="form-row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Established Method (Natural/Plantation)  :&nbsp;</label>
                        <input class="form-control" type="text"  id="method" name="method" disabled="true" />
                    </div>
                </div>

                    
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Assocociated Agricultural/Plant Species  :&nbsp;</label>
                        <input class="form-control" type="text" id="assoc_agri" name="assoc_agri" />
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label"><br>Spacing :&nbsp;</label>
                        <input class="form-control" type="text" id="spacing" name="spacing"/>
                    </div>
                </div>

            </div>


            <div class="form-row">

                <div class="col-lg-12">
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
        <script src="../assets/js/rjc/detailed-information.js"></script>

</body>
</html>
