<?php
/*
 * @author:xHue
 * 
*/

function getHeader($data) { 
 // Get Header information File Log

 $header = (explode(" : ", $data));
 $date = $header[0];
 $hostname = $header[1];
 $window = $header[2];

 //Split Window to Get App Name
 $windowName = explode("-",$window);
 $winName = $windowName[count($windowName) - 1];

 $header = array($date, $hostname, $winName, $window);

 return $header;

}

function getContent($fileName) {
 //Get and tratatives log file

 $email= file_get_contents($fileName);

 function element_to_obj($element) {
    $obj = array( "tag" => $element->tagName );
    foreach ($element->attributes as $attribute) {
        $obj[$attribute->name] = $attribute->value;
    }
    foreach ($element->childNodes as $subElement) {
        if ($subElement->nodeType == XML_TEXT_NODE) {
            $obj["html"] = $subElement->wholeText;
        }
        else {
            $obj["children"][] = element_to_obj($subElement);
        }
    }
    return $obj;
 }
 function html_to_obj($html) {
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    return element_to_obj($dom->documentElement);
 }

 $json = json_encode(html_to_obj($email), true);
 $tamanhoArray = count( json_decode($json)->children[2]->children);
 $value = (json_decode($json)->children[2]->children);

  // Controle do Titulo
  for($i=0;$i<=$tamanhoArray;$i++) {

        $header = getHeader($value[$i]->html);

        // Controle do Conteudo
        $j = $i + 1;
        $data = array('header'=>$header, 'data'=> $value[$j]->html);

	$data_[] = $data;
        $i++;

  }

	return $data_;
}

