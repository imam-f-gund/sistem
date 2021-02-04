<?php 
require_once __DIR__ . '/vendor/autoload.php';
include 'koneksi.php';
include 'ngram.php';


// $parser = new \Smalot\PdfParser\Parser();



$connect = mysqli_connect('localhost', 'root', '', 'winnowing');

$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
$stemmer  = $stemmerFactory->createStemmer();

	$stoplist_english = array('i', 'me', 'my', 'myself', 'we', 'our', 'ours', 'ourselves', 'you', "you're", "you've", "you'll", "you'd", 'your', 'yours', 'yourself', 'yourselves', 'he', 'him', 'his', 'himself', 'she', "she's", 'her', 'hers', 'herself', 'it', "it's", 'its', 'itself', 'they', 'them', 'their', 'theirs', 'themselves', 'what', 'which', 'who', 'whom', 'this', 'that', "that'll", 'these', 'those', 'am', 'is', 'are', 'was', 'were', 'be', 'been', 'being', 'have', 'has', 'had', 'having', 'do', 'does', 'did', 'doing', 'a', 'an', 'the', 'and', 'but', 'if', 'or', 'because', 'as', 'until', 'while', 'of', 'at', 'by', 'for', 'with', 'about', 'against', 'between', 'into', 'through', 'during', 'before', 'after', 'above', 'below', 'to', 'from', 'up', 'down', 'in', 'out', 'on', 'off', 'over', 'under', 'again', 'further', 'then', 'once', 'here', 'there', 'when', 'where', 'why', 'how', 'all', 'any', 'both', 'each', 'few', 'more', 'most', 'other', 'some', 'such', 'no', 'nor', 'not', 'only', 'own', 'same', 'so', 'than', 'too', 'very', 's', 't', 'can', 'will', 'just', 'don', "don't", 'should', "should've", 'now', 'd', 'll', 'm', 'o', 're', 've', 'y', 'ain', 'aren', "aren't", 'couldn', "couldn't", 'didn', "didn't", 'doesn', "doesn't", 'hadn', "hadn't", 'hasn', "hasn't", 'haven', "haven't", 'isn', "isn't", 'ma', 'mightn', "mightn't", 'mustn', "mustn't", 'needn', "needn't", 'shan', "shan't", 'shouldn', "shouldn't", 'wasn', "wasn't", 'weren', "weren't", 'won', "won't", 'wouldn', "wouldn't");

	$stoplist_indonesia = array("ajak", "akan", "beliau", "khan", "lah", "dong", "ahh", "sob", "elo", "so", "kena", "kenapa", "yang", "dan", "tidak", "agak", "kata", "bilang", "sejak", "kagak", "cukup", "jua", "cuma", "hanya", "karena", "oleh", "lain", "setiap", "untuk", "dari", "dapat", "dapet", "sudah", "udah", "selesai", "punya", "belum", "boleh", "gue", "gua", "aku", "kamu", "dia", "mereka", "kami", "kita", "jika", "bila", "kalo", "kalau", "dalam", "nya", "atau", "seperti", "mungkin", "sering", "kerap", "acap", "harus", "banyak", "doang", "kemudian", "nyala", "mati", "milik", "juga", "mau", "dimana", "apa", "kapan", "kemana", "selama", "siapa", "mengapa", "dengan", "kalian", "bakal", "bakalan", "tentang", "setelah", "hadap", "semua", "hampir", "antara", "sebuah", "apapun", "sebagai", "di", "tapi", "lainnya", "bagaimana", "namun", "tetapi", "biar", "pun", "itu", "ini", "suka", "paling", "mari", "ayo", "barangkali", "mudah", "kali", "sangat", "banget", "disana", "disini", "terlalu", "lalu", "terus", "trus", "sungguh", "telah", "mana", "apanya", "ada", "adanya", "adalah", "adapun", "agaknya", "agar", "akankah", "akhirnya", "akulah", "amat", "amatlah", "anda", "andalah", "antar", "diantaranya", "antaranya", "diantara", "apaan", "apabila", "apakah", "apalagi", "apatah", "ataukah", "ataupun", "bagai", "bagaikan", "sebagainya", "bagaimanapun", "sebagaimana", "bagaimanakah", "bagi", "bahkan", "bahwa", "bahwasanya", "sebaliknya", "sebanyak", "beberapa", "seberapa", "begini", "beginian", "beginikah", "beginilah", "sebegini", "begitu", "begitukah", "begitulah", "begitupun", "sebegitu", "belumlah", "sebelum", "sebelumnya", "sebenarnya", "berapa", "berapakah", "berapalah", "berapapun", "betulkah", "sebetulnya", "biasa", "biasanya", "bilakah", "bisa", "bisakah", "sebisanya", "bolehkah", "bolehlah", "buat", "bukan", "bukankah", "bukanlah", "bukannya", "percuma", "dahulu", "daripada", "dekat", "demi", "demikian", "demikianlah", "sedemikian", "depan", "dialah", "dini", "diri", "dirinya", "terdiri", "dulu", "enggak", "enggaknya", "entah", "entahlah", "terhadap", "terhadapnya", "hal", "hanyalah", "haruslah", "harusnya", "seharusnya", "hendak", "hendaklah", "hendaknya", "hingga", "sehingga", "ia", "ialah", "ibarat", "ingin", "inginkah", "inginkan", "inikah", "inilah", "itukah", "itulah", "jangan", "jangankan", "janganlah", "jikalau", "justru", "kala", "kalaulah", "kalaupun", "kamilah", "kamulah", "kan", "kau", "kapankah", "kapanpun", "dikarenakan", "karenanya", "ke", "kecil", "kepada", "kepadanya", "ketika", "seketika", "khususnya", "kini", "kinilah", "kiranya", "sekiranya", "kitalah", "kok", "lagi", "lagian", "selagi", "melainkan", "selaku", "melalui", "lama", "lamanya", "selamanya", "lebih", "terlebih", "bermacam", "macam", "semacam", "maka", "makanya", "makin", "malah", "malahan", "mampu", "mampukah", "manakala", "manalagi", "masih", "masihkah", "semasih", "masing", "maupun", "semaunya", "memang", "merekalah", "meski", "meskipun", "semula", "mungkinkah", "nah", "nanti", "nantinya", "nyaris", "olehnya", "seorang", "seseorang", "pada", "padanya", "padahal", "sepanjang", "pantas", "sepantasnya", "sepantasnyalah", "para", "pasti", "pastilah", "per", "pernah", "pula", "merupakan", "rupanya", "serupa", "saat", "saatnya", "sesaat", "aja", "saja", "sajalah", "saling", "bersama", "sama", "sesama", "sambil", "sampai", "sana", "sangatlah", "saya", "sayalah", "se", "sebab", "sebabnya", "tersebut", "tersebutlah", "sedang", "sedangkan", "sedikit", "sedikitnya", "segala", "segalanya", "segera", "sesegera", "sejenak", "sekali", "sekalian", "sekalipun", "sesekali", "sekaligus", "sekarang", "sekitar", "sekitarnya", "sela", "selain", "selalu", "seluruh", "seluruhnya", "semakin", "sementara", "sempat", "semuanya", "sendiri", "sendirinya", "seolah", "sepertinya", "seringnya", "serta", "siapakah", "siapapun", "disinilah", "sini", "sinilah", "sesuatu", "sesuatunya", "suatu", "sesudah", "sesudahnya", "sudahkah", "sudahlah", "supaya", "tadi", "tadinya", "tak", "tanpa", "tentu", "tentulah", "tertentu", "seterusnya", "tiap", "setidaknya", "tidakkah", "tidaklah", "toh", "waduh", "wah", "wahai", "sewaktu", "walau", "walaupun", "wong", "yaitu", "yakni");
	
	$id = $_COOKIE['id'];
	
	$sql = "SELECT * FROM file WHERE id_file=$id";
	$result = $connect->query($sql);
	
	$row = $result->fetch_assoc();
	$name_file = $row["nama_file"];
	// echo $name_file;
	
