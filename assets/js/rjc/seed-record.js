(()=> {


    var seedRecordModal = new BSN.Modal("#seed-record-modal");
    var seedConsigneeModal = new BSN.Modal("#seed-consignee-modal");
    var searchBtn = document.querySelector("#search-btn");
    var searchBar = document.querySelector("#search-input");
    var searchOption = document.querySelector("#search_option");
    var printModal = new BSN.Modal("#printModal");
    var seedRecordForm = document.querySelector("#seedRecordForm");
    var seedCollectionBtn = document.querySelector("#seedCollectionBtn");
    var seedCollectionTbl = document.querySelector("#seedCollectionTbl");
    var seedRecordOtherModalBtn   = document.querySelector("#seedRecordOtherModalBtn");
    var seedRecordBtncontainer = document.querySelector("#seed-record-btn-container");

    dataSeedCollection = {};
    // tobeDeleteSeedGerminationData = [];
    // tobeDeleteSeedConsigneeData = [];
    // seedRecordModal.show();
    document.addEventListener('keyup', (e) => {
        e.preventDefault();
        var keyCode = e.keyCode || e.which;
        if(e.altKey == true && keyCode == "49") {
            document.getElementById("search-input").focus();
        }

    });

    searchOption.addEventListener("change",() => {
        if(searchOption.value === "other_detail") {
            searchBar.setAttribute("placeholder","Search tree_no/barcode");
            return;
        }
        searchBar.setAttribute("placeholder","Search barcode/seed lot no/botanical name");
    });

    consigneeInputDefault = '<div class="form-row consignee-input-default small border mt-4 p-2">\
                    <div class="row">\
                        <div class="col-lg-12">\
                                <label class="control-label"><b>DETAIL</b>&nbsp;</label>\
                        </div>\
                        <div class="col-lg-1">\
                            <div class="form-group">\
                                <label class="control-label">Tree No</label>\
                                <input class="form-control form-control-sm tree_no" disabled="true" type="text" maxlength="11" name="tree_no[]"/>\
                            </div>\
                        </div>\
                        <div class="col-lg-2">\
                            <div class="form-group">\
                                <label class="control-label">Barcode</label>\
                                <input class="form-control form-control-sm barcode" type="text" disabled="true" name="barcode[]"/>\
                            </div>\
                        </div>\
                        <div class="col-lg-2">\
                            <div class="form-group">\
                                <label class="control-label">Collection (Bulk/Individuals)</label>\
                                <input class="form-control form-control-sm collection" type="text" name="collection[]"/>\
                            </div>\
                        </div>\
                        <div class="col-lg-1">\
                            <div class="form-group">\
                                <label class="control-label">MC</label>\
                                <input class="form-control form-control-sm mc" type="text" name="mc[]"/>\
                            </div>\
                        </div>\
                        <div class="col-lg-2">\
                            <div class="form-group">\
                                <label class="control-label">Purity</label>\
                                <input class="form-control form-control-sm purity" type="text" name="purity[]"/>\
                            </div>\
                        </div>\
                        <div class="col-lg-2">\
                            <div class="form-group">\
                                <label class="control-label">Viability</label>\
                                <input class="form-control form-control-sm viab" type="text" name="viab[]"/>\
                            </div>\
                        </div>\
                        <div class="col-lg-1">\
                            <div class="form-group">\
                                <label class="control-label">Seed Count</label>\
                                <input class="form-control form-control-sm seed_count" type="number" name="seed_count[]"/>\
                            </div>\
                        </div>\
                        <div class="col-lg-1">\
                            <div class="form-group">\
                                <label class="control-label">Seed Wt(g)</label>\
                                <input class="form-control form-control-sm seed_weight" disabled="true" type="number" name="seed_weight[]"/>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="row">\
                        <div class="col-lg-12">\
                                <label class="control-label"><b>Storage</b>&nbsp;</label>\
                        </div>\
                        <div class="col-lg-4">\
                            <div class="form-group">\
                                <label class="control-label">Room</label>\
                                <input class="form-control form-control-sm room" type="text" name="room[]"/>\
                            </div>\
                        </div>\
                        <div class="col-lg-4">\
                            <div class="form-group">\
                                <label class="control-label">Cont. No</label>\
                                <input class="form-control form-control-sm cont_no" type="number" name="cont_no[]"/>\
                            </div>\
                        </div>\
                        <div class="col-lg-4">\
                            <div class="form-group">\
                                <label class="control-label">Bag No.</label>\
                                <input class="form-control form-control-sm bag_no" type="number" name="bag_no[]"/>\
                            </div>\
                        </div>\
                    </div>\
                    <div class="row">\
                    <div class="col-lg-12">\
                            <label class="control-label"><b>Dispatch</b>&nbsp;</label>\
                    </div>\
                    <div class="col-lg-3">\
                        <div class="form-group">\
                            <label class="control-label">Date</label>\
                            <input class="form-control form-control-sm seed_collection_other_id" type="hidden" name="seed_collection_other_id[]">\
                            <input class="form-control form-control-sm seed_collection_id" type="hidden" name="seed_collection_id[]">\
                            <input class="form-control form-control-sm consignee_date" type="date" name="consignee_date[]">\
                        </div>\
                    </div>\
                    <div class="col-lg-4">\
                        <div class="form-group">\
                            <label class="control-label">Consignee</label>\
                            <input class="form-control form-control-sm consignee" type="text" name="consignee[]"/>\
                        </div>\
                    </div>\
                    <div class="col-lg-2">\
                        <div class="form-group">\
                            <label class="control-label">Released</label>\
                            <input class="form-control form-control-sm released" type="number" name="released[]"/>\
                        </div>\
                    </div>\
                    <div class="col-lg-2">\
                        <div class="form-group">\
                            <label class="control-label">Balance</label>\
                            <input class="form-control form-control-sm balance" type="number" name="balance[]"/>\
                        </div>\
                    </div>\
                    <div class="col-lg-1">\
                            <label class="control-label"> &nbsp;</label>\
                        <button class="btn btn-sm btn-danger form-control form-control-sm remove-consignee-btn d-none" type="button"><span class="fa fa-times"></span></button>\
                    </div>\
                </div>\
                </div>';

    searchBar.addEventListener('keyup',(e)=> {
       if(e.keyCode == 13) {
            searchBtn.click();
            // searchOption.value = "" 
        }
    });

    searchBtn.addEventListener('click', async function() {

        if(searchBar.value.length > 0) {
           dataSeedCollection = await fetch('../controller/api/seed-record/search-seed-collection.php?search='+searchBar.value+"&searchOption="+searchOption.value, {
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
                                    <span class="fa fa-search" data-index-id="'+ index +'" data-seed-collection-id="'+ data.seed_collection_id +'"></span> VIEW SEED RECORD\
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

    document.addEventListener('click', async(e) => {
        var targetElement = e.target || e.srcElement;

        if(e.target.closest('.print-btn')) {
           await fetch("../controller/report/check-generate-seed-record?search="+targetElement.getAttribute("data-seed-collection-id"), {
               method: 'GET',
               header : {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
               }
            })
            .then(response => response.json())
            .then((callback) => {
                console.log(callback); 
                if(callback.length > 0) {
                    if(!callback[0].success) {
                         swal({
                            position: 'center',
                            icon: 'warning',
                            title: "Ooops!",
                            text: callback[0].message,
                            showConfirmButton: false,
                            timer: 1500
                          });
                        return;
                    }
                    document.querySelector('#printModal iframe')
                    .setAttribute("src","../controller/report/report-generate-seed-record?search="+targetElement.getAttribute("data-seed-collection-id"));
                    printModal.show();

                }
            });

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
    seedRecordOtherModalBtn.addEventListener('click',(el) => {
        seedRecordOtherCollection(el.target.getAttribute('data-seed-collection-id'));
        // console.log(el.target.getAttribute('data-seed-collection-id'))
        seedConsigneeModal.show();
    });


    // document.querySelector("#insert-row-consignee-btn").addEventListener('click', () => {
    //     inputFormRef = document.querySelector("#consignee-inputs");
    //     genDiv = document.createElement('div');
    //     genDiv.innerHTML = consigneeInputDefault;
    //     divLength = document.querySelectorAll(".consignee-input-default").length + 1;
    //     genDiv.querySelector('.seed_collection_other_id').value = seedRecordOtherModalBtn.getAttribute('data-seed-collection-id');
    //     inputFormRef.appendChild(genDiv);
    // });

            seedCollectionBtn.addEventListener('click', async()=> {
                const formData = new FormData(seedRecordForm);

                validateInput = validate.collectFormValues(seedRecordForm)

                constraints = {
                    species_code :{
                        presence : {allowEmpty:false}
                    },
                    dbh :{
                        presence : {allowEmpty:false}
                    },
                    total_height :{
                        presence : {allowEmpty:false}
                    },
                    form :{
                        presence : {allowEmpty:false}
                    },
                    collector :{
                        presence : {allowEmpty:false}
                    },
                    collector_no :{
                        presence : {allowEmpty:false}
                    },
                    collection_date :{
                        presence : {allowEmpty:false}
                    },
                    project :{
                        presence : {allowEmpty:false}
                    },
                    identified_by :{
                        presence : {allowEmpty:false}
                    },
                    seed_condition :{
                        presence : {allowEmpty:false}
                    },
                    quantity :{
                        presence : {allowEmpty:false}
                    },
                    g_method :{
                        presence : {allowEmpty:false}
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
                // console.log(resultValidate);


                fetch('../controller/api/seed-record/save-seed-record.php', {
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

    // document.addEventListener('click', e => {
    //     var targetElement = e.target || e.srcElement;
    //     if(e.target.closest('.remove-consignee-btn')) {
    //         console.log(e.target.localName);
    //         if(document.querySelectorAll('.remove-consignee-btn').length  > 1) {

    //             if(e.target.localName != 'button') {
    //                 var parentNodeTobeRemove = targetElement.parentNode.parentNode.parentNode.parentNode;
    //                 console.log(parentNodeTobeRemove)
    //                 getId =  parentNodeTobeRemove.querySelector('.seed_collection_other_id').value;
    //                 tobeDeleteSeedConsigneeData.push(getId);    
    //                 parentNodeTobeRemove.remove();
    //                 // console.log(tobeDeleteSeedConsigneeData);
    //                 return;
    //             }

                
    //             var parentNodeTobeRemove = targetElement.parentNode.parentNode.parentNode;
    //             console.log(parentNodeTobeRemove)
    //             getId =  parentNodeTobeRemove.querySelector('.seed_collection_other_id').value;
    //             tobeDeleteSeedConsigneeData.push(getId);
    //             parentNodeTobeRemove.remove();
    //             // console.log(tobeDeleteSeedConsigneeData);
    //             return;

    //         }
    //     }
    // });


    document.querySelector("#modal-consignee-submit-btn").addEventListener('click', async (e) => {
        e.preventDefault();
        const formData = new FormData(document.querySelector("#seedConsigneeForm"));

        // for(var i in tobeDeleteSeedConsigneeData) {
        //     formData.append("tobeDelete_id[]",tobeDeleteSeedConsigneeData[i]);
        // }

        fetch('../controller/api/seed-record/save-seed-record-other.php', {
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
                seedRecordModal.show();
                return;
             }
        });

    });


    insertSeedCollection = (index) => {
            editRow = dataSeedCollection[index]; 
            document.querySelector("#seed_collection_id").value         = editRow.seed_collection_id; 
            document.querySelector("#seed_record_id").value             = (editRow.seed_record_id ?? ""); 
            document.querySelector("#botanical_name").value             = editRow.botanical_name; 
            document.querySelector("#seedlot_no").value                 = editRow.seedlot_no; 
            document.querySelector("#seed_date").value                  = moment(editRow.seed_date).format('YYYY-MM-D'); 
            document.querySelector("#location").value                   = editRow.location; 
            document.querySelector("#lat").value                        = editRow.lat; 
            document.querySelector("#longi").value                      = editRow.longi; 
            document.querySelector("#alt").value                        = editRow.alt; 
            document.querySelector("#ph").value                         = editRow.ph; 
            document.querySelector("#slope").value                      = editRow.slope;
            document.querySelector("#species_code").value                = (editRow.species_code ?? "");
            document.querySelector("#store_code").value                  = (editRow.store_code ?? "");
            document.querySelector("#cost_code").value                   = (editRow.cost_code ?? "");
            document.querySelector("#geo_n_soil").value                  = (editRow.geo_n_soil ?? "");
            document.querySelector("#bulk").value                        = (editRow.bulk ?? "");
            document.querySelector("#tree").value                        = (editRow.tree ?? "");
            document.querySelector("#dbh").value                         = (editRow.dbh ?? "");
            document.querySelector("#total_height").value                = (editRow.total_height ?? "");
            document.querySelector("#form").value                        = (editRow.form ?? "");
            document.querySelector("#remarks").value                     = (editRow.remarks ?? "");
            document.querySelector("#fumigation_method").value           = (editRow.fumigation_method ?? "");
            document.querySelector("#collector").value                   = (editRow.collector ?? "");
            document.querySelector("#collector_no").value                = (editRow.collector_no ?? 0);
            document.querySelector("#collection_date").value             = (editRow.collection_date ?? "");
            document.querySelector("#project").value                     = (editRow.project ?? "");
            document.querySelector("#identified_by").value               = (editRow.identified_by ?? "");
            document.querySelector("#seed_condition").value              = (editRow.seed_condition ?? "");
            document.querySelector("#storage").value                     = (editRow.storage ?? "");
            document.querySelector("#quantity").value                    = (editRow.quantity ?? ""); 
            document.querySelector("#g_method").value                    = (editRow.g_method ?? "");
            document.querySelector("#g_from").value                      = (editRow.g_from ?? "");
            document.querySelector("#g_to").value                        = (editRow.g_to ?? "");
            document.querySelector("#g_viab").value                      = (editRow.g_viab ?? ""); 

            editRow.seed_record_id ? seedRecordBtncontainer.hidden = false : seedRecordBtncontainer.hidden = true;
            seedRecordOtherModalBtn.setAttribute("data-seed-collection-id",editRow.seed_collection_id);
    }
                 


    var seedRecordOtherCollection = async (id) => {
            inputFormRef = document.querySelector("#consignee-inputs");
            inputFormRef.innerHTML = "";
            // id = id ?? "";
           await fetch('../controller/api/seed-record/get-seed-record-other?search='+id, {
               method: 'GET',
               header : {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
               }
            })
            .then(response => response.json())
            .then((callback) => {
                // console.log(callback.length);
                if(callback.length > 0) {

                    callback.forEach((data, index)=> {
                        // console.log(data);
                        genDiv = document.createElement('div');
                        genDiv.innerHTML = consigneeInputDefault;
                        genDiv.querySelector('.seed_collection_other_id').value = data.seed_collection_other_id ?? "";
                        genDiv.querySelector('.seed_collection_id').value = data.seed_collection_id ?? "";
                        genDiv.querySelector('.consignee_date').value = data.consignee_date ?? "";
                        genDiv.querySelector('.consignee').value    = data.consignee ?? "";
                        genDiv.querySelector('.released').value     = data.released ?? "";
                        genDiv.querySelector('.balance').value      = data.balance ?? "";
                        genDiv.querySelector('.tree_no').value      = data.tree_no ?? "";
                        genDiv.querySelector('.barcode').value      = data.barcode ?? "";
                        genDiv.querySelector('.collection').value   = data.collection ?? "";
                        genDiv.querySelector('.mc').value           = data.mc ?? "";
                        genDiv.querySelector('.purity').value       = data.purity ?? "";
                        genDiv.querySelector('.viab').value         = data.viab ?? "";
                        genDiv.querySelector('.seed_count').value   = data.seed_count ?? "";
                        genDiv.querySelector('.seed_weight').value   = data.seed_weight ?? "";
                        genDiv.querySelector('.room').value         = data.room ?? "";
                        genDiv.querySelector('.cont_no').value      = data.cont_no ?? "";
                        genDiv.querySelector('.bag_no').value       = data.bag_no ?? "";
                        inputFormRef.appendChild(genDiv);

                    });
                    return; 
                }

                genDiv = document.createElement('div');
                genDiv.innerHTML = consigneeInputDefault;
                genDiv.querySelector('.seed_collection_other_id').value = seedRecordOtherModalBtn.getAttribute('data-seed-collection-id');
                inputFormRef.appendChild(genDiv);

            });

    }

})();