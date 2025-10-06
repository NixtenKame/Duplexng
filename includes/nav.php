<?php
$current_page = $_SERVER['REQUEST_URI'];
?>

<a href="/artists/" class="<?= strpos($current_page, '/artists') === 0 ? 'active' : '' ?>">Artists</a>
<a href="/posts/" class="<?= strpos($current_page, '/posts') === 0 ? 'active' : '' ?>">Posts</a>
<a href="/pools/gallery" class="<?= strpos($current_page, '/pools/gallery') === 0 ? 'active' : '' ?>">Pools</a>
<a href="/post_sets/" class="<?= strpos($current_page, '/post_sets') === 0 ? 'active' : '' ?>">Sets</a>
<a href="/tags/" class="<?= strpos($current_page, '/tags') === 0 ? 'active' : '' ?>">Tags</a>
<a href="/blips/" class="<?= strpos($current_page, '/blips') === 0 ? 'active' : '' ?>">Blips</a>
<a href="/comments/" class="<?= strpos($current_page, '/comments') === 0 ? 'active' : '' ?>">Comments</a>
<a href="/forum_topics/" class="<?= strpos($current_page, '/forum_topics') === 0 ? 'active' : '' ?>">Forum</a>
<a href="/wiki_pages/" class="<?= strpos($current_page, '/wiki_pages') === 0 ? 'active' : '' ?>">Wiki</a>
<a href="/help/" class="<?= strpos($current_page, '/help') === 0 ? 'active' : '' ?>">Help</a>
<?php if (isset($_SESSION['user_id'])): ?>
    <a href="/static/discord/" class="<?= strpos($current_page, '/static/discord') === 0 ? 'active' : '' ?>">Discord</a>
<?php endif; ?>
<a href="/static/site_map/" class="<?= strpos($current_page, '/static/site_map') === 0 ? 'active' : '' ?>">More</a>

<?php if (isset($_SESSION['user_id'])): ?>
    <a href="/session/" class="button">Logout</a>
<?php else: ?>
    <a style="margin: 0;" href="/session/new/" class="button">Login</a><p style="color: blue; margin: 1px;">/</p>
    <a style="margin: 0;" href="/users/new/" class="button">Signup</a>
<?php endif; ?>