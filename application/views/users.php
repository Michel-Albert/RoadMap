<div class="container" style="background-color: #FFFFFF">
<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Email</th>
      <th>Username</th>
      <th>Password</th>
      <th>Authority</th>
      <th>Controls</th>
    </tr>
  </thead>
  <tbody id="user_tbody">
  <?php  
    for($i=0;$i<count($data);$i++)
    {
        $checked=$data[$i]['authority'];
        echo "<tr onmouseenter='tr_users_mouseenter(this,".$i.")'>";
        echo "<th scope='row'>".($i+1)."</th>";
        echo "<td>".$data[$i]['name']."</td>";
        echo "<td>".$data[$i]['email']."</td>";
        echo "<td id='td_user_name'>".$data[$i]['username']."</td>";
        echo "<td>".$data[$i]['password']."</td>";
        echo "<td><div class='checkbox'>";
        echo "<label><input type='checkbox'";
        if($checked) echo "checked";
        echo " onclick='admin_authority(this)'>Admin</label>";
        echo "</div></td>";
        echo "<td></td></tr>";
    }
  ?>
  </tbody>
</table>
</div>