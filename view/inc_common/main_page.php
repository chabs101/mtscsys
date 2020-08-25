
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title><?=@$title;?></title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Library System" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <?php $this->load->view('template/main_css',@$loadcss);?>
        <?php $this->load->view('template/main_js',@$loadjs);?>

    </head>
<body class="page-body">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
    <?php $this->load->view('template/page_sidebar');?>


    <div class="main-content">
        <audio id="notifalert">
            <source src="" type="audio/mpeg">
        </audio>
                
        <?= $this->load->view("template/top_navigation");?>
        
        <hr />
        
        <ol class="breadcrumb bc-3" >
            <?=@$breadcrumb;?>
        </ol>
                    
        <h2><?=@$page_title;?></h2>
        
        <br />

        <?= $this->load->view(@$content,$data);?>
        

        <br />
        <!-- Footer -->
        <footer class="main">
            
            &copy; 2017 <strong>RJC</strong> Anel <a href="http://rinyel.000webhostapp.com" target="_blank">igop</a>
        
        </footer>
    </div>


    <?= $this->load->view('template/chat/main_chat')?>


</div>


    </body>
</html>






