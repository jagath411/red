
<?php
require_once("/var/www/html/FLAPPS/tradeaction/arrow/TX/admin/flapps/app/core/tx/config/base.php");
$brokers = [
    "ze",
    "zb",
    "tc",
    "fv",
    "ft",
    "xts",
    "pt",
    "up",
    "ce",
    "rz",
    "kt"
];

function deleteUnwantedEntries($db, $broker, $clntId)
{
    $tableName = "fl_" . $broker . "_newuser_dtls";

    $query = "DELETE FROM $tableName WHERE clnt_id ='$clntId'";

    if (mysqli_query($db, $query)) {
        // Check the number of affected rows
        $affectedRows = mysqli_affected_rows($db);
        if ($affectedRows > 0) {
            echo "Deleted $affectedRows record(s) from $tableName.<br>";
        } else {
            echo "No records found to delete from $tableName.<br>";
        }
    } else {
        echo "Error executing query: " . mysqli_error($db) . "<br>";
    }
}

foreach ($brokers as $broker) {
    deleteUnwantedEntries($db, $broker, "UNWANTED");
}
?>
