<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="web/./index" class="brand-link">
      <img src="img/core-img/favicon.ico" alt="Switch NG" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Switch NG</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
     <?php
$sql = "SELECT * FROM ichange_admin";
$result = query($sql);
while($row = mysqli_fetch_array($result))
 {
  ?>     
        <div class="info">
          <a href="./pro" class="d-block"><?php echo $row['First Name']." ".$row['Last Name']." (  ".$row['Username']." )" ; ?></a>
          
          <a style="font-size: 13px;" href="#" class="d-block">&nbsp;&nbsp;&nbsp;Last Seen: <?php echo $row['lstseen']; ?></a>
        </div>
     <?php
 }

 ?>       
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
            <a href="./admdex" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
           
          </li>
          <br/>
          <li class="nav-item">
            <a href="./product" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                All products
                <i class="fas fa-angle-right right"></i>
                 <span class="badge badge-info right"><?php echo $_SESSION['sold'];?></span>
              </p>
            </a>
          </li>
          <br/>
          <li class="nav-item has-treeview">
            <a href="./delivery" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Delivery
                <i class="fas fa-angle-right right"></i>
                <span class="badge badge-info right"><?php echo $_SESSION['deliver'];?></span>
              </p>
            </a>

          </li>
          <br/>
          <li class="nav-item has-treeview">
            <a href="./user" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Registered Users
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            
          </li>
          <br/>
         
           <li class="nav-item has-treeview">
            <a href="./payh" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
               Payment History
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            
          </li>
          <br/>
          <li class="nav-item has-treeview">
            <a href="./tick" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Support Ticket
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            
          </li>
          <br/>
          <li class="nav-item has-treeview">
            <a href="./pro" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            
          </li>
          
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>