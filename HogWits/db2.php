<?php


class db2 extends db
{
    public function setQueryPrepareAndSetResult( $query ) {
        $conn = $this->DBH;
        $smt = $conn->prepare( $query ) or die( "Error Prepare failure" . mysqli_error($this->DBH)) ;
        $smt->execute() or die("Error execute failed". mysqli_error($this->DBH));
        $this->result = $smt->get_result();
    }
    public function setQueryPrepareWithBind($query, $type, $param1 ) {
        //$type  -> i, s, d
        $conn = $this->DBH;
        $smt = $conn->prepare( $query )
        or die( "Error Prepare failure" . mysqli_error($this->DBH)) ;
        $smt->bind_param($type, $param1) or die("Bind failure");
        $smt->execute() or die("Error execute failed". mysqli_error($this->DBH));
        $this->result = $smt->get_result();
    }
    //following is a method to take in 5 parameters
    public function setQueryPrepareArrayParam($query, $type, $parmList ) {
        //$type  -> i, s, d
        $conn = $this->DBH;
        $smt = $conn->prepare( $query )
        or die( "Error Prepare failure" . mysqli_error($this->DBH)) ;
        if ( count( $parmList) == 1 ) {
            $smt->bind_param($type, $parmList[0]);
        } else if ( count( $parmList) == 2 ) {
            $smt->bind_param($type, $parmList[0], $parmList[1]);
        } else if ( count( $parmList) == 3 ) {
            $smt->bind_param($type, $parmList[0], $parmList[1], $parmList[2]);
        } else if ( count( $parmList) == 4 ) {
            $smt->bind_param($type, $parmList[0], $parmList[1], $parmList[2],
                $parmList[3]);
        } else if ( count( $parmList) == 5 ) {
            $smt->bind_param($type, $parmList[0], $parmList[1], $parmList[2],
                $parmList[3], $parmList[4] );
        }  else {
            print("\n Error:(setQueryPrepareArrayParm) Max parm array size 4");
        }
        $smt->execute() or die("Error execute failed". mysqli_error($this->DBH));
        $this->result = $smt->get_result();
    }
    public function getConnection(){
        $conn = $this->DBH;
        return $conn;
    }

}