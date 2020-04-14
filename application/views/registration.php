<?php
$this->load->view('inc/header');

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
                padding: 9px 6px;
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
                          <h3>Callbacks</h3>
                          <a href="#" class="color-highlight"><i class="fa fa-chevron-down"></i></a>
                  </div>

                  <div class="">
                      <table id="example"class="display" style="width:100%">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Contact Name</th>  
                                  <th>Project</th>
                                  <th>Status</th>    
                                  <th>Register</th> 
                              </tr>
                          </thead> 
                          <tbody id="main_body">
                              <?php $i= 1;
                              if ($result) { 

                              if(count($result)>0){
                              foreach ($result as $data) {
                                  $duedate = explode(" ", $data->due_date);
                                  $duedate = $duedate[0];  
                                  ?>
                                  <tr id="row<?php echo $i ?>" <?php if(strtotime($duedate)<strtotime('today')){?> class="highlight_past" <?php }elseif(strtotime($duedate) == strtotime('today')) {?> class="highlight_now" <?php }elseif(strtotime($duedate)>strtotime('today')){ ?> class="highlight_future" <?php } ?>>
                                      <td><?php echo $i; ?></td>
                                      <td><?php echo $data->name; ?></td>
                                      <!-- <td><?php echo $data->contact_no1 ?></td>  -->
                                      <td><?php echo $data->project_name; ?></td>  
                                      <td><?php echo $data->status_name; ?></td> 
                                      <td class="hidden"><?php echo $data->contact_no1; ?></td>
                                     
                                  </tr>
                              <?php $i++; } 
                          } }
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
           
               <div class="col-md-6 form-group">
                       <!--  <input type="checkbox" name="fancy-checkbox-info" onclick="clientEmail()"  id="fancy-checkbox-info" autocomplete="off" />
                        <div class="btn-group">
                            <label for="fancy-checkbox-info" class="btn btn-info">
                                <span class="glyphicon glyphicon-ok"></span>
                                <span> </span>
                            </label>
                            <label for="fancy-checkbox-info" class="btn btn-default active">
                               Client Registration Email
                            </label>
                        </div> -->
                        <div id="clientEmail" hidden>
                            <div class="col-sm-12 form-group">
                                <label for="email_id">Email Id:</label>
                                <input type="email" class="form-control" id="client_email_id" name="email_id" placeholder="Email Id">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="subject">Subject:</label>
                                <input type="text" class="form-control" id="client_email_subject" name="subject" value="Client Registration" placeholder="Subject">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for="comment">Email Body:</label>
                                <textarea class="form-control" name="notes" id="client_email_body" rows="15" id="comment">          
Dear sir / madam,

Greetings From Fullbasket Property...

Kindly register the below client For __________________ project On behalf Of Fullbasket Property 

Property & acknowledge.

Client Name : ________________

Contact No. : ________________

E-mail ID   : ________________

Thanks & Regards
Team Fullbasket Property
                                </textarea>
                            </div>
                            <div class="col-sm-12 form-group">
                                <div class="alert alert-success" id="regmail_success" style="display:none">
                                    <strong>Success!</strong> Email sent successfully.
                                </div>
                                <button type="button" onclick="sendRegMail()" class="btn btn-success">Send</button>
                            </div>
                        </div>
                    </div> 
            </div>
            <div class="clearfix"></div>

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
            $('#example').DataTable({
                pagingType: "simple",
                //"sScrollY": "200px",
                "sScrollX": true
            });
        });
    </script>
</body>

  <div class="modal fade" id="myModalcall" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
          <p  style="margin-bottom: 8px; text-align: center;">Call Now.</p>
          <table>
            <tr>
                <th>Customer</th>
                <th>Number</th>
            </tr>
            <tr>
                <td>abc</td>
                <td><a href="tel:+91 1234567898"><i class="fas fa-phone color-green1-dark"></i></a></td>
            </tr>
            <tr>
                <td>abc</td>
                <td><a href="tel:+91 1234567898"><i class="fas fa-phone color-green1-dark"></i></a></td>
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
          <p style="margin-bottom: 8px; text-align: center;">Notes</p>
          <table>
            <tr>
                <th>Read Previos Note</th>
                <th>Add Notes</th>
            </tr>
            <tr>
                <td><a><i class="fab fa-readme color-blue-dark"></i></a></td>
                <td><a><i class="fas fa-plus-circle color-green1-dark"></i></a></td>
            </tr>
            <tr>
                <td><a><i class="fab fa-readme color-blue-dark"></i></a></td>
                <td><a><i class="fas fa-plus-circle color-green1-dark"></i></a></td>
            </tr>
          </table>
            
        </div>
       
      </div>
      
    </div>
  </div>