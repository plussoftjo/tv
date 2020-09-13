<div class="contentNavi tabNavi">
				<div class="container normal">
					<div class="background-start">&nbsp;</div>
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="statistiken.php?tid=1"><span class="tabItem">دیدکلی</span></a></div>
				</div>
				<div class="container normal">
					<div class="background-start">&nbsp;</div>
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="statistiken.php?tid=31"><span class="tabItem">مهاجم</span></a></div>
				</div>
				<div class="container active">
					<div class="background-start">&nbsp;</div>
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="statistiken.php?tid=32"><span class="tabItem">مدافع</span></a></div>
				</div>
				<div class="container normal">
					<div class="background-start">&nbsp;</div>
					<div class="background-end">&nbsp;</div>
					<div class="content"><a href="statistiken.php?tid=7"><span class="tabItem">تاپ 10</span></a></div>
				</div><div class="clear"></div>
</div>
<h4 class="round">موفق ترین مدافعین</h4>
<table cellpadding="1" cellspacing="1" id="player_def" class="row_table_data">
	<thead>
		<tr><td></td><td>بازیکن</td><td>جمعیت</td><td>دهکده</td><td>امتیاز</td></tr>
	</thead>
    <tbody>
<?php
$myrank = $ranking->getUserDefRank($session->username);
if(!isset($_GET['page'])){
    if($myrank > 20){
        $_GET['page'] = intval(($myrank/20)+1);
    }else{
        $_GET['page'] = 1;
    }
}
$sql = $ranking->procUsersDefRanking();
$query = mysql_num_rows($sql);

if (isset($_GET['page'])) {
    $page = preg_replace('#[^0-9]#i', '', $_GET['page']);
} else {
    $page = 1;
} 

$itemsPerPage = 20;
$lastPage = ceil($query / $itemsPerPage);

if ($page < 1) {
    $page = 1;
} else if ($page > $lastPage) {
    $page = $lastPage;
} 

$centerPages = "";
$sub1 = $page - 1;
$sub2 = $page - 2;
$sub3 = $page - 3;
$add1 = $page + 1;
$add2 = $page + 2;
$add3 = $page + 3;

if ($page <= 1 && $lastPage <= 1) {
    $centerPages .= '<span class="number currentPage">1</span>';
	
}elseif ($page == 1 && $lastPage == 2) {
    $centerPages .= '<span class="number currentPage">' . $page . '</span> ';
    $centerPages .= '<a class="number" href="?tid=32&page=2">2</a>';
	
}elseif ($page == 1 && $lastPage == 3) {
    $centerPages .= '<span class="number currentPage">' . $page . '</span> ';
    $centerPages .= '<a class="number" href="?tid=32&page=2">2</a> ';
    $centerPages .= '<a class="number" href="?tid=32&page=3">3</a>';
	
}elseif ($page == 1) {
    $centerPages .= '<span class="number currentPage">' . $page . '</span> ';
    $centerPages .= '<a class="number" href="?tid=32&page=' . $add1 . '">' . $add1 . '</a> ';
	$centerPages .= '<a class="number" href="?tid=32&page=' . $add2 . '">' . $add2 . '</a> ... ';
	$centerPages .= '<a class="number" href="?tid=32&page=' . $lastPage . '">' . $lastPage . '</a>';
	
} else if ($page == $lastPage && $lastPage == 2) {
	$centerPages .= '<a class="number" href="?tid=32&page=1">1</a> ';
    $centerPages .= '<span class="number currentPage">' . $page . '</span>';
	
} else if ($page == $lastPage && $lastPage == 3) {
	$centerPages .= '<a class="number" href="?tid=32&page=1">1</a> ';
    $centerPages .= '<a class="number" href="?tid=32&page=2">2</a> ';
    $centerPages .= '<span class="number currentPage">' . $page . '</span>';
	
} else if ($page == $lastPage) {
	$centerPages .= '<a class="number" href="?tid=32&page=1">1</a> ... ';
    $centerPages .= '<a class="number" href="?tid=32&page=' . $sub2 . '">' . $sub2 . '</a> ';
	$centerPages .= '<a class="number" href="?tid=32&page=' . $sub1 . '">' . $sub1 . '</a> ';
    $centerPages .= '<span class="number currentPage">' . $page . '</span>';
	
} else if ($page == ($lastPage - 1) && $lastPage == 3) {
    $centerPages .= '<a class="number" href="?tid=32&page=1">1</a> ';
    $centerPages .= '<span class="number currentPage">' . $page . '</span> ';
	$centerPages .= '<a class="number" href="?tid=32&page=' . $lastPage . '">' . $lastPage . '</a>';

} else if ($page > 2 && $page < ($lastPage - 1)) {
    $centerPages .= '<a class="number" href="?tid=32&page=1">1</a> ... ';
    $centerPages .= '<a class="number" href="?tid=32&page=' . $sub1 . '">' . $sub1 . '</a> ';
    $centerPages .= '<span class="number currentPage">' . $page . '</span> ';
    $centerPages .= '<a class="number" href="?tid=32&page=' . $add1 . '">' . $add1 . '</a> ... ';
	$centerPages .= '<a class="number" href="?tid=32&page=' . $lastPage . '">' . $lastPage . '</a>';
	
}else if ($page == ($lastPage - 1)) {
    $centerPages .= '<a class="number" href="?tid=32&page=1">1</a> ... ';
    $centerPages .= '<a class="number" href="?tid=32&page=' . $sub1 . '">' . $sub1 . '</a> ';
    $centerPages .= '<span class="number currentPage">' . $page . '</span> ';
	$centerPages .= '<a class="number" href="?tid=32&page=' . $lastPage . '">' . $lastPage . '</a>';

} else if ($page > 1 && $page < $lastPage && $lastPage == 3) {
    $centerPages .= '<a class="number" href="?tid=32&page=' . $sub1 . '">' . $sub1 . '</a> ';
    $centerPages .= '<span class="number currentPage">' . $page . '</span> ';
    $centerPages .= '<a class="number" href="?tid=32&page=' . $add1 . '">' . $add1 . '</a>';
    
} else if ($page > 1 && $page < $lastPage) {
    $centerPages .= '<a class="number" href="?tid=32&page=' . $sub1 . '">' . $sub1 . '</a> ';
    $centerPages .= '<span class="number currentPage">' . $page . '</span> ';
    $centerPages .= '<a class="number" href="?tid=32&page=' . $add1 . '">' . $add1 . '</a> ... ';
	$centerPages .= '<a class="number" href="?tid=32&page=' . $lastPage . '">' . $lastPage . '</a>';
}



