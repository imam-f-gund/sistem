<?php
//IMPLEMENTASI METODE WINOWING PADA DOKUMEN PDF
include 'koneksi.php';
class kode_asci{
    public $ascii = array();
    public function __construct() {
        // $this->ascii[1] = 'new array entry';
     $this->ascii [97] = 'a';    //97
     $this->ascii [98] = 'b';    //98
     $this->ascii [99] = 'c';   //99
     $this->ascii [100] = 'd';   //100
     $this->ascii [101] = 'e';    //101
     $this->ascii [102] = 'f';    //102
     $this->ascii [103] = 'g';    //103
     $this->ascii [104] = 'h';    //104
     $this->ascii [105] = 'i';    //105
     $this->ascii [106] = 'j';    //106
     $this->ascii [107] = 'k';   //107    
     $this->ascii [108] = 'l';   //108
     $this->ascii [109] = 'm';   //109
     $this->ascii [110] = 'n';   //110
     $this->ascii [111] = 'o';   //111
     $this->ascii [112] = 'p';   //112
     $this->ascii [113] = 'q';   //113
     $this->ascii [114] = 'r';   //114
     $this->ascii [115] = 's';   //115
     $this->ascii [116] = 't';   //116
     $this->ascii [117] = 'u';   //117
     $this->ascii [118] = 'v';   //118
     $this->ascii [119] = 'w';   //119
     $this->ascii [120] = 'x';   //120
     $this->ascii [121] = 'y';   //121
     $this->ascii [122] = 'x';   //122
     }

    }
       

class ngram {
        // public $arr_hasil_hash = array();
        // Methods
        function setNgrams($word, $n, $value, $b, $ket) {
            $conn = mysqli_connect('localhost', 'root', '', 'winnowing');
            $sql = "SELECT * FROM hash WHERE id_file=$ket";
            $result = $conn->query($sql);
           
            $result = $conn->query($sql);

                // if ($result->num_rows > 0) {
                //   // output data of each row
                //   while($row = $result->fetch_assoc()) {
                    
                //     echo "id_fiel: " . $row["id_file"]. " - file: " . $row["file_judul"]. " " . $row["kata_kunci"].$row["abstrak"]. " " . $row["pendahuluan"]. "<br>";
                //   }
                // } else {
                //   echo "0 results";
                // }
                // $conn->close();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
              
            
            } else {
                // var_dump($result);
                $sql = "INSERT INTO hash (id_hash, judul, kata_kunci, abstrak, pendahuluan, hasil, id_file)
                VALUES ('','','','','','',$ket)";
            
                if ($conn->query($sql) === TRUE) {
                // echo "New record created successfully";
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }   
                $conn->close();
            
           $ngrams = array(); 
           $len = strlen($word);
           for($i = 0; $i < $len; $i++) 
            {
                   if($i > ($n - 2)) {
                           $ng = '';
                           for($j = $n-1; $j >= 0; $j--) {
                                   $ng .= $word[$i-$j];
                                   
                           }
                           $ngrams[] = $ng;
                   }
            }
            
                
    $k = 3;                     //gram

            if($value == 'pendahuluan'){
                // echo "<br>== pendahuluan ==<br>";
                foreach($ngrams as $gram){
                    $all[] = save_array_pendahuluan($gram,$k,$b,$value,$ket);
    $n = 7;                        //window setting
                }
                    //    var_dump($ngrams);
                $cont = count($all);
                $alll = [];
                $arr = [];
                $arr_all = array(); 
                $len = count($all);
                   // var_dump($len);
                for($i = 0; $i < $len; $i++) {  //nilai hash di gram
                      
                           if($i > ($n - 2)) {
                                   $ng ='';
                                   for($j = $n-1; $j >= 0; $j--) {
                                    //    echo '['.$all[$i-$j].']'; //nilai hash
                                           $ng .= $all[$i-$j].'|';
                                           
                                   }
                                   $arr_all[] = $ng;
                           }
                }
                        //  var_dump($arr_all);
                   $hash = new hash();
                   $arr_has = [];
                for($a=0; $a < count($arr_all); $a++){  //pecah character
                       $split = explode('|',$arr_all[$a]);
                           for($i=0; $i < $n; $i++){
                               if($split[$i] != ""){
                                   $arr_has [] = $split[$i];
                               }
                           }
                               
                      
                }
                  
                    $cont = count($arr_has);
                    $nomer = 1;
                      
                for ($i=0; $i <$cont; $i++) {   //window
                              
                    $arr[] = $arr_has[$i];
                    if ($nomer == $n) {
                               // echo '<br>';
                               $alll [] = $arr;
                               $arr = [];
                               $nomer = 0;
                               
                    }
                          
                           $nomer += 1;   
                }
                // echo "<hr>";
                // echo "window";
                // echo "<hr>";
                // var_dump($alll);
                // echo "<hr>";
                // echo "<hr>";
                    $result = [];
   
                    foreach($alll as $r){   //nilai window terkecil
                           
                           sort($r);

                           if (!in_array($r[0],$result,true)) {
                               $result [] = $r[0];
                             
                           }   
                          
                    }
                    // echo "<hr>";
                    // echo "Fingerprint";
                    // echo "<hr>";
                    // var_dump($result);
                    // echo "<hr>";
                    // echo "<hr>";
                   $hash->gethash($result,$value,$ket);
            }elseif($value == 'kesimpulan'){
                // echo "<br>== kesimpulan ==<br>";
                foreach($ngrams as $gram){
                    $all[] = save_array_hasil($gram,$k,$b,$value,$ket);
    $n = 7;                     //window setting
                }
                $cont = count($all);
                $alll = [];
                $arr = [];
                $arr_all = array(); 
                $len = count($all);
                for($i = 0; $i < $len; $i++) {  //nilai hash di gram
                   
                        if($i > ($n - 2)) {
                                $ng ='';
                                for($j = $n-1; $j >= 0; $j--) {
                                 //    echo '['.$all[$i-$j].']'; //nilai hash
                                        $ng .= $all[$i-$j].'|';
                                        
                                }
                                $arr_all[] = $ng;
                        }
                      }
                        // var_dump($arr_all);
                  $hash = new hash();
                  $arr_has = [];
                  for($a=0; $a < count($arr_all); $a++){  //pecah character
                      $split = explode('|',$arr_all[$a]);
                     
                          for($i=0; $i < $n; $i++){
                              if($split[$i] != ""){
                                  $arr_has [] = $split[$i];
                              }
                          }
                              
                     
                  }
                 
                    
                      $cont = count($arr_has);
                      $nomer = 1;
                     
                      for ($i=0; $i <$cont; $i++) {   //window
                             
                          $arr[] = $arr_has[$i];
                          if ($nomer == $n) {
                              // echo '<br>';
                              $alll [] = $arr;
                              $arr = [];
                              $nomer = 0;
                              
                          }
                         
                          $nomer += 1;   
                        
                      }
                      $result = [];
                    //   echo "<hr>";
                    //   echo "window";
                    //   echo "<hr>";
                    //   var_dump($alll);
                    //   echo "<hr>";
                    //   echo "<hr>";
                      foreach($alll as $r){   //nilai window terkecil
                          
                          sort($r);
                          if (!in_array($r[0],$result,true)) {
                              $result [] = $r[0];
                            
                          }   
                         
                      }
                    // echo "<hr>";
                    // echo "Fingerprint";
                    // echo "<hr>";
                    // var_dump($result);
                    // echo "<hr>";
                    // echo "<hr>";
                  $hash->gethash($result,$value,$ket);
            }elseif($value == 'abstrak'){
                // echo "<br>== abstrak ==<br>";
                foreach($ngrams as $gram){
                    $all[] = save_array_abstrak($gram,$k,$b,$value,$ket);
    $n = 7;              //setting window
                    }
                   
                $cont = count($all);
                $alll = [];
                $arr = [];
                $arr_all = array(); 
                $len = count($all);
                for($i = 0; $i < $len; $i++) {  //nilai hash di gram
                   
                        if($i > ($n - 2)) {
                                $ng ='';
                                for($j = $n-1; $j >= 0; $j--) {
                                    // echo '['.$all[$i-$j].']'; //nilai hash
                                        $ng .= $all[$i-$j].'|';
                                        
                                }
                                $arr_all[] = $ng;
                        }
                      }
               
                $hash = new hash();
                $arr_has = [];
                for($a=0; $a < count($arr_all); $a++){  //pecah character
                    $split = explode('|',$arr_all[$a]);
                        for($i=0; $i < $n; $i++){
                            if($split[$i] != ""){
                                $arr_has [] = $split[$i];
                            }
                        }
                            
                   
                }
               
                    $cont = count($arr_has);
                    $nomer = 1;
                   
                    for ($i=0; $i <$cont; $i++) {   //window
                           
                        $arr[] = $arr_has[$i];
                        if ($nomer == $n) {
                            // echo '<br>';
                            $alll [] = $arr;
                            $arr = [];
                            $nomer = 0;
                            
                        }
                       
                        $nomer += 1;   
                      
                    }
                    $result = [];
                    // echo "<hr>";
                    // echo "window";
                    // echo "<hr>";
                    // var_dump($alll);
                    // echo "<hr>";
                    // echo "<hr>";
                    foreach($alll as $r){   //nilai window terkecil
                        
                        sort($r); 
                        if (!in_array($r[0],$result,true)) {
                            $result [] = $r[0];
                          
                        }   
                       
                    }
                    // echo "Fingerprint";
                    // echo "<hr>";
                    // echo "<hr>";
                    // var_dump($result);
                    // echo "<hr>";
                    // echo "<hr>";
                $hash->gethash($result,$value,$ket);

            }elseif($value == 'judul'){
                // echo "<br>== judul ==<br>";
                foreach($ngrams as $gram){
                    $all[] = save_array_judul($gram,$k,$b,$value,$ket);     
    $n = 7;     //setting window
                }
                // $n = 6;
                // var_dump($all);
                $cont = count($all);
                $alll = [];
                $arr = [];
                $arr_all = array(); 
                $len = count($all);
                for($i = 0; $i < $len; $i++) {  //nilai hash di gram
                   
                        if($i > ($n - 2)) {
                                $ng ='';
                                for($j = $n-1; $j >= 0; $j--) {
                                    // echo '['.$all[$i-$j].']'; //nilai hash
                                        $ng .= $all[$i-$j].'|';
                                        
                                }
                                $arr_all[] = $ng;
                        }
                      }
                    //   var_dump($arr_all);
                $hash = new hash();
                $arr_has = [];
                for($a=0; $a < count($arr_all); $a++){  //pecah character
                    $split = explode('|',$arr_all[$a]);
                        for($i=0; $i < $n; $i++){
                            if( $split[$i] != ""){
                                $arr_has [] = $split[$i];
                            }
                        }
                            
                   
                }
                // var_dump($arr_has);
                    $cont = count($arr_has);
                    $nomer = 1;
                   
                    for ($i=0; $i <$cont; $i++) {   //window
                        // echo $arr_has[$i];
                        // echo "<br>";
                        $arr[] = $arr_has[$i];
                        if ($nomer == $n) {
                            // echo '<br>';
                            $alll [] = $arr;
                            $arr = [];
                            $nomer = 0;
                            
                        }
                        
                       
                        $nomer += 1;   
                      
                    }
                    // var_dump($alll);
                    $result = [];
                            // echo "<hr>";
                            // echo "window";
                            // echo "<hr>";
                            // var_dump($alll);
                            // echo "<hr>";
                            // echo "<hr>";
                
                    foreach($alll as $r){   //nilai window terkecil
                        
                        sort($r);
                        if (!in_array($r[0],$result,true)) {
                            $result [] = $r[0];
                          
                        }   
                       
                    }
                    // echo "<hr>";
                    // echo "Fingerprint";
                    // echo "<hr>";
                    // var_dump($result);
                    // echo "<hr>";
                    // echo "<hr>";

                $hash->gethash($result,$value,$ket);
            }elseif($value == 'key'){
                // echo "<br>== katakunci ==<br>";
                        foreach($ngrams as $gram){
                            $all[] = save_array_key($gram,$k,$b,$value,$ket);     
    $n = 7;              //setting window
                        }
                        $cont = count($all);
                        // var_dump($cont);
                        $alll = [];
                        $arr = [];
                        $arr_all = array(); 
                        $len = count($all);
                    
                        for($i = 0; $i < $len; $i++) {  //nilai hash di gram
                        
                                if($i > ($n - 2)) {
                                        $ng ='';
                                        for($j = $n-1; $j >= 0; $j--) {
                                            // echo '['.$all[$i-$j].']'; //nilai hash
                                                $ng .= $all[$i-$j].'|';
                                                
                                        }
                                        $arr_all[] = $ng;
                                }
                            }
                    
                        $hash = new hash();
                        $arr_has = [];
                        for($a=0; $a < count($arr_all); $a++){  //pecah character
                            $split = explode('|',$arr_all[$a]);
                                for($i=0; $i < $n; $i++){
                                    if($split[$i] != ""){
                                        $arr_has [] = $split[$i];
                                    }
                                }   
                                    
                        
                        }
                    
                        $cont = count($arr_has);
                            $nomer = 1;
                        
                            for ($i=0; $i <$cont; $i++) {   //window
                                
                                $arr[] = $arr_has[$i];
                                if ($nomer == $n) {
                                    // echo '<br>';
                                    $alll [] = $arr;
                                    $arr = [];
                                    $nomer = 0;
                                    
                                }
                            
                                $nomer += 1;   
                            
                            }
                            $result = [];
                            // echo "<hr>";
                            // echo "window";
                            // echo "<table>";
                            // foreach($alll as $rr){
                                // echo "<tr>";
                               
                                // var_dump($rr);
                                // foreach($rr as $y){
                                    // echo "<td>";
                                    // echo $y;
                                    // echo "<td>";
                                // }
                              
                                // echo "</tr>";
                            // }
                            // var_dump($alll);
                            // echo "</table>";
                            // echo "<hr>";
                            foreach($alll as $r){   //nilai window terkecil
                                
                                sort($r);
                                if (!in_array($r[0],$result,true)) {
                                    $result [] = $r[0];
                                
                                }   
                            
                            }
                    // echo "<hr>";
                    // echo "Fingerprint";
                    // echo "<hr>";
                    // var_dump($result);
                    // echo "<hr>";
                    // echo "<hr>";
                        
    $hash->gethash($result,$value,$ket);
                    }
                        
                }
         
        }
       
        
        function save_array_judul($array,$n,$b,$value,$ket){  //save judul
            // var_dump($array);
            $array_judul = array();
            array_push($array_judul, $array);
            $array_judul = array_unique($array_judul);
            
           
           foreach($array_judul as $res){
            if($n == 2){
                    $arrayisisss = pre_print2gram($res,$b,$ket);
                }elseif($n == 3){
                    $arrayisisss = pre_print3gram($res,$b,$ket);
                }elseif($n == 4){
                    $arrayisisss = pre_print4gram($res,$b,$ket);
                }elseif($n == 5){
                    $arrayisisss =  pre_print5gram($res,$b,$ket);
                }elseif($n == 6){
                    $arrayisisss =  pre_print6gram($res,$b,$ket);
                }elseif($n == 7){
                    // var_dump($n);
                    $arrayisisss =  pre_print00gram($res,$b,$ket);
                }elseif($n == 8){
                    $arrayisisss =  pre_print8gram($res,$b,$ket);
                }elseif($n == 9){
                    $arrayisisss =  pre_print9gram($res,$b,$ket);
                }elseif($n == 10){
                    $arrayisisss =  pre_print10gram($res,$b,$ket);
            } 
           } 
          
            // var_dump($arrayisisss); //lihat gram dan ascii dan hash
           
           return $arrayisisss;
        }  

        function save_array_key($array,$n,$b,$value,$ket){  //save judul
            // var_dump($array);
            $array_judul = array();
            array_push($array_judul, $array);
            $array_judul = array_unique($array_judul);
           foreach($array_judul as $res){
            if($n == 2){
                    $arrayisisss = pre_print2gram($res,$b,$ket);
                }elseif($n == 3){
                    $arrayisisss = pre_print3gram($res,$b,$ket);
                }elseif($n == 4){
                    $arrayisisss = pre_print4gram($res,$b,$ket);
                }elseif($n == 5){
                    $arrayisisss =  pre_print5gram($res,$b,$ket);
                } elseif($n == 6){
                    $arrayisisss =  pre_print6gram($res,$b,$ket);
                } elseif($n == 7){
                    $arrayisisss =  pre_print00gram($res,$b,$ket);
                } elseif($n == 8){
                    $arrayisisss =  pre_print8gram($res,$b,$ket);
                } elseif($n == 9){
                    $arrayisisss =  pre_print9gram($res,$b,$ket);
                } elseif($n == 10){
                    $arrayisisss =  pre_print10gram($res,$b,$ket);
                } 
           } 
            //    var_dump($arrayisisss);
           return $arrayisisss;
        }

        function save_array_abstrak($array,$n,$b,$value,$ket){ //save abstrak
            // var_dump($array);
            $array_abstrak = array();
            array_push($array_abstrak, $array);
            $array_abstrak = array_unique($array_abstrak);
           foreach($array_abstrak as $res){
            if($n == 2){
                $arrayisisss = pre_print2gram($res,$b,$ket);
                }elseif($n == 3){
                    $arrayisisss = pre_print3gram($res,$b,$ket);
                }elseif($n == 4){
                    $arrayisisss =  pre_print4gram($res,$b,$ket);
                }elseif($n == 5){
                    $arrayisisss =  pre_print5gram($res,$b,$ket);
                }elseif($n == 6){
                    $arrayisisss =  pre_print6gram($res,$b,$ket);
                }elseif($n == 7){
                    $arrayisisss =  pre_print00gram($res,$b,$ket);
                }elseif($n == 8){
                    $arrayisisss =  pre_print8gram($res,$b,$ket);
                }elseif($n == 9){
                    $arrayisisss =  pre_print9gram($res,$b,$ket);
                }elseif($n == 10){
                    $arrayisisss =  pre_print10gram($res,$b,$ket);
                }
                     
           }
            //    var_dump($arrayisisss);
           return $arrayisisss;
        }

        function save_array_pendahuluan($array,$n,$b,$value,$ket){ //save pendahuluan
            // var_dump($array);
            $array_pendahuluan = array();
            array_push($array_pendahuluan, $array);
            $array_pendahuluan = array_unique($array_pendahuluan);
           foreach($array_pendahuluan as $res){
            if($n == 2){
                $arrayisisss =  pre_print2gram($res,$b,$ket);
                }elseif($n == 3){
                    $arrayisisss =  pre_print3gram($res,$b,$ket);
                }elseif($n == 4){
                    $arrayisisss =  pre_print4gram($res,$b,$ket);
                }elseif($n == 5){
                    $arrayisisss =  pre_print5gram($res,$b,$ket);
                }elseif($n == 6){
                    $arrayisisss =  pre_print6gram($res,$b,$ket);
                }elseif($n == 7){
                    $arrayisisss =  pre_print00gram($res,$b,$ket);
                }elseif($n == 8){
                    $arrayisisss =  pre_print8gram($res,$b,$ket);
                }elseif($n == 9){
                    $arrayisisss =  pre_print9gram($res,$b,$ket);
                }elseif($n == 10){
                    $arrayisisss =  pre_print10gram($res,$b,$ket);
                }
           }
            //   var_dump($arrayisisss);
           return $arrayisisss;
        } 

        function save_array_hasil($array,$n,$b,$value,$ket){ //save hasil
            // var_dump($array);
           
            $array_hasil = array();
            array_push($array_hasil, $array);
            $array_hasil = array_unique($array_hasil);
          
           foreach($array_hasil as $res){
           
            if($n == 2){
                $arrayisisss = pre_print2gram($res,$b,$ket);
            }elseif($n == 3){
                $arrayisisss = pre_print3gram($res,$b,$ket);
            }elseif($n == 4){
                $arrayisisss = pre_print4gram($res,$b,$ket);
            }elseif($n == 5){
                $arrayisisss =  pre_print5gram($res,$b,$ket);
            }elseif($n == 6){
                $arrayisisss =  pre_print6gram($res,$b,$ket);
               
            }elseif($n == 7){
                $arrayisisss =  pre_print00gram($res,$b,$ket);
            }elseif($n == 8){
                $arrayisisss =  pre_print8gram($res,$b,$ket);
            }elseif($n == 9){
                $arrayisisss =  pre_print9gram($res,$b,$ket);
            }elseif($n == 10){
                $arrayisisss =  pre_print10gram($res,$b,$ket);
            }
           
           }
            // var_dump($arrayisisss);
           return $arrayisisss;
        }
   
