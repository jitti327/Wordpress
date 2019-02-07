<?php
/**
 * PHPWord
 *
 * Copyright (c) 2011 PHPWord
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPWord
 * @package    PHPWord
 * @copyright  Copyright (c) 010 PHPWord
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    Beta 0.6.3, 08.07.2011
 */


/**
 * PHPWord_DocumentProperties
 *
 * @category   PHPWord
 * @package    PHPWord
 * @copyright  Copyright (c) 2009 - 2011 PHPWord (http://www.codeplex.com/PHPWord)
 */
class PHPWord_Template {
    
    /**
     * ZipArchive
     * 
     * @var ZipArchive
     */
    private $_objZip;
    
    /**
     * Temporary Filename
     * 
     * @var string
     */
    private $_tempFileName;
    
    /**
     * Document XML
     * 
     * @var string
     */
    private $_documentXML;
    

    public function setImageValue($search, $replace)
    {
        // Sanity check
        if (!file_exists($replace))
        {
            return;
        }

        // Delete current image
        $this->_objZip->deleteName('word/media/' . $search);

        // Add a new one
        $this->_objZip->addFile($replace, 'word/media/' . $search);
    }

    public function getZipObject(){
        return $this->_objZip;
    }

    
    /**
     * Create a new Template Object
     * 
     * @param string $strFilename
     */
    public function __construct($strFilename)
    {
    $path = dirname($strFilename);
    $this->_tempFileName = $path.DIRECTORY_SEPARATOR.time().'.docx';

    copy($strFilename, $this->_tempFileName); // Copy the source File to the temp File

    $this->_objZip = new ZipArchive();
    $this->_objZip->open($this->_tempFileName);
    
    //Custom code Israel L�pez (@learsima)
    $this->_documentXML = $this->_objZip->getFromName('word/document.xml');
    $this->_adicional['elementos'][0]['info']=$this->_documentXML;
    $this->_adicional['elementos'][0]['nombre']='document.xml';

    $posicion=1;
    //Custom code Israel L�pez (@learsima)
    for ($i=0; $i <2 ; $i++)
    {
     //Recorrer todos los posibles encabezado y pies de p�gina
    //Todos los archivo comienzan con header y footer seguidos de un secuencial
    $existe=true;
    $contador=1;

    if($i==0)
    {
        $nomenc='header';
    }else{
        $nomenc='footer';
    }

        while ($existe)
        {

        $nombre=$nomenc.$contador.'.xml';
        $elemento=$this->_objZip->getFromName('word/'.$nombre);

        if($elemento)
        {
            $this->_adicional['elementos'][$posicion]['info']=$elemento;
            $this->_adicional['elementos'][$posicion]['nombre']=$nombre;
            $contador++;
            $posicion++;
        }
        else
        {
           $existe=false;
        }   
    
      } 
    }
   }
    
    /**
     * Set a Template value
     * 
     * @param mixed $search
     * @param mixed $replace
     */
    //public function setValue($search, $replace) {
    //    if(substr($search, 0, 2) !== '${' && substr($search, -1) !== '}') {
    //        $search = '${'.$search.'}';
    //    }
    //    
    //    if(!is_array($replace)) {
    //        $replace = utf8_encode($replace);
    //    }
    //    
    //    $this->_documentXML = str_replace($search, $replace, $this->_documentXML);
    //}
    
