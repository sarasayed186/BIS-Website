<?php
// connect with database
include "../Connections/syscon.php" ;
 //  include "../shared/nav.php";
 include "../shared/session.php";

if (isset($_POST["delete"])) {
    $id = $_POST['faqId'];
    

// deletion

$sql = "DELETE FROM `p47_faqss` WHERE `faqId` =  $id ";
$result = mysqli_query($bis,$sql);
header("Location: addFAQ.php");
	exit();
}
	

?>
<!-- closing connection -->
<?php
mysqli_close($bis);
?>
