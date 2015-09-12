<?php

//<!---------------------------------------�ļ����� 7_6.php-------------------------------->
//����fpdf���ļ�
include_once ("chinese.php");
//�����µ�pdf�࣬���̳�fpdf��
class pdf extends PDF_Chinese {
	//���¶���header()����
	function Header() {
		//��ҳü�в���ͼƬ
		$this->Image('logo.png', 10, 8, 33);
		//������ʾҳüʹ�õ��������ơ���ʽ�ʹ�С
		$this->SetFont('simsun', '', 10);
		//Ϊҳü���ݶ�λ
		$this->Cell(80);
		//��λ����ʾҳü
		$this->Cell(30, 10, 'FPDF���ɵ�PDF�ļ�', 0, 0, 'C');
		//��ӷָ���
		$this->Ln(20);
	}
	//����ҳ��
	function Footer() {
		//����ҳ����Ϣ
		$this->SetY(-15);
		//������ʾҳ��ʹ�õ��������ơ���ʽ�ʹ�С
		$this->SetFont('simsun', '', 10);
		//��ʾҳ��
		$this->Cell(0, 10, 'ҳ ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
	}
	//���ɱ����
	function BasicTable($header, $data) {
		//�����ͷ
		foreach ($header as $col){
			$this->Cell(40, 7, $col, 1);
		}
		$this->Ln();
		//��������
		foreach ($data as $row) {
			foreach ($row as $col){
				//��ʾ��������
				$this->Cell(40, 6, $col, 1);
			}
			$this->Ln();
		}
	}
}
//ʹ���µ�pdf�࣬����PDF�ļ�
//��ʼ��pdf��
$pdf = new pdf();
$pdf->AddGBFont('simsun', '����');
$pdf->AddGBFont('simhei', '����');
$pdf->AddGBFont('simkai', '����_GB2312');
$pdf->AddGBFont('sinfang', '����_GB2312');
$pdf->SetFont('simsun', '', 20);
$pdf->Open();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('fw.png', 140, 25, 40);
$pdf->SetFont('simsun', '', 20);
$pdf->Cell(0, 10, '����', 0, 1);
$header = array (
	'����',
	'����',
	'רҵ'
);
$student = array (
	array ("С��",19,"�����"),
	array ("С��",18,"�����"),
	array ("С��",19,"�����"),
	array ("СԷ",20,"�����"),
	array ("С��",20,"�����"),
	array ("С��",20,"�����"),
	array ("С��",18,"�����")
);
$pdf->SetFont('simsun', '', 14);
$pdf->BasicTable($header, $student);
$pdf->Ln();
$pdf->Write("", "��������", "http://www.baidu.com");
$pdf->AddPage();
$pdf->Write("", "�ڶ�ҳ����");
$pdf->Output();
?>