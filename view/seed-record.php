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
                                            <div class="col-md-2">
                                                <label>&nbsp;</label>
                                                <div class="form-group">
                                                    <select class="form-control p-0" id="search_option">
                                                        <option value="">Seed Record</option>
                                                        <option value="other_detail">Other Detail</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
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
          <h5 class="modal-title" id="myModalLabel">SEED RECORD</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

        <form id="seedRecordForm">


            <div class="form-row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="control-label">Seed Lot No :&nbsp;</label>
                        <input class="form-control" type="hidden" id="seed_record_id" name="seed_record_id"/>
                        <input class="form-control" type="hidden" id="seed_collection_id" name="seed_collection_id"/>
                        <input class="form-control" type="text" id="seedlot_no" name="seedlot_no" disabled="true" />
                    </div>
                </div>


                <div class="col-lg-2">
                    <div class="form-group">
                        <label class="control-label">Species Code :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="text" id="species_code" name="species_code">
                    </div>
                </div>

                    
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="control-label">Botanical Name : &nbsp;</label>
                        <input class="form-control" type="text" id="botanical_name" name="botanical_name" disabled="true"/>
                    </div>
                </div>

                    
                <div class="col-lg-2">
                    <div class="form-group">
                        <label class="control-label">Store Code :&nbsp;</label>
                        <input class="form-control" type="text" id="store_code" name="store_code"/>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="form-group">
                        <label class="control-label">Cost Code :&nbsp;</label>
                        <input class="form-control" type="text" id="cost_code" name="cost_code"/>
                    </div>
                </div>

            </div>

            <div class="form-row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="control-label"><b>EXACT LOCALITY OF COLLECTION</b> &nbsp;</label><br>
                        <label class="control-label">Address :&nbsp;</label>
                        <input class="form-control" type="text" id="location" name="location" disabled="true" />
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
                        <label class="control-label">Aspect :&nbsp;</label>
                        <input class="form-control" type="text" id="aspect" name="aspect"/>
                    </div>
                </div>

            </div>

            <div class="form-row">
                    
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="control-label">Slope :&nbsp;</label>
                        <input class="form-control" type="text" id="slope" name="slope" disabled="true" />
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="form-group">
                        <label class="control-label">Geology and Soil :&nbsp;</label>
                        <input class="form-control" type="text" id="geo_n_soil" name="geo_n_soil"/>
                    </div>
                </div>

                <div class="col-lg-1">
                    <div class="form-group">
                        <label class="control-label">pH :&nbsp;</label>
                        <input class="form-control" type="text" id="ph" name="ph" disabled="true" />                        
                    </div>
                </div>

            </div>

            <div class="form-row">
                <div class="col-lg-12">
                        <label class="control-label"><b>PARENT TREE(S)</b>&nbsp;</label>                    
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label class="control-label">Bulk :&nbsp;</label>
                        <input class="form-control" type="number" id="bulk" name="bulk"/>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="form-group">
                        <label class="control-label">Tree :&nbsp;</label>
                        <input class="form-control" type="number" id="tree" name="tree"/>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label class="control-label">dbh (cm)<b class="color-red">*</b>:&nbsp;</label>
                        <input class="form-control" type="number" id="dbh" name="dbh"/>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Total Height <b class="color-red">*</b>:&nbsp;</label>
                        <input class="form-control" type="number" min="0" id="total_height" name="total_height"/>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="form-group">
                        <label class="control-label">Form :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="text" id="form" name="form"/>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="control-label">Remarks :&nbsp;</label>
                        <input class="form-control" type="text" id="remarks" name="remarks"/>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="control-label">Fumigation method :&nbsp;</label>
                        <input class="form-control" type="text" id="fumigation_method" name="fumigation_method"/>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="control-label">Date :&nbsp;</label>
                        <input class="form-control" type="text" id="seed_date" name="seed_date" disabled="true" />
                    </div>
                </div>
            </div>


            <div class="form-row">
                <div class="col-lg-12">
                        <label class="control-label"><b>SEED</b>&nbsp;</label>                    
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Collector :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="text" id="collector" name="collector" />
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Collector's No :&nbsp;</label>
                        <input class="form-control" type="text" id="collector_no" name="collector_no"/>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Collection Date :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="date" id="collection_date" name="collection_date"/>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Project :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="text" id="project" name="project"/>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Identified By :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="text" id="identified_by" name="identified_by" />
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Condition :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="text" id="seed_condition" name="seed_condition" />
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Storage :&nbsp;</label>
                        <select class="form-control" type="text" id="storage" name="storage">
                            <option value="">-</option>                            
                            <option value="18c to 22c">18c to 22c</option>                            
                            <option value="3c to 5c">3c to 5c</option>                            
                            <option value="-15c to -18c">-15c to -18c</option>                            
                        </select>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Quantity :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="number" id="quantity" name="quantity" />
                    </div>
                </div>
            </div>


            <div class="form-row">
                <div class="col-lg-12">
                        <label class="control-label"><b>GERMINATION</b>&nbsp;</label>                    
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="control-label">Method :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="text" id="g_method" name="g_method" />
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">From :&nbsp;</label>
                        <input class="form-control" type="date" id="g_from" name="g_from"/>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">To :&nbsp;</label>
                        <input class="form-control" type="date" id="g_to" name="g_to"/>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Viability/10 g(%) :&nbsp;</label>
                        <input class="form-control" type="text" id="g_viab" name="g_viab"/>
                    </div>
                </div>
            </div>


            <div class="row" id="seed-record-btn-container">
                <div class="col-lg-12">
                    <button class="btn btn-sm btn-primary form-control form-control-sm" id="seedRecordOtherModalBtn" type="button"><span class="fa fa-plus"></span> SEED RECORD OTHER</button>
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



<div id="seed-consignee-modal" class="modal fade" tabindex="-1"  data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">SEED RECORD OTHER</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

        <form id="seedConsigneeForm" enctype="multipart/form-data">
            <div id="consignee-inputs">
                <!-- <div class="form-row germination-input-default">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="control-label">Method :</label>
                            <input class="form-control form-control-sm method" type="text" name="method[]">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="control-label">From :</label>
                            <input class="form-control form-control-sm from" type="text" name="from[]"/>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="control-label">To :</label>
                            <input class="form-control form-control-sm to" type="text" name="to[]"/>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="control-label">Viability/10 g(%) :</label>
                            <input class="form-control form-control-sm viability" type="text" name="viability"/>
                        </div>
                    </div>
                    <div class="col-lg-1">
                            <label class="control-label"> &nbsp;</label>
                        <button class="btn btn-sm btn-danger form-control form-control-sm remove-germination-btn"><span class="fa fa-times"></span></button>
                    </div>
                </div> -->
            </div>

            <div class="form-row germination-input-default">

                <div class="col-lg-12">
                        <label class="control-label"> &nbsp;</label>
                    <button class="btn btn-sm btn-success form-control form-control-sm d-none" type="button" id="insert-row-consignee-btn"><span class="fa fa-plus"></span>
                        INSERT ROW
                    </button>
                </div>
            </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary back-btn">BACK</button>
        <button type="button" class="btn btn-sm btn-primary" style="color:white;" id="modal-consignee-submit-btn">SUBMIT</button>
      </div>
    </div>
  </div>
</div>

<!-- Modals end -->

            </div>
        </div>
        <?php include('inc_common/main_footer.php'); ?>
        <?php include('inc_common/main_js.php');?>        
        <script src="../assets/js/rjc/seed-record.js"></script>

</body>
</html>
