<?php
require('fpdf.php');


//Connection to database
$conn= mysqli_connect("localhost", "root", "", "room");

//retrieve data from url
$book_id= $_GET["book_id"];


//A4 width           : 219mm
//Default margin     : 10mm each side
//Writable horizontal: 219-(10*2) = 189mm
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

//==================HEADER=======================//
//Set font to Arial, Bold, 16pt
$pdf->SetFont('Arial','B',16);
//Move to right
$pdf->Cell(60);
//Cell (Width, height, text, border, endline, [align])
$pdf->Cell(60,40,'WAVEKOST RENT INVOICE',0,1);

//Bills from
$pdf->Cell(2);
$pdf->SetFont('Arial','B', 14);
$pdf->Cell(10,12,'Bill From',0, 0);
//Bills to
$pdf->Cell(53);
$pdf->SetFont('Arial','B', 14);
$pdf->Cell(50,12,'Bill To',0, 0);

//==================DATA=======================//
//Query data from database
$print= mysqli_query($conn, 
            "SELECT a.book_id, a.tenant_name, a.room_id, a.book_start_date, a.book_end_date, a.duration_month, a.payment,
                    b.tenant_address, b.tenant_phone, c.room_id, c.room_monthly_price, d.trans_id, d.trans_date
            FROM booking a, tenant b, myroom c, trans d WHERE a.book_id='$book_id' AND c.room_id=a.room_id AND a.tenant_name=b.tenant_name ");
    
    while($result= mysqli_fetch_array($print)){

    //Cell (Width, height, text, border, endline, [align])
    //Book ID
    $pdf->Cell(19);
    $pdf->SetFont('Arial','B', 14);
    $pdf->Cell(20,12,'Booking ID : ',0, 0);

    $pdf->Cell(20);
    $pdf->SetFont('Arial','B', 14);
    $pdf->Cell(6,12,$result['book_id'],0,1);

//Owner--Name
$pdf->Cell(2);
$pdf->SetFont('Arial','B', 10);
$pdf->Cell(10,5,'Name',0, 0);

$pdf->Cell(6);
$pdf->SetFont('Arial','', 10);
$pdf->Cell(5,5,':',0, 0);

$pdf->SetFont('Arial','', 10);
$pdf->Cell(6,5,'Devrika',0,0);

    //Tenant Name
    $pdf->Cell(36);
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(10,7,'Name',0, 0);

    $pdf->Cell(5);
    $pdf->SetFont('Arial','', 10);
    $pdf->Cell(6,7,':',0, 0);

    $pdf->SetFont('Arial','', 10);
    $pdf->Cell(6,7,$result['tenant_name'],0,0);

    //Start-rent
    $pdf->Cell(42);
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(10,7,'Start-rent',0, 0);

    $pdf->Cell(17);
    $pdf->SetFont('Arial','', 10);
    $pdf->Cell(3,7,':',0, 0);

    $pdf->SetFont('Arial','', 10);
    $pdf->Cell(6,7,$result['book_start_date'],0,1);

//Owner--Phone
$pdf->Cell(2);
$pdf->SetFont('Arial','B', 10);
$pdf->Cell(10,7,'Phone',0, 0);

$pdf->Cell(6);
$pdf->SetFont('Arial','', 10);
$pdf->Cell(5,7,':',0, 0);

$pdf->SetFont('Arial','', 10);
$pdf->Cell(6,7,'085171707858',0,0);

    //Tenant Phone
    $pdf->Cell(36);
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(10,8,'Phone',0, 0);

    $pdf->Cell(5);
    $pdf->SetFont('Arial','', 10);
    $pdf->Cell(6,7,':',0, 0);

    $pdf->SetFont('Arial','', 10);
    $pdf->Cell(6,7,$result['tenant_phone'],0,0);

    //End-rent
    $pdf->Cell(42);
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(10,7,'End-rent',0, 0);

    $pdf->Cell(17);
    $pdf->SetFont('Arial','', 10);
    $pdf->Cell(3,7,':',0, 0);

    $pdf->SetFont('Arial','', 10);
    $pdf->Cell(6,7,$result['book_end_date'],0,1);

//Owner--Address
$pdf->Cell(2);
$pdf->SetFont('Arial','B', 10);
$pdf->Cell(10,7,'Address',0, 0);

$pdf->Cell(6);
$pdf->SetFont('Arial','', 10);
$pdf->Cell(5,7,':',0, 0);

$pdf->SetFont('Arial','', 10);
$pdf->Cell(6,7,'East Cikarang, Bekasi',0,0);

    //Tenant Address
    $pdf->Cell(36);
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(10,7,'Address',0, 0);

    $pdf->Cell(5);
    $pdf->SetFont('Arial','', 10);
    $pdf->Cell(6,7,':',0, 0);

    $pdf->SetFont('Arial','', 10);
    $pdf->Cell(6,7,$result['tenant_address'],0,0);

    //Transaction
    $pdf->Cell(42);
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(10,7,'Transaction',0, 0);

    $pdf->Cell(17);
    $pdf->SetFont('Arial','', 10);
    $pdf->Cell(3,7,':',0, 0);

    $pdf->SetFont('Arial','', 10);
    $pdf->Cell(6,7,$result['trans_date'],0,1);

    //Table
    $pdf->Cell(0,10,'',0, 1);
    $pdf->Cell(3);
    
    $pdf->SetFont('Arial','B', 12);
    $pdf->Cell(40,10,'Rent Duration',1, 0, 'C');

    $pdf->SetFont('Arial','B', 12);
    $pdf->Cell(34,10,'Transaction ID',1, 0, 'C');

    $pdf->SetFont('Arial','B', 12);
    $pdf->Cell(28,10,'Room',1, 0, 'C');


    $pdf->SetFont('Arial','B', 12);
    $pdf->Cell(40,10,'Price',1, 0, 'C');

    $pdf->SetFont('Arial','B', 12);
    $pdf->Cell(40,10,'Total ', 1, 1, 'C');

    //Table--fill


    $pdf->Cell(3);
    $pdf->SetFont('Arial','', 10);
    $pdf->Cell(40,10,$result['duration_month']. ' month',1, 0, 'C');
   
    $pdf->SetFont('Arial','', 10);
    $pdf->Cell(34,10,$result['trans_id'] ,1, 0, 'C');
    
    $pdf->SetFont('Arial','', 10);
    $pdf->Cell(28,10,$result['room_id'],1, 0, 'C');

    $pdf->SetFont('Arial','', 12);
    $pdf->Cell(40,10,$result['room_monthly_price'],1, 0, 'C');

    $pdf->SetFont('Arial','', 12);
    $pdf->Cell(40,10, 'Rp.'.number_format($result['payment']), 1, 1, 'C');

    // Additional statement
    $pdf->Cell(30);
    $pdf->SetFont('Arial','', 12);
    $pdf->Cell(40,40,'Please make a payment on time according to the transaction page  ', 0, 1);
    
    $pdf->Cell(32);
    $pdf->SetFont('Arial','', 12);
    $pdf->Cell(40,-20,'Thank you for choosing wavekost as your temporary residence!', 0, 1);


    $pdf->SetTitle($result['tenant_name'] . '.pdf');
    $pdf->Output('I' , 'invoice/'. $result['tenant_name'] . '.pdf', false);

}

$pdf->Output();
?>