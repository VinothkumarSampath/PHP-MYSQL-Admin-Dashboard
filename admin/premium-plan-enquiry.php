<?php
include("includes/config.php");
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

//SQL QUERY
$query = "SELECT * FROM `tblpremium`;";
//FETCHING DATA FROM DATABASE
$result = mysqli_query($link, $query);
?>
<?php include("includes/header.php"); ?>  
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview wide-md mx-auto">
                                    
                                    
                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Premium Plan Enquiry List</h4>
                                                
                                            </div>
                                        </div>
                                        <div class="card card-preview">
                                            <div class="card-inner">
                                                <table class="datatable-init-export nowrap table" data-export-title="Export">
                                                   <thead>
                                                        <tr>
                                                            <th>Organisation Name</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>Address</th>
                                                            <th>Country</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       <?php if (mysqli_num_rows($result) > 0) {
      // OUTPUT DATA OF EACH ROW
      while($row = mysqli_fetch_assoc($result)) { ?> <tr>
                                                            <td><?php echo $row["cOrganisation"]; ?></td>
                                                            <td><?php echo $row["cName"]; ?></td>
                                                            <td><?php echo $row["cEmail"]; ?></td>
                                                            <td><?php echo $row["cPhone"]; ?></td>
                                                            <td><?php echo $row["cAddress"]; ?></td>
                                                            <td><?php echo $row["cCountry"]; ?></td>
                                                        </tr>
													   <?php } 
													   } 
													   ?>
                                                     
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- .card-preview -->
                                    </div> <!-- nk-block -->
                                </div><!-- .components-preview -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                  <?php include("includes/footer.php"); ?>  
   