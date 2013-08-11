<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WidgetHelper
 *
 * @author nngao
 */
class WidgetHelper {
    
    
   public static function  convertDate2String($inputDate,$dateFormat=1) {
     
        switch ($dateFormat) {
           case 1:
                return date('F d, Y', strtotime($inputDate));
           break;
     
           case 2:
                return date('F d, Y G:i:s', strtotime($inputDate));
           break;
     
           case 3:
                return date('M d, Y h:i:s A', strtotime($inputDate));
           break;
     
           case 4:
                return date('M d, Y G:i:s', strtotime($inputDate));
           break;
       
           case 5:
                return date('M d, Y', strtotime($inputDate));
           break;
       
          case 6:
                return date('d-m-Y', strtotime($inputDate));
           break;
        }
    }
    public function is_date( $str ){
            $stamp = strtotime( $str );
            if (!is_numeric($stamp))
                return FALSE;
            $check=  explode('-', $str);
            if(count($check)==3){
               if (checkdate($check[1], $check[2], $check[0]))
                 return TRUE; 
            }
            return FALSE;
    }
    public static function getDialogForm($view_alias,array $additional_params){
                
                $controller = new CController("mainpage");
                
                $serviceName=Views::model()->getServiceName($view_alias);
                $sc=new ServiceComponent($controller, $serviceName);
                $formArray = $sc->getCreateForm($view_alias,$additional_params);
                //$form = $formArray['form'];
                $model = $formArray['model'];
                $viewObject = $formArray['viewObject'];
                
               $output = '<div id="hidden-form-'.$view_alias.'">';
               $output .= $controller->renderPartial('//automated/form',array('sc'=>$sc,'model'=>$model,'viewobject'=>$viewObject,'additional_params'=>$additional_params),true,false);
               $output .= "</div>";
                  
                //Dialog Box 
                $controller->beginWidget('zii.widgets.jui.CJuiDialog', array(
                    'id'=>"dialog-id-{$viewObject->id}",
                    // additional javascript options for the dialog plugin
                    'options'=>array(
                        'title'=>'KIDMS Evolution',
                        'autoOpen'=>false,
						'width'=>400,
                    ),
                ));

                    echo '<div id="dialog-content">';
                                echo $output;
                    echo '</div>';

                $controller->endWidget('zii.widgets.jui.CJuiDialog');
            
            /*
               echo "<script type='text/javascript'> 
                        $('div#dialog-content').html('$output');
                       // document.getElementById('dialog-content').innerHTML = \"$output\"; 
                      // $('div#hidden-form-$view_alias').hide();
                      
                     </script>";
             */
               
               return $viewObject->id;
   }
   
   public static function explode_assoc($string, array $tokens){
       $return = array();
       
       $firstarrays=explode($tokens[0], $string);
           
      
       if(isset($tokens[1])){
           foreach($firstarrays as $array){
               $vals=explode($tokens[1], $array);
               if(isset($vals[1])){
               $return[$vals[0]] = $vals[1];
               }
               
           } 
       }
       else{
           $return[$firstarrays[0]] =$firstarrays[1];
       }
      
           
      return $return;
   }
   
   public static function makeDate($string){
       $strlength=strlen($string);
       $date_type='';
       $date='';
       $day='';
       $month='';
       $year='';
       
       if(!WidgetHelper::is_mysql_date_format($string)){
           if($strlength==8){
            $day=substr($string, 0,2);
            $month=substr($string, 2,2);
            $year=substr($string, -4);
            $date=$year.'-'.$month.'-'.$day;
            $date_type=1;
           
             // return array($date,$date_type);
           }
            else if($strlength==6){
                $day='1';
                $month=substr($string, 0,2);
                $year=substr($string, -4);
                $date=$year.'-'.$month.'-0'.$day;
                $date_type=2;

               // return array($date,$date_type);

           }
            else if($strlength==4){
                $day='1';
                $month='1';
                $year=$string;
                $date=$year.'-0'.$month.'-0'.$day;
                $date_type=3;

               // return array($date,$date_type);
            }
            else{
                $date_type=4;
                //invalid format
                return array($string,$date_type);
             } 
      }
      else{
          $date_type=1;
          return array($string,$date_type);
      }
      
      //check date validity
      if(WidgetHelper::is_date( $date )){
          return array($date,$date_type);
      }
      else{
          $date_type=4;
          //invalid format
          return array($string,$date_type);
      }
      
   }
public static function is_mysql_date_format($string){
    $check=  explode("-", $string);
    $bool=false;
    if(count($check)==3){
         if(WidgetHelper::is_date( $string ))
         $bool = true;
    }
    return $bool;
}
   
 public static  function dateDiff($start, $end) {

    $start_ts = strtotime($start);

    $end_ts = strtotime($end);

    $diff = $end_ts - $start_ts;

    return round($diff / 86400);

}

public static function checkDateFromToday($date){
        $date =  explode('-', $date);
       //assuming $d, $m and $y are numbers
       $check = mktime(0, 0, 0, $date[1], $date[2], $date[0]);
       $today = mktime(0, 0, 0, date("m"), date("d"), date("y"));

       if ($check > $today) {
         //echo "future";
           return 1;
       } else if ($check == $today) {
         //echo "today";
         return 0;
       } else {
         //echo "past";
          return -1;
       } 
}

public static function zerofill ($num, $zerofill = 2){
   return str_pad($num, $zerofill, '0', STR_PAD_LEFT);
} 

}

?>
