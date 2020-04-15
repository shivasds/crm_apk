<?php
$this->load->view('inc/header');
 
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

 <body class="theme-light"  onload="myFunction()" style="margin:0;" data-highlight="blue2">
 <div id="loader"></div>    
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
            <div class="clearfix"></div>
             <style>
                @media screen and (min-width: 768px) {
                  modal_
                  .modal-dialog  {
                    width:900px;
                  }
                }
                .form-group input[type="checkbox"] {
                  display: none;
                }
                .form-group input[type="checkbox"] + .btn-group > label span {
                  width: 20px;
                }
                .form-group input[type="checkbox"] + .btn-group > label span:first-child {
                  display: none;
                }
                .form-group input[type="checkbox"] + .btn-group > label span:last-child {
                  display: inline-block;   
                }
                .form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
                  display: inline-block;
                }
                .form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
                  display: none;   
                }
                tr.highlight_past td.due_date{
                  background-color: #cc6666 !important;
                }
                tr.highlight_now td.due_date{
                  background-color: #e4b13e !important;
                }
                tr.highlight_future td.due_date{
                  background-color: #65dc68 !important;
                }
                #history_table td {
                  border: 1px solid #aaa;
                  padding: 5px
                  }
                  
    
             </style>

           <div class="divider divider-margins"></div>
   
            <div class="content">
                  
                  <div class="content-title has-border border-highlight bottom-18">
                     <label>Callbacks</label>
                       
                  </div>

                  <div class="">
                      <table id="example"class="display" style="width:100%">
                          <thead>
                              <tr>
                                  <th class="hidden">No</th>
                                  <th>Contact Name</th>  
                                  <th>Project</th>
                                  <th>Status</th>   
                                  <th class="hidden">contact</th>
                                  <th class="hidden">id</th>
                                  <th>Call</th>
                                  <th>Info</th>
                              </tr>
                          </thead> 
                          <tbody id="main_body">
                              <?php $i= 1;
                              if ($result) { 
                              if(count($result)>0){
                              foreach ($result as $data) {
                                  $duedate = explode(" ", $data->due_date);
                                  $duedate = $duedate[0]; ?>
                                  <tr id="row<?php echo $i ?>" <?php if(strtotime($duedate)<strtotime('today')){?> class="highlight_past" <?php }elseif(strtotime($duedate) == strtotime('today')) {?> class="highlight_now" <?php }elseif(strtotime($duedate)>strtotime('today')){ ?> class="highlight_future" <?php } ?>>
                                      <td class="hidden"><?php echo $i; ?></td>
                                      <td><?php echo $data->name; ?></td>
                                      <td><?php echo $data->project_name; ?></td>  
                                      <td class="<?php echo $data->status_name; ?>"><?php echo $data->status_name; ?></td> 
                                      <td class="hidden"><?php echo $data->contact_no1; ?></td>
                                      <td  class="hidden" onclick="getrowvalue(this)"><?php echo $data->id; ?></td>
                                     <td><button style="cursor:pointer" onclick="getrowvalue(this)" href="#myModal" data-toggle="modal" data-target="#myModalcall" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                                    <td><button style="cursor:pointer" onclick="getrowvalue(this)" href="#myModal" data-toggle="modal" data-target="#myModal" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-info-circle "></i></button></td>
                                  </tr>
                              <?php $i++; } } }
                                else
                                      {
                                          echo "<tr><td colspan=13 align=center>No Data Found</td></tr>";
                                      }
                                      ?>
                          </tbody>
                      </table>
                      <div style="margin-top: 20px">
                                  <span class="pull-left"><p>Showing <?php echo ($this->uri->segment(2)) ? $this->uri->segment(2)+1 : 1; ?> to <?= ($this->uri->segment(2)+count($result)); ?> of <?= $totalRecords; ?> entries</p></span>
                                    <ul class="pagination pull-right"><?php echo $links; ?></ul> 
                      </div>
                  </div> 
            </div>
       </div>

       <div style="margin-bottom: 60px"></div>
   
        <div class="menu-hider"></div>
      </div>
   

        <script>
            $(document).ready(function() {
                $('#example').DataTable({
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
                <th>Add Notes</th>
            </tr>
            <tr>
            <td><textarea class="form-control" name="notes" rows="5" cols="30" id="previousNotesTxtArea" readonly></textarea></td>
          <td>
                <button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#addnotes" class="icon icon-xs icon-circle shadow-huge bg-icon" data-dismiss="modal">
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
          <form>
           
            <div class="form-row">
               <div class="form-group col-md-6">
                <label for="inputState">Status</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
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
                <div class="form-row">
                  <div class="form-group col-md-12">
                        <label class="label-control">Current Callback</label>
                        <textarea class="form-control" name="current_callback" rows="5" id="current_callback1" name="current_callback1" onkeyup="curr(this.value)" placeholder="Please Update Your Changes To Save"></textarea>
                  </div>
                </div>
             </div>
             <input type="checkbox" name="important" id="fancy-checkbox-warning" autocomplete="off" />
             <div class="btn-group">
                <label for="fancy-checkbox-warning" class="btn btn-default active">
                  Important
                </label>
             </div>
            <button type="submit" class="btn btn-primary">Add</button>
            </form>
            
        </div>
       
      </div>
      
    </div>
  </div>
