<?php
  /* MySQL connection */
	$gaSql['user']       = "akshay";
	$gaSql['password']   = "omsairam";
	$gaSql['db']         = "institute";
	$gaSql['server']     = "localhost";
	$gaSql['type']       = "mysql";
	
	$gaSql['link'] =  mysql_pconnect( $gaSql['server'], $gaSql['user'], $gaSql['password']  ) or
		die( 'Could not open connection to server' );
	
	mysql_select_db( $gaSql['db'], $gaSql['link'] ) or 
		die( 'Could not select database '. $gaSql['db'] );
	
	/* Paging */
	$sLimit = "";
	if ( isset( $_GET['iDisplayStart'] ) )
	{
		$sLimit = "LIMIT ".mysql_real_escape_string( $_GET['iDisplayStart'] ).", ".
			mysql_real_escape_string( $_GET['iDisplayLength'] );
	}
	
	/* Ordering */
	if ( isset( $_GET['iSortCol_0'] ) )
	{
		$sOrder = "ORDER BY  ";
		for ( $i=0 ; $i<mysql_real_escape_string( $_GET['iSortingCols'] ) ; $i++ )
		{
			$sOrder .= fnColumnToField(mysql_real_escape_string( $_GET['iSortCol_'.$i] ))."
			 	".mysql_real_escape_string( $_GET['sSortDir_'.$i] ) .", ";
		}
		$sOrder = substr_replace( $sOrder, "", -2 );
	}
	
	/* Filtering - NOTE this does not match the built-in DataTables filtering which does it
	 * word by word on any field. It's possible to do here, but concerned about efficiency
	 * on very large tables, and MySQL's regex functionality is very limited
	 */
	$sWhere = "";
	if ( $_GET['sSearch'] != "" )
	{
		/******************************EDIT HERE************************************/
		$sWhere = "WHERE ID LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ".
		                "COURSE LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ".
		                "START LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ".
		                "END LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ".
				"STRENGTH LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ".
				"ADMISSIONS LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ".
		                "ENQUIRIES LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%'";
	}
	/******************************EDIT HERE************************************/
	$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS ID, COURSE, START, END, STRENGTH, ADMISSIONS, ENQUIRIES
		FROM   batches
		$sWhere
		$sOrder
		$sLimit
	";
	$rResult = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	
	$sQuery = "
		SELECT FOUND_ROWS()
	";
	$rResultFilterTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
	$iFilteredTotal = $aResultFilterTotal[0];
	
	$sQuery = "
		SELECT COUNT(ID)
		FROM   batches
	";
	$rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	$aResultTotal = mysql_fetch_array($rResultTotal);
	$iTotal = $aResultTotal[0];
	
	$sOutput = '{';
	$sOutput .= '"sEcho": '.intval($_GET['sEcho']).', ';
	$sOutput .= '"iTotalRecords": '.$iTotal.', ';
	$sOutput .= '"iTotalDisplayRecords": '.$iFilteredTotal.', ';
	$sOutput .= '"aaData": [ ';
	while ( $aRow = mysql_fetch_array( $rResult ) )
	{
		$sOutput .= "[";
		$sOutput .= '"'.addslashes($aRow['ID']).'",';
		$sOutput .= '"'.addslashes($aRow['COURSE']).'",';
		$sOutput .= '"'.addslashes($aRow['START']).'",';
		$sOutput .= '"'.addslashes($aRow['END']).'",';
		$sOutput .= '"'.addslashes($aRow['STRENGTH']).'",';
		$sOutput .= '"'.addslashes($aRow['ADMISSIONS']).'",';
		$sOutput .= '"'.addslashes($aRow['ENQUIRIES']).'"';
		$sOutput .= "],";
	}
	$sOutput = substr_replace( $sOutput, "", -1 );
	$sOutput .= '] }';
	
	echo $sOutput;
	
	
	function fnColumnToField( $i )
	{
		if ( $i == 0 )
			return "ID";
		else if ( $i == 1 )
			return "COURSE";
		else if ( $i == 2 )
			return "START";
		else if ( $i == 3 )
			return "END";
		else if ( $i == 4 )
			return "STRENGTH";
		else if ( $i == 5 )
			return "ADMISSIONS";
		else if ( $i == 6 )
			return "ENQUIRIES";
	}
?>