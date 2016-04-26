<?php
require_once ("fpdf.php");
/**
 * Class extention for Header and Footer Definitions
 *
 */
class PDF extends FPDF
{
	
	public function Header()
	{				
		$companyprofile_name = "Perbadanan Adat Melayu dan Warisan Negeri Selangor (PADAT)";
		$companyprofile_add1 = "Persiaran Bandaraya,";
		$companyprofile_city = "Shah Alam";
		$companyprofile_postcode = "40000";
		$state_desc = "Selangor Darul Ehsan";
		$companyprofile_phone = "03-5519 0050";
		$companyprofile_fax = "03-5510 1799";
		$companyprofile_email = "info@padat.gov.my";
		$xpos = 40;
		
		$this->SetFont('Arial','B',9);
		$line = 15;
		$idx = 4;
		$this->Text($xpos,$line,$companyprofile_name);
		$this->SetFont('Arial','',9);
		$this->Text($xpos,$line+($idx*1),$companyprofile_add1);
		$this->Text($xpos,$line+($idx*2),$companyprofile_postcode." ".$companyprofile_city);
		$this->Text($xpos,$line+($idx*3),$state_desc);
		
		$this->Text($xpos,$line+($idx*4),'TEL : '.$companyprofile_phone.'     '.'FAX : '.$companyprofile_fax);
		$this->Text($xpos,$line+($idx*5),'EMAIL : '.$companyprofile_email);
		$this->Text(230,$line+($idx*5),'Tarikh Dicetak: : '.date("d/m/Y"));
		
		
		$this->Image('../images/padat.png',15,10,22);
		
		$this->Line(15,$line+($idx*6),275,$line+($idx*6));
	}	
	
	public function Footer()
	{
	    $this->SetY(-10);
	    $this->SetFont('Arial','I',7);
	    $this->SetTextColor(170, 170, 170);
	    $this->MultiCell(0, 4, "Page {$this->PageNo()} / {nb}", 0, 'C');
	}
} 

?>