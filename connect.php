<?php

function connect_sql_server() {
    $server_name = "DESKTOP-B7N2UOM\\SQLEXPRESS01";
    $database = "crud";
    $uid = "";   // leave blank for Windows Authentication
    $pass = "";

    $connection = [
        "Database" => $database,
        "Uid" => $uid,
        "PWD" => $pass
        // Or use: "IntegratedSecurity" => true
    ];

    $conn = sqlsrv_connect($server_name, $connection);

    if (!$conn) {
        die("❌ Connection failed: " . print_r(sqlsrv_errors(), true));
    }

    return $conn;
}

function exc_query($query) {
    $conn = connect_sql_server();
    $stmt = sqlsrv_query($conn, $query);

    if ($stmt === false) {
        die("❌ Query failed: " . print_r(sqlsrv_errors(), true));
    }

    $results = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $results[] = $row;
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);

    return $results;
}

function insert_borrow_form($data) {
    $conn = connect_sql_server();

    $query = "INSERT INTO borrow_book (
        student_name, student_id, email, phone,
        book_name, book_id, borrow_date, return_date,
        quantity, status, notes
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $params = [
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
    ];

    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);

    return true;
}
function deleteRecord($id) {
    $conn = connect_sql_server();

    $sql = "DELETE FROM borrow_book WHERE id = ?";
    $params = [$id];

    $stmt = sqlsrv_prepare($conn, $sql, $params);

    if (!$stmt) {
        return false;
    }

    $success = sqlsrv_execute($stmt);

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);

    return $success;
}

function getBorrowById($id) {
    $conn = connect_sql_server();

    $sql = "SELECT * FROM borrow_book WHERE id = ?";
    $params = [$id];

    $stmt = sqlsrv_prepare($conn, $sql, $params);
    if (!$stmt) {
        die("❌ Prepare failed: " . print_r(sqlsrv_errors(), true));
    }

    if (!sqlsrv_execute($stmt)) {
        die("❌ Execution failed: " . print_r(sqlsrv_errors(), true));
    }

    $data = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);

    return $data;
}
function updateBorrowForm($id, $data) {
    $conn = connect_sql_server();

    $sql = "UPDATE borrow_book SET 
        student_name = ?, student_id = ?, email = ?, phone = ?, 
        book_name = ?, book_id = ?, borrow_date = ?, return_date = ?, 
        quantity = ?, status = ?, notes = ?
        WHERE id = ?";

    $params = [
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
    ];

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);

    return true;
}
?>
