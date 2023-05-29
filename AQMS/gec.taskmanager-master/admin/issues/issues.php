<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../includes/header.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <title>Issues</title> 

</head>
<body>
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

                <!-- Begin Page content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <div class="d-flex align-items-center">
                            <div>
                                <h1 class="h4 mb-4 text-gray-800">
                                    <i class="fas fa-chevron-up"></i>
                                    <strong>Search conditions</strong>
                                </h1>
                            </div>
                        <div class="ml-3 mb-2">
                            <div class="input-group-append">
                                    <button style="margin: 15px;" class="btn btn-success" type="button">Search</button>
                                    <input style="margin-top: 15px;" type="text" class="form-control" placeholder="Search...">
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="d-flex justify-content-start mb-3 flex-wrap demo align-items-center">
                        <h1 class="h6 mb-2 mr-1">
                            <strong><span style="color: black;">Status:</span></strong>
                        </h1>
                        <div class="btn-group mr-1">
                            <button type="button" class="btn"><span style="color: black;">All</span></button>
                        </div>
                        <div class="btn-group mr-1">
                            <button type="button" class="btn"><span style="color: black;">Open</span></button>
                        </div>
                        <div class="btn-group mr-2">
                            <button type="button" class="btn"><span style="color: black;">In Progress</span></button>
                        </div>
                        <div class="btn-group mr-2">
                            <button type="button" class="btn"><span style="color: black;">Resolved</span></button>
                        </div>
                        <div class="btn-group mr-2">
                            <button type="button" class="btn"><span style="color: black;">Closed</span></button>
                        </div>
                        <div class="btn-group mr-2">
                            <button type="button" class="btn"><span style="color: black;">Not Closed</span></button>
                        </div>
                    </div>

                    <style>
                        .btn.active,
                        .btn:active,
                        .btn:focus,
                        .btn:hover {
                            background-color: green;
                            color: white;
                        }
                    </style>
                        <div style="display: flex; align-items: flex-start;">
                            <div style="margin-right: 30px;">
                            <div>
                            <label class="form-label" for="project-select"><strong><span style="color: black;">Project</span></strong></label>
                            </div>
                            <div> <select class="form-control" id="project-select">
                                <option></option>
                                <option>UI</option>
                                <option>API</option>
                                </select>
                            </div>
                        </div>
                        <div style="margin-right: 15px; position: relative;">
                            <div> 
                            <label class="form-label mb-2" for="assignee-select"><strong><span style="color: black;">Assignee</span></strong></label>
                            </div>
                            <div style="display: flex; align-items: center:">
                            <select class="form-control" id="assignee-select">
                                <option></option>
                                <option>Developer 1</option>
                                <option>Developer 2</option>
                            </select>
                            <img src="https://cdn-icons-png.flaticon.com/512/32/32382.png" class="user-icon" style="max-width: 40px; height: 30px; margin-left: 0px;" alt="User with headphones - Free people icons" aria-hidden="false">
                            </div>
                        </div>
                        <div>
                            <!-- <div class="form-group mb-4">
                            <div class="form-label mb-2" for="example-palaceholder"><strong><span style="color: black;">Keyword</span></strong></div>
                            <input type="text" id="example-keyword" class="form-control" placeholder="Enter keyword">
                            </div> -->
                        </div>
                        </div>

                        <style>
                        .form-control {
                            height: 35px; /* Adjust the height value as per your preference */
                            width: 200px; /* Adjust the width value as per your preference */
                        }
                        div {
                            vertical-align: top;
                        }
                        </style>
                        <style>
                            /* CSS rule to set the background color of the table */
                            #issuesTable {
                                background-color: white;
                            }
                            </style>
                        <div class="panel-container show">
                            <div class="form-group mb-5">
                            <table id="issuesTable" class="table table-bordered table-hover table-sm text-success table-striped w-100 text-center">
                                <thead class="thead">
                                    <tr>
                                        <th>Issue Type</th>
                                        <th>Subject</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Project</th>
                                        <th>Assignee</th>
                                        <th>Due Date</th>
                                        <th>Attachment</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <style>
                            #issuesTable td {
                                color: black;
                            }
                        </style>

                        <!-- datatable end -->
                        <script type="text/javascript">
                            $(document).ready(function(){
                            $('#issuesTable').DataTable({
                                'processing': false,
                                'serverSide': true,
                                'serverMethod': 'post',
                                'ajax': {
                                    'url': 'ajax_issues.php'
                                },
                                'columns': [
                                    {data: 'issue_type'},
                                    {data: 'subject'},
                                    {data: 'description'},
                                    {data: 'status'},
                                    {data: 'assignee'},
                                    {data: 'project'},
                                    {data: 'duedate'},
                                    {data: 'attachment'},
                                    ]
                                });
                            });
                        </script>
                    </div> 
                </div> 
            </div> <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
        <script src="<?php echo base_url ?>assets/js/datatables.min.js"></script>
    </div>   
</body>
</html>
