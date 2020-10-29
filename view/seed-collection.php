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
                                                        <option value="100">100</option>
                                                        <option value="50">50</option>
                                                        <option value="All">All</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <label class="control-label"> PRESS [<b>ALT + 1</b>] TO FOCUS SEARCH BAR</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="text" placeholder="Search barcode/species_name/botanical_name/location/seedlot_no/region" id="search-input"/>
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
                                        <table class="table table-bordered small" id="seedCollectionTbl" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th width="5%">barcode</th>
                                                    <th>Species Name</th>
                                                    <th>Seed Lot No</th>
                                                    <th>Location</th>
                                                    <th>Region</th>
                                                    <th>Date</th>
                                                    <!-- 24% -->
                                                    <th class="text-center" width="<?= $_SESSION['user']['role'] == 1 ? '24%' : '18%'?>">Action</th>
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

        <form id="seedCollectionForm" class="small">


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
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="control-label">Slope :&nbsp;</label>
                        <input class="form-control" type="text" id="slope" name="slope" />
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
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="control-label">Bud :&nbsp;</label>
                        <input class="form-control" type="text" id="bud" name="bud" />
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="control-label">Flowers :&nbsp;</label>
                        <input class="form-control" type="text" id="flower" name="flower" />
                    </div>
                </div>
            </div>
            
            <hr>

            <div class="form-row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="control-label">Association Include :&nbsp;</label>
                        <textarea class="form-control" type="text" id="assoc_include" name="assoc_include"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Freq :&nbsp;</label>
                        <input class="form-control" type="number" id="freq" name="freq" />
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Ht.(m):&nbsp;</label>
                        <input class="form-control" type="text" id="ht" name="ht" />
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="control-label">Comments:&nbsp;</label>
                        <input class="form-control" type="text" id="comments" name="comments" />
                    </div>
                </div>
            </div>
            
            <hr>

            <div class="form-row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="control-label">Description :&nbsp;</label>
                        <textarea class="form-control" type="text" id="description" name="description"></textarea>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">Seed Weight(g) :&nbsp;</label>
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

            <hr>

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
        <script src="../assets/js/rjc/seed-collection.js"></script>
        <script>
            var roleUser = <?=$_SESSION['user']['role'];?>;
            console.log(roleUser)
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
