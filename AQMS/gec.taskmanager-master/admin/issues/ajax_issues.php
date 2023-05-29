<?php
if (!defined('DB_SERVER')) {
    include("../../initialize.php");
}

// DB connection parameters
$host = DB_SERVER;
$user = DB_USERNAME;
$password = DB_PASSWORD;
$db = DB_NAME;

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
try {
    $conn = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo $e->getMessage();
}

// Reading values
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows displayed per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

$searchArray = array();

// Search
$searchQuery = "";
if ($searchValue != '') {
    $searchQuery = " AND (issue_type LIKE :issue_type OR
        subject LIKE :subject OR
        description LIKE :description OR
        status LIKE :status OR
        assignee LIKE :assignee OR
        project LIKE :project OR
        duedate LIKE :duedate OR
        attachment LIKE :attachment)
    ";
    $searchArray = array(
        'issue_type' => "%$searchValue%",
        'subject' => "%$searchValue%",
        'description' => "%$searchValue%",
        'status' => "%$searchValue%",
        'assignee' => "%$searchValue%",
        'project' => "%$searchValue%",
        'duedate' => "%$searchValue%",
        'attachment' => "%$searchValue%"
    );
}

// Total number of records without filtering
$stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM add_issue");
$stmt->execute();
$records = $stmt->fetch();
$totalRecords = $records['allcount'];

// Total number of records with filtering
$stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM add_issue WHERE 1" . $searchQuery);
$stmt->execute($searchArray);
$records = $stmt->fetch();
$totalRecordwithFilter = $records['allcount'];

// Fetch records
$stmt = $conn->prepare("SELECT issue_type, subject, description, status, assignee, project, duedate, attachment FROM add_issue WHERE 1 " . $searchQuery . " ORDER BY " . $columnName . " " . $columnSortOrder . " LIMIT :limit, :offset");

// Bind values
$stmt->bindParam(':limit', $row, PDO::PARAM_INT);
$stmt->bindParam(':offset', $rowperpage, PDO::PARAM_INT);
foreach ($searchArray as $key => &$search) {
    $stmt->bindParam(':' . $key, $search, PDO::PARAM_STR);
}

$stmt->execute();
$empRecords = $stmt->fetchAll();

$data = array();

foreach ($empRecords as $row) {
    $data[] = array(
        "issue_type" => $row['issue_type'],
        "subject" => $row['subject'],
        "description" => $row['description'],
        "status" => $row['status'],
        "assignee" => $row['assignee'],
        "project" => $row['project'],
        "duedate" => $row['duedate'],
        "attachment" => $row['attachment']
    );
}

// Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);
echo json_encode($response);
?>