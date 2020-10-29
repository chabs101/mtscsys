(()=> {
   
    var seedcollectionModal = new BSN.Modal("#seed-collection-modal");
    var printModal = new BSN.Modal("#printModal");
    var seedCollectionBtn = document.querySelector("#seedCollectionBtn");
    var seedCollectionForm = document.querySelector("#seedCollectionForm");
    var searchBtn = document.querySelector("#search-btn");
    var searchBar = document.querySelector("#search-input");
    var seedCollectionTbl = document.querySelector("#seedCollectionTbl");
    var displayLimit = document.querySelector("#display_limit");
    var tablePagination = document.querySelector("#table-pagination");
    var nextPageBtn = document.querySelector("#btn-next");
    var prevPageBtn = document.querySelector("#btn-prev");
    // var pattern = "00000";
    // (pattern + data.seed_collection_id).slice(-(pattern.length))
    var submitted_seed_collection = false;
    dataSeedCollection = {};
    // seedcollectionOtherModal.show();
    
    document.addEventListener('keyup', (e) => {
        e.preventDefault();
        var keyCode = e.keyCode || e.which;
        if(e.altKey == true && keyCode == "49") {
            document.getElementById("search-input").focus();
        }

    });


    // loadSeedAssoc(2);
    // seedassociatedModal.show();

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
    
    searchBtn.addEventListener('click', function() {

        loadTable();

    });


        document.addEventListener('click', e => {
            var targetElement = e.target || e.srcElement;
            if(e.target.closest('.edit-btn')) {
                console.log(e.target)
                
                document.querySelectorAll("#seedCollectionForm input, select, textarea").forEach((el)=> {
                    el.removeAttribute("disabled");
                });
                document.querySelector('#seedCollectionBtn').hidden = false;
                insertSearchCollection(targetElement.getAttribute('data-index-id'));
                console.log("from edit" +targetElement.getAttribute('data-index-id'))
                
                seedcollectionModal.show();
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

                        id = targetElement.getAttribute('data-seed-id');
                        fetch('../controller/api/seed-collection/delete-seed-collection.php?id='+id, {
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
                                searchBtn.click();
                                return;
                             }
                        });

                        return;
                    }
                  });       
            }
        });

        document.addEventListener('click', e => {
            if(e.target.closest('#create-btn')) {
                document.querySelector("#seedCollectionForm").reset();
                document.querySelector("#seed_collection_id").value = "";
                document.querySelectorAll("#seedCollectionForm input, select").forEach((el)=> {
                    el.removeAttribute("disabled");
                });
                document.querySelector('#seedCollectionBtn').hidden = false;
                return;
            }
        });

        // document.addEventListener('click', e => {
        //     var targetElement = e.target || e.srcElement;

        //     if(e.target.closest('.view-btn')) {
        //         // console.log(targetElement);
        //         // document.querySelectorAll('.view-btn')[0].parentNode.querySelector('.view-btn').click();
        //         // console.log("from edit " +targetElement.getAttribute('data-index-id'))
        //         document.querySelector('#seedCollectionBtn').hidden = true;
        //         insertSearchCollection(targetElement.getAttribute('data-index-id'));
        //         document.querySelectorAll("#seedCollectionForm input, select, textarea").forEach((el)=> {
        //         el.setAttribute("disabled",true);
        //         });
        //         seedcollectionModal.show();
        //         return;
        //     }

        // });

        document.addEventListener('click', e => {
            var targetElement = e.target || e.srcElement;

            if(e.target.closest('.print-btn')) {
                document.querySelector('#printModal iframe')
                .setAttribute("src","../controller/report/report-generate-seed-collection?search="+targetElement.getAttribute("data-seed-id"));
                printModal.show();
                return;
            }

        });


        document.addEventListener('click', e => {
            var targetElement = e.target || e.srcElement;
            if(e.target.closest('.collection-back-btn')) {
                seedcollectionModal.show();
                return;
            }
        });


        insertSearchCollection = (index) => {
                editRow = dataSeedCollection[index]; 
                document.querySelector("#seed_collection_id").value         = editRow.seed_collection_id; 
                document.querySelector("#species_name").value               = editRow.species_name; 
                document.querySelector("#botanical_name").value             = editRow.botanical_name; 
                document.querySelector("#seedlot_no").value                 = editRow.seedlot_no; 
                document.querySelector("#seed_date").value                  = moment(editRow.seed_date).format('YYYY-MM-D'); 
                document.querySelector("#location").value                   = editRow.location; 
                document.querySelector("#region").value                     = editRow.region; 
                document.querySelector("#habitat").value                    = editRow.habitat; 
                document.querySelector("#lat").value                        = editRow.lat; 
                document.querySelector("#longi").value                      = editRow.longi; 
                document.querySelector("#alt").value                        = editRow.alt; 
                // document.querySelector("#team").value                       = editRow.team; 
                document.querySelector("#provenance_name_db").value         = editRow.provenance_name_db; 
                document.querySelector("#ph_climatic_type").value           = editRow.ph_climatic_type; 
                document.querySelector("#veg_struct").value                 = editRow.veg_struct; 
                document.querySelector("#soil_struct").value                = editRow.soil_struct; 
                document.querySelector("#sp_freq").value                    = editRow.sp_freq; 
                document.querySelector("#ph").value                         = editRow.ph; 
                document.querySelector("#slope").value                      = editRow.slope; 
                document.querySelector("#seed_crop").value                  = editRow.seed_crop; 
                document.querySelector("#predation_status").value           = editRow.predation_status; 
                document.querySelector("#bud").value                        = editRow.bud; 
                document.querySelector("#flower").value                     = editRow.flower; 
                document.querySelector("#description").value                = editRow.description; 
                document.querySelector("#seed_weight").value                = editRow.seed_weight; 
                document.querySelector("#viab").value                       = editRow.viab; 
                document.querySelector("#assoc_include").value              = editRow.assoc_include; 
                document.querySelector("#freq").value                       = editRow.freq; 
                document.querySelector("#ht").value                         = editRow.ht; 
                document.querySelector("#comments").value                   = editRow.comments; 
                document.querySelector("#collect_as_bulk").value            = editRow.collect_as_bulk; 
                document.querySelector("#individuals").value                = editRow.individuals; 

        }

            seedCollectionBtn.addEventListener('click', async()=> {
                const formData = new FormData(seedCollectionForm);
                seedCollectionForm = document.querySelector("#seedCollectionForm");
                validateInput = {};
                seedCollectionForm.querySelectorAll("input, select").forEach((el) => {
                    validateInput[el.getAttribute('name')] = el.value;
                });
                constraints = {
                    species_name :{
                        presence : {allowEmpty:false}
                    },
                    botanical_name :{
                        presence : {allowEmpty:false}
                    },
                    seedlot_no :{
                        presence : {allowEmpty:false}
                    },
                    location :{
                        presence : {allowEmpty:false}
                    },
                    region :{
                        presence : {allowEmpty:false}
                    },
                    seed_date :{
                        presence : {allowEmpty:false}
                    },
                    lat :{
                        presence : {allowEmpty:false},
                        length : {
                            maximum : 11
                        }
                    },
                    longi :{
                        presence : {allowEmpty:false},
                        length : {
                            maximum : 11
                        }
                    },
                    alt :{
                        presence : {allowEmpty:false},
                        length : {
                            maximum : 5
                        }
                    }
                };
                // validate.collectFormValues(document.querySelector("#seedCollectionForm"))
                resultValidate = validate(validateInput,constraints); //true or false
                // console.log(resultValidate)
                // return;
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
                            showConfirmButton: false,
                            timer: 1500
                          });
                         return;
                }
                console.log(resultValidate);

                if(submitted_seed_collection) {
                    console.log("already submitted please wait");
                    return;
                }

                submitted_seed_collection = true;

                fetch('../controller/api/seed-collection/save-seed-collection.php', {
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
                        searchBtn.click();
                        seedCollectionForm.querySelectorAll("input, select").forEach((el) => {
                            el.classList.remove("is-invalid");
                        });
                        seedcollectionModal.dispose();
                        console.log("submitted successfully");
                        console.log("submitted status false");
                        submitted_seed_collection = false;
                        return;
                     }
                        console.log("submitted status false");
                     submitted_seed_collection = false;
                });

            });


        prevListId = [];
        nextPageBtn.addEventListener('click',() => {
                // prevPageBtn.setAttribute("last-id",prevPageBtn.getAttribute('data-id'));
                prevListId.push(prevPageBtn.getAttribute('data-id'));
                loadTable("","&nextPage="+nextPageBtn.getAttribute("data-id"));
        });

        prevPageBtn.addEventListener('click',() => {
            if(prevListId.length > 0) {
                loadTable("&prevPage="+prevPageBtn.getAttribute("data-id"),"&nextPage="+prevListId[prevListId.length-1]);
                prevListId.pop(prevListId[prevListId.length-1]);
                return;
            }
        });

        loadTable = async (prevPage ="", nextPage = "") => {

            if(searchBar.value.length > 0) {
                nextPage = nextPage.length ? nextPage : "";
                prevPage = prevPage.length ? prevPage : "";
               dataSeedCollection = await fetch('../controller/api/seed-collection/get-seed-collection.php?search='+searchBar.value+"&limit="+displayLimit.value+nextPage+prevPage, {
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
                                <td>'+(data.prefix_id ?? "n/a")+'</td>\
                                <td>'+(data.species_name ?? "n/a")+'</td>\
                                <td>'+(data.seedlot_no ?? "n/a")+'</td>\
                                <td>'+(data.location ?? "n/a")+'</td>\
                                <td>'+(data.region ?? "n/a")+'</td>\
                                <td>'+(data.seed_date ? moment(data.seed_date).format('MMMM D, YYYY') : "n/a")+'</td>\
                                <td>\
                                    <div class="action-btn float-right">\
                                        <button class="btn btn-sm btn-info print-btn" data-index-id="'+ index +'" data-seed-id="'+ data.seed_collection_id +'"><span class="fa fa-print" data-index-id="'+ index +'" data-seed-id="'+ data.seed_collection_id +'"></span> PRINT</button>\
                                        <button class="btn btn-sm btn-info view-btn d-none" data-index-id="'+ index +'" data-seed-id="'+ data.seed_collection_id +'"><span class="fa fa-search" data-index-id="'+ index +'" data-seed-id="'+ data.seed_collection_id +'"></span> VIEW</button>\
                                        <button class="btn btn-sm btn-primary edit-btn" data-index-id="'+ index +'" data-seed-id="'+ data.seed_collection_id +'"><span class="fa fa-pencil-alt" data-index-id="'+ index +'" data-seed-id="'+ data.seed_collection_id +'"></span> EDIT</button>\
                                        <button class="btn btn-sm btn-danger delete-btn" '+(roleUser != 1 ?'hidden' : '' )+' data-index-id="'+ index +'" data-seed-id="'+ data.seed_collection_id +'"><span class="fa fa-times" data-index-id="'+ index +'" data-seed-id="'+ data.seed_collection_id +'"></span> DELETE</button>\
                                    </div>\
                                </td>  \
                                </tr>';
                    // console.log(newRowHtml)
                    newRow.innerHTML = newRowHtml;
                });

                // if(dataSeedCollection)
                if(!prevListId.length) {
                    prevPageBtn.disabled = true;
                }
                prevPageBtn.disabled = false;
                prevPageBtn.setAttribute("data-id",dataSeedCollection[0].seed_collection_id);    
                nextPageBtn.setAttribute("data-id",dataSeedCollection[dataSeedCollection.length-1].seed_collection_id);    
                tablePagination.hidden = false;
                return;
            }

            dataSeedCollection = {};
            prevListId = [];
            tablePagination.hidden = true;            
            tableRef = seedCollectionTbl.getElementsByTagName('tbody')[0];
            newRow = tableRef.insertRow(tableRef.rows.length);
            newRowHtml = '<tr><td colspan="7" class="text-center">No record found.</td></tr>';
            newRow.innerHTML = newRowHtml;
            console.log("no data.");
        }
 
})();