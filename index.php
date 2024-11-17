<?php
// Check User-Agent
$allowed_user_agents = [
    'TiviMate',
    'OTT Navigator'
];

$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';

$is_allowed = false;
foreach ($allowed_user_agents as $allowed) {
    if (stripos($user_agent, $allowed) !== false) {
        $is_allowed = true;
        break;
    }
}

if (!$is_allowed) {
    header("HTTP/1.1 403 Forbidden");
    echo "Access Denied.";
    exit;
}

// Serve M3U file
header("Content-Type: application/vnd.apple.mpegurl");
header("Content-Disposition: attachment; filename=playlist.m3u");
readfile("playlist.m3u");
?>
