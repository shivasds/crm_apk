<?php
$this->load->view('inc/header');

    if(!$this->session->userdata('permissions') && $this->session->userdata('permissions')=='' ) {
    ?>

    <style type="text/css">
        .alrtMsg {
            padding-top: 50px;
        }
        
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

        <body class="theme-light" onload="myFunction()" style="margin:0;" data-highlight="blue2">
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
                                            modal_ .modal-dialog {
                                                width: 900px;
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
                                        
                                        tr.highlight_past td.due_date {
                                            background-color: #cc6666 !important;
                                        }
                                        
                                        tr.highlight_now td.due_date {
                                            background-color: #e4b13e !important;
                                        }
                                        
                                        tr.highlight_future td.due_date {
                                            background-color: #65dc68 !important;
                                        }
                                        
                                        #history_table td {
                                            border: 1px solid #aaa;
                                            padding: 5px
                                        }
                                        /* td, th {
                                            padding: 0;
                                            padding: 9px 18px;
                                        } */
                                    </style>

                                    <div class="divider divider-margins"></div>

                                    <div class="content">

                                        <div class="content-title has-border border-highlight bottom-18">
                                            <label>Callbacks</label>
                                        </div>
                                       

                                        <div class="">
                                            <table id="example" class="display" style="width:100%">
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
                                                        <tr id="row<?php echo $i ?>" <?php if(strtotime($duedate)<strtotime( 'today')){?> class="highlight_past"
                                                            <?php }elseif(strtotime($duedate) == strtotime('today')) {?> class="highlight_now"
                                                                <?php }elseif(strtotime($duedate)>strtotime('today')){ ?> class="highlight_future"
                                                                    <?php } ?>>
                                                                        <td class="hidden">
                                                                            <?php echo $i; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $data->name; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $data->project_name; ?>
                                                                        </td>
                                                                        <td class="<?php echo $data->status_name; ?>">
                                                                            <?php echo $data->status_name; ?>
                                                                        </td>
                                                                        <td class="hidden">
                                                                            <?php echo $data->contact_no1; ?>
                                                                        </td>
                                                                        <td class="hidden" onclick="getrowvalue(this)">
                                                                            <?php echo $data->id; ?>
                                                                        </td>
                                                                        <td>
                                                                            <button style="cursor:pointer" onclick="getrowvalue(this)" href="#myModal" data-toggle="modal" data-target="#myModalcall" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button>
                                                                        </td>
                                                                        <td>
                                                                            <button style="cursor:pointer" onclick="getrowvalue(this)" href="#myModal" data-toggle="modal" data-target="#myModal" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-info-circle "></i></button>
                                                                        </td>
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
                                               <ul class="pagination pull-right">
                                                    <?php echo $links; ?>
                                                </ul>
                                                <!-- <div class="pagination">
                                                    <a href="#" class="shadow-huge"><<</a>
                                                    <a href="#" class="shadow-huge"><</a>
                                                    <a href="#" class="shadow-huge bg-highlight">1</a>
                                                    <a href="#" class="shadow-huge">2</a>
                                                    <a href="#" class="shadow-huge ">3</a>
                                                    <a href="#" class="shadow-huge">></a>
                                                    <a href="#" class="shadow-huge">>></i></a>
                                                </div> -->
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
                        "paging": false, //Dont want paging                
                        "bPaginate": false, //Dont want paging  
                    });

                    // $("#m_status").change(function () {
                    //     $("#dvhiddenshow").removeClass("hidden");
                    // });

                    
                });

                // function status(v){
                       
                //         $(".hidemodal").addClass("hidden")
                //     if('6'==v){
                       
                //         $('#abc').removeClass("hidden")
                //     } else if('5'==v){
                       
                //         $('#hidemodal').removeClass("hidden")
                //     } else if('4'==v){
                       
                //         $('#dead').removeClass("hidden")
                //     } else{
                        
                //         $('#dead').removeClass("hidden")
                //     }
                // }

                function getrowvalue(id) {
                    $("#dvhiddenshow").addClass("hidden");
                    var trid = $(id).parents('tr').children();

                    $("#customertdname").text($(trid[1]).text());
                    $(".custPhoneancor").text($(trid[4]).text());
                    $(".custPhoneancor").attr("href", "tel:+91 " + $(trid[4]).text());
                    $("#c_id").text($(trid[5]).text());
                    //$("#previousNotesTxtArea").text($(trid[7]).text());

                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url()?>dashboard/previous_callback_apk/" + $(trid[5]).text(),
                        data: {
                            callback_id: $(trid[5]).text()
                        },
                        success: function(data) {
                            // alert(data);               
                            $("#previousNotesTxtArea").html(data);

                        }
                    });

                }
            </script>
            <script>
                function hello() {
                    $(".accordion-content").show();
                    $(this).html('<i class="accordion-icon-right fa fa-arrow-up"></i>');

                }

            </script>
        </body>
