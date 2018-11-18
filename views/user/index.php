<h1>Users Page</h1>

<form  method="post" action="<?php echo URL; ?>user/create">
	<label>Login   </label> <input type="text" name="login">
	<label>Password</label> <input type="text" name="password">
	<label>Role    </label> 
		<select name="role"> 
			<option value="default" > Default</option>
			<option value="admin" > Admin</option>
		</select>
	<label>&nbsp;  </label> <input type="submit" >
</form>


<table>
	<?php

		foreach ($this->userList as $key => $value) {
			echo "<tr>";
				echo "<td>" .  $value['id'] . "</td>";
				echo "<td>" .  $value['login'] . "</td>";
				echo "<td>" .  $value['role']  . "</td>";
				echo '<td> <a href="#">Edit</a>  <a href="'.URL.'user/delete/'.$value['id'].'" >Delete</a>  </td>';
			echo "</tr>";

		}
	?>
</table>