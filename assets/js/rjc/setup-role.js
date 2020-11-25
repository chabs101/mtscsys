(()=> {
   
    var roleModal = new BSN.Modal("#roleModal");
    var roleForm = document.querySelector("#roleForm");
    var searchBtn = document.querySelector("#search-btn");
    var saveBtn = document.querySelector("#saveBtn");
    var searchBar = document.querySelector("#search-input");
    var roleTbl = document.querySelector("#roleTbl");
    var displayLimit = document.querySelector("#display_limit");
    var tablePagination = document.querySelector("#table-pagination");
    var nextPageBtn = document.querySelector("#btn-next");
    var prevPageBtn = document.querySelector("#btn-prev");
    // var pattern = "00000";
    // (pattern + data.role_id).slice(-(pattern.length))
    var submitted_seed_collection = false;
    dataCollection = {};
    
    setTimeout(()=>{
        autoSearchAll();
    },500);          
    autoSearchAll = () => {
        searchBar.value = searchBar.value.length > 0 ? searchBar.value : "all";
        searchBtn.click();
        searchBar.value = "";   
    }

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

    searchBtn.addEventListener('click', function() {

        loadTable();

    });


        document.addEventListener('click', e => {
            var targetElement = e.target || e.srcElement;
            if(e.target.closest('.edit-btn')) {
                // console.log(e.target)
                
                document.querySelectorAll("#roleForm input, select").forEach((el)=> {
                    el.removeAttribute("disabled");
                });
                // console.log("from edit" +targetElement.getAttribute('data-index-id'))
                loadEdit(targetElement.getAttribute('data-index-id'));                
                roleModal.show();
                return;
            }
        });

        roleForm.addEventListener('submit', (e) => {
            e.preventDefault();
        });

            saveBtn.addEventListener('click', async()=> {
                const formData = new FormData(roleForm);

                validateInput = validate.collectFormValues(roleForm)

                constraints = {
                    role_name :{
                        presence : {allowEmpty:false}
                    },
                    
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


                fetch('../controller/api/setup-role/save-role.php', {
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
                        roleModal.dispose();
                        roleForm.querySelectorAll("input, select").forEach((el) => {
                            el.classList.remove("is-invalid");
                        });
                        autoSearchAll();
                        return;
                     }

                    if(!data[0].success) {
                         swal({
                            position: 'center',
                            icon: 'warning',
                            title: data[0].message,
                            showConfirmButton: false,
                            timer: 1000
                          });  
                         return;
                    }
                });

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

                        id = targetElement.getAttribute('data-id');
                        fetch('../controller/api/setup-role/delete-role.php?id='+id, {
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
                                autoSearchAll();
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
                document.querySelector("#roleForm").reset();
                document.querySelector("#role_id").value = "";
                document.querySelectorAll("#roleForm input, select").forEach((el)=> {
                    el.removeAttribute("disabled");
                });
                return;
            }
        });


        loadEdit = (index) => {
                editRow = dataCollection[index]; 
                document.querySelector("#role_id").value    = editRow.role_id; 
                document.querySelector("#role_name").value   = editRow.role_name; 
        }

        prevListId = [];
        nextPageBtn.addEventListener('click',() => {
                // prevPageBtn.setAttribute("last-id",prevPageBtn.getAttribute('data-id'));
                prevListId.push(prevPageBtn.getAttribute('data-id'));
                searchBar.value.length ? searchBar.value : searchBar.value = "all";
                loadTable("","&nextPage="+nextPageBtn.getAttribute("data-id"));
                searchBar.value = "";
        });

        prevPageBtn.addEventListener('click',() => {
            if(prevListId.length > 0) {
                searchBar.value.length ? searchBar.value : searchBar.value = "all";
                loadTable("&prevPage="+prevPageBtn.getAttribute("data-id"),"&nextPage="+prevListId[prevListId.length-1]);
                prevListId.pop(prevListId[prevListId.length-1]);
                searchBar.value = "";
                return;
            }
        });

        displayLimit.addEventListener("change",() => {
            searchBar.value.length ? searchBar.value : searchBar.value = "all";
            loadTable();
            searchBar.value = "";
        });


        loadTable = async (prevPage ="", nextPage = "") => {

            if(searchBar.value.length > 0) {
                nextPage = nextPage.length ? nextPage : "";
                prevPage = prevPage.length ? prevPage : "";
               dataCollection = await fetch('../controller/api/setup-role/get-role.php?search='+searchBar.value+"&limit="+displayLimit.value+nextPage+prevPage, {
                   method: 'GET',
                   header : {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                   }
                })
                .then(response => response.json());
            }

            roleTbl.getElementsByTagName('tbody')[0].innerHTML = "";
            if(dataCollection.length > 0) {

                dataCollection.forEach(function(data, index){
                tableRef = roleTbl.getElementsByTagName('tbody')[0];
                // console.log(data);
                    newRow = tableRef.insertRow(tableRef.rows.length);
                    newRowHtml = '<tr>\
                                <td><small>'+(data.role_name ?? "n/a")+'</small></td>\
                                <td><small>'+(data.created_at ? moment(data.created_at).format('MMMM D, YYYY') : "n/a")+'</small></td>\
                                <td>\
                                    <div class="action-btn float-right">\
                                        <button class="btn btn-sm btn-primary edit-btn" data-index-id="'+ index +'" data-id="'+ data.role_id +'"><span class="fa fa-pencil-alt" data-index-id="'+ index +'" data-id="'+ data.role_id +'"></span></button>\
                                        <button class="btn btn-sm btn-danger delete-btn" hidden data-index-id="'+ index +'" data-id="'+ data.role_id +'"><span class="fa fa-times" data-index-id="'+ index +'" data-id="'+ data.role_id +'"></span></button>\
                                    </div>\
                                </td>  \
                                </tr>';
                    // console.log(newRowHtml)
                    newRow.innerHTML = newRowHtml;
                });

                // if(dataCollection)
                if(!prevListId.length) {
                    prevPageBtn.disabled = true;
                }
                prevPageBtn.disabled = false;
                prevPageBtn.setAttribute("data-id",dataCollection[0].role_id);    
                nextPageBtn.setAttribute("data-id",dataCollection[dataCollection.length-1].role_id);    
                tablePagination.hidden = false;
                return;
            }

            dataCollection = {};
            prevListId = [];
            tablePagination.hidden = true;            
            tableRef = roleTbl.getElementsByTagName('tbody')[0];
            newRow = tableRef.insertRow(tableRef.rows.length);
            newRowHtml = '<tr><td colspan="3" class="text-center">No record found.</td></tr>';
            newRow.innerHTML = newRowHtml;
            console.log("no data.");
        }
 
})();