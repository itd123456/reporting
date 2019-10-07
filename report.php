<?php

class Report{
    // private $host="192.168.0.26";

    // private $user="saprog";

    // private $db="GLOBAL_SOFIADB";

    // private $pass="SQL@2012!";

    // private $conn;

    
    private $host="192.168.0.116";
    private $user="sa";
    private $pass = '1234';
    private $db="GLOBAL_SOFIADB";
    private $conn;

    //     private $host="localhost";
    // private $user="DESKTOP-OT75CAB";
    // private $pass = '';
    // private $db="GLOBAL_SOFIADB";
    // private $conn;
    // private $hostJeon="192.168.0.3, 12888";
    // private $userJeon="sa";
    // private $dbJeon="globaldom";
    // private $passJeon="gdfiadmin";


    private $connJeon;
    private $hostJeon="192.168.0.116"; //testserver
    private $userJeon="sa";
        private $passJeon="1234";

    private $dbJeon="globaldom"; 

    // private $hostJeon="localhost"; //testserver
    // private $userJeon="DESKTOP-OT75CAB";
    // private $passJeon="";

    // private $dbJeon="globaldom"; 
    // private $connJeon;
    // private $hostReporting="192.168.0.116";
    // private $userReporting="sa";
    // private $dbReporting="GLOBAL_SOFIADB";
    // private $passReporting="1234";
    // private $connReporting;


    //     private $connJeon;
    // private $hostReporting="192.168.0.116";
    // private $userReporting="sa";
    // private $dbReporting="GLOBAL_SOFIADB";
    // private $passReporting="1234";
    // private $connReporting;


    public function __construct(){
        // $this->connJeon =  new PDO("sqlsrv:server=".$this->hostJeon.";Database=".$this->dbJeon, $this->userJeon, $this->passJeon);
        $this->connJeon=  new PDO("sqlsrv:server=".$this->hostJeon.";Database=".$this->dbJeon, $this->userJeon, $this->passJeon);
        $this->conn=  new PDO("sqlsrv:server=".$this->host.";Database=".$this->db, $this->user, $this->pass);
        // $this->conn =  new PDO("mysql=".$this->host.";Database=".$this->db, $this->user, $this->pass);
        //$this->connReporting = new PDO("mysql:serve=".$this->$hostname.";dbname=".$this->dbReporting."",$this->userReporting,$this->passReporting);
        // $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->pass);
 }

