<?php

if(!$_POST) exit;

// Email address verification, do not edit.
function isEmail($email) {
	return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
}

$first_name     = $_POST['first_name'];
$last_name     = $_POST['last_name'];
$email    = $_POST['email'];
$phone   = $_POST['phone'];
$select_price   = $_POST['select_price'];
$select_service   = $_POST['select_service'];
$subject  = $_POST['first_name'];
$comments = $_POST['comments'];

if(trim($first_name) == '') {
	echo '<div class="error_message">Chú ý! Bạn phải nhập tên của bạn.</div>';
	exit();
} else if(trim($last_name) == '') {
	echo '<div class="error_message">Chú ý! Bạn phải nhập họ của bạn.</div>';
	exit();
} else if(trim($email) == '') {
	echo '<div class="error_message">Chú ý! Vui lòng nhập một địa chỉ email hợp lệ.</div>';
	exit();
} else if(!isEmail($email)) {
	echo '<div class="error_message">Chú ý! Bạn đã nhập một địa chỉ e-mail không hợp lệ, hãy thử lại.</div>';
	exit();
} else if(trim($phone) == '') {
	echo '<div class="error_message">Chú ý! Vui lòng nhập số điện thoại của bạn.</div>';
	exit();
} else if(trim($select_service) == '') {
	echo '<div class="error_message">Chú ý! Vui lòng chọn hình thức dịch vụ của bạn.</div>';
	exit();
} else if(trim($comments) == '') {
	echo '<div class="error_message">Chú ý! Vui lòng nhập tin nhắn của bạn.</div>';
	exit();
} 

if(trim($select_service) == 'beard_mustache_care') {
	$price=50000;
	$service_name='Chăm sóc râu, ria mép';
} else if(trim($select_service) == 'detailed_feather_cleaning') {
	$price=40000;
	$service_name='Làm sạch lông, chi tiết';
} else if(trim($select_service) == 'facial_and_skincare') {
	$price=40000;
	$service_name='Chăm sóc da mặt';
} else if(trim($select_service) == 'studio_shots') {
	$price=150000;
	$service_name='Ảnh chụp trong Studio';
} else if(trim($select_service) == 'forming_the_beard') {
	$price=70000;
	$service_name='Tạo hình râu';
} else if(trim($select_service) == 'hair_cut') {
	$price=80000;
	$service_name='Tạo kiểu tóc';
}

if(get_magic_quotes_gpc()) {
	$comments = stripslashes($comments);
}

	echo "<fieldset>";
	echo "<div id='success_page'>";
	echo "<h1 style='color: white;'>Email được gửi thành công.</h1>";
	echo $e_body = "SMBarber đã nhận được lịch hẹn của $first_name. Cảm ơn $first_name  đã chọn dịch vụ $service_name, với thời gian là $select_price <br/> Tin nhắn bổ sung của bạn như sau: " . PHP_EOL . PHP_EOL;
	echo $e_content = "\"$comments\"" . PHP_EOL . PHP_EOL;
	echo "<p>Chi phí dịch vụ của <strong>$first_name</strong> là <strong>$price</strong>.</p>";
	echo "<p>Cảm ơn <strong>$first_name</strong>, tin nhắn của bạn đã được gửi cho chúng tôi.</p>";
	echo "</div>";
	echo "</fieldset>";

	//khai báo biến host
	$hostName = 'localhost';
	// khai báo biến username
	$userName = 'root';
	//khai báo biến password
	$passWord = '';
	// khai báo biến databaseName
	$databaseName = 'baitapcuoiky';
	// khởi tạo kết nối
	$connect = mysqli_connect($hostName, $userName, $passWord, $databaseName);
	$sql = 'SELECT  id, ten, ho, email, sdt, thoigian, dichvu, loinhan FROM thongtinlienhe';
	$result = mysqli_query($connect,$sql);
	if(!$result)
	{
		exit('Không thể lấy dữ liệu ');
	}
		//load du lieu len web 
		$idDatabase=0;
		while($row = mysqli_fetch_assoc($result))
		{
			$idDatabase="{$row["id"]}";
			if($idDatabase=='')
			{
				break;
			}
		}
		$idASC=$idDatabase+1;
		$sql = "INSERT INTO thongtinlienhe(id, ten, ho, email, sdt, thoigian, dichvu, loinhan) values('{$idASC}',N'{$first_name}',N'{$last_name}',N'{$email}',N'{$phone}',N'{$select_price}',N'{$service_name}',N'{$comments}')";
				$result = mysqli_query($connect,$sql);
			if($result){
				echo '<h1 align="center">Lưu thông tin thành công.<h1>';
			}else{
				echo '<div align="center">Lưu thông tin thất bại.</div>';
			}
			mysqli_close($connect);
?>