//Scrapping
	$source_pdf="jurnal/$name_file"; 

	$output_folder="MyFolder/jurnal"; 
 
	if (!file_exists($output_folder)) {  
		mkdir($output_folder, 0777, true); 
	} 
	
	$a= passthru("pdftohtml $source_pdf $output_folder/$name_file",$b); 
	
	$date = date("Y-m-d");
	$arr_judul = [];
	$arr_abstrak = [];
	$arr_pendahuluan = [];
	$arr_metode = [];
	$arr_hasil = [];
	$s = 's';
	// $status = '';
	$myfile = fopen("MyFolder/jurnal/$name_file$s.html" ,"r") or error($name_file);

	$text = strtolower(fread($myfile,filesize("MyFolder/jurnal/$name_file$s.html")));
		
	if ($text == null) {
			error($name_file);
			
	}
	
	$simbol = preg_replace('/[~]/', '', $text);
	$simbol1 = preg_replace('/[!]/', '', $simbol);
	$simbol2 = preg_replace('/[@]/', '', $simbol1);
	$simbol3 = preg_replace('/[.]/', ';', $simbol2);
	
	$total = strip_tags($simbol3);
	// var_dump($total);
	$hasil = strpos(strtolower($total),'kata kunci');
	if($hasil == NULL){
		$hasil = strpos(strtolower($total),'pendahuluan');
	}
	$hasil_key = strpos(strtolower($total),'keyword');
	if($hasil_key == NULL){
		$hasil_key = strpos(strtolower($total),'introduction');
	}
	$find_enter = strpos(strtolower($total),'<hr>');
	
	
