<form action="test.php" method="post">
   First name<input type="text" name="first_name" value="<?=$arr[0]['first_name']?>"><br>
   Last name<input type="text" name="last_name" value="<?=$arr[0]['last_name']?>"><br>
   Address<input type="text" name="address" value="<?=$arr[0]['address']?>"><br>
   
   <input type="hidden" name="id" value="<?=$arr[0]['id']?>">
   <input type="hidden" name="cmd" value="add">
   <input type="submit" value="Submit">
</form>