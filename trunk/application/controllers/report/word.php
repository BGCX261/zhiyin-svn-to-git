<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class word extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index(){
		$this->load->library('PHPWord');
		$document = $this->phpword->loadTemplate('application/report/word/templates/Template.docx');
		$document->setValue('myReplacedValue','Test');
		$document->setValue('Value1', 'Sun');
		$document->setValue('Value2', 'Mercury');
		$document->setValue('Value3', 'Venus');
		$document->setValue('Value4', 'Earth');
		$document->setValue('Value5', 'Mars');
		$document->setValue('Value6', 'Jupiter');
		$document->setValue('Value7', 'Saturn');
		$document->setValue('Value8', 'Uranus');
		$document->setValue('Value9', 'Neptun');
		$document->setValue('Value10', 'Pluto');

		$document->setValue('weekday', date('l'));
		$document->setValue('time', date('H:i'));
		$document->save('application/report/word/Solarsystem.docx');
	}

	public function test(){
		// Include the PHPWord.php, all other classes were loaded by an autoloader
		require_once APPPATH.'/libraries/PHPWord.php';
		//$this->load->library('PHPWord');

		// Create a new PHPWord Object
		$PHPWord = new PHPWord();
		//$PHPWord = $this->phpword;

		// Every element you want to append to the word document is placed in a section. So you need a section:
		$section = $PHPWord->createSection();

		// After creating a section, you can append elements:
		$section->addText('Hello world!');

		// You can directly style your text by giving the addText function an array:
		$section->addText('Hello world! I am formatted.', array('name'=>'Tahoma', 'size'=>16, 'bold'=>true));

		// If you often need the same style again you can create a user defined style to the word document
		// and give the addText function the name of the style:
		$PHPWord->addFontStyle('myOwnStyle', array('name'=>'Verdana', 'size'=>14, 'color'=>'1B2232'));
		$section->addText('Hello world! I am formatted by a user defined style', 'myOwnStyle');

		// You can also putthe appended element to local object an call functions like this:
		$myTextElement = $section->addText('Hello World!');
		//$myTextElement->setBold();
		//$myTextElement->setName('Verdana');
		//$myTextElement->setSize(22);
		
$styleTable = array('borderColor'=>'006699',
			  'borderSize'=>6,
			  'cellMargin'=>50);
$styleFirstRow = array('bgColor'=>'66BBFF');
$PHPWord->addTableStyle('myTable', $styleTable, $styleFirstRow);
		
		
		$table = $section->addTable('myTable');
		$table->addRow();
		$cell = $table->addCell(2000);
		$cell->addText('Cell 1');
		$cell = $table->addCell(2000);
		$cell->addText('Cell 2');
	//	$cell = $table->addCell(2000);
		//$cell->addText('Cell 3');
		
		
		// Add image elements
		$section->addImage(APPPATH.'/images/side/jqxs-l.JPG');
		$section->addTextBreak(1);

		//$section->addImage(APPPATH.'/images/side/jqxs-l.JPG', array('width'=>210, 'height'=>210, 'align'=>'center'));
		//$section->addTextBreak(1);
		
		//$section->addImage(APPPATH.'/images/side/jqxs-l.jpg', array('width'=>100, 'height'=>100, 'align'=>'right'));
		

		// At least write the document to webspace:
		$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');		
		$objWriter->save('helloWorld.docx');
		
		exit;

		//download
/* 		
$filename='just_some_random_name.docx'; //save our document as this file name
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
 
$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
$objWriter->save('php://output');

 */

//force download
// 		$this->load->helper('download');
// 		$data = file_get_contents("helloWorld.docx"); // Read the file's contents
// 		$name = 'helloWorld.docx';		
// 		force_download($name, $data);		
	}


}