//gram 2
function pre_print2gram($var,$b,$ket){
        // var_dump($var);
        $arr_ch_asc = [];
        $arr_asc = new kode_asci();
        $hash = new hash();
        $count = strlen($var);  
        $kalimat = $var;
        $sub_kalimat = substr($kalimat,0);
        $arr_var = [$sub_kalimat[0]]; 
        $arr_var2 = [$sub_kalimat[1]];
        $asc = $arr_asc->ascii;

        $result=array_intersect($arr_var,$arr_asc->ascii);
        foreach($result as $res){    
            if($res == 'a'){
                    $arr_ch_asc ['0'] = 97;  
                    // echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 'b'){
                    $arr_ch_asc ['0'] = 98;  
                    // echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 'c'){
                    $arr_ch_asc ['0'] = 99;  
                    // echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 'd'){
                    $arr_ch_asc ['0'] = 100; 
                    // echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 'e'){
                    $arr_ch_asc ['0'] = 101; 
                    // echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 'f'){
                    $arr_ch_asc ['0'] = 102; 
                    //  echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 'g'){
                    $arr_ch_asc ['0'] = 103;  
                    // echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 'h'){
                    $arr_ch_asc ['0'] = 104;  
                    // echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 'i'){
                    $arr_ch_asc ['0'] = 105;  
                    // echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 'j'){
                    $arr_ch_asc ['0'] = 106;  
                    // echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 'k'){
                    $arr_ch_asc ['0'] = 107;  
                    // echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 'l'){
                    $arr_ch_asc ['0'] = 108;  
                    // echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 'm'){
                    $arr_ch_asc ['0'] = 109;  
                    // echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 'n'){
                    $arr_ch_asc ['0'] = 110;  
                    // echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 'o'){
                    $arr_ch_asc ['0'] = 111;  
                    // echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 'p'){
                    $arr_ch_asc ['0'] = 112;  
                    // echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 'q'){
                    $arr_ch_asc ['0'] = 113;  
                    // echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 'r'){
                    $arr_ch_asc ['0'] = 114;  
                    // echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 's'){
                    $arr_ch_asc ['0'] = 115;  
                    // echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 't'){
                    $arr_ch_asc ['0'] = 116;  
                    // echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 'u'){
                    $arr_ch_asc ['0'] = 117;  
                    // echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 'v'){
                    $arr_ch_asc ['0'] = 118;  
                    // echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 'w'){
                    $arr_ch_asc ['0'] = 119;  
                    // echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 'x'){
                    $arr_ch_asc ['0'] = 120;  
                    // echo '['.$arr_ch_asc[0].']'.$res;
                }if($res == 'y'){
                    $arr_ch_asc ['0'] = 121;  
                    // echo '['.$arr_ch_asc[0].']'.$res;
            }if($res == 'z'){
                $arr_ch_asc ['0'] = 122;  
                // echo '['.$arr_ch_asc[0].']'.$res;
            }
            
            $result1=array_intersect($arr_var2,$arr_asc->ascii);
        


            foreach($result1 as $res){      

                if($res == 'a'){
                            
                    $arr_ch_asc ['1'] = 97;  
                    // echo '['.$arr_ch_asc[1].']'.$res;    

                    }if($res == 'b'){
                        
                        $arr_ch_asc ['1'] = 98;  
                    // echo '['.$arr_ch_asc[1].']'.$res;    

                    }if($res == 'c'){
                        
                        $arr_ch_asc ['1'] = 99;  
                        // echo '['.$arr_ch_asc[1].']'.$res;

                    }if($res == 'd'){
                        
                        $arr_ch_asc ['1'] = 100;  
                        // echo '['.$arr_ch_asc[1].']'.$res;

                    }if($res == 'e'){
                        
                        $arr_ch_asc ['1'] = 101;  
                        // echo '['.$arr_ch_asc[1].']'.$res;

                    }if($res == 'f'){
                        
                        $arr_ch_asc ['1'] = 102;  
                        // echo '['.$arr_ch_asc[1].']'.$res;

                    }if($res == 'g'){
                        
                        $arr_ch_asc ['1'] = 103;  
                        // echo '['.$arr_ch_asc[1].']'.$res;

                    }if($res == 'h'){
                        
                        $arr_ch_asc ['1'] = 104;  
                        // echo '['.$arr_ch_asc[1].']'.$res;

                    }if($res == 'i'){
                        
                        $arr_ch_asc ['1'] = 105;  
                        // echo '['.$arr_ch_asc[1].']'.$res;

                    }if($res == 'j'){
                        
                        $arr_ch_asc ['1'] = 106;  
                        // echo '['.$arr_ch_asc[1].']'.$res;

                    }if($res == 'k'){
                        
                        $arr_ch_asc ['1'] = 107;  
                        // echo '['.$arr_ch_asc[1].']'.$res;

                    }if($res == 'l'){
                        
                        $arr_ch_asc ['1'] = 108;  
                        // echo '['.$arr_ch_asc[1].']'.$res;

                    }if($res == 'm'){
                        
                        $arr_ch_asc ['1'] = 109;  
                        // echo '['.$arr_ch_asc[1].']'.$res;

                    }if($res == 'n'){
                        
                        $arr_ch_asc ['1'] = 110;  
                        // echo '['.$arr_ch_asc[1].']'.$res;

                    }if($res == 'o'){
                        
                        $arr_ch_asc ['1'] = 111;  
                        // echo '['.$arr_ch_asc[1].']'.$res;

                    }if($res == 'p'){
                        
                        $arr_ch_asc ['1'] = 112;  
                        // echo '['.$arr_ch_asc[1].']'.$res;

                    }if($res == 'q'){
                        
                        $arr_ch_asc ['1'] = 113;  
                        // echo '['.$arr_ch_asc[1].']'.$res;

                    }if($res == 'r'){
                        
                        $arr_ch_asc ['1'] = 114;  
                        // echo '['.$arr_ch_asc[1].']'.$res;

                    }if($res == 's'){
                        
                        $arr_ch_asc ['1'] = 115;  
                        // echo '['.$arr_ch_asc[1].']'.$res;

                    }if($res == 't'){
                        
                        $arr_ch_asc ['1'] = 116;  
                        // echo '['.$arr_ch_asc[1].']'.$res;

                    }if($res == 'u'){
                        
                        $arr_ch_asc ['1'] = 117;  
                        // echo '['.$arr_ch_asc[1].']'.$res;

                    }if($res == 'v'){
                        
                        $arr_ch_asc ['1'] = 118;  
                        // echo '['.$arr_ch_asc[1].']'.$res;

                    }if($res == 'w'){
                        
                        $arr_ch_asc ['1'] = 119;  
                        // echo '['.$arr_ch_asc[1].']'.$res;

                    }if($res == 'x'){
                        
                        $arr_ch_asc ['1'] = 120;  
                        // echo '['.$arr_ch_asc[1].']'.$res;

                    }if($res == 'y'){
                        
                        $arr_ch_asc ['1'] = 121;  
                        // echo '['.$arr_ch_asc[1].']'.$res;

                    }if($res == 'z'){
                        $arr_ch_asc ['1'] = 122;  
                        // echo '['.$arr_ch_asc[1].']'.$res;
                }
            }
        }
        echo "Gram";
        echo "<table>";
    
        var_dump($arr_ch_asc);
        echo "</table>";
        return $hash->sethash($arr_ch_asc,$b,2,$ket);
}
// gram 3
function pre_print3gram($var,$b,$ket){
    // var_dump($var);
        $arr_ch_asc3 = [];
        $arr_asc = new kode_asci();
        $hash = new hash();
        $count = strlen($var);
        $kalimat = $var;
        $sub_kalimat = substr($kalimat,0);
        $arr_var = [$sub_kalimat[0]]; 
        $arr_var2 = [$sub_kalimat[1]]; 
        $arr_var3 = [$sub_kalimat[2]];
        $asc = $arr_asc->ascii;

        $result=array_intersect($arr_var,$arr_asc->ascii);
        $result1=array_intersect($arr_var2,$arr_asc->ascii);
        $result2=array_intersect($arr_var3,$arr_asc->ascii);
  
    foreach($result as $res){    
        
        if($res == 'a'){
                $arr_ch_asc3 ['0'] = 97;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 'b'){
                $arr_ch_asc3 ['0'] = 98;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 'c'){
                $arr_ch_asc3 ['0'] = 99;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 'd'){
                $arr_ch_asc3 ['0'] = 100;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 'e'){
                $arr_ch_asc3 ['0'] = 101;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 'f'){
                $arr_ch_asc3 ['0'] = 102;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 'g'){
                $arr_ch_asc3 ['0'] = 103;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 'h'){
                $arr_ch_asc3 ['0'] = 104;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 'i'){
                $arr_ch_asc3 ['0'] = 105;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 'j'){
                $arr_ch_asc3 ['0'] = 106;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 'k'){
                $arr_ch_asc3 ['0'] = 107;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 'l'){
                $arr_ch_asc3 ['0'] = 108;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 'm'){
                $arr_ch_asc3 ['0'] = 109;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 'n'){
                $arr_ch_asc3 ['0'] = 110;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 'o'){
                $arr_ch_asc3 ['0'] = 111;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 'p'){
                $arr_ch_asc3 ['0'] = 112;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 'q'){
                $arr_ch_asc3 ['0'] = 113;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 'r'){
                $arr_ch_asc3 ['0'] = 114;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 's'){
                $arr_ch_asc3 ['0'] = 115;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 't'){
                $arr_ch_asc3 ['0'] = 116;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 'u'){
                $arr_ch_asc3 ['0'] = 117;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 'v'){
                $arr_ch_asc3 ['0'] = 118;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 'w'){
                $arr_ch_asc3 ['0'] = 119;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 'x'){
                $arr_ch_asc3 ['0'] = 120;  
                // echo '['.$arr_ch_asc3[0].']'.$res;
            }if($res == 'y'){
                $arr_ch_asc3 ['0'] = 121;  
            // echo '['.$arr_ch_asc3[0].']'.$res;
        }if($res == 'z'){
            $arr_ch_asc3 ['0'] = 122;  
            // echo '['.$arr_ch_asc3[0].']'.$res;
        }
        
     foreach($result1 as $res){    
        if($res == 'a'){
                $arr_ch_asc3 ['1'] = 97;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 'b'){
                $arr_ch_asc3 ['1'] = 98;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 'c'){
                $arr_ch_asc3 ['1'] = 99;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 'd'){
                $arr_ch_asc3 ['1'] = 100;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 'e'){
                $arr_ch_asc3 ['1'] = 101;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 'f'){
                $arr_ch_asc3 ['1'] = 102;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 'g'){
                $arr_ch_asc3 ['1'] = 103;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 'h'){
                $arr_ch_asc3 ['1'] = 104;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 'i'){
                $arr_ch_asc3 ['1'] = 105;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 'j'){
                $arr_ch_asc3 ['1'] = 106;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 'k'){
                $arr_ch_asc3 ['1'] = 107;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 'l'){
                $arr_ch_asc3 ['1'] = 108;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 'm'){
                $arr_ch_asc3 ['1'] = 109;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 'n'){
                $arr_ch_asc3 ['1'] = 110;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 'o'){
                $arr_ch_asc3 ['1'] = 111;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 'p'){
                $arr_ch_asc3 ['1'] = 112;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 'q'){
                $arr_ch_asc3 ['1'] = 113;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 'r'){
                $arr_ch_asc3 ['1'] = 114;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 's'){
                $arr_ch_asc3 ['1'] = 115;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 't'){
                $arr_ch_asc3 ['1'] = 116;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 'u'){
                $arr_ch_asc3 ['1'] = 117;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 'v'){
                $arr_ch_asc3 ['1'] = 118;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 'w'){
                $arr_ch_asc3 ['1'] = 119;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 'x'){
                $arr_ch_asc3 ['1'] = 120;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
            }if($res == 'y'){
                $arr_ch_asc3 ['1'] = 121;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
        }if($res == 'z'){
                $arr_ch_asc3 ['1'] = 122;  
                // echo '['.$arr_ch_asc3[1].']'.$res;
        }
    
      foreach($result2 as $res){   
        if($res == 'a'){
                $arr_ch_asc3 ['2'] = 97;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 'b'){
                $arr_ch_asc3 ['2'] = 98;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 'c'){
                $arr_ch_asc3 ['2'] = 99;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 'd'){
                $arr_ch_asc3 ['2'] = 100;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 'e'){
                $arr_ch_asc3 ['2'] = 101;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 'f'){
                $arr_ch_asc3 ['2'] = 102;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 'g'){
                $arr_ch_asc3 ['2'] = 103;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 'h'){
                $arr_ch_asc3 ['2'] = 104;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 'i'){
                $arr_ch_asc3 ['2'] = 105;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 'j'){
                $arr_ch_asc3 ['2'] = 106;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 'k'){
                $arr_ch_asc3 ['2'] = 107;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 'l'){
                $arr_ch_asc3 ['2'] = 108;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 'm'){
                $arr_ch_asc3 ['2'] = 109;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 'n'){
                $arr_ch_asc3 ['2'] = 110;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 'o'){
                $arr_ch_asc3 ['2'] = 111;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 'p'){
                $arr_ch_asc3 ['2'] = 112;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 'q'){
                $arr_ch_asc3 ['2'] = 113;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 'r'){
                $arr_ch_asc3 ['2'] = 114;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 's'){
                $arr_ch_asc3 ['2'] = 115;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 't'){
                $arr_ch_asc3 ['2'] = 116;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 'u'){
                $arr_ch_asc3 ['2'] = 117;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 'v'){
                $arr_ch_asc3 ['2'] = 118;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 'w'){
                $arr_ch_asc3 ['2'] = 119;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 'x'){
                $arr_ch_asc3 ['2'] = 120;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
            }if($res == 'y'){
                $arr_ch_asc3 ['2'] = 121;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
        }if($res == 'z'){
                $arr_ch_asc3 ['2'] = 122;  
                // echo '['.$arr_ch_asc3[2].']'.$res;
         }
        }
      }
    }
    // var_dump($arr_ch_asc3);
    // echo "Gram";
    // echo "<table>";

    // var_dump($arr_ch_asc3);
    // echo "</table>";
   
    return $hash->sethash($arr_ch_asc3,$b,3,$ket);
   
}
// gram 4
function pre_print4gram($var,$b,$ket){
    $arr_ch_asc4 = [];
    $arr_asc = new kode_asci();
    $hash = new hash();
    $count = strlen($var);
    $kalimat = $var;
    $sub_kalimat = substr($kalimat,0);
    $arr_var = [$sub_kalimat[0]]; 
    $arr_var2 = [$sub_kalimat[1]]; 
    $arr_var3 = [$sub_kalimat[2]];
    $arr_var4 = [$sub_kalimat[3]];
    $asc = $arr_asc->ascii;

    $result=array_intersect($arr_var,$arr_asc->ascii);
    $result1=array_intersect($arr_var2,$arr_asc->ascii);
    $result2=array_intersect($arr_var3,$arr_asc->ascii);
    $result3=array_intersect($arr_var4,$arr_asc->ascii);

    foreach($result as $res){    
    
        if($res == 'a'){
            $arr_ch_asc4 ['0'] = 97;  
            // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'b'){
                $arr_ch_asc4 ['0'] = 98;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'c'){
                $arr_ch_asc4 ['0'] = 99;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'd'){
                $arr_ch_asc4 ['0'] = 100;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'e'){
                $arr_ch_asc4 ['0'] = 101;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'f'){
                $arr_ch_asc4 ['0'] = 102;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'g'){
                $arr_ch_asc4 ['0'] = 103;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'h'){
                $arr_ch_asc4 ['0'] = 104;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'i'){
                $arr_ch_asc4 ['0'] = 105;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'j'){
                $arr_ch_asc4 ['0'] = 106;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'k'){
                $arr_ch_asc4 ['0'] = 107;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'l'){
                $arr_ch_asc4 ['0'] = 108;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'm'){
                $arr_ch_asc4 ['0'] = 109;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'n'){
                $arr_ch_asc4 ['0'] = 110;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'o'){
                $arr_ch_asc4 ['0'] = 111;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'p'){
                $arr_ch_asc4 ['0'] = 112;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'q'){
                $arr_ch_asc4 ['0'] = 113;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'r'){
                $arr_ch_asc4 ['0'] = 114;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 's'){
                $arr_ch_asc4 ['0'] = 115;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 't'){
                $arr_ch_asc4 ['0'] = 116;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'u'){
                $arr_ch_asc4 ['0'] = 117;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'v'){
                $arr_ch_asc4 ['0'] = 118;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'w'){
                $arr_ch_asc4 ['0'] = 119;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'x'){
                $arr_ch_asc4 ['0'] = 120;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'y'){
                $arr_ch_asc4 ['0'] = 121;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
        }if($res == 'z'){
            $arr_ch_asc4 ['0'] = 122;  
            // echo '['.$arr_ch_asc4[0].']'.$res;
        }
        
        foreach($result1 as $res){    
        
        if($res == 'a'){
            $arr_ch_asc4 ['1'] = 97;  
            // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'b'){
                $arr_ch_asc4 ['1'] = 98;  
                    // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'c'){
                $arr_ch_asc4 ['1'] = 99;  
                    // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'd'){
                $arr_ch_asc4 ['1'] = 100;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'e'){
                $arr_ch_asc4 ['1'] = 101;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'f'){
                $arr_ch_asc4 ['1'] = 102;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'g'){
                $arr_ch_asc4 ['1'] = 103;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'h'){
                $arr_ch_asc4 ['1'] = 104;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'i'){
                $arr_ch_asc4 ['1'] = 105;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'j'){
                $arr_ch_asc4 ['1'] = 106;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'k'){
                $arr_ch_asc4 ['1'] = 107;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'l'){
                $arr_ch_asc4 ['1'] = 108;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'm'){
                $arr_ch_asc4 ['1'] = 109;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'n'){
                $arr_ch_asc4 ['1'] = 110;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'o'){
                $arr_ch_asc4 ['1'] = 111;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'p'){
                $arr_ch_asc4 ['1'] = 112;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'q'){
                $arr_ch_asc4 ['1'] = 113;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'r'){
                $arr_ch_asc4 ['1'] = 114;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 's'){
                $arr_ch_asc4 ['1'] = 115;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 't'){
                $arr_ch_asc4 ['1'] = 116;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'u'){
                $arr_ch_asc4 ['1'] = 117;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'v'){
                $arr_ch_asc4 ['1'] = 118;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'w'){
                $arr_ch_asc4 ['1'] = 119;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'x'){
                $arr_ch_asc4 ['1'] = 120;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'y'){
                $arr_ch_asc4 ['1'] = 121;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
        }if($res == 'z'){
            $arr_ch_asc4 ['1'] = 122;  
            // echo '['.$arr_ch_asc4[1].']'.$res;
        }

    foreach($result2 as $res){    

        if($res == 'a'){
            $arr_ch_asc4 ['2'] = 97;
            // echo '['.$arr_ch_asc4[2].']'.$res;  
            
            }if($res == 'b'){
                $arr_ch_asc4 ['2'] = 98;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
                
            }if($res == 'c'){
                $arr_ch_asc4 ['2'] = 99;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
                
            }if($res == 'd'){
                $arr_ch_asc4 ['2'] = 100;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
                
            }if($res == 'e'){
                $arr_ch_asc4 ['2'] = 101;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'f'){
                $arr_ch_asc4 ['2'] = 102;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'g'){
                $arr_ch_asc4 ['2'] = 103;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'h'){
                $arr_ch_asc4 ['2'] = 104;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'i'){
                $arr_ch_asc4 ['2'] = 105;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'j'){
                $arr_ch_asc4 ['2'] = 106;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'k'){
                $arr_ch_asc4 ['2'] = 107;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'l'){
                $arr_ch_asc4 ['2'] = 108;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'm'){
                $arr_ch_asc4 ['2'] = 109;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'n'){
                $arr_ch_asc4 ['2'] = 110;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'o'){
                $arr_ch_asc4 ['2'] = 111;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'p'){
                $arr_ch_asc4 ['2'] = 112;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'q'){
                $arr_ch_asc4 ['2'] = 113;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'r'){
                $arr_ch_asc4 ['2'] = 114;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 's'){
                $arr_ch_asc4 ['2'] = 115;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 't'){
                $arr_ch_asc4 ['2'] = 116;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'u'){
                $arr_ch_asc4 ['2'] = 117;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'v'){
                $arr_ch_asc4 ['2'] = 118;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'w'){
                $arr_ch_asc4 ['2'] = 119;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'x'){
                $arr_ch_asc4 ['2'] = 120;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'y'){
                $arr_ch_asc4 ['2'] = 121;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
        }if($res == 'z'){
            $arr_ch_asc4 ['2'] = 122;
            // echo '['.$arr_ch_asc4[2].']'.$res;  
        }

    foreach($result3 as $res){    
        if($res == 'a'){
            $arr_ch_asc4 ['3'] = 97;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
            }if($res == 'b'){
                $arr_ch_asc4 ['3'] = 98;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
            }if($res == 'c'){
                $arr_ch_asc4 ['3'] = 99;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
            }if($res == 'd'){
                $arr_ch_asc4 ['3'] = 100;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'e'){
                $arr_ch_asc4 ['3'] = 101;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'f'){
                $arr_ch_asc4 ['3'] = 102;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'g'){
                $arr_ch_asc4 ['3'] = 103;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'h'){
                $arr_ch_asc4 ['3'] = 104;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'i'){
                $arr_ch_asc4 ['3'] = 105;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'j'){
                $arr_ch_asc4 ['3'] = 106;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'k'){
                $arr_ch_asc4 ['3'] = 107;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'l'){
                $arr_ch_asc4 ['3'] = 108;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'm'){
                $arr_ch_asc4 ['3'] = 109;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'n'){
                $arr_ch_asc4 ['3'] = 110;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'o'){
                $arr_ch_asc4 ['3'] = 111;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'p'){
                $arr_ch_asc4 ['3'] = 112;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'q'){
                $arr_ch_asc4 ['3'] = 113;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'r'){
                $arr_ch_asc4 ['3'] = 114;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 's'){
                $arr_ch_asc4 ['3'] = 115;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 't'){
                $arr_ch_asc4 ['3'] = 116;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'u'){
                $arr_ch_asc4 ['3'] = 117;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'v'){
                $arr_ch_asc4 ['3'] = 118;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'w'){
                $arr_ch_asc4 ['3'] = 119;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'x'){
                $arr_ch_asc4 ['3'] = 120;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'y'){
                $arr_ch_asc4 ['3'] = 121;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
            
        }if($res == 'z'){
            $arr_ch_asc4 ['3'] = 122;  
            // echo '['.$arr_ch_asc4[3].']'.$res;
            
        }
    }
   }
  }
 }
 echo "Gram";
 echo "<table>";

 var_dump($arr_ch_asc4);
 echo "</table>";

return $hash->sethash($arr_ch_asc4,$b,4,$ket);
}
// gram 5
function pre_print5gram($var,$b,$ket){
        $arr_ch_asc5 = [];
        $arr_asc = new kode_asci();
        $hash = new hash();
        $count = strlen($var);
        $kalimat = $var;
        $sub_kalimat = substr($kalimat,0);
        $arr_var = [$sub_kalimat[0]]; 
        $arr_var2 = [$sub_kalimat[1]]; 
        $arr_var3 = [$sub_kalimat[2]];
        $arr_var4 = [$sub_kalimat[3]];
        $arr_var5 = [$sub_kalimat[4]];
        $asc = $arr_asc->ascii;

        $result=array_intersect($arr_var,$arr_asc->ascii);
        $result1=array_intersect($arr_var2,$arr_asc->ascii);
        $result2=array_intersect($arr_var3,$arr_asc->ascii);
        $result3=array_intersect($arr_var4,$arr_asc->ascii);
        $result4=array_intersect($arr_var5,$arr_asc->ascii);
  
    foreach($result as $res){    
        
            if($res == 'a'){
            $arr_ch_asc5 ['0'] = 97;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 'b'){
            $arr_ch_asc5 ['0'] = 98;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 'c'){
            $arr_ch_asc5 ['0'] = 99;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 'd'){
            $arr_ch_asc5 ['0'] = 100;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 'e'){
            $arr_ch_asc5 ['0'] = 101;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 'f'){
            $arr_ch_asc5 ['0'] = 102;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 'g'){
            $arr_ch_asc5 ['0'] = 103;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 'h'){
            $arr_ch_asc5 ['0'] = 104;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 'i'){
            $arr_ch_asc5 ['0'] = 105;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 'j'){
            $arr_ch_asc5 ['0'] = 106;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 'k'){
            $arr_ch_asc5 ['0'] = 107;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 'l'){
            $arr_ch_asc5 ['0'] = 108;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 'm'){
            $arr_ch_asc5 ['0'] = 109;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 'n'){
            $arr_ch_asc5 ['0'] = 110;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 'o'){
            $arr_ch_asc5 ['0'] = 111;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 'p'){
            $arr_ch_asc5 ['0'] = 112;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 'q'){
            $arr_ch_asc5 ['0'] = 113;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 'r'){
            $arr_ch_asc5 ['0'] = 114;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 's'){
            $arr_ch_asc5 ['0'] = 115;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 't'){
            $arr_ch_asc5 ['0'] = 116;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 'u'){
            $arr_ch_asc5 ['0'] = 117;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 'v'){
            $arr_ch_asc5 ['0'] = 118;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 'w'){
            $arr_ch_asc5 ['0'] = 119;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 'x'){
            $arr_ch_asc5 ['0'] = 120;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 'y'){
            $arr_ch_asc5 ['0'] = 121;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
        }if($res == 'z'){
            $arr_ch_asc5 ['0'] = 122;
            //  echo '['.$arr_ch_asc5[0].']'.$res;  
            
      }
        
    foreach($result1 as $res){    
        
            if($res == 'a'){
            $arr_ch_asc5 ['1'] = 97;
            // echo '['.$arr_ch_asc5[1].']'.$res;
             
            
        }if($res == 'b'){
            $arr_ch_asc5 ['1'] = 98;
            // echo '['.$arr_ch_asc5[1].']'.$res;  
            
        }if($res == 'c'){
            $arr_ch_asc5 ['1'] = 99;
            // echo '['.$arr_ch_asc5[1].']'.$res;  
            
        }if($res == 'd'){
            $arr_ch_asc5 ['1'] = 100;
            // echo '['.$arr_ch_asc5[1].']'.$res;  

        }if($res == 'e'){
            $arr_ch_asc5 ['1'] = 101;
            // echo '['.$arr_ch_asc5[1].']'.$res;  

        }if($res == 'f'){
            $arr_ch_asc5 ['1'] = 102;
            // echo '['.$arr_ch_asc5[1].']'.$res;  

        }if($res == 'g'){
            $arr_ch_asc5 ['1'] = 103;
            // echo '['.$arr_ch_asc5[1].']'.$res;  

        }if($res == 'h'){
            $arr_ch_asc5 ['1'] = 104;
            // echo '['.$arr_ch_asc5[1].']'.$res;  

        }if($res == 'i'){
            $arr_ch_asc5 ['1'] = 105;
            // echo '['.$arr_ch_asc5[1].']'.$res;  

        }if($res == 'j'){
            $arr_ch_asc5 ['1'] = 106;
            // echo '['.$arr_ch_asc5[1].']'.$res;  

        }if($res == 'k'){
            $arr_ch_asc5 ['1'] = 107;
            // echo '['.$arr_ch_asc5[1].']'.$res;  

        }if($res == 'l'){
            $arr_ch_asc5 ['1'] = 108;
            // echo '['.$arr_ch_asc5[1].']'.$res;  

        }if($res == 'm'){
            $arr_ch_asc5 ['1'] = 109;
            // echo '['.$arr_ch_asc5[1].']'.$res;  

        }if($res == 'n'){
            $arr_ch_asc5 ['1'] = 110;
            // echo '['.$arr_ch_asc5[1].']'.$res;  

        }if($res == 'o'){
            $arr_ch_asc5 ['1'] = 111;
            // echo '['.$arr_ch_asc5[1].']'.$res;  

        }if($res == 'p'){
            $arr_ch_asc5 ['1'] = 112;
            // echo '['.$arr_ch_asc5[1].']'.$res;  

        }if($res == 'q'){
            $arr_ch_asc5 ['1'] = 113;
            // echo '['.$arr_ch_asc5[1].']'.$res;  

        }if($res == 'r'){
            $arr_ch_asc5 ['1'] = 114;
            // echo '['.$arr_ch_asc5[1].']'.$res;  

        }if($res == 's'){
            $arr_ch_asc5 ['1'] = 115;
            // echo '['.$arr_ch_asc5[1].']'.$res;  

        }if($res == 't'){
            $arr_ch_asc5 ['1'] = 116;
            // echo '['.$arr_ch_asc5[1].']'.$res;  

        }if($res == 'u'){
            $arr_ch_asc5 ['1'] = 117;
            // echo '['.$arr_ch_asc5[1].']'.$res;  

        }if($res == 'v'){
            $arr_ch_asc5 ['1'] = 118;
            // echo '['.$arr_ch_asc5[1].']'.$res;  

        }if($res == 'w'){
            $arr_ch_asc5 ['1'] = 119;
            // echo '['.$arr_ch_asc5[1].']'.$res;  

        }if($res == 'x'){
            $arr_ch_asc5 ['1'] = 120;
            // echo '['.$arr_ch_asc5[1].']'.$res;  

        }if($res == 'y'){
            $arr_ch_asc5 ['1'] = 121;
            // echo '['.$arr_ch_asc5[1].']'.$res;  

        }if($res == 'z'){
            $arr_ch_asc5 ['1'] = 122;
            // echo '['.$arr_ch_asc5[1].']'.$res;  

        }
    
   
    foreach($result2 as $res){    
    
        if($res == 'a'){
        $arr_ch_asc5 ['2']= 97;
        // echo '['.$arr_ch_asc5[2].']'.$res;  
        
            }if($res == 'b'){
                $arr_ch_asc5 ['2'] = 98;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
            }if($res == 'c'){
                $arr_ch_asc5 ['2'] = 99;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
            }if($res == 'd'){
                $arr_ch_asc5 ['2'] = 100;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
                
                
            }if($res == 'e'){
                $arr_ch_asc5 ['2'] = 101;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
                
                
            }if($res == 'f'){
                $arr_ch_asc5 ['2'] = 102;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
                
                
            }if($res == 'g'){
                $arr_ch_asc5 ['2'] = 103;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
                
                
            }if($res == 'h'){
                $arr_ch_asc5 ['2'] = 104;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
                
                
            }if($res == 'i'){
                $arr_ch_asc5 ['2'] = 105;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
                
                
            }if($res == 'j'){
                $arr_ch_asc5 ['2'] = 106;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
                
                
            }if($res == 'k'){
                $arr_ch_asc5 ['2'] = 107;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
                
                
            }if($res == 'l'){
                $arr_ch_asc5 ['2'] = 108;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
                
                
            }if($res == 'm'){
                $arr_ch_asc5 ['2'] = 109;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
                
                
            }if($res == 'n'){
                $arr_ch_asc5 ['2'] = 110;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
                
                
            }if($res == 'o'){
                $arr_ch_asc5 ['2'] = 111;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
                
                
            }if($res == 'p'){
                $arr_ch_asc5 ['2'] = 112;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
                
                
            }if($res == 'q'){
                $arr_ch_asc5 ['2'] = 113;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
                
                
            }if($res == 'r'){
                $arr_ch_asc5 ['2'] = 114;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
                
                
            }if($res == 's'){
                $arr_ch_asc5 ['2'] = 115;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
                
                
            }if($res == 't'){
                $arr_ch_asc5 ['2'] = 116;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
                
                
            }if($res == 'u'){
                $arr_ch_asc5 ['2'] = 117;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
                
                
            }if($res == 'v'){
                $arr_ch_asc5 ['2'] = 118;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
                
                
            }if($res == 'w'){
                $arr_ch_asc5 ['2'] = 119;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
                
                
            }if($res == 'x'){
                $arr_ch_asc5 ['2'] = 120;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
                
                
            }if($res == 'y'){
                $arr_ch_asc5 ['2'] = 121;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
                
                
            }if($res == 'z'){
                $arr_ch_asc5 ['2'] = 122;
                // echo '['.$arr_ch_asc5[2].']'.$res;  
                
                
        
        }

    foreach($result3 as $res){    
        
        if($res == 'a'){
            $arr_ch_asc5 ['3'] = 97;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            
        }if($res == 'b'){
            $arr_ch_asc5 ['3'] = 98;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            
        }if($res == 'c'){
            $arr_ch_asc5 ['3'] = 99;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            
        }if($res == 'd'){
            $arr_ch_asc5 ['3'] = 100;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            

            
        }if($res == 'e'){
            $arr_ch_asc5 ['3'] = 101;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            

            
        }if($res == 'f'){
            $arr_ch_asc5 ['3'] = 102;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            

            
        }if($res == 'g'){
            $arr_ch_asc5 ['3'] = 103;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            

            
        }if($res == 'h'){
            $arr_ch_asc5 ['3'] = 104;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            

            
        }if($res == 'i'){
            $arr_ch_asc5 ['3'] = 105;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            

            
        }if($res == 'j'){
            $arr_ch_asc5 ['3'] = 106;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            

            
        }if($res == 'k'){
            $arr_ch_asc5 ['3'] = 107;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            

            
        }if($res == 'l'){
            $arr_ch_asc5 ['3'] = 108;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            

            
        }if($res == 'm'){
            $arr_ch_asc5 ['3'] = 109;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            

            
        }if($res == 'n'){
            $arr_ch_asc5 ['3'] = 110;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            

            
        }if($res == 'o'){
            $arr_ch_asc5 ['3'] = 111;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            

            
        }if($res == 'p'){
            $arr_ch_asc5 ['3'] = 112;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            

            
        }if($res == 'q'){
            $arr_ch_asc5 ['3'] = 113;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            

            
        }if($res == 'r'){
            $arr_ch_asc5 ['3'] = 114;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            

            
        }if($res == 's'){
            $arr_ch_asc5 ['3'] = 115;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            

            
        }if($res == 't'){
            $arr_ch_asc5 ['3'] = 116;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            

            
        }if($res == 'u'){
            $arr_ch_asc5 ['3'] = 117;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            

            
        }if($res == 'v'){
            $arr_ch_asc5 ['3'] = 118;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            

            
        }if($res == 'w'){
            $arr_ch_asc5 ['3'] = 119;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            

            
        }if($res == 'x'){
            $arr_ch_asc5 ['3'] = 120;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            

            
        }if($res == 'y'){
            $arr_ch_asc5 ['3'] = 121;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            

            
        }if($res == 'z'){
            $arr_ch_asc5 ['3'] = 122;
            // echo '['.$arr_ch_asc5[3].']'.$res;    
            

            
        }
    foreach($result4 as $res){    
            
            if($res == 'a'){
                $arr_ch_asc5 ['4'] = 97;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                
            }if($res == 'b'){
                $arr_ch_asc5 ['4'] = 98;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                
            }if($res == 'c'){
                $arr_ch_asc5 ['4'] = 99;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                
            }if($res == 'd'){
                $arr_ch_asc5 ['4'] = 100;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                

                
            }if($res == 'e'){
                $arr_ch_asc5 ['4'] = 101;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                

                
            }if($res == 'f'){
                $arr_ch_asc5 ['4'] = 102;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                

                
            }if($res == 'g'){
                $arr_ch_asc5 ['4'] = 103;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                

                
            }if($res == 'h'){
                $arr_ch_asc5 ['4'] = 104;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                

                
            }if($res == 'i'){
                $arr_ch_asc5 ['4'] = 105;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                

                
            }if($res == 'j'){
                $arr_ch_asc5 ['4'] = 106;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                

                
            }if($res == 'k'){
                $arr_ch_asc5 ['4'] = 107;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                

                
            }if($res == 'l'){
                $arr_ch_asc5 ['4'] = 108;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                

                
            }if($res == 'm'){
                $arr_ch_asc5 ['4'] = 109;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                

                
            }if($res == 'n'){
                $arr_ch_asc5 ['4'] = 110;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                

                
            }if($res == 'o'){
                $arr_ch_asc5 ['4'] = 111;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                

                
            }if($res == 'p'){
                $arr_ch_asc5 ['4'] = 112;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                

                
            }if($res == 'q'){
                $arr_ch_asc5 ['4'] = 113;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                

                
            }if($res == 'r'){
                $arr_ch_asc5 ['4'] = 114;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                

                
            }if($res == 's'){
                $arr_ch_asc5 ['4'] = 115;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                

                
            }if($res == 't'){
                $arr_ch_asc5 ['4'] = 116;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                

                
            }if($res == 'u'){
                $arr_ch_asc5 ['4'] = 117;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                

                
            }if($res == 'v'){
                $arr_ch_asc5 ['4'] = 118;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                

                
            }if($res == 'w'){
                $arr_ch_asc5 ['4'] = 119;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                

                
            }if($res == 'x'){
                $arr_ch_asc5 ['4'] = 120;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                

                
            }if($res == 'y'){
                $arr_ch_asc5 ['4'] = 121;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                

                
            }if($res == 'z'){
                $arr_ch_asc5 ['4'] = 122;
                //  echo '['.$arr_ch_asc5[4].']'.$res;    
                

                
            }
        }
    }
  }
 }
}
 echo "Gram";
 echo "<table>";

 var_dump($arr_ch_asc5);
 echo "</table>";
return $hash->sethash($arr_ch_asc5,$b,5,$ket);
}
//gram 6
function pre_print6gram($var,$b,$ket){
    $arr_ch_asc6 = [];
    $arr_asc = new kode_asci();
    $hash = new hash();
    $count = strlen($var);
    $kalimat = $var;
    $sub_kalimat = substr($kalimat,0);
    $arr_var = [$sub_kalimat[0]]; 
    $arr_var2 = [$sub_kalimat[1]]; 
    $arr_var3 = [$sub_kalimat[2]];
    $arr_var4 = [$sub_kalimat[3]];
    $arr_var5 = [$sub_kalimat[4]];
    $arr_var6 = [$sub_kalimat[5]];
    $asc = $arr_asc->ascii;

    $result=array_intersect($arr_var,$arr_asc->ascii);
    $result1=array_intersect($arr_var2,$arr_asc->ascii);
    $result2=array_intersect($arr_var3,$arr_asc->ascii);
    $result3=array_intersect($arr_var4,$arr_asc->ascii);
    $result4=array_intersect($arr_var5,$arr_asc->ascii);
    $result5=array_intersect($arr_var6,$arr_asc->ascii);

foreach($result as $res){    //1
    
  if($res == 'a'){
        $arr_ch_asc6 ['0'] = 97;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 'b'){
        $arr_ch_asc6 ['0'] = 98;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 'c'){
        $arr_ch_asc6 ['0'] = 99;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 'd'){
        $arr_ch_asc6 ['0'] = 100;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 'e'){
        $arr_ch_asc6 ['0'] = 101;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 'f'){
        $arr_ch_asc6 ['0'] = 102;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 'g'){
        $arr_ch_asc6 ['0'] = 103;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 'h'){
        $arr_ch_asc6 ['0'] = 104;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 'i'){
        $arr_ch_asc6 ['0'] = 105;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 'j'){
        $arr_ch_asc6 ['0'] = 106;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 'k'){
        $arr_ch_asc6 ['0'] = 107;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 'l'){
        $arr_ch_asc6 ['0'] = 108;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 'm'){
        $arr_ch_asc6 ['0'] = 109;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 'n'){
        $arr_ch_asc6 ['0'] = 110;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 'o'){
        $arr_ch_asc6 ['0'] = 111;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 'p'){
        $arr_ch_asc6 ['0'] = 112;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 'q'){
        $arr_ch_asc6 ['0'] = 113;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 'r'){
        $arr_ch_asc6 ['0'] = 114;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 's'){
        $arr_ch_asc6 ['0'] = 115;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 't'){
        $arr_ch_asc6 ['0'] = 116;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 'u'){
        $arr_ch_asc6 ['0'] = 117;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 'v'){
        $arr_ch_asc6 ['0'] = 118;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 'w'){
        $arr_ch_asc6 ['0'] = 119;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 'x'){
        $arr_ch_asc6 ['0'] = 120;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 'y'){
        $arr_ch_asc6 ['0'] = 121;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
    }if($res == 'z'){
        $arr_ch_asc6 ['0'] = 122;
        //  echo '['.$arr_ch_asc6[0].']'.$res;  
        
  }
    
foreach($result1 as $res){     //2
    
 if($res == 'a'){
        $arr_ch_asc6 ['1'] = 97;
        // echo '['.$arr_ch_asc6[1].']'.$res;
         
        
    }if($res == 'b'){
        $arr_ch_asc6 ['1'] = 98;
        // echo '['.$arr_ch_asc6[1].']'.$res;  
        
    }if($res == 'c'){
        $arr_ch_asc6 ['1'] = 99;
        // echo '['.$arr_ch_asc6[1].']'.$res;  
        
    }if($res == 'd'){
        $arr_ch_asc6 ['1'] = 100;
        // echo '['.$arr_ch_asc6[1].']'.$res;  

    }if($res == 'e'){
        $arr_ch_asc6 ['1'] = 101;
        // echo '['.$arr_ch_asc6[1].']'.$res;  

    }if($res == 'f'){
        $arr_ch_asc6 ['1'] = 102;
        // echo '['.$arr_ch_asc6[1].']'.$res;  

    }if($res == 'g'){
        $arr_ch_asc6 ['1'] = 103;
        // echo '['.$arr_ch_asc6[1].']'.$res;  

    }if($res == 'h'){
        $arr_ch_asc6 ['1'] = 104;
        // echo '['.$arr_ch_asc6[1].']'.$res;  

    }if($res == 'i'){
        $arr_ch_asc6 ['1'] = 105;
        // echo '['.$arr_ch_asc6[1].']'.$res;  

    }if($res == 'j'){
        $arr_ch_asc6 ['1'] = 106;
        // echo '['.$arr_ch_asc6[1].']'.$res;  

    }if($res == 'k'){
        $arr_ch_asc6 ['1'] = 107;
        // echo '['.$arr_ch_asc6[1].']'.$res;  

    }if($res == 'l'){
        $arr_ch_asc6 ['1'] = 108;
        // echo '['.$arr_ch_asc6[1].']'.$res;  

    }if($res == 'm'){
        $arr_ch_asc6 ['1'] = 109;
        // echo '['.$arr_ch_asc6[1].']'.$res;  

    }if($res == 'n'){
        $arr_ch_asc6 ['1'] = 110;
        // echo '['.$arr_ch_asc6[1].']'.$res;  

    }if($res == 'o'){
        $arr_ch_asc6 ['1'] = 111;
        // echo '['.$arr_ch_asc6[1].']'.$res;  

    }if($res == 'p'){
        $arr_ch_asc6 ['1'] = 112;
        // echo '['.$arr_ch_asc6[1].']'.$res;  

    }if($res == 'q'){
        $arr_ch_asc6 ['1'] = 113;
        // echo '['.$arr_ch_asc6[1].']'.$res;  

    }if($res == 'r'){
        $arr_ch_asc6 ['1'] = 114;
        // echo '['.$arr_ch_asc6[1].']'.$res;  

    }if($res == 's'){
        $arr_ch_asc6 ['1'] = 115;
        // echo '['.$arr_ch_asc6[1].']'.$res;  

    }if($res == 't'){
        $arr_ch_asc6 ['1'] = 116;
        // echo '['.$arr_ch_asc6[1].']'.$res;  

    }if($res == 'u'){
        $arr_ch_asc6 ['1'] = 117;
        // echo '['.$arr_ch_asc6[1].']'.$res;  

    }if($res == 'v'){
        $arr_ch_asc6 ['1'] = 118;
        // echo '['.$arr_ch_asc6[1].']'.$res;  

    }if($res == 'w'){
        $arr_ch_asc6 ['1'] = 119;
        // echo '['.$arr_ch_asc6[1].']'.$res;  

    }if($res == 'x'){
        $arr_ch_asc6 ['1'] = 120;
        // echo '['.$arr_ch_asc6[1].']'.$res;  

    }if($res == 'y'){
        $arr_ch_asc6 ['1'] = 121;
        // echo '['.$arr_ch_asc6[1].']'.$res;  

    }if($res == 'z'){
        $arr_ch_asc6 ['1'] = 122;
        // echo '['.$arr_ch_asc6[1].']'.$res;  

 }


foreach($result2 as $res){    //3

 if($res == 'a'){
    $arr_ch_asc6 ['2']= 97;
    // echo '['.$arr_ch_asc6[2].']'.$res;  
    
        }if($res == 'b'){
            $arr_ch_asc6 ['2'] = 98;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
        }if($res == 'c'){
            $arr_ch_asc6 ['2'] = 99;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
        }if($res == 'd'){
            $arr_ch_asc6 ['2'] = 100;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
            
            
        }if($res == 'e'){
            $arr_ch_asc6 ['2'] = 101;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
            
            
        }if($res == 'f'){
            $arr_ch_asc6 ['2'] = 102;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
            
            
        }if($res == 'g'){
            $arr_ch_asc6 ['2'] = 103;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
            
            
        }if($res == 'h'){
            $arr_ch_asc6 ['2'] = 104;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
            
            
        }if($res == 'i'){
            $arr_ch_asc6 ['2'] = 105;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
            
            
        }if($res == 'j'){
            $arr_ch_asc6 ['2'] = 106;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
            
            
        }if($res == 'k'){
            $arr_ch_asc6 ['2'] = 107;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
            
            
        }if($res == 'l'){
            $arr_ch_asc6 ['2'] = 108;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
            
            
        }if($res == 'm'){
            $arr_ch_asc6 ['2'] = 109;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
            
            
        }if($res == 'n'){
            $arr_ch_asc6 ['2'] = 110;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
            
            
        }if($res == 'o'){
            $arr_ch_asc6 ['2'] = 111;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
            
            
        }if($res == 'p'){
            $arr_ch_asc6 ['2'] = 112;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
            
            
        }if($res == 'q'){
            $arr_ch_asc6 ['2'] = 113;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
            
            
        }if($res == 'r'){
            $arr_ch_asc6 ['2'] = 114;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
            
            
        }if($res == 's'){
            $arr_ch_asc6 ['2'] = 115;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
            
            
        }if($res == 't'){
            $arr_ch_asc6 ['2'] = 116;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
            
            
        }if($res == 'u'){
            $arr_ch_asc6 ['2'] = 117;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
            
            
        }if($res == 'v'){
            $arr_ch_asc6 ['2'] = 118;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
            
            
        }if($res == 'w'){
            $arr_ch_asc6 ['2'] = 119;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
            
            
        }if($res == 'x'){
            $arr_ch_asc6 ['2'] = 120;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
            
            
        }if($res == 'y'){
            $arr_ch_asc6 ['2'] = 121;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
            
            
            
        }if($res == 'z'){
            $arr_ch_asc6 ['2'] = 122;
            // echo '['.$arr_ch_asc6[2].']'.$res;  
 }

foreach($result3 as $res){    
    
 if($res == 'a'){
        $arr_ch_asc6 ['3'] = 97;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        
    }if($res == 'b'){
        $arr_ch_asc6 ['3'] = 98;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        
    }if($res == 'c'){
        $arr_ch_asc6 ['3'] = 99;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        
    }if($res == 'd'){
        $arr_ch_asc6 ['3'] = 100;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        

        
    }if($res == 'e'){
        $arr_ch_asc6 ['3'] = 101;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        

        
    }if($res == 'f'){
        $arr_ch_asc6 ['3'] = 102;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        

        
    }if($res == 'g'){
        $arr_ch_asc6 ['3'] = 103;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        

        
    }if($res == 'h'){
        $arr_ch_asc6 ['3'] = 104;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        

        
    }if($res == 'i'){
        $arr_ch_asc6 ['3'] = 105;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        

        
    }if($res == 'j'){
        $arr_ch_asc6 ['3'] = 106;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        

        
    }if($res == 'k'){
        $arr_ch_asc6 ['3'] = 107;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        

        
    }if($res == 'l'){
        $arr_ch_asc6 ['3'] = 108;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        

        
    }if($res == 'm'){
        $arr_ch_asc6 ['3'] = 109;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        

        
    }if($res == 'n'){
        $arr_ch_asc6 ['3'] = 110;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        

        
    }if($res == 'o'){
        $arr_ch_asc6 ['3'] = 111;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        

        
    }if($res == 'p'){
        $arr_ch_asc6 ['3'] = 112;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        

        
    }if($res == 'q'){
        $arr_ch_asc6 ['3'] = 113;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        

        
    }if($res == 'r'){
        $arr_ch_asc6 ['3'] = 114;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        

        
    }if($res == 's'){
        $arr_ch_asc6 ['3'] = 115;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        

        
    }if($res == 't'){
        $arr_ch_asc6 ['3'] = 116;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        

        
    }if($res == 'u'){
        $arr_ch_asc6 ['3'] = 117;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        

        
    }if($res == 'v'){
        $arr_ch_asc6 ['3'] = 118;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        

        
    }if($res == 'w'){
        $arr_ch_asc6 ['3'] = 119;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        

        
    }if($res == 'x'){
        $arr_ch_asc6 ['3'] = 120;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        

        
    }if($res == 'y'){
        $arr_ch_asc6 ['3'] = 121;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        

        
    }if($res == 'z'){
        $arr_ch_asc6 ['3'] = 122;
        // echo '['.$arr_ch_asc6[3].']'.$res;    
        
 }

foreach($result4 as $res){    
        
 if($res == 'a'){
            $arr_ch_asc6 ['4'] = 97;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            
        }if($res == 'b'){
            $arr_ch_asc6 ['4'] = 98;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            
        }if($res == 'c'){
            $arr_ch_asc6 ['4'] = 99;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            
        }if($res == 'd'){
            $arr_ch_asc6 ['4'] = 100;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            
        }if($res == 'e'){
            $arr_ch_asc6 ['4'] = 101;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            
        }if($res == 'f'){
            $arr_ch_asc6 ['4'] = 102;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            
        }if($res == 'g'){
            $arr_ch_asc6 ['4'] = 103;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            
        }if($res == 'h'){
            $arr_ch_asc6 ['4'] = 104;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            

            
        }if($res == 'i'){
            $arr_ch_asc6 ['4'] = 105;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            

            
        }if($res == 'j'){
            $arr_ch_asc6 ['4'] = 106;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            

            
        }if($res == 'k'){
            $arr_ch_asc6 ['4'] = 107;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            

            
        }if($res == 'l'){
            $arr_ch_asc6 ['4'] = 108;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            

            
        }if($res == 'm'){
            $arr_ch_asc6 ['4'] = 109;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            

            
        }if($res == 'n'){
            $arr_ch_asc6 ['4'] = 110;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            

            
        }if($res == 'o'){
            $arr_ch_asc6 ['4'] = 111;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            

            
        }if($res == 'p'){
            $arr_ch_asc6 ['4'] = 112;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            

            
        }if($res == 'q'){
            $arr_ch_asc6 ['4'] = 113;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            

            
        }if($res == 'r'){
            $arr_ch_asc6 ['4'] = 114;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            

            
        }if($res == 's'){
            $arr_ch_asc6 ['4'] = 115;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            

            
        }if($res == 't'){
            $arr_ch_asc6 ['4'] = 116;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            

            
        }if($res == 'u'){
            $arr_ch_asc6 ['4'] = 117;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            

            
        }if($res == 'v'){
            $arr_ch_asc6 ['4'] = 118;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            

            
        }if($res == 'w'){
            $arr_ch_asc6 ['4'] = 119;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            

            
        }if($res == 'x'){
            $arr_ch_asc6 ['4'] = 120;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            

            
        }if($res == 'y'){
            $arr_ch_asc6 ['4'] = 121;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            

            
        }if($res == 'z'){
            $arr_ch_asc6 ['4'] = 122;
            //  echo '['.$arr_ch_asc6[4].']'.$res;    
            
 }

foreach($result5 as $res){    //6
        
 if($res == 'a'){
                $arr_ch_asc6 ['5'] = 97;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
            }if($res == 'b'){
                $arr_ch_asc6 ['5'] = 98;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
            }if($res == 'c'){
                $arr_ch_asc6 ['5'] = 99;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
            }if($res == 'd'){
                $arr_ch_asc6 ['5'] = 100;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
    
                
            }if($res == 'e'){
                $arr_ch_asc6 ['5'] = 101;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
    
                
            }if($res == 'f'){
                $arr_ch_asc6 ['5'] = 102;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
    
                
            }if($res == 'g'){
                $arr_ch_asc6 ['5'] = 103;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
    
                
            }if($res == 'h'){
                $arr_ch_asc6 ['5'] = 105;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
    
                
            }if($res == 'i'){
                $arr_ch_asc6 ['5'] = 105;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
    
                
            }if($res == 'j'){
                $arr_ch_asc6 ['5'] = 106;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
    
                
            }if($res == 'k'){
                $arr_ch_asc6 ['5'] = 107;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
    
                
            }if($res == 'l'){
                $arr_ch_asc6 ['5'] = 108;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
    
                
            }if($res == 'm'){
                $arr_ch_asc6 ['5'] = 109;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
    
                
            }if($res == 'n'){
                $arr_ch_asc6 ['5'] = 110;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
    
                
            }if($res == 'o'){
                $arr_ch_asc6 ['5'] = 111;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
    
                
            }if($res == 'p'){
                $arr_ch_asc6 ['5'] = 112;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
    
                
            }if($res == 'q'){
                $arr_ch_asc6 ['5'] = 113;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
    
                
            }if($res == 'r'){
                $arr_ch_asc6 ['5'] = 115;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
    
                
            }if($res == 's'){
                $arr_ch_asc6 ['5'] = 115;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
    
                
            }if($res == 't'){
                $arr_ch_asc6 ['5'] = 116;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
    
                
            }if($res == 'u'){
                $arr_ch_asc6 ['5'] = 117;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
    
                
            }if($res == 'v'){
                $arr_ch_asc6 ['5'] = 118;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
    
                
            }if($res == 'w'){
                $arr_ch_asc6 ['5'] = 119;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
    
                
            }if($res == 'x'){
                $arr_ch_asc6 ['5'] = 120;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
    
                
            }if($res == 'y'){
                $arr_ch_asc6 ['5'] = 121;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
    
                
            }if($res == 'z'){
                $arr_ch_asc6 ['5'] = 122;
                //  echo '['.$arr_ch_asc6[5].']'.$res;    
                
 }
    
    }// 6
    }// 5
   } //4
  } //3
 } //2
} //1
// var_dump($arr_ch_asc6);
    echo "Gram";
    echo "<table>";
    var_dump($arr_ch_asc6);
    echo "</table>";
return $hash->sethash($arr_ch_asc6,$b,6,$ket);
}

