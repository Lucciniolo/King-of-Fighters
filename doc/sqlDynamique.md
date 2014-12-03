unset($sql);

if ($stationFilter) {
    $sql[] = " STATION_NETWORK = '$stationFilter' ";
}
if ($verticalFilter) {
    $sql[] = " VERTICAL = '$verticalFilter' ";
}

$query = "SELECT * FROM $tableName";

if (!empty($sql)) {
    $query .= ' WHERE ' . implode(' AND ', $sql);
}

echo $query;
// mysql_query($query);