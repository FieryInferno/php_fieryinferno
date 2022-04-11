<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soal A2</title>
</head>
<body>
  <?php
    $servername = 'localhost';
    $username   = 'root';
    $password   = '';
    $dbname     = 'dba1';
    $conn       = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    if (!empty($_GET['hobi'])) {
      $hobi = $_GET['hobi'];
      $sql  = "SELECT hobi, COUNT(*) as total FROM hobi WHERE hobi LIKE '%$hobi%'";
    } else {
      $sql  = 'SELECT hobi, COUNT(*) as total FROM hobi GROUP BY hobi ORDER BY total DESC';
    }
    
    $result = $conn->query($sql);
    $conn->close();
  ?>
  <form method="get">
    <input type="text" placeholder="Cari hobi" name="hobi">
    <input type="submit" value="cari">
  </form>
  <table>
    <thead>
      <tr>
        <th>Hobi</th>
        <th>Jumlah Person</th>
      </tr>
    </thead>
    <tbody>
      <?php
        while($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?= $row['hobi']; ?></td>
            <td><?= $row['total']; ?></td>
          </tr>
        <?php }
      ?>
    </tbody>
  </table>
</body>
</html>