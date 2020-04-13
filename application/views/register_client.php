<?php
    $this->load->view('inc/header');
?>
 <link rel="stylesheet" type="text/css" href="<?=base_url('../assets/')?>styles/framework.css">

<body class="theme-light" data-highlight="blue2">
    
<div id="page">
    

      <?php
        $this->load->view('inc/fixed_header');
     ?>
     
       <?php
          $this->load->view('inc/footer');
       ?>
         <div class="page-content">

        <div class="divider divider-margins"></div>

        <div class="content">
            
        
            <div class="content-title has-border border-highlight bottom-18">
                <h3> Register a client.</h3>
                <a href="#" class="color-highlight"><i class="fa fa-chevron-down"></i></a>
            </div>
            <div class="divider"></div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Add</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>Administration</td>
                        <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModalcall" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fa fa-plus"></i></button></td>
                    
                    </tr>
                    <tr>
                        <td>Peter Parker</td>
                        <td>Customer Service</td>
                        <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModalcall" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fa fa-plus"></i></button></td>
                
                    </tr>
                    <tr>
                        <td>Fran Wilson</td>
                        <td>Human Resources</td>
                        <td><button style="cursor:pointer" href="#myModal" data-toggle="modal" data-target="#myModalcall" class="icon icon-xs icon-circle shadow-huge bg-icon"><i class="fa fa-plus"></i></button></td>
                
                    </tr>
                </tbody>
            </table>

        </div>
        </div> 



      <!-- Profile -->
      <?php
            $this->load->view('profile');

        ?>
        <div class="menu-hider"></div>

    </div>

</body>

<div class="modal fade" id="myModalcall" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-body">
          <p  style="margin-bottom: 8px; text-align: center;">Call Now.</p>
          <form action="contact.php" method="post" class="contactForm" id="contactForm">
            <span class="color-highlight">Here is your Formate to register client</span>
            top-10
            <fieldset>
                   <div class="input-style input-style-2 has-icon input-required">
                    <i class="input-icon fa fa-user"></i>
                    <span>Name</span>
                    <em>(required)</em>
                    <input type="name" placeholder="">
                    </div>

                    <div class="input-style input-style-2 input-required">
                        <span>Phone</span>
                        <em>(required)</em>
                        <input type="Phone" placeholder="">
                    </div>

                    <div class="input-style input-style-2 input-required">
                        <span>Email</span>
                        <em>(required)</em>
                        <input type="email" placeholder="">
                    </div>

                    <div class="input-style input-style-2 form-field form-text input-required">
                    <span>Preformat text</span>
                    <em>(required)</em>
                    <textarea name="PreformatTextarea" class="Preformatarea requiredField" id="PreformatTextarea"></textarea>
                    </div>

                   <div class="form-button">
                    <input type="submit" class="button bg-highlight button-m button-full round-small shadow-huge bottom-0 contactSubmitButton" value="Send Message" data-formId="contactForm" />
                    </div>
            </fieldset>
        </form>
            
        </div>
       
      </div>
      
    </div>
  </div>