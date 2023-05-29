<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../includes/header.php'); ?>
    <title>SB Admin 2 - Dashboard</title>
     <!-- Page Wrapper -->
     <div id="wrapper">

<!-- Sidebar -->
<?php include('../includes/sidebar.php'); ?>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

<!-- Topbar -->
<?php include('../includes/topbar.php'); ?>
<!-- End of Topbar -->
<!-- Begin Page Content -->
<div class="container-fluid">
</head>

<body id="page-top">
            <!-- Page Heading -->
                  <h5 class=" mb-4 text-gray-800">
                        <strong> Project Home:</strong> Recent Updates <i class="fas fa-wifi" style="transform: rotate(45deg);"></i>
                  </h5>
           <div style="display: flex; height: 750px;gap:30px;">
                <div class="card" style="height: 748px; width: 900px;background-color:#f8f9fc;border: 1px solid; padding:10px  ">
                  <div style="display: flex; height: 300px;">
                       <div class="card" style="height: 350px; width: 900px;background-color:#f8f9fc;border: 1px solid  ">
                         <table>
                              <tr>
                                 <h6 style= "border-bottom: groove ; padding:10px"><strong> Wed. Jul. 06,2022</h6>
                              </tr>
                         </table> 
                                <i class="fas fa-user-circle "style="float:left;padding:10px;font-size: 45px; "></i>
                           <h6 style="text-align: left; padding:17px">
                              <strong> 
                                Developer 2
                              <input value="updated" style="width: 120px; border-radius: 1rem; text-align: center; color: white; background-color: #5eb5a6;padding: 4px" disabled> the issue
                            </h6>
                        </div>
                   </div>
                  <br>  <br>    <br> 
              <div style="display: flex; height: 300px;px;">
                    <div class="card" style="height: 350px; width: 1000px;background-color:#f8f9fc;border: 1px solid  ">
                        <table>
                            <tr ><h6 style= "border-bottom: groove ; padding:10px"><strong> Wed. Jul. 06,2022</h6>
                            </tr>
                        </table> 
                             <i class="fas fa-user-circle "style="float:left;padding:10px;font-size: 45px; "></i> 
                      <h6 style="text-align: left; padding:17px"> <strong>Developer 2
                             <input value="updated" style="width: 120px; border-radius: 1rem; text-align: center; color: white; background-color: #5eb5a6;padding: 4px" disabled> the issue </strong>
                      </h6>
                    </div>
                </div>
                 </div>    
                <h5><strong>
                Status
                    </strong>
                </h5>
                <div class="card" style="height: 200px;width: 650px;background-color:#f8f9fc;border: 2px solid #ccc;padding-left:20px;padding-right:20px;">
                    <br>
                    <table>
                      <td style="width:20px;background-color:#ed6e6ec4;height:28px;"> </td>
                      <td style="width:100px;background-color:cornflowerblue;height:28px;"> </td>
                      <td style="width:300px;background-color:#5eb5a6;height:28px;"> </td>
                      <td style="width:110px;background-color:#89db12;height:28px;"> </td>   
                    </table>

                    <input value="14 % Closed" style ="width:609px;border-radius:0.5rem; text-align:center;border-style:none;text-align:right;padding-bottom:10px;"disabled>     
                <div style="padding-bottom:50px;">                                                    
                    <input value="Open" style ="width:135px;border-radius:0.5rem; text-align:center;border-style:none; margin-right: 10px;"disabled>
                    <input value="In Progress" style ="width:135px;border-radius:0.5rem; text-align:center;border-style:none; margin-right: 10px;"disabled>
                    <input value="Resolved" style ="width:135px;border-radius:0.5rem; text-align:center;border-style:none; margin-right: 10px;"disabled>
                    <input value="Closed" style ="width:135px;border-radius:0.5rem; text-align:center;border-style:none; margin-right: 12px;"disabled>
                    <br>
                    <input value="1" style="width: 135px; border-radius: 1rem; text-align: center; background-color: #ed6e6ec4; margin-right: 10px;" disabled>
                    <input value="2" style="width: 135px; border-radius: 1rem; text-align: center; background-color: cornflowerblue; margin-right: 10px;" disabled>
                    <input value="15" style="width: 135px; border-radius: 1rem; text-align: center; background-color: #5eb5a6; margin-right: 10px;" disabled>
                    <input value="3" style="width: 140px; border-radius: 1rem; text-align: center; background-color:#89db12;" disabled>
                </div>    
            </div>
              <!-- Content of the second card -->    
                    <br>
            <h5><strong>
              Category 
                </strong>
                    <i class="fa fa-paint-brush" aria-hidden="true" style="float: right; border:ridge;border-radius:33rem;padding:5px;border"></i>
            </h5>
                    <br>
            <div class="card" style="height: 200px; width:650px;background-color:#f8f9fc;border: 2px solid #ccc; padding-left:20px;">
            <div class="ui menu"> 
            </div>
                  <div style="padding:10px;">
                      <table >
                      <p class="text-info">API</p>
                          <td style="width: 50px; background-color: cornflowerblue; height: 10px;"></td>
                          <td style="width: 300px; background-color: #5eb5a6; height: 10px;"></td>
                          <td style="width: 110px; background-color: #89db12; height: 10px;"></td>
                          <td><input value="14 % Closed" style="width: 200px; border-radius: 0.5rem; text-align: center; border-style: none; text-align: right;float:right;" disabled></td>
                      </table>
                  </div>
                            <hr style="margin: 0; border: none; border-top: 0.5px solid gray;margin-top:10px">
                        <div style="padding:10px;">
                        <table>
                        <p class="text-info">UI</p>
                                <td style="width:50px;background-color:#ed6e6ec4;height:20px;"> </td>
                                <td style="width:50px;background-color:cornflowerblue;height:20px;"> </td>
                                <td style="width:250px;background-color:#5eb5a6;height:20px;"> </td>
                                <td style="width:110px;background-color:#89db12;height:20px;"> </td>
                                <td><input value="14 % Closed" style ="width:200px;border-radius:0.5rem; text-align:center;border-style:none;text-align:right"disabled> </td>      
                        </table>
                        </div>
      <!-- Content of the third card -->
            </div>
           </div>
        </div>
      <!-- Footer -->
              <?php include('../includes/footer.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


</html>
