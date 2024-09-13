<?php

/**
 * 請根據mysql設定的 帳密和資料庫名稱 來連線
 */
$mysqli = new mysqli("localhost", "root", "", "dbname");
$mysqli->query("SET NAMES 'UTF8' ");

session_start();

$action     = isset($_GET['action']) ? $_GET['action'] : "";
$account    = isset($_POST['email2']) ? $_POST['email2'] : "";
$passwd     = isset($_POST['pwd']) ? $_POST['pwd'] : "";

switch ($action) {
    case "checkMember":
        $result = searchMemberByAccount($mysqli, $account);

        $user = $result["name"];
        if (!empty($user)) {
            echo "1";  //已有帳號
            error_log("account => ".$account . " is already exists ");
        } else {
            echo "0";  //沒有帳號
        }

        break;
    case "addMember":
        $hashedPassword = password_hash($passwd, PASSWORD_DEFAULT);

        $stmt = $mysqli->prepare("INSERT INTO member(account, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $account, $hashedPassword);
        $stmt->execute();
        $mysqli->close();

        if (!$stmt) {
            echo "failed";  //新增會員失敗
            error_log("Add member => " . $account . " failed");
        }

        break;
    case "updateMember":
        $stmt = $mysqli->prepare("INSERT INTO member(account, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $account, $hashedPassword);
        $stmt->execute();
        $mysqli->close();

        if (!$stmt) {
            echo "failed";  //新增會員失敗
            error_log("Add member => " . $account . " failed");
        }

        break;
    case "memberLogin":
        $result = searchMemberByAccount($mysqli, $account);

        $storedHashedPassword   = $result["password"];
        $user                   = $result["name"];

        if (password_verify($passwd, $storedHashedPassword)) {
            $_SESSION["user"] = $user;
            echo "登入成功";
        } else {
            echo "登入失敗";
            error_log("inputPasswd =>" . $passwd);
            error_log("hashPasswd =>" . $storedHashedPassword);
        }

        break;
    default:
        exit;
}

function searchMemberByAccount($mysqli, $account)
{
    $stmt = $mysqli->prepare("SELECT * FROM member where account = ?");
    $stmt->bind_param("s", $account);
    $stmt->execute();
    $sql_result = $stmt->get_result();
    $row = $sql_result->fetch_array(MYSQLI_ASSOC);
    $mysqli->close();

    return $row;
}