// gram 7

//tes

function pre_print00gram($var,$b,$ket){
    // var_dump($var);
    $arr_ch_asc4 = [];
    $arr_asc = new kode_asci();
    $hash = new hash();
    $count = strlen($var);
    $kalimat = $var;
    $sub_kalimat = substr($kalimat,0);
    $arr_var = [$sub_kalimat[0]]; 
    $arr_var2 = [$sub_kalimat[1]]; 
    $arr_var3 = [$sub_kalimat[2]];
    $arr_var4 = [$sub_kalimat[3]]; 
    $arr_var5 = [$sub_kalimat[4]];
    $arr_var6 = [$sub_kalimat[5]];
    $arr_var7 = [$sub_kalimat[6]];
    $asc = $arr_asc->ascii;

    $result=array_intersect($arr_var,$arr_asc->ascii);
    $result1=array_intersect($arr_var2,$arr_asc->ascii);
    $result2=array_intersect($arr_var3,$arr_asc->ascii);
    $result3=array_intersect($arr_var4,$arr_asc->ascii); 
    $result4=array_intersect($arr_var5,$arr_asc->ascii); 
    $result5=array_intersect($arr_var6,$arr_asc->ascii);
    $result6=array_intersect($arr_var7,$arr_asc->ascii);

    foreach($result as $res){    
    
        if($res == 'a'){
            $arr_ch_asc4 ['0'] = 97;  
            // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'b'){
                $arr_ch_asc4 ['0'] = 98;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'c'){
                $arr_ch_asc4 ['0'] = 99;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'd'){
                $arr_ch_asc4 ['0'] = 100;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'e'){
                $arr_ch_asc4 ['0'] = 101;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'f'){
                $arr_ch_asc4 ['0'] = 102;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'g'){
                $arr_ch_asc4 ['0'] = 103;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'h'){
                $arr_ch_asc4 ['0'] = 104;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'i'){
                $arr_ch_asc4 ['0'] = 105;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'j'){
                $arr_ch_asc4 ['0'] = 106;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'k'){
                $arr_ch_asc4 ['0'] = 107;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'l'){
                $arr_ch_asc4 ['0'] = 108;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'm'){
                $arr_ch_asc4 ['0'] = 109;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'n'){
                $arr_ch_asc4 ['0'] = 110;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'o'){
                $arr_ch_asc4 ['0'] = 111;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'p'){
                $arr_ch_asc4 ['0'] = 112;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'q'){
                $arr_ch_asc4 ['0'] = 113;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'r'){
                $arr_ch_asc4 ['0'] = 114;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 's'){
                $arr_ch_asc4 ['0'] = 115;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 't'){
                $arr_ch_asc4 ['0'] = 116;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'u'){
                $arr_ch_asc4 ['0'] = 117;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'v'){
                $arr_ch_asc4 ['0'] = 118;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'w'){
                $arr_ch_asc4 ['0'] = 119;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'x'){
                $arr_ch_asc4 ['0'] = 120;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'y'){
                $arr_ch_asc4 ['0'] = 121;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }if($res == 'z'){
                $arr_ch_asc4 ['0'] = 122;  
                // echo '['.$arr_ch_asc4[0].']'.$res;
            }
        
    foreach($result1 as $res){    
        
        if($res == 'a'){
            $arr_ch_asc4 ['1'] = 97;  
            // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'b'){
                $arr_ch_asc4 ['1'] = 98;  
                    // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'c'){
                $arr_ch_asc4 ['1'] = 99;  
                    // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'd'){
                $arr_ch_asc4 ['1'] = 100;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'e'){
                $arr_ch_asc4 ['1'] = 101;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'f'){
                $arr_ch_asc4 ['1'] = 102;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'g'){
                $arr_ch_asc4 ['1'] = 103;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'h'){
                $arr_ch_asc4 ['1'] = 104;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'i'){
                $arr_ch_asc4 ['1'] = 105;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'j'){
                $arr_ch_asc4 ['1'] = 106;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'k'){
                $arr_ch_asc4 ['1'] = 107;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'l'){
                $arr_ch_asc4 ['1'] = 108;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'm'){
                $arr_ch_asc4 ['1'] = 109;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'n'){
                $arr_ch_asc4 ['1'] = 110;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'o'){
                $arr_ch_asc4 ['1'] = 111;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'p'){
                $arr_ch_asc4 ['1'] = 112;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'q'){
                $arr_ch_asc4 ['1'] = 113;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'r'){
                $arr_ch_asc4 ['1'] = 114;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 's'){
                $arr_ch_asc4 ['1'] = 115;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 't'){
                $arr_ch_asc4 ['1'] = 116;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'u'){
                $arr_ch_asc4 ['1'] = 117;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'v'){
                $arr_ch_asc4 ['1'] = 118;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'w'){
                $arr_ch_asc4 ['1'] = 119;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'x'){
                $arr_ch_asc4 ['1'] = 120;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
            }if($res == 'y'){
                $arr_ch_asc4 ['1'] = 121;  
                // echo '['.$arr_ch_asc4[1].']'.$res;
        }if($res == 'z'){
            $arr_ch_asc4 ['1'] = 122;  
            // echo '['.$arr_ch_asc4[1].']'.$res;
        }

    foreach($result2 as $res){    

        if($res == 'a'){
            $arr_ch_asc4 ['2'] = 97;
            // echo '['.$arr_ch_asc4[2].']'.$res;  
            
            }if($res == 'b'){
                $arr_ch_asc4 ['2'] = 98;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
                
            }if($res == 'c'){
                $arr_ch_asc4 ['2'] = 99;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
                
            }if($res == 'd'){
                $arr_ch_asc4 ['2'] = 100;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
                
            }if($res == 'e'){
                $arr_ch_asc4 ['2'] = 101;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'f'){
                $arr_ch_asc4 ['2'] = 102;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'g'){
                $arr_ch_asc4 ['2'] = 103;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'h'){
                $arr_ch_asc4 ['2'] = 104;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'i'){
                $arr_ch_asc4 ['2'] = 105;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'j'){
                $arr_ch_asc4 ['2'] = 106;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'k'){
                $arr_ch_asc4 ['2'] = 107;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'l'){
                $arr_ch_asc4 ['2'] = 108;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'm'){
                $arr_ch_asc4 ['2'] = 109;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'n'){
                $arr_ch_asc4 ['2'] = 110;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'o'){
                $arr_ch_asc4 ['2'] = 111;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'p'){
                $arr_ch_asc4 ['2'] = 112;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'q'){
                $arr_ch_asc4 ['2'] = 113;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'r'){
                $arr_ch_asc4 ['2'] = 114;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 's'){
                $arr_ch_asc4 ['2'] = 115;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 't'){
                $arr_ch_asc4 ['2'] = 116;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'u'){
                $arr_ch_asc4 ['2'] = 117;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'v'){
                $arr_ch_asc4 ['2'] = 118;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'w'){
                $arr_ch_asc4 ['2'] = 119;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'x'){
                $arr_ch_asc4 ['2'] = 120;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
            }if($res == 'y'){
                $arr_ch_asc4 ['2'] = 121;
                // echo '['.$arr_ch_asc4[2].']'.$res;  
        }if($res == 'z'){
            $arr_ch_asc4 ['2'] = 122;
            // echo '['.$arr_ch_asc4[2].']'.$res;  
        }

    foreach($result3 as $res){    
        if($res == 'a'){
            $arr_ch_asc4 ['3'] = 97;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
            }if($res == 'b'){
                $arr_ch_asc4 ['3'] = 98;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
            }if($res == 'c'){
                $arr_ch_asc4 ['3'] = 99;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
            }if($res == 'd'){
                $arr_ch_asc4 ['3'] = 100;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'e'){
                $arr_ch_asc4 ['3'] = 101;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'f'){
                $arr_ch_asc4 ['3'] = 102;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'g'){
                $arr_ch_asc4 ['3'] = 103;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'h'){
                $arr_ch_asc4 ['3'] = 104;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'i'){
                $arr_ch_asc4 ['3'] = 105;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'j'){
                $arr_ch_asc4 ['3'] = 106;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'k'){
                $arr_ch_asc4 ['3'] = 107;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'l'){
                $arr_ch_asc4 ['3'] = 108;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'm'){
                $arr_ch_asc4 ['3'] = 109;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'n'){
                $arr_ch_asc4 ['3'] = 110;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'o'){
                $arr_ch_asc4 ['3'] = 111;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'p'){
                $arr_ch_asc4 ['3'] = 112;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'q'){
                $arr_ch_asc4 ['3'] = 113;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'r'){
                $arr_ch_asc4 ['3'] = 114;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 's'){
                $arr_ch_asc4 ['3'] = 115;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 't'){
                $arr_ch_asc4 ['3'] = 116;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'u'){
                $arr_ch_asc4 ['3'] = 117;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'v'){
                $arr_ch_asc4 ['3'] = 118;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'w'){
                $arr_ch_asc4 ['3'] = 119;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'x'){
                $arr_ch_asc4 ['3'] = 120;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'y'){
                $arr_ch_asc4 ['3'] = 121;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
            
        }if($res == 'z'){
            $arr_ch_asc4 ['3'] = 122;  
            // echo '['.$arr_ch_asc4[3].']'.$res;
            
        }
    foreach($result4 as $res){    
            if($res == 'a'){
                $arr_ch_asc4 ['4'] = 97;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
                }if($res == 'b'){
                    $arr_ch_asc4 ['4'] = 98;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                }if($res == 'c'){
                    $arr_ch_asc4 ['4'] = 99;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                }if($res == 'd'){
                    $arr_ch_asc4 ['4'] = 100;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
                    
                }if($res == 'e'){
                    $arr_ch_asc4 ['4'] = 101;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
                    
                }if($res == 'f'){
                    $arr_ch_asc4 ['4'] = 102;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
                    
                }if($res == 'g'){
                    $arr_ch_asc4 ['4'] = 103;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
                    
                }if($res == 'h'){
                    $arr_ch_asc4 ['4'] = 104;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
                    
                }if($res == 'i'){
                    $arr_ch_asc4 ['4'] = 105;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
                    
                }if($res == 'j'){
                    $arr_ch_asc4 ['4'] = 106;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
                    
                }if($res == 'k'){
                    $arr_ch_asc4 ['4'] = 107;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
                    
                }if($res == 'l'){
                    $arr_ch_asc4 ['4'] = 108;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
                    
                }if($res == 'm'){
                    $arr_ch_asc4 ['4'] = 109;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
                    
                }if($res == 'n'){
                    $arr_ch_asc4 ['4'] = 110;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
                    
                }if($res == 'o'){
                    $arr_ch_asc4 ['4'] = 111;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
                    
                }if($res == 'p'){
                    $arr_ch_asc4 ['4'] = 112;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
                    
                }if($res == 'q'){
                    $arr_ch_asc4 ['4'] = 113;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
                    
                }if($res == 'r'){
                    $arr_ch_asc4 ['4'] = 114;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
                    
                }if($res == 's'){
                    $arr_ch_asc4 ['4'] = 115;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
                    
                }if($res == 't'){
                    $arr_ch_asc4 ['4'] = 116;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
                    
                }if($res == 'u'){
                    $arr_ch_asc4 ['4'] = 117;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
                    
                }if($res == 'v'){
                    $arr_ch_asc4 ['4'] = 118;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
                    
                }if($res == 'w'){
                    $arr_ch_asc4 ['4'] = 119;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
                    
                }if($res == 'x'){
                    $arr_ch_asc4 ['4'] = 120;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
                    
                }if($res == 'y'){
                    $arr_ch_asc4 ['4'] = 121;  
                    // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }if($res == 'z'){
                $arr_ch_asc4 ['4'] = 122;  
                // echo '['.$arr_ch_asc4[3].']'.$res;
                
            }
    foreach($result5 as $res){    
                if($res == 'a'){
                    $arr_ch_asc4 ['5'] = 97;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                    }if($res == 'b'){
                        $arr_ch_asc4 ['5'] = 98;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                    }if($res == 'c'){
                        $arr_ch_asc4 ['5'] = 99;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                    }if($res == 'd'){
                        $arr_ch_asc4 ['5'] = 100;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                        
                    }if($res == 'e'){
                        $arr_ch_asc4 ['5'] = 101;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                        
                    }if($res == 'f'){
                        $arr_ch_asc4 ['5'] = 102;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                        
                    }if($res == 'g'){
                        $arr_ch_asc4 ['5'] = 103;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                        
                    }if($res == 'h'){
                        $arr_ch_asc4 ['5'] = 104;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                        
                    }if($res == 'i'){
                        $arr_ch_asc4 ['5'] = 105;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                        
                    }if($res == 'j'){
                        $arr_ch_asc4 ['5'] = 106;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                        
                    }if($res == 'k'){
                        $arr_ch_asc4 ['5'] = 107;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                        
                    }if($res == 'l'){
                        $arr_ch_asc4 ['5'] = 108;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                        
                    }if($res == 'm'){
                        $arr_ch_asc4 ['5'] = 109;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                        
                    }if($res == 'n'){
                        $arr_ch_asc4 ['5'] = 110;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                        
                    }if($res == 'o'){
                        $arr_ch_asc4 ['5'] = 111;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                        
                    }if($res == 'p'){
                        $arr_ch_asc4 ['5'] = 112;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                        
                    }if($res == 'q'){
                        $arr_ch_asc4 ['5'] = 113;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                        
                    }if($res == 'r'){
                        $arr_ch_asc4 ['5'] = 114;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                        
                    }if($res == 's'){
                        $arr_ch_asc4 ['5'] = 115;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                        
                    }if($res == 't'){
                        $arr_ch_asc4 ['5'] = 116;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                        
                    }if($res == 'u'){
                        $arr_ch_asc4 ['5'] = 117;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                        
                    }if($res == 'v'){
                        $arr_ch_asc4 ['5'] = 118;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                        
                    }if($res == 'w'){
                        $arr_ch_asc4 ['5'] = 119;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                        
                    }if($res == 'x'){
                        $arr_ch_asc4 ['5'] = 120;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                        
                    }if($res == 'y'){
                        $arr_ch_asc4 ['5'] = 121;  
                        // echo '['.$arr_ch_asc4[3].']'.$res;
                    
                }if($res == 'z'){
                    $arr_ch_asc4 ['5'] = 122;  
                }

    foreach($result6 as $res){    
                    if($res == 'a'){
                        $arr_ch_asc4 ['6'] = 97;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                        }if($res == 'b'){
                            $arr_ch_asc4 ['6'] = 98;  
                                // echo '['.$arr_ch_asc4[3].']'.$res;
                        }if($res == 'c'){
                            $arr_ch_asc4 ['6'] = 99;  
                                // echo '['.$arr_ch_asc4[3].']'.$res;
                        }if($res == 'd'){
                            $arr_ch_asc4 ['6'] = 100;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                            
                        }if($res == 'e'){
                            $arr_ch_asc4 ['6'] = 101;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                            
                        }if($res == 'f'){
                            $arr_ch_asc4 ['6'] = 102;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                            
                        }if($res == 'g'){
                            $arr_ch_asc4 ['6'] = 103;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                            
                        }if($res == 'h'){
                            $arr_ch_asc4 ['6'] = 104;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                            
                        }if($res == 'i'){
                            $arr_ch_asc4 ['6'] = 105;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                            
                        }if($res == 'j'){
                            $arr_ch_asc4 ['6'] = 106;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                            
                        }if($res == 'k'){
                            $arr_ch_asc4 ['6'] = 107;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                            
                        }if($res == 'l'){
                            $arr_ch_asc4 ['6'] = 108;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                            
                        }if($res == 'm'){
                            $arr_ch_asc4 ['6'] = 109;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                            
                        }if($res == 'n'){
                            $arr_ch_asc4 ['6'] = 110;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                            
                        }if($res == 'o'){
                            $arr_ch_asc4 ['6'] = 111;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                            
                        }if($res == 'p'){
                            $arr_ch_asc4 ['6'] = 112;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                            
                        }if($res == 'q'){
                            $arr_ch_asc4 ['6'] = 113;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                            
                        }if($res == 'r'){
                            $arr_ch_asc4 ['6'] = 114;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                            
                        }if($res == 's'){
                            $arr_ch_asc4 ['6'] = 115;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                            
                        }if($res == 't'){
                            $arr_ch_asc4 ['6'] = 116;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                            
                        }if($res == 'u'){
                            $arr_ch_asc4 ['6'] = 117;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                            
                        }if($res == 'v'){
                            $arr_ch_asc4 ['6'] = 118;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                            
                        }if($res == 'w'){
                            $arr_ch_asc4 ['6'] = 119;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                            
                        }if($res == 'x'){
                            $arr_ch_asc4 ['6'] = 120;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                            
                        }if($res == 'y'){
                            $arr_ch_asc4 ['6'] = 121;  
                            // echo '['.$arr_ch_asc4[3].']'.$res;
                        
                    }if($res == 'z'){
                        $arr_ch_asc4 ['6'] = 122;  
                    }
            
        }
       }
      }
     }
    }
   }
  }
    echo "Gram";
    echo "<table>";
    var_dump($arr_ch_asc4);
    echo "</table>";
return $hash->sethash($arr_ch_asc4,$b,7,$ket);
}