    public function setValue($search, $replace)
    {
    $pattern = '|\$\{([^\}]+)\}|U';
    $openedTagPattern= '/<[^>]+>/';
    $closedTagPattern= '/<\/[^>]+>/';

    //echo count($this->_adicional)."<br>";
    for ($i=0; $i <count($this->_adicional['elementos']) ; $i++)
    {

        preg_match_all($pattern, $this->_adicional['elementos'][$i]['info'], $matches);

        foreach ($matches[0] as $value)
        {
            $modificado = preg_replace($openedTagPattern, '', $value);
            $modificado = preg_replace($closedTagPattern, '', $modificado);
            $this->_adicional['elementos'][$i]['info'] = str_replace($value, $modificado, $this->_adicional['elementos'][$i]['info']);
        }

        if(substr($search, 0, 2) !== '${' && substr($search, -1) !== '}')
        { //change to: substr($search, 0, 2) !== '${' if you need the $ character
            $search = '${'.$search.'}'; //change to '${'.$search.'}' if $ needed
        }

        if(!is_array($replace))
        {
            if (!preg_match('!!u', $replace))
            {
                $replace = utf8_encode($replace);
            }
           //$replace = utf8_encode($replace);
        }
        
        $this->_adicional['elementos'][$i]['info']= str_replace($search, $replace, $this->_adicional['elementos'][$i]['info']);

    }

    }
    public function wdm_setValue_before($search, $replace)
    {
    $pattern = '|\$\{([^\}]+)\}|U';
    $openedTagPattern= '/<[^>]+>/';
    $closedTagPattern= '/<\/[^>]+>/';

    //echo count($this->_adicional)."<br>";
    for ($i=0; $i <count($this->_adicional['elementos']) ; $i++)
    {

        preg_match_all($pattern, $this->_adicional['elementos'][$i]['info'], $matches);

        foreach ($matches[0] as $value)
        {
            $modificado = preg_replace($openedTagPattern, '', $value);
            $modificado = preg_replace($closedTagPattern, '', $modificado);
            $this->_adicional['elementos'][$i]['info'] = str_replace($value, $modificado, $this->_adicional['elementos'][$i]['info']);
        }

        if(substr($search, 0, 2) !== '${' && substr($search, -1) !== '}')
        { //change to: substr($search, 0, 2) !== '${' if you need the $ character
            $search = ', ${'.$search.'}'; //change to '${'.$search.'}' if $ needed
        }

        if(!is_array($replace))
        {
            if (!preg_match('!!u', $replace))
            {
                $replace = utf8_encode($replace);
            }
           //$replace = utf8_encode($replace);
        }
        
        $this->_adicional['elementos'][$i]['info']= str_replace($search, $replace, $this->_adicional['elementos'][$i]['info']);

    }
    
    }
    public function wdm_setValue_after($search, $replace)
    {
    $pattern = '|\$\{([^\}]+)\}|U';
    $openedTagPattern= '/<[^>]+>/';
    $closedTagPattern= '/<\/[^>]+>/';

    //echo count($this->_adicional)."<br>";
    for ($i=0; $i <count($this->_adicional['elementos']) ; $i++)
    {

        preg_match_all($pattern, $this->_adicional['elementos'][$i]['info'], $matches);

        foreach ($matches[0] as $value)
        {
            $modificado = preg_replace($openedTagPattern, '', $value);
            $modificado = preg_replace($closedTagPattern, '', $modificado);
            $this->_adicional['elementos'][$i]['info'] = str_replace($value, $modificado, $this->_adicional['elementos'][$i]['info']);
        }

        if(substr($search, 0, 2) !== '${' && substr($search, -1) !== '}')
        { //change to: substr($search, 0, 2) !== '${' if you need the $ character
            $search = '${'.$search.'},'; //change to '${'.$search.'}' if $ needed
        }

        if(!is_array($replace))
        {
            if (!preg_match('!!u', $replace))
            {
                $replace = utf8_encode($replace);
            }
           //$replace = utf8_encode($replace);
        }
        
        $this->_adicional['elementos'][$i]['info']= str_replace($search, $replace, $this->_adicional['elementos'][$i]['info']);

    }
    
    }
    
    /**
 * Clone a table row
 * 
 * @param mixed $search
 * @param mixed $numberOfClones
 */
    public function cloneRow($search, $numberOfClones)
    {
    if(substr($search, 0, 2) !== '${' && substr($search, -1) !== '}') {
        $search = '${'.$search.'}';
    }

    $tagPos      = strpos($this->_documentXML, $search);
    $rowStartPos = strrpos($this->_documentXML, "<w:tr", ((strlen($this->_documentXML) - $tagPos) * -1));
    $rowEndPos   = strpos($this->_documentXML, "</w:tr>", $tagPos) + 7;

    $result = substr($this->_documentXML, 0, $rowStartPos);
    $xmlRow = substr($this->_documentXML, $rowStartPos, ($rowEndPos - $rowStartPos));
    for ($i = 1; $i <= $numberOfClones; $i++) {
        $result .= preg_replace('/\$\{(.*?)\}/','\${\\1#'.$i.'}', $xmlRow);
    }
    $result .= substr($this->_documentXML, $rowEndPos);

    $this->_documentXML = $result;
    }

    public function save($strFilename)
    {
        if(file_exists($strFilename))
        {
        unlink($strFilename);
        }
    //Custom code Israel L�pez (@learsima)
        for ($i=0; $i <count($this->_adicional['elementos']) ; $i++)
        { 

            $nombre=$this->_adicional['elementos'][$i]['nombre'];
    
            $this->_objZip->addFromString('word/'.$nombre, $this->_adicional['elementos'][$i]['info']);
        }


    // Close zip file
        if($this->_objZip->close() === false)
        {
            throw new Exception('Could not close zip file.');
        }

        rename($this->_tempFileName, $strFilename);
    }   
    /**
     * Save Template
     * 
     * @param string $strFilename
     */
    //public function save($strFilename) {
    //    if(file_exists($strFilename)) {
    //        unlink($strFilename);
    //    }
    //    
    //    $this->_objZip->addFromString('word/document.xml', $this->_documentXML);
    //    
    //    // Close zip file
    //    if($this->_objZip->close() === false) {
    //        throw new Exception('Could not close zip file.');
    //    }
    //    
    //    rename($this->_tempFileName, $strFilename);
    //}
}
?>