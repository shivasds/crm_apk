<?php
$this->load->view('inc/header');
// $CI=&get_instance();
 
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
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>styles/framework.css">

<body class="theme-light" data-highlight="blue2">
    <div id="page">
      <?php
        $this->load->view('inc/fixed_header');
     ?>
       <?php
          $this->load->view('inc/footer');
       ?>
    <!-- Profile -->
    <?php
         $this->load->view('profile');

        ?>
        <div class="page-content">
            <?php
              $this->load->view('inc/collapsable_header');
            ?>
            <div class="divider divider-margins"></div>

            <div class="content">
            
            <div class="content-title has-border border-highlight bottom-18">
                    <h3>Todays Due Call</h3>
                   
            </div>

            <div class="">
                <table id="table_viewCallback" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th class="hidden">S.No</th>
                            <th>Customer Name</th>
                            <th>Project</th>
                            <th>Status</th>
                            <th class="hidden">contact</th>
                            <th class="hidden">id</th>
                            <th>Call</th>
                            <th class="hidden">previous_callback</th>
                            <th >Info</th>
                            
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
                            <td class="hidden"><?php echo $i; ?></td>
                            <td><?php echo $data->name; ?></td>
                            <td><?php echo $data->project_name; ?></td>
                            <td class="<?php echo $data->status_name; ?>"><?php echo $data->status_name; ?></td>
                            <td class="hidden"><?php echo $data->contact_no1; ?></td>
                            <td  class="hidden" onclick="getrowvalue(this)"><?php echo $data->id; ?></td>
                             <td><button style="cursor:pointer" onclick="getrowvalue(this)" href="#myModal" data-toggle="modal" data-target="#myModalcall" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                              <td class="hidden"></td>
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
        <div style="margin-bottom: 60px">
     
        <div class="menu-hider"></div>
    </div>
   

    <script>
        $(document).ready(function() {
            $('#table_viewCallback').DataTable({
                "sScrollX": true,
                "bInfo": false, //Dont display info e.g. "Showing 1 to 4 of 4 entries"
                "paging": false,//Dont want paging                
                "bPaginate": false,//Dont want paging  
            });
        });

        function getrowvalue(id){
            var trid=$(id).parents('tr').children();

             $("#customertdname").text($(trid[1]).text());
             $(".custPhoneancor").text($(trid[4]).text());
             $(".custPhoneancor").attr("href","tel:+91 "+$(trid[4]).text());
             $("#c_id").text($(trid[5]).text());
             //$("#previousNotesTxtArea").text($(trid[7]).text());

            $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>dashboard/previous_callback_apk/"+$(trid[5]).text(),
            data:{ 
                callback_id:$(trid[5]).text()
            },
            success:function(data) {
               // alert(data);               
                   $("#previousNotesTxtArea").html(data);
                
            }
        }); 
           
        }

        function getmodeltablevalue(id)
        {
            var traid=$(id).parents('tr').children();
            $(".addnotesmodalbtn").attr('id',$("#c_id").text());
            $("#addnotesdivid").val($("#c_id").text());
        }
    </script>

    <script>
          function hello(){
                $(".accordion-content").show();
                $(this).html('<i class="accordion-icon-right fa fa-arrow-up"></i>');
          
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
                <th class="hidden">id</th>
                <th>Add Notes</th>
            </tr>
            <tr>
            <td><textarea class="form-control" name="notes" rows="5" cols="30" id="previousNotesTxtArea" readonly></textarea></td>
            <td class="hidden">
                <div id="c_id"></div>
            </td>

            <td>
                <button style="cursor:pointer" onclick="getmodeltablevalue(this)" href="#myModal" data-toggle="modal" data-target="#addnotes" class="icon icon-xs icon-circle shadow-huge bg-icon" data-dismiss="modal">
                   <i class="fas fa-plus-circle "></i>
                </button>
            </td>
        
                
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
          <form method="post" action="<?=base_url('update_callback_details');?>" name="callback_details" autocomplete="off">
           
            <div class="form-row">
               <div class="form-group col-md-6">
                    <label for="inputState">Status</label>
                    <select  class="form-control"  id="m_status" onchange="status(this.value)" name="status_id" required="required">
                        <option value="">Select</option>
                        <?php $statuses= $this->common_model->all_active_statuses(); 
                        foreach( $statuses as $status){ ?>
                            <option value="<?php echo $status->id; ?>"><?php echo $status->name ?></option>
                        <?php } ?>           
                    </select>
                </div>
                <div class="form-group col-md-6 showall" onclick="hello()">
               
                  <a class="accordion-toggle-last">
                    <i class="accordion-icon-left fa fa-users  color-blue2-dark"></i>
                      Reassign Another
                    <i class="accordion-icon-right fa fa-arrow-down"></i>
                    </a>

                    <div id="accordion-content-6" class="accordion-content mt-5 bottom-10">
                       <input type="datetime-local" id="birthdaytime" name="birthdaytime">
                       
                    </div>
                 </div>

               
               
            </div>
            <div class="form-row hidden">
                <div class="form-group col-md-12">
                        <label class="label-control">id</label>
                        <input  id="addnotesdivid" name="idoftable" >
                </div>
            </div> 
            <div class="form-row">
                <div class="form-group col-md-12">
                        <label class="label-control">Current Callback</label>
                        <textarea class="form-control" name="current_callback" rows="5" id="current_callback1" name="current_callback1" onkeyup="curr(this.value)" placeholder="Please Update Your Changes To Save"></textarea>
                </div>
            </div>

                        <input type="checkbox" name="important" id="fancy-checkbox-warning" autocomplete="off" />
                            <div class="btn-group">
                                
                                <label for="fancy-checkbox-warning" class="btn btn-default active">
                                   Important
                                </label>
                            </div>
            <button type="submit" id="" class="btn btn-primary addnotesmodalbtn">Add</button>
            </form>
            
        </div>
       
      </div>
      
    </div>
  </div>
