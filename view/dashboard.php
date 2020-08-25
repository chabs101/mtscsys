<?php include('inc_common/session.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Dashboard | <?php include('inc_common/title_name.php');?></title>
          
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

      <iframe class="modal-body p-0" height="100%" src="http://localhost/mtscsys/controller/report/report-generate-barcode" ></iframe>

    </div>
  </div>
</div>
<!-- MODAL END -->
                <?php include('inc_common/footer.php'); ?>
            </div>
        </div>
        <?php include('inc_common/main_js.php');?>  
        <script>
            
            var printModal = new BSN.Modal("#printModal");
            // printModal.show();
        </script>      
</body>
</html>






