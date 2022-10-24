<?php
$voteid = $_GET['voteid'];
$query_vote = "SELECT * FROM votes WHERE vm_id = $voteid ";
$query_vote = mysqli_query($conn, $query_vote);
$vote = mysqli_fetch_assoc($query_vote);