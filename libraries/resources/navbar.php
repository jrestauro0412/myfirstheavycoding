<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img
        src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png"
        height="30"
        alt=""
        loading="lazy"
      />
      MDBootstrap
    </a>

    <?php 
      error_reporting(0);
        if(isset($_SESSION['access']) && $_SESSION['access'] == true){
    ?>
        <div style="display: inline;">
        <p>Welcome to the dashboard : <?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></p>
          <button class="btn btn-outline-danger" id="onlogout">Logout</button>
        </div>
    <?php
        }else{      
    ?>
          <p>Please sign in</p>
    <?php 
        }
    ?> 



  </div>
</nav>