// END Stemming

	if($hasil != null){ 									//deteksi bahasa indo
	//buka
		$intro = explode('pendahuluan',$total); 			// data pendahuluan
		$find_char = strpos(strtolower($intro[1]),'ii;');
		if($find_char != NULL){
			$split_introd = explode('ii;',$intro[1]);
			$send = preg_replace('/[^A-Za-z0-9\-]/', ' ', $split_introd[0]);
			$string = preg_replace("/[^A-Za-z]/", " ", $send);
			$sentence = $string;
			$output   = $stemmer->stem($sentence);
			$explode = explode(' ',$output);
			$result_stoplist = array_diff($explode,$stoplist_indonesia);
			foreach($result_stoplist as $val){
				array_push($arr_pendahuluan,$val);
			}
		}else{
			$split_introd = explode('2;',$intro[1]);
			$send = preg_replace('/[^A-Za-z0-9\-]/', ' ', $split_introd[0]);
			$string = preg_replace("/[^A-Za-z]/", " ", $send);
			$sentence = $string;
			$output   = $stemmer->stem($sentence);
				// echo $output . "\n";
			$explode = explode(' ',$output);
			$result_stoplist = array_diff($explode,$stoplist_indonesia);
			foreach($result_stoplist as $val){
				array_push($arr_pendahuluan,$val);
			}
				// echo '=== Pendahuluan ===<br>';
		}
			
		$method = explode('pendahuluan',$intro[1]);			// data kesimpulan
		$result_method = explode('daftar',$method[0]);
		$count_metthod = count($result_method);
		$arr_result = [];
		for ($i=0; $i < $count_metthod; $i++) { 
			$find_co = strpos(strtolower($result_method[$i++]),'kesimpulan');
			if($find_co != NULL){
				$find_co = strpos(strtolower($result_method[$i-1]),'kesimpulan');
				$reslt = $i-1;
				array_push($arr_result,$reslt);
			}if($find_co == NULL){
				$find_co = strpos(strtolower($result_method[$i-1]),'simpulan');
				$reslt = $i-1;
				array_push($arr_result,$reslt);
			}

			
		}
			$arr_result = array_unique($arr_result);
		
			$result = $arr_result[0];
			
			$find_method = strpos(strtolower($result_method[$result]),'kesimpulan');
			$split_method = explode('kesimpulan',$result_method[$result]);
		
			$count_counc = count($split_method);
			$value_result = $split_method[$count_counc-1]; 
			$send = preg_replace('/[^A-Za-z0-9\-]/', ' ', $value_result);
			$string = preg_replace("/[^A-Za-z]/", " ", $send);
			$sentence = $string;
			$output   = $stemmer->stem($sentence);
			$explode = explode(' ',$output);
			$result_stoplist = array_diff($explode,$stoplist_indonesia);
			
		foreach($result_stoplist as $val){
			array_push($arr_hasil,$val);
		}
	
		$find_abstrak = strpos(strtolower($intro[0]),'abstrak');
		$find_abstract = strpos(strtolower($intro[0]),'abstract');
		if($find_abstrak != NULL){
			$abstract = explode('abstrak',$intro[0]); 					// data abstract 
			$abstrak = explode('abstract',$abstract[1]); 
			$send = preg_replace('/[^A-Za-z0-9\-]/', ' ', $abstrak[0]);
			$string = preg_replace("/[^A-Za-z]/", " ", $send);
			$sentence = $string;
			$output   = $stemmer->stem($sentence);
			$explode = explode(' ',$output);
			$result_stoplist = array_diff($explode,$stoplist_indonesia);
			
		foreach($result_stoplist as $val){
				array_push($arr_abstrak,$val);
		}
			// echo '=== Abstract === <br>';


		$title = explode('abstrak',$intro[0]); 					//data judul
		$send = preg_replace('/[^A-Za-z0-9\-]/', ' ', $title[0]);
		$string = preg_replace("/[^A-Za-z]/", " ", $send);
		$sentence = $string;
		
		$file_judul = explode('email',$sentence); 	
		$judu_file = $file_judul[0];	//
			//cek kata kunci
		$find_kunci = strpos(strtolower($intro[0]),'abstract');
			if ($find_kunci != 0) {										//cek abstract
					$kata1 = explode('kunci',$title[1]); 
					$kata_res = explode('abstract',$kata1[1]);
					$keys = $kata_res[0];				

			}else{										//cek abstrak
					$kata1 = explode('kunci',$title[1]); 
					$kata_res = explode('abstrak',$kata1[1]);
					$keys = $kata_res[0];

			}
				
			$output   = $stemmer->stem($sentence);
			$output_k   = $stemmer->stem($keys);
			$explode = explode(' ',$output);
			$string_k = preg_replace("/[^A-Za-z]/", " ", $output_k);
			$explode_key = explode(' ',$string_k);
			$string_k = preg_replace("/[^A-Za-z]/", " ", $explode_key);
			$result_stoplist = array_diff($explode,$stoplist_indonesia);
			$result_stoplist_key = array_diff($string_k,$stoplist_indonesia);
			// var_dump($title);
		$arr_key = [];
		foreach($result_stoplist_key as $val){
			array_push($arr_key,$val);
		}
		foreach($result_stoplist as $val){
			array_push($arr_judul,$val);
		}
		// echo '=== Judul === <br>';
			
			$katakunci = explode('pendahuluan',$total);				//metode

		//add to db
		$s_judul = implode("",$arr_judul);
		$s_abstrak = implode("",$arr_abstrak);
		$s_pendahuluan = implode("",$arr_pendahuluan);
		$s_hasil = implode("",$arr_hasil);
		$s_key = implode("",$arr_key);

		$sql = "UPDATE file SET file_judul ='$judu_file',judul ='$s_judul',kata_kunci ='$s_key', abstrak ='$s_abstrak', pendahuluan = '$s_pendahuluan', metode ='metode', hasil ='$s_hasil', date ='$date'  WHERE file.id_file =$id"; 
	
		$word = new ngram();
		$j_text = $s_judul;
		$a_text = $s_abstrak;
		$p_text = $s_pendahuluan;
		$h_text = $s_hasil;
		$k_text = $s_key;
	//tutup stemming	
		if ($connect->query($sql) === TRUE) {
			
			$word->setNgrams($j_text,3,'judul',2,$id);		//kata,Ngram,jenis,B(basic),id_doc
			$word->setNgrams($a_text,3,'abstrak',2,$id);
			$word->setNgrams($p_text,3,'pendahuluan',2,$id);
			$word->setNgrams($h_text,3,'kesimpulan',2,$id);
			$word->setNgrams($k_text,3,'key',2,$id);
		
			$path = '../cobakpdf/MyFolder/jurnal';
			removeFiles($path);
		
		} else {
			// echo "Error: " . $sql . "<br>" . $connect->error;
		}

	}else{
			$img_path = "../cobakpdf/jurnal/";
			unlink($img_path.$name_file);
			$sql = "DELETE FROM file WHERE id_file=$id";

			if ($connect->query($sql) === TRUE) {
				echo '<script type="text/javascript">
					var r = alert("Error Abstract no detect");
				
			
					window.location.href = "http://localhost:8000/dashboard";
				
				</script>';
			} else {
				$a ="Error deleting record: " . $connect->error;
				echo '<script type="text/javascript">
					var r = alert("$a");
				
			
					window.location.href = "http://localhost:8000/dashboard";
				
				</script>';
			}

			$connect->close();
	}
		
	
	}
	// else if($hasil_key != null){ //deteksi bahasa inggris

	// 	$res_key = explode(' ',$total);

	// 	$intro = explode('introduction',$total); 			// data pendahuluan
	// 	$find_char = strpos(strtolower($intro[1]),'ii;');
	// 	if($find_char != NULL){
	// 		$split_introd = explode('ii;',$intro[1]);
	// 		$send = preg_replace('/[^A-Za-z0-9\-]/', ' ', $split_introd[0]);
	// 		$string = preg_replace("/[^A-Za-z]/", " ", $send);
	// 		$explode = explode(' ',$string);
	// 		$result_stoplist = array_diff($explode,$stoplist_english);
	// 		foreach($result_stoplist as $val){
	// 			// echo $val.'<br>';
	// 		}
	// 	}else{
	// 		$split_introd = explode('2;',$intro[1]);
	// 		$send = preg_replace('/[^A-Za-z0-9\-]/', ' ', $split_introd[0]);
	// 		$string = preg_replace("/[^A-Za-z]/", " ", $send);
	// 		$explode = explode(' ',$string);
	// 		//ecs
	// 		$ecs_stemm = $string;
			
	// 		$result_stoplist = array_diff($explode,$stoplist_english);
	// 		foreach($result_stoplist as $val){
	// 			// echo $val.'<br>';
	// 		}
			
	// 	}
		

	// 	$method = explode('introduction',$intro[1]);			// data kesimpulan
	// 	$result_method = explode('references',$method[0]);
	// 	$count_metthod = count($result_method);
	// 	$arr_result = [];
	// 	for ($i=0; $i < $count_metthod; $i++) { 
	// 		$find_co = strpos(strtolower($result_method[$i++]),'conclusions');
	// 		if($find_co != NULL){
	// 			// echo $i;
	// 			$find_co = strpos(strtolower($result_method[$i-1]),'conclusions');
	// 			$reslt = $i-1;
	// 			array_push($arr_result,$reslt);
	// 		}else {
	// 			$find_co = strpos(strtolower($result_method[$i-1]),'conclusion');
	// 			$reslt = $i-1;
	// 			array_push($arr_result,$reslt);
	// 		}
	// 	}
	// 	$arr_result = array_unique($arr_result);
	// 	$result = $arr_result[0];
			
	// 		$find_method = strpos(strtolower($result_method[$result]),'conclusions');
	// 		$split_method = explode('conclusions',$result_method[$result]);
	// 	if($find_method == NULL){
	// 			$split_method =explode('conclusion',$result_method[$result]);
	// 			$find_method = strpos(strtolower($result_method[$result]),'conclusion');	
	// 	}
	// 		$count_counc = count($split_method);
	// 		$value_result = $split_method[$count_counc-1]; 
	// 		$send = preg_replace('/[^A-Za-z0-9\-]/', ' ', $value_result);
	// 		$string = preg_replace("/[^A-Za-z]/", " ", $send);
	// 		$explode = explode(' ',$string);
	// 		$result_stoplist = array_diff($explode,$stoplist_english);
			
	// 	foreach($result_stoplist as $val){
	// 			// echo $val.'<br>';
	// 	}

	// 	// var_dump($method);
	// 	// var_dump(explode('method',$method[0]));// method ?????
		
	// 	$find_abstract = strpos(strtolower($intro[0]),'abstract');
	// 	if($find_abstract != NULL){
	// 		$abstract = explode('abstract',$intro[0]); 					// data abstract
	// 		$send = preg_replace('/[^A-Za-z0-9\-]/', ' ', $abstract[1]);
	// 		$string = preg_replace("/[^A-Za-z]/", " ", $send);
	// 		$explode = explode(' ',$string);
	// 		$result_stoplist = array_diff($explode,$stoplist_english);
		
	// 	foreach($result_stoplist as $val){
	// 		//  echo $val.'<br>';
	// 	}


	// 		$title = explode('abstract',$intro[0]); 					//data judul
	// 		$send = preg_replace('/[^A-Za-z0-9\-]/', ' ', $title[0]);
	// 		$string = preg_replace("/[^A-Za-z]/", " ", $send);
	// 		$explode = explode(' ',$string);
	// 		$result_stoplist = array_diff($explode,$stoplist_english);
		
	// 	foreach($result_stoplist as $val){
	// 		//  echo $val.'<br>';
	// 	}
	
	// 	}else{
	// 		echo 'data abstract not found';
			
	// 	}

	// }
	else{
		$img_path = "../cobakpdf/jurnal/";
		// .$name_file;
		// var_dump($img_path);
		// die();
		// File::delete($img_path);
		unlink($img_path.$name_file);
		// unlink('files/'.$file); 
		$sql = "DELETE FROM file WHERE id_file=$id";
		if ($connect->query($sql) === TRUE) {		
			echo '<script type="text/javascript">
				var r = alert("Error Jurnal no detect");
				
			
					window.location.href = "http://localhost:8000/dashboard";
				
				</script>';
				
		} else {
			echo "Error deleting record: " . $connect->error;
		}
		// echo'no detection jurnal';
				
	}
	//echo fread($myfile,filesize("MyFolder/new_file_names.html"));
	fclose($myfile);

	function error($name){

		
		$connect = mysqli_connect('localhost', 'root', '', 'winnowing');
		$img_path = "../cobakpdf/jurnal/";
		// .$name_file;
		// var_dump($img_path);
		// die();
		// File::delete($img_path);
		unlink($img_path.$name);
		// unlink('files/'.$file); 
		$sql = "DELETE FROM file WHERE id_file=$id";
		if ($connect->query($sql) === TRUE) {		
			echo '<script type="text/javascript">
				var r = alert("Error Jurnal no detect");
				
			
					window.location.href = "http://localhost:8000/dashboard";
				
				</script>';
				
		}else {
			echo "Error deleting record: " . $connect->error;
		}
		
	}

	function removeFiles($target) {

		if(is_dir($target)){
	
			$files = glob( $target . '*', GLOB_MARK );
	
	  
	
			foreach( $files as $file ){
	
				removeFiles( $file );      
	
			}
	
	  
	
			rmdir( $target );
			mkdir($target);
		} elseif(is_file($target)) {
	
			unlink( $target );  
	
		}
	
	}

	

//ECS
?>  		