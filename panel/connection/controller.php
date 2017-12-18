<?php
$stmt = $conn->prepare("INSERT INTO table (col1 ,col2) VALUES (:var1,:var2)");
$stmt->bindParam(':var1', $var1);
$stmt->bindParam(':var2', $var2);
$stmt->execute();
//-----------------------------------------------------------------------------
$stmt = $conn->prepare("DELETE from table where id=:id");
$stmt->bindParam(':id', $id);
$stmt->execute();
//-----------------------------------------------------------------------------
$stmt = $conn->prepare("UPDATE table set col1=:var1 , col2=:var2 where id=:id");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':var1', $var1);
$stmt->bindParam(':var2', $var1);
$stmt->execute();
//-----------------------------------------------------------------------------
$stmt= $conn->prepare("SELECT * FROM categories");
$stmt->execute();
	while($data = $stmt->fetch( PDO::FETCH_ASSOC )){
		?>
		<th><?php echo $data['col']; ?></th>
		<?php
	}