//tes

// gram 8

function pre_print8gram($var,$b,$ket){
    $arr_ch_asc8 = [];
    $arr_asc = new kode_asci();
    $hash = new hash();
    $count = strlen($var);
    $kalimat = $var;
    $sub_kalimat = substr($kalimat,0);
    $arr_var = [$sub_kalimat[0]]; 
    $arr_var2 = [$sub_kalimat[1]]; 
    $arr_var3 = [$sub_kalimat[2]];
    $arr_var4 = [$sub_kalimat[3]];
    $arr_var5 = [$sub_kalimat[4]];
    $arr_var6 = [$sub_kalimat[5]];
    $arr_var7 = [$sub_kalimat[6]];
    $arr_var8 = [$sub_kalimat[7]];
    $asc = $arr_asc->ascii;

    $result=array_intersect($arr_var,$arr_asc->ascii);
    $result1=array_intersect($arr_var2,$arr_asc->ascii);
    $result2=array_intersect($arr_var3,$arr_asc->ascii);
    $result3=array_intersect($arr_var4,$arr_asc->ascii);
    $result4=array_intersect($arr_var5,$arr_asc->ascii);
    $result5=array_intersect($arr_var6,$arr_asc->ascii);
    $result6=array_intersect($arr_var7,$arr_asc->ascii);
    $result7=array_intersect($arr_var8,$arr_asc->ascii);

foreach($result as $res){    //1
    
 if($res == 'a'){
        $arr_ch_asc8 ['0'] = 97;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 'b'){
        $arr_ch_asc8 ['0'] = 98;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 'c'){
        $arr_ch_asc8 ['0'] = 99;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 'd'){
        $arr_ch_asc8 ['0'] = 100;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 'e'){
        $arr_ch_asc8 ['0'] = 101;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 'f'){
        $arr_ch_asc8 ['0'] = 102;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 'g'){
        $arr_ch_asc8 ['0'] = 103;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 'h'){
        $arr_ch_asc8 ['0'] = 104;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 'i'){
        $arr_ch_asc8 ['0'] = 105;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 'j'){
        $arr_ch_asc8 ['0'] = 106;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 'k'){
        $arr_ch_asc8 ['0'] = 107;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 'l'){
        $arr_ch_asc8 ['0'] = 108;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 'm'){
        $arr_ch_asc8 ['0'] = 109;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 'n'){
        $arr_ch_asc8 ['0'] = 110;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 'o'){
        $arr_ch_asc8 ['0'] = 111;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 'p'){
        $arr_ch_asc8 ['0'] = 112;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 'q'){
        $arr_ch_asc8 ['0'] = 113;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 'r'){
        $arr_ch_asc8 ['0'] = 114;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 's'){
        $arr_ch_asc8 ['0'] = 115;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 't'){
        $arr_ch_asc8 ['0'] = 116;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 'u'){
        $arr_ch_asc8 ['0'] = 117;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 'v'){
        $arr_ch_asc8 ['0'] = 118;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 'w'){
        $arr_ch_asc8 ['0'] = 119;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 'x'){
        $arr_ch_asc8 ['0'] = 120;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 'y'){
        $arr_ch_asc8 ['0'] = 121;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
    }if($res == 'z'){
        $arr_ch_asc8 ['0'] = 122;
        //  echo '['.$arr_ch_asc8[0].']'.$res;  
        
 }
   
foreach($result1 as $res){     //2
    
    if($res == 'a'){
        $arr_ch_asc8 ['1'] = 97;
        // echo '['.$arr_ch_asc8[1].']'.$res;
         
        
    }if($res == 'b'){
        $arr_ch_asc8 ['1'] = 98;
        // echo '['.$arr_ch_asc8[1].']'.$res;  
        
    }if($res == 'c'){
        $arr_ch_asc8 ['1'] = 99;
        // echo '['.$arr_ch_asc8[1].']'.$res;  
        
    }if($res == 'd'){
        $arr_ch_asc8 ['1'] = 100;
        // echo '['.$arr_ch_asc8[1].']'.$res;  

    }if($res == 'e'){
        $arr_ch_asc8 ['1'] = 101;
        // echo '['.$arr_ch_asc8[1].']'.$res;  

    }if($res == 'f'){
        $arr_ch_asc8 ['1'] = 102;
        // echo '['.$arr_ch_asc8[1].']'.$res;  

    }if($res == 'g'){
        $arr_ch_asc8 ['1'] = 103;
        // echo '['.$arr_ch_asc8[1].']'.$res;  

    }if($res == 'h'){
        $arr_ch_asc8 ['1'] = 104;
        // echo '['.$arr_ch_asc8[1].']'.$res;  

    }if($res == 'i'){
        $arr_ch_asc8 ['1'] = 105;
        // echo '['.$arr_ch_asc8[1].']'.$res;  

    }if($res == 'j'){
        $arr_ch_asc8 ['1'] = 106;
        // echo '['.$arr_ch_asc8[1].']'.$res;  

    }if($res == 'k'){
        $arr_ch_asc8 ['1'] = 107;
        // echo '['.$arr_ch_asc8[1].']'.$res;  

    }if($res == 'l'){
        $arr_ch_asc8 ['1'] = 108;
        // echo '['.$arr_ch_asc8[1].']'.$res;  

    }if($res == 'm'){
        $arr_ch_asc8 ['1'] = 109;
        // echo '['.$arr_ch_asc8[1].']'.$res;  

    }if($res == 'n'){
        $arr_ch_asc8 ['1'] = 110;
        // echo '['.$arr_ch_asc8[1].']'.$res;  

    }if($res == 'o'){
        $arr_ch_asc8 ['1'] = 111;
        // echo '['.$arr_ch_asc8[1].']'.$res;  

    }if($res == 'p'){
        $arr_ch_asc8 ['1'] = 112;
        // echo '['.$arr_ch_asc8[1].']'.$res;  

    }if($res == 'q'){
        $arr_ch_asc8 ['1'] = 113;
        // echo '['.$arr_ch_asc8[1].']'.$res;  

    }if($res == 'r'){
        $arr_ch_asc8 ['1'] = 114;
        // echo '['.$arr_ch_asc8[1].']'.$res;  

    }if($res == 's'){
        $arr_ch_asc8 ['1'] = 115;
        // echo '['.$arr_ch_asc8[1].']'.$res;  

    }if($res == 't'){
        $arr_ch_asc8 ['1'] = 116;
        // echo '['.$arr_ch_asc8[1].']'.$res;  

    }if($res == 'u'){
        $arr_ch_asc8 ['1'] = 117;
        // echo '['.$arr_ch_asc8[1].']'.$res;  

    }if($res == 'v'){
        $arr_ch_asc8 ['1'] = 118;
        // echo '['.$arr_ch_asc8[1].']'.$res;  

    }if($res == 'w'){
        $arr_ch_asc8 ['1'] = 119;
        // echo '['.$arr_ch_asc8[1].']'.$res;  

    }if($res == 'x'){
        $arr_ch_asc8 ['1'] = 120;
        // echo '['.$arr_ch_asc8[1].']'.$res;  

    }if($res == 'y'){
        $arr_ch_asc8 ['1'] = 121;
        // echo '['.$arr_ch_asc8[1].']'.$res;  

    }if($res == 'z'){
        $arr_ch_asc8 ['1'] = 122;
        // echo '['.$arr_ch_asc8[1].']'.$res;  

 }

foreach($result2 as $res){    //3

    if($res == 'a'){
    $arr_ch_asc8 ['2']= 97;
    // echo '['.$arr_ch_asc8[2].']'.$res;  
    
        }if($res == 'b'){
            $arr_ch_asc8 ['2'] = 98;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
        }if($res == 'c'){
            $arr_ch_asc8 ['2'] = 99;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
        }if($res == 'd'){
            $arr_ch_asc8 ['2'] = 100;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
            
            
        }if($res == 'e'){
            $arr_ch_asc8 ['2'] = 101;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
            
            
        }if($res == 'f'){
            $arr_ch_asc8 ['2'] = 102;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
            
            
        }if($res == 'g'){
            $arr_ch_asc8 ['2'] = 103;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
            
            
        }if($res == 'h'){
            $arr_ch_asc8 ['2'] = 104;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
            
            
        }if($res == 'i'){
            $arr_ch_asc8 ['2'] = 105;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
            
            
        }if($res == 'j'){
            $arr_ch_asc8 ['2'] = 106;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
            
            
        }if($res == 'k'){
            $arr_ch_asc8 ['2'] = 107;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
            
            
        }if($res == 'l'){
            $arr_ch_asc8 ['2'] = 108;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
            
            
        }if($res == 'm'){
            $arr_ch_asc8 ['2'] = 109;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
            
            
        }if($res == 'n'){
            $arr_ch_asc8 ['2'] = 110;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
            
            
        }if($res == 'o'){
            $arr_ch_asc8 ['2'] = 111;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
            
            
        }if($res == 'p'){
            $arr_ch_asc8 ['2'] = 112;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
            
            
        }if($res == 'q'){
            $arr_ch_asc8 ['2'] = 113;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
            
            
        }if($res == 'r'){
            $arr_ch_asc8 ['2'] = 114;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
            
            
        }if($res == 's'){
            $arr_ch_asc8 ['2'] = 115;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
            
            
        }if($res == 't'){
            $arr_ch_asc8 ['2'] = 116;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
            
            
        }if($res == 'u'){
            $arr_ch_asc8 ['2'] = 117;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
            
            
        }if($res == 'v'){
            $arr_ch_asc8 ['2'] = 118;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
            
            
        }if($res == 'w'){
            $arr_ch_asc8 ['2'] = 119;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
            
            
        }if($res == 'x'){
            $arr_ch_asc8 ['2'] = 120;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
            
            
        }if($res == 'y'){
            $arr_ch_asc8 ['2'] = 121;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
            
            
        }if($res == 'z'){
            $arr_ch_asc8 ['2'] = 122;
            // echo '['.$arr_ch_asc8[2].']'.$res;  
            
            
    
 }

foreach($result3 as $res){    //4
    
    if($res == 'a'){
        $arr_ch_asc8 ['3'] = 97;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        
    }if($res == 'b'){
        $arr_ch_asc8 ['3'] = 98;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        
    }if($res == 'c'){
        $arr_ch_asc8 ['3'] = 99;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        
    }if($res == 'd'){
        $arr_ch_asc8 ['3'] = 100;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        

        
    }if($res == 'e'){
        $arr_ch_asc8 ['3'] = 101;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        

        
    }if($res == 'f'){
        $arr_ch_asc8 ['3'] = 102;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        

        
    }if($res == 'g'){
        $arr_ch_asc8 ['3'] = 103;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        

        
    }if($res == 'h'){
        $arr_ch_asc8 ['3'] = 104;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        

        
    }if($res == 'i'){
        $arr_ch_asc8 ['3'] = 105;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        

        
    }if($res == 'j'){
        $arr_ch_asc8 ['3'] = 106;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        

        
    }if($res == 'k'){
        $arr_ch_asc8 ['3'] = 107;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        

        
    }if($res == 'l'){
        $arr_ch_asc8 ['3'] = 108;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        

        
    }if($res == 'm'){
        $arr_ch_asc8 ['3'] = 109;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        

        
    }if($res == 'n'){
        $arr_ch_asc8 ['3'] = 110;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        

        
    }if($res == 'o'){
        $arr_ch_asc8 ['3'] = 111;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        

        
    }if($res == 'p'){
        $arr_ch_asc8 ['3'] = 112;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        

        
    }if($res == 'q'){
        $arr_ch_asc8 ['3'] = 113;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        

        
    }if($res == 'r'){
        $arr_ch_asc8 ['3'] = 114;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        

        
    }if($res == 's'){
        $arr_ch_asc8 ['3'] = 115;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        

        
    }if($res == 't'){
        $arr_ch_asc8 ['3'] = 116;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        

        
    }if($res == 'u'){
        $arr_ch_asc8 ['3'] = 117;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        

        
    }if($res == 'v'){
        $arr_ch_asc8 ['3'] = 118;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        

        
    }if($res == 'w'){
        $arr_ch_asc8 ['3'] = 119;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        

        
    }if($res == 'x'){
        $arr_ch_asc8 ['3'] = 120;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        

        
    }if($res == 'y'){
        $arr_ch_asc8 ['3'] = 121;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
        

        
    }if($res == 'z'){
        $arr_ch_asc8 ['3'] = 122;
        // echo '['.$arr_ch_asc8[3].']'.$res;    
           
 }

foreach($result4 as $res){    //5
        
      if($res == 'a'){
            $arr_ch_asc8 ['4'] = 97;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            
        }if($res == 'b'){
            $arr_ch_asc8 ['4'] = 98;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            
        }if($res == 'c'){
            $arr_ch_asc8 ['4'] = 99;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            
        }if($res == 'd'){
            $arr_ch_asc8 ['4'] = 100;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            

            
        }if($res == 'e'){
            $arr_ch_asc8 ['4'] = 101;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            

            
        }if($res == 'f'){
            $arr_ch_asc8 ['4'] = 102;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            

            
        }if($res == 'g'){
            $arr_ch_asc8 ['4'] = 103;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            

            
        }if($res == 'h'){
            $arr_ch_asc8 ['4'] = 104;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            

            
        }if($res == 'i'){
            $arr_ch_asc8 ['4'] = 105;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            

            
        }if($res == 'j'){
            $arr_ch_asc8 ['4'] = 106;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            

            
        }if($res == 'k'){
            $arr_ch_asc8 ['4'] = 107;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            

            
        }if($res == 'l'){
            $arr_ch_asc8 ['4'] = 108;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            

            
        }if($res == 'm'){
            $arr_ch_asc8 ['4'] = 109;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            

            
        }if($res == 'n'){
            $arr_ch_asc8 ['4'] = 110;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            

            
        }if($res == 'o'){
            $arr_ch_asc8 ['4'] = 111;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            

            
        }if($res == 'p'){
            $arr_ch_asc8 ['4'] = 112;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            

            
        }if($res == 'q'){
            $arr_ch_asc8 ['4'] = 113;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            

            
        }if($res == 'r'){
            $arr_ch_asc8 ['4'] = 114;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            

            
        }if($res == 's'){
            $arr_ch_asc8 ['4'] = 115;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            

            
        }if($res == 't'){
            $arr_ch_asc8 ['4'] = 116;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            

            
        }if($res == 'u'){
            $arr_ch_asc8 ['4'] = 117;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            

            
        }if($res == 'v'){
            $arr_ch_asc8 ['4'] = 118;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            

            
        }if($res == 'w'){
            $arr_ch_asc8 ['4'] = 119;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            

            
        }if($res == 'x'){
            $arr_ch_asc8 ['4'] = 120;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            

            
        }if($res == 'y'){
            $arr_ch_asc8 ['4'] = 121;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            

            
        }if($res == 'z'){
            $arr_ch_asc8 ['4'] = 122;
            //  echo '['.$arr_ch_asc8[4].']'.$res;    
            
 }

foreach($result5 as $res){    //6
        
       if($res == 'a'){
                $arr_ch_asc8 ['5'] = 97;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
            }if($res == 'b'){
                $arr_ch_asc8 ['5'] = 98;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
            }if($res == 'c'){
                $arr_ch_asc8 ['5'] = 99;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
            }if($res == 'd'){
                $arr_ch_asc8 ['5'] = 100;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'e'){
                $arr_ch_asc8 ['5'] = 101;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'f'){
                $arr_ch_asc8 ['5'] = 102;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'g'){
                $arr_ch_asc8 ['5'] = 103;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'h'){
                $arr_ch_asc8 ['5'] = 105;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'i'){
                $arr_ch_asc8 ['5'] = 105;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'j'){
                $arr_ch_asc8 ['5'] = 106;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'k'){
                $arr_ch_asc8 ['5'] = 107;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'l'){
                $arr_ch_asc8 ['5'] = 108;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'm'){
                $arr_ch_asc8 ['5'] = 109;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'n'){
                $arr_ch_asc8 ['5'] = 110;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'o'){
                $arr_ch_asc8 ['5'] = 111;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'p'){
                $arr_ch_asc8 ['5'] = 112;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'q'){
                $arr_ch_asc8 ['5'] = 113;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'r'){
                $arr_ch_asc8 ['5'] = 115;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 's'){
                $arr_ch_asc8 ['5'] = 115;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 't'){
                $arr_ch_asc8 ['5'] = 116;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'u'){
                $arr_ch_asc8 ['5'] = 117;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'v'){
                $arr_ch_asc8 ['5'] = 118;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'w'){
                $arr_ch_asc8 ['5'] = 119;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'x'){
                $arr_ch_asc8 ['5'] = 120;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'y'){
                $arr_ch_asc8 ['5'] = 121;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'z'){
                $arr_ch_asc8 ['5'] = 122;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
 }

            
foreach($result6 as $res){    //7
        
 if($res == 'a'){
                $arr_ch_asc8 ['6'] = 97;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
            }if($res == 'b'){
                $arr_ch_asc8 ['6'] = 98;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
            }if($res == 'c'){
                $arr_ch_asc8 ['6'] = 99;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
            }if($res == 'd'){
                $arr_ch_asc8 ['6'] = 100;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'e'){
                $arr_ch_asc8 ['6'] = 101;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'f'){
                $arr_ch_asc8 ['6'] = 102;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'g'){
                $arr_ch_asc8 ['6'] = 103;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'h'){
                $arr_ch_asc8 ['6'] = 105;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'i'){
                $arr_ch_asc8 ['6'] = 105;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'j'){
                $arr_ch_asc8 ['6'] = 106;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'k'){
                $arr_ch_asc8 ['6'] = 107;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'l'){
                $arr_ch_asc8 ['6'] = 108;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'm'){
                $arr_ch_asc8 ['6'] = 109;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'n'){
                $arr_ch_asc8 ['6'] = 110;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'o'){
                $arr_ch_asc8 ['6'] = 111;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'p'){
                $arr_ch_asc8 ['6'] = 112;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'q'){
                $arr_ch_asc8 ['6'] = 113;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'r'){
                $arr_ch_asc8 ['6'] = 115;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 's'){
                $arr_ch_asc8 ['6'] = 115;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 't'){
                $arr_ch_asc8 ['6'] = 116;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'u'){
                $arr_ch_asc8 ['6'] = 117;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'v'){
                $arr_ch_asc8 ['6'] = 118;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'w'){
                $arr_ch_asc8 ['6'] = 119;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'x'){
                $arr_ch_asc8 ['6'] = 120;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'y'){
                $arr_ch_asc8 ['6'] = 121;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
    
                
            }if($res == 'z'){
                $arr_ch_asc8 ['6'] = 122;
                //  echo '['.$arr_ch_asc8[5].']'.$res;    
                
 }

foreach($result7 as $res){    //8
        
 if($res == 'a'){
                    $arr_ch_asc8 ['7'] = 97;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
                }if($res == 'b'){
                    $arr_ch_asc8 ['7'] = 98;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
                }if($res == 'c'){
                    $arr_ch_asc8 ['7'] = 99;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
                }if($res == 'd'){
                    $arr_ch_asc8 ['7'] = 100;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
        
                    
                }if($res == 'e'){
                    $arr_ch_asc8 ['7'] = 101;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
        
                    
                }if($res == 'f'){
                    $arr_ch_asc8 ['7'] = 102;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
        
                    
                }if($res == 'g'){
                    $arr_ch_asc8 ['7'] = 103;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
        
                    
                }if($res == 'h'){
                    $arr_ch_asc8 ['7'] = 105;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
        
                    
                }if($res == 'i'){
                    $arr_ch_asc8 ['7'] = 105;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
        
                    
                }if($res == 'j'){
                    $arr_ch_asc8 ['7'] = 106;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
        
                    
                }if($res == 'k'){
                    $arr_ch_asc8 ['7'] = 107;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
        
                    
                }if($res == 'l'){
                    $arr_ch_asc8 ['7'] = 108;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
        
                    
                }if($res == 'm'){
                    $arr_ch_asc8 ['7'] = 109;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
        
                    
                }if($res == 'n'){
                    $arr_ch_asc8 ['7'] = 110;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
        
                    
                }if($res == 'o'){
                    $arr_ch_asc8 ['7'] = 111;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
        
                    
                }if($res == 'p'){
                    $arr_ch_asc8 ['7'] = 112;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
        
                    
                }if($res == 'q'){
                    $arr_ch_asc8 ['7'] = 113;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
        
                    
                }if($res == 'r'){
                    $arr_ch_asc8 ['7'] = 115;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
        
                    
                }if($res == 's'){
                    $arr_ch_asc8 ['7'] = 115;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
        
                    
                }if($res == 't'){
                    $arr_ch_asc8 ['7'] = 116;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
        
                    
                }if($res == 'u'){
                    $arr_ch_asc8 ['7'] = 117;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
        
                    
                }if($res == 'v'){
                    $arr_ch_asc8 ['7'] = 118;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
        
                    
                }if($res == 'w'){
                    $arr_ch_asc8 ['7'] = 119;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
        
                    
                }if($res == 'x'){
                    $arr_ch_asc8 ['7'] = 120;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
        
                    
                }if($res == 'y'){
                    $arr_ch_asc8 ['7'] = 121;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
        
                    
                }if($res == 'z'){
                    $arr_ch_asc8 ['7'] = 122;
                    //  echo '['.$arr_ch_asc8[5].']'.$res;    
                    
 }
        
           }// 8
    
       }// 7
    
     }// 6
    }// 5
   } //4
  } //3
 } //2
} //1
    // echo "Gram";
    // echo "<table>";
    // var_dump($arr_ch_asc8);
    // echo "</table>";
return $hash->sethash($arr_ch_asc8,$b,8,$ket);
}

