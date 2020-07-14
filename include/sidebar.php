<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="web/./index" class="brand-link">
      <img src="img/core-img/favicon.ico" alt="iChange Delivery Logo" class="brand-image img-circle elevation-3"
           style="opacity: 0.8">
      <span class="brand-text font-weight-light">Switch NG</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
     <?php
$name = $_SESSION['Username'];
$sql = "SELECT * FROM ichange_signup WHERE `Username` = '$name'";
$result = query($sql);
while($row = mysqli_fetch_array($result))
 {
  ?>     
        <div class="info">
          <a href="./profile" class="d-block"><?php echo $row['First Name']." ".$row['Last Name']." (  ".$row['Username']." )" ; ?></a>
          
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
            <a href="./index" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
           
          </li>
          <br/>
          <li class="nav-item">
            <a href="./simple" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Sales
                <i class="fas fa-angle-right right"></i>
                 <?php
              $r = $_SESSION['Username'];
 $sql="SELECT SUM(Product_sn) AS cart from ichange_product WHERE `Username` = '$r' AND `Sold` = 'Sold' AND `defaulter` = 'uncredited' AND `status` = 'delivered'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
    $a = $row['cart'];
    $_SESSION['new'] = $a;
    
  ?>                
                <span class="badge badge-info right"><?php echo $_SESSION['new'];?></span>
                <?php
              }
              ?>
              </p>
            </a>
          </li>
          <br/>
          <li class="nav-item has-treeview">
            <a href="./e-commerce" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Delivery
                <i class="fas fa-angle-right right"></i>
               
              </p>
            </a>

          </li>
          <br/>
          <li class="nav-item has-treeview">
            <a href="./seller" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Seller Store
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            
          </li>
          <br/>
           <li class="nav-item has-treeview">
            <a href="./credited" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
               Credit History
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            
          </li>
          <br/>
          
          <li class="nav-item has-treeview">
            <a href="./buyer" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
               Terms and Conditions
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>

          </li>

          <br/>
          <li class="nav-item has-treeview">
            <a href="./compose" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Support Ticket
                <i class="fas fa-angle-right right"></i>
                <span class="badge badge-info right"><?php echo $_SESSION['al'];?></span>
              </p>
            </a>
            
          </li>
          <br/>
          <li class="nav-item has-treeview">
            <a href="./profile" class="nav-link">
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