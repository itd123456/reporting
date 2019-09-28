<?php

class Report{


    // private $host="192.168.0.26";

    // private $user="saprog";

    // private $db="GLOBAL_SOFIADB";

    // private $pass="SQL@2012!";

    // private $conn;

    private $host="localhost";

    private $user="DESKTOP-OT75CAB";

    private $db="GLOBAL_SOFIADB";


    private $conn;


    
    // private $hostJeon="192.168.0.3, 12888";

    // private $userJeon="sa";

    // private $dbJeon="globaldom";

    // private $passJeon="gdfiadmin";

    // private $connJeon;

    private $hostJeon="localhost"; //testserver

    private $userJeon="DESKTOP-OT75CAB";

    private $dbJeon="globaldom";
    
    // private $passJeon = "b@lowkid06021982";


    private $connJeon;



    private $hostReporting="localhost";

    private $userReporting="root";

    private $dbReporting="test";

    private $passReporting="";

    private $connReporting;

 

    public function __construct(){


     

        // $this->connJeon =  new PDO("sqlsrv:server=".$this->hostJeon.";Database=".$this->dbJeon, $this->userJeon, $this->passJeon);
        $this->connJeon=  new PDO("sqlsrv:server=".$this->hostJeon.";Database=".$this->dbJeon, NULL, NULL);

        $this->conn=  new PDO("sqlsrv:server=".$this->host.";Database=".$this->db, NULL, NULL);
        // $this->conn =  new PDO("mysql=".$this->host.";Database=".$this->db, $this->user, $this->pass);
        //$this->connReporting = new PDO("mysql:serve=".$this->$hostname.";dbname=".$this->dbReporting."",$this->userReporting,$this->passReporting);

        // $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->pass);

 }


    public function get(){
        
        // $sql = "select *, tblCrecoms.Code as CrecomsId  from tblloans
        //         LEFT OUTER JOIN tblPersonalInfos on
        //         tblloans.PersonalInfoId = tblPersonalInfos.id
        //         LEFT OUTER JOIN tblCrecoms on
        //         tblloans.CrecomId = tblCrecoms.Id
        //         where tblloans.Id >= 19867 AND tblloans.Id <=19875 

                
                
        
        // "; 
        $sql = "select TOP 100 *, tblCrecoms.Code as CrecomsId, 
        tblBranches.code as branCode,
		tblPersonalInfos.Code as persoCode,
        tblProductTypes.code as protypeCode,
		tblAccountOfficers.Code as accOcode        
        from tblloans
		LEFT OUTER JOIN tblAccountOfficers on
		tblloans.AccountOfficerId = tblAccountOfficers.Id
        LEFT OUTER JOIN tblProductTypes on
        tblloans.ProductTypeId = tblProductTypes.Id
        LEFT OUTER JOIN tblLoanConsultants on
        tblloans.ConsultantId = tblLoanConsultants.Id
        LEFT OUTER JOIN tblBranches on
        tblloans.BranchId = tblBranches.id 
        LEFT OUTER JOIN tblPersonalInfos on
        tblloans.PersonalInfoId = tblPersonalInfos.id
        LEFT OUTER JOIN tblCrecoms on
        tblloans.CrecomId = tblCrecoms.Id where tblloans.PNNo IS NOT NULL
     

        
        

        ";
        // $sql = "SELECT * FROM
        // (
        //     selec row_number() over (order by id) as rn, * from LM_LOAN_ASSUMED
        // ) T1
        // where id";

        // $sql = "select Id from LM_LOAN_ASSUMEDBY";
        // fetch a limited data in database(partial migration)
        
        $stmt = $this->connJeon->prepare($sql);
        $stmt->execute(array());

          $data =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        $transfer = array();

        

        foreach($data as $k => $v){
            $data[$k] = $v;

        }

        $success = '123131';

        if($data){
            // $transfer = "TO TRANSFER DATA";
            // $success = "SUCCESS DATA TRANSFER";
            if($success){
                // to limit the data to send, 
                //   print_r($data[$i]);         exceed memory limit and execution time
                // print_r($data[$i]);
                // print_r($data['ASSD_LOANCODE'][$i]);
                
                               // for($i = 0 ; $i < 5; $i++){
                    //  print_r($data[$i]);
                  // $output = print_r($data[$i]['PNNo'], TRUE);

                        // if(empty(var_dump($data[$i]['PNNo'], TRUE))){
                            



                            foreach($data as $k => $v){

                                for ($i = 0; $i < 100; $i++) {
                                    $c = 0;
                               
                         
                            
                            
                            
                       
                          
                          
                        // $output00 = $v['PNNo'];
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

                        $sstmt = $this->conn->prepare("INSERT INTO LM_LOAN (LOAN_HO, 
                        LOAN_CO,LOAN_BR,LOAN_PN_NUMBER,LOAN_APP_CODE,
                        LOAN_APP_TYPE,
                        LOAN_APP_DATE,
                        LOAN_PRODUCT_CODE,
                        LOAN_AMOUNT,
                        LOAN_INTEREST_RATE,
                        LOAN_INTEREST_AMOUNT,
                        LOAN_GRACE_PERIOD,
                        LOAN_BORROWER_CODE,
                        LOAN_PNVALUE,
                        LOAN_AMOUNT_APPROVED,
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
                        )VALUES(:LOAN_HO, :LOAN_CO, :LOAN_BR, :LOAN_PN_NUMBER, :LOAN_APP_CODE,
                        :LOAN_APP_TYPE,
                        :LOAN_APP_DATE,
                        :LOAN_PRODUCT_CODE,
                        :LOAN_AMOUNT,
                        :LOAN_INTEREST_RATE,
                        :LOAN_INTEREST_AMOUNT,
                        :LOAN_GRACE_PERIOD,
                        :LOAN_BORROWER_CODE,
                        :LOAN_PNVALUE,
                        :LOAN_AMOUNT_APPROVED,
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
                        )");

                  
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
                        $sstmt->bindParam(':LOAN_INCLUDE_ADDON',$LOAN_INCLUDE_ADDON);
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
                        $LOAN_HO = $c;
                        $LOAN_CO = $c;
                        $LOAN_BR = $v['branCode'];
                        $LOAN_APP_CODE = $c;
                        $LOAN_PN_NUMBER = $v['PNNo'];
                        $LOAN_APP_DATE = $output2;
                        
                        $LOAN_PRODUCT_CODE = $output3;
                        $LOAN_AMOUNT = $output4;
                        $LOAN_ADDON = $v['AdditionalInterestDays'];
                        $LOAN_INCLUDE_ADDON = $v['AdditionalInterestAmount'];
                        $LOAN_INTEREST_RATE = $output5;
                        $LOAN_INTEREST_AMOUNT = $output6;
                        $LOAN_GRACE_PERIOD =$output7;
                        $LOAN_BORROWER_CODE = $output8;
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
                    } catch (PDOException $e) {
                        print $e->getMessage ();
                    }
                    


                
                        if($sstmt){
                            echo 123;
                        }else{
                            echo 'error';
                        }
                        
                      
                      
                        
                    


                    }
                }

              


                    //  for($j = 0; $j < $i; $j++){
                    //      print_r($j)
                    //  }
//                 foreach($data as $k => $v){
//                     print_r(json_encode($v));


//                 //    print_r($v[0]); // display a key and value of an array
                    
                 
//                    //   print_r($data['ASSD_LOANCODE']);
//             }
//  }

                             



            }
            
        }else{

        }


    }






}

?>