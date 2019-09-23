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

    private $hostJeon="192.168.0.116";

    private $userJeon="sa";

    private $dbJeon="globaldom";
    
    private $passJeon = "1234";


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
        $sql = "select TOP 2 *, tblCrecoms.Code as CrecomsId  from tblloans
        LEFT OUTER JOIN tblPersonalInfos on
        tblloans.PersonalInfoId = tblPersonalInfos.id
        LEFT OUTER JOIN tblCrecoms on
        tblloans.CrecomId = tblCrecoms.Id
     

        
        

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

        if($data){
        
            $transfer = "TO TRANSFER DATA";


         


            $success = "SUCCESS DATA TRANSFER";

            if($success){

                

               // to limit the data to send, 
                //   print_r($data[$i]);         exceed memory limit and execution time
                // print_r($data[$i]);
                // print_r($data['ASSD_LOANCODE'][$i]);
                
               
                    // for($i = 0 ; $i < 5; $i++){
                    //  print_r($data[$i]);
                    for ($i = 0; $i < 10; $i++) {
                        $c = 0;
                       
                        $output = print_r($data[$i]['PNNo'], TRUE);
                        $output2 = print_r($data[$i]['ApprovedDate'], TRUE);
                        $output3 = print_r($data[$i]['SubjectNo'], TRUE);
                        $output4 = print_r($data[$i]['LoanAmount'], TRUE);
                        $output5 = print_r($data[$i]['InterestRate'], TRUE);
                        $output6 = print_r($data[$i]['TotalInterest'], TRUE);
                        $output7 = print_r($data[$i]['GracePeriod'], TRUE);
                        $output8 = print_r($data[$i]['Code'], TRUE);
                        $output9 = print_r($data[$i]['PNValue'], TRUE);
                        $output10 = print_r($data[$i]['ApprovedAmount'], TRUE);
                        $output11 = print_r($data[$i]['LoanStatusId'], TRUE);
                        $output12 = print_r($data[$i]['AdditionalInterestAmount'], TRUE);
                        $output13 = print_r($data[$i]['AdditionalInterestDays'], TRUE);
                        $output14 = print_r($data[$i]['DefaultFirstDueDate'], TRUE);
                        $output15 = print_r($data[$i]['DefaultMaturityDate'], TRUE);
                        $output16 = print_r($data[$i]['OutstandingBalance']);
                        $output17 = print_r($data[$i]['LastPaymentDate'], TRUE);
                        $output18 = print_r($data[$i]['CreationDate'], TRUE);
                        $output19 = print_r($data[$i]['CrecomsId'], TRUE);
                        $output20 = print_r($data[$i]['LoanClassId'], TRUE);
                        $output21 = print_r($data[$i]['NoOfMonths'], TRUE);
                        $output22 = print_r($data[$i]['PaymentModeId'], TRUE);


                        
                    

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
                        if($LOAN_PN_NUMBER == is_null()){

                        }
                        print_r($i);
                        $LOAN_HO = $c;
                        $LOAN_CO =  $c;
                        $LOAN_BR = $c;
                        $LOAN_APP_CODE = $c;
                        $LOAN_PN_NUMBER = $output;

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



                
                        if($sstmt){
                            echo 123;
                        }else{
                            echo 'error';
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