<?php
	// adam 20141119 JSON Data for Angular JS 
	// VendorID, Description, Logo

	require($_SERVER['DOCUMENT_ROOT'] . '/lib/dbconnect.inc.php');
	dbcms();
	$q = "SELECT VendorID, Description, AuthorizedVendorLogoImageID FROM tbl_Vendor WHERE WebView = 1 AND Status = 'Active'";
	$qrh = mssql_query($q);
	if(mssql_num_rows($qrh)) {
		while($row = mssql_fetch_assoc($qrh)) {
			$row['Logo'] = '/img/?ID=' . $row['AuthorizedVendorLogoImageID'];
			$arr[] = $row;
		}

		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		echo json_encode($arr);
	}
?>
