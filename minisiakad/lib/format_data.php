<?php
class format_data{
    function as_HTML($data){
        $html .= "<table>";
        foreach ($data as $k=>$v){
            if ($k==0){
				$html .="<tr>";
                foreach($v as $key => $value){
                    $html .="<th>".$key."</th>";
            }
            $html .= "</tr>";
        }
        $html .="<tr>";
		foreach($v as $key=>$value){
			$html .="<td>".$value."</td>";
		}
        $html .= "</tr>";
		}
		$html .= "</table>";
		return $html;
    }
    function as_XML($data,$label='Row'){
        $xml =  new DOMDocument();
        $rootElement = $xml->createElement('Data'.$label);
        $xml->appendChild($rootElement);
        foreach ($data as $k=>$v){
            $tagRow = $xml->createElement($label);
            $rootElement->appendChild($tagRow);
            if (is_array($v)){
                foreach ($v as $key=>$value){
                    $tagData = $xml->createElement($key,$value);
                    $tagRow->appendChild($tagData);
                }
            } else {
                $tagData = $xml->createElement('col'.$k,$v);
                    $tagRow->appendChild($tagData);
            }
        }
        return $xml->saveXML();
    }
    function as_JSON($data){
        return json_encode($data);
    }
}