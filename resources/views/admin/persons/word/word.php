@extends('layouts.admin')
@section('content')
<?php
header('Content-Type: text/html; charset=utf-8');
if(isset($_POST['submit']))
{
$data = $_POST ;

require_once 'PHPWord.php';

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('test.docx');

$name = "ali agha ";
$document->setValue('name', $name);
$document->setValue('educate', $data['educate']);
$document->setValue('field', $data['field']);
$document->setValue('phone', $data['phone']);
$document->setValue('title', $data['title']);
$document->setValue('activity', $data['activity']);
$document->setValue('comment', $data['comment']);

$document->save('changed.docx');
}
?>

    @stop
