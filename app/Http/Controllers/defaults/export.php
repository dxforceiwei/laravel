<?php
namespace App\Http\Controllers\defaults;

require '../vendor/autoload.php';

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

use PhpOffice\PhpSpreadsheet\Spreadsheet; 
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class export extends Controller
{
    public function index()
    {
		if(Session::get('who')=="0" || Session::get('who')=="2")
		{
			$query_Recordset2 = DB::select("SELECT * FROM `add_service` ORDER BY id desc");
		}
		else
		{
			$query_Recordset2 = DB::select("SELECT * FROM `add_service` WHERE `company`=\"".Session::get('company_name')."\" ORDER BY id desc");
		}

		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		
		$styleArray = [
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			],
		];

		/*表頭*/
		$sheet->setCellValue('A1', '申請日期');
		$sheet->setCellValue('B1', '店家名稱');
		$sheet->setCellValue('C1', '購買人');
		$sheet->setCellValue('D1', '購買日期');
		$sheet->setCellValue('E1', '保固到期日');
		$sheet->setCellValue('F1', '充電器保固');
		$sheet->setCellValue('G1', '通訊地址');
		$sheet->setCellValue('H1', '購買店家');
		$sheet->setCellValue('I1', '車廠');
		$sheet->setCellValue('J1', '車款型號');
		$sheet->setCellValue('K1', '市話');
		$sheet->setCellValue('L1', '行動電話');
		$sheet->setCellValue('M1', '車架號碼');
		$sheet->setCellValue('N1', '型號');
		$sheet->setCellValue('O1', '電池號碼');
		$sheet->setCellValue('P1', '充電器號碼');
		$sheet->getStyle('A1:P1')->applyFromArray($styleArray);
		$index = 2;

		/*明細*/
		foreach($query_Recordset2 as $row_Recordset2)
		{
			$sheet->setCellValue('A'.$index, $row_Recordset2->date);
			$sheet->setCellValue('B'.$index, $row_Recordset2->company);
			$sheet->setCellValue('C'.$index, $row_Recordset2->person);
			$sheet->setCellValue('D'.$index, $row_Recordset2->buy_date);
			$sheet->setCellValue('E'.$index, $row_Recordset2->over_date);
			$sheet->setCellValue('F'.$index, $row_Recordset2->over_date2);
			$sheet->setCellValue('G'.$index, $row_Recordset2->address);
			$sheet->setCellValue('H'.$index, $row_Recordset2->buy_company);
			$sheet->setCellValue('I'.$index, $row_Recordset2->car_name);
			$sheet->setCellValue('J'.$index, $row_Recordset2->car_id);
			$sheet->setCellValue('K'.$index, $row_Recordset2->person_tel);
			$sheet->setCellValue('L'.$index, $row_Recordset2->person_phone);
			$sheet->setCellValue('M'.$index, $row_Recordset2->car_num);
			$sheet->setCellValue('N'.$index, $row_Recordset2->battery_name);
			$sheet->setCellValue('O'.$index, $row_Recordset2->battery_num);
			$sheet->setCellValue('P'.$index, $row_Recordset2->replenisher_num);
			/*對齊*/
			$sheet->getStyle('A'.$index.':P'.$index)->applyFromArray($styleArray);
			$index++;
		}
		
		/*自動列寬*/
		$sheet->getColumnDimension('A')->setWidth(10.75);
		$sheet->getColumnDimension('B')->setWidth(30);
		$sheet->getColumnDimension('C')->setWidth(11.57);
		$sheet->getColumnDimension('D')->setWidth(10.57);
		$sheet->getColumnDimension('E')->setWidth(12);
		$sheet->getColumnDimension('F')->setWidth(12);
		$sheet->getColumnDimension('G')->setWidth(45.57);
		$sheet->getColumnDimension('H')->setWidth(30);
		$sheet->getColumnDimension('I')->setWidth(10.71);
		$sheet->getColumnDimension('J')->setWidth(10.71);
		$sheet->getColumnDimension('K')->setWidth(10.71);
		$sheet->getColumnDimension('L')->setWidth(10.71);
		$sheet->getColumnDimension('M')->setWidth(17.43);
		$sheet->getColumnDimension('N')->setWidth(27.57);
		$sheet->getColumnDimension('O')->setWidth(15.43);
		$sheet->getColumnDimension('P')->setWidth(22.43);
		
		/*檔名*/
		$filename = "保固清單".time().".xlsx";
		
		// Redirect output to a client's web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		 
		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y ') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.
		
		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
	}
}
