<?php
  $register_link = ["home", "loginForm"] ;
  $login_link = ["home", "registerForm"] ;
  $main_link = ["main"] ;
?>
<style>
  .userProfileImage {
    width: 40px;
    height: 40px;
    margin-top: 13px;
    margin-left: 10px;
  }
  #notNumber {
    background: red;
    font-size: 15px;
    width: 20px;
    height: 20px;
  }
  
  .notification {
    visibility: hidden;
    width: 100px;
    height: 100px;
  }
</style>
<nav>
    <div class="nav-wrapper deep-orange darken-3">
      <a href="main" class="brand-logo"><i class="material-icons left hide-on-med-and-down">home</i>BMS</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      
      <!-- Menu Items -->
      <?php
      $menu_items = [
        "desktop" => '<ul id="nav-mobile" class="right hide-on-med-and-down">',
        "mobile" => '<ul class="sidenav" id="mobile-demo">'
      ];
      ?>

      <?php foreach($menu_items as $type => $menu)  : ?>
          <?= $menu ?>
          <?php if ( $type == "mobile") : ?>
            <li class="red-text" style="margin-left: 3em; margin-top:1em">Barış Ertaş</li>
            <li class="red-text" style="margin-left: 3em; ">Niyazi Berkay Çokuysal</li>
            <li class="divider"></li>
            <li class="red-text" style="margin-left: 3em; ">CTIS 256 Project</li>
            <li class="divider"></li>
          <?php endif ?>
          <?php if ( in_array($page, $register_link)) : ?>
            <li>
                <a href="registerForm"><i class="material-icons left">person_add</i>Register</a>
            </li>
          <?php endif ?>

          <?php if ( in_array($page, $login_link)) : ?>
            <li>
                  <a href="loginForm"><i class="material-icons left">directions_run</i>Sign in</a>
            </li>
          <?php endif ?>

          <?php if ( in_array($page, $main_link)) : ?>     
            <li>
              <div class="notification">
                  <a href="#!" style="font-size:large;"><i class="material-icons left       bms-notification">notifications_active</i></a><span id="notNumber">2 new</span>
              </div>
             
            </li>   
            <li>
           
              <a href="editProfile" style="font-size:xx-large;"><i class="material-icons left"><img src="public/img/<?= isset($_SESSION["user"]["profile"]) ? $_SESSION["user"]["profile"] : "default_user.png" ?>" class="userProfileImage circle"></i><?=$_SESSION["user"]["name"] ?></a>
            </li>
            <li>
              <a href="#searching" class="modal-trigger" style="font-size:large;"><i class="material-icons left">search</i>Search</a>
            </li>
            <li>
              <a href="logout" style="font-size:large;"><i class="material-icons left">exit_to_app</i>Logout</a>
            </li>
          <?php endif ?>
      </ul>
      <?php endforeach ?>
    </div>
  </nav>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
  });
  </script>