<?php
$vm_id = $vote['vm_id'];
$userid = $_SESSION['userid'];
$query_check_vs_select = "SELECT * FROM votes_stats WHERE vs_own = $userid AND vs_ownvm = $vm_id";
$result_check_vs_select = mysqli_query($conn, $query_check_vs_select);