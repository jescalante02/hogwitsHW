<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HogWits University</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .tablediv{
            margin-left: 50px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<h2>HogWits University</h2>
<h4>Course Listing Site</h4>
<?php


class db
{
    private $user;
    private $server;
    private $pass;
    private $dbName;
    // initially set to private
    protected $DBH;
    protected $result;

    public function __construct($server, $user, $pass, $dbName) {
        $this->user = $user;
        $this->server = $server;
        $this->pass = $pass;
        $this->dbName = $dbName;
        $this->DBH = mysqli_connect($server, $user, $pass, $dbName )
            or mydie ( "Cannot connect to $server using $user Errst="
                        .  mysqli_connect_error());
        $this->result = "";
    }
    public function setQuery( $query ) {
        $dbh= $this->DBH;
        $query = $dbh->real_escape_string($query);
        $this->result = mysqli_query( $this->DBH, $query ) or
                        die( "Query error=$query \n error:"
                                 . mysqli_error($this->DBH));
        return $this->result;
    }
    public function getResultRowAsAssoc( ) {
        $row = mysqli_fetch_array( $this->result , MYSQLI_ASSOC );
        return $row;
    }
    public function getResultAll( ) {
        $rows = mysqli_fetch_all( $this->result );
        return $rows;
    }
    public function getResultNumRows( ) {
        $nRows = mysqli_num_rows( $this->result );
        return $nRows;
    }
    public function getConnection(){
        $conn = $this->DBH;
        return $conn;
    }

}