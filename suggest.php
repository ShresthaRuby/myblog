<?php
//function db_connect()
//{
    $conn=mysqli_connect("localhost","root","","db_jmate");
   // return $conn;
    
//}

 //function get_group_members() {
   // $conn = db_connect();
    if ($conn != NULL) {
        $sql = "SELECT name_list,id FROM tbl_group";
        $result = mysqli_query($conn, $sql);
        $data = array();
                           while($row = $result->fetch_array(MYSQLI_ASSOC)){
                               $data[]=$row;
                           }
        

                           foreach ($data as $r):
                               $arr=$r['name_list'];
                           //echo $arr;
                $array = explode(",", $arr);
               // print_r($array);
                         if(in_array("1", $array))
                         {
                         
                         }
                else  {
                     
                     $data1=get_tp($r['id']);
                     return $data1;
                   //echo $r['id'];
                 
                 }
               
            endforeach;
            //return $array;
            
        }
        
        
        
        function get_tp($id)
        { 
            $conn=mysqli_connect("localhost","root","","db_jmate");
          $sql="SELECT motive,destination,description,group_id,start_date from tbl_trip where group_id='$id'";   
          $res=mysqli_query($conn,$sql);
          $data1=  mysqli_fetch_row($res);
          return $data1;
          //print_r($data1);
       
        }
        ?>