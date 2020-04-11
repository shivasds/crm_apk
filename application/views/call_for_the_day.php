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
                        <h3>Todays Call</h3>
                        <p class="bottom-25">
                        Want to Call Back ..
                    </p>
                        <a href="#" class="color-highlight"><i class="fa fa-chevron-down"></i></a>
                </div>

                <div class="">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Project</th>
                                <th>Status</th>
                                <th>Call</th>
                                <th>Info</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                    <td>Airi Satou</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModalcall" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                                    <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModal" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                            
                                
                                </tr>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModalcall" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                                <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModal" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                            
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModalcall" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                                <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModal" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                            
                                
                            </tr>
                            <tr>
                                <td>Ashton Cox</td>
                                <td>Junior Technical Author</td>
                                <td>San Francisco</td>
                                <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModalcall" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                                <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModal" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                            
                            
                            </tr>
                            <tr>
                                <td>Cedric Kelly</td>
                                <td>Senior Javascript Developer</td>
                                <td>Edinburgh</td>
                                <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModalcall" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                                <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModal" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                            
                            </tr>
                        
                            <tr>
                                <td>Brielle Williamson</td>
                                <td>Integration Specialist</td>
                                <td>New York</td>
                                <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModalcall" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                                <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModal" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                            
                            
                            </tr>
                            <tr>
                                <td>Herrod Chandler</td>
                                <td>Sales Assistant</td>
                                <td>San Francisco</td>
                                <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModalcall" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                                <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModal" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                            
                            </tr>
                            <tr>
                                <td>Rhona Davidson</td>
                                <td>Integration Specialist</td>
                                <td>Tokyo</td>
                                <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModalcall" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                                <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModal" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                            
                            
                            </tr>
                            <tr>
                                <td>Herrod Chandler</td>
                                <td>Sales Assistant</td>
                                <td>San Francisco</td>
                                <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModalcall" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                                <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModal" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                            
                            
                            </tr>
                            <tr>
                                <td>Rhona Davidson</td>
                                <td>Integration Specialist</td>
                                <td>Tokyo</td>
                                <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModalcall" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                                <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModal" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                            
                            </tr>

                            <tr>
                                <td>Brielle Williamson</td>
                                <td>Integration Specialist</td>
                                <td>New York</td>
                                <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModalcall" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                                <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModal" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fas fa-phone "></i></button></td>
                            
                            </tr>
                        
                        

                        </tbody>

                    </table>
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