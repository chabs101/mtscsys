(()=> {


    var seedRecordModal = new BSN.Modal("#seed-record-modal");
    var searchBtn = document.querySelector("#search-btn");
    var searchBar = document.querySelector("#search-input");
    var printModal = new BSN.Modal("#printModal");
    var seedRecordForm = document.querySelector("#seedRecordForm");
    var seedCollectionBtn = document.querySelector("#seedCollectionBtn");
    var seedCollectionTbl = document.querySelector("#seedCollectionTbl");

    dataSeedCollection = {};
    tobeDeleteSeedGerminationData = [];
    tobeDeleteSeedConsigneeData = [];
    // seedRecordModal.show();
    document.addEventListener('keyup', (e) => {
        e.preventDefault();
        var keyCode = e.keyCode || e.which;
        if(e.altKey == true && keyCode == "49") {
            document.getElementById("search-input").focus();
        }

    });
    

    searchBar.addEventListener('keyup',(e)=> {
       if(e.keyCode == 13) {
          searchBtn.click();
        }
    });

    searchBtn.addEventListener('click', async function() {

        if(searchBar.value.length > 0) {
           dataSeedCollection = await fetch('../controller/api/assessment-species/search-seed-collection-assessment.php?search='+searchBar.value, {
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
                            <td>'+data.prefix_id+'</td>\
                            <td>'+(data.seedlot_no ?? "n/a")+'</td>\
                            <td>'+(data.botanical_name ?? "n/a")+'</td>\
                            <td>'+(data.location ?? "n/a")+'</td>\
                            <td>'+(data.seed_date ? moment(data.seed_date).format('MMMM D, YYYY') : "n/a")+'</td>\
                            <td>\
                                <div class="action-btn float-right">\
                                    <button class="btn btn-sm btn-info view-btn" data-index-id="'+ index +'" data-seed-collection-id="'+ data.seed_collection_id +'">\
                                    <span class="fa fa-search" data-index-id="'+ index +'" data-seed-collection-id="'+ data.seed_collection_id +'"></span> VIEW ASSESSMENT\
                                    </button>\
                                    <button class="btn btn-sm btn-primary print-btn" data-index-id="'+ index +'" data-seed-collection-id="'+ data.seed_collection_id +'">\
                                    <span class="fa fa-print" data-index-id="'+ index +'" data-seed-collection-id="'+ data.seed_collection_id +'"></span> PRINT\
                                    </button>\
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
        newRowHtml = '<tr><td colspan="7" class="text-center">No record found.</td></tr>';
        newRow.innerHTML = newRowHtml;
        console.log("no data.")
    });

    document.addEventListener('click', e => {
        var targetElement = e.target || e.srcElement;

        if(e.target.closest('.view-btn')) {
            insertSeedCollection(targetElement.getAttribute('data-index-id'));
            seedRecordModal.show();
            return;
        }

    });

    document.addEventListener('click', e => {
        var targetElement = e.target || e.srcElement;

        if(e.target.closest('.print-btn')) {
            document.querySelector('#printModal iframe')
            .setAttribute("src","../controller/report/report-generate-assessment-table?search="+targetElement.getAttribute("data-seed-collection-id"));
            printModal.show();
            return;
        }

    });

    document.addEventListener('click', e => {
        var targetElement = e.target || e.srcElement;
        if(e.target.closest('.back-btn')) {
            seedRecordModal.show();
            return;
        }
    });

            seedCollectionBtn.addEventListener('click', async()=> {
                const formData = new FormData(seedRecordForm);

                validateInput = validate.collectFormValues(seedRecordForm)

                constraints = {
                    tree_code :{
                        presence : {allowEmpty:false}
                    },
                    cy :{
                        presence : {allowEmpty:false},
                        numericality : {
                            onlyInteger :true,
                            greaterThan : 1900,
                            lessThanOrEqualTo : 2050
                        }
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
                            icon: 'error',
                            title: "Ooops!",
                            text: resultMessage,
                            showConfirmButton: false,
                            timer: 1500
                          });
                         return;
                }
                console.log(resultValidate);


                fetch('../controller/api/assessment-species/save-assessment-species.php', {
                   method: 'POST',
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
                        seedRecordModal.dispose();
                        seedRecordForm.querySelectorAll("input, select").forEach((el) => {
                            el.classList.remove("is-invalid");
                        });
                        searchBtn.click();
                        return;
                     }
                });

            });


    insertSeedCollection = (index) => {
            editRow = dataSeedCollection[index]; 
            document.querySelector("#tree_assessment_id").value   = editRow.tree_assessment_id ?? ""; 
            document.querySelector("#seed_collection_id").value   = (editRow.seed_collection_id ?? ""); 
            document.querySelector("#tree_code").value            = editRow.tree_code ?? ""; 
            document.querySelector("#species_name").value         = editRow.species_name ?? ""; 
            document.querySelector("#botanical_name").value       = editRow.botanical_name ?? ""; 
            document.querySelector("#location").value             = editRow.location ?? ""; 
            document.querySelector("#method").value               = editRow.method ?? ""; 
            document.querySelector("#topography").value           = editRow.topography ?? ""; 
            document.querySelector("#stem_diamenter").value       = editRow.stem_diamenter ?? ""; 
            document.querySelector("#lat").value                  = editRow.lat ?? ""; 
            document.querySelector("#longi").value                = editRow.longi ?? "";
            document.querySelector("#alt").value                  = (editRow.alt ?? "");
            document.querySelector("#total_height").value         = (editRow.total_height ?? "");
            document.querySelector("#stem_straight").value        = (editRow.stem_straight ?? "");
            document.querySelector("#forking").value              = (editRow.forking ?? "");
            document.querySelector("#circularity").value          = (editRow.circularity ?? "");
            document.querySelector("#tree_health").value          = (editRow.tree_health ?? "");
            document.querySelector("#branch_angle").value         = (editRow.branch_angle ?? "");
            document.querySelector("#branch_thickness").value     = (editRow.branch_thickness ?? "");
            document.querySelector("#branch_pruning").value       = (editRow.branch_pruning ?? "");
            document.querySelector("#remarks").value              = (editRow.remarks ?? "");
            document.querySelector("#cy").value                   = (editRow.cy ?? "");
    }

})();