</html>
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
                                <td class="customertdphone"><a class="custPhoneancor" href=""><i class="fas fa-phone color-green1-dark"></i></a></td>
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
                                <td>
                                    <textarea class="form-control" name="notes" rows="5" cols="30" id="previousNotesTxtArea" readonly></textarea>
                                </td>
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
            <div class="modal-dialog" style="overflow-y: scroll; max-height:85%;  margin-top: 50px; margin-bottom:50px;" >

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="modal-body">
                        <p style="margin-bottom: 1px;text-align: center;">Add Notes</p>
                        <form>

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
                                    
                                
                                <div id="abc" class="hidemodal hidden">
                                            <div class="form-group col-md-6">
                                                <label for="client_name">Client name:</label>
                                                <input type="text" class="form-control" id="c_client_name" name="client_name" placeholder="Client name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email">Client Email Id:</label>
                                                <input type="email" class="form-control" id="c_client_email" name="client_email" placeholder="Client Email Id">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email">Site visit date:</label>
                                                <input type="text" class="form-control" id="c_client_visit" name="email2" placeholder="Site visit date" onchange="update_client_note();">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email">Site Assign by:</label>
                                                <input type="text" class="form-control" onblur="le()" id="c_assign_by" name="assign_by" placeholder="Site Assign by" onchange="update_client_note();">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email">Relation ship Manager:</label>
                                                <input type="text" class="form-control" id="c_relationShipManager" name="c_relationShipManager" placeholder="Relation ship Manager" onchange="update_client_note();">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email">Subject:</label>
                                                <input type="text" class="form-control" id="c_subject" name="email2" value="Thank you For the Site Visit" placeholder="Subject">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="comment">Mail Box:</label>
                                                <textarea class="form-control" name="notesClient" id="c_notesClient" rows="18" id="comment">
                                                    Greetings From Fullbasket Property.

                                                    With reference to your site visit on  assisted by Mr. abhishek from Fullbasket Property, we thank you for giving us an opportunity to serve you in searching your dream home.  At FBP it is our endeavour to help you with all the possible Property options which will suit your requirement. Mr.  from FBP will be at your service. He/she will be there to assist you in searching your dream home.
                                                    
                                                    1. Home search - Assisting and helping you find your dream home suiting your requirements by giving you info on market trends, legalities, site visit assistance etc.

                                                    2. Home loan Assistance - We will take away your pain of running around the banks to get your loan approved by giving doorstep service of bankers of your choice at your place.

                                                    3. Property Purchase Assistance - Ensuring that your home buying becomes a pleasant experience our Relationship Manager will be there throughout the process Of documentation.

                                                    4. Post sales Service – This is what differentiates us from others. We will be there for all possible help and guidance till you move into your home.

                                                    5. Interior Services - We are tied With best interior designers in the city who give the best designs and execute them at a competitive price.


                                                    For any escalations/ complaints please write to admin@leads.com

                                                    Regards
                                                    Team Fullbasket Property Services Pvt Ltd
                                                </textarea>
                                            </div>
                                            <div class="form-group col-md-6" >
                                                <div class="alert alert-success" id="mail_success" style="display:none">
                                                    <strong>Success!</strong> Email sent successfully.
                                                </div>
                                                <button type="button" style="float: right;" class="btn btn-success" onclick="sendMail()" >Send</button>
                                            </div>
                                </div>
                                <div id="dead" class="hidemodal hidden">
                                        <div class="form-group col-md-6">
                                            <label for="comment">Reason of dead:</label>
                                            <select  class="form-control"  id="selectDeadRsn" name="selectDeadRsn" onchange="curr(this.value)">
                                                <option value="">--Select--</option>
                                                <?php $reasonSdata= $this->common_model->getDeadReasons(['status'=>'Y']); 
                                                foreach( $reasonSdata as $rData){ ?>
                                                    <option value="<?php echo $rData['name']; ?>"><?php echo $rData['name'] ?></option>
                                                <?php } ?> 
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="comment">Reason of dead:</label>
                                            <textarea class="form-control reasonOfDead" name="notes" id="notes" rows="3" ></textarea>
                                        </div>
                                </div>
                                <div id="hidemodal" class="hidemodal hidden">
                                    <div class="form-group col-md-6">
                                        <label for="email">Advisor one:</label>
                                        <select  class="form-control"  id="c_seniorAdvisor" name="c_seniorAdvisor" required="required" >
                                            <option value="">Select</option>
                                            <?php $all_user= $this->user_model->all_users("type in (1,2)"); 
                                            foreach( $all_user as $user){ 
                                                switch ($user->type) {
                                                    case '1':
                                                        $role = "User";
                                                        break;

                                                    case '2':
                                                        $role = "Manager";
                                                        break;

                                                }
                                                ?>
                                                <option value="<?php echo $user->id ?>"><?php echo $user->first_name." ".$user->last_name." ($role)"; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Advisor two:</label>
                                        <select  class="form-control"  id="c_secondAdvisor" name="c_secondAdvisor" required="required" >
                                            <option value="">Select</option>
                                            <?php $all_user= $this->user_model->all_users("type in (1,2)"); 
                                            foreach( $all_user as $user){ 
                                                switch ($user->type) {
                                                    case '1':
                                                        $role = "User";
                                                        break;

                                                    case '2':
                                                        $role = "Manager";
                                                        break;

                                                }
                                                ?>
                                                <option value="<?php echo $user->id ?>"><?php echo $user->first_name." ".$user->last_name." ($role)"; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Booking Name:</label>
                                        <input type="text" class="form-control" id="c_bkngName" name="email2" placeholder="Booking Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Booking Month:</label>
                                        <input type="text" class="form-control sdate-picker" id="c_bkngMnth" name="email2" placeholder="Booking Date">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Date of closure:</label>
                                        <input type="text" class="form-control datepicker" id="c_dateofClosure" name="email2" placeholder="Date of closure">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Unit Number:</label>
                                        <input type="text" class="form-control" id="c_customerName" name="email2" placeholder="Unit Number">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Project:</label>
                                        <select  class="form-control"  id="c_projectName" name="m_project" required="required" >
                                            <option value="">Select</option>
                                            <?php $projects= $this->common_model->all_active_projects(); 
                                            foreach( $projects as $project){ ?>
                                                <option value="<?php echo $project->id ?>"><?php echo $project->name ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Sqft Sold:</label>
                                        <input type="text" class="form-control" onblur="calculateTotalCost()" id="c_sqftSold" name="email2" placeholder="Sqft Sold">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">PLC Charges:</label>
                                        <input type="text" class="form-control"  onblur="calculateTotalCost()" id="c_plcCharge" name="email2" placeholder="PLC charges">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Floor Rise:</label>
                                        <input type="text" class="form-control"  onblur="calculateTotalCost()" id="c_floorRise" name="email2" placeholder="Floor Rise">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Basic Cost:</label>
                                        <input type="text" class="form-control"  onblur="calculateTotalCost()" id="c_basicCost" name="email2" placeholder="Basic Cost">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Other Cost:</label>
                                        <input type="text" class="form-control"  onblur="calculateTotalCost()" id="c_otherCost" name="email2" placeholder="Other Cost">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Car Park:</label>
                                        <input type="text" class="form-control"  onblur="calculateTotalCost()" id="c_carPark" name="email2" placeholder="Car Park">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Total Cost:</label>
                                        <input type="text" class="form-control"   id="c_totalCost" name="email2" placeholder="Total Cost">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email">Commission(%):</label>
                                        <input type="text" class="form-control" onblur="calculateGrossRevenue()"  id="c_comission" name="email2" placeholder="Commission">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email">Gross Revenue:</label>
                                        <input type="text" class="form-control" id="c_grossRevenue" name="email2" placeholder="Gros Revenue">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Cashback:</label>
                                        <input type="text" class="form-control" onblur="calculateNetRevenue()"  id="c_cashBack" name="email2" placeholder="Cash Back">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Sub broker amount:</label>
                                        <input type="text" class="form-control" onblur="calculateNetRevenue()"  id="c_subBrokerAmo" name="email2" placeholder="Sub Broker amount">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Net Revenue:</label>
                                        <input type="text" class="form-control" id="c_netRevenue" name="email2" placeholder="Net Revenue">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Share of advisor 1:</label>
                                        <input type="text" class="form-control" onblur="calculateAdvisorShare(2)" id="c_shareAdvisor1" name="email2" placeholder="Share of advisor 1">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Share of advisor 2:</label>
                                        <input type="text" class="form-control" onblur="calculateAdvisorShare(1)" id="c_shareAdvisor2" name="email2" placeholder="Share of advisor 2">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email">Estimated month of invoice:</label>
                                        <input type="text" class="form-control" id="c_estMonthofInvoice" name="email2" placeholder="Estimated month of invoice">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email">Agreement Status:</label>
                                        <input type="text" class="form-control" id="c_agrmntStatus" name="email2" placeholder="Agreement Status">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email">Project Type:</label>
                                        <input type="text" class="form-control" id="c_projectType" name="email2" placeholder="Project Type">
                                    </div>
                                </div>
                            </div>         
                            

                                
                                    <div class="form-group col-md-6">
                                        <label class="label-control">Current Callback</label>
                                        <textarea class="form-control" name="current_callback" rows="5" id="current_callback1" name="current_callback1" onkeyup="curr(this.value)" placeholder="Please Update Your Changes To Save"></textarea>
                                    </div>

                                    <div class="form-group col-md-6 showall" onclick="hello()">

                                        <a class="accordion-toggle-last">
                                            <i class="accordion-icon-left fa fa-users  color-blue2-dark"></i> Reassign Another
                                            <i class="accordion-icon-right fa fa-arrow-down"></i>
                                        </a>

                                        <div id="accordion-content-6" class="accordion-content mt-5 bottom-10">
                                            <input type="datetime-local" id="birthdaytime" name="birthdaytime">

                                        </div>
                                   </div>
                              

                             <div class="col-md-6">
                                <div class="form-group col-md-2">
                                    <span onclick="favorite(this)" class="star glyphicon glyphicon-star-empty"></span>
                                </div>
                                <div class="form-group col-md-10">
                                    <p class="text-muted">Mark as Important</p>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>

                    </div>

                </div>

            </div>
        </div>
        <script type="text/javascript">
                $(function(){
        $('#site_visit_data .sbmit').on('click', function() {
            var data = {
                'callback_id':$('#mhid').val(),
                'extrxDataIds' : ($('#extraDataIds').val()) ? $('#extraDataIds').val() : 0,
            };
            if($('#fancy-checkbox-default1').is(':checked')){
                data.sitevisitdone              = 1;
                data.sitevisitdone_date         = $("#sitevisitdoneDate1").val();
                data.sitevisitdone_project_id   = $("#sitevisitdone_project1").val();
            }
            if($('#fancy-checkbox-default_notdone1').is(':checked')){
                data.sitevisitnotdone   = 1;
                data.notdone_date       = $("#notdoneDate1").val();
                data.notdone_reason     = $("#notdone_reason1").val();
            }
            
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url()?>admin/post_sitevisit_data",
                data : data,
                success: function(res){
                    var result = JSON.parse(res);
                    if(result.code == 1){
                        $('#site_visit_data .ErrMsg').html('<p class="alert alert-success">Success. Please wait...</p>');
                        setTimeout(function(){
                            location.reload();
                        },1500);                        
                    }
                    else
                        $('#site_visit_data .ErrMsg').html('<p class="alert alert-danger">Select any one option!</p>');

                }
            });
            return false;
        });

        $('#fancy-checkbox-default1').on('click', function(){
            if($(this).is(':checked')) {
                $('#siteVisitDone_div').show();
                $('#fancy-checkbox-default_notdone1').prop('checked', false);
                $('#siteVisitNotDone_div').hide();
            }
            else {
                $(this).prop('checked', false);
                $('#siteVisitDone_div').hide();
            }
        });

        $('#fancy-checkbox-default_notdone1').on('click', function(){
            if($(this).is(':checked')) {
                $('#siteVisitNotDone_div').show();
                $('#fancy-checkbox-default1').prop('checked', false);
                $('#siteVisitDone_div').hide();
            }
            else {
                $(this).prop('checked', false);
                $('#siteVisitNotDone_div').hide();
            }
        });

        $('#fancy-checkbox-default').on('click', function(){
            if($(this).is(':checked')) {
                $('#siteVisitDone').slideDown();
                $('#fancy-checkbox-primary').prop('checked', false);
                $('#siteVisitDate').slideUp();
                $('#fancy-checkbox-default_notdone').prop('checked', false);
                $('#siteVisitNotDone').slideUp();
            }
            else {
                $(this).prop('checked', false);
                $('#siteVisitDone').slideUp();
            }
        });

        $('#fancy-checkbox-primary').on('click', function(){
            if($(this).is(':checked')) {
                $('#siteVisitDate').slideDown();
                $('#fancy-checkbox-default').prop('checked', false);
                $('#siteVisitDone').slideUp();  
                $('#fancy-checkbox-default_notdone').prop('checked', false);
                $('#siteVisitNotDone').slideUp();   
            }
            else {
                $(this).prop('checked', false);
                $('#siteVisitDate').slideUp();
            }   
        });

        $('#fancy-checkbox-default_notdone').on('click', function(){
            if($(this).is(':checked')) {
                $('#siteVisitNotDone').slideDown();
                $('#fancy-checkbox-default').prop('checked', false);
                $('#siteVisitDone').slideUp();
                $('#fancy-checkbox-primary').prop('checked', false);
                $('#siteVisitDate').slideUp();  
            }
            else {
                $(this).prop('checked', false);
                $('#siteVisitNotDone').slideUp();
            }                   
        });
            
    })


    function curr(v){       
        //if(v.length){
        var stsId = $('#m_status').val();
        var error = 1;
        if(stsId == 4) {
            if($('#current_callback1').val().length && $('#selectDeadRsn').val().length)
                error = 0;
            else
                error = 1
        }
        else{
            if($('#current_callback1').val().length >= 10)
                error = 0;
            else
                error = 1;
        }

        if(!error){
            $('#save').prop('disabled', false);
        }
        else{
            $('#save').prop('disabled', true);
        }
    }
    var notesClient = "Greetings From Fullbasket Property.\n\nWith reference to your site visit on {site_visit_date} assisted by Mr. {site_assigned_by} from Fullbasket Property, we thank you for giving us an opportunity to serve you in searching your dream home.  At FBP it is our endeavour to help you with all the possible Property options which will suit your requirement. Mr. {relationship_manager} from FBP will be at your service. He/she will be there to assist you in searching your dream home.\n\n1. Home search - Assisting and helping you find your dream home suiting your requirements by giving you info on market trends, legalities, site visit assistance etc.\n\n2. Home loan Assistance - We will take away your pain of running around the banks to get your loan approved by giving doorstep service of bankers of your choice at your place.\n\n3. Property Purchase Assistance - Ensuring that your home buying becomes a pleasant experience our Relationship Manager will be there throughout the process Of documentation.\n\n4. Post sales Service – This is what differentiates us from others. We will be there for all possible help and guidance till you move into your home.\n\n5. Interior Services - We are tied With best interior designers in the city who give the best designs and execute them at a competitive price.\n\n\nFor any escalations/ complaints please write to admin@leads.com\n\nRegards\n\nTeam Fullbasket Property Services Pvt Ltd";

    function update_client_note(){
        var site_visit_date = $("#c_client_visit").val();
        var site_assigned_by = $("#c_assign_by").val();
        var relationship_manager = $("#c_relationShipManager").val();
        var newNote = notesClient.replace("{site_visit_date}",site_visit_date).replace("{site_assigned_by}",site_assigned_by).replace("{relationship_manager}",relationship_manager);
        $("#c_notesClient").html(newNote);
    }
    function update_callback_details(){

        if($("#m_status").val()=="Close"){
            if($("#c_seniorAdvisor").val()==""){
                $("#c_seniorAdvisor").focus();
                return false;
            }
            if($("#c_secondAdvisor").val()==""){
                $("#c_secondAdvisor").focus();
                return false;
            }
            if($("#c_bkngName").val()==""){
                $("#c_bkngName").focus();
                return false;
            }
            if($("#c_bkngMnth").val()==""){
                $("#c_bkngMnth").focus();
                return false;
            }
            if($("#c_dateofClosure").val()==""){
                $("#c_dateofClosure").focus();
                return false;
            }
            if($("#c_customerName").val()==""){
                $("#c_customerName").focus();
                return false;
            }
            if($("#c_projectName").val()==""){
                $("#c_projectName").focus();
                return false;
            }
            if($("#c_sqftSold").val()==""){
                $("#c_sqftSold").focus();
                return false;
            }
            if($("#c_plcCharge").val()==""){
                $("#c_plcCharge").focus();
                return false;
            }
            if($("#c_floorRise").val()==""){
                $("#c_floorRise").focus();
                return false;
            }
            if($("#c_basicCost").val()==""){
                $("#c_basicCost").focus();
                return false;
            }
            if($("#c_otherCost").val()==""){
                $("#c_otherCost").focus();
                return false;
            }
            if($("#c_carPark").val()==""){
                $("#c_carPark").focus();
                return false;
            }
            if($("#c_totalCost").val()==""){
                $("#c_totalCost").focus();
                return false;
            }
            if($("#c_comission").val()==""){
                $("#c_comission").focus();
                return false;
            }
            if($("#c_grossRevenue").val()==""){
                $("#c_grossRevenue").focus();
                return false;
            }
            if($("#c_cashBack").val()==""){
                $("#c_cashBack").focus();
                return false;
            }
            if($("#c_subBrokerAmo").val()==""){
                $("#c_subBrokerAmo").focus();
                return false;
            }
            if($("#c_netRevenue").val()==""){
                $("#c_netRevenue").focus();
                return false;
            }
            if($("#c_shareAdvisor1").val()==""){
                $("#c_shareAdvisor1").focus();
                return false;
            }
            if($("#c_shareAdvisor2").val()==""){
                $("#c_shareAdvisor2").focus();
                return false;
            }
            if($("#c_estMonthofInvoice").val()==""){
                $("#c_estMonthofInvoice").focus();
                return false;
            }
            if($("#c_agrmntStatus").val()==""){
                $("#c_agrmntStatus").focus();
                return false;
            }
            if($("#c_projectType").val()==""){
                $("#c_projectType").focus();
                return false;
            }

        }
        if($('#fancy-checkbox-primary').is(':checked')){
            if($("#sitevisit_date").val()==""){
                $("#sitevisit_date").focus();
                return false;
            }
            if($("#sitevisit_project").val()==null){
                $("#sitevisit_project").focus();
                return false;
            }
        }
        if($('#fancy-checkbox-default').is(':checked')){
            if($("#sitevisitdone_date").val()==""){
                $("#sitevisitdone_date").focus();
                return false;
            }
            if($("#sitevisitdone_project").val()==null){
                $("#sitevisitdone_project").focus();
                return false;
            }
        }
        if($('#fancy-checkbox-danger').is(':checked')){
            if($("#facetoface_date").val()==""){
                $("#facetoface_date").focus();
                return false;
            }
            if($("#facetoface_project").val()==null){
                $("#facetoface_project").focus();
                return false;
            }
        }
        $(".se-pre-con").show();
        var data = {
            'extrxDataIds' : ($('#extraDataIds').val()) ? $('#extraDataIds').val() : 0,
            'callback_id':$('#mhid').val(),
            'status_id':$('#m_status').val(),
            'advisor1_id':$('#c_seniorAdvisor').val(),
            'advisor2_id':$('#c_secondAdvisor').val(),
            'booking':$("#c_bkngName").val(),
            'booking_month':$("#c_bkngMnth").val(),
            'closure_date':$("#c_dateofClosure").val(),
            'customer':$('#c_customerName').val(),
            'sub_source_id':$("#c_subSource").val(),
            'close_project_id':$("#c_projectName").val(),
            'sqft_sold':$("#c_sqftSold").val(),
            'plc_charge':$("#c_plcCharge").val(),
            'floor_rise':$("#c_floorRise").val(),
            'basic_cost':$("#c_basicCost").val(),
            'other_cost':$("#c_otherCost").val(),
            'car_park':$('#c_carPark').val(),
            'total_cost':$('#c_totalCost').val(),
            'commission':$('#c_comission').val(),
            'gross_revenue':$('#c_grossRevenue').val(),
            'cash_back':$('#c_cashBack').val(),
            'sub_broker_amo':$('#c_subBrokerAmo').val(),
            'net_revenue':$('#c_netRevenue').val(),
            'share_of_advisor1':$('#c_shareAdvisor1').val(),
            'share_of_advisor2':$('#c_shareAdvisor2').val(),
            'est_month_of_invoice':$('#c_estMonthofInvoice').val(),
            'agreement_status':$('#c_agrmntStatus').val(),
            'project_type':$('#c_projectType').val(),

            'reason_for_dead':$('.reasonOfDead').val(),
            'reason_cause':$('#selectDeadRsn').val(),
            
            'current_callback':$('#current_callback1').val(),

            'name':$('#m_name1').val(),
            'due_date':$('#reassign_date').val()?$('#reassign_date').val()+' '+($('#reassign_time').val()?$('#reassign_time').val():'00:00'):null,
            'dept_id':$("#m_dept").val(),
            'contact_no1':$("#m_contact_no1").val(),
            'contact_no2':$("#m_contact_no2").val(),
            'callback_type_id':$("#m_callback_type").val(),
            'email1':$("#m_email1").val(),
            'email2':$("#m_email2").val(),
            'project_id':$("#m_project").val(),
            'leadid':$("#m_leadId").val()
        };
        if($("#m_lead_source").val())
            data.lead_source_id = $("#m_lead_source").val();
        if($("#hidden_user_id").val() != $("#m_user_name").val())
            data.user_id = $("#m_user_name").val();
        if($('#fancy-checkbox-primary').is(':checked')){
            data.sitevisit = 1;
            data.sitevisit_date = $("#sitevisit_date").val();
            data.sitevisit_project_id = $("#sitevisit_project").val();
        }
        if($('#fancy-checkbox-default').is(':checked')){
            data.sitevisitdone = 1;
            data.sitevisitdone_date = $("#sitevisitdone_date").val();
            data.sitevisitdone_project_id = $("#sitevisitdone_project").val();
        }
        if($('#fancy-checkbox-default_notdone').is(':checked')){
            data.sitevisitnotdone = 1;
            data.notdone_date       = $("#notdone_date").val();
            data.notdone_reason     = $("#notdone_reason").val();
        }

        if($('#fancy-checkbox-danger').is(':checked')){
            data.facetoface_date = $("#facetoface_date").val();
            data.facetoface_project_id = $("#facetoface_project").val();
        }
        if($('#fancy-checkbox-warning').is(':checked')){
            data.important = 1;
        }
        if($("#hidden_user_id").val() == $("#m_user_name").val())
            data.current_user_id = $("#m_user_name").val();
        
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>admin/update_callback_details",
            data:data,
            success:function(data){
               alert('Data saved Success.');
              opener.location.reload();
              window.top.close();
            }
        });
    }

  function status(v){
                       
                        $(".hidemodal").addClass("hidden")
                    if('6'==v){
                       
                        $('#abc').removeClass("hidden")
                    } else if('5'==v){
                       
                        $('#hidemodal').removeClass("hidden")
                    } else if('4'==v){
                       
                        $('#dead').removeClass("hidden")
                    } else{
                        
                        $('#dead').removeClass("hidden")
                    }
                }

    function reassignDate(){
        $('#reDate').toggle();
    }

    function showSiteVisitFixDiv(){
        $('#siteVisitDate').toggle();
    }

    function showSiteVisitDoneDiv(){
        $('#siteVisitDone').toggle();
    }

    function showFacetoFaceDiv(){
        $('#facetoFace').toggle();
    }

    function clientEmail(){
        $('#clientEmail').toggle();
    }
    
    function le(){
        var b =$('#assign_by').val();
        var a=$('#notesClient').text();
        var n = a.indexOf("On");
        n=n+3;
        var output = [a.slice(0, n), b, a.slice(n)].join('');
        $('#notesClient').text(output );
    }

    function calculateTotalCost(){
        var sold=$('#c_sqftSold').val();
        var plc=$('#c_plcCharge').val();
        var basic=$('#c_basicCost').val();
        var other=$('#c_otherCost').val();
        var car=$('#c_carPark').val();
        var flood=$('#c_floorRise').val();

        if(!sold) sold=0;
        if(!plc) plc=0;
        if(!basic) basic=0;
        if(!other) other=0;
        if(!car) car=0;
        if(!flood) flood=0;

        sold=parseFloat(sold);
        plc=parseFloat(plc);
        basic=parseFloat(basic);
        other=parseFloat(other);
        car=parseFloat(car);
        flood=parseFloat(flood);
        var total=(basic*sold)+plc+flood+other+car;
        $('#c_totalCost').val(total);
    }

    function calculateGrossRevenue(){
        var total_cost=$('#c_totalCost').val();
        var c_comission=$('#c_comission').val();
        c_comission=parseFloat(c_comission);
        total_cost=parseFloat(total_cost);

        if(!c_comission){c_comission=0;}
        if(!total_cost){total_cost=0;}

        var c_grossRevenue=(total_cost * c_comission)/100;
        $('#c_grossRevenue').val(c_grossRevenue);
    }

    function calculateNetRevenue(){
        var cashback=$('#c_cashBack').val();
        var subbroker=$('#c_subBrokerAmo').val();
        var c_grossRevenue=$('#c_grossRevenue').val();
        if(!cashback){cashback=0;}
        if(!subbroker){subbroker=0;}

        c_grossRevenue=parseFloat(c_grossRevenue);
        subbroker=parseFloat(subbroker);
        var revenue=c_grossRevenue - cashback - subbroker;
        $('#c_netRevenue').val(revenue);
    }

    function calculateAdvisorShare(id){
        if(id==1){
            var c_shareAdvisor2=$('#c_shareAdvisor2').val();
            $('#c_shareAdvisor1').val(100-c_shareAdvisor2);
        }
        else if(id==2){
            var c_shareAdvisor1=$('#c_shareAdvisor1').val();
            $('#c_shareAdvisor2').val(100-c_shareAdvisor1);
        }
    }

    function sendMail(){
        if($("#c_client_name").val() == ""){
            alert("Please enter client name");
            $("#c_client_name").focus();
            return false;
        }
        if($("#c_client_email").val() == ""){
            alert("Please enter client email");
            $("#c_client_email").focus();
            return false;
        }
        if($("#c_client_visit").val() == ""){
            alert("Please enter Site visit date");
            $("#c_client_visit").focus();
            return false;
        }
        if($("#c_assign_by").val() == ""){
            alert("Please enter Site assign by");
            $("#c_assign_by").focus();
            return false;
        }
        if($("#c_subject").val() == ""){
            alert("Subject cannot be empty");
            $("#c_subject").focus();
            return false;
        }
        if($("#c_relationShipManager").val() == ""){
            alert("Please enter Relation ship manager name");
            $("#c_relationShipManager").focus();
            return false;
        }
        if($("#c_notesClient").val() == ""){
            alert("Mail message cannot be empty");
            $("#c_notesClient").focus();
            return false;
        }
        $(".se-pre-con").show();
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>admin/send_mail/site-visit",
            data:{
                client_name:$("#c_client_name").val(),
                client_email:$("#c_client_email").val(),
                client_visit:$("#c_client_visit").val(),
                assign_by:$("#c_assign_by").val(),
                subject:$("#c_subject").val(),
                relationship_manager:$("#c_relationShipManager").val(),
                message:$("#c_notesClient").val(),
                callback_id:$("#mhid").val()
            },
            success:function(data) {
                if(data.success){
                    $("#mail_success").show();
                }
                $(".se-pre-con").hide("slow");
            }
        });
    }

    function sendRegMail(){
        if($("#client_email_id").val() == ""){
            alert("Please enter client email");
            $("#client_email_id").focus();
            return false;
        }
        if($("#client_email_subject").val() == ""){
            alert("Please enter email subject");
            $("#client_email_subject").focus();
            return false;
        }
        if($("#client_email_body").val() == ""){
            alert("Please enter email body");
            $("#client_email_body").focus();
            return false;
        }
        $(".se-pre-con").show();
        $.ajax({
            type:"POST",
            url: "<?php echo base_url()?>admin/send_mail/client-reg",
            data:{
                client_email:$("#client_email_id").val(),
                message:$("#client_email_body").val(),
                subject:$("#client_email_subject").val(),
                callback_id:$("#mhid").val()
            },
            success:function(data) {
                console.log(data.success);
                if(data.success){
                    $("#regmail_success").show();
                }
                $(".se-pre-con").hide("slow");
            }
        });
    }
</script>
        </script>