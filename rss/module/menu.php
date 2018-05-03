<?php
$pageText = include __DIR__.'/../../kernel/param/textForPage.php';
return "
<menu>
    <a href=\"https://www.islandgift.ru/gift\">" . $pageText['gift']['title'] . "</a>
	<a href=\"https://www.islandgift.ru/woman\">" . $pageText['woman']['title'] . "</a>
	<a href=\"https://www.islandgift.ru/man\">" . $pageText['man']['title'] . "</a>
	<a href=\"https://www.islandgift.ru/children\">" . $pageText['children']['title'] . "</a>
	<a href=\"https://www.islandgift.ru/parent\">" . $pageText['parent']['title'] . "</a>
	<a href=\"https://www.islandgift.ru/grandma\">" . $pageText['grandma']['title'] . "</a>
	<a href=\"https://www.islandgift.ru/sweet\">" . $pageText['sweet']['title'] . "</a>
	<a href=\"https://www.islandgift.ru/picking\">" . $pageText['picking']['title'] . "</a>
	<a href=\"https://www.islandgift.ru/about\">" . $pageText['about']['title'] . "</a>
	<a href=\"https://www.islandgift.ru/articles\">" . $pageText['articles']['title'] . "</a>
</menu>
";