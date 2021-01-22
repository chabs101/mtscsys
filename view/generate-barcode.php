<?php include('inc_common/session.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Generate Barcode | <?php include('inc_common/title_name.php');?></title>
          
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

                                    
                                        <div class="row">
                                            
                                            <div class="col-md-8">
                                                <label class="control-label"> PRESS [<b>ALT + 1</b>] TO FOCUS SEARCH BAR</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="text" placeholder="Search ..." id="search-input"/>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" id="search-btn" type="button"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="control-label">&nbsp;</label>
                                                <div class="form-group">
                                                    <input type="number" name="qtyToPrint" id="qtyToPrint" class="form-control" placeholder="qty" />
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <label class="control-label">&nbsp;</label>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-primary float-left" id="printBtn">PRINT</button>
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="seedCollectionTbl" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" id="checkbox_all"/></th>
                                                    <th width="5%">barcode</th>
                                                    <th>Species Name</th>
                                                    <th>Seed Lot No</th>
                                                    <th>Location</th>
                                                    <th>Region</th>
                                                    <th>Date</th>
                                                    <th width="9%" class="text-center">Action</th>

                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="8" class="text-center">Please search...</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> 
                                   
                                </div>
                                <div class="card-footer">

                                </div>
                            </div>
                              
                           </div> 
                        </div>        
                    </div>
                </main>
<!-- MODAL -->
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


<div id="view-other-modal" class="modal fade" tabindex="-1"  data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">OTHER DETAIL</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
            <div class="row">
                
                <div class="col-md-2">
                    <label class="control-label">&nbsp;</label>
                    <div class="form-group">
                        <input type="number" name="otherqtyToPrint" id="otherqtyToPrint" class="form-control" placeholder="qty" />
                    </div>
                </div>

                <div class="col-md-2">
                    <label class="control-label">&nbsp;</label>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary float-left" id="printOtherBtn">PRINT</button>
                    </div>
                </div>
                <div class="offset-md-8">
                    
                </div>

            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered" id="otherTbl" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%"><input type="checkbox" id="other_checkbox_all" /></th>
                            <th>Tree No</th>
                            <th>Species Name</th>

                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="4" class="text-center">Please search...</td>
                        </tr>
                    </tbody>
                </table>
            </div> 
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" class="close" data-dismiss="modal">BACK</button>
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
        var printModal = new BSN.Modal("#printModal");
        var viewOtherModal = new BSN.Modal("#view-other-modal");
        printBtn = document.querySelector("#printBtn");
        printOtherBtn = document.querySelector("#printOtherBtn");
        var searchBtn = document.querySelector("#search-btn");
        var searchBar = document.querySelector("#search-input");
        var checkbox_all = document.querySelector("#checkbox_all");
        var other_checkbox_all = document.querySelector("#other_checkbox_all");
        var qtyToPrint = document.querySelector("#qtyToPrint");
        dataSeedCollection = {};
        dataOtherCollection = {};
        getAllIds = [];
        getAllName = [];
        getAllOtherIds = [];
        getAllOtherName = [];

        checkbox_all.addEventListener('click',() => {
            document.querySelectorAll(".checkbox_bcode").forEach((el) => {
                if(checkbox_all.checked) {
                    el.checked = true;
                }else {
                    el.checked = false;
                }
            });
        });

        other_checkbox_all.addEventListener('click',() => {
            document.querySelectorAll(".other_checkbox_bcode").forEach((el) => {
                if(other_checkbox_all.checked) {
                    el.checked = true;
                }else {
                    el.checked = false;
                }
            });
        });

        document.addEventListener('click', async (e) => {
            var targetElement = e.target || e.srcElement;

            if(e.target.closest('.view-btn')) {
                viewOtherModal.show();
                searchVal = targetElement.getAttribute('data-prefix-id') ?? "";
                if(searchBar.value.length > 0) {
                   dataOtherCollection = await fetch('../controller/api/seed-collection/get-seed-collection.php?search='+searchVal+"&searchOption=other_detail", {
                       method: 'GET',
                       header : {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                       }
                    })
                    .then(response => response.json());
                }

                otherTbl.getElementsByTagName('tbody')[0].innerHTML = "";
                if(dataOtherCollection.length > 0) {

                    dataOtherCollection.forEach(function(data, index){
                    tableRef = otherTbl.getElementsByTagName('tbody')[0];
                    // console.log(data);
                        newRow = tableRef.insertRow(tableRef.rows.length);
                        newRowHtml = '<tr>\
                                    <td><input type="checkbox" class="other_checkbox_bcode" name="prefix_id[]" value="'+data.barcode+'" data-name="'+data.tree_no+'" /></td>\
                                    <td>'+(data.tree_no ?? "")+'</td>\
                                    <td>'+(data.species_name ?? "n/a")+'</td>\
                                    </tr>';
                        // console.log(newRowHtml)
                        newRow.innerHTML = newRowHtml;
                    });
                    return;
                }

                dataOtherCollection = {};
                tableRef = otherTbl.getElementsByTagName('tbody')[0];
                newRow = tableRef.insertRow(tableRef.rows.length);
                newRowHtml = '<tr><td colspan="4" class="text-center">No record found.</td></tr>';
                newRow.innerHTML = newRowHtml;
                console.log("no data.")
                return;
            }

        });

        printBtn.addEventListener('click', e => {
            var targetElement = e.target || e.srcElement;

                document.querySelectorAll(".checkbox_bcode").forEach((el) => {
                    if(el.checked) {
                        getAllIds.push(el.value);
                        getAllName.push(el.getAttribute('data-name'));
                    }
                });

                if(getAllIds.length == 0) {
                     swal({
                        position: 'center',
                        icon: 'error',
                        title: "Please select first to print.",
                        showConfirmButton: false,
                        timer: 1500
                      });
                     return;
                }

                myParams = "";
                for(i in getAllIds) {
                    myParams += "&ids[]="+getAllIds[i];
                }

                for(i in getAllName) {
                    myParams += "&seedName[]="+getAllName[i];
                }
                myParams += "&qtyToPrint="+(qtyToPrint.value.length > 0 ? qtyToPrint.value : 1 );


                document.querySelector('#printModal iframe')
                .setAttribute("src","../controller/report/report-generate-barcode?"+myParams);
                printModal.show();
                getAllIds = [];

        });

        printOtherBtn.addEventListener('click', e => {
            var targetElement = e.target || e.srcElement;

                document.querySelectorAll(".other_checkbox_bcode").forEach((el) => {
                    if(el.checked) {
                        getAllOtherIds.push(el.value);
                        getAllOtherName.push(el.getAttribute('data-name'));
                    }
                });

                if(getAllOtherIds.length == 0) {
                     swal({
                        position: 'center',
                        icon: 'error',
                        title: "Please select first to print.",
                        showConfirmButton: false,
                        timer: 1500
                      });
                     return;
                }

                myParams = "";
                for(i in getAllOtherIds) {
                    myParams += "&ids[]="+getAllOtherIds[i];
                }

                for(i in getAllOtherName) {
                    myParams += "&seedName[]="+getAllOtherName[i];
                }
                myParams += "&qtyToPrint="+(otherqtyToPrint.value.length > 0 ? otherqtyToPrint.value : 1 );


                document.querySelector('#printModal iframe')
                .setAttribute("src","../controller/report/report-generate-barcode?"+myParams);
                printModal.show();
                getAllOtherIds = [];

        });

    searchBar.addEventListener('keyup',(e)=> {
       if(e.keyCode == 13) {
          searchBtn.click();
        }
    });

    searchBtn.addEventListener('click', async function() {

        if(searchBar.value.length > 0) {
           dataSeedCollection = await fetch('../controller/api/seed-collection/get-seed-collection.php?search='+searchBar.value, {
               method: 'GET',
               header : {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
               }
            })
            .then(response => response.json());
        }

        seedCollectionTbl.getElementsByTagName('tbody')[0].innerHTML = "";
        if(dataSeedCollection.length > 0) {

            dataSeedCollection.forEach(function(data, index){
            tableRef = seedCollectionTbl.getElementsByTagName('tbody')[0];
            // console.log(data);
                newRow = tableRef.insertRow(tableRef.rows.length);
                newRowHtml = '<tr>\
                            <td><input type="checkbox" class="checkbox_bcode" name="prefix_id[]" value="'+data.prefix_id+'" data-name="'+data.species_name+'" /></td>\
                            <td>'+data.prefix_id+'</td>\
                            <td>'+(data.species_name ?? "n/a")+'</td>\
                            <td>'+(data.seedlot_no ?? "n/a")+'</td>\
                            <td>'+(data.location ?? "n/a")+'</td>\
                            <td>'+(data.region ?? "n/a")+'</td>\
                            <td>'+(data.seed_date ? moment(data.seed_date).format('MMMM D, YYYY') : "n/a")+'</td>\
                                <td>\
                                    <div class="action-btn float-right">\
                                        <button class="btn btn-sm btn-info view-btn" data-index-id="'+ index +'" data-prefix-id="'+ data.seed_collection_id +'"><span class="fa fa-search" data-index-id="'+ index +'" data-prefix-id="'+ data.seed_collection_id +'"></span> VIEW</button>\
                                    </div>\
                                </td>  \
                            </tr>';
                // console.log(newRowHtml)
                newRow.innerHTML = newRowHtml;
            });
            return;
        }

        dataSeedCollection = {};
        tableRef = seedCollectionTbl.getElementsByTagName('tbody')[0];
        newRow = tableRef.insertRow(tableRef.rows.length);
        newRowHtml = '<tr><td colspan="8" class="text-center">No record found.</td></tr>';
        newRow.innerHTML = newRowHtml;
        console.log("no data.")
    });

        </script>      
</body>
</html>






