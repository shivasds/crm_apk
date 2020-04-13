<?php
$this->load->view('inc/header');
$CI=&get_instance();
 
    if(!$this->session->userdata('permissions') && $this->session->userdata('permissions')=='' ) {
    ?>

    <style type="text/css">
    .alrtMsg{padding-top: 50px;}
    .alrtMsg i {
        font-size: 60px;
        color: #f1c836;
    }
    </style>

    <div class="container"> 
        <div class="row"> 
            <div class="text-center alrtMsg">
                <i class="fa fa-exclamation-triangle"></i>
                <h3>You Do Not have permission as of now. Please contact your Administration and Request for Permission.</h3>
            </div>
        </div>
    </div>

    <?php
    die;
     }
    ?>
 
 <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>styles/framework.css">
  
 <style>
        
        .table-scroll th {
            padding: 3px 10px;
        }
        
        th {
            line-height: 25px;
        }
        
        .table-scroll {
            overflow-x: scroll;
            padding: 0px 10px;
        }
        
        #example_wrapper {
            margin-bottom: 40px!important;
            padding: 15px;
        }
        a {
            color: #337ab7!important;
            text-decoration: none;
        }
        td, th {
            padding: 0;
            padding: 9px 4px;
        }
    </style>
<body class="theme-light" data-highlight="blue2">
    <div id="page">
      <?php
        $this->load->view('inc/fixed_header');
     ?>
       <?php
          $this->load->view('inc/footer');
       ?>

        <div class="page-content">
            <?php
              $this->load->view('inc/collapsable_header');
            ?>
            <div class="divider divider-margins"></div>

            <div class="content">
            
            <div class="content-title has-border border-highlight bottom-18">
                    <h3>Todays Due Call</h3>
                    <a href="#" class="color-highlight"><i class="fa fa-chevron-down"></i></a>
            </div>

            <div class="">
                <table id="examplehide" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Customer Name</th>
                            <th>Project</th>
                            <th>Status</th>
                            <th class="hidden"></th>
                            <th>Call</th>
                            <th>Info</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i= 1; 
                      if(count($result)>0){
                         foreach ($result as $data) {
                        $duedate = explode(" ", $data->due_date);
                        $duedate = $duedate[0]; 
                        ?>

                       <tr id="row<?php echo $data->id; ?>" <?php if(strtotime($duedate)<strtotime('today')){?> class="highlight_past" <?php }elseif(strtotime($duedate) == strtotime('today')) {?> class="highlight_now" <?php }elseif(strtotime($duedate)>strtotime('today')){ ?> class="highlight_future" <?php } ?>>
                             <td><?php echo $i; ?></td>
                            <td><?php echo $data->name; ?></td>
                            <td><?php echo $data->project_name; ?></td>
                            <td><?php echo $data->status_name; ?></td>
                            <td class="hidden"><?php echo $data->contact_no1; ?></td>
                             <td><button style="cursor:pointer" onclick="getrowvalue(this)" href="#myModal" data-toggle="modal" data-target="#myModalcall" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                             <td class="hidden"><textarea class="form-control" name="notes" id="previous_callback1" rows="5"  id="comment" readonly><?= $CI->previous_callback_apk($data->id)['previous_callback']?></textarea></td>
                            <td><button style="cursor:pointer" onclick="getrowvalue(this)" href="#myModal" data-toggle="modal" data-target="#myModal" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-info-circle "></i></button></td>

                          
                        </tr>
                        <?php $i++; } }
                        else
                        {
                            echo "<tr><td colspan='6'> No Data Available</td></tr>";
                        }

                        ?>
                         
                    </tbody>

                </table>

            </div>
            <div style="margin-top: 20px">
                <span class="pull-left"><p>Showing <?php echo ($this->uri->segment(2)) ? $this->uri->segment(2)+1 : 1; ?> to <?= ($this->uri->segment(2)+count($result)); ?> of <?= $totalRecords ; ?> entries</p></span>
                <ul class="pagination pull-right"><?php echo $links; ?></ul>
             </div>

        </div>
        </div>
       <!-- Profile -->
       <?php
            $this->load->view('profile');

        ?>
        <div class="menu-hider"></div>
    </div>
   

    <script>
        $(document).ready(function() {
            $('#examplehide').DataTable({
                "sScrollX": true
            });
        });

        function getrowvalue(id){
            var trid=$(id).parents('tr').children();
             $("#customertdname").text($(trid[1]).text());
             $(".custPhoneancor").text($(trid[4]).text());
             $(".custPhonetag").text($(trid[4]).text());
             $(".custPhoneancor").attr("href","tel:+91 "+$(trid[4]).text());
           
        }
    </script>
</body>

<div class="modal fade" id="myModalcall" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
          <p style="margin-bottom: 1px;text-align: center;">Call Now.</p>
          <table>
            <tr>
                <th>Customer</th>
                <th>Number</th>
            </tr>
            <tr>
                <td id="customertdname">abc</td>
                <td class="customertdphone"><a class= "custPhoneancor" href=""><i class="fas fa-phone color-green1-dark"></i></a></td>
            </tr>
          
            </table>
            
        </div>
       
      </div>
      
    </div>
  </div>


  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
          <p style="margin-bottom: 1px;text-align: center;">Notes</p>
          <table>
            <tr>
                <th>Read Previos Note</th>
                <th>Add Notes</th>
            </tr>
            <tr>
                <td class="custPhonetag"><a class= ""><i class="fab fa-readme color-blue-dark"></i></a></td>
                <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#addnotes" class="icon icon-xs icon-circle shadow-huge bg-icon" data-dismiss="modal"><i class="fas fa-plus-circle "></i></button></td>
                
            </tr>
            <tr>
                <td class="custPhonetag"><a class= ""><i class="fab fa-readme color-blue-dark"></i></a></td>
                <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#addnotes" class="icon icon-xs icon-circle shadow-huge bg-icon" data-dismiss="modal"><i class="fas fa-plus-circle "></i></button></td>
            </tr>
            </table>
            
        </div>
       
      </div>
      
    </div>
  </div>


  <div class="modal fade" id="addnotes" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
          <p style="margin-bottom: 1px;text-align: center;">Add Notes</p>
          <table>
          <textarea class="form-control" name="notes">Lorem ipsum</textarea>
            </table>
            
        </div>
       
      </div>
      
    </div>
  </div>
  