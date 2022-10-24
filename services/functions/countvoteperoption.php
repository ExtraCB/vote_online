<?php
$vs_ownvm = $vote['vm_id'];
$vs_ownvo = $result_vote_option_count['vo_id'];

$query_count = "SELECT COUNT(vs_id) FROM `votes_stats` WHERE vs_ownvm = $vs_ownvm AND vs_ownvo = $vs_ownvo";

$result_count = mysqli_query($conn, $query_count);
$result_fetch_count = mysqli_fetch_assoc($result_count);