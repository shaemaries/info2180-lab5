<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
/*$stmt = $conn->query("SELECT * FROM countries");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);*/


$country = $_GET['country'];
$country = filter_input(INPUT_GET,"country", FILTER_SANITIZE_STRING);
$matching_country = $conn->query( "SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $matching_country->fetchAll(PDO::FETCH_ASSOC);

?>

<?php if ($country!==""): ?>
   <table class= "table">
  
      <thead>
        <th>Name</th>
        <th>Continent</th>
        <th>Independence</th>
        <th>Head of State</th>
      </thead>

      <tbody>
        <?php foreach ($results as $row): ?>
          <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['continent'] ?></td>
            <td><?= $row['independence_year']?></td>
            <td><?= $row['head_of_state']?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <?php elseif ($country==""): ?>
   <table class= "table">
  
      <thead>
        <th>Name</th>
        <th>Continent</th>
        <th>Independence</th>
        <th>Head of State</th>
      </thead>

      <tbody>
        <?php foreach ($results as $row): ?>
          <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['continent'] ?></td>
            <td><?= $row['independence_year']?></td>
            <td><?= $row['head_of_state']?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  
<?php endif; ?>