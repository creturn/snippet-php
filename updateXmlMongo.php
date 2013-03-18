<?php 
 
$count = 0;
/**
 * 转换数组为xml
 * @param  array $array 
 * @return xml
 */
function convertToXml($array)
{
 
	// $useFile = getXmlFeild();
 	$xml ='<?xml version="1.0" encoding="utf-8"?>';
	$xml .= '<root>';
	foreach ($array  as $goodsList) {
		$xml .= '<goods>';
			foreach ($goodsList as $key => $value) {
				if(!empty($value)){
					$xml .= '<'.$key.'>'.$value.'</'.$key.'>';
				}
			}
		$xml .= '</goods>';
	}
	$xml .= '</root>';
	//echo $xml;
	saveToFile('goods.xml',$xml);
}


//保存文件
function saveToFile($fileName,$content)
{
	file_put_contents($fileName, $content);
}
  
//转换商品到xml
function converGoods()
{
	 
	$mongoDB = new Mongo('mongodb://127.0.0.1:27017');
	$hsDB = $mongoDB->hsxy_dev;
	$rs = $hsDB->base_goods->find();//->fields($filedArr);
	foreach ($rs as $key => $value) {
		unset($value['_id']);
		$newArr[]=$value;
	}
	convertToXml($newArr);
}
converGoods();


 ?>