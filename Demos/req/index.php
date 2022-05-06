<?php
$uname = $_GET['uname'];
$passwd = $_GET['passwd'];
$hostname = $_GET['hostname'];
$url = '?uname=' . $uname . '&passwd=' . $passwd . '&hostname=' . $hostname
?>
<button onclick="/Demos/req/departed.php<?php echo $url;?>">View departed users</button>
<button onclick="/Demos/req/view_user.php<?php echo $url;?>">View all users</button>
<button onclick="/Demos/req/view_rooms.php<?php echo $url;?>">View all rooms</button>
<button onclick="/Demos/req/remove_room.php<?php echo $url;?>">Remove a room</button>
<button onclick="/Demos/req/remove_user.php<?php echo $url;?>">Remove a user</button>
<button onclick="/Demos/req/mk_user.php<?php echo $url;?>">Make a user</button>
<button onclick="/Demos/req/mk_room.php<?php echo $url;?>">Make a room</button>
<button onclick="/Demos/req/edit_user.php<?php echo $url;?>">Edit a user</button>