// gram 9

function pre_print9gram($var,$b,$ket){
    $arr_ch_asc9 = [];
    $arr_asc = new kode_asci();
    $hash = new hash();
    $count = strlen($var);
    $kalimat = $var;
    $sub_kalimat = substr($kalimat,0);
    $arr_var = [$sub_kalimat[0]]; 
    $arr_var2 = [$sub_kalimat[1]]; 
    $arr_var3 = [$sub_kalimat[2]];
    $arr_var4 = [$sub_kalimat[3]];
    $arr_var5 = [$sub_kalimat[4]];
    $arr_var6 = [$sub_kalimat[5]];
    $arr_var7 = [$sub_kalimat[6]];
    $arr_var8 = [$sub_kalimat[7]];
    $arr_var9 = [$sub_kalimat[8]];
    $asc = $arr_asc->ascii;

    $result=array_intersect($arr_var,$arr_asc->ascii);
    $result1=array_intersect($arr_var2,$arr_asc->ascii);
    $result2=array_intersect($arr_var3,$arr_asc->ascii);
    $result3=array_intersect($arr_var4,$arr_asc->ascii);
    $result4=array_intersect($arr_var5,$arr_asc->ascii);
    $result5=array_intersect($arr_var6,$arr_asc->ascii);
    $result6=array_intersect($arr_var7,$arr_asc->ascii);
    $result7=array_intersect($arr_var8,$arr_asc->ascii);
    $result8=array_intersect($arr_var9,$arr_asc->ascii);

foreach($result as $res){    //1
    
 if($res == 'a'){
        $arr_ch_asc9 ['0'] = 97;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 'b'){
        $arr_ch_asc9 ['0'] = 98;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 'c'){
        $arr_ch_asc9 ['0'] = 99;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 'd'){
        $arr_ch_asc9 ['0'] = 100;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 'e'){
        $arr_ch_asc9 ['0'] = 101;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 'f'){
        $arr_ch_asc9 ['0'] = 102;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 'g'){
        $arr_ch_asc9 ['0'] = 103;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 'h'){
        $arr_ch_asc9 ['0'] = 104;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 'i'){
        $arr_ch_asc9 ['0'] = 105;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 'j'){
        $arr_ch_asc9 ['0'] = 106;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 'k'){
        $arr_ch_asc9 ['0'] = 107;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 'l'){
        $arr_ch_asc9 ['0'] = 108;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 'm'){
        $arr_ch_asc9 ['0'] = 109;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 'n'){
        $arr_ch_asc9 ['0'] = 110;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 'o'){
        $arr_ch_asc9 ['0'] = 111;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 'p'){
        $arr_ch_asc9 ['0'] = 112;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 'q'){
        $arr_ch_asc9 ['0'] = 113;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 'r'){
        $arr_ch_asc9 ['0'] = 114;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 's'){
        $arr_ch_asc9 ['0'] = 115;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 't'){
        $arr_ch_asc9 ['0'] = 116;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 'u'){
        $arr_ch_asc9 ['0'] = 117;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 'v'){
        $arr_ch_asc9 ['0'] = 118;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 'w'){
        $arr_ch_asc9 ['0'] = 119;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 'x'){
        $arr_ch_asc9 ['0'] = 120;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 'y'){
        $arr_ch_asc9 ['0'] = 121;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
    }if($res == 'z'){
        $arr_ch_asc9 ['0'] = 122;
        //  echo '['.$arr_ch_asc9[0].']'.$res;  
        
 }
   
foreach($result1 as $res){     //2
    
 if($res == 'a'){
        $arr_ch_asc9 ['1'] = 97;
        // echo '['.$arr_ch_asc9[1].']'.$res;
         
        
    }if($res == 'b'){
        $arr_ch_asc9 ['1'] = 98;
        // echo '['.$arr_ch_asc9[1].']'.$res;  
        
    }if($res == 'c'){
        $arr_ch_asc9 ['1'] = 99;
        // echo '['.$arr_ch_asc9[1].']'.$res;  
        
    }if($res == 'd'){
        $arr_ch_asc9 ['1'] = 100;
        // echo '['.$arr_ch_asc9[1].']'.$res;  

    }if($res == 'e'){
        $arr_ch_asc9 ['1'] = 101;
        // echo '['.$arr_ch_asc9[1].']'.$res;  

    }if($res == 'f'){
        $arr_ch_asc9 ['1'] = 102;
        // echo '['.$arr_ch_asc9[1].']'.$res;  

    }if($res == 'g'){
        $arr_ch_asc9 ['1'] = 103;
        // echo '['.$arr_ch_asc9[1].']'.$res;  

    }if($res == 'h'){
        $arr_ch_asc9 ['1'] = 104;
        // echo '['.$arr_ch_asc9[1].']'.$res;  

    }if($res == 'i'){
        $arr_ch_asc9 ['1'] = 105;
        // echo '['.$arr_ch_asc9[1].']'.$res;  

    }if($res == 'j'){
        $arr_ch_asc9 ['1'] = 106;
        // echo '['.$arr_ch_asc9[1].']'.$res;  

    }if($res == 'k'){
        $arr_ch_asc9 ['1'] = 107;
        // echo '['.$arr_ch_asc9[1].']'.$res;  

    }if($res == 'l'){
        $arr_ch_asc9 ['1'] = 108;
        // echo '['.$arr_ch_asc9[1].']'.$res;  

    }if($res == 'm'){
        $arr_ch_asc9 ['1'] = 109;
        // echo '['.$arr_ch_asc9[1].']'.$res;  

    }if($res == 'n'){
        $arr_ch_asc9 ['1'] = 110;
        // echo '['.$arr_ch_asc9[1].']'.$res;  

    }if($res == 'o'){
        $arr_ch_asc9 ['1'] = 111;
        // echo '['.$arr_ch_asc9[1].']'.$res;  

    }if($res == 'p'){
        $arr_ch_asc9 ['1'] = 112;
        // echo '['.$arr_ch_asc9[1].']'.$res;  

    }if($res == 'q'){
        $arr_ch_asc9 ['1'] = 113;
        // echo '['.$arr_ch_asc9[1].']'.$res;  

    }if($res == 'r'){
        $arr_ch_asc9 ['1'] = 114;
        // echo '['.$arr_ch_asc9[1].']'.$res;  

    }if($res == 's'){
        $arr_ch_asc9 ['1'] = 115;
        // echo '['.$arr_ch_asc9[1].']'.$res;  

    }if($res == 't'){
        $arr_ch_asc9 ['1'] = 116;
        // echo '['.$arr_ch_asc9[1].']'.$res;  

    }if($res == 'u'){
        $arr_ch_asc9 ['1'] = 117;
        // echo '['.$arr_ch_asc9[1].']'.$res;  

    }if($res == 'v'){
        $arr_ch_asc9 ['1'] = 118;
        // echo '['.$arr_ch_asc9[1].']'.$res;  

    }if($res == 'w'){
        $arr_ch_asc9 ['1'] = 119;
        // echo '['.$arr_ch_asc9[1].']'.$res;  

    }if($res == 'x'){
        $arr_ch_asc9 ['1'] = 120;
        // echo '['.$arr_ch_asc9[1].']'.$res;  

    }if($res == 'y'){
        $arr_ch_asc9 ['1'] = 121;
        // echo '['.$arr_ch_asc9[1].']'.$res;  

    }if($res == 'z'){
        $arr_ch_asc9 ['1'] = 122;
        // echo '['.$arr_ch_asc9[1].']'.$res;  

 }

foreach($result2 as $res){    //3

 if($res == 'a'){
    $arr_ch_asc9 ['2']= 97;
    // echo '['.$arr_ch_asc9[2].']'.$res;  
    
        }if($res == 'b'){
            $arr_ch_asc9 ['2'] = 98;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
        }if($res == 'c'){
            $arr_ch_asc9 ['2'] = 99;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
        }if($res == 'd'){
            $arr_ch_asc9 ['2'] = 100;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
            
            
        }if($res == 'e'){
            $arr_ch_asc9 ['2'] = 101;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
            
            
        }if($res == 'f'){
            $arr_ch_asc9 ['2'] = 102;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
            
            
        }if($res == 'g'){
            $arr_ch_asc9 ['2'] = 103;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
            
            
        }if($res == 'h'){
            $arr_ch_asc9 ['2'] = 104;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
            
            
        }if($res == 'i'){
            $arr_ch_asc9 ['2'] = 105;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
            
            
        }if($res == 'j'){
            $arr_ch_asc9 ['2'] = 106;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
            
            
        }if($res == 'k'){
            $arr_ch_asc9 ['2'] = 107;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
            
            
        }if($res == 'l'){
            $arr_ch_asc9 ['2'] = 108;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
            
            
        }if($res == 'm'){
            $arr_ch_asc9 ['2'] = 109;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
            
            
        }if($res == 'n'){
            $arr_ch_asc9 ['2'] = 110;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
            
            
        }if($res == 'o'){
            $arr_ch_asc9 ['2'] = 111;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
            
            
        }if($res == 'p'){
            $arr_ch_asc9 ['2'] = 112;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
            
            
        }if($res == 'q'){
            $arr_ch_asc9 ['2'] = 113;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
            
            
        }if($res == 'r'){
            $arr_ch_asc9 ['2'] = 114;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
            
            
        }if($res == 's'){
            $arr_ch_asc9 ['2'] = 115;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
            
            
        }if($res == 't'){
            $arr_ch_asc9 ['2'] = 116;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
            
            
        }if($res == 'u'){
            $arr_ch_asc9 ['2'] = 117;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
            
            
        }if($res == 'v'){
            $arr_ch_asc9 ['2'] = 118;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
            
            
        }if($res == 'w'){
            $arr_ch_asc9 ['2'] = 119;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
            
            
        }if($res == 'x'){
            $arr_ch_asc9 ['2'] = 120;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
            
            
        }if($res == 'y'){
            $arr_ch_asc9 ['2'] = 121;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
            
            
        }if($res == 'z'){
            $arr_ch_asc9 ['2'] = 122;
            // echo '['.$arr_ch_asc9[2].']'.$res;  
            
            
    
 }

foreach($result3 as $res){    //4
    
 if($res == 'a'){
        $arr_ch_asc9 ['3'] = 97;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        
    }if($res == 'b'){
        $arr_ch_asc9 ['3'] = 98;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        
    }if($res == 'c'){
        $arr_ch_asc9 ['3'] = 99;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        
    }if($res == 'd'){
        $arr_ch_asc9 ['3'] = 100;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        

        
    }if($res == 'e'){
        $arr_ch_asc9 ['3'] = 101;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        

        
    }if($res == 'f'){
        $arr_ch_asc9 ['3'] = 102;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        

        
    }if($res == 'g'){
        $arr_ch_asc9 ['3'] = 103;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        

        
    }if($res == 'h'){
        $arr_ch_asc9 ['3'] = 104;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        

        
    }if($res == 'i'){
        $arr_ch_asc9 ['3'] = 105;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        

        
    }if($res == 'j'){
        $arr_ch_asc9 ['3'] = 106;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        

        
    }if($res == 'k'){
        $arr_ch_asc9 ['3'] = 107;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        

        
    }if($res == 'l'){
        $arr_ch_asc9 ['3'] = 108;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        

        
    }if($res == 'm'){
        $arr_ch_asc9 ['3'] = 109;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        

        
    }if($res == 'n'){
        $arr_ch_asc9 ['3'] = 110;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        

        
    }if($res == 'o'){
        $arr_ch_asc9 ['3'] = 111;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        

        
    }if($res == 'p'){
        $arr_ch_asc9 ['3'] = 112;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        

        
    }if($res == 'q'){
        $arr_ch_asc9 ['3'] = 113;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        

        
    }if($res == 'r'){
        $arr_ch_asc9 ['3'] = 114;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        

        
    }if($res == 's'){
        $arr_ch_asc9 ['3'] = 115;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        

        
    }if($res == 't'){
        $arr_ch_asc9 ['3'] = 116;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        

        
    }if($res == 'u'){
        $arr_ch_asc9 ['3'] = 117;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        

        
    }if($res == 'v'){
        $arr_ch_asc9 ['3'] = 118;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        

        
    }if($res == 'w'){
        $arr_ch_asc9 ['3'] = 119;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        

        
    }if($res == 'x'){
        $arr_ch_asc9 ['3'] = 120;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        

        
    }if($res == 'y'){
        $arr_ch_asc9 ['3'] = 121;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
        

        
    }if($res == 'z'){
        $arr_ch_asc9 ['3'] = 122;
        // echo '['.$arr_ch_asc9[3].']'.$res;    
           
 }

foreach($result4 as $res){    //5
        
 if($res == 'a'){
            $arr_ch_asc9 ['4'] = 97;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            
        }if($res == 'b'){
            $arr_ch_asc9 ['4'] = 98;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            
        }if($res == 'c'){
            $arr_ch_asc9 ['4'] = 99;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            
        }if($res == 'd'){
            $arr_ch_asc9 ['4'] = 100;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            

            
        }if($res == 'e'){
            $arr_ch_asc9 ['4'] = 101;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            

            
        }if($res == 'f'){
            $arr_ch_asc9 ['4'] = 102;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            

            
        }if($res == 'g'){
            $arr_ch_asc9 ['4'] = 103;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            

            
        }if($res == 'h'){
            $arr_ch_asc9 ['4'] = 104;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            

            
        }if($res == 'i'){
            $arr_ch_asc9 ['4'] = 105;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            

            
        }if($res == 'j'){
            $arr_ch_asc9 ['4'] = 106;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            

            
        }if($res == 'k'){
            $arr_ch_asc9 ['4'] = 107;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            

            
        }if($res == 'l'){
            $arr_ch_asc9 ['4'] = 108;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            

            
        }if($res == 'm'){
            $arr_ch_asc9 ['4'] = 109;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            

            
        }if($res == 'n'){
            $arr_ch_asc9 ['4'] = 110;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            

            
        }if($res == 'o'){
            $arr_ch_asc9 ['4'] = 111;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            

            
        }if($res == 'p'){
            $arr_ch_asc9 ['4'] = 112;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            

            
        }if($res == 'q'){
            $arr_ch_asc9 ['4'] = 113;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            

            
        }if($res == 'r'){
            $arr_ch_asc9 ['4'] = 114;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            

            
        }if($res == 's'){
            $arr_ch_asc9 ['4'] = 115;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            

            
        }if($res == 't'){
            $arr_ch_asc9 ['4'] = 116;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            

            
        }if($res == 'u'){
            $arr_ch_asc9 ['4'] = 117;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            

            
        }if($res == 'v'){
            $arr_ch_asc9 ['4'] = 118;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            

            
        }if($res == 'w'){
            $arr_ch_asc9 ['4'] = 119;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            

            
        }if($res == 'x'){
            $arr_ch_asc9 ['4'] = 120;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            

            
        }if($res == 'y'){
            $arr_ch_asc9 ['4'] = 121;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            

            
        }if($res == 'z'){
            $arr_ch_asc9 ['4'] = 122;
            //  echo '['.$arr_ch_asc9[4].']'.$res;    
            
 }

foreach($result5 as $res){    //6
        
 if($res == 'a'){
                $arr_ch_asc9 ['5'] = 97;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
            }if($res == 'b'){
                $arr_ch_asc9 ['5'] = 98;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
            }if($res == 'c'){
                $arr_ch_asc9 ['5'] = 99;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
            }if($res == 'd'){
                $arr_ch_asc9 ['5'] = 100;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'e'){
                $arr_ch_asc9 ['5'] = 101;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'f'){
                $arr_ch_asc9 ['5'] = 102;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'g'){
                $arr_ch_asc9 ['5'] = 103;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'h'){
                $arr_ch_asc9 ['5'] = 105;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'i'){
                $arr_ch_asc9 ['5'] = 105;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'j'){
                $arr_ch_asc9 ['5'] = 106;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'k'){
                $arr_ch_asc9 ['5'] = 107;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'l'){
                $arr_ch_asc9 ['5'] = 108;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'm'){
                $arr_ch_asc9 ['5'] = 109;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'n'){
                $arr_ch_asc9 ['5'] = 110;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'o'){
                $arr_ch_asc9 ['5'] = 111;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'p'){
                $arr_ch_asc9 ['5'] = 112;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'q'){
                $arr_ch_asc9 ['5'] = 113;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'r'){
                $arr_ch_asc9 ['5'] = 115;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 's'){
                $arr_ch_asc9 ['5'] = 115;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 't'){
                $arr_ch_asc9 ['5'] = 116;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'u'){
                $arr_ch_asc9 ['5'] = 117;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'v'){
                $arr_ch_asc9 ['5'] = 118;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'w'){
                $arr_ch_asc9 ['5'] = 119;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'x'){
                $arr_ch_asc9 ['5'] = 120;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'y'){
                $arr_ch_asc9 ['5'] = 121;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'z'){
                $arr_ch_asc9 ['5'] = 122;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
 }

            
foreach($result6 as $res){    //7
        
 if($res == 'a'){
                $arr_ch_asc9 ['6'] = 97;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
            }if($res == 'b'){
                $arr_ch_asc9 ['6'] = 98;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
            }if($res == 'c'){
                $arr_ch_asc9 ['6'] = 99;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
            }if($res == 'd'){
                $arr_ch_asc9 ['6'] = 100;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'e'){
                $arr_ch_asc9 ['6'] = 101;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'f'){
                $arr_ch_asc9 ['6'] = 102;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'g'){
                $arr_ch_asc9 ['6'] = 103;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'h'){
                $arr_ch_asc9 ['6'] = 105;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'i'){
                $arr_ch_asc9 ['6'] = 105;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'j'){
                $arr_ch_asc9 ['6'] = 106;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'k'){
                $arr_ch_asc9 ['6'] = 107;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'l'){
                $arr_ch_asc9 ['6'] = 108;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'm'){
                $arr_ch_asc9 ['6'] = 109;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'n'){
                $arr_ch_asc9 ['6'] = 110;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'o'){
                $arr_ch_asc9 ['6'] = 111;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'p'){
                $arr_ch_asc9 ['6'] = 112;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'q'){
                $arr_ch_asc9 ['6'] = 113;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'r'){
                $arr_ch_asc9 ['6'] = 115;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 's'){
                $arr_ch_asc9 ['6'] = 115;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 't'){
                $arr_ch_asc9 ['6'] = 116;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'u'){
                $arr_ch_asc9 ['6'] = 117;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'v'){
                $arr_ch_asc9 ['6'] = 118;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'w'){
                $arr_ch_asc9 ['6'] = 119;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'x'){
                $arr_ch_asc9 ['6'] = 120;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'y'){
                $arr_ch_asc9 ['6'] = 121;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
    
                
            }if($res == 'z'){
                $arr_ch_asc9 ['6'] = 122;
                //  echo '['.$arr_ch_asc9[5].']'.$res;    
                
 }

foreach($result7 as $res){    //8
        
 if($res == 'a'){
                    $arr_ch_asc9 ['7'] = 97;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
                }if($res == 'b'){
                    $arr_ch_asc9 ['7'] = 98;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
                }if($res == 'c'){
                    $arr_ch_asc9 ['7'] = 99;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
                }if($res == 'd'){
                    $arr_ch_asc9 ['7'] = 100;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
        
                    
                }if($res == 'e'){
                    $arr_ch_asc9 ['7'] = 101;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
        
                    
                }if($res == 'f'){
                    $arr_ch_asc9 ['7'] = 102;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
        
                    
                }if($res == 'g'){
                    $arr_ch_asc9 ['7'] = 103;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
        
                    
                }if($res == 'h'){
                    $arr_ch_asc9 ['7'] = 105;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
        
                    
                }if($res == 'i'){
                    $arr_ch_asc9 ['7'] = 105;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
        
                    
                }if($res == 'j'){
                    $arr_ch_asc9 ['7'] = 106;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
        
                    
                }if($res == 'k'){
                    $arr_ch_asc9 ['7'] = 107;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
        
                    
                }if($res == 'l'){
                    $arr_ch_asc9 ['7'] = 108;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
        
                    
                }if($res == 'm'){
                    $arr_ch_asc9 ['7'] = 109;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
        
                    
                }if($res == 'n'){
                    $arr_ch_asc9 ['7'] = 110;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
        
                    
                }if($res == 'o'){
                    $arr_ch_asc9 ['7'] = 111;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
        
                    
                }if($res == 'p'){
                    $arr_ch_asc9 ['7'] = 112;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
        
                    
                }if($res == 'q'){
                    $arr_ch_asc9 ['7'] = 113;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
        
                    
                }if($res == 'r'){
                    $arr_ch_asc9 ['7'] = 115;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
        
                    
                }if($res == 's'){
                    $arr_ch_asc9 ['7'] = 115;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
        
                    
                }if($res == 't'){
                    $arr_ch_asc9 ['7'] = 116;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
        
                    
                }if($res == 'u'){
                    $arr_ch_asc9 ['7'] = 117;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
        
                    
                }if($res == 'v'){
                    $arr_ch_asc9 ['7'] = 118;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
        
                    
                }if($res == 'w'){
                    $arr_ch_asc9 ['7'] = 119;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
        
                    
                }if($res == 'x'){
                    $arr_ch_asc9 ['7'] = 120;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
        
                    
                }if($res == 'y'){
                    $arr_ch_asc9 ['7'] = 121;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
        
                    
                }if($res == 'z'){
                    $arr_ch_asc9 ['7'] = 122;
                    //  echo '['.$arr_ch_asc9[5].']'.$res;    
                    
 }
foreach($result8 as $res){    //9
        
    if($res == 'a'){
                       $arr_ch_asc9 ['8'] = 97;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
                   }if($res == 'b'){
                       $arr_ch_asc9 ['8'] = 98;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
                   }if($res == 'c'){
                       $arr_ch_asc9 ['8'] = 99;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
                   }if($res == 'd'){
                       $arr_ch_asc9 ['8'] = 100;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
           
                       
                   }if($res == 'e'){
                       $arr_ch_asc9 ['8'] = 101;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
           
                       
                   }if($res == 'f'){
                       $arr_ch_asc9 ['8'] = 102;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
           
                       
                   }if($res == 'g'){
                       $arr_ch_asc9 ['8'] = 103;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
           
                       
                   }if($res == 'h'){
                       $arr_ch_asc9 ['8'] = 105;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
           
                       
                   }if($res == 'i'){
                       $arr_ch_asc9 ['8'] = 105;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
           
                       
                   }if($res == 'j'){
                       $arr_ch_asc9 ['8'] = 106;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
           
                       
                   }if($res == 'k'){
                       $arr_ch_asc9 ['8'] = 107;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
           
                       
                   }if($res == 'l'){
                       $arr_ch_asc9 ['8'] = 108;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
           
                       
                   }if($res == 'm'){
                       $arr_ch_asc9 ['8'] = 109;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
           
                       
                   }if($res == 'n'){
                       $arr_ch_asc9 ['8'] = 110;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
           
                       
                   }if($res == 'o'){
                       $arr_ch_asc9 ['8'] = 111;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
           
                       
                   }if($res == 'p'){
                       $arr_ch_asc9 ['8'] = 112;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
           
                       
                   }if($res == 'q'){
                       $arr_ch_asc9 ['8'] = 113;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
           
                       
                   }if($res == 'r'){
                       $arr_ch_asc9 ['8'] = 115;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
           
                       
                   }if($res == 's'){
                       $arr_ch_asc9 ['8'] = 115;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
           
                       
                   }if($res == 't'){
                       $arr_ch_asc9 ['8'] = 116;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
           
                       
                   }if($res == 'u'){
                       $arr_ch_asc9 ['8'] = 117;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
           
                       
                   }if($res == 'v'){
                       $arr_ch_asc9 ['8'] = 118;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
           
                       
                   }if($res == 'w'){
                       $arr_ch_asc9 ['8'] = 119;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
           
                       
                   }if($res == 'x'){
                       $arr_ch_asc9 ['8'] = 120;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
           
                       
                   }if($res == 'y'){
                       $arr_ch_asc9 ['8'] = 121;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
           
                       
                   }if($res == 'z'){
                       $arr_ch_asc9 ['8'] = 122;
                       //  echo '['.$arr_ch_asc9[5].']'.$res;    
                       
    }
           
              }// 9
        
           }// 8
    
       }// 7
    
     }// 6
    }// 5
   } //4
  } //3
 } //2
} //1
return $hash->sethash($arr_ch_asc9,$b,9,$ket);
}

