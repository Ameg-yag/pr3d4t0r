<pre>
<?php
$email= file_get_contents('1-Web_2015-12-10_12-31-34.html');

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

	echo $i . '<b> Registro: </b>' . $value[$i]->html;
  	echo '<br>';

	// Controle do Conteudo
	$j = $i + 1;

		echo $j .'<b> Dado: </b>' . $value[$j]->html;
		echo '<br>';
		echo '<br>';
	$i++;
  }

