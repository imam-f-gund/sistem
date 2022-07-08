<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Sastrawi\Stemmer\StemmerFactory;
use Session;
use Smalot\PdfParser\Parser;
use Gufy\PdfToHtml\Pdf;
use Gufy\PdfToHtml\Config;
use App\Models\file;
use App\Models\hash;
use Validator;
use Alert;
use Auth;


class tes2 extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($array,$n,$b)
    {
        
        $ascii = array();
            $ascii [97] = 'a';    //97
            $ascii [98] = 'b';    //98
            $ascii [99] = 'c';   //99
            $ascii [100] = 'd';   //100
            $ascii [101] = 'e';    //101
            $ascii [102] = 'f';    //102
            $ascii [103] = 'g';    //103
            $ascii [104] = 'h';    //104
            $ascii [105] = 'i';    //105
            $ascii [106] = 'j';    //106
            $ascii [107] = 'k';   //107    
            $ascii [108] = 'l';   //108
            $ascii [109] = 'm';   //109
            $ascii [110] = 'n';   //110
            $ascii [111] = 'o';   //111
            $ascii [112] = 'p';   //112
            $ascii [113] = 'q';   //113
            $ascii [114] = 'r';   //114
            $ascii [115] = 's';   //115
            $ascii [116] = 't';   //116
            $ascii [117] = 'u';   //117
            $ascii [118] = 'v';   //118
            $ascii [119] = 'w';   //119
            $ascii [120] = 'x';   //120
            $ascii [121] = 'y';   //121
        $ascii [122] = 'x';   //122
        $array_judul = [];
        $array_judul [] = $array;
       
            // array_push($array_judul, $array);
            // $array_judul = array_unique($array_judul);
           
        foreach($array_judul as $res){
            if($n == 2){

                $arr_ch_asc = [];
                $count = strlen($res);
                $kalimat = $res;
                $sub_kalimat = substr($kalimat,0);
                $arr_var = [$sub_kalimat[0]]; 
                $arr_var2 = [$sub_kalimat[1]]; 
                
                $result=array_intersect($arr_var,$ascii);
                $result1=array_intersect($arr_var2,$ascii);

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
                    // $result1=array_intersect($arr_var2,$ascii);
            
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
                $arrayisisss = $arr_ch_asc;
            }elseif($n == 3){
                        // var_dump($var);
                            $arr_ch_asc3 = [];
                           
                            $count = strlen($res);
                            $kalimat = $res;
                            $sub_kalimat = substr($kalimat,0);
                            $arr_var = [$sub_kalimat[0]]; 
                            $arr_var2 = [$sub_kalimat[1]]; 
                            $arr_var3 = [$sub_kalimat[2]];
                            $asc = $ascii;
                    
                            $result=array_intersect($arr_var,$ascii);
                            $result1=array_intersect($arr_var2,$ascii);
                            $result2=array_intersect($arr_var3,$ascii);
                      
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
                        // return $hash->sethash($arr_ch_asc3,$b,3,$ket);
                        $arrayisisss = $arr_ch_asc3;
                     

            }elseif($n == 4){
                 
                        $arr_ch_asc4 = [];
                      
                        $count = strlen($res);
                        $kalimat = $res;
                        $sub_kalimat = substr($kalimat,0);
                        $arr_var = [$sub_kalimat[0]]; 
                        $arr_var2 = [$sub_kalimat[1]]; 
                        $arr_var3 = [$sub_kalimat[2]];
                        $arr_var4 = [$sub_kalimat[3]];
                      
                    
                        $result=array_intersect($arr_var,$ascii);
                        $result1=array_intersect($arr_var2,$ascii);
                        $result2=array_intersect($arr_var3,$ascii);
                        $result3=array_intersect($arr_var4,$ascii);
                    
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
                     
                    // return $hash->sethash($arr_ch_asc4,$b,4,$ket);
                    }
                    $arrayisisss = $arr_ch_asc4;

            }elseif($n == 5){
                    // $arrayisisss = pre_print5gram($res,$b);
                    $arr_ch_asc5 = [];
                 
                    $count = strlen($res);
                    $kalimat = $res;
                    $sub_kalimat = substr($kalimat,0);
                    $arr_var = [$sub_kalimat[0]]; 
                    $arr_var2 = [$sub_kalimat[1]]; 
                    $arr_var3 = [$sub_kalimat[2]];
                    $arr_var4 = [$sub_kalimat[3]];
                    $arr_var5 = [$sub_kalimat[4]];
                   
                    $result=array_intersect($arr_var,$ascii);
                    $result1=array_intersect($arr_var2,$ascii);
                    $result2=array_intersect($arr_var3,$ascii);
                    $result3=array_intersect($arr_var4,$ascii);
                    $result4=array_intersect($arr_var5,$ascii);
                    
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
                $arrayisisss = $arr_ch_asc5;
             }
            elseif($n == 6){
                    // $arrayisisss = pre_print5gram($res,$b);
                    $arr_ch_asc6 = [];
                 
                    $count = strlen($res);
                    $kalimat = $res;
                    $sub_kalimat = substr($kalimat,0);
                    $arr_var = [$sub_kalimat[0]]; 
                    $arr_var2 = [$sub_kalimat[1]]; 
                    $arr_var3 = [$sub_kalimat[2]];
                    $arr_var4 = [$sub_kalimat[3]];
                    $arr_var5 = [$sub_kalimat[4]];
                    $arr_var6 = [$sub_kalimat[5]];
                   
                    $result=array_intersect($arr_var,$ascii);
                    $result1=array_intersect($arr_var2,$ascii);
                    $result2=array_intersect($arr_var3,$ascii);
                    $result3=array_intersect($arr_var4,$ascii);
                    $result4=array_intersect($arr_var5,$ascii);
                    $result5=array_intersect($arr_var6,$ascii);
                    
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
                    
                    $arrayisisss = $arr_ch_asc6;
            }elseif($n == 7){
               
                $arr_ch_asc7 = [];
                // $arr_asc = new kode_asci();
                // $hash = new hash();
                $count = strlen($res);
                $kalimat = $res;
                $sub_kalimat = substr($kalimat,0);
                $arr_var = [$sub_kalimat[0]]; 
                $arr_var2 = [$sub_kalimat[1]]; 
                $arr_var3 = [$sub_kalimat[2]];
                $arr_var4 = [$sub_kalimat[3]];
                $arr_var5 = [$sub_kalimat[4]];
                $arr_var6 = [$sub_kalimat[5]];
                $arr_var7 = [$sub_kalimat[6]];
                // $arr_var8 = [$sub_kalimat[7]];
                // $asc = $arr_asc->ascii;
            
                $result=array_intersect($arr_var,$ascii);
                $result1=array_intersect($arr_var2,$ascii);
                $result2=array_intersect($arr_var3,$ascii);
                $result3=array_intersect($arr_var4,$ascii);
                $result4=array_intersect($arr_var5,$ascii);
                $result5=array_intersect($arr_var6,$ascii);
                $result6=array_intersect($arr_var7,$ascii);
                // $result7=array_intersect($arr_var8,$ascii);
            
                foreach($result as $res){    //1
                    
                    if($res == 'a'){
                            $arr_ch_asc7 ['0'] = 97;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 'b'){
                            $arr_ch_asc7 ['0'] = 98;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 'c'){
                            $arr_ch_asc7 ['0'] = 99;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 'd'){
                            $arr_ch_asc7 ['0'] = 100;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 'e'){
                            $arr_ch_asc7 ['0'] = 101;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 'f'){
                            $arr_ch_asc7 ['0'] = 102;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 'g'){
                            $arr_ch_asc7 ['0'] = 103;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 'h'){
                            $arr_ch_asc7 ['0'] = 104;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 'i'){
                            $arr_ch_asc7 ['0'] = 105;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 'j'){
                            $arr_ch_asc7 ['0'] = 106;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 'k'){
                            $arr_ch_asc7 ['0'] = 107;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 'l'){
                            $arr_ch_asc7 ['0'] = 108;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 'm'){
                            $arr_ch_asc7 ['0'] = 109;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 'n'){
                            $arr_ch_asc7 ['0'] = 110;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 'o'){
                            $arr_ch_asc7 ['0'] = 111;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 'p'){
                            $arr_ch_asc7 ['0'] = 112;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 'q'){
                            $arr_ch_asc7 ['0'] = 113;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 'r'){
                            $arr_ch_asc7 ['0'] = 114;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 's'){
                            $arr_ch_asc7 ['0'] = 115;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 't'){
                            $arr_ch_asc7 ['0'] = 116;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 'u'){
                            $arr_ch_asc7 ['0'] = 117;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 'v'){
                            $arr_ch_asc7 ['0'] = 118;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 'w'){
                            $arr_ch_asc7 ['0'] = 119;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 'x'){
                            $arr_ch_asc7 ['0'] = 120;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 'y'){
                            $arr_ch_asc7 ['0'] = 121;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                        }if($res == 'z'){
                            $arr_ch_asc7 ['0'] = 122;
                            //  echo '['.$arr_ch_asc7[0].']'.$res;  
                            
                    }
                
                foreach($result1 as $res){     //2
                    
                    if($res == 'a'){
                        $arr_ch_asc7 ['1'] = 97;
                        // echo '['.$arr_ch_asc7[1].']'.$res;
                        
                        
                    }if($res == 'b'){
                        $arr_ch_asc7 ['1'] = 98;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                        
                    }if($res == 'c'){
                        $arr_ch_asc7 ['1'] = 99;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                        
                    }if($res == 'd'){
                        $arr_ch_asc7 ['1'] = 100;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                
                    }if($res == 'e'){
                        $arr_ch_asc7 ['1'] = 101;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                
                    }if($res == 'f'){
                        $arr_ch_asc7 ['1'] = 102;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                
                    }if($res == 'g'){
                        $arr_ch_asc7 ['1'] = 103;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                
                    }if($res == 'h'){
                        $arr_ch_asc7 ['1'] = 104;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                
                    }if($res == 'i'){
                        $arr_ch_asc7 ['1'] = 105;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                
                    }if($res == 'j'){
                        $arr_ch_asc7 ['1'] = 106;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                
                    }if($res == 'k'){
                        $arr_ch_asc7 ['1'] = 107;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                
                    }if($res == 'l'){
                        $arr_ch_asc7 ['1'] = 108;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                
                    }if($res == 'm'){
                        $arr_ch_asc7 ['1'] = 109;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                
                    }if($res == 'n'){
                        $arr_ch_asc7 ['1'] = 110;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                
                    }if($res == 'o'){
                        $arr_ch_asc7 ['1'] = 111;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                
                    }if($res == 'p'){
                        $arr_ch_asc7 ['1'] = 112;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                
                    }if($res == 'q'){
                        $arr_ch_asc7 ['1'] = 113;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                
                    }if($res == 'r'){
                        $arr_ch_asc7 ['1'] = 114;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                
                    }if($res == 's'){
                        $arr_ch_asc7 ['1'] = 115;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                
                    }if($res == 't'){
                        $arr_ch_asc7 ['1'] = 116;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                
                    }if($res == 'u'){
                        $arr_ch_asc7 ['1'] = 117;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                
                    }if($res == 'v'){
                        $arr_ch_asc7 ['1'] = 118;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                
                    }if($res == 'w'){
                        $arr_ch_asc7 ['1'] = 119;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                
                    }if($res == 'x'){
                        $arr_ch_asc7 ['1'] = 120;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                
                    }if($res == 'y'){
                        $arr_ch_asc7 ['1'] = 121;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                
                    }if($res == 'z'){
                        $arr_ch_asc7 ['1'] = 122;
                        // echo '['.$arr_ch_asc7[1].']'.$res;  
                
                    }
                
                foreach($result2 as $res){    //3
                
                    if($res == 'a'){
                    $arr_ch_asc7 ['2']= 97;
                    // echo '['.$arr_ch_asc7[2].']'.$res;  
                    
                        }if($res == 'b'){
                            $arr_ch_asc7 ['2'] = 98;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                        }if($res == 'c'){
                            $arr_ch_asc7 ['2'] = 99;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                        }if($res == 'd'){
                            $arr_ch_asc7 ['2'] = 100;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                            
                            
                        }if($res == 'e'){
                            $arr_ch_asc7 ['2'] = 101;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                            
                            
                        }if($res == 'f'){
                            $arr_ch_asc7 ['2'] = 102;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                            
                            
                        }if($res == 'g'){
                            $arr_ch_asc7 ['2'] = 103;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                            
                            
                        }if($res == 'h'){
                            $arr_ch_asc7 ['2'] = 104;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                            
                            
                        }if($res == 'i'){
                            $arr_ch_asc7 ['2'] = 105;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                            
                            
                        }if($res == 'j'){
                            $arr_ch_asc7 ['2'] = 106;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                            
                            
                        }if($res == 'k'){
                            $arr_ch_asc7 ['2'] = 107;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                            
                            
                        }if($res == 'l'){
                            $arr_ch_asc7 ['2'] = 108;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                            
                            
                        }if($res == 'm'){
                            $arr_ch_asc7 ['2'] = 109;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                            
                            
                        }if($res == 'n'){
                            $arr_ch_asc7 ['2'] = 110;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                            
                            
                        }if($res == 'o'){
                            $arr_ch_asc7 ['2'] = 111;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                            
                            
                        }if($res == 'p'){
                            $arr_ch_asc7 ['2'] = 112;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                            
                            
                        }if($res == 'q'){
                            $arr_ch_asc7 ['2'] = 113;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                            
                            
                        }if($res == 'r'){
                            $arr_ch_asc7 ['2'] = 114;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                            
                            
                        }if($res == 's'){
                            $arr_ch_asc7 ['2'] = 115;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                            
                            
                        }if($res == 't'){
                            $arr_ch_asc7 ['2'] = 116;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                            
                            
                        }if($res == 'u'){
                            $arr_ch_asc7 ['2'] = 117;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                            
                            
                        }if($res == 'v'){
                            $arr_ch_asc7 ['2'] = 118;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                            
                            
                        }if($res == 'w'){
                            $arr_ch_asc7 ['2'] = 119;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                            
                            
                        }if($res == 'x'){
                            $arr_ch_asc7 ['2'] = 120;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                            
                            
                        }if($res == 'y'){
                            $arr_ch_asc7 ['2'] = 121;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                            
                            
                        }if($res == 'z'){
                            $arr_ch_asc7 ['2'] = 122;
                            // echo '['.$arr_ch_asc7[2].']'.$res;  
                            
                            
                    
                    }
                
                foreach($result3 as $res){    //4
                    
                    if($res == 'a'){
                        $arr_ch_asc7 ['3'] = 97;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                    }if($res == 'b'){
                        $arr_ch_asc7 ['3'] = 98;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                    }if($res == 'c'){
                        $arr_ch_asc7 ['3'] = 99;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                    }if($res == 'd'){
                        $arr_ch_asc7 ['3'] = 100;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                
                        
                    }if($res == 'e'){
                        $arr_ch_asc7 ['3'] = 101;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                
                        
                    }if($res == 'f'){
                        $arr_ch_asc7 ['3'] = 102;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                
                        
                    }if($res == 'g'){
                        $arr_ch_asc7 ['3'] = 103;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                
                        
                    }if($res == 'h'){
                        $arr_ch_asc7 ['3'] = 104;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                
                        
                    }if($res == 'i'){
                        $arr_ch_asc7 ['3'] = 105;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                
                        
                    }if($res == 'j'){
                        $arr_ch_asc7 ['3'] = 106;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                
                        
                    }if($res == 'k'){
                        $arr_ch_asc7 ['3'] = 107;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                
                        
                    }if($res == 'l'){
                        $arr_ch_asc7 ['3'] = 108;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                
                        
                    }if($res == 'm'){
                        $arr_ch_asc7 ['3'] = 109;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                
                        
                    }if($res == 'n'){
                        $arr_ch_asc7 ['3'] = 110;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                
                        
                    }if($res == 'o'){
                        $arr_ch_asc7 ['3'] = 111;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                
                        
                    }if($res == 'p'){
                        $arr_ch_asc7 ['3'] = 112;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                
                        
                    }if($res == 'q'){
                        $arr_ch_asc7 ['3'] = 113;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                
                        
                    }if($res == 'r'){
                        $arr_ch_asc7 ['3'] = 114;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                
                        
                    }if($res == 's'){
                        $arr_ch_asc7 ['3'] = 115;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                
                        
                    }if($res == 't'){
                        $arr_ch_asc7 ['3'] = 116;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                
                        
                    }if($res == 'u'){
                        $arr_ch_asc7 ['3'] = 117;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                
                        
                    }if($res == 'v'){
                        $arr_ch_asc7 ['3'] = 118;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                
                        
                    }if($res == 'w'){
                        $arr_ch_asc7 ['3'] = 119;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                
                        
                    }if($res == 'x'){
                        $arr_ch_asc7 ['3'] = 120;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                
                        
                    }if($res == 'y'){
                        $arr_ch_asc7 ['3'] = 121;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                
                        
                    }if($res == 'z'){
                        $arr_ch_asc7 ['3'] = 122;
                        // echo '['.$arr_ch_asc7[3].']'.$res;    
                        
                 }
                
                foreach($result4 as $res){    //5
                        
                    if($res == 'a'){
                            $arr_ch_asc7 ['4'] = 97;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                        }if($res == 'b'){
                            $arr_ch_asc7 ['4'] = 98;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                        }if($res == 'c'){
                            $arr_ch_asc7 ['4'] = 99;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                        }if($res == 'd'){
                            $arr_ch_asc7 ['4'] = 100;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                
                            
                        }if($res == 'e'){
                            $arr_ch_asc7 ['4'] = 101;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                
                            
                        }if($res == 'f'){
                            $arr_ch_asc7 ['4'] = 102;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                
                            
                        }if($res == 'g'){
                            $arr_ch_asc7 ['4'] = 103;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                
                            
                        }if($res == 'h'){
                            $arr_ch_asc7 ['4'] = 104;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                
                            
                        }if($res == 'i'){
                            $arr_ch_asc7 ['4'] = 105;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                
                            
                        }if($res == 'j'){
                            $arr_ch_asc7 ['4'] = 106;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                
                            
                        }if($res == 'k'){
                            $arr_ch_asc7 ['4'] = 107;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                
                            
                        }if($res == 'l'){
                            $arr_ch_asc7 ['4'] = 108;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                
                            
                        }if($res == 'm'){
                            $arr_ch_asc7 ['4'] = 109;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                
                            
                        }if($res == 'n'){
                            $arr_ch_asc7 ['4'] = 110;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                
                            
                        }if($res == 'o'){
                            $arr_ch_asc7 ['4'] = 111;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                
                            
                        }if($res == 'p'){
                            $arr_ch_asc7 ['4'] = 112;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                
                            
                        }if($res == 'q'){
                            $arr_ch_asc7 ['4'] = 113;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                
                            
                        }if($res == 'r'){
                            $arr_ch_asc7 ['4'] = 114;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                
                            
                        }if($res == 's'){
                            $arr_ch_asc7 ['4'] = 115;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                
                            
                        }if($res == 't'){
                            $arr_ch_asc7 ['4'] = 116;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                
                            
                        }if($res == 'u'){
                            $arr_ch_asc7 ['4'] = 117;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                
                            
                        }if($res == 'v'){
                            $arr_ch_asc7 ['4'] = 118;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                
                            
                        }if($res == 'w'){
                            $arr_ch_asc7 ['4'] = 119;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                
                            
                        }if($res == 'x'){
                            $arr_ch_asc7 ['4'] = 120;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                
                            
                        }if($res == 'y'){
                            $arr_ch_asc7 ['4'] = 121;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                
                            
                        }if($res == 'z'){
                            $arr_ch_asc7 ['4'] = 122;
                            //  echo '['.$arr_ch_asc7[4].']'.$res;    
                            
                    }
                
                foreach($result5 as $res){    //6
                        
                    if($res == 'a'){
                                $arr_ch_asc7 ['5'] = 97;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                            }if($res == 'b'){
                                $arr_ch_asc7 ['5'] = 98;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                            }if($res == 'c'){
                                $arr_ch_asc7 ['5'] = 99;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                            }if($res == 'd'){
                                $arr_ch_asc7 ['5'] = 100;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                    
                                
                            }if($res == 'e'){
                                $arr_ch_asc7 ['5'] = 101;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                    
                                
                            }if($res == 'f'){
                                $arr_ch_asc7 ['5'] = 102;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                    
                                
                            }if($res == 'g'){
                                $arr_ch_asc7 ['5'] = 103;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                    
                                
                            }if($res == 'h'){
                                $arr_ch_asc7 ['5'] = 105;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                    
                                
                            }if($res == 'i'){
                                $arr_ch_asc7 ['5'] = 105;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                    
                                
                            }if($res == 'j'){
                                $arr_ch_asc7 ['5'] = 106;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                    
                                
                            }if($res == 'k'){
                                $arr_ch_asc7 ['5'] = 107;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                    
                                
                            }if($res == 'l'){
                                $arr_ch_asc7 ['5'] = 108;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                    
                                
                            }if($res == 'm'){
                                $arr_ch_asc7 ['5'] = 109;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                    
                                
                            }if($res == 'n'){
                                $arr_ch_asc7 ['5'] = 110;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                    
                                
                            }if($res == 'o'){
                                $arr_ch_asc7 ['5'] = 111;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                    
                                
                            }if($res == 'p'){
                                $arr_ch_asc7 ['5'] = 112;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                    
                                
                            }if($res == 'q'){
                                $arr_ch_asc7 ['5'] = 113;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                    
                                
                            }if($res == 'r'){
                                $arr_ch_asc7 ['5'] = 115;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                    
                                
                            }if($res == 's'){
                                $arr_ch_asc7 ['5'] = 115;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                    
                                
                            }if($res == 't'){
                                $arr_ch_asc7 ['5'] = 116;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                    
                                
                            }if($res == 'u'){
                                $arr_ch_asc7 ['5'] = 117;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                    
                                
                            }if($res == 'v'){
                                $arr_ch_asc7 ['5'] = 118;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                    
                                
                            }if($res == 'w'){
                                $arr_ch_asc7 ['5'] = 119;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                    
                                
                            }if($res == 'x'){
                                $arr_ch_asc7 ['5'] = 120;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                    
                                
                            }if($res == 'y'){
                                $arr_ch_asc7 ['5'] = 121;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                    
                                
                            }if($res == 'z'){
                                $arr_ch_asc7 ['5'] = 122;
                                //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                
                    }
                
                            
                foreach($result6 as $res){    //7
                        
                    if($res == 'a'){
                                    $arr_ch_asc7 ['6'] = 97;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                                }if($res == 'b'){
                                    $arr_ch_asc7 ['6'] = 98;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                                }if($res == 'c'){
                                    $arr_ch_asc7 ['6'] = 99;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                                }if($res == 'd'){
                                    $arr_ch_asc7 ['6'] = 100;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                        
                                    
                                }if($res == 'e'){
                                    $arr_ch_asc7 ['6'] = 101;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                        
                                    
                                }if($res == 'f'){
                                    $arr_ch_asc7 ['6'] = 102;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                        
                                    
                                }if($res == 'g'){
                                    $arr_ch_asc7 ['6'] = 103;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                        
                                    
                                }if($res == 'h'){
                                    $arr_ch_asc7 ['6'] = 105;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                        
                                    
                                }if($res == 'i'){
                                    $arr_ch_asc7 ['6'] = 105;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                        
                                    
                                }if($res == 'j'){
                                    $arr_ch_asc7 ['6'] = 106;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                        
                                    
                                }if($res == 'k'){
                                    $arr_ch_asc7 ['6'] = 107;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                        
                                    
                                }if($res == 'l'){
                                    $arr_ch_asc7 ['6'] = 108;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                        
                                    
                                }if($res == 'm'){
                                    $arr_ch_asc7 ['6'] = 109;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                        
                                    
                                }if($res == 'n'){
                                    $arr_ch_asc7 ['6'] = 110;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                        
                                    
                                }if($res == 'o'){
                                    $arr_ch_asc7 ['6'] = 111;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                        
                                    
                                }if($res == 'p'){
                                    $arr_ch_asc7 ['6'] = 112;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                        
                                    
                                }if($res == 'q'){
                                    $arr_ch_asc7 ['6'] = 113;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                        
                                    
                                }if($res == 'r'){
                                    $arr_ch_asc7 ['6'] = 115;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                        
                                    
                                }if($res == 's'){
                                    $arr_ch_asc7 ['6'] = 115;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                        
                                    
                                }if($res == 't'){
                                    $arr_ch_asc7 ['6'] = 116;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                        
                                    
                                }if($res == 'u'){
                                    $arr_ch_asc7 ['6'] = 117;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                        
                                    
                                }if($res == 'v'){
                                    $arr_ch_asc7 ['6'] = 118;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                        
                                    
                                }if($res == 'w'){
                                    $arr_ch_asc7 ['6'] = 119;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                        
                                    
                                }if($res == 'x'){
                                    $arr_ch_asc7 ['6'] = 120;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                        
                                    
                                }if($res == 'y'){
                                    $arr_ch_asc7 ['6'] = 121;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                        
                                    
                                }if($res == 'z'){
                                    $arr_ch_asc7 ['6'] = 122;
                                    //  echo '['.$arr_ch_asc7[5].']'.$res;    
                                    
                    }
                    
                    }// 7
                    
                    }// 6
                    }// 5
                } //4
                } //3
                } //2
                } //1
                // return $hash->sethash($arr_ch_asc7,$b,8,$ket);
                   
                   $arrayisisss = $arr_ch_asc7;

            }elseif($n == 8){
                $arr_ch_asc8 = [];
                // $arr_asc = new kode_asci();
                // $hash = new hash();
                $count = strlen($res);
                $kalimat = $res;
                $sub_kalimat = substr($kalimat,0);
                $arr_var = [$sub_kalimat[0]]; 
                $arr_var2 = [$sub_kalimat[1]]; 
                $arr_var3 = [$sub_kalimat[2]];
                $arr_var4 = [$sub_kalimat[3]];
                $arr_var5 = [$sub_kalimat[4]];
                $arr_var6 = [$sub_kalimat[5]];
                $arr_var7 = [$sub_kalimat[6]];
                $arr_var8 = [$sub_kalimat[7]];
                // $asc = $arr_asc->ascii;
            
                $result=array_intersect($arr_var,$ascii);
                $result1=array_intersect($arr_var2,$ascii);
                $result2=array_intersect($arr_var3,$ascii);
                $result3=array_intersect($arr_var4,$ascii);
                $result4=array_intersect($arr_var5,$ascii);
                $result5=array_intersect($arr_var6,$ascii);
                $result6=array_intersect($arr_var7,$ascii);
                $result7=array_intersect($arr_var8,$ascii);
            
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
                // return $hash->sethash($arr_ch_asc8,$b,8,$ket);
                   
                   $arrayisisss = $arr_ch_asc8;
            }elseif($n == 9){
                $arr_ch_asc9 = [];     
                $count = strlen($res);
                $kalimat = $res;
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
               
                $result=array_intersect($arr_var,$ascii);
                $result1=array_intersect($arr_var2,$ascii);
                $result2=array_intersect($arr_var3,$ascii);
                $result3=array_intersect($arr_var4,$ascii);
                $result4=array_intersect($arr_var5,$ascii);
                $result5=array_intersect($arr_var6,$ascii);
                $result6=array_intersect($arr_var7,$ascii);
                $result7=array_intersect($arr_var8,$ascii);
                $result8=array_intersect($arr_var9,$ascii);

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
                   $arrayisisss = $arr_ch_asc9;

            }elseif ($n == 10) {
                $arr_ch_asc10 = [];     
                $count = strlen($res);
                $kalimat = $res;
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
               
                $result=array_intersect($arr_var,$ascii);
                $result1=array_intersect($arr_var2,$ascii);
                $result2=array_intersect($arr_var3,$ascii);
                $result3=array_intersect($arr_var4,$ascii);
                $result4=array_intersect($arr_var5,$ascii);
                $result5=array_intersect($arr_var6,$ascii);
                $result6=array_intersect($arr_var7,$ascii);
                $result7=array_intersect($arr_var8,$ascii);
                $result8=array_intersect($arr_var9,$ascii);
                $result9=array_intersect($arr_var10,$ascii);

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
               
                $arrayisisss = $arr_ch_asc10;
            }
         }
       
               
          $gram = $arrayisisss;

          $string_l = count($gram);
          
          $array = $gram;

    //    
        //   var_dump($n);
            $p10 =pow($b,$string_l-10); //[10]
            $p9 =pow($b,$string_l-9); //[9]
            $p8 =pow($b,$string_l-8); //[8]
            $p7 =pow($b,$string_l-7); //[7]
            $p6 =pow($b,$string_l-6); //[6]
            $p5 =pow($b,$string_l-5); //[5]
            $p4 =pow($b,$string_l-4); //[4]
            $p3 =pow($b,$string_l-3); //[3]
            $p2 =pow($b,$string_l-2); //[2]  
            $p1 =pow($b,$string_l-1); //[1]

           
         
          // echo $string_l-2;
        //   var_dump($string_l);
        //   die();
          if ($n == 2) {
                  $h = ($array[0]*$p1)+$array[1];
                    // $hash []= $h;     
                
            }elseif($n == 3){
                    $h = ($array[0]*$p1)+($array[1]*$p2)+$array[2];
                    // $hash []= $h; 
                
            }elseif($n == 4){
                    $h = ($array[0]*$p1)+($array[1]*$p2)+($array[2]*$p3)+$array[3];
                    // $hash []= $h;     
                
            }elseif($n == 5){
                    $h = ($array[0]*$p1)+($array[1]*$p2)+($array[2]*$p3)+($array[3]*$p4)+$array[4];
                    // $hash []= $h;   
                    
            }elseif($n == 6){
                    $h = ($array[0]*$p1)+($array[1]*$p2)+($array[2]*$p3)+($array[3]*$p4)+($array[4]*$p5)+$array[5];
                    // $hash []= $h; 
            
            }elseif($n == 7){
                    $h = ($array[0]*$p1)+($array[1]*$p2)+($array[2]*$p3)+($array[3]*$p4)+($array[4]*$p5)+($array[5]*$p6)+$array[6];
                    // var_dump($h);
                
            }elseif($n == 8){
                            $h = ($array[0]*$p1)+($array[1]*$p2)+($array[2]*$p3)+($array[3]*$p4)+($array[4]*$p5)+($array[5]*$p6)+($array[6]*$p7)+$array[7];
                            // $hash []= $h;   
                        
            }elseif($n == 9){
                            $h = ($array[0]*$p1)+($array[1]*$p2)+($array[2]*$p3)+($array[3]*$p4)+($array[4]*$p5)+($array[5]*$p6)+($array[6]*$p7)+($array[7]*$p8)+$array[8];
                            // $hash []= $h;   
                        
            }elseif($n == 10){
                            $h = ($array[0]*$p1)+($array[1]*$p2)+($array[2]*$p3)+($array[3]*$p4)+($array[4]*$p5)+($array[5]*$p6)+($array[6]*$p7)+($array[7]*$p8)+($array[8]*$p9)+$array[9];
                            // $hash []= $h;   
                    
            }
        
           
          return $h;
    
          
    }




    public function pdfhtml()
    {
        // redirect(url('/cobakpdf/stemming.php'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_text(Request $request)
    {
        
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
//buka
        $id = Auth::user()->id;
        $validator = Validator::make($request->all(),
			[
				'file'=> 'required|max:10000|mimes:pdf',					
			]
		);
        
        if ($validator->fails()) {
            Alert::error('Error', 'Error Message');
            return back();
		}else{
            $date = date("Y-m-d H:i:s");
            $data = new file;
            $extension =time().'-';
            $imageName =  $extension.$request->file->getClientOriginalName(); 
            $request->file->move(public_path('/cobakpdf/jurnal/'), $imageName);
            $data->nama_file= $imageName;
            $data->id_users = $id;
            $data->date = $date;
$data->gram = 8;        //set gram db
$data->window = 7;      //set window db
        $data->save();

            $get_data = DB::table('file')
            ->where('nama_file', '=', $imageName)
            ->first();

            $cookie_value = $get_data->id_file;
            setcookie('id', $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
            
            return redirect(url('/cobakpdf/stemming.php'));
        }
//tutup
}

    /**
     * Display th   e specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function analis_doc($id)
    {
    // analis doc buka
        
        $c1 = [];$c2 = [];$c3 = [];$c4 = [];$c5 = [];
        $all = [];
        $rata_sim = [];
        $dokumen = DB::table('hash') 
        ->join('file', 'hash.id_file', '=', 'file.id_file')
        ->where('file.id_file','!=',$id)
    ->where('file.gram',8)
    ->where('file.window',7)
        ->get(['hash.id_hash','hash.judul','hash.kata_kunci','hash.abstrak','hash.pendahuluan','hash.hasil','file.nama_file','file.file_judul','file.id_file']);
       
        $dokumen_relevansi = DB::table('hash') 
        ->join('file', 'hash.id_file', '=', 'file.id_file')
        ->where('file.id_file','=',$id)
    ->where('file.gram',8)
    ->where('file.window',7)
        ->get(['hash.id_hash','hash.judul','hash.kata_kunci','hash.abstrak','hash.pendahuluan','hash.hasil','file.nama_file','file.file_judul','file.id_file']);
    // analis doc
        //    var_dump($dokumen);
         //    die();
        $arr_doc = [];
        $arr_name_doc_a = [];
        $arr_name_doc_b = [];
        $no = 0;
        $ang = 1;
        for ($i=0; $i < count($dokumen); $i++) { 

            // for ($a = 1; $a < count($dokumen); $a++) { 
                
                // if ($dokumen[$i]->id_file == $dokumen_relevansi[0]->id_file) {
                //     // echo 'aaa';
                //     $i =+ 1;
                // }
                    
                // }elseif($i > $a){

                // }else{
        // echo 'No : '.'['.$ang++.']';
                   $d_a = $dokumen[$i]->file_judul;
                   
                    $d_b = $dokumen_relevansi[0]->file_judul;
                    // die();
                    $dok_a = unserialize($dokumen[$i]->judul);
                    $dok_b = unserialize($dokumen_relevansi[0]->judul);
                    $gb = array_intersect($dok_a,$dok_b);   //gabungan
                    $irs_a=array_diff($dok_a,$dok_b);   //beda a
                    $irs_b=array_diff($dok_b,$dok_a);   //beda b
                    $da = array_merge($gb,$irs_a,$irs_b);
                    $sim_j = count($gb)/count($da)*100;
                    // echo ' <br>['.$dokumen[$i]->nama_file.']'.'['.$dokumen_relevansi[0]->nama_file.'] hasil similarity judul ';
                    // echo '<b>['.$i.']</b>';
                    // echo '<b>['.$a.']</b> :';
                    // echo '<hr>';
                    // echo $sim_j;
                    //  echo '<hr>'; 
                    // var_dump($gb);
                    // echo '<hr>'; 
                    // var_dump($da);
                    // echo '<hr>';
                    

                    $dok_a = unserialize($dokumen[$i]->abstrak);
                    $dok_b = unserialize($dokumen_relevansi[0]->abstrak);
                    $gb = array_intersect($dok_a,$dok_b);   //gabungan
                    $irs_a=array_diff($dok_a,$dok_b);   //beda a
                    $irs_b=array_diff($dok_b,$dok_a);   //beda b
                    $da = array_merge($gb,$irs_a,$irs_b);
                    $sim_a = count($gb)/count($da)*100;
                    // echo ' <br>['.$dokumen[$i]->nama_file.']'.'['.$dokumen_relevansi[0]->nama_file.'] hasil similarity abstrak ';
                    // echo '<b>['.$i.']</b>';
                    // echo '<b>['.$a.']</b> :';
                    // echo $sim_a;
                    
                    $dok_a = unserialize($dokumen[$i]->pendahuluan);
                    $dok_b = unserialize($dokumen_relevansi[0]->pendahuluan);
                    $gb = array_intersect($dok_a,$dok_b);   //gabungan
                    $irs_a=array_diff($dok_a,$dok_b);   //beda a
                    $irs_b=array_diff($dok_b,$dok_a);   //beda b
                    $da = array_merge($gb,$irs_a,$irs_b);
                    
                    $sim_p = count($gb)/count($da)*100;
                    // echo ' <br>['.$dokumen[$i]->nama_file.']'.'['.$dokumen_relevansi[0]->nama_file.'] hasil similarity pendahuluan ';
                    // echo '<b>['.$i.']</b>';
                    // echo '<b>['.$a.']</b> :';
                    // echo $sim_p;
                    
                    $dok_a = unserialize($dokumen[$i]->hasil);
                    $dok_b = unserialize($dokumen_relevansi[0]->hasil);
                    $gb = array_intersect($dok_a,$dok_b);   //gabungan
                    $irs_a=array_diff($dok_a,$dok_b);   //beda a
                    $irs_b=array_diff($dok_b,$dok_a);   //beda b
                    $da = array_merge($gb,$irs_a,$irs_b);
                    // var_dump($dok_a);
                    $sim_h = count($gb)/count($da)*100;
                    // echo ' <br>['.$dokumen[$i]->nama_file.']'.'['.$dokumen_relevansi[0]->nama_file.'] hasil similarity hasil ';
                    // echo '<b>['.$i.']</b>';
                    // echo '<b>['.$a.']</b> :';
                    // echo $sim_h;
                    // echo '<hr><hr>:'; 
                  
                    
                    $dok_a = unserialize($dokumen[$i]->kata_kunci);
                    $dok_b = unserialize($dokumen_relevansi[0]->kata_kunci);
                    $gb = array_intersect($dok_a,$dok_b);   //gabungan
                    $irs_a=array_diff($dok_a,$dok_b);   //beda a
                    $irs_b=array_diff($dok_b,$dok_a);   //beda b
                    $da = array_merge($gb,$irs_a,$irs_b);
                    $sim_k = count($gb)/count($da)*100;
                    // echo ' <br>['.$dokumen[$i]->nama_file.']'.'['.$dokumen_relevansi[0]->nama_file.'] hasil similarity kata kunci ';
                    // echo '<b>['.$i.']</b>';
                    // echo '<b>['.$a.']</b> :';
                    // echo $sim_k;
                    // echo '<hr><hr>:';
                    // echo ' <hr> kata kunci cari';
                    // var_dump($dok_b);
                    // echo ' <hr> dokumen ';
                    // var_dump($dok_a);
                    // echo ' <hr> hasil array yang sama ';
                    // $gb = array_intersect($dok_a,$dok_b); 
                    // var_dump($gb);
                    // echo '<hr>';
                    

                    // echo '<hr> hasil rata_rata <hr>';
                    // echo ($sim_j+$sim_a+$sim_p+$sim_h+$sim_k)/5;
                    // echo '<hr>';   
                    $rata_sim [] = [($sim_j+$sim_a+$sim_p+$sim_h+$sim_k)/5];
                    $arr_doc [] = substr($d_b,0,200).'..... === ' .substr($d_a,0,200).'.....';
                    $arr_name_doc_a [] =  $dokumen[$i]->nama_file;
                    $arr_name_doc_b [] = $dokumen_relevansi[0]->nama_file;

                    $c = []; //creteria 
                    array_push($c,$sim_j);
                    array_push($c,$sim_a);
                    array_push($c,$sim_p);
                    array_push($c,$sim_h); 
                    array_push($c,$sim_k);
                // var_dump($c);
                $res_c = []; //hasil createria
                $nomer = 1;
                for ($s=0; $s < count($c); $s++) { 
                    // echo $s.'<br>';
                    $arr[] = $c[$s];
                    if ($nomer == 5) {
                        // echo '<br>';
                        $res_c [] = $arr;
                        $arr = [];
                        $nomer = 0;
                        
                    }
                
                    $nomer += 1;   
                }
               
                // echo 'C1 <br>';
                array_push($c1,$res_c[0][0]);
                // echo 'C2 <br>';  
                array_push($c2,$res_c[0][1]);
                // echo 'C3 <br>'; 
                array_push($c3,$res_c[0][2]);
                // echo 'C4 <br>';
                array_push($c4,$res_c[0][3]);
                // $no = 0;
                array_push($c5,$res_c[0][4]);
                // $no = 0;
        
                // }
            // }
        } 

            // var_dump($c1); //judul
            // var_dump($c2); //abstrak
            // var_dump($c3); //pendahuluan
            // var_dump($c4); //hasil
            // var_dump($c5); //katakunci
        $count_data = count($c1);
       
        //======================  SAW  =======================
        $result = []; $result2 = []; $result3 = []; $result4 = [];$result5 = [];
        $weigth = [0.10, 0.275, 0.175, 0.20, 0.25];
            //judul, 
        $R = [];
            // $R1 = [];
            // $R2 = [];
            // $R3 = [];
            // $R4 = [];
        //tes
            // $weigth = [0.35, 0.25, 0.25, 0.15];
            // $c1 =[70,50,85,82,75,62];
            // $c2 =[50,60,55,70,75,50];
            // $c3 =[80,82,80,65,85,75];
            // $c4 =[60,70,75,85,74,80];
        //
        // var_dump($c1);
        // die();
        if($count_data > 5){
            // echo '<br>C1 <br>';
            // echo '<br>';
            //C1[judul]
            $sort = $c1;
            rsort($sort);
            if (!in_array($sort[0],$result,true)) {
                $result [] = $sort[0];
              
            } 
            
            foreach($c1 as $res){
                // echo '<hr>';
                // echo $res.'judul/'.$result[0];
                // echo ' [hasil : '.$res/$result[0].']';
                array_push($R,$res/$result[0]); 
                // echo '<hr>';
            }
      
            // echo '<br>C2 <br>';
            // echo '<br>';
            //C2[abstrak]
            $sort2 = $c2;
            rsort($sort2);
            if (!in_array($sort2[0],$result2,true)) {
                $result2 [] = $sort2[0];
            
            }  
           
            foreach($c2 as $res){
                // echo $res.' [abstrak] /'.$result2[0];
                // echo ' [hasil : '.$res/$result2[0].']';
            array_push($R,$res/$result2[0]); 
                // echo '<br>';
            }
            
            // echo '<br>C3 <br>';
            // echo '<br>';
            //C3[pendahuluan]
            $sort3 = $c3;
            rsort($sort3);
            if (!in_array($sort3[0],$result3,true)) {
                $result3 [] = $sort3[0];
            }   
            foreach($c3 as $res){
                // echo $res.'pendahuluan/'.$result3[0];
                // echo ' [hasil : '.$res/$result3[0].']';
            array_push($R,$res/$result3[0]); 
                // echo '<br>';
            }
      
            // echo '<br>C4 <br>';
            // echo '<br>';
        //C4[hasil]
        $sort4 = $c4;
         rsort($sort4);
        if (!in_array($sort4[0],$result4,true)) {
            $result4 [] = $sort4[0];
          
        }   
        foreach($c4 as $res){
            // echo $res.'hasil/'.$result4[0];
            // echo ' [hasil : '.$res/$result4[0].']';
          array_push($R,$res/$result4[0]); 
            // echo '<br>';
        }

        // echo '<br>C5 <br>';
        // echo '<br>';
        
        $sort5 = $c5;
         rsort($sort5);
        if (!in_array($sort5[0],$result5,true)) {
            $result5 [] = $sort5[0];
          
        }   
       
        if ($result5[0] == 0) {
            // return back()->with('error', 'Document Not Found!');
        }
        foreach($c5 as $res){
            // echo $res.'kata kunci/'.$result5[0];
            // echo ' [hasil : '.$res/$result5[0].']';
          array_push($R,$res/$result5[0]); 
            // echo '<br>';
        }
        
        }else{
            // return back()->with('error', 'minimal upload file 7!');
        
        }
        
        // echo '=========================================';
        // var_dump($R);
        $res_r = []; //hasil createria
            
                $n = 1;
                for ($s=0; $s < count($R); $s++) { 
                    // echo '<br>'.$s.'<br>';
                    $arr[] = $R[$s];
                    if ($n == $count_data) {
                        // echo '<br>';
                        $res_r [] = $arr;
                        $arr = [];
                        $n = 0;
                        
                    }
                
                    $n += 1;   
                }
                // var_dump($res_r);
                // echo '<br>';
                $arr_c1 = [];
                $arr_c2 = [];
                $arr_c3 = [];
                $arr_c4 = []; 
                $arr_c5 = [];
                $c = 0;
                foreach($res_r as $data){
                    $c++;
                    // echo '<br> C'.$c++.' ';
                    // echo '[A1]'.$data[0];
                        // echo '[A2]'.$data[1];
                        // echo '[A3]'.$data[2];
                        // echo '[A4]'.$data[3];
                        // echo '[A5]'.$data[4];
                        // echo '[A6]'.$data[5];
                    // var_dump($data[0]);
                    
                    for ($i=0; $i < count($data); $i++) { 
                        
                        // echo '<br>';
                        // echo '[A'.$i.']'.$data[$i];
                        // echo '<br>';
                       if($c == 1){
                        // echo '=='.$c judul.'==';
                        // echo '[A'.$i.']'.$weigth[0].'*'.$data[$i];
                        // echo ' = [HASIL] :'.$weigth[0]*$data[$i];
                        $res1 = $weigth[0]*$data[$i];
                        $arr_c1 []= $res1;
                       }elseif($c == 2){
                        // echo '=='.$c.'==';
                        // echo '[A'.$i.']'.$weigth[1].'*'.$data[$i];
                        // echo ' = [HASIL] :'.$weigth[1]*$data[$i];
                        $res2 =$weigth[1]*$data[$i];
                        $arr_c2 []= $res2;
                       }elseif($c == 3){
                        // echo '=='.$c.'==';
                        // echo '[A'.$i.']'.$weigth[2].'*'.$data[$i];
                        // echo ' = [HASIL] :'.$weigth[2]*$data[$i];
                        $res3 = $weigth[2]*$data[$i];
                        $arr_c3 []= $res3;
                       }elseif($c == 4){
                        // echo '=='.$c.'==';
                        // echo '[A'.$i.']'.$weigth[3].'*'.$data[$i];
                        // echo ' = [HASIL] :'.$weigth[3]*$data[$i];
                        $res4 = $weigth[3]*$data[$i];
                        $arr_c4 []= $res4;
                       }elseif($c == 5){
                        // echo '=='.$c.'==';
                        // echo '[A'.$i.']'.$weigth[3].'*'.$data[$i];
                        // echo ' = [HASIL] :'.$weigth[3]*$data[$i];
                        $res5 = $weigth[4]*$data[$i];
                        $arr_c5 []= $res5;
                       }
                       
                         // echo '['.$dt.']';
                        // $arr_c []= $dt;
                    }
                    // echo '<hr>';
                }
                
                $resul_v = [];
                for ($ca=0; $ca < $count_data; $ca++) { 
                   $v = $arr_c1[$ca]+$arr_c2[$ca]+$arr_c3[$ca]+$arr_c4[$ca]+$arr_c5[$ca];
                   $resul_v [] = round($v,4);
                //    echo '<br>';
                //    echo '[ data '.$ca.' ]'.$v;
                //    echo '<br>';
                }

                //tanpa SAW
              
            //     $jmb_dat = count($rata_sim);
            //   $jm=0;
            //     for ($i=0; $i < $jmb_dat; $i++) { 
            //         $jm += $rata_sim[$i][0];
            //     }
               
            //     $rata =  $jm/$jmb_dat;
            //     $xrata = 0;
            //     // echo $rata;
            //     for ($i=0; $i <$jmb_dat ; $i++) { 
            //         $xrata +=pow($rata_sim[$i][0]-$rata,2);
            //     }
            //     $resss = [];
            //     $hhh = $xrata/($jmb_dat-1)*0.75+$rata;
            //     // echo($hhh);
            //     // $hhh = $xrata/($jmb_dat);
            //     // $as = sqrt($hhh);
            //     // echo($xrata/39*0.75);
            //     for ($i=0; $i <$jmb_dat ; $i++) { 
            //         if($hhh < $rata_sim[$i][0]){
            //             $resss []=[$rata_sim[$i][0]];
            //         }
            //     }

                $jmb_dat = count($resul_v);
                $sum = array_sum($resul_v);
                $rata =  $sum/$jmb_dat;
                $xrata = 0;
                for ($i=0; $i <$jmb_dat ; $i++) { 
                    $xrata +=pow($resul_v[$i]-$rata,2);
                    
                }
                $resss = [];
                $hhh = ($xrata/($jmb_dat-1))*0.75+$rata;
                for ($i=0; $i <$jmb_dat ; $i++) { 
                    if($hhh < $resul_v[$i]){
                        $resss []=[$resul_v[$i]];
                    }
                }
                // echo 'jumlah data = '.count($resss).'<br> bobot standar = '.$hhh;
                // var_dump($resul_v);

        return view('result_document',['dokumen'=> $arr_doc,'rata'=> $rata_sim,'hasil_dokumen'=> $resul_v,'doc_a'=> $arr_name_doc_a,'doc_b'=> $arr_name_doc_b]);              

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cari(Request $request)
    {
        $stoplist_indonesia = array("ajak", "akan", "beliau", "khan", "lah", "dong", "ahh", "sob", "elo", "so", "kena", "kenapa", "yang", "dan", "tidak", "agak", "kata", "bilang", "sejak", "kagak", "cukup", "jua", "cuma", "hanya", "karena", "oleh", "lain", "setiap", "untuk", "dari", "dapat", "dapet", "sudah", "udah", "selesai", "punya", "belum", "boleh", "gue", "gua", "aku", "kamu", "dia", "mereka", "kami", "kita", "jika", "bila", "kalo", "kalau", "dalam", "nya", "atau", "seperti", "mungkin", "sering", "kerap", "acap", "harus", "banyak", "doang", "kemudian", "nyala", "mati", "milik", "juga", "mau", "dimana", "apa", "kapan", "kemana", "selama", "siapa", "mengapa", "dengan", "kalian", "bakal", "bakalan", "tentang", "setelah", "hadap", "semua", "hampir", "antara", "sebuah", "apapun", "sebagai", "di", "tapi", "lainnya", "bagaimana", "namun", "tetapi", "biar", "pun", "itu", "ini", "suka", "paling", "mari", "ayo", "barangkali", "mudah", "kali", "sangat", "banget", "disana", "disini", "terlalu", "lalu", "terus", "trus", "sungguh", "telah", "mana", "apanya", "ada", "adanya", "adalah", "adapun", "agaknya", "agar", "akankah", "akhirnya", "akulah", "amat", "amatlah", "anda", "andalah", "antar", "diantaranya", "antaranya", "diantara", "apaan", "apabila", "apakah", "apalagi", "apatah", "ataukah", "ataupun", "bagai", "bagaikan", "sebagainya", "bagaimanapun", "sebagaimana", "bagaimanakah", "bagi", "bahkan", "bahwa", "bahwasanya", "sebaliknya", "sebanyak", "beberapa", "seberapa", "begini", "beginian", "beginikah", "beginilah", "sebegini", "begitu", "begitukah", "begitulah", "begitupun", "sebegitu", "belumlah", "sebelum", "sebelumnya", "sebenarnya", "berapa", "berapakah", "berapalah", "berapapun", "betulkah", "sebetulnya", "biasa", "biasanya", "bilakah", "bisa", "bisakah", "sebisanya", "bolehkah", "bolehlah", "buat", "bukan", "bukankah", "bukanlah", "bukannya", "percuma", "dahulu", "daripada", "dekat", "demi", "demikian", "demikianlah", "sedemikian", "depan", "dialah", "dini", "diri", "dirinya", "terdiri", "dulu", "enggak", "enggaknya", "entah", "entahlah", "terhadap", "terhadapnya", "hal", "hanyalah", "haruslah", "harusnya", "seharusnya", "hendak", "hendaklah", "hendaknya", "hingga", "sehingga", "ia", "ialah", "ibarat", "ingin", "inginkah", "inginkan", "inikah", "inilah", "itukah", "itulah", "jangan", "jangankan", "janganlah", "jikalau", "justru", "kala", "kalaulah", "kalaupun", "kamilah", "kamulah", "kan", "kau", "kapankah", "kapanpun", "dikarenakan", "karenanya", "ke", "kecil", "kepada", "kepadanya", "ketika", "seketika", "khususnya", "kini", "kinilah", "kiranya", "sekiranya", "kitalah", "kok", "lagi", "lagian", "selagi", "melainkan", "selaku", "melalui", "lama", "lamanya", "selamanya", "lebih", "terlebih", "bermacam", "macam", "semacam", "maka", "makanya", "makin", "malah", "malahan", "mampu", "mampukah", "manakala", "manalagi", "masih", "masihkah", "semasih", "masing", "maupun", "semaunya", "memang", "merekalah", "meski", "meskipun", "semula", "mungkinkah", "nah", "nanti", "nantinya", "nyaris", "olehnya", "seorang", "seseorang", "pada", "padanya", "padahal", "sepanjang", "pantas", "sepantasnya", "sepantasnyalah", "para", "pasti", "pastilah", "per", "pernah", "pula", "merupakan", "rupanya", "serupa", "saat", "saatnya", "sesaat", "aja", "saja", "sajalah", "saling", "bersama", "sama", "sesama", "sambil", "sampai", "sana", "sangatlah", "saya", "sayalah", "se", "sebab", "sebabnya", "tersebut", "tersebutlah", "sedang", "sedangkan", "sedikit", "sedikitnya", "segala", "segalanya", "segera", "sesegera", "sejenak", "sekali", "sekalian", "sekalipun", "sesekali", "sekaligus", "sekarang", "sekitar", "sekitarnya", "sela", "selain", "selalu", "seluruh", "seluruhnya", "semakin", "sementara", "sempat", "semuanya", "sendiri", "sendirinya", "seolah", "sepertinya", "seringnya", "serta", "siapakah", "siapapun", "disinilah", "sini", "sinilah", "sesuatu", "sesuatunya", "suatu", "sesudah", "sesudahnya", "sudahkah", "sudahlah", "supaya", "tadi", "tadinya", "tak", "tanpa", "tentu", "tentulah", "tertentu", "seterusnya", "tiap", "setidaknya", "tidakkah", "tidaklah", "toh", "waduh", "wah", "wahai", "sewaktu", "walau", "walaupun", "wong", "yaitu", "yakni");
       
        $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
            $stemmer  = $stemmerFactory->createStemmer();
            $arr_cari = [];
            $c1 = [];$c2 = [];$c3 = [];$c4 = [];$c5 = [];
            // $c1 =[70,50,85,82,75,62];
            // $c2 =[50,60,55,70,75,50];
            // $c3 =[80,82,80,65,85,75];
            // $c4 =[60,70,75,85,74,80];

    $b = 2;                                        //basis (bilangan prima)
        // $all = [];
        $n = 8; //gram
        // $request->gram;    //gram
            $send = preg_replace('/[^A-Za-z0-9\-]/', ' ', $request->cari);
			$string = preg_replace("/[^A-Za-z]/", " ", $send);
			$kata = $string;
            $output   = $stemmer->stem($kata);
            $explode = explode(' ',$output); 	
        $result_stoplist = array_diff($explode,$stoplist_indonesia);
            foreach($result_stoplist as $val){
                array_push($arr_cari,$val);
            }
               $word = implode("",$arr_cari);
                // var_dump($word);
               $ngrams = array(); 
               $len = strlen($word);
               for($i = 0; $i < $len; $i++) {   
                       if($i > ($n - 2)) {
                               $ng = '';
                               for($j = $n-1; $j >= 0; $j--) {
                                       $ng .= $word[$i-$j];
                                       
                               }
                               $ngrams[] = $ng;
                       }
                }
                //  var_dump($ngrams);
                $k = $n;
                foreach($ngrams as $gram){
                    // echo $gram;
                    $all[] = $this->index($gram,$k,$b); 
$n = 7;                                         //window setting
   
                }
               
    
     
            // var_dump($all);
//Cari buka;
               
                
                if(strlen($word) < $n){
                    return redirect('dashboard')->with('error','kata kunci kurang panjang...!');
                    // echo '<div class="btn-info"><b>Alert!</b> minimal query 5 character!</div>';
    
                }
                $cont = count($all);
                
                $alll = [];
                $arr = [];
                $arr_all = array(); 
                $len = count($all);
                // var_dump($all);
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
               
                // $hash = new hash();
                $arr_has = [];
                for($a=0; $a < count($arr_all); $a++){  //pecah character
                    $split = explode('|',$arr_all[$a]);
                        for($i=0; $i < $n; $i++){
                            if($split[$i] != ""){
                                $arr_has [] = $split[$i];
                            }
                        }  
                }
                // var_dump($arr_has);  
                    $cont = count($arr_has);
                    $nomer = 1;
                    // echo '<hr>';
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
// var_dump($alll);
// die();

                    // echo '<hr>';
                    foreach($alll as $r){   //nilai window terkecil
                        
                        sort($r);
                        // var_dump($r).'<br>';
                        if (!in_array($r[0],$result,true)) {
                            $result [] = $r[0];
                          
                        }   
                       
                    }
                    //  var_dump($result);
                    //  die();
                     // echo "<br>";
                   $arr_cari= $result;
                   $arr_doc = [];
                   $arr_name_doc = [];
                   $id_dokumen = [];
                   $all = [];
                   $rata_sim = [];

                   $dokumen = DB::table('hash') 
                   ->join('file', 'hash.id_file', '=', 'file.id_file')
->where('file.gram',8)                                           //where gram
->where('file.window',7)

                   ->get(['hash.id_hash','hash.judul','hash.kata_kunci','hash.abstrak','hash.pendahuluan','hash.hasil','file.nama_file','file.file_judul','file.id_file']);
                    // var_dump($dokumen);
                   // $hash->gethash($result,$value,$ket);
                //    echo '<br>';echo '<br>';echo '<br>';echo '<br>';
                $ang = 1;
                   for ($i=0; $i < count($dokumen); $i++) { 
                       
                        $d_a = $dokumen[$i]->file_judul;
                    
                        $dok_a_j = unserialize($dokumen[$i]->judul);
                        
                        // echo 'No : ['.$ang++.']';
                        // var_dump($arr_cari);
                        $cari_dok = $arr_cari;
                        // echo ' <hr>';
                        // var_dump($arr_cari);
                        // echo ' <hr>';
                        // var_dump($dok_a_j);
                        // echo ' <hr>';
                        $gb = array_intersect($dok_a_j,$arr_cari); 
                        // var_dump($gb);
                        $gb = array_intersect($dok_a_j,$cari_dok);   //gabungan yang sama
                        $irs_a=array_diff($dok_a_j,$cari_dok);   //beda a
                        $irs_b=array_diff($cari_dok,$dok_a_j);   //beda b
                        $da = array_merge($gb,$irs_a,$irs_b);                       
                        $sim_j = count($gb)/count($da)*100;
                        // $sim_j = round($sim_j,4);
                        // echo ' <br>['.$dokumen[$i]->nama_file.']'.'[ query : '.$request->cari.'] hasil similarity judul <br>';
                        // echo '<br>query<br>';
                        // var_dump($cari_dok);
                        // echo '<br><br>'; 
                        // echo '<br>document<br>';
                        // var_dump($dok_a_j);
                        // echo '<br><br>';
                        // echo '<hr>['.$dokumen[$i]->nama_file.'judul'.']<hr>';
                        // echo $sim_j;

                        
        
                        $dok_a_a = unserialize($dokumen[$i]->abstrak);
                        $cari_dok = $arr_cari;
                       
                        $gb = array_intersect($dok_a_a,$cari_dok);   //gabungan
                        $irs_a=array_diff($dok_a_a,$cari_dok);   //beda a
                        $irs_b=array_diff($cari_dok,$dok_a_a);   //beda b
                         $da = array_merge($gb,$irs_a,$irs_b);
                        $sim_a = count($gb)/count($da)*100;
                        // echo ' <br>['.$dokumen[$i]->nama_file.']'.'[ query : '.$request->cari.'] hasil similarity abstrak <br>';
                        // echo '<hr>['.$dokumen[$i]->nama_file.'abstrak'.']<hr>';
                        // echo $sim_a;
                        
                        $dok_a_p = unserialize($dokumen[$i]->pendahuluan);
                        $cari_dok = $arr_cari;
                        // echo ' <hr>';
                        // // var_dump($arr_cari);
                        // echo ' <hr>';
                        // var_dump($dok_a_p);
                        // echo ' <hr>';
                        $gb = array_intersect($dok_a_p,$arr_cari); 
                        // var_dump($gb);
                        // die();
                        $gb = array_intersect($dok_a_p,$cari_dok);   //gabungan
                        $irs_a=array_diff($dok_a_p,$cari_dok);   //beda a
                        $irs_b=array_diff($cari_dok,$dok_a_p);   //beda b
                         $da = array_merge($gb,$irs_a,$irs_b);
                        $sim_p = count($gb)/count($da)*100;
                        
                        // echo ' <br>['.$dokumen[$i]->nama_file.']'.'[ query : '.$request->cari.'] hasil similarity pendahuluan <br>';
                        // echo '<hr>['.$dokumen[$i]->nama_file.'pendahuluan'.']<hr>';
                        // echo $sim_p;
                        

                        $dok_a_h = unserialize($dokumen[$i]->hasil);
                        $cari_dok = $arr_cari;
                        // echo ' <hr>';
                        // var_dump($arr_cari);
                        // echo ' <hr>';
                        // var_dump($dok_a_h);
                        // echo ' <hr>';
                        // $gb = array_intersect($dok_a_h,$arr_cari); 
                        // var_dump($gb);
                       
                        $gb = array_intersect($dok_a_h,$cari_dok);   //gabungan
                        $irs_a=array_diff($dok_a_h,$cari_dok);   //beda a
                        $irs_b=array_diff($cari_dok,$dok_a_h);   //beda b
                         $da = array_merge($gb,$irs_a,$irs_b);
                        $sim_h = count($gb)/count($da)*100;
                        // echo ' <br>['.$dokumen[$i]->nama_file.']'.'[ query : '.$request->cari.'] hasil similarity hasil <br>';
                        // echo '<hr>['.$dokumen[$i]->nama_file.'hasil'.']<hr>';
                        // echo $sim_h;
                        // echo '<br>'; 
                        
                        // $dok_a_h = unserialize($dokumen[$i]->kata_kunci);
                        // $cari_dok = $arr_cari;
                        // echo ' <hr> kata kunci cari';
                        // var_dump($arr_cari);
                        // echo ' <hr> dokumen ';
                        // var_dump($dok_a_h);
                        // echo ' <hr>  array yang sama';
                        $gb = array_intersect($dok_a_h,$arr_cari); 
                        // var_dump($gb);
                        // echo '<hr>';
                       
                        
                        $gb = array_intersect($dok_a_h,$arr_cari); 
                       
                        $gb = array_intersect($dok_a_h,$cari_dok);   //gabungan
                        $irs_a=array_diff($dok_a_h,$cari_dok);   //beda a
                        $irs_b=array_diff($cari_dok,$dok_a_h);   //beda b
                         $da = array_merge($gb,$irs_a,$irs_b);
                        $sim_k = count($gb)/count($da)*100;
                        // echo ' <br>['.$dokumen[$i]->nama_file.']'.'[ query : '.$request->cari.'] hasil similarity kata kunci <br>';
                    //    echo '<hr>['.$dokumen[$i]->nama_file.'kata kunci'.']<hr>';
                        // echo $sim_k;
                        // echo '<hr> array yang sama';
                        // echo '<hr>';
                        //  var_dump($gb);
                        // echo '<hr>';

                        // echo '<hr> hasil rata_rata <hr>';
                        $rata_sim [] = [($sim_j+$sim_a+$sim_p+$sim_h+$sim_k)/5];
                        // echo '<hr>'; 
                       
                    $arr_doc [] = '['.$d_a.']';
                    $arr_name_doc [] = $dokumen[$i]->nama_file;
                    $id_dokumen [] = $dokumen[$i]->id_file;

                    $c = []; //creteria 
                    array_push($c,$sim_j);
                    array_push($c,$sim_a);
                    array_push($c,$sim_p);
                    array_push($c,$sim_h);   
                    array_push($c,$sim_k);   

                    // var_dump(count($c));
                    // var_dump($sim_j); var_dump($sim_a);var_dump($sim_p);var_dump($sim_h); var_dump($sim_k);     
                   
                    $res_c = []; //hasil createria
                    $nomer = 1;
                    for ($s=0; $s < count($c); $s++) { 
                        // echo $c[$s].'<br>';
                        $temp[] = $c[$s];
                        // var_dump($temp);
                        if ($nomer == 5) {
                            // echo '<br>';
                            $res_c [] = $temp;
                            $temp = [];
                            
                            $nomer = 0;
                            
                        }
                        // var_dump($res_c);
                        $nomer += 1;   
                    }
                   
                    // echo 'C1 <br>';
                    // var_dump($res_c[0][4]);
                    array_push($c1,$res_c[0][0]);
                    // echo 'C2 <br>';  
                    array_push($c2,$res_c[0][1]);
                    // echo 'C3 <br>'; 
                    array_push($c3,$res_c[0][2]);
                    // echo 'C4 <br>';
                    array_push($c4,$res_c[0][3]);
                    // $no = 0; 
                    array_push($c5,$res_c[0][4]);
                    // $no = 0;             
                }

                    // echo 'Rangking<br>';
                    // var_dump($c1); 
                    // // echo '<br>';
                    // var_dump($c2);
                    // // echo '<br>';
                    //  var_dump($c3); 
                    // //  echo '<br>';
                    //  var_dump($c5);

                $count_data = count($c1);

                 //======================  SAW  =======================
        $result = []; $result2 = []; $result3 = []; $result4 = []; $result5 = [];
        $weigth = [0.10, 0.275, 0.175, 0.20, 0.25];
        // $weigth = [0.05, 0.35, 0.3, 0.20, 0.1];
        $R = [];
            // $R1 = [];
            // $R2 = [];
            // $R3 = [];
            // $R4 = [];
           
            //tes
            // $weigth = [0.35, 0.25, 0.25, 0.15];
           
            //
    if($count_data >= 4){
            // echo '<br>C1 <br>';
            // echo '<br>';
            //C1[judul]
            $sort = $c1;
            rsort($sort);
            if (!in_array($sort[0],$result,true)) {
                $result [] = $sort[0];
              
            } 
            // var_dump($c5);
            foreach($c1 as $res){
               
                if($res == "0.00" && $result[0] == "0.00"){
                    array_push($R,$res); 
                }else{
                    array_push($R,$res/$result[0]); 
                }
                // echo $res.'/'.$result[0];
                // echo ' [hasil : '.$res/$result[0].']';
               
                // echo '<br>';
            }
      
            // echo '<br>C2 <br>';
            // echo '<br>';
            //C2[abstrak]
            $sort2 = $c2;
            rsort($sort2);
            if (!in_array($sort2[0],$result2,true)) {
                $result2 [] = $sort2[0];
            
            }  
           
            foreach($c2 as $res){
                // echo $res.'/'.$result2[0];
                // echo ' [hasil : '.$res/$result2[0].']';
                 // var_dump($result[0]);
                 if($res == "0.00" && $result2[0] == "0.00"){
                    array_push($R,$res); 
                }else{
                    array_push($R,$res/$result2[0]);
                } 
                // echo '<br>';
            }
            
            // echo '<br>C3 <br>';
            // echo '<br>';
            //C3[pendahuluan]
            $sort3 = $c3;
            rsort($sort3);
            if (!in_array($sort3[0],$result3,true)) {
                $result3 [] = $sort3[0];
            }   
            foreach($c3 as $res){
                // echo $res.'/'.$result3[0];
                // echo ' [hasil : '.$res/$result3[0].']';
                if($res == "0.00" && $result3[0] == "0.00"){
                    array_push($R,$res); 
                }else{

                    array_push($R,$res/$result3[0]); 
                }
                // echo '<br>';
            }
            // var_dump($R);
            // echo '<br>C4 <br>';
            // echo '<br>';
            //C4[hasil]
            $sort4 = $c4;
            rsort($sort4);
            if (!in_array($sort4[0],$result4,true)) {
                $result4 [] = $sort4[0];
            
            }   
            foreach($c4 as $res){
                // echo $res.'/'.$result4[0];
                // echo ' [hasil : '.$res/$result4[0].']';
                if($res == "0.00" && $result4[0] == "0.00"){
                    array_push($R,$res); 
                }else{
                    array_push($R,$res/$result4[0]); 
                }
                // echo '<br>';
            }

                $sort5 = $c5;
                rsort($sort5);
            if (!in_array($sort5[0],$result5,true)) {
            $result5 [] = $sort5[0];
            
            }   

            foreach($c5 as $res){
                // echo $res.'/'.$result4[0];
                // echo ' [hasil : '.$res/$result4[0].']';
                if($res == "0.00" && $result5[0] == "0.00"){
                    array_push($R,$res); 
                }else{
                    array_push($R,$res/$result5[0]); 
                }
                // echo '<br>';
            }
            // var_dump($R);       
    }else{
        // return redirect('dashboard')->with('status', 'minimal upload file 4!');;
       
    }
        
        // echo '=========================================';
        $res_r = []; //hasil createria
            
                $n = 1;
                for ($s=0; $s < count($R); $s++) { 
                    // echo '<br>'.$s.'<br>';
                    $temp[] = $R[$s];
                    if ($n == $count_data) {
                        // echo '<br>';
                        $res_r [] = $temp;
                        $temp = [];
                        $n = 0;
                        
                    }
                
                    $n += 1;   
                }

                // echo '<br>';
            
                $arr_c1 = [];
                $arr_c2 = [];
                $arr_c3 = [];
                $arr_c4 = [];
                $arr_c5 = [];
                $c = 0;
                // var_dump($res_r);
                foreach($res_r as $data){
                    $c++;
                        // echo '<br> C'.$c++.' ';
                        // echo '[A1]'.$data[0];
                        // echo '[A2]'.$data[1];
                        // echo '[A3]'.$data[2];
                        // echo '[A4]'.$data[3];
                        // echo '[A5]'.$data[4];
                        // echo '[A6]'.$data[5];
                        // var_dump($data);
                    
                    for ($i=0; $i < count($data); $i++) { 
                        
                        // echo '<br>';
                        // echo '[A'.$i.']'.$data[$i];
                        // echo '<br>';
                       if($c == 1){
                        // echo '=='.$c.'==';
                        // echo '[A'.$i.']'.$weigth[0].'*'.$data[$i];
                        // echo ' = [HASIL] :'.$weigth[0]*$data[$i];
                        $res1 = $weigth[0]*$data[$i];
                        $arr_c1 []= $res1;
                       }elseif($c == 2){
                        // echo '=='.$c.'==';
                        // echo '[A'.$i.']'.$weigth[1].'*'.$data[$i];
                        // echo ' = [HASIL] :'.$weigth[1]*$data[$i];
                        $res2 =$weigth[1]*$data[$i];
                        $arr_c2 []= $res2;
                       }elseif($c == 3){
                        // echo '=='.$c.'==';
                        // echo '[A'.$i.']'.$weigth[2].'*'.$data[$i];
                        // echo ' = [HASIL] :'.$weigth[2]*$data[$i];
                        $res3 = $weigth[2]*$data[$i];
                        $arr_c3 []= $res3;
                       }elseif($c == 4){
                        // echo '=='.$c.'==';
                        // echo '[A'.$i.']'.$weigth[3].'*'.$data[$i];
                        // echo ' = [HASIL] :'.$weigth[3]*$data[$i];
                        $res4 = $weigth[3]*$data[$i];
                        $arr_c4 []= $res4;
                       }elseif($c == 5){
                        // echo '=='.$c.'==';
                        // echo '[A'.$i.']'.$weigth[3].'*'.$data[$i];
                        // echo ' = [HASIL] :'.$weigth[3]*$data[$i];
                        $res5 = $weigth[4]*$data[$i];
                        $arr_c5 []= $res5;
                       }
                       
                         // echo '['.$dt.']';
                        // $arr_c []= $dt;
                    }
                        // echo '<br>';
                }
                $resul_v= [];
                for ($ca=0; $ca < $count_data; $ca++) { 
                   $v = $arr_c1[$ca]+$arr_c2[$ca]+$arr_c3[$ca]+$arr_c4[$ca]+$arr_c5[$ca];
                   $resul_v [] =  round($v,4);
                    //    echo '<br>';
                    //    echo '[ data '.$ca.' ]'.$v;
                    //    echo '<br>';
                }
                // var_dump($resul_v);
                //tanpa SAW
              
                $jmb_dat = count($rata_sim);
              $jm=0;
                for ($i=0; $i < $jmb_dat; $i++) { 
                    $jm += $rata_sim[$i][0];
                }
               
                $rata =  $jm/$jmb_dat;
                $xrata = 0;
                // echo $rata;
                for ($i=0; $i <$jmb_dat ; $i++) { 
                    $xrata +=pow($rata_sim[$i][0]-$rata,2);
                    // $xrata +=($rata_sim[$i][0]);
                    
                }
                $resss = [];
                $hhh = $xrata/($jmb_dat-1)*0.75+$rata;
                // $hhh = $xrata/($jmb_dat);
                for ($i=0; $i <$jmb_dat ; $i++) { 
                    if($hhh < $rata_sim[$i][0]){
                        $resss []=[$rata_sim[$i][0]];
                    }
                }
                // <!-- echo 'jumlah data = '.count($resss).'<br> bobot standar = '.$hhh; -->
                

                //+saw
                $jmb_dat = count($resul_v);
                // dd($jmb_dat);
                $sum = array_sum($resul_v);
             
                $rata =  $sum/$jmb_dat;
                $xrata = 0;
               
                for ($i=0; $i <$jmb_dat ; $i++) { 
                    $xrata +=pow($resul_v[$i]-$rata,2);
                    // $xrata +=($resul_v[$i]);
                    
                }
                // dd($xrata);
                $resss = [];
                $hhh = $xrata/($jmb_dat-1)*0.75+$rata;
                // $hhh = $xrata/($jmb_dat);
                for ($i=0; $i <$jmb_dat ; $i++) { 
                    if($hhh < $resul_v[$i]){
                        $resss []=[$resul_v[$i]];
                    }
                }
                // echo 'jumlah data = '.count($resss).'<br> bobot standar = '.$hhh;
                // var_dump($rata_sim);
                   $kons = array_sum($resul_v);
                    if ($kons != 0) {
                        return view('result_cari',['dokumen_id'=> $id_dokumen,'dokumen'=> $arr_doc,'nama_dokumen'=> $arr_name_doc,'hasil_dokumen'=> $resul_v,'rata'=> $rata_sim,'query'=>$request->cari]);  
                    }
                
                return redirect('dashboard')->with('error', 'Hasil Query Tidak Ditemukan!');
      
// tutup;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
