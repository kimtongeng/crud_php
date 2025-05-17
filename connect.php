<?php

// function connect_sql_server() {
//     $server_name = "DESKTOP-B7N2UOM\\SQLEXPRESS01";
//     $database = "crud";
//     $uid = "";   // leave blank for Windows Authentication
//     $pass = "";

//     $connection = [
//         "Database" => $database,
//         "Uid" => $uid,
//         "PWD" => $pass
//         // Or use: "IntegratedSecurity" => true
//     ];

//     $conn = sqlsrv_connect($server_name, $connection);

//     if (!$conn) {
//         die("❌ Connection failed: " . print_r(sqlsrv_errors(), true));
//     }

//     return $conn;
// }

// function exc_query($query) {
//     $conn = connect_sql_server();
//     $stmt = sqlsrv_query($conn, $query);

//     if ($stmt === false) {
//         die("❌ Query failed: " . print_r(sqlsrv_errors(), true));
//     }

//     $results = [];
//     while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
//         $results[] = $row;
//     }

//     sqlsrv_free_stmt($stmt);
//     sqlsrv_close($conn);

//     return $results;
// }

// function insert_borrow_form($data) {
//     $conn = connect_sql_server();

//     $query = "INSERT INTO borrow_book (
//         student_name, student_id, email, phone,
//         book_name, book_id, borrow_date, return_date,
//         quantity, status, notes
//     ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

//     $params = [
//         $data['student_name'],
//         $data['student_id'],
//         $data['email'],
//         $data['phone'],
//         $data['book_name'],
//         $data['book_id'],
//         $data['borrow_date'],
//         $data['return_date'],
//         $data['quantity'],
//         $data['status'],
//         $data['notes']
//     ];

//     $stmt = sqlsrv_query($conn, $query, $params);

//     if ($stmt === false) {
//         die(print_r(sqlsrv_errors(), true));
//     }

//     sqlsrv_free_stmt($stmt);
//     sqlsrv_close($conn);

//     return true;
// }
// function deleteRecord($id) {
//     $conn = connect_sql_server();

//     $sql = "DELETE FROM borrow_book WHERE id = ?";
//     $params = [$id];

//     $stmt = sqlsrv_prepare($conn, $sql, $params);

//     if (!$stmt) {
//         return false;
//     }

//     $success = sqlsrv_execute($stmt);

//     sqlsrv_free_stmt($stmt);
//     sqlsrv_close($conn);

//     return $success;
// }

// function getBorrowById($id) {
//     $conn = connect_sql_server();

//     $sql = "SELECT * FROM borrow_book WHERE id = ?";
//     $params = [$id];

//     $stmt = sqlsrv_prepare($conn, $sql, $params);
//     if (!$stmt) {
//         die("❌ Prepare failed: " . print_r(sqlsrv_errors(), true));
//     }

//     if (!sqlsrv_execute($stmt)) {
//         die("❌ Execution failed: " . print_r(sqlsrv_errors(), true));
//     }

//     $data = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

//     sqlsrv_free_stmt($stmt);
//     sqlsrv_close($conn);

//     return $data;
// }
// function updateBorrowForm($id, $data) {
//     $conn = connect_sql_server();

//     $sql = "UPDATE borrow_book SET 
//         student_name = ?, student_id = ?, email = ?, phone = ?, 
//         book_name = ?, book_id = ?, borrow_date = ?, return_date = ?, 
//         quantity = ?, status = ?, notes = ?
//         WHERE id = ?";

//     $params = [
//         $data['student_name'],
//         $data['student_id'],
//         $data['email'],
//         $data['phone'],
//         $data['book_name'],
//         $data['book_id'],
//         $data['borrow_date'],
//         $data['return_date'],
//         $data['quantity'],
//         $data['status'],
//         $data['notes'],
//         $id
//     ];

//     $stmt = sqlsrv_query($conn, $sql, $params);

//     if ($stmt === false) {
//         die(print_r(sqlsrv_errors(), true));
//     }

//     sqlsrv_free_stmt($stmt);
//     sqlsrv_close($conn);

//     return true;
// }

function connect_mysql() {
    $host = "localhost";
    $user = "root"; // change this if your MySQL username is different
    $pass = "";     // change this if your MySQL password is set
    $database = "crud";

    $conn = new mysqli($host, $user, $pass, $database);

    if ($conn->connect_error) {
        die("❌ Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function exc_query($query) {
    $conn = connect_mysql();
    $result = $conn->query($query);

    if (!$result) {
        die("❌ Query failed: " . $conn->error);
    }

    $results = [];
    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }

    $conn->close();
    return $results;
}

function insert_borrow_form($data) {
    $conn = connect_mysql();

    $stmt = $conn->prepare("INSERT INTO borrow_book (
        student_name, student_id, email, phone,
        book_name, book_id, borrow_date, return_date,
        quantity, status, notes
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssssssis",
        $data['student_name'],
        $data['student_id'],
        $data['email'],
        $data['phone'],
        $data['book_name'],
        $data['book_id'],
        $data['borrow_date'],
        $data['return_date'],
        $data['quantity'],
        $data['status'],
        $data['notes']
    );

    if (!$stmt->execute()) {
        die("❌ Insert failed: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
    return true;
}

function deleteRecord($id) {
    $conn = connect_mysql();

    $stmt = $conn->prepare("DELETE FROM borrow_book WHERE id = ?");
    $stmt->bind_param("i", $id);

    $success = $stmt->execute();

    $stmt->close();
    $conn->close();

    return $success;
}

function getBorrowById($id) {
    $conn = connect_mysql();

    $stmt = $conn->prepare("SELECT * FROM borrow_book WHERE id = ?");
    $stmt->bind_param("i", $id);

    $stmt->execute();
    $result = $stmt->get_result();

    $data = $result->fetch_assoc();

    $stmt->close();
    $conn->close();

    return $data;
}

function updateBorrowForm($id, $data) {
    $conn = connect_mysql();

    $stmt = $conn->prepare("UPDATE borrow_book SET 
        student_name = ?, student_id = ?, email = ?, phone = ?, 
        book_name = ?, book_id = ?, borrow_date = ?, return_date = ?, 
        quantity = ?, status = ?, notes = ?
        WHERE id = ?");

    $stmt->bind_param("ssssssssissi",
        $data['student_name'],
        $data['student_id'],
        $data['email'],
        $data['phone'],
        $data['book_name'],
        $data['book_id'],
        $data['borrow_date'],
        $data['return_date'],
        $data['quantity'],
        $data['status'],
        $data['notes'],
        $id
    );

    if (!$stmt->execute()) {
        die("❌ Update failed: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();

    return true;
}
?>
