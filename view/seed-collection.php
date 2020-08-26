<?php include('inc_common/session.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Seed Collection | <?php include('inc_common/title_name.php');?></title>
          
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
                                                        <option value="All">All</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <label class="control-label"> PRESS [<b>ALT + 1</b>] TO FOCUS SEARCH BAR</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="text" placeholder="Search species_name/botanical_name/location/seedlot_no/region" id="search-input"/>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" id="search-btn" type="button"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class=" offset-md-2 col-md-2">
                                                <div class="form-group">
                                                    <button class="btn btn-success float-right" id="create-btn" data-toggle="modal" data-target="#seed-collection-modal">
                                                       <span class="fa fa-plus"></span> 
                                                        CREATE
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="seedCollectionTbl" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th width="5%">barcode</th>
                                                    <th>Species Name</th>
                                                    <th>Seed Lot No</th>
                                                    <th>Location</th>
                                                    <th>Region</th>
                                                    <th>Date</th>
                                                    <!-- 24% -->
                                                    <th class="text-center" width="<?= $_SESSION['user']['role'] == 1 ? '32%' : '24%'?>">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="7" class="text-center">Please search...</td>
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

<div id="seed-collection-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">SEED COLLECTION DATA SHEET</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

        <form id="seedCollectionForm">


            <div class="form-row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="control-label">Species :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="hidden" id="seed_collection_id" name="seed_collection_id"/>
                        <input class="form-control" type="text" id="species_name" name="species_name" required="true">
                    </div>
                </div>

                    
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="control-label">Botanical Name :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="text" id="botanical_name" name="botanical_name"/>
                    </div>
                </div>

                    
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="control-label">Seed Lot No :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="text" id="seedlot_no" name="seedlot_no"/>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="control-label">Date :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="date" id="seed_date" name="seed_date"/>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Location :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="text" id="location" name="location"/>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="control-label">Region :<b class="color-red">*</b>&nbsp;</label>
                        <select class="form-control" id="region" name="region">
                            <option value="">-</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="4A">4A</option>
                            <option value="4B">4B</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="BARMM">BARMM</option>
                            <option value="CAR">CAR</option>
                            <option value="NCR">NCR</option>
                        </select>
                    </div>
                </div>

                    
                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="control-label">Habitat :&nbsp;</label>
                        <input class="form-control" type="text" id="habitat" name="habitat"/>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Lat :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="number" id="lat" name="lat"/>
                    </div>
                </div>

                    
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Long :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="number" id="longi" name="longi"/>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Alt(m) :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="number" id="alt" name="alt"/>
                    </div>
                </div>
            </div>


            <div class="form-row">
<!--                 <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Team :&nbsp;</label>
                        <input class="form-control" type="text" id="team" name="team"/>
                    </div>
                </div> -->

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Provenance name for database :&nbsp;</label>
                        <input class="form-control" type="text" id="provenance_name_db" name="provenance_name_db"/>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Philippine climatic type :&nbsp;</label>
                        <input class="form-control" type="text" id="ph_climatic_type" name="ph_climatic_type"/>
                    </div>
                </div>
            </div>


            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Veg'n Structure :&nbsp;</label>
                        <input class="form-control" type="text" id="veg_struct" name="veg_struct" />
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Soil Structure :&nbsp;</label>
                        <input class="form-control" type="text" id="soil_struct" name="soil_struct"/>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Sp freq :&nbsp;</label>
                        <input class="form-control" type="text" id="sp_freq" name="sp_freq"/>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">pH :&nbsp;</label>
                        <input class="form-control" type="number" id="ph" name="ph"/>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Slope :&nbsp;</label>
                        <input class="form-control" type="text" id="slope" name="slope" />
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Geology Alluvial :&nbsp;</label>
                        <input class="form-control" type="text" id="geo_alluv" name="geo_alluv" />
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Seed Crop :&nbsp;</label>
                        <input class="form-control" type="text" id="seed_crop" name="seed_crop" />
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Predation Status :&nbsp;</label>
                        <input class="form-control" type="text" id="predation_status" name="predation_status" />
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Bud :&nbsp;</label>
                        <input class="form-control" type="text" id="bud" name="bud" />
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Root Sucker :&nbsp;</label>
                        <input class="form-control" type="text" id="root_sucker" name="root_sucker" />
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Flowers :&nbsp;</label>
                        <input class="form-control" type="text" id="flower" name="flower" />
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Coppice :&nbsp;</label>
                        <input class="form-control" type="text" id="coppice" name="coppice" />
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="control-label">Description :&nbsp;</label>
                        <input class="form-control" type="text" id="description" name="description" />
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Seed Weight :&nbsp;</label>
                        <input class="form-control" type="number" id="seed_weight" name="seed_weight" />
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Viab/10g :&nbsp;</label>
                        <input class="form-control" type="text" id="viab" name="viab" />
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="control-label">Map Name :<b class="color-red">*</b>&nbsp;</label>
                        <input class="form-control" type="text" id="map_name" name="map_name" />
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Collected as Bulk :&nbsp;</label>
                        <input class="form-control" type="text" id="collect_as_bulk" name="collect_as_bulk" />
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Individuals :&nbsp;</label>
                        <input class="form-control" type="number" id="individuals" name="individuals" />
                    </div>
                </div>
            </div>

            <div class="row" id="additional_seed_detail">
                <div class="col-lg-6">
                    <button class="btn btn-sm btn-primary form-control form-control-sm" id="seedOtherDetailBtn" type="button"><span class="fa fa-plus"></span> SEED COLLECTION OTHER DETAILS</button>
                </div>
                <div class="col-lg-6">
                    <button class="btn btn-sm btn-primary form-control form-control-sm" id="seedAssocModalBtn" type="button"><span class="fa fa-plus"></span> ASSOCIATED INCLUDES</button>
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


<div id="seed-associated-modal" class="modal fade" tabindex="-1"  data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">SEED COLLECTION | ASSOCIATED INCLUDES</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

        <form id="seedassociatedForm" enctype="multipart/form-data">
            <div id="assoc-inputs">
<!--                 <div class="form-row assoc-input-default">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="control-label">Associated Includes :</label>
                            <input class="form-control form-control-sm assoc_inc" type="text" name="assoc_inc[]">
                        </div>
                    </div>

                        
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="control-label">Freq :</label>
                            <input class="form-control form-control-sm freq" type="text" name="freq[]"/>
                        </div>
                    </div>

                        
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="control-label">Ht (m) :</label>
                            <input class="form-control form-control-sm ht_m" type="text" name="ht_m[]"/>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="control-label">Comments :</label>
                            <input class="form-control form-control-sm comments" type="text" name="comments"/>
                        </div>
                    </div>

                    <div class="col-lg-1">
                            <label class="control-label"> &nbsp;</label>
                        <button class="btn btn-sm btn-danger form-control form-control-sm remove-assoc-btn"><span class="fa fa-times"></span></button>
                    </div>
                </div>
 -->            </div>

            <div class="form-row assoc-input-default">

                <div class="col-lg-12">
                        <label class="control-label"> &nbsp;</label>
                    <button class="btn btn-sm btn-success form-control form-control-sm" type="button" id="insert-row-assoc-btn"><span class="fa fa-plus"></span>
                        INSERT ROW
                    </button>
                </div>
            </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary collection-back-btn">BACK</button>
        <button type="button" class="btn btn-sm btn-primary" style="color:white;" id="modal-assoc-submit-btn">SUBMIT</button>
      </div>
    </div>
  </div>
</div>

<div id="seed-collection-other-modal" class="modal fade" tabindex="-1"  data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">SEED COLLECTION OTHER DETAILS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

        <form id="seedcollectionOtherForm">

            <div id="seed-other-inputs">
<!--                 <div class="row input-other-collection-default">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-2 prjc-3px">
                                <div class="form-group">
                                    <label class="control-label"><small>Colln no:</small></label>
                                    <input class="form-control form-control-sm colln_no" type="text" name="colln_no">
                                </div>
                            </div>

                                
                            <div class="col-lg-1 prjc-3px">
                                <div class="form-group">
                                    <label class="control-label"><small>Bot no:</small></label>
                                    <input class="form-control form-control-sm bot_no" type="text" name="bot_no"/>
                                </div>
                            </div>

                                
                            <div class="col-lg-2 prjc-3px">
                                <div class="form-group">
                                    <label class="control-label"><small>Film no:</small></label>
                                    <input class="form-control form-control-sm film_no" type="text" name="film_no"/>
                                </div>
                            </div>

                            <div class="col-lg-1 prjc-3px">
                                <div class="form-group">
                                    <label class="control-label"><small>Ht (m):</small></label>
                                    <input class="form-control form-control-sm ht_m" type="text" name="ht_m"/>
                                </div>
                            </div>

                            <div class="col-lg-1 prjc-3px">
                                <div class="form-group">
                                    <label class="control-label"><small>Age :</small></label>
                                    <input class="form-control form-control-sm age" type="text" name="age"/>
                                </div>
                            </div>
                            <div class="col-lg-2 prjc-3px">
                                <div class="form-group">
                                    <label class="control-label"><small>dbh (cm):</small></label>
                                    <input class="form-control form-control-sm dbh" type="text" name="dbh"/>
                                </div>
                            </div>
                            <div class="col-lg-1 prjc-3px">
                                <div class="form-group">
                                    <label class="control-label"><small>Form :</small></label>
                                    <input class="form-control form-control-sm form" type="text" name="form"/>
                                </div>
                            </div>

                            <div class="col-lg-1 prjc-3px">
                                <div class="form-group">
                                    <label class="control-label"><small>Den :</small></label>
                                    <input class="form-control form-control-sm den" type="text" name="den">
                                </div>
                            </div>

                            <div class="col-lg-1 prjc-3px">
                                <div class="form-group">
                                    <label class="control-label"><small>Bm :</small></label>
                                    <input class="form-control form-control-sm bm" type="text" name="bm"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="row">
                                
                            <div class="col-lg-1 prjc-3px">
                                <div class="form-group">
                                    <label class="control-label"><small>wdt :</small></label>
                                    <input class="form-control form-control-sm wdt" type="text" name="wdt"/>
                                </div>
                            </div>

                            <div class="col-lg-1 prjc-3px">
                                <div class="form-group">
                                    <label class="control-label"><small>Ht (%):</small></label>
                                    <input class="form-control form-control-sm ht_p" type="text" name="ht_p"/>
                                </div>
                            </div>

                            <div class="col-lg-5 prjc-3px">
                                <div class="form-group">
                                    <label class="control-label"><small>Description/Notes:</small></label>
                                    <input class="form-control form-control-sm desc" type="text" name="desc"/>
                                </div>
                            </div>
                            <div class="col-lg-2 prjc-3px">
                                <div class="form-group">
                                    <label class="control-label"><small>Seed Weight:</small></label>
                                    <input class="form-control form-control-sm seed_weight" type="text" name="seed_weight"/>
                                </div>
                            </div>
                            <div class="col-lg-2 prjc-3px">
                                <div class="form-group">
                                    <label class="control-label"><small>Viab/ 10g:</small></label>
                                    <input class="form-control form-control-sm viab" type="text" name="viab"/>
                                </div>
                            </div>
                            <div class="col-lg-1 prjc-3px">
                                <div class="form-group">
                                    <label class="control-label"> &nbsp;</label>
                                    <button class="btn btn-sm btn-danger form-control form-control-sm rmv-other-btn"><span class="fa fa-times"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>


            <div class="form-row">

                <div class="col-lg-12">
                        <label class="control-label"> &nbsp;</label>
                    <button class="btn btn-sm btn-success form-control form-control-sm" type="button" id="insert-row-other-btn"><span class="fa fa-plus"></span>
                        INSERT ROW
                    </button>
                </div>
            </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary collection-back-btn">BACK</button>
        <button type="button" class="btn btn-sm btn-primary" style="color:white;" id="modal-other-detail-btn">SUBMIT</button>
      </div>
    </div>
  </div>
</div>

<!-- Modals end -->

                <?php include('inc_common/footer.php'); ?>
            </div>
        </div>
        <?php include('inc_common/main_js.php');?>        
        <script src="../assets/js/rjc/seed-collection.js"></script>
        <script>
            var roleUser = <?=$_SESSION['user']['role'];?>;
            new autoComplete({
                selector: '#search-input',
                minChars: 2,
                source: async function(term, suggest){
                    term = term.toLowerCase();
                    var choices = ['ActionScript'];
                    var matches = [];
                   Dcollection = await fetch('../controller/api/seed-collection/get-seed-collection.php?search=all', {
                       method: 'GET',
                       header : {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                       }
                    })
                    .then(response => response.json());

                    asd = Dcollection.filter((data)=> {
                            const name  = data.species_name ? data.species_name.toUpperCase() : ''.toUpperCase(); 
                            const search = document.querySelector("#search-input").value.toUpperCase();;
                              if( name.indexOf(search) > -1 ) {
                                matches.push(name);
                                return name.indexOf(search) > -1;
                              }
                    });
                    matches.push("all");
                    suggest(matches);
                }
            });
        </script>
</body>
</html>
