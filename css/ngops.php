<html>
<head>
<title></title>
</head>
<body>
<h1>Coffee</h1>
<table>
<tr>
<th>NO</th>
<th>CODE</th>
<th>TYPE</th>
<th>TIME</th>
</tr>
<?php
  $query = mysqli_query ($connect, "SELECT * FROM kopi");
  while($data = mysqli_fetch_array($query)){
  ?>
  <tbody>
    <tr>
      <td><?php echo $data['id']; ?></td>
      <td><?php echo $data['rfid']; ?></td>
      <td><?php echo $data['jenis']; ?></td>
      <td><?php echo $data['time']; ?></td>
      </td>
    </tr>
    <?php } ?>
</table>
</body>
</html>