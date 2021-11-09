<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$country = $_GET['country'];
$country = filter_input(INPUT_GET,"country", FILTER_SANITIZE_STRING);

$matching_country = $conn->query( "SELECT * FROM countries WHERE name LIKE '%$country%'");

$matching_cities = $conn->query( "SELECT cities.name, cities.district, cities.population FROM cities JOIN countries ON cities.country_code = countries.code WHERE countries.name LIKE '%$country%'");

$countryres = $matching_country->fetchAll(PDO::FETCH_ASSOC);

$cityres = $matching_cities->fetchAll(PDO::FETCH_ASSOC);



/*---Producing the Table---*/
?>
<?php if (isset($_GET['context'])): ?>
      <?php if ($_GET['context']=='cities'): ?>

          <table class= "table">
          
          <thead>
            <th>Name</th>
            <th>District</th>
            <th>Population</th>
          </thead>

          <tbody>
            <?php foreach ($cityres as $row): ?>
              <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['district'] ?></td>
                <td><?= $row['population']?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>  
        <?php endif; ?>  
    
    <?php else: ?>
      <table class= "table">
  
      <thead>
        <th>Name</th>
        <th>Continent</th>
        <th>Independence</th>
        <th>Head of State</th>
      </thead>

      <tbody>
        <?php foreach ($countryres as $row): ?>
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