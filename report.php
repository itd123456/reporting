<?php

class Report{


    // private $host="192.168.0.26";

    // private $user="saprog";

    // private $db="GLOBAL_SOFIADB";

    // private $pass="SQL@2012!";

    // private $conn;

    private $host="localhost";

    private $user="GLOBALDOMINION\AndrewNico.Lopez";

    private $db="GLOBAL_SOFIADB";


    private $conn;


    
    // private $hostJeon="192.168.0.3, 12888";

    // private $userJeon="sa";

    // private $dbJeon="globaldom";

    // private $passJeon="gdfiadmin";

    // private $connJeon;

    private $hostJeon="192.168.1.31"; //testserver

    private $userJeon="sa";

    private $dbJeon="globaldom";
    
    private $passJeon = "b@lowkid06021982";


    private $connJeon;



    private $hostReporting="localhost";

    private $userReporting="root";

    private $dbReporting="test";

    private $passReporting="";

    private $connReporting;

 

    public function __construct(){


     

        $this->connJeon =  new PDO("sqlsrv:server=".$this->hostJeon.";Database=".$this->dbJeon, $this->userJeon, $this->passJeon);

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
        $sql = "select TOP 100 *, tblCrecoms.Code as CrecomsId  from tblloans
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
                        $sstmt->bindParam(':LOAN_INTEREST_RATE',$LOAN_INTEREST_RATE);
                        $sstmt->bindParam(':LOAN_INTEREST_AMOUNT',$LOAN_INTEREST_AMOUNT);
                        $sstmt->bindParam(':LOAN_GRACE_PERIOD',$LOAN_GRACE_PERIOD);
                        $sstmt->bindParam(':LOAN_BORROWER_CODE',$LOAN_BORROWER_CODE);
                        $sstmt->bindParam(':LOAN_PNVALUE',$LOAN_PNVALUE);
                        $sstmt->bindParam(':LOAN_AMOUNT_APPROVED',$LOAN_AMOUNT_APPROVED);
                        $sstmt->bindParam(':LOAN_STATUS',$LOAN_STATUS);
                        $sstmt->bindParam(':LOAN_ADDT_INTEREST',$LOAN_ADDT_INTEREST);
                        $sstmt->bindParam(':LOAN_ADDT_INTEREST_DAYS',$LOAN_ADDT_INTEREST_DAYS);
                        $sstmt->bindParam(':LOAN_FIRST_DUEDATE',$LOAN_FIRST_DUEDATE);
                        $sstmt->bindParam(':LOAN_LAST_DUEDATE',$LOAN_LAST_DUEDATE);
                        $sstmt->bindParam(':LOAN_OBALANCE',$LOAN_OBALANCE);
                        $sstmt->bindParam(':LOAN_LASTPAYMENT_DATE',$LOAN_LASTPAYMENT_DATE);
                        $sstmt->bindParam(':LOAN_DATECREATED',$LOAN_DATECREATED);
                        $sstmt->bindParam(':LOAN_CREMAN_CODE',$CrecomsId);
                        $sstmt->bindParam(':LOAN_TERMS',$LOAN_TERMS);
                        $sstmt->bindParam(':LOAN_PAYMENT_MODE',$LOAN_PAYMENT_MODE);




            

                        
                        // $name = '0000';
                        // if($LOAN_PN_NUMBER == is_null()){

                        // }
                        print_r($i);
                        $LOAN_HO = $c;
                        $LOAN_CO = $c;
                        $LOAN_BR = $c;
                        $LOAN_APP_CODE = $c;
                        // if(empty(print_r($data[$i]['PNNo']))){
                        //     $data[$i]['PNNo'] = "No data ".$i;                                                   
                        // }else{
                        //     $data[$i]['PNNo'] = $data[$i]['PNNo'];
                        // }
                        $LOAN_PN_NUMBER = $v['PNNo'];
                        $LOAN_APP_DATE = $output2;
                        $LOAN_PRODUCT_CODE = $output3;
                        $LOAN_AMOUNT = $output4;
                        $LOAN_INTEREST_RATE = $output5;
                        $LOAN_INTEREST_AMOUNT = $output6;
                        $LOAN_GRACE_PERIOD =$output7;
                        $LOAN_BORROWER_CODE = $output8;
                        $LOAN_PNVALUE = $output9;
                        $LOAN_AMOUNT_APPROVED = $output10;
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