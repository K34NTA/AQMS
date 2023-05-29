<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ('../includes/header.php'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Add Issue</title>
</head>
<body>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar --> 
            <?php include ('../includes/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                    <?php include ('../includes/topbar.php'); ?>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <form action="save_issue.php" method="POST">
                    <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h5 mb-2 text-gray-800">
                        <strong>Add Issue</strong></h1>
                    <br><br>
                    <div class="form-group mt-5 col-md-4"  style="padding-left: 20px; padding-right: 20px;">
                        <h6 class="mb-1 text-gray-800"><strong>Issue Type</strong></h6>
                        <select class="form-control mb=5" id="task-filter" style="font-size: 12px; padding-top:0; padding-bottom:0; padding-left:20px; padding-right:20px; border-color: #18B07B;" name="issue_type">
                            <option value="Task">Task</option>
                            <option value="Request">Request</option>
                        </select>
                    </div>
                    <div  style="padding-left: 20px; padding-right: 20px;">
                        <input type="text" class="form-control form-control-lg shadow-inset-0 font-weight-bold" required="true" id="subject" 
                            placeholder="Subject" style="font-size: 12px; padding-top:0; padding-bottom:0; padding-left:20px; padding-right:20px; border-color: #18B07B;" name="subject"></input>
                    </div>
                    <div class="card-body shadow mt-2 col-md-12">
                        <div class="wrapper  text-left mt-0">
                        <textarea name="description" id="description" placeholder="Enter your description..." required="true"  style="width: 100%; height: 250px; font-size: 12px; border-color: #18B07B;" autofocus></textarea>
                        <script>
                        window.onload = function() {
                            document.getElementById('description').value = '';
                        };
                        </script>
                        </textarea>
                            <!-- Status, Catergory, Assignee, and Due Date -->
                            <table class="table m-0 mt-3 table-center col-sm-12" style="color: black;">
                                <tbody>
                                    <tr>
                                        <!-- Status -->
                                        <td style="width: 200px;">Status</td>
                                        <td class="text-left" style="width: 400px;">
                                            <select class="form-control mb=5" id="task-filter" style="width: 200px; font-size: 12px; border-color: #18B07B;" name="status">
                                                <option value="Open">Open</option>
                                                <option value="inProgress">In Progress</option>
                                                <option value="Resolved">Resolved</option>
                                                <option value="Close">Close</option>
                                            </select>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td style="border-top: none; border-bottom: none; width: 50px;"></td>
                                        <td style="border-top: none; border-bottom: none; width: 50px;"></td>
                                        <!-- Assignee -->
                                        <td style="width: 200px;">Assignee</td>
                                        <td>
                                            <?php
                                                // Execute the query
                                                $query = "SELECT concat(fname,' ',lname) as usernames FROM user";
                                                $res = mysqli_query($con, $query); 
                                            ?>
                                            <div class="input-group bg-white shadow-inset-2" style="width: 200px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text border-right-0" style="color: #18B07B;background-color: white;border-color: #18B07B;">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                </div>
                                                <select class="form-control mb=5" id="task-filter" style="width: 100px; font-size: 12px; border-color: #18B07B;" name="assignee">
                                                    <?php
                                                        // Check if the query executed successfully
                                                        if ($res) {
                                                            while ($row = mysqli_fetch_array($res)) {
                                                                ?>
                                                                <option value="<?php echo $row['usernames']; ?>"><?php echo $row['usernames']; ?></option>
                                                                <?php
                                                            }
                                                        } else {
                                                            // Handle query error
                                                            echo "Error: " . mysqli_error($con); 
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="border-bottom-1">
                                    <!-- Category -->
                                        <td style="width: 200px;">Category</td>
                                        <td style="width: 400px;">
                                            <div style="display: flex; align-items: center;">
                                            <?php
                                                // Execute the query
                                                $query = "SELECT project FROM issues";
                                                $res = mysqli_query($con, $query); 
                                            ?>
                                            <select class="form-control mb=5" id="optionSelect" style="width: 200px; font-size: 12px; margin-right: 10px; border-color: #18B07B;" name="category">
                                                <option value="UI">UI</option>
                                                <option value="API">API</option>
                                            <?php
                                                // Check if the query executed successfully
                                                if ($res) {
                                                    while ($row = mysqli_fetch_array($res)) {
                                                        ?>
                                                        <option value="<?php echo $row['project']; ?>"><?php echo $row['project']; ?></option>
                                                        <?php
                                                    }
                                                } else {
                                                    // Handle query error
                                                    echo "Error: " . mysqli_error($con); 
                                                }
                                            ?>
                                            </select>

                                            <!-- Button trigger modal -->
                                            <button id="openModal" type="submit" class="btn btn-success btn-sm" form="" data-toggle="modal" data-target="#modal" style="border-radius: 50%;">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td style="border-top: none; border-bottom: none; width: 50px;"></td>
                                        <td style="border-top: none; border-bottom: none; width: 50px;"></td>
                                        <!-- Due Date -->
                                        <td style="width: 200px;">Due Date</td>
                                        <td>
                                            <input type="date" id="datepicker" style="width: 200px;border-radius: 5px;border-color: #18B07B;border-top-style: outset;border-left-style: double; border-width: thin; padding: 2px;" name="due_date">                                        
                                        </td>
                                    </tr>
                                    <tr  style="height: 1px;">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style="border-top: none; border-bottom: none; width: 50px;"></td>
                                        <td style="border-top: none; border-bottom: none; width: 50px;"></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Attachment of files -->
                    <div class="shadow mt-2 mb-2" style="height: 100px;">
                        <style>
                            #file-upload {
                            width: 100%;
                            height: 100px;
                            border: 2px dashed #ccc;
                            text-align: center;
                            padding: 10px;
                            font-family: Arial, sans-serif;
                            }

                            #file-upload.highlight {
                                border-color: #999;
                            }
                            #file-upload p {
                                margin: 0;
                                padding: 10px;
                            }
                            </style>

                            <div id="file-upload" style="margin: 0;">
                                <p>Hold down <strong>Ctrl</strong> key for mulitple selection</p>
                                    <input type="file" name="file_input" id="file_input" multiple="" accept="image/png, image/gif, image/jpeg, image/jpg, .pdf, .xlsx"/> 
                                </p>
                            </div>
                         <!-- <script>
                            var fileUpload = document.getElementById("file-upload");

                            fileUpload.addEventListener("dragover", function (e) {
                                e.preventDefault();
                                fileUpload.classList.add("highlight");
                            });

                            fileUpload.addEventListener("dragleave", function (e) {
                                e.preventDefault();
                                fileUpload.classList.remove("highlight");
                            });

                            fileUpload.addEventListener("drop", function (e) {
                                e.preventDefault();
                                fileUpload.classList.remove("highlight");
                                var files = e.dataTransfer.files;
                                handleFiles(files);
                            });

                            document.getElementById("file_input").addEventListener("change", function (e) {
                                var files = e.target.files;
                                handleFiles(files);
                            });

                            document.addEventListener("paste", function (e) {
                                var items = e.clipboardData.items;
                                for (var i = 0; i < items.length; i++) {
                                if (items[i].type.indexOf("image") !== -1) {
                                    var file = items[i].getAsFile();
                                    handleFiles([file]);
                                }
                                }
                            });

                            function handleFiles(files) {
                                // Handle the uploaded files here
                                for (var i = 0; i < files.length; i++) {
                                console.log("File:", files[i]);
                                }
                            }
                        </script>     -->
                    </div>
                    <div class="d-flex float-right mb-2">
                        <button type="submit" class="btn btn-success waves-effect waves-themed col-sm-12" style="font-size: 12px;" name="add"><strong>Add Issue</strong></button>
                    </div>
                    </div>
                </form>
                <!-- Modal -->
                <form>
                    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">Add Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" class="form-control" id="newOptionInput">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="addOptionBtn" data-dismiss="modal">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- JavaScript to handle modal functionality -->
                    <script>
                    document.getElementById("addOptionBtn").addEventListener("click", function() {
                        var newOption = document.getElementById("newOptionInput").value;
                        var selectElement = document.getElementById("optionSelect");

                        // Create a new option element
                        var option = document.createElement("option");
                        option.value = newOption;
                        option.text = newOption;

                        // Add the new option to the select element
                        selectElement.add(option);

                        // Clear the input field
                        document.getElementById("newOptionInput").value = "";
                        
                        // Close the modal
                        var modalElement = document.getElementById("modal");
                        var bootstrapModal = bootstrap.Modal.getInstance(modalElement);
                        bootstrapModal.hide();
                    });
                    </script>
                </form>   
            </div>
            
            <!-- Start of Modal -->
            <?php include ('../includes/modal.php'); ?>
            <!-- End of Modal -->

            <!-- Footer -->
            <?php include ('../includes/footer.php'); ?>
            <!-- End of Footer -->

            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
    </div>
</body>
</html>