$paginationDisplay = "";
$nextPage = $_GET['page'] + 1;
$previous = $_GET['page'] - 1;

if ($page == "1" && $lastPage == "1"){
$paginationDisplay .=  '<img alt="صفحه اول" src="img/x.gif" class="first disabled"> ';
$paginationDisplay .=  '<img alt="صفحه قبل" src="img/x.gif" class="previous disabled">';
$paginationDisplay .= $centerPages;
$paginationDisplay .=  '<img alt="صفحه بعد" src="img/x.gif" class="next disabled"> ';
$paginationDisplay .=  '<img alt="صفحه آخر" src="img/x.gif" class="last disabled">';

}elseif ($lastPage == 0){
$paginationDisplay .=  '<img alt="صفحه اول" src="img/x.gif" class="first disabled"> ';
$paginationDisplay .=  '<img alt="صفحه قبل" src="img/x.gif" class="previous disabled">';
$paginationDisplay .= $centerPages;
$paginationDisplay .=  '<img alt="صفحه بعد" src="img/x.gif" class="next disabled"> ';
$paginationDisplay .=  '<img alt="صفحه آخر" src="img/x.gif" class="last disabled">';

}elseif ($page == "1" && $lastPage != "1"){
$paginationDisplay .=  '<img alt="صفحه اول" src="img/x.gif" class="first disabled"> ';
$paginationDisplay .=  '<img alt="صفحه قبل" src="img/x.gif" class="previous disabled">';
$paginationDisplay .= $centerPages;
$paginationDisplay .=  '<a class="next" href="?tid=32&page=' . $nextPage . '"><img alt="صفحه بعد" src="img/x.gif"></a> ';
$paginationDisplay .=  '<a class="last" href="?tid=32&page=' . $lastPage . '"><img alt="صفحه آخر" src="img/x.gif"></a>';

}elseif ($page != "1" && $page != $lastPage){
$paginationDisplay .=  '<a class="first" href="?tid=32&page=1"><img alt="صفحه اول" src="img/x.gif"></a> ';
$paginationDisplay .=  '<a class="previous" href="?tid=32&page=' . $previous . '"><img alt="صفحه قبل" src="img/x.gif"></a>';
$paginationDisplay .= $centerPages;
$paginationDisplay .=  '<a class="next" href="?tid=32&page=' . $nextPage . '"><img alt="صفحه بعد" src="img/x.gif"></a> ';
$paginationDisplay .=  '<a class="last" href="?tid=32&page=' . $lastPage . '"><img alt="صفحه آخر" src="img/x.gif"></a>';

}elseif ($page == $lastPage){
$paginationDisplay .=  '<a class="first" href="?tid=32&page=1"><img alt="صفحه اول" src="img/x.gif"></a> ';
$paginationDisplay .=  '<a class="previous" href="?tid=32&page=' . $previous . '"><img alt="صفحه قبل" src="img/x.gif"></a>';
$paginationDisplay .= $centerPages;
$paginationDisplay .=  '<img alt="صفحه بعد" src="img/x.gif" class="next disabled"> ';
$paginationDisplay .=  '<img alt="صفحه آخر" src="img/x.gif" class="last disabled">';
}

	$limit = 'LIMIT ' .($page - 1) * $itemsPerPage .',' .$itemsPerPage; 
	$sql2 = $ranking->procUsersDefRanking($limit);
    if(isset($_GET['page']) && $_GET['page'] > 1){
		$rank = ($_GET['page']-1)*20+1;
    }else{
    	$rank = 1;
    }
	while($row = mysql_fetch_array($sql2)){ 
		if($row['userid'] == $session->uid) {
			echo "<tr class=\"hl\"><td class=\"ra fc\" >".$rank.".</td>";
		}else {
			echo "<tr class=\"hover\"><td class=\"ra \" >".$rank.".</td>";
		}
		echo "<td class=\"pla \" ><a href=\"spieler.php?uid=".$row['userid']."\">".$row['username']."</a></td>";
		echo "<td class=\"pop\" >".$row['totalpop']."</td>";
		echo "<td class=\"vil\">".$row['totalvillages']."</td>";
        echo "<td class=\"dp\">".$row['dpall']."</td></tr>";
    
		$rank++;
	}


?>
	</tbody>
</table>
<?php include "ranksearch.tpl"; ?>