    public function updateBranch(){
        $sql = "select top 102 * from LM_LOAN where LOAN_CO = :LOAN_CO";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(
            ':LOAN_CO' => 0
        ));
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $k => $v){

      
            $stmtUpdate = $this->conn->prepare("UPDATE LM_LOAN set LOAN_BR = :LOAN_BR, 
            LOAN_PN_NUMBER = :LOAN_PN_NUMBER2, LOAN_BORROWER_CODE = :LOAN_BORROWER_CODE where LOAN_PN_NUMBER = :LOAN_PN_NUMBER");
            for($i=0;$i<102;$i++){
                $LOAN_PN_NUMBER = $data[$i]['LOAN_PN_NUMBER'];
                $LOAN_BR = "";
                $LOAN_PN_NUMBER2 = "";
                $CODE = "";

                $lastchar = substr($data[$i]['LOAN_PN_NUMBER'], -4);
                $lastcharCode = substr($data[$i]['LOAN_PN_NUMBER'], -6);
                if($data[$i]['LOAN_BR'] == 'HOF' ){
                    $LOAN_BR = '100';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'LPS'){
                    $LOAN_BR = '206';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'PAM'){
                    $LOAN_BR = '313';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'QC'){
                    $LOAN_BR = '108';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'MKT'){
                    $LOAN_BR = '200';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                }elseif($data[$i]['LOAN_BR'] == 'MNL'){
                    $LOAN_BR = '201';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'CAV'){
                    $LOAN_BR = '202';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                }elseif($data[$i]['LOAN_BR'] == 'BAG'){
                    $LOAN_BR = '300';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'CEB'){
                    $LOAN_BR = '401';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'BAL'){
                    $LOAN_BR = '302';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'ILO'){
                    $LOAN_BR = '404';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'BAC'){
                    $LOAN_BR = '400';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'CDO'){
                    $LOAN_BR = '501';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'DAV'){
                    $LOAN_BR = '502';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'TEST'){
                    $LOAN_BR = '405';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'TAR'){
                    $LOAN_BR = '316';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'CAB'){
                    $LOAN_BR = '304';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar;
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode; 
                }elseif($data[$i]['LOAN_BR'] == 'TLC'){
                    $LOAN_BR = '316';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'GEN'){
                    $LOAN_BR = '503';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'TS'){
                    $LOAN_BR = '108';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'BAT'){
                    $LOAN_BR = '303';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'LIP'){
                    $LOAN_BR = '207';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'DAG'){
                    $LOAN_BR = '305';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'TAG'){
                    $LOAN_BR = '505';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'DUM'){
                    $LOAN_BR = '403';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'CAI'){
                    $LOAN_BR = '102';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'TGM'){
                    $LOAN_BR = '505';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'SAN'){
                    $LOAN_BR = '314';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'BUT'){
                    $LOAN_BR = '500';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'TUG'){
                    $LOAN_BR = '317';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'KOR'){
                    $LOAN_BR = '504';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'INT'){
                    $LOAN_BR = '205';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'POE'){
                    $LOAN_BR = '105';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'BLR'){
                    $LOAN_BR = '301';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }elseif($data[$i]['LOAN_BR'] == 'MAR'){
                    $LOAN_BR = '104';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }
                elseif($data[$i]['LOAN_BR'] == 'ROS'){
                    $LOAN_BR = 'ROS';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }
                elseif($data[$i]['LOAN_BR'] == 'LTD'){
                    $LOAN_BR = '308';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }
                elseif($data[$i]['LOAN_BR'] == 'TNY'){
                    $LOAN_BR = '107';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar;
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode; 
                }
                elseif($data[$i]['LOAN_BR'] == 'MEY'){
                    $LOAN_BR = '311';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }
                elseif($data[$i]['LOAN_BR'] == 'TAC'){
                    $LOAN_BR = '407';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }
                elseif($data[$i]['LOAN_BR'] == 'TBL'){
                    $LOAN_BR = '408';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar; 
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }
                elseif($data[$i]['LOAN_BR'] == 'IMS'){
                    $LOAN_BR = '204';
                    $LOAN_PN_NUMBER2 = 'JE'.$LOAN_BR.'201900'.$lastchar;
                    $CODE = '0000'.$LOAN_BR.'2019'.$lastcharCode;
                }

                $stmtUpdate->execute(array(
                    ':LOAN_BR' => $LOAN_BR,
                    ':LOAN_PN_NUMBER' => $LOAN_PN_NUMBER,
                    ':LOAN_PN_NUMBER2' => $LOAN_PN_NUMBER2,
                    ':LOAN_BORROWER_CODE' => $CODE
                ));

                if($stmtUpdate){
                    echo '*--^^--___---^^--*';
                }else{
                    echo 'Failed';
                }
    
            }
        }
    }

  
  
    
    public function getUpdate(){

        $sql = "SELECT top 102 * FROM LM_LOAN WHERE LOAN_CO = :LOAN_CO";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(
            ':LOAN_CO' => 0
        ));
        $data =  $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $k => $v){

        $stmtUpdate = $this->conn->prepare("UPDATE LM_LOAN set LOAN_PN_NUMBER = :LOAN_PN_NUMBER2
        where LOAN_PN_NUMBER = :LOAN_PN_NUMBER AND LOAN_CO = :LOAN_CO");
    $zero = "00000";
     for($i = 0;$i<102;$i++){   
    if($i == 10){
        $zero = "0000";
    }else if($i == 100){
        $zero = "000";
    }else if($i == 1000){
        $zero = "00";
    }
    $year = '2019';
        $LOAN_PN_NUMBER2 = 'JE100'.$year.$zero.$i;

        $stmtUpdate->execute(array(
            ':LOAN_PN_NUMBER' => $data[$i]['LOAN_PN_NUMBER'],
            ':LOAN_PN_NUMBER2' => $LOAN_PN_NUMBER2,
            ':LOAN_CO' => 0
        ));
        if($stmtUpdate){
            echo 'Record '.$i.' updated ^"&SX*/*-/';
      
        }else{
            echo 'Record '.$i.' failed to update <br>';
     
        }
    }
}
    }
    public function get(){      
        $sql = "select TOP 102 *, tblCrecoms.Code as CrecomsId, 
        tblBranches.code as branCode,
		tblPersonalInfos.Code as persoCode,
        tblProductTypes.code as protypeCode,
		tblAccountOfficers.Code as accOcode        
        from tblloans
        LEFT JOIN tblJournals on
        tblloans.JournalVoucherId = tblJournals.Id
		LEFT JOIN tblAccountOfficers on
		tblloans.AccountOfficerId = tblAccountOfficers.Id
        LEFT JOIN tblProductTypes on
        tblloans.ProductTypeId = tblProductTypes.Id
        LEFT JOIN tblLoanConsultants on
        tblloans.ConsultantId = tblLoanConsultants.Id
        LEFT JOIN tblBranches on
        tblloans.BranchId = tblBranches.id 
        LEFT JOIN tblPersonalInfos on
        tblloans.PersonalInfoId = tblPersonalInfos.id
        LEFT JOIN tblCrecoms on
        tblloans.CrecomId = tblCrecoms.Id where tblloans.PNNo IS NOT NULL AND year(tblloans.LastPaymentDate) >= 1900 AND 
        tblLoans.OutStandingBalance >=1 and tblBranches.code = 'HOF'";
        $stmt = $this->connJeon->prepare($sql);
        $stmt->execute(array());
        $data =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        $transfer = array();
        foreach($data as $k => $v){
            $data[$k] = $v;
        }
        $success = '123131';
        if($data){
            if($success){
                        foreach($data as $k => $v){

                            $count = count($data);
                            for ($i = 0; $i < 102; $i++) {
                            $c = 0;
                        $output2 = $v['ApprovedDate'];
                        $output3 = $v['SubjectNo'];
                        $output4 = $v['LoanAmount'];
                        $output5 = $v['InterestRate'];
                        $output6 = $v['TotalInterest'];
                        $output7 = $v['GracePeriod'];
                        $output8 = $v['Code'];
                        $output9 = $v['PNValue'];
                        $output10 = $v['ApprovedAmount'];
                        $output11 = $v['LoanStatusId'];
                        $output12 = $v['AdditionalInterestAmount'];
                        $output13 = $v['AdditionalInterestDays'];
                        $output14 = $v['DefaultFirstDueDate'];
                        $output15 = $v['DefaultMaturityDate'];
                        $output16 = $v['OutstandingBalance'];
                        $output17 = $v['LastPaymentDate'];
                        $output18 = $v['CreationDate'];
                        $output19 = $v['CrecomsId'];
                        $output20 = $v['LoanClassId'];
                        $output21 = $v['NoOfMonths'];
                        $output22 = $v['PaymentModeId'];
                        $output23 = $v['LoanClassId'];
                        try {
                        $sstmt = $this->conn->prepare("INSERT INTO LM_LOAN(LOAN_HO,
                        LOAN_CO,
                        LOAN_BR,
                        LOAN_PN_NUMBER,
                        LOAN_APP_CODE,
                        LOAN_APP_TYPE,
                        LOAN_APP_DATE,
                        LOAN_PRODUCT_CODE,
                        LOAN_AMOUNT,
                        LOAN_ADDON,
                        LOAN_INTEREST_RATE,
                        LOAN_INTEREST_AMOUNT,
                        LOAN_GRACE_PERIOD,
                        LOAN_BORROWER_CODE,
                        LOAN_CHARGESTOTAL,
                        LOAN_PNVALUE,
                        LOAN_MONTHLYAMORT,
                        LOAN_NETPROCEEDS,
                        LOAN_REF_PN_NUMBER,
                        LOAN_PREV_BALANCE,
                        LOAN_APPL_INSTRUCTIONS,
                        LOAN_NEEDED_DATE,
                        LOAN_RELEASED_DATE,
                        LOAN_AMOUNT_APPLIED,
                        LOAN_TERMS_APPLIED,
                        LOAN_TERMS_APPROVED,
                        LOAN_AMOUNT_APPROVED,
                        LOAN_INTERESTRATE_APPROVED,
                        LOAN_AO_CODE,
                        LOAN_ENCODED_DATE,
                        LOAN_REMARKS,
                        LOAN_FINANCE_CHARGES,
                        LOAN_STATUS,
                        LOAN_ADDT_INTEREST,
                        LOAN_ADDT_INTEREST_DAYS,
                        LOAN_FIRST_DUEDATE,
                        LOAN_LAST_DUEDATE,
                        LOAN_OBALANCE,
                        LOAN_LASTPAYMENT_DATE,
                        LOAN_DATECREATED,
                        LOAN_CREMAN_CODE,
                        LOAN_TERMS,
                        LOAN_PAYMENT_MODE
                        )VALUES(:LOAN_HO,
                        :LOAN_CO,
                        :LOAN_BR,
                        :LOAN_PN_NUMBER,
                        :LOAN_APP_CODE,
                        :LOAN_APP_TYPE,
                        :LOAN_APP_DATE,
                        :LOAN_PRODUCT_CODE,
                        :LOAN_AMOUNT,
                        :LOAN_ADDON,
                        :LOAN_INTEREST_RATE,
                        :LOAN_INTEREST_AMOUNT,
                        :LOAN_GRACE_PERIOD,
                        :LOAN_BORROWER_CODE,
                        :LOAN_CHARGESTOTAL,
                        :LOAN_PNVALUE,
                        :LOAN_MONTHLYAMORT,
                        :LOAN_NETPROCEEDS,
                        :LOAN_REF_PN_NUMBER,
                        :LOAN_PREV_BALANCE,
                        :LOAN_APPL_INSTRUCTIONS,
                        :LOAN_NEEDED_DATE,
                        :LOAN_RELEASED_DATE,
                        :LOAN_AMOUNT_APPLIED,
                        :LOAN_TERMS_APPLIED,
                        :LOAN_TERMS_APPROVED,
                        :LOAN_AMOUNT_APPROVED,
                        :LOAN_INTERESTRATE_APPROVED,
                        :LOAN_AO_CODE,
                        :LOAN_ENCODED_DATE,
                        :LOAN_REMARKS,
                        :LOAN_FINANCE_CHARGES,
                        :LOAN_STATUS,
                        :LOAN_ADDT_INTEREST,
                        :LOAN_ADDT_INTEREST_DAYS,
                        :LOAN_FIRST_DUEDATE,
                        :LOAN_LAST_DUEDATE,
                        :LOAN_OBALANCE,
                        :LOAN_LASTPAYMENT_DATE,
                        :LOAN_DATECREATED,
                        :LOAN_CREMAN_CODE,
                        :LOAN_TERMS,
                        :LOAN_PAYMENT_MODE
                        )"
                    );
                        $sstmt->bindParam(':LOAN_HO', $LOAN_HO);
                        $sstmt->bindParam(':LOAN_CO', $LOAN_CO);
                        $sstmt->bindParam(':LOAN_BR', $LOAN_BR);

                        $sstmt->bindParam(':LOAN_PN_NUMBER', $LOAN_PN_NUMBER);
                        $sstmt->bindParam(':LOAN_APP_CODE', $LOAN_APP_CODE);
                        $sstmt->bindParam(':LOAN_APP_TYPE', $LOAN_APP_TYPE);
                        $sstmt->bindParam(':LOAN_APP_DATE',$LOAN_APP_DATE);
                        $sstmt->bindParam(':LOAN_PRODUCT_CODE',$LOAN_PRODUCT_CODE);
                        $sstmt->bindParam(':LOAN_AMOUNT',$LOAN_AMOUNT);
                        $sstmt->bindParam(':LOAN_ADDON',$LOAN_ADDON);
                        $sstmt->bindParam(':LOAN_INTEREST_RATE',$LOAN_INTEREST_RATE);
                        $sstmt->bindParam(':LOAN_INTEREST_AMOUNT',$LOAN_INTEREST_AMOUNT);
                        $sstmt->bindParam(':LOAN_GRACE_PERIOD',$LOAN_GRACE_PERIOD);

                        $sstmt->bindParam(':LOAN_BORROWER_CODE',$LOAN_BORROWER_CODE);
                        $sstmt->bindParam(':LOAN_CHARGESTOTAL',$LOAN_CHARGESTOTAL);
                        $sstmt->bindParam(':LOAN_PNVALUE',$LOAN_PNVALUE);
                        $sstmt->bindParam(':LOAN_MONTHLYAMORT',$LOAN_MONTHLYAMORT);
                        $sstmt->bindParam(':LOAN_NETPROCEEDS',$LOAN_NETPROCEEDS);
                        $sstmt->bindParam(':LOAN_REF_PN_NUMBER',$LOAN_REF_PN_NUMBER);
                        $sstmt->bindParam(':LOAN_PREV_BALANCE',$LOAN_PREV_BALANCE);
                        $sstmt->bindParam(':LOAN_APPL_INSTRUCTIONS',$LOAN_APPL_INSTRUCTIONS);
                        $sstmt->bindParam(':LOAN_NEEDED_DATE',$LOAN_NEEDED_DATE);
                        $sstmt->bindParam(':LOAN_RELEASED_DATE',$LOAN_RELEASED_DATE);
                        $sstmt->bindParam(':LOAN_AMOUNT_APPLIED',$LOAN_AMOUNT_APPLIED);
                        $sstmt->bindParam(':LOAN_TERMS_APPLIED',$LOAN_TERMS_APPLIED);
                        $sstmt->bindParam(':LOAN_TERMS_APPROVED',$LOAN_TERMS_APPROVED);
                        $sstmt->bindParam(':LOAN_AMOUNT_APPROVED',$LOAN_AMOUNT_APPROVED);
                        $sstmt->bindParam(':LOAN_INTERESTRATE_APPROVED',$LOAN_INTERESTRATE_APPROVED);
                        $sstmt->bindParam(':LOAN_AO_CODE',$LOAN_AO_CODE);
                        $sstmt->bindParam(':LOAN_ENCODED_DATE',$LOAN_ENCODED_DATE);
                        $sstmt->bindParam(':LOAN_REMARKS',$LOAN_REMARKS);
                        $sstmt->bindParam(':LOAN_FINANCE_CHARGES',$LOAN_FINANCE_CHARGES);
                        $sstmt->bindParam(':LOAN_STATUS',$LOAN_STATUS);
                        $sstmt->bindParam(':LOAN_ADDT_INTEREST',$LOAN_ADDT_INTEREST);
                        $sstmt->bindParam(':LOAN_ADDT_INTEREST_DAYS',$LOAN_ADDT_INTEREST_DAYS);
                        $sstmt->bindParam(':LOAN_FIRST_DUEDATE',$LOAN_FIRST_DUEDATE);
                        $sstmt->bindParam(':LOAN_LAST_DUEDATE',$LOAN_LAST_DUEDATE);
                        $sstmt->bindParam(':LOAN_OBALANCE',$LOAN_OBALANCE);
                        $sstmt->bindParam(':LOAN_LASTPAYMENT_DATE',$LOAN_LASTPAYMENT_DATE);
                        $sstmt->bindParam(':LOAN_DATECREATED',$LOAN_DATECREATED);
                        $sstmt->bindParam(':LOAN_CREMAN_CODE',$LOAN_CREMAN_CODE);
                        $sstmt->bindParam(':LOAN_TERMS',$LOAN_TERMS);
                        $sstmt->bindParam(':LOAN_PAYMENT_MODE',$LOAN_PAYMENT_MODE);
                        $MFIN_TRANS_ID = '00'.$i;
                        $LOAN_HO = $c;
                        $LOAN_CO = $c;
                        $LOAN_BR = $v['branCode'];
                        $LOAN_APP_CODE = $c;
                        $year = '2019';
                        $LOAN_PN_NUMBER = $v['PNNo'];
                        $LOAN_APP_DATE = $output2;
                        $LOAN_PRODUCT_CODE = '0202-'.$output3;
                        $LOAN_AMOUNT = $output4;
                        $LOAN_ADDON = $v['AdditionalInterestDays'];
                        $LOAN_INCLUDE_ADDON = $v['AdditionalInterestAmount'];
                        $LOAN_INTEREST_RATE = $output5;
                        $LOAN_INTEREST_AMOUNT = $output6;
                        $LOAN_GRACE_PERIOD =$output7;
                        
                        $seq = "";
                        if($k < 10){
                        $seq = '0000000'.$k;
                         }elseif($k < 100){
                            $seq = '000000'.$k;
                         }elseif($k < 1000){
                            $seq = '00000'.$k;
                         }elseif($k < 10000){
                            $seq = '0000'.$k;
                         }

                        $LOAN_BORROWER_CODE = '00001002019'.$seq;
                        // $LOAN_BORROWER_CODE = $output8;
                        $LOAN_CHARGESTOTAL = $v['TotalAmortizedCharges'];
                        $LOAN_PNVALUE = $output9;
                        $LOAN_MONTHLYAMORT = $v['Amortization'];
                        $LOAN_NETPROCEEDS = $v['NetProceedAmount'];
                        $LOAN_REF_PN_NUMBER = $v['ReferenceNo'];
                        $LOAN_PREV_BALANCE = $v['OutstandingBalance'];
                        $LOAN_APPL_INSTRUCTIONS = $v['LastDiaryComment'];
                        $LOAN_NEEDED_DATE = $v['ConfirmDateTime'];
                        $LOAN_RELEASED_DATE = $v['CheckPreparedDateTime'];
                        $LOAN_AMOUNT_APPLIED = $v['AmortizationPaid'];
                        $LOAN_TERMS_APPLIED = $v['NoOfMonths'];
                        $LOAN_TERMS_APPROVED = $v['NoOfMonths'];
                        $LOAN_AMOUNT_APPROVED = $output10;
                        $LOAN_INTERESTRATE_APPROVED = $v['InterestRate'];
                        $LOAN_AO_CODE = $v['accOcode'];
                        $LOAN_CREMAN_CODE = $v['CrecomsId'];
                        $LOAN_DATECREATED = $v['CreationDate'];
                        $LOAN_ENCODED_DATE = $v['CreationDate'];
                        $LOAN_REMARKS = $v['ReleasingRemarks'];
                        $LOAN_FINANCE_CHARGES['AddOnChargeAmount'];       
                        $LOAN_STATUS = $output11;
                        $LOAN_ADDT_INTEREST = $output12;
                        $LOAN_ADDT_INTEREST_DAYS = $output13;
                        $LOAN_FIRST_DUEDATE = $output14;
                        $LOAN_LAST_DUEDATE = $output15;
                        $LOAN_OBALANCE = $output16;
                        $LOAN_LASTPAYMENT_DATE = $output17;
                        $CrecomsId = $output18;
                        $LOAN_APP_TYPE = $output20;
                        $LOAN_TERMS = $output21;
                        $LOAN_PAYMENT_MODE = $output22;
                        $sstmt->execute();
                        $c++;

                        if($sstmt){
                            echo 'Record '.$i.' success <br>';
                            // echo 10;
                        }else{
                            echo 'Record '.$i.' failed <br>';
                            // echo 01;
                        }
                      
                        // $stmtDelete = $this->conn->prepare("DELETE FROM LM_LOAN WHERE LOAN_PN_NUMBER = :LOAN_PN_NUMBER");
                        // $stmtDelete->execute(array(
                        //     ':LOAN_PN_NUMBER' => $v['PNNo']
                        // ));

                        // if($stmtDelete){
                        //     // echo 'Record '.$i.' deleted <br>';
                        //     echo 10;
                        // }else{
                        //     echo 10;
                        //     // echo 'Record '.$i.' failed to deletea <br>';
                        // }




                    } catch (PDOException $e) {
                        print $e->getMessage ();
                    }
                    
                    }
                }
            }
            
        }else{
        }
    }
    public function PR_BORROWERS(){
        $sql = "select top 102 *,tblBranches.code as branCode from tblloans LEFT JOIN tblPersonalInfos on 
        tblloans.PersonalInfoId = tblPersonalInfos.Id 
        LEFT JOIN tblBranches on
        tblloans.BranchId = tblBranches.id 
        where year(tblloans.LastPaymentDate) >= 1900 AND tblLoans.OutStandingBalance >=1 and tblBranches.code = 'HOF'";
        $stmt = $this->connJeon->prepare($sql);
        $stmt->execute(array());
        $data =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        $transfer = array();
        foreach($data as $k => $v){
            $data[$k] = $v;
        }
        $success = '123131';
        if($data){
              if($success){
                foreach($data as $k => $v){
                    
                    $count = count($data);
                    for ($i = 0; $i < 102; $i++) {
                        $c = 0;
                        try {
                        $sstmt = $this->conn->prepare("INSERT INTO PR_BORROWERS(
                            BORR_HO,
                            BORR_CO,
                            BORR_BR,
                            BORR_CODE,
                            BORR_LAST_NAME,
                            BORR_FIRST_NAME,
                            BORR_MIDDLE_NAME,
                            BORR_SUFFIX,
                            BORR_BIRTH_DATE,
                            BORR_CIVIL_STATUS,
                            BORR_GENDER,
                            BORR_ADDRESS,
                            BORR_EMAIL,
                            BORR_EDUCATION,
                            BORR_COURSE,
                            BORR_CREATED_DATE
                        )VALUES(
                            :BORR_HO,
                            :BORR_CO,
                            :BORR_BR,
                            :BORR_CODE,
                            :BORR_LAST_NAME,
                            :BORR_FIRST_NAME,
                            :BORR_MIDDLE_NAME,
                            :BORR_SUFFIX,
                            :BORR_BIRTH_DATE,
                            :BORR_CIVIL_STATUS,
                            :BORR_GENDER,
                            :BORR_ADDRESS,
                            :BORR_EMAIL,
                            :BORR_EDUCATION,
                            :BORR_COURSE,
                            :BORR_CREATED_DATE
                        )"
                    );                                   
                    $BORR_HO = '00';
                    $BORR_CO = '00';
                    // $BORR_BR = '100';
                    $BORR_BR = $v['branCode'];
                               
                    $seq = "";
                    if($k < 10){
                    $seq = '0000000'.$k;
                     }elseif($k < 100){
                        $seq = '000000'.$k;
                     }elseif($k < 1000){
                        $seq = '00000'.$k;
                     }elseif($k < 10000){
                        $seq = '0000'.$k;
                     }

                    $BORR_CODE = '00001002019'.$seq;
                    $output = $v['LastName'];
                    $output2 = $v['FirstName'];
                    $output3 = $v['MiddleName'];
                    $output4 = $v['SuffixName'];
                    $output5 = $v['BirthDate'];
                    $output6 = $v['CivilStatusId'];
                    $output7 = $v['GenderId'];
                    $output8 = $v['PresentAddrNo'];
                    $output9 = $v['PresentAddrLengthOfStay'];
                    $output10 = $v['HomePhone'];
                    $output11 = $v['Cellphone'];
                    $output12 = $v['EmailAddr'];
                    $output13 = $v['EducationCourse'];
                    $output14 = $v['EducationCourse'];
                    $output15 = $v['CreationDate'];
                        $sstmt->bindParam(':BORR_HO',$BORR_HO);
                        $sstmt->bindParam(':BORR_CO',$BORR_CO);
                        $sstmt->bindParam(':BORR_BR',$BORR_BR);
                        $sstmt->bindParam(':BORR_CODE',$BORR_CODE);
                        $sstmt->bindParam(':BORR_LAST_NAME', $output);
                        $sstmt->bindParam(':BORR_FIRST_NAME', $output2);
                        $sstmt->bindParam(':BORR_MIDDLE_NAME', $output3);
                        $sstmt->bindParam(':BORR_SUFFIX', $output4);
                        $sstmt->bindParam(':BORR_BIRTH_DATE', $output5);
                        $sstmt->bindParam(':BORR_CIVIL_STATUS', $output6);
                        $sstmt->bindParam(':BORR_GENDER', $output7);
                        $sstmt->bindParam(':BORR_ADDRESS',$output8);
                        $sstmt->bindParam(':BORR_EMAIL', $output12);
                        $sstmt->bindParam(':BORR_EDUCATION', $output13);
                        $sstmt->bindParam(':BORR_COURSE', $output14);
                        $sstmt->bindParam(':BORR_CREATED_DATE', $output15);                                           
                        $sstmt->execute();
                        $c++;
                    } catch (PDOException $e) {
                        print $e->getMessage ();
                    }
                        if($sstmt){
                            // echo 'Record '.$i.' saved ';
                            echo rand(0,1).rand(0,1);
                        }else{
                            // echo 'Record '.$i.' failed to save';
                            echo "Failed";
                        }
                    }
                }                      
            }            
        }else{
        }
    }
    public function getTransmasterCode(){
        $sql = "SELECT TOP 102 * from LM_LOAN";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array());
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $k => $v){
            $stmtUpdate = $this->conn->prepare("UPDATE FI_FINANCETRANS_MASTER set MFIN_BORROWER_CODE = :MFIN_BORROWER_CODE
            WHERE MFIN_PN_NUMBER = :MFIN_PN_NUMBER");

        $count = count($data);
            for ($i = 0; $i < 102; $i++) {
            
                $stmtUpdate->execute(array(
                    'MFIN_PN_NUMBER' => $data[$i]['LOAN_PN_NUMBER'],
                    'MFIN_BORROWER_CODE' => $data[$i]['LOAN_BORROWER_CODE']
                ));

                if($stmtUpdate){
                    echo rand(0,1).rand(0,1);
                }else{
                    echo 'Error '.$k;
                }
            }           
        }
    }

    public function getTransmaster(){

        $sql = "SELECT top 102 * FROM FI_FINANCETRANS_MASTELMR";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array());
        $data =  $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $k => $v){

        $stmtUpdate = $this->conn->prepare("UPDATE FI_FINANCETRANS_MASTER set MFIN_PN_NUMBER = :LOAN_PN_NUMBER2
        where MFIN_PN_NUMBER = :LOAN_PN_NUMBER");
    $zero = "00000";
     
    $count = count($data);
    for ($i = 0; $i < 102; $i++) {
    if($i == 10){
        $zero = "0000";
    }else if($i == 100){
        $zero = "000";
    }else if($i == 1000){
        $zero = "00";
    }
    $year = '2019';
        $LOAN_PN_NUMBER2 = 'JE100'.$year.$zero.$i;

        $stmtUpdate->execute(array(
            ':LOAN_PN_NUMBER' => $data[$i]['MFIN_PN_NUMBER'],
            
            ':LOAN_PN_NUMBER2' => $LOAN_PN_NUMBER2
        ));
        if($stmtUpdate){
            echo 'Record '.$i.' updated ^"&SX*/*-/';
      
        }else{
            echo 'Record '.$i.' failed to update <br>';
     
        }
    }
}
    }

    public function TRANSMASTER(){
        $sql = "select top 102 *, tblLoanPayments.date, tblloans.PNNo, tblLoanPayments.CheckNo, 
        tblLoanPayments.Amount, tblLoanPayments.RefNo, tblLoanPayments.ORNo, 
        tblLoanPayments.BankId, tblLoanPayments.Balance, tblBranches.code as branCode,
        tblLoanPayments.CheckDepositDate, tblLoanPayments.Comments,
        tblLoanPayments.Penalty,
        tblLoanPayments.ARNo, tblLoans.LoanAmount, tblloans.PNValue,
        tblLoans.JournalVoucherId, tblJournals.LoanId from tblloans inner join
        tblJournals on tblloans.JournalVoucherId = tblJournals.Id 
        inner join tblLoanPayments on
        tblJournals.LoanId = tblLoanPayments.LoanId
        LEFT JOIN tblBranches on
        tblloans.BranchId = tblBranches.id 
        where year(tblloans.LastPaymentDate) >= 1900 AND tblloans.PNNo IS NOT NULL AND
        tblLoans.OutStandingBalance >=1 and tblBranches.code = 'HOF'";
        $stmt = $this->connJeon->prepare($sql);
        $stmt->execute(array());
        $data =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        $transfer = array();
        foreach($data as $k => $v){
            $data[$k] = $v;
        }
        $success = '123131';
        if($data){
            if($success){
              foreach($data as $k => $v){
                    
                $count = count($data);
                 for ($i = 0; $i < 102; $i++) {
                        $c = 0;
                        try {
                        $sstmt = $this->conn->prepare("INSERT INTO FI_FINANCETRANS_MASTER(
                            MFIN_TRANS_ID,
                            MFIN_TRANS_DATE,
                            MFIN_HO_CODE,
                            MFIN_CO_CODE,
                            MFIN_BR_CODE,
                            MFIN_BORROWER_CODE,
                            MFIN_PAY_AMOUNT,
                            MFIN_POST_DATE,
                            MFIN_REMARKS,
                            MFIN_PNVALUE,
                            MFIN_BALANCE,
                            MFIN_PN_NUMBER,
                            MFIN_PR_NUMBER,
                            MFIN_REMIT_DATE,
                            MFIN_PR_DATE,
                            MFIN_GL_DATE
                        )VALUES(
                            :MFIN_TRANS_ID,
                            :MFIN_TRANS_DATE,
                            :MFIN_HO_CODE,
                            :MFIN_CO_CODE,
                            :MFIN_BR_CODE,
                            :MFIN_BORROWER_CODE,
                            :MFIN_PAY_AMOUNT,
                            :MFIN_POST_DATE,
                            :MFIN_REMARKS,
                            :MFIN_PNVALUE,
                            :MFIN_BALANCE,
                            :MFIN_PN_NUMBER,
                            :MFIN_PR_NUMBER,
                            :MFIN_REMIT_DATE,
                            :MFIN_PR_DATE,
                            :MFIN_GL_DATE
                            )"
                    );                                   
                    $MFIN_TRANS_ID = '00'.$i;
                    $MFIN_HO_CODE = '00';
                    $MFIN_CO_CODE = '00';
                    // $MFIN_BR_CODE = '100';
                    $MFIN_BR_CODE = $v['branCode'];
                    $year = '2019';
                    $zero = "00000";
                    if($k == 10){
                        $zero = "0000";
                    }else if($k == 100){
                        $zero = "000";
                    }else if($k == 1000){
                        $zero = "00";
                    }
                    // $LOAN_PN_NUMBER = 'JE100'.$year.$zero.$i;
                    $LOAN_PN_NUMBER = $v['PNNo'];
                    $BORR_CODE = 'JEON MIGRATION-'.$i;
                    $output = $v['Amount'];
                    $output2 = $v['CheckDepositDate'];    
                    $date =  date('Y-m-d H:i:s');
                         
                    $seq = "";
                    if($k < 10){
                    $seq = '0000000'.$k;
                     }elseif($k < 100){
                        $seq = '000000'.$k;
                     }elseif($k < 1000){
                        $seq = '00000'.$k;
                     }elseif($k < 10000){
                        $seq = '0000'.$k;
                     }
                    $MFIN_BORROWER_CODE = '00001002019'.$seq; ;
                    $output3 = $v['Comments'];
                    $output4 = $v['PNValue'];
                    $output5 = $v['Balance'];
                    $output6 = $v['PNNo'];
                    $output7 = $v['ARNo'];
            
                    // $date = $v['CheckDepositDate'];
                    $sstmt->bindParam(':MFIN_REMIT_DATE',$output2);
                    $sstmt->bindParam(':MFIN_PR_DATE',$date);
                    $sstmt->bindParam(':MFIN_POST_DATE',$date);
                    $sstmt->bindParam(':MFIN_GL_DATE',$output2);
                        $sstmt->bindParam(':MFIN_TRANS_ID',$MFIN_TRANS_ID);
                        $sstmt->bindParam(':MFIN_TRANS_DATE',$output2);
                        $sstmt->bindParam(':MFIN_BORROWER_CODE',$MFIN_BORROWER_CODE);
                        $sstmt->bindParam(':MFIN_HO_CODE',$MFIN_HO_CODE);
                        $sstmt->bindParam(':MFIN_CO_CODE',$MFIN_CO_CODE);
                        $sstmt->bindParam(':MFIN_BR_CODE',$MFIN_BR_CODE);
                        $sstmt->bindParam(':MFIN_PAY_AMOUNT', $output);
                        $sstmt->bindParam(':MFIN_POST_DATE', $output2);
                        $sstmt->bindParam(':MFIN_REMARKS', $output3);
                        $sstmt->bindParam(':MFIN_PNVALUE', $output4);
                        $sstmt->bindParam(':MFIN_BALANCE', $output5);
                        $sstmt->bindParam(':MFIN_PN_NUMBER', $LOAN_PN_NUMBER);
                        $sstmt->bindParam(':MFIN_PR_NUMBER', $output7);
                        $sstmt->execute();
                        $c++;
                        if($sstmt){
                            echo 'Record '.$i.' success *"!£!"';
                        }else{
                            echo 'Record '.$i.' failed  *"!£!"';
                            }
                    } catch (PDOException $e) {
                        print $e->getMessage ();
                    }
                  }
               }                      
            }            
        }else{
        }
    }
}

?>