//gram 10

function pre_print10gram($var,$b,$ket){
    $arr_ch_asc10 = [];
    $arr_asc = new kode_asci();
    $hash = new hash();
    $count = strlen($var);
    $kalimat = $var;
    $sub_kalimat = substr($kalimat,0);
    $arr_var = [$sub_kalimat[0]]; 
    $arr_var2 = [$sub_kalimat[1]]; 
    $arr_var3 = [$sub_kalimat[2]];
    $arr_var4 = [$sub_kalimat[3]];
    $arr_var5 = [$sub_kalimat[4]];
    $arr_var6 = [$sub_kalimat[5]];
    $arr_var7 = [$sub_kalimat[6]];
    $arr_var8 = [$sub_kalimat[7]];
    $arr_var9 = [$sub_kalimat[8]];
    $arr_var10 = [$sub_kalimat[9]];
    $asc = $arr_asc->ascii;

    $result=array_intersect($arr_var,$arr_asc->ascii);
    $result1=array_intersect($arr_var2,$arr_asc->ascii);
    $result2=array_intersect($arr_var3,$arr_asc->ascii);
    $result3=array_intersect($arr_var4,$arr_asc->ascii);
    $result4=array_intersect($arr_var5,$arr_asc->ascii);
    $result5=array_intersect($arr_var6,$arr_asc->ascii);
    $result6=array_intersect($arr_var7,$arr_asc->ascii);
    $result7=array_intersect($arr_var8,$arr_asc->ascii);
    $result8=array_intersect($arr_var9,$arr_asc->ascii);
    $result9=array_intersect($arr_var10,$arr_asc->ascii);

foreach($result as $res){    //1
    
 if($res == 'a'){
        $arr_ch_asc10 ['0'] = 97;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 'b'){
        $arr_ch_asc10 ['0'] = 98;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 'c'){
        $arr_ch_asc10 ['0'] = 99;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 'd'){
        $arr_ch_asc10 ['0'] = 100;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 'e'){
        $arr_ch_asc10 ['0'] = 101;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 'f'){
        $arr_ch_asc10 ['0'] = 102;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 'g'){
        $arr_ch_asc10 ['0'] = 103;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 'h'){
        $arr_ch_asc10 ['0'] = 104;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 'i'){
        $arr_ch_asc10 ['0'] = 105;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 'j'){
        $arr_ch_asc10 ['0'] = 106;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 'k'){
        $arr_ch_asc10 ['0'] = 107;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 'l'){
        $arr_ch_asc10 ['0'] = 108;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 'm'){
        $arr_ch_asc10 ['0'] = 109;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 'n'){
        $arr_ch_asc10 ['0'] = 110;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 'o'){
        $arr_ch_asc10 ['0'] = 111;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 'p'){
        $arr_ch_asc10 ['0'] = 112;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 'q'){
        $arr_ch_asc10 ['0'] = 113;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 'r'){
        $arr_ch_asc10 ['0'] = 114;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 's'){
        $arr_ch_asc10 ['0'] = 115;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 't'){
        $arr_ch_asc10 ['0'] = 116;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 'u'){
        $arr_ch_asc10 ['0'] = 117;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 'v'){
        $arr_ch_asc10 ['0'] = 118;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 'w'){
        $arr_ch_asc10 ['0'] = 119;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 'x'){
        $arr_ch_asc10 ['0'] = 120;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 'y'){
        $arr_ch_asc10 ['0'] = 121;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
    }if($res == 'z'){
        $arr_ch_asc10 ['0'] = 122;
        //  echo '['.$arr_ch_asc10[0].']'.$res;  
        
 }
   
foreach($result1 as $res){     //2
    
 if($res == 'a'){
        $arr_ch_asc10 ['1'] = 97;
        // echo '['.$arr_ch_asc10[1].']'.$res;
         
        
    }if($res == 'b'){
        $arr_ch_asc10 ['1'] = 98;
        // echo '['.$arr_ch_asc10[1].']'.$res;  
        
    }if($res == 'c'){
        $arr_ch_asc10 ['1'] = 99;
        // echo '['.$arr_ch_asc10[1].']'.$res;  
        
    }if($res == 'd'){
        $arr_ch_asc10 ['1'] = 100;
        // echo '['.$arr_ch_asc10[1].']'.$res;  

    }if($res == 'e'){
        $arr_ch_asc10 ['1'] = 101;
        // echo '['.$arr_ch_asc10[1].']'.$res;  

    }if($res == 'f'){
        $arr_ch_asc10 ['1'] = 102;
        // echo '['.$arr_ch_asc10[1].']'.$res;  

    }if($res == 'g'){
        $arr_ch_asc10 ['1'] = 103;
        // echo '['.$arr_ch_asc10[1].']'.$res;  

    }if($res == 'h'){
        $arr_ch_asc10 ['1'] = 104;
        // echo '['.$arr_ch_asc10[1].']'.$res;  

    }if($res == 'i'){
        $arr_ch_asc10 ['1'] = 105;
        // echo '['.$arr_ch_asc10[1].']'.$res;  

    }if($res == 'j'){
        $arr_ch_asc10 ['1'] = 106;
        // echo '['.$arr_ch_asc10[1].']'.$res;  

    }if($res == 'k'){
        $arr_ch_asc10 ['1'] = 107;
        // echo '['.$arr_ch_asc10[1].']'.$res;  

    }if($res == 'l'){
        $arr_ch_asc10 ['1'] = 108;
        // echo '['.$arr_ch_asc10[1].']'.$res;  

    }if($res == 'm'){
        $arr_ch_asc10 ['1'] = 109;
        // echo '['.$arr_ch_asc10[1].']'.$res;  

    }if($res == 'n'){
        $arr_ch_asc10 ['1'] = 110;
        // echo '['.$arr_ch_asc10[1].']'.$res;  

    }if($res == 'o'){
        $arr_ch_asc10 ['1'] = 111;
        // echo '['.$arr_ch_asc10[1].']'.$res;  

    }if($res == 'p'){
        $arr_ch_asc10 ['1'] = 112;
        // echo '['.$arr_ch_asc10[1].']'.$res;  

    }if($res == 'q'){
        $arr_ch_asc10 ['1'] = 113;
        // echo '['.$arr_ch_asc10[1].']'.$res;  

    }if($res == 'r'){
        $arr_ch_asc10 ['1'] = 114;
        // echo '['.$arr_ch_asc10[1].']'.$res;  

    }if($res == 's'){
        $arr_ch_asc10 ['1'] = 115;
        // echo '['.$arr_ch_asc10[1].']'.$res;  

    }if($res == 't'){
        $arr_ch_asc10 ['1'] = 116;
        // echo '['.$arr_ch_asc10[1].']'.$res;  

    }if($res == 'u'){
        $arr_ch_asc10 ['1'] = 117;
        // echo '['.$arr_ch_asc10[1].']'.$res;  

    }if($res == 'v'){
        $arr_ch_asc10 ['1'] = 118;
        // echo '['.$arr_ch_asc10[1].']'.$res;  

    }if($res == 'w'){
        $arr_ch_asc10 ['1'] = 119;
        // echo '['.$arr_ch_asc10[1].']'.$res;  

    }if($res == 'x'){
        $arr_ch_asc10 ['1'] = 120;
        // echo '['.$arr_ch_asc10[1].']'.$res;  

    }if($res == 'y'){
        $arr_ch_asc10 ['1'] = 121;
        // echo '['.$arr_ch_asc10[1].']'.$res;  

    }if($res == 'z'){
        $arr_ch_asc10 ['1'] = 122;
        // echo '['.$arr_ch_asc10[1].']'.$res;  

 }

foreach($result2 as $res){    //3

 if($res == 'a'){
    $arr_ch_asc10 ['2']= 97;
    // echo '['.$arr_ch_asc10[2].']'.$res;  
    
        }if($res == 'b'){
            $arr_ch_asc10 ['2'] = 98;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
        }if($res == 'c'){
            $arr_ch_asc10 ['2'] = 99;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
        }if($res == 'd'){
            $arr_ch_asc10 ['2'] = 100;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
            
            
        }if($res == 'e'){
            $arr_ch_asc10 ['2'] = 101;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
            
            
        }if($res == 'f'){
            $arr_ch_asc10 ['2'] = 102;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
            
            
        }if($res == 'g'){
            $arr_ch_asc10 ['2'] = 103;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
            
            
        }if($res == 'h'){
            $arr_ch_asc10 ['2'] = 104;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
            
            
        }if($res == 'i'){
            $arr_ch_asc10 ['2'] = 105;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
            
            
        }if($res == 'j'){
            $arr_ch_asc10 ['2'] = 106;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
            
            
        }if($res == 'k'){
            $arr_ch_asc10 ['2'] = 107;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
            
            
        }if($res == 'l'){
            $arr_ch_asc10 ['2'] = 108;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
            
            
        }if($res == 'm'){
            $arr_ch_asc10 ['2'] = 109;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
            
            
        }if($res == 'n'){
            $arr_ch_asc10 ['2'] = 110;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
            
            
        }if($res == 'o'){
            $arr_ch_asc10 ['2'] = 111;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
            
            
        }if($res == 'p'){
            $arr_ch_asc10 ['2'] = 112;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
            
            
        }if($res == 'q'){
            $arr_ch_asc10 ['2'] = 113;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
            
            
        }if($res == 'r'){
            $arr_ch_asc10 ['2'] = 114;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
            
            
        }if($res == 's'){
            $arr_ch_asc10 ['2'] = 115;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
            
            
        }if($res == 't'){
            $arr_ch_asc10 ['2'] = 116;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
            
            
        }if($res == 'u'){
            $arr_ch_asc10 ['2'] = 117;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
            
            
        }if($res == 'v'){
            $arr_ch_asc10 ['2'] = 118;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
            
            
        }if($res == 'w'){
            $arr_ch_asc10 ['2'] = 119;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
            
            
        }if($res == 'x'){
            $arr_ch_asc10 ['2'] = 120;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
            
            
        }if($res == 'y'){
            $arr_ch_asc10 ['2'] = 121;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
            
            
        }if($res == 'z'){
            $arr_ch_asc10 ['2'] = 122;
            // echo '['.$arr_ch_asc10[2].']'.$res;  
            
            
    
 }

foreach($result3 as $res){    //4
    
 if($res == 'a'){
        $arr_ch_asc10 ['3'] = 97;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        
    }if($res == 'b'){
        $arr_ch_asc10 ['3'] = 98;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        
    }if($res == 'c'){
        $arr_ch_asc10 ['3'] = 99;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        
    }if($res == 'd'){
        $arr_ch_asc10 ['3'] = 100;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        

        
    }if($res == 'e'){
        $arr_ch_asc10 ['3'] = 101;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        

        
    }if($res == 'f'){
        $arr_ch_asc10 ['3'] = 102;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        

        
    }if($res == 'g'){
        $arr_ch_asc10 ['3'] = 103;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        

        
    }if($res == 'h'){
        $arr_ch_asc10 ['3'] = 104;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        

        
    }if($res == 'i'){
        $arr_ch_asc10 ['3'] = 105;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        

        
    }if($res == 'j'){
        $arr_ch_asc10 ['3'] = 106;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        

        
    }if($res == 'k'){
        $arr_ch_asc10 ['3'] = 107;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        

        
    }if($res == 'l'){
        $arr_ch_asc10 ['3'] = 108;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        

        
    }if($res == 'm'){
        $arr_ch_asc10 ['3'] = 109;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        

        
    }if($res == 'n'){
        $arr_ch_asc10 ['3'] = 110;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        

        
    }if($res == 'o'){
        $arr_ch_asc10 ['3'] = 111;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        

        
    }if($res == 'p'){
        $arr_ch_asc10 ['3'] = 112;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        

        
    }if($res == 'q'){
        $arr_ch_asc10 ['3'] = 113;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        

        
    }if($res == 'r'){
        $arr_ch_asc10 ['3'] = 114;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        

        
    }if($res == 's'){
        $arr_ch_asc10 ['3'] = 115;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        

        
    }if($res == 't'){
        $arr_ch_asc10 ['3'] = 116;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        

        
    }if($res == 'u'){
        $arr_ch_asc10 ['3'] = 117;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        

        
    }if($res == 'v'){
        $arr_ch_asc10 ['3'] = 118;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        

        
    }if($res == 'w'){
        $arr_ch_asc10 ['3'] = 119;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        

        
    }if($res == 'x'){
        $arr_ch_asc10 ['3'] = 120;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        

        
    }if($res == 'y'){
        $arr_ch_asc10 ['3'] = 121;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
        

        
    }if($res == 'z'){
        $arr_ch_asc10 ['3'] = 122;
        // echo '['.$arr_ch_asc10[3].']'.$res;    
           
 }

foreach($result4 as $res){    //5
        
 if($res == 'a'){
            $arr_ch_asc10 ['4'] = 97;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            
        }if($res == 'b'){
            $arr_ch_asc10 ['4'] = 98;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            
        }if($res == 'c'){
            $arr_ch_asc10 ['4'] = 99;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            
        }if($res == 'd'){
            $arr_ch_asc10 ['4'] = 100;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            

            
        }if($res == 'e'){
            $arr_ch_asc10 ['4'] = 101;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            

            
        }if($res == 'f'){
            $arr_ch_asc10 ['4'] = 102;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            

            
        }if($res == 'g'){
            $arr_ch_asc10 ['4'] = 103;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            

            
        }if($res == 'h'){
            $arr_ch_asc10 ['4'] = 104;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            

            
        }if($res == 'i'){
            $arr_ch_asc10 ['4'] = 105;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            

            
        }if($res == 'j'){
            $arr_ch_asc10 ['4'] = 106;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            

            
        }if($res == 'k'){
            $arr_ch_asc10 ['4'] = 107;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            

            
        }if($res == 'l'){
            $arr_ch_asc10 ['4'] = 108;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            

            
        }if($res == 'm'){
            $arr_ch_asc10 ['4'] = 109;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            

            
        }if($res == 'n'){
            $arr_ch_asc10 ['4'] = 110;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            

            
        }if($res == 'o'){
            $arr_ch_asc10 ['4'] = 111;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            

            
        }if($res == 'p'){
            $arr_ch_asc10 ['4'] = 112;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            

            
        }if($res == 'q'){
            $arr_ch_asc10 ['4'] = 113;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            

            
        }if($res == 'r'){
            $arr_ch_asc10 ['4'] = 114;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            

            
        }if($res == 's'){
            $arr_ch_asc10 ['4'] = 115;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            

            
        }if($res == 't'){
            $arr_ch_asc10 ['4'] = 116;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            

            
        }if($res == 'u'){
            $arr_ch_asc10 ['4'] = 117;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            

            
        }if($res == 'v'){
            $arr_ch_asc10 ['4'] = 118;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            

            
        }if($res == 'w'){
            $arr_ch_asc10 ['4'] = 119;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            

            
        }if($res == 'x'){
            $arr_ch_asc10 ['4'] = 120;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            

            
        }if($res == 'y'){
            $arr_ch_asc10 ['4'] = 121;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            

            
        }if($res == 'z'){
            $arr_ch_asc10 ['4'] = 122;
            //  echo '['.$arr_ch_asc10[4].']'.$res;    
            
 }

foreach($result5 as $res){    //6
        
 if($res == 'a'){
                $arr_ch_asc10 ['5'] = 97;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
            }if($res == 'b'){
                $arr_ch_asc10 ['5'] = 98;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
            }if($res == 'c'){
                $arr_ch_asc10 ['5'] = 99;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
            }if($res == 'd'){
                $arr_ch_asc10 ['5'] = 100;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
    
                
            }if($res == 'e'){
                $arr_ch_asc10 ['5'] = 101;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
    
                
            }if($res == 'f'){
                $arr_ch_asc10 ['5'] = 102;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
    
                
            }if($res == 'g'){
                $arr_ch_asc10 ['5'] = 103;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
    
                
            }if($res == 'h'){
                $arr_ch_asc10 ['5'] = 105;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
    
                
            }if($res == 'i'){
                $arr_ch_asc10 ['5'] = 105;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
    
                
            }if($res == 'j'){
                $arr_ch_asc10 ['5'] = 106;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
    
                
            }if($res == 'k'){
                $arr_ch_asc10 ['5'] = 107;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
    
                
            }if($res == 'l'){
                $arr_ch_asc10 ['5'] = 108;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
    
                
            }if($res == 'm'){
                $arr_ch_asc10 ['5'] = 109;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
    
                
            }if($res == 'n'){
                $arr_ch_asc10 ['5'] = 110;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
    
                
            }if($res == 'o'){
                $arr_ch_asc10 ['5'] = 111;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
    
                
            }if($res == 'p'){
                $arr_ch_asc10 ['5'] = 112;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
    
                
            }if($res == 'q'){
                $arr_ch_asc10 ['5'] = 113;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
    
                
            }if($res == 'r'){
                $arr_ch_asc10 ['5'] = 115;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
    
                
            }if($res == 's'){
                $arr_ch_asc10 ['5'] = 115;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
    
                
            }if($res == 't'){
                $arr_ch_asc10 ['5'] = 116;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
    
                
            }if($res == 'u'){
                $arr_ch_asc10 ['5'] = 117;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
    
                
            }if($res == 'v'){
                $arr_ch_asc10 ['5'] = 118;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
    
                
            }if($res == 'w'){
                $arr_ch_asc10 ['5'] = 119;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
    
                
            }if($res == 'x'){
                $arr_ch_asc10 ['5'] = 120;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
    
                
            }if($res == 'y'){
                $arr_ch_asc10 ['5'] = 121;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
    
                
            }if($res == 'z'){
                $arr_ch_asc10 ['5'] = 122;
                //  echo '['.$arr_ch_asc10[5].']'.$res;    
                
 }

            
foreach($result6 as $res){    //7
        
 if($res == 'a'){
                $arr_ch_asc10 ['6'] = 97;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
            }if($res == 'b'){
                $arr_ch_asc10 ['6'] = 98;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
            }if($res == 'c'){
                $arr_ch_asc10 ['6'] = 99;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
            }if($res == 'd'){
                $arr_ch_asc10 ['6'] = 100;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
    
                
            }if($res == 'e'){
                $arr_ch_asc10 ['6'] = 101;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
    
                
            }if($res == 'f'){
                $arr_ch_asc10 ['6'] = 102;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
    
                
            }if($res == 'g'){
                $arr_ch_asc10 ['6'] = 103;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
    
                
            }if($res == 'h'){
                $arr_ch_asc10 ['6'] = 105;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
    
                
            }if($res == 'i'){
                $arr_ch_asc10 ['6'] = 105;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
    
                
            }if($res == 'j'){
                $arr_ch_asc10 ['6'] = 106;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
    
                
            }if($res == 'k'){
                $arr_ch_asc10 ['6'] = 107;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
    
                
            }if($res == 'l'){
                $arr_ch_asc10 ['6'] = 108;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
    
                
            }if($res == 'm'){
                $arr_ch_asc10 ['6'] = 109;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
    
                
            }if($res == 'n'){
                $arr_ch_asc10 ['6'] = 110;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
    
                
            }if($res == 'o'){
                $arr_ch_asc10 ['6'] = 111;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
    
                
            }if($res == 'p'){
                $arr_ch_asc10 ['6'] = 112;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
    
                
            }if($res == 'q'){
                $arr_ch_asc10 ['6'] = 113;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
    
                
            }if($res == 'r'){
                $arr_ch_asc10 ['6'] = 115;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
    
                
            }if($res == 's'){
                $arr_ch_asc10 ['6'] = 115;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
    
                
            }if($res == 't'){
                $arr_ch_asc10 ['6'] = 116;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
    
                
            }if($res == 'u'){
                $arr_ch_asc10 ['6'] = 117;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
    
                
            }if($res == 'v'){
                $arr_ch_asc10 ['6'] = 118;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
    
                
            }if($res == 'w'){
                $arr_ch_asc10 ['6'] = 119;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
    
                
            }if($res == 'x'){
                $arr_ch_asc10 ['6'] = 120;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
    
                
            }if($res == 'y'){
                $arr_ch_asc10 ['6'] = 121;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
    
                
            }if($res == 'z'){
                $arr_ch_asc10 ['6'] = 122;
                //  echo '['.$arr_ch_asc10[6].']'.$res;    
                
 }

foreach($result7 as $res){    //8
        
 if($res == 'a'){
                    $arr_ch_asc10 ['7'] = 97;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
                }if($res == 'b'){
                    $arr_ch_asc10 ['7'] = 98;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
                }if($res == 'c'){
                    $arr_ch_asc10 ['7'] = 99;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
                }if($res == 'd'){
                    $arr_ch_asc10 ['7'] = 100;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
        
                    
                }if($res == 'e'){
                    $arr_ch_asc10 ['7'] = 101;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
        
                    
                }if($res == 'f'){
                    $arr_ch_asc10 ['7'] = 102;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
        
                    
                }if($res == 'g'){
                    $arr_ch_asc10 ['7'] = 103;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
        
                    
                }if($res == 'h'){
                    $arr_ch_asc10 ['7'] = 105;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
        
                    
                }if($res == 'i'){
                    $arr_ch_asc10 ['7'] = 105;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
        
                    
                }if($res == 'j'){
                    $arr_ch_asc10 ['7'] = 106;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
        
                    
                }if($res == 'k'){
                    $arr_ch_asc10 ['7'] = 107;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
        
                    
                }if($res == 'l'){
                    $arr_ch_asc10 ['7'] = 108;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
        
                    
                }if($res == 'm'){
                    $arr_ch_asc10 ['7'] = 109;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
        
                    
                }if($res == 'n'){
                    $arr_ch_asc10 ['7'] = 110;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
        
                    
                }if($res == 'o'){
                    $arr_ch_asc10 ['7'] = 111;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
        
                    
                }if($res == 'p'){
                    $arr_ch_asc10 ['7'] = 112;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
        
                    
                }if($res == 'q'){
                    $arr_ch_asc10 ['7'] = 113;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
        
                    
                }if($res == 'r'){
                    $arr_ch_asc10 ['7'] = 115;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
        
                    
                }if($res == 's'){
                    $arr_ch_asc10 ['7'] = 115;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
        
                    
                }if($res == 't'){
                    $arr_ch_asc10 ['7'] = 116;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
        
                    
                }if($res == 'u'){
                    $arr_ch_asc10 ['7'] = 117;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
        
                    
                }if($res == 'v'){
                    $arr_ch_asc10 ['7'] = 118;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
        
                    
                }if($res == 'w'){
                    $arr_ch_asc10 ['7'] = 119;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
        
                    
                }if($res == 'x'){
                    $arr_ch_asc10 ['7'] = 120;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
        
                    
                }if($res == 'y'){
                    $arr_ch_asc10 ['7'] = 121;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
        
                    
                }if($res == 'z'){
                    $arr_ch_asc10 ['7'] = 122;
                    //  echo '['.$arr_ch_asc10[7].']'.$res;    
                    
 }
foreach($result8 as $res){    //9
        
    if($res == 'a'){
                       $arr_ch_asc10 ['8'] = 97;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
                   }if($res == 'b'){
                       $arr_ch_asc10 ['8'] = 98;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
                   }if($res == 'c'){
                       $arr_ch_asc10 ['8'] = 99;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
                   }if($res == 'd'){
                       $arr_ch_asc10 ['8'] = 100;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
           
                       
                   }if($res == 'e'){
                       $arr_ch_asc10 ['8'] = 101;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
           
                       
                   }if($res == 'f'){
                       $arr_ch_asc10 ['8'] = 102;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
           
                       
                   }if($res == 'g'){
                       $arr_ch_asc10 ['8'] = 103;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
           
                       
                   }if($res == 'h'){
                       $arr_ch_asc10 ['8'] = 105;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
           
                       
                   }if($res == 'i'){
                       $arr_ch_asc10 ['8'] = 105;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
           
                       
                   }if($res == 'j'){
                       $arr_ch_asc10 ['8'] = 106;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
           
                       
                   }if($res == 'k'){
                       $arr_ch_asc10 ['8'] = 107;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
           
                       
                   }if($res == 'l'){
                       $arr_ch_asc10 ['8'] = 108;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
           
                       
                   }if($res == 'm'){
                       $arr_ch_asc10 ['8'] = 109;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
           
                       
                   }if($res == 'n'){
                       $arr_ch_asc10 ['8'] = 110;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
           
                       
                   }if($res == 'o'){
                       $arr_ch_asc10 ['8'] = 111;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
           
                       
                   }if($res == 'p'){
                       $arr_ch_asc10 ['8'] = 112;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
           
                       
                   }if($res == 'q'){
                       $arr_ch_asc10 ['8'] = 113;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
           
                       
                   }if($res == 'r'){
                       $arr_ch_asc10 ['8'] = 115;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
           
                       
                   }if($res == 's'){
                       $arr_ch_asc10 ['8'] = 115;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
           
                       
                   }if($res == 't'){
                       $arr_ch_asc10 ['8'] = 116;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
           
                       
                   }if($res == 'u'){
                       $arr_ch_asc10 ['8'] = 117;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
           
                       
                   }if($res == 'v'){
                       $arr_ch_asc10 ['8'] = 118;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
           
                       
                   }if($res == 'w'){
                       $arr_ch_asc10 ['8'] = 119;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
           
                       
                   }if($res == 'x'){
                       $arr_ch_asc10 ['8'] = 120;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
           
                       
                   }if($res == 'y'){
                       $arr_ch_asc10 ['8'] = 121;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
           
                       
                   }if($res == 'z'){
                       $arr_ch_asc10 ['8'] = 122;
                       //  echo '['.$arr_ch_asc10[8].']'.$res;    
                       
    }

foreach($result9 as $res){    //10
        
 if($res == 'a'){
                           $arr_ch_asc10 ['9'] = 97;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
                       }if($res == 'b'){
                           $arr_ch_asc10 ['9'] = 98;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
                       }if($res == 'c'){
                           $arr_ch_asc10 ['9'] = 99;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
                       }if($res == 'd'){
                           $arr_ch_asc10 ['9'] = 100;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
               
                           
                       }if($res == 'e'){
                           $arr_ch_asc10 ['9'] = 101;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
               
                           
                       }if($res == 'f'){
                           $arr_ch_asc10 ['9'] = 102;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
               
                           
                       }if($res == 'g'){
                           $arr_ch_asc10 ['9'] = 103;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
               
                           
                       }if($res == 'h'){
                           $arr_ch_asc10 ['9'] = 105;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
               
                           
                       }if($res == 'i'){
                           $arr_ch_asc10 ['9'] = 105;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
               
                           
                       }if($res == 'j'){
                           $arr_ch_asc10 ['9'] = 106;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
               
                           
                       }if($res == 'k'){
                           $arr_ch_asc10 ['9'] = 107;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
               
                           
                       }if($res == 'l'){
                           $arr_ch_asc10 ['9'] = 108;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
               
                           
                       }if($res == 'm'){
                           $arr_ch_asc10 ['9'] = 109;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
               
                           
                       }if($res == 'n'){
                           $arr_ch_asc10 ['9'] = 110;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
               
                           
                       }if($res == 'o'){
                           $arr_ch_asc10 ['9'] = 111;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
               
                           
                       }if($res == 'p'){
                           $arr_ch_asc10 ['9'] = 112;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
               
                           
                       }if($res == 'q'){
                           $arr_ch_asc10 ['9'] = 113;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
               
                           
                       }if($res == 'r'){
                           $arr_ch_asc10 ['9'] = 115;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
               
                           
                       }if($res == 's'){
                           $arr_ch_asc10 ['9'] = 115;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
               
                           
                       }if($res == 't'){
                           $arr_ch_asc10 ['9'] = 116;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
               
                           
                       }if($res == 'u'){
                           $arr_ch_asc10 ['9'] = 117;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
               
                           
                       }if($res == 'v'){
                           $arr_ch_asc10 ['9'] = 118;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
               
                           
                       }if($res == 'w'){
                           $arr_ch_asc10 ['9'] = 119;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
               
                           
                       }if($res == 'x'){
                           $arr_ch_asc10 ['9'] = 120;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
               
                           
                       }if($res == 'y'){
                           $arr_ch_asc10 ['9'] = 121;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
               
                           
                       }if($res == 'z'){
                           $arr_ch_asc10 ['9'] = 122;
                           //  echo '['.$arr_ch_asc10[9].']'.$res;    
                           
 }
               
                  }// 10
           
              }// 9
        
           }// 8
    
       }// 7
    
     }// 6
    }// 5
   } //4
  } //3
 } //2
} //1
return $hash->sethash($arr_ch_asc10,$b,10,$ket);
}

