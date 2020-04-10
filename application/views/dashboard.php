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
           <?php
              $this->load->view('inc/collapsable_header');
            ?>
            <div class="divider divider-margins"></div>

            <div class="content"></div>

            <div class="grid-icons grid-icons-3">
                <a href="calls.html" class="bg-gradient-magenta1 round-small  scale-hover">
                    <i class="fas fa-phone-volume"></i>
                    <span>Call for the day</span>
                </a>
                <a href="about.html" class="bg-gradient-orange round-small  scale-hover">
                    <i class="fas fa-headset"></i>
                    <span>Due Calls</span>
                </a>
                <a href="about.html" class="bg-gradient-blue2 round-small  scale-hover">
                    <i class="fab fa-searchengin"></i>
                    <span>Search</span>
                </a>
                <a href="about.html" class="bg-gradient-green1 round-small  scale-hover">
                    <i class="fa fa-phone"></i>
                    <span>View Calls</span>
                </a>
                <a href="about.html" class="bg-gradient-yellow1 round-small  scale-hover">
                    <i class="far fa-registered"></i>
                    <span>Register</span>
                </a>
                <a href="about.html" class="bg-gradient-pink1 round-small  scale-hover">
                    <i class="fa fa-envelope"></i>
                    <span>Send</span>
                </a>
                <!-- Hidden BUUTONS -->
                <div class="" id="myDIV" style="display: none;">
                    <a href="about.html" class="bg-gradient-magenta1 round-small  scale-hover">
                        <i class="fas fa-phone-volume"></i>
                        <span>ABC</span>
                    </a>
                    <a href="about.html" class="bg-gradient-orange round-small  scale-hover">
                        <i class="fas fa-headset"></i>
                        <span>Over</span>
                    </a>
                    <a href="about.html" class="bg-gradient-blue2 round-small  scale-hover">
                        <i class="fab fa-searchengin"></i>
                        <span>Search</span>
                    </a>
                    <a href="about.html" class="bg-gradient-green1 round-small  scale-hover">
                        <i class="fa fa-phone"></i>
                        <span>Hot Calls</span>
                    </a>
                    <a href="about.html" class="bg-gradient-yellow1 round-small  scale-hover">
                        <i class="far fa-registered"></i>
                        <span>Register a Client</span>
                    </a>
                    <a href="about.html" class="bg-gradient-pink1 round-small  scale-hover">
                        <i class="fa fa-envelope"></i>
                        <span>Send Thank Mail</span>
                    </a>
                </div>

            </div>

            <div id="wrapper">
                <button type="button" class="button  button-m bg-green2-dark" id="showAll">View All</button>
                <button type="button" class="button  button-m bg-green2-dark" id="hideAll" style="display: none;">hide</button>

            </div>
            <div class="clear"></div>

            <div class="top-20"></div>
            <!-- button -->
        </div>

      <!-- Profile -->
      <?php
            $this->load->view('profile');

        ?>
        <div class="menu-hider"></div>

    </div>


    <script>
        $("#showAll").click(function() {
            $("#myDIV").show();
            $("#showAll").hide();
            $("#hideAll").show();

        });

        $("#hideAll").click(function() {
            $("#myDIV").hide();
            $("#showAll").show();
            $("#hideAll").hide();

        });
    </script>
</body>