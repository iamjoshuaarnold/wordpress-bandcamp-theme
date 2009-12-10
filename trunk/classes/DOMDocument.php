<?php
class ExtendedDOMDocument extends DOMDocument {
	/*
	 * toArray function by Yarg Dahc
	 * http://php.net/manual/en/class.domdocument.php#93900
	 * This function converts DOM to an array:
	 */
	public function toArray(DOMNode $oDomNode = null) {
		// return empty array if dom is blank
		if (is_null($oDomNode) && !$this->hasChildNodes()) {
			return array();
		}
		$oDomNode = (is_null($oDomNode)) ? $this->documentElement : $oDomNode;
		if (!$oDomNode->hasChildNodes()) {
			$mResult = $oDomNode->nodeValue;
		} else {
			$mResult = array();
			foreach ($oDomNode->childNodes as $oChildNode) {
				// how many of these child nodes do we have?
				// this will give us a clue as to what the result structure should be
				$oChildNodeList = $oDomNode->getElementsByTagName($oChildNode->nodeName); 
				$iChildCount = 0;
				// there are x number of childs in this node that have the same tag name
				// however, we are only interested in the # of siblings with the same tag name
				foreach ($oChildNodeList as $oNode) {
					if ($oNode->parentNode->isSameNode($oChildNode->parentNode)) {
						$iChildCount++;
					}
				}
				$mValue = $this->toArray($oChildNode);
				$sKey   = ($oChildNode->nodeName{0} == '#') ? 0 : $oChildNode->nodeName;
				$mValue = is_array($mValue) ? $mValue[$oChildNode->nodeName] : $mValue;
				// how many of thse child nodes do we have?
				if ($iChildCount > 1) {  // more than 1 child - make numeric array
					$mResult[$sKey][] = $mValue;
				} else {
					$mResult[$sKey] = $mValue;
				}
			}
			// if the child is <foo>bar</foo>, the result will be array(bar)
			// make the result just 'bar'
			if (count($mResult) == 1 && isset($mResult[0]) && !is_array($mResult[0])) {
				$mResult = $mResult[0];
			}
		}
		// get our attributes if we have any
		$arAttributes = array();
		if ($oDomNode->hasAttributes()) {
			foreach ($oDomNode->attributes as $sAttrName=>$oAttrNode) {
				// retain namespace prefixes
				$arAttributes["@{$oAttrNode->nodeName}"] = $oAttrNode->nodeValue;
			}
		}
		// check for namespace attribute - Namespaces will not show up in the attributes list
		if ($oDomNode instanceof DOMElement && $oDomNode->getAttribute('xmlns')) {
			$arAttributes["@xmlns"] = $oDomNode->getAttribute('xmlns');
		}
		if (count($arAttributes)) {
			if (!is_array($mResult)) {
				$mResult = (trim($mResult)) ? array($mResult) : array();
			}
			$mResult = array_merge($mResult, $arAttributes);
		}
		$arResult = array($oDomNode->nodeName=>$mResult);
		return $arResult;
	}


/*
 * dom_dump function by cmyk777 at gmail dot com
 * http://php.net/manual/en/class.domdocument.php#91072
 * This function may help to debug current dom element:
 */

	public function dom_dump($obj) {
    if ($classname = get_class($obj)) {
        $retval = "Instance of $classname, node list: \n";
        switch (true) {
            case ($obj instanceof DOMDocument):
                $retval .= "XPath: {$obj->getNodePath()}\n".$obj->saveXML($obj);
                break;
            case ($obj instanceof DOMElement):
                $retval .= "XPath: {$obj->getNodePath()}\n".$obj->ownerDocument->saveXML($obj);
                break;
            case ($obj instanceof DOMAttr):
                $retval .= "XPath: {$obj->getNodePath()}\n".$obj->ownerDocument->saveXML($obj);
                //$retval .= $obj->ownerDocument->saveXML($obj);
                break;
            case ($obj instanceof DOMNodeList):
                for ($i = 0; $i < $obj->length; $i++) {
                    $retval .= "Item #$i, XPath: {$obj->item($i)->getNodePath()}\n".
"{$obj->item($i)->ownerDocument->saveXML($obj->item($i))}\n";
                }
                break;
            default:
                return "Instance of unknown class";
        }
    } else {
        return 'no elements...';
    }
    return htmlspecialchars($retval);
}

} // end of ExtendedDOMDocument class
?>
