<?php

	include("DBPROP.php");

    $con; // The connection object

    /**
    *   Creates a connection to the database using the configuration file.
    */
	function connect() {
		global $con;
        $con = new mysqli(DB_HOST_TEST, DB_USER, DB_PASS, DB_NAME);
        if($con->connect_error){
            trigger_error('Database connection failed: '  . $con->connect_error, E_USER_ERROR);
        }
	}

    /**
    *   Used for connecting to a different database on the same server/host.  Requires config file to be set up.
    */
    function connect_db_name($db_name) {
        global $con; 
        $con = new mysqli(DB_HOST_TEST, DB_USER, DB_PASS, $db_name);
        if($con->connect_error){
            trigger_error('Database connection failed: '  . $con->connect_error, E_USER_ERROR);
        }
    }

    /**
    *   A manual database connection function using user supplied params.
    */
	function connect_override($host, $user, $pass, $db_name){
		global $con;
        $con = new mysqli($host, $user, $pass, $db_name);
        if($con->connect_error){
            trigger_error('Database connection failed: '  . $con->connect_error, E_USER_ERROR);
        }
	}

	/**
    *   Sanitizes any given input.  Specifically, removes all excess whitespace and slashes, converts 
    *   special HTML chars into UTF format, escapes appostrophes and throws out any text that looks like sql.
    *   Testing for sql reserved words can be turned off by calling sanitize($data, false).
    *
    *   @return The sanitized string or null.
    *   @param $data: The string to sanitize.
    */
    function sanitize($data, $TEST_FOR_SQL = true) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = str_replace("'", "\'", $data); //escape apostrophes so user-input strings will query properly

        if($TEST_FOR_SQL){
            $tempdata = strtolower($data);
                             
            //Throw away any input that looks like sql
            if(strpos($tempdata, 'delete') !== false ||
                strpos($tempdata, 'insert') !== false ||
                strpos($tempdata, 'update') !== false ||
                strpos($tempdata, 'select') !== false){
                       
                $data = "";
            }
        }
                   
        return $data;
    }

    /**
    *   Returns a result set object if the passed query is well formed.  Returns false if the
    *   database connection hasn't been made or an error exists in the query
    */
    function query($sql){
        global $con;

        // Return false if we haven't connected to the database yet.
        if($con == null){
            return false;
        }

        // Execute the query, check for a well formed query, and return the result set or false.
        $rsltSet = $con -> query($sql);
        if($rsltSet === false){
            trigger_error('Error -> Query executed: '.$sql.' Result: '.$rslt.' Message: ' . $con->error, E_USER_ERROR);

            return false;
        }

        return $rsltSet;
    }

    function close_con(){
        global $con;

        if($con != null){
            $con -> close();
        }
    }
?>