<?php include("inc/bouncer.php"); 

if(isset($_GET['del'])){
  echo "Deleting name";
  $del = htmlspecialchars($_GET['del']);
  echo $del;
  
if ($del){
		$key = $del;
		$fc = file( "maillist.php" );
		$f = fopen( "maillist.php", "w" );
		foreach ( $fc as $line ){
				if ( !strstr($line, $key) )
						fputs( $f, $line );
		}
		fclose( $f );
		header( 'location: admin.php' );
}
}

if(isset($_GET['delm'])){
  echo "Deleting name";
  $del = htmlspecialchars($_GET['delm']);
  echo "outbox/".$del.".txt";  
  unlink("outbox/".$del.".txt");
  header( 'location: admin.php' );
}

?>
