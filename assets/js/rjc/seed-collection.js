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

    var seedassociatedModal = new BSN.Modal("#seed-associated-modal");
    var seedcollectionOtherModal = new BSN.Modal("#seed-collection-other-modal");
    var seedAssocModalBtn   = document.querySelector("#seedAssocModalBtn");
    var seedOtherDetailBtn = document.querySelector("#seedOtherDetailBtn");

    var submitted_seed_collection = false;
    dataSeedCollection = {};
    tobeDeleteSeedAssocData = [];
    tobeDeleteSeedOtherData = [];
    // seedcollectionOtherModal.show();
    
    document.addEventListener('keyup', (e) => {
        e.preventDefault();
        var keyCode = e.keyCode || e.which;
        if(e.altKey == true && keyCode == "49") {
            document.getElementById("search-input").focus();
        }

    });


    inputAssociatedDefault = '<div class="form-row assoc-input-default">\
                        <div class="col-lg-3">\
                            <div class="form-group">\
                                <label class="control-label">Associated Includes :</label>\
                                <input class="form-control form-control-sm seed_prov_id" type="hidden" name="seed_prov_id[]">\
                                <input class="form-control form-control-sm seed_assoc_collection_id" type="hidden" name="seed_collection_id[]">\
                                <input class="form-control form-control-sm validate assoc_inc" type="text" name="assoc_inc[]">\
                            </div>\
                        </div>\
                        <div class="col-lg-2">\
                            <div class="form-group">\
                                <label class="control-label">Freq :</label>\
                                <input class="form-control form-control-sm validate freq" type="text" name="freq[]"/>\
                            </div>\
                        </div>\
                        <div class="col-lg-2">\
                            <div class="form-group">\
                                <label class="control-label">Ht (m) :</label>\
                                <input class="form-control form-control-sm validate ht_m" type="text" name="ht_m[]"/>\
                            </div>\
                        </div>\
                        <div class="col-lg-4">\
                            <div class="form-group">\
                                <label class="control-label">Comments :</label>\
                                <input class="form-control form-control-sm validate comments" type="text" name="comments[]"/>\
                            </div>\
                        </div>\
                        <div class="col-lg-1">\
                                <label class="control-label"> &nbsp;</label>\
                            <button type="button" class="btn btn-sm btn-danger form-control form-control-sm remove-assoc-btn"><span class="fa fa-times"></span></button>\
                        </div>\
                    </div>';

    var inputOtherDefault = '<div class="form-row input-other-collection-default  small border mt-4 p-2">\
                    <div class="row">\
                        <div class="col-lg-12">\
                                <label class="control-label"><b>DETAIL</b>&nbsp;</label>\
                        </div>\
                        <div class="col-lg-2">\
                            <div class="form-group">\
                                <label class="control-label">Tree No:</label>\
                                <input class="form-control form-control-sm seed_collection_other_id" type="hidden" name="seed_collection_other_id[]">\
                                <input class="form-control form-control-sm seed_other_collection_id" type="hidden" name="seed_collection_id[]">\
                                <input class="form-control form-control-sm tree_no" type="text" maxlength="11" name="tree_no[]">\
                            </div>\
                        </div>\
                        <div class="col-lg-2">\
                            <div class="form-group">\
                                <label class="control-label">Total:</label>\
                                <input class="form-control form-control-sm total" type="number" name="total[]"/>\
                            </div>\
                        </div>\
                        <div class="col-lg-2">\
                            <div class="form-group">\
                                <label class="control-label">Age:</label>\
                                <input class="form-control form-control-sm age_" type="number" name="age_[]"/>\
                            </div>\
                        </div>\
                        <div class="col-lg-2">\
                        &nbsp;\
                        </div>\
                        <div class="col-lg-2">\
                        &nbsp;\
                        </div>\
                        <div class="col-lg-2">\
                        &nbsp;\
                        </div>\
                        <div class="col-lg-2">\
                        &nbsp;\
                        </div>\
                    </div>\
                    <div class="row">\
                        <div class="col-lg-12">\
                                <label class="control-label"><b>Bole</b>&nbsp;</label>\
                        </div>\
                        <div class="col-lg-3">\
                            <div class="form-group">\
                                <label class="control-label">dbh (cm):</label>\
                                <input class="form-control form-control-sm dbh" type="text" name="dbh[]"/>\
                            </div>\
                        </div>\
                        <div class="col-lg-3">\
                            <div class="form-group">\
                                <label class="control-label">Form :</label>\
                                <input class="form-control form-control-sm form_" type="text" name="form_[]"/>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="row">\
                        <div class="col-lg-12">\
                                <label class="control-label"><b>Ht</b>&nbsp;</label>\
                        </div>\
                        <div class="col-lg-2">\
                            <div class="form-group">\
                                <label class="control-label">Den:</label>\
                                <input class="form-control form-control-sm den" type="text" name="den[]"/>\
                            </div>\
                        </div>\
                        <div class="col-lg-2">\
                            <div class="form-group">\
                                <label class="control-label">Branch :</label>\
                                <input class="form-control form-control-sm branch" type="text" name="branch[]"/>\
                            </div>\
                        </div>\
                        <div class="col-lg-2">\
                            <div class="form-group">\
                                <label class="control-label">Width :</label>\
                                <input class="form-control form-control-sm width_" type="text" name="width_[]">\
                            </div>\
                        </div>\
                        <div class="col-lg-2">\
                            <div class="form-group">\
                                <label class="control-label">MH :</label>\
                                <input class="form-control form-control-sm mh_" type="text" name="mh_[]"/>\
                            </div>\
                        </div>\
                        <div class="col-lg-2">\
                            <div class="form-group">\
                                <label class="control-label">TH :</label>\
                                <input class="form-control form-control-sm th_" type="text" name="th_[]"/>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="row">\
                        <div class="col-lg-4">\
                            <div class="form-group">\
                                <label class="control-label">Description:</label>\
                                <input class="form-control form-control-sm description" type="text" name="description[]"/>\
                            </div>\
                        </div>\
                        <div class="col-lg-3">\
                            <div class="form-group">\
                                <label class="control-label">Seed Weight(g):</label>\
                                <input class="form-control form-control-sm seed_weight" type="text" name="seed_weight[]"/>\
                            </div>\
                        </div>\
                        <div class="col-lg-2">\
                            <div class="form-group">\
                                <label class="control-label">Viab/10g:</label>\
                                <input class="form-control form-control-sm viab_percent" type="text" name="viab_percent[]"/>\
                            </div>\
                        </div>\
                        <div class="col-lg-1">\
                            <div class="form-group">\
                                <label class="control-label"> &nbsp;</label>\
                                <button type="button" class="btn btn-sm btn-danger form-control form-control-sm rmv-other-btn"><span class="fa fa-times"></span></button>\
                            </div>\
                        </div>\
                    </div>\
                </div>';

    // loadSeedAssoc(2);
    // seedassociatedModal.show();

                 
    var loadSeedAssoc = async (id) => {
            assocformRef = document.querySelector("#assoc-inputs");
            assocformRef.innerHTML = "";
            // id = id ?? "";
           await fetch('../controller/api/seed-collection/get-seed-collection-associated?search='+id, {
               method: 'GET',
               header : {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
               }
            })
            .then(response => response.json())
            .then((callback) => {
                console.log(callback.length);
                if(callback.length > 0) {

                    callback.forEach((data, index)=> {
                        console.log(data);
                        genAssocDiv = document.createElement('div');
                        genAssocDiv.innerHTML = inputAssociatedDefault;
                        genAssocDiv.querySelector('.seed_prov_id').value = data.seed_prov_id ?? "";
                        genAssocDiv.querySelector('.seed_assoc_collection_id').value = data.seed_collection_id ?? "";
                        genAssocDiv.querySelector('.assoc_inc').value = data.assoc_inc ?? "";
                        genAssocDiv.querySelector('.freq').value = data.freq ?? "";
                        genAssocDiv.querySelector('.ht_m').value = data.ht_m ?? "";
                        genAssocDiv.querySelector('.comments').value = data.comments ?? "";
                        assocformRef.appendChild(genAssocDiv);

                    });
                    return; 
                }

                genAssocDiv = document.createElement('div');
                genAssocDiv.innerHTML = inputAssociatedDefault;
                genAssocDiv.querySelector('.seed_other_collection_id').value = seedAssocModalBtn.getAttribute('data-seed-id');
                assocformRef.appendChild(genAssocDiv);

            });

    }

                 
    var loadSeedOther = async (id) => {
            assocformRef = document.querySelector("#seed-other-inputs");
            assocformRef.innerHTML = "";
            // id = id ?? "";
           await fetch('../controller/api/seed-collection/get-seed-other-detail?search='+id, {
               method: 'GET',
               header : {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
               }
            })
            .then(response => response.json())
            .then((callback) => {
                console.log(callback.length);
                if(callback.length > 0) {

                    callback.forEach((data, index)=> {
                        console.log(data);
                        genAssocDiv = document.createElement('div');
                        genAssocDiv.innerHTML = inputOtherDefault;
                        genAssocDiv.querySelector('.seed_collection_other_id').value = data.seed_collection_other_id ?? "";
                        genAssocDiv.querySelector('.seed_other_collection_id').value = data.seed_collection_id ?? "";
                        genAssocDiv.querySelector('.tree_no').value = data.tree_no ?? "";
                        genAssocDiv.querySelector('.total').value = data.total ?? "";
                        genAssocDiv.querySelector('.age_').value = data.age_ ?? "";
                        genAssocDiv.querySelector('.den').value = data.den ?? "";
                        genAssocDiv.querySelector('.form_').value = data.form_ ?? "";
                        genAssocDiv.querySelector('.den').value = data.den ?? "";
                        genAssocDiv.querySelector('.width_').value = data.width_ ?? "";
                        genAssocDiv.querySelector('.mh_').value = data.mh_ ?? "";
                        genAssocDiv.querySelector('.th_').value = data.th_ ?? "";
                        genAssocDiv.querySelector('.description').value = data.description ?? "";
                        genAssocDiv.querySelector('.seed_weight').value = data.seed_weight ?? "";
                        genAssocDiv.querySelector('.viab_percent').value = data.viab_percent ?? "";
                        assocformRef.appendChild(genAssocDiv);

                    });
                    return; 
                }

                genAssocDiv = document.createElement('div');
                genAssocDiv.innerHTML = inputOtherDefault;
                genAssocDiv.querySelector('.seed_other_collection_id').value = seedOtherDetailBtn.getAttribute('data-seed-id');
                assocformRef.appendChild(genAssocDiv);

            });

    }

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
                
                document.querySelector('#additional_seed_detail').hidden = true;
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

                document.querySelector('#additional_seed_detail').hidden = true;
                document.querySelector('#seedCollectionBtn').hidden = false;
                return;
            }
        });

        document.addEventListener('click', e => {
            var targetElement = e.target || e.srcElement;

            if(e.target.closest('.view-btn')) {
                // console.log(targetElement);
                // document.querySelectorAll('.view-btn')[0].parentNode.querySelector('.view-btn').click();
                // console.log("from edit " +targetElement.getAttribute('data-index-id'))
                seedAssocModalBtn.setAttribute('data-seed-id',targetElement.getAttribute('data-seed-id'));
                seedOtherDetailBtn.setAttribute('data-seed-id',targetElement.getAttribute('data-seed-id'));
                document.querySelector('#seedCollectionBtn').hidden = true;
                document.querySelector('#additional_seed_detail').hidden = false;
                insertSearchCollection(targetElement.getAttribute('data-index-id'));
                document.querySelectorAll("#seedCollectionForm input, select, textarea").forEach((el)=> {
                el.setAttribute("disabled",true);
                });
                seedcollectionModal.show();
                return;
            }

        });

        document.addEventListener('click', e => {
            var targetElement = e.target || e.srcElement;

            if(e.target.closest('.print-btn')) {
                document.querySelector('#printModal iframe')
                .setAttribute("src","../controller/report/report-generate-seed-collection?search="+targetElement.getAttribute("data-seed-id"));
                printModal.show();
                return;
            }

        });


        seedOtherDetailBtn.addEventListener('click',(el) => {
            loadSeedOther(el.target.getAttribute('data-seed-id'));
            seedcollectionOtherModal.show();
        });

        seedAssocModalBtn.addEventListener('click',(el) => {
            // console.log(el.target.getAttribute('data-seed-id'))
            loadSeedAssoc(el.target.getAttribute('data-seed-id'));
            seedassociatedModal.show();
        });

        document.addEventListener('click', e => {
            var targetElement = e.target || e.srcElement;
            if(e.target.closest('.collection-back-btn')) {
                seedcollectionModal.show();
                return;
            }
        });


        document.addEventListener('click', e => {
            var targetElement = e.target || e.srcElement;
            if(e.target.closest('.remove-assoc-btn')) {
                console.log(e.target.localName);
                if(document.querySelectorAll('.remove-assoc-btn').length  > 1) {

                    if(e.target.localName != 'button') {
                        var parentNodeTobeRemove = targetElement.parentNode.parentNode.parentNode;
                        getId =  parentNodeTobeRemove.querySelector('.seed_prov_id').value;
                        tobeDeleteSeedAssocData.push(getId);    
                        parentNodeTobeRemove.remove();
                        // console.log(tobeDeleteSeedAssocData);
                        return;
                    }

                    
                    var parentNodeTobeRemove = targetElement.parentNode.parentNode;
                    getId =  parentNodeTobeRemove.querySelector('.seed_prov_id').value;
                    tobeDeleteSeedAssocData.push(getId);
                    parentNodeTobeRemove.remove();
                    // console.log(tobeDeleteSeedAssocData);
                    return;

                }
            }
        });

        document.addEventListener('click', e => {
            var targetElement = e.target || e.srcElement;
            if(e.target.closest('.rmv-other-btn')) {
                console.log(e.target.localName);
                if(document.querySelectorAll('.rmv-other-btn').length  > 1) {

                    if(e.target.localName != 'button') {
                        var parentNodeTobeRemove = targetElement.parentNode.parentNode.parentNode.parentNode.parentNode;
                        getId =  parentNodeTobeRemove.querySelector('.seed_collection_other_id').value;
                        tobeDeleteSeedOtherData.push(getId);    
                        parentNodeTobeRemove.remove();
                        // console.log(tobeDeleteSeedOtherData);
                        return;
                    }

                    
                    var parentNodeTobeRemove = targetElement.parentNode.parentNode.parentNode.parentNode;
                    getId =  parentNodeTobeRemove.querySelector('.seed_collection_other_id').value;
                    tobeDeleteSeedOtherData.push(getId);
                    parentNodeTobeRemove.remove();
                    // console.log(tobeDeleteSeedOtherData);
                    return;

                }
            }
        });


        document.querySelector("#insert-row-assoc-btn").addEventListener('click', () => {
            assocformRef = document.querySelector("#assoc-inputs");
            genAssocDiv = document.createElement('div');
            genAssocDiv.innerHTML = inputAssociatedDefault;
            genAssocDiv.querySelector('.seed_assoc_collection_id').value = seedAssocModalBtn.getAttribute('data-seed-id');
            assocformRef.appendChild(genAssocDiv);
        });

        document.querySelector("#insert-row-other-btn").addEventListener('click', () => {
            assocformRef = document.querySelector("#seed-other-inputs");
            genAssocDiv = document.createElement('div');
            genAssocDiv.innerHTML = inputOtherDefault;
            genAssocDiv.querySelector('.seed_other_collection_id').value = seedOtherDetailBtn.getAttribute('data-seed-id');
            assocformRef.appendChild(genAssocDiv);
        });
        

        document.querySelector("#modal-other-detail-btn").addEventListener('click', async (e) => {
            e.preventDefault();
            const formData = new FormData(document.querySelector("#seedcollectionOtherForm"));

            for(var i in tobeDeleteSeedOtherData) {
                formData.append("tobeDelete_id[]",tobeDeleteSeedOtherData[i]);
            }

            fetch('../controller/api/seed-collection/save-seed-other-detail.php', {
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
                    seedcollectionModal.show();
                    return;
                 }
            });

        });

        document.querySelector("#modal-assoc-submit-btn").addEventListener('click', async (e) => {
            e.preventDefault();
            const formData = new FormData(document.querySelector("#seedassociatedForm"));

            for(var i in tobeDeleteSeedAssocData) {
                formData.append("tobeDelete_id[]",tobeDeleteSeedAssocData[i]);
            }
            // seedassociatedForm = document.querySelector("#seedassociatedForm");
            // validateInput = {};
            // constraints = {};
            // seedassociatedForm.querySelectorAll("input, select .validate").forEach((el,index) => {
            //     validateInput[el.getAttribute('name')+"["+index+"]"] = el.value;
            // });
            //  for(var con in validateInput) {
            // constraints[con] = {presence : {allowEmpty:false}}
            // }

            // resultValidate = validate(validateInput,constraints); //true or false
            // if(resultValidate) {
                // resultMessage = "";
                // for(var index in resultValidate) {
                //     resultMessage += resultValidate[index][0] +"<br>";
                // }

                     // swal({
                     //    position: 'center',
                     //    icon: 'error',
                     //    title: "Some are missing.",
                     //    showConfirmButton: false,
                     //    timer: 1500
                     //  });
                     // return;
            // }

            fetch('../controller/api/seed-collection/save-seed-associated.php', {
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
                    seedcollectionModal.show();
                    return;
                 }
            });

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
                });
                submitted_seed_collection = false;

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
                                        <button class="btn btn-sm btn-info view-btn" data-index-id="'+ index +'" data-seed-id="'+ data.seed_collection_id +'"><span class="fa fa-search" data-index-id="'+ index +'" data-seed-id="'+ data.seed_collection_id +'"></span> VIEW</button>\
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