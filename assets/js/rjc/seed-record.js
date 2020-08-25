(()=> {


    var seedRecordModal = new BSN.Modal("#seed-record-modal");
    var seedGerminationModal = new BSN.Modal("#seed-germination-modal");
    var seedConsigneeModal = new BSN.Modal("#seed-consignee-modal");
    var searchBtn = document.querySelector("#search-btn");
    var searchBar = document.querySelector("#search-input");
    var printModal = new BSN.Modal("#printModal");
    var seedRecordForm = document.querySelector("#seedRecordForm");
    var seedCollectionBtn = document.querySelector("#seedCollectionBtn");
    var seedCollectionTbl = document.querySelector("#seedCollectionTbl");
    var consigneeModalBtn   = document.querySelector("#consigneeModalBtn");
    var germinationModalBtn = document.querySelector("#germinationModalBtn");
    var seedRecordBtncontainer = document.querySelector("#seed-record-btn-container");

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
    
    germinationInputDefault = '<div class="form-row germination-input-default">\
                    <div class="col-lg-2">\
                        <div class="form-group">\
                            <label class="control-label">Method :</label>\
                            <input class="form-control form-control-sm seed_germination_id" type="hidden" name="seed_germination_id[]">\
                            <input class="form-control form-control-sm seed_record_id" type="hidden" name="seed_record_id[]">\
                            <input class="form-control form-control-sm method" type="text" name="method[]">\
                        </div>\
                    </div>\
                    <div class="col-lg-3">\
                        <div class="form-group">\
                            <label class="control-label">From :</label>\
                            <input class="form-control form-control-sm seed_from" type="date" name="seed_from[]"/>\
                        </div>\
                    </div>\
                    <div class="col-lg-3">\
                        <div class="form-group">\
                            <label class="control-label">To :</label>\
                            <input class="form-control form-control-sm seed_to" type="date" name="seed_to[]"/>\
                        </div>\
                    </div>\
                    <div class="col-lg-3">\
                        <div class="form-group">\
                            <label class="control-label">Viability/10 g(%) :</label>\
                            <input class="form-control form-control-sm viab" type="number" name="viab[]"/>\
                        </div>\
                    </div>\
                    <div class="col-lg-1">\
                            <label class="control-label"> &nbsp;</label>\
                        <button class="btn btn-sm btn-danger form-control form-control-sm remove-germination-btn" type="button"><span class="fa fa-times"></span></button>\
                    </div>\
                </div>';

    consigneeInputDefault = '<div class="form-row consignee-input-default">\
                    <div class="col-lg-1">\
                        <div class="form-group">\
                            <label class="control-label">File No</label>\
                            <input class="form-control form-control-sm file_no" type="number" name="file_no[]"/>\
                        </div>\
                    </div>\
                    <div class="col-lg-3">\
                        <div class="form-group">\
                            <label class="control-label">Date</label>\
                            <input class="form-control form-control-sm seed_consignee_id" type="hidden" name="seed_consignee_id[]">\
                            <input class="form-control form-control-sm seed_record_id" type="hidden" name="seed_record_id[]">\
                            <input class="form-control form-control-sm consignee_date" type="date" name="consignee_date[]">\
                        </div>\
                    </div>\
                    <div class="col-lg-3">\
                        <div class="form-group">\
                            <label class="control-label">Consignee</label>\
                            <input class="form-control form-control-sm consignee" type="text" name="consignee[]"/>\
                        </div>\
                    </div>\
                    <div class="col-lg-2">\
                        <div class="form-group">\
                            <label class="control-label">Amount Sent</label>\
                            <input class="form-control form-control-sm amount_sent" type="number" name="amount_sent[]"/>\
                        </div>\
                    </div>\
                    <div class="col-lg-2">\
                        <div class="form-group">\
                            <label class="control-label">Amount Left</label>\
                            <input class="form-control form-control-sm amount_left" type="number" name="amount_left[]"/>\
                        </div>\
                    </div>\
                    <div class="col-lg-1">\
                            <label class="control-label"> &nbsp;</label>\
                        <button class="btn btn-sm btn-danger form-control form-control-sm remove-consignee-btn" type="button"><span class="fa fa-times"></span></button>\
                    </div>\
                </div>';

    searchBar.addEventListener('keyup',(e)=> {
       if(e.keyCode == 13) {
          searchBtn.click();
        }
    });

    searchBtn.addEventListener('click', async function() {

        if(searchBar.value.length > 0) {
           dataSeedCollection = await fetch('../controller/api/seed-record/search-seed-collection.php?search='+searchBar.value, {
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

    document.addEventListener('click', e => {
        var targetElement = e.target || e.srcElement;

        if(e.target.closest('.print-btn')) {
            document.querySelector('#printModal iframe')
            .setAttribute("src","../controller/report/report-generate-seed-record?search="+targetElement.getAttribute("data-seed-collection-id"));
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

    germinationModalBtn.addEventListener('click',(el) => {
        germinationCollection(el.target.getAttribute('data-seed-record-id'));
        console.log(el.target.getAttribute('data-seed-record-id'))
        seedGerminationModal.show();
    });

    consigneeModalBtn.addEventListener('click',(el) => {
        consigneeCollection(el.target.getAttribute('data-seed-record-id'));
        console.log(el.target.getAttribute('data-seed-record-id'))
        seedConsigneeModal.show();
    });

    document.querySelector("#insert-row-germination-btn").addEventListener('click', () => {
        inputFormRef = document.querySelector("#germination-inputs");
        genDiv = document.createElement('div');
        genDiv.innerHTML = germinationInputDefault;
        genDiv.querySelector('.seed_record_id').value = germinationModalBtn.getAttribute('data-seed-record-id');
        inputFormRef.appendChild(genDiv);
    });

    document.querySelector("#insert-row-consignee-btn").addEventListener('click', () => {
        inputFormRef = document.querySelector("#consignee-inputs");
        genDiv = document.createElement('div');
        genDiv.innerHTML = consigneeInputDefault;
        divLength = document.querySelectorAll(".consignee-input-default").length + 1;
        genDiv.querySelector('.seed_record_id').value = consigneeModalBtn.getAttribute('data-seed-record-id');
        genDiv.querySelector(".file_no").value = divLength;
        inputFormRef.appendChild(genDiv);
    });

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
                    storage :{
                        presence : {allowEmpty:false}
                    },
                    quantity :{
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
                console.log(resultValidate);


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

    document.addEventListener('click', e => {
        var targetElement = e.target || e.srcElement;
        if(e.target.closest('.remove-germination-btn')) {
            console.log(e.target.localName);
            if(document.querySelectorAll('.remove-germination-btn').length  > 1) {

                if(e.target.localName != 'button') {
                    var parentNodeTobeRemove = targetElement.parentNode.parentNode.parentNode;
                    console.log(parentNodeTobeRemove)
                    getId =  parentNodeTobeRemove.querySelector('.seed_germination_id').value;
                    tobeDeleteSeedGerminationData.push(getId);    
                    parentNodeTobeRemove.remove();
                    // console.log(tobeDeleteSeedGerminationData);
                    return;
                }

                
                var parentNodeTobeRemove = targetElement.parentNode.parentNode;
                console.log(parentNodeTobeRemove)
                getId =  parentNodeTobeRemove.querySelector('.seed_germination_id').value;
                tobeDeleteSeedGerminationData.push(getId);
                parentNodeTobeRemove.remove();
                // console.log(tobeDeleteSeedGerminationData);
                return;

            }
        }
    });

    document.addEventListener('click', e => {
        var targetElement = e.target || e.srcElement;
        if(e.target.closest('.remove-consignee-btn')) {
            console.log(e.target.localName);
            if(document.querySelectorAll('.remove-consignee-btn').length  > 1) {

                if(e.target.localName != 'button') {
                    var parentNodeTobeRemove = targetElement.parentNode.parentNode.parentNode;
                    console.log(parentNodeTobeRemove)
                    getId =  parentNodeTobeRemove.querySelector('.seed_consignee_id').value;
                    tobeDeleteSeedConsigneeData.push(getId);    
                    parentNodeTobeRemove.remove();
                    // console.log(tobeDeleteSeedConsigneeData);
                    return;
                }

                
                var parentNodeTobeRemove = targetElement.parentNode.parentNode;
                console.log(parentNodeTobeRemove)
                getId =  parentNodeTobeRemove.querySelector('.seed_consignee_id').value;
                tobeDeleteSeedConsigneeData.push(getId);
                parentNodeTobeRemove.remove();
                // console.log(tobeDeleteSeedConsigneeData);
                return;

            }
        }
    });

    document.querySelector("#modal-germination-submit-btn").addEventListener('click', async (e) => {
        e.preventDefault();
        const formData = new FormData(document.querySelector("#seedGerminationForm"));

        for(var i in tobeDeleteSeedGerminationData) {
            formData.append("tobeDelete_id[]",tobeDeleteSeedGerminationData[i]);
        }

        fetch('../controller/api/seed-record/save-seed-germination.php', {
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

    document.querySelector("#modal-consignee-submit-btn").addEventListener('click', async (e) => {
        e.preventDefault();
        const formData = new FormData(document.querySelector("#seedConsigneeForm"));

        for(var i in tobeDeleteSeedConsigneeData) {
            formData.append("tobeDelete_id[]",tobeDeleteSeedConsigneeData[i]);
        }

        fetch('../controller/api/seed-record/save-seed-consignee.php', {
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
            document.querySelector("#collection_date").value             = moment(editRow.collection_date).format('YYYY-MM-D');
            document.querySelector("#project").value                     = (editRow.project ?? "");
            document.querySelector("#identified_by").value               = (editRow.identified_by ?? "");
            document.querySelector("#seed_condition").value                   = (editRow.seed_condition ?? "");
            document.querySelector("#storage").value                     = (editRow.storage ?? "");
            document.querySelector("#quantity").value                    = (editRow.quantity ?? ""); 
            editRow.seed_record_id ? seedRecordBtncontainer.hidden = false : seedRecordBtncontainer.hidden = true;
            consigneeModalBtn.setAttribute("data-seed-record-id",editRow.seed_record_id);
            germinationModalBtn.setAttribute("data-seed-record-id",editRow.seed_record_id);
    }
                 
    var germinationCollection = async (id) => {
            inputFormRef = document.querySelector("#germination-inputs");
            inputFormRef.innerHTML = "";
            // id = id ?? "";
           await fetch('../controller/api/seed-record/get-seed-record-germination?search='+id, {
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
                        genDiv = document.createElement('div');
                        genDiv.innerHTML = germinationInputDefault;
                        genDiv.querySelector('.seed_germination_id').value = data.seed_germination_id ?? "";
                        genDiv.querySelector('.seed_record_id').value = data.seed_record_id ?? "";
                        genDiv.querySelector('.method').value = data.method ?? "";
                        genDiv.querySelector('.seed_from').value = moment(data.seed_from).format('YYYY-MM-D');
                        genDiv.querySelector('.seed_to').value = moment(data.seed_to).format('YYYY-MM-D');
                        genDiv.querySelector('.viab').value = data.viab ?? "";
                        inputFormRef.appendChild(genDiv);

                    });
                    return; 
                }

                genDiv = document.createElement('div');
                genDiv.innerHTML = germinationInputDefault;
                genDiv.querySelector('.seed_record_id').value = germinationModalBtn.getAttribute('data-seed-record-id');
                inputFormRef.appendChild(genDiv);

            });

    }

    var consigneeCollection = async (id) => {
            inputFormRef = document.querySelector("#consignee-inputs");
            inputFormRef.innerHTML = "";
            // id = id ?? "";
           await fetch('../controller/api/seed-record/get-seed-record-consignee?search='+id, {
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
                        genDiv = document.createElement('div');
                        genDiv.innerHTML = consigneeInputDefault;
                        genDiv.querySelector('.seed_consignee_id').value = data.seed_consignee_id ?? "";
                        genDiv.querySelector('.seed_record_id').value = data.seed_record_id ?? "";
                        genDiv.querySelector('.file_no').value = data.file_no ?? "";
                        genDiv.querySelector('.consignee_date').value = moment(data.consignee_date).format('YYYY-MM-D');
                        genDiv.querySelector('.consignee').value = data.consignee ?? "";
                        genDiv.querySelector('.amount_sent').value = data.amount_sent ?? "";
                        genDiv.querySelector('.amount_left').value = data.amount_left ?? "";
                        inputFormRef.appendChild(genDiv);

                    });
                    return; 
                }

                genDiv = document.createElement('div');
                genDiv.innerHTML = consigneeInputDefault;
                genDiv.querySelector('.seed_record_id').value = germinationModalBtn.getAttribute('data-seed-record-id');
                inputFormRef.appendChild(genDiv);

            });

    }

})();