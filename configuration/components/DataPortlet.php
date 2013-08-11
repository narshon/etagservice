<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataPortlet
 *
 * @author nngao
 */
class DataPortlet extends CComponent{
    
    
    public static function showDataPortlet($controller,$portletdiv,$minimizediv,$title,$height,$data,$sidebar='left'){
        
            $content = '<div id="'.$minimizediv.'" class="dataportlet-minimize" style="float:left; width:2px; margin-top: 0px; color: #22A7D2;"> <a href="#'.$portletdiv.'" onClick="showDiv(\''.$portletdiv.'\',\''.$minimizediv.'\',\''.$title.'\');" > - </a></div>';
            $content .= "<div id='$portletdiv' class='dataportlet' style='<!-- height:{$height}px; -->'>";
            $content .= "<div  class='dataportlet-title'> <strong> $title </strong> </div>";
            $content .= $data;
            $content .= "</div>";
            if($sidebar=='right')
             $controller->dataPortlets_right[]= $content;
            else
             $controller->dataPortlets[]= $content;  
    }
}

?>