class hash{
   
  function sethash($gram, $b, $n, $ket){
      

    error_reporting(0);
    
    // echo '<hr>';
    $string_l = count($gram);
    $array = [];    
    $array = $gram;
    
    $p10 =pow($b,$string_l-10); //[10]
    $p9 =pow($b,$string_l-9); //[9]
    $p8 =pow($b,$string_l-8); //[8]
    $p7 =pow($b,$string_l-7); //[7]
    $p6 =pow($b,$string_l-6); //[6]
    $p5 =pow($b,$string_l-5); //[5]
    $p4 =pow($b,$string_l-4); //[4]
    $p3 = pow($b,$string_l-3); //[3]
    $p2 = pow($b,$string_l-2); //[2]  
    $p1 = pow($b,$string_l-1); //[1]
  
    // var_dump($string_l);
    if ($n == 2) {
            $h = ($array[0]*$p1)+$array[1];
            $hash []= $h;     
       
        }
        if($n == 3){
                $h = ($array[0]*$p1)+($array[1]*$p2)+$array[2];
                $hash []= $h; 
        
        }
        if($n == 4){
                $h = ($array[0]*$p1)+($array[1]*$p2)+($array[2]*$p3)+$array[3];
                $hash []= $h;     
        
        }
        if($n == 5){
                $h = ($array[0]*$p1)+($array[1]*$p2)+($array[2]*$p3)+($array[3]*$p4)+$array[4];
                $hash []= $h;   
            
        }
        if($n == 6){
                $h = ($array[0]*$p1)+($array[1]*$p2)+($array[2]*$p3)+($array[3]*$p4)+($array[4]*$p5)+$array[5];
                $hash []= $h;   
            
            
        }
        if($n == 7){
                $h = ($array[0]*$p1)+($array[1]*$p2)+($array[2]*$p3)+($array[3]*$p4)+($array[4]*$p5)+($array[5]*$p6)+$array[6];
                // $hash []= $h;   
            // var_dump($h);
           

        }
        if($n == 8){
                $h = ($array[0]*$p1)+($array[1]*$p2)+($array[2]*$p3)+($array[3]*$p4)+($array[4]*$p5)+($array[5]*$p6)+($array[6]*$p7)+$array[7];
                $hash []= $h;   
            
        }
        if($n == 9){
                $h = ($array[0]*$p1)+($array[1]*$p2)+($array[2]*$p3)+($array[3]*$p4)+($array[4]*$p5)+($array[5]*$p6)+($array[6]*$p7)+($array[7]*$p8)+$array[8];
                $hash []= $h;   
            
        }
    if($n == 10){
                $h = ($array[0]*$p1)+($array[1]*$p2)+($array[2]*$p3)+($array[3]*$p4)+($array[4]*$p5)+($array[5]*$p6)+($array[6]*$p7)+($array[7]*$p8)+($array[8]*$p9)+$array[9];
                $hash []= $h;   
            
    }  
   
    // $h = number_format($h,2);

    //    var_dump($h);  //nilai hash
     return $h;
   
   
   
    
  }

