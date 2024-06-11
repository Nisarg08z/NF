<?php

// Connect to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "project";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn) {
    die("Sorry we failed to connect: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include "fpdf/fpdf.php";


    class PDF extends FPDF
    {
        // Page header
        function Header()
        {
            // Logo
            $this->Image('../../img/logo.png', 10, 10, 20);
            $this->SetFont('Arial', 'B', 13);
            // Move to the right
            $this->Cell(80);
            // Title
            if (isset($_POST['pdf_booking'])) {
                $this->Cell(80, 10, 'booking List', 1, 0, 'C');
            }

            if (isset($_POST['pdf_query'])) {
                $this->Cell(80, 10, 'query List', 1, 0, 'C');
            }

            if (isset($_POST['pdf_user'])) {
                $this->Cell(80, 10, 'User List', 1, 0, 'C');
            }

            // Line break
            $this->Ln(20);
        }

        // Page footer
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial', 'I', 8);
            // Page number
            $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        }
    }

    //booking
    if (isset($_POST['pdf_booking'])) {

        $display_heading = array('no' => 'ID', 'name' => 'Name', 'email' => 'Email', 'phone' => 'Phone', 'age' => 'Age', 'gender' => 'Gender', 'departure' => 'Departure', 'returndate' => 'Returndate', 'destination' => 'Destination', 'package' => 'Package');

        $result = mysqli_query($conn, "SELECT * FROM booking") or die("database error:" . mysqli_error($conn));
        $header = mysqli_query($conn, "SHOW columns FROM booking WHERE field != 'created_on'");

    }

    //query
    if (isset($_POST['pdf_query'])) {

        $display_heading = array('no' => 'ID', 'name' => 'Name', 'email' => 'Email', 'subject' => 'Subject', 'message' => 'Message');

        $result = mysqli_query($conn, "SELECT * FROM query") or die("database error:" . mysqli_error($conn));
        $header = mysqli_query($conn, "SHOW columns FROM query WHERE field != 'created_on'");

    }

    //user
    if (isset($_POST['pdf_user'])) {

        $display_heading = array('no' => 'ID', 'firstname' => 'FirstName', 'lastname' => 'LastName', 'email' => 'Email', 'password' => 'Password');

        $result = mysqli_query($conn, "SELECT * FROM user") or die("database error:" . mysqli_error($conn));
        $header = mysqli_query($conn, "SHOW columns FROM user WHERE field != 'created_on'");

    }


    $pdf = new PDF();
    //header
    $pdf->AddPage();
    //footer page
    //user
    if (isset($_POST['pdf_user'])) {
        $pdf->AliasNbPages();
        $pdf->SetFont('Arial', 'B', 14);
        foreach ($header as $heading) {
            switch ($heading['Field']) {
                case 'no':
                    $pdf->Cell(15, 10, $display_heading[$heading['Field']], 1);
                    break;
                case 'firstname':
                case 'lastname':
                    $pdf->Cell(35, 10, $display_heading[$heading['Field']], 1);
                    break;
                case 'email':
                case 'password':
                    $pdf->Cell(50, 10, $display_heading[$heading['Field']], 1);
                    break;
                default:
                    $pdf->Cell(35, 10, $display_heading[$heading['Field']], 1);
                    break;
            }
        }
        foreach ($result as $row) {
            $pdf->SetFont('Arial', '', 10);
            $pdf->Ln();
            foreach ($row as $key => $column) {
                switch ($key) {
                    case 'no':
                        $pdf->Cell(15, 10, $column, 1);
                        break;
                    case 'firstname':
                    case 'lastname':
                        $pdf->Cell(35, 10, $column, 1);
                        break;
                    case 'email':
                    case 'password':
                        $pdf->Cell(50, 10, $column, 1);
                        break;
                    default:
                        $pdf->Cell(35, 10, $column, 1);
                        break;
                }
            }
        }
    }

    //query
    if (isset($_POST['pdf_query'])) {
        $pdf->AliasNbPages();
        $pdf->SetFont('Arial', 'B', 14);
        foreach ($header as $heading) {
            switch ($heading['Field']) {
                case 'no':
                    $pdf->Cell(10, 10, $display_heading[$heading['Field']], 1);
                    break;
                case 'name':
                    $pdf->Cell(25, 10, $display_heading[$heading['Field']], 1);
                    break;
                case 'email':
                    $pdf->Cell(45, 10, $display_heading[$heading['Field']], 1);
                    break;
                case 'subject':
                    $pdf->Cell(45, 10, $display_heading[$heading['Field']], 1);
                    break;
                case 'message':
                    $pdf->Cell(60, 10, $display_heading[$heading['Field']], 1);
                    break;
                default:
                    $pdf->Cell(35, 10, $display_heading[$heading['Field']], 1);
                    break;
            }
        }
        foreach ($result as $row) {
            $pdf->SetFont('Arial', '', 10);
            $pdf->Ln();
            foreach ($row as $key => $column) {
                switch ($key) {
                    case 'no':
                        $pdf->Cell(10, 10, $column, 1);
                        break;
                    case 'name':
                        $pdf->Cell(25, 10, $column, 1);
                        break;
                    case 'email':
                        $pdf->Cell(45, 10, $column, 1);
                        break;
                    case 'subject':
                        $pdf->Cell(45, 10, $column, 1);
                        break;
                    case 'message':
                        $pdf->Cell(60, 10, $column, 1);
                        break;
                    default:
                        $pdf->Cell(35, 10, $column, 1);
                        break;
                }
            }
        }
    }

    //booking
    if (isset($_POST['pdf_booking'])) {
        $pdf->AliasNbPages();
        $pdf->SetFont('Arial', 'B', 10);
        foreach ($header as $heading) {
            switch ($heading['Field']) {
                case 'no':
                    $pdf->Cell(8, 10, $display_heading[$heading['Field']], 1);
                    break;
                case 'name':
                    $pdf->Cell(13, 10, $display_heading[$heading['Field']], 1);
                    break;
                case 'email':
                    $pdf->Cell(35, 10, $display_heading[$heading['Field']], 1);
                    break;
                case 'phone':
                    $pdf->Cell(18, 10, $display_heading[$heading['Field']], 1);
                    break;
                case 'age':
                    $pdf->Cell(9, 10, $display_heading[$heading['Field']], 1);
                    break;
                case 'gender':
                    $pdf->Cell(15, 10, $display_heading[$heading['Field']], 1);
                    break;
                case 'returndate':
                case 'departure':
                    $pdf->Cell(25, 10, $display_heading[$heading['Field']], 1);
                    break;
                case 'destination':
                    $pdf->Cell(22, 10, $display_heading[$heading['Field']], 1);
                    break;
                case 'package':
                    $pdf->Cell(17, 10, $display_heading[$heading['Field']], 1);
                    break;
                default:
                    $pdf->Cell(35, 10, $display_heading[$heading['Field']], 1);
                    break;
            }
        }
        foreach ($result as $row) {
            $pdf->SetFont('Arial', '', 8);
            $pdf->Ln();
            foreach ($row as $key => $column) {
                switch ($key) {
                    case 'no':
                        $pdf->Cell(8, 10, $column, 1);
                        break;
                    case 'name':
                        $pdf->Cell(13, 10, $column, 1);
                        break;
                    case 'email':
                        $pdf->Cell(35, 10, $column, 1);
                        break;
                    case 'phone':
                        $pdf->Cell(18, 10, $column, 1);
                        break;
                    case 'age':
                        $pdf->Cell(9, 10, $column, 1);
                        break;
                    case 'gender':
                        $pdf->Cell(15, 10, $column, 1);
                        break;
                    case 'returndate':
                    case 'departure':
                        $pdf->Cell(25, 10, $column, 1);
                        break;
                    case 'destination':
                        $pdf->Cell(22, 10, $column, 1);
                        break;
                    case 'package':
                        $pdf->Cell(17, 10, $column, 1);
                        break;
                    default:
                        $pdf->Cell(35, 10, $column, 1);
                        break;
                }
            }
        }
    }
    $pdf->Output();
}
?>