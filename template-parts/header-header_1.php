 <nav>
    <div class="nav-wrapper">
      <div class="container">

         <div class="brand-logo">

           <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
         </div><!-- .site-branding -->

         <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a><!-- mobile nav icon -->

         <?php top_nav() ?><!-- top nav -->

         <div class="right hide-on-large-only">

           <span> <!-- Dropdown Trigger -->
           <a href='#' class="dropdown-button" data-activates='dropdown1'><i class="material-icons">more_vert</i></a><!-- mobile options icon -->
           </span>
  
           <?php mobile_options_nav() ?><!-- Dropdown mobile option menu-->
            
         </div>

           <ul id="mobile-demo" class="side-nav">
             <li class="user-view">
                <a class="side-nav-brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
             </li>

               <?php mobile_nav() ?><!-- mobile side nav -->
           </ul>

      </div><!-- container -->
    </div><!-- nav-wrapper -->
  </nav>