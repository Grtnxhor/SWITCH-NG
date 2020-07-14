<?php
session_start();
if (isset($_SESSION['Username']))
 {

?>
<?php include("include/head2.php"); ?>
<?php include("include/sidebar2.php"); ?>


    <!-- ##### Main Content Wrapper End ##### -->

    <?php include("include/footer.php"); ?>

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>

</html>
<?php
}
else{
  header("location: ./create2");
}

?>