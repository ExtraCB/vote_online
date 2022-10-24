<?php
$vm_id  = $_GET['voteid'];
$query_vote_option = "SELECT * FROM votes_option WHERE vo_ownvm = $vm_id";
$result_vote_count = mysqli_query($conn, $query_vote_option);