  function gethash($hash,$value, $id){  //save window result
    // echo "fingerprint<hr>";
    // var_dump($hash);
        $conn = mysqli_connect('localhost', 'root', '', 'winnowing');
            $sql = "SELECT id_hash FROM hash WHERE id_file= $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                // var_dump($id);
                $id_hash = $row["id_hash"];
             
                    $text_hash = serialize($hash);
                    // echo $text_hash;
                    if ($value == 'judul') {
                        $sql = "UPDATE hash SET judul = '$text_hash' WHERE hash.id_hash = $id_hash"; 
                        }if ($value == 'key') {
                            $sql = "UPDATE hash SET kata_kunci = '$text_hash' WHERE hash.id_hash = $id_hash"; 
                        }
                        if ($value == 'abstrak') {
                            $sql = "UPDATE hash SET abstrak = '$text_hash' WHERE hash.id_hash = $id_hash"; 
                        }
                        if ($value == 'pendahuluan') {
                            $sql = "UPDATE hash SET pendahuluan = '$text_hash' WHERE hash.id_hash = $id_hash"; 
                        }
                        if ($value == 'kesimpulan') {
                            $sql = "UPDATE hash SET hasil = '$text_hash' WHERE hash.id_hash = $id_hash"; 
                    }
                    
                    
                    if ($conn->query($sql) === TRUE) {
                        // echo 'success';
                       
                        if($value == 'key'){
                            
                         header('Location: http://localhost:8000/dashboard'); 
                        }
                            //  header('Location: http://localhost:8000/dashboard'); 
                    } else { 
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                            
            } else {
                echo 'error';
            }

  }	
  
 

  
}


	
    
?>