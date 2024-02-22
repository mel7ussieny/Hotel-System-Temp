<script>
	function delRoom(id)
	{
		if(confirm("You want to delete this Room ?"))
		{
		window.location.href='delete_room.php?id='+id;	
		}
	}
</script>
<table class="table table-bordered table-striped table-hover">
	<h1>بيانات الغرف</h1><hr>
	<tr>
	<td colspan="8"><a href="dashboard.php?option=add_rooms" class="btn btn-primary">إضافة غرفة</a></td>
	</tr>
	<tr style="height:40">
		<th>Sr No</th>
		<!-- <th>Image</th> -->
		<th>رقم الغرفة</th>
		<th>نوع</th>
		<th>سعر</th>
		<th>بيانات</th>
		<th>تعديل</th>
		<th>حذف</th>
	</tr>
<?php 
require('../connection.php');
$i=1;
$sql=mysqli_query($con,"select * from rooms");
while($res=mysqli_fetch_assoc($sql))
{
$id=$res['room_id'];	
$img=$res['image'];
$path="../image/rooms/$img";
?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		<!-- <td><img src="<?php echo $path;?>" width="50" height="50"/></td> -->
		<td><?php echo $res['room_no']; ?></td>
		<td><?php echo $res['type']; ?></td>
		<td><?php echo $res['price']; ?></td>
		<td><?php echo $res['details']; ?></td>

		<td><a href="dashboard.php?option=update_room&id=<?php echo $id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>

		
		<td><a href="#" onclick="delRoom('<?php echo $id; ?>')"><span class="glyphicon glyphicon-remove" style='color:red'></span></a></td>
	</tr>	
<?php 	
}
?>	
	
</table>