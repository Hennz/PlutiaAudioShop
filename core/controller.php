<?php
	include 'core/database.php';
	include 'style/view.php';
	include 'core/class.phpmailer.php';
	include 'core/class.smtp.php';
	include 'core/class.pop3.php';
	class Config {
		public function __construct() {
			Database::connectDB("localhost", "root", "", "kupingkaleng");
			session_start();
		}
		public function title() {
			return "Plutia Audio Shop";
		}
		public function author() {
			return "Vitradisa Pratama - 49013110 - D4 TKJMD ITB";
		}
	}
	
	class DBAction {
		public function insert($tablename, $kolom, $isi) {
			return Database::insertDB($tablename, $kolom, $isi);
		}
		
		public function update($tablename,$updatedata,$namakolom,$isikolom) {
			return Database::updateDB($tablename,$updatedata,$namakolom,$isikolom);
		}
		
		public function delete($namatabel,$namakolom,$isikolom) {
			return Database::deleteDB($namatabel,$namakolom,$isikolom);
		}
		
		public function select($namatabel, $namakolom, $isikolom, $kolomyangdiambil) {
			return Database::selectDB($namatabel, $namakolom, $isikolom, $kolomyangdiambil);
		}
		
		public function selectArray($kolom) {
			return Database::selectArray($kolom);
		}
	}
	
	class Designer {
		public function head($title) {
			Style::head($title);
		}
		public function javascript() {
			Style::javascript();
		}
		public function navbar($namaweb,$linkweb,$menu1,$linkmenu1,$menu2,$linkmenu2,$menu3,$linkmenu3,$menu4,$linkmenu4) {
			Style::navbar($namaweb,$linkweb,$menu1,$linkmenu1,$menu2,$linkmenu2,$menu3,$linkmenu3,$menu4,$linkmenu4);
		}
		public function container($productname,$description,$price,$imageurl) {
			Style::container($productname,$description,$price,$imageurl);
		}
		public function containerMember($no,$productname,$description,$price,$imageurl) {
			Style::containerMember($no,$productname,$description,$price,$imageurl);
		}
		public function loginpage($title) {
			return Style::loginpage($title);
		}
		public function registerform($title) {
			return Style::registerform($title);
		}
		public function footer($author) {
			Style::footer($author);
		}
		public function catalog($caption,$link1,$image1,$link2,$image2,$link3,$image3) {
			Style::catalog($caption,$link1,$image1,$link2,$image2,$link3,$image3);
		}
		public function profile() {
			Style::profile();
		}
		public function item_input() {
			Style::item_input();
		}
		public function chat() {
			echo "<iframe src='http://irc.nyit-nyit.net/?channels=PlutiaAudioStore&uio=Mj10cnVlJjQ9dHJ1ZSY5PXRydWU06' width='1366' height='400'></iframe>";
		}
		public function forum() {
			echo " <div id='disqus_thread'></div>
				    <script type='text/javascript'>
				        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
				        var disqus_shortname = 'plutiaaudioshop'; // required: replace example with your forum shortname
				
				        /* * * DON'T EDIT BELOW THIS LINE * * */
				        (function() {
				            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
				            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
				            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
				        })();
				    </script>
				    <noscript>Please enable JavaScript to view the <a href='http://disqus.com/?ref_noscript'>comments powered by Disqus.</a></noscript>
				    <a href='http://disqus.com' class='dsq-brlink'>comments powered by <span class='logo-disqus'>Disqus</span></a>";
		}
		public function disclaimer() {
			echo "<center>Ini Bukan Website Jual BELI</center>";
			echo "<center>Website ini dibuat untuk tugas mata Kuliah TMD13 & TMD14</center>";
		}
	}
	
	class PageAccess {
		public function loginvalidation() {
			try {
				$username = $_POST['myusername'];
				$password = $_POST['mypassword'];
				$user1 = Database::selectDB("user", "username", $username, "username");
				$password1 = Database::selectDB("user", "password", $password, "password");
				if(($username == $user1) && ($password == $password1)) {
					$role = Database::selectDB("user", "username", $username, "role");
					$mail = Database::selectDB("user", "username", $username, "mail");
					$nama = Database::selectDB("user", "username", $username, "nama");
					$phone = Database::selectDB("user", "username", $username, "phone");
					$address = Database::selectDB("user", "username", $username, "address");
					$_SESSION['username'] = $username;
					$_SESSION['password'] = $password;
					$_SESSION['role'] = $role;
					$_SESSION['mail'] = $mail;
					$_SESSION['name'] = $nama;
					$_SESSION['phone'] = $phone;
					$_SESSION['address'] = $address;
					if($_SESSION['role'] == "1") {
						$url = "admin.php";	
					} else {
						$url = "member.php";
					}
				} else {
					throw new Exception("Login Failed");
				}
			} catch (Exception $e) {
				$url = "login.php";
				echo $e->getMessage();
			}
			return $url;
		}
		
		public function adminOnly() {
			if(isset($_SESSION['role']) != "1") {
				header("Location: index.php");
			}
		}
		
		public function memberOnly() {
			if(isset($_SESSION['role']) != "2") {
				header("Location: index.php");
			}
		}
		
		public function userSessionChecker() {
			if(isset($_SESSION['role'])) {
				switch($_SESSION['role']) {
					case 1:
						header("Location: admin.php");
						break;
					case 2:
						header("Location: member.php");
					default:
						break;
				}
			}
		}
		
		public function userChecker() {
			if(!((isset($_SESSION['role']) == "1")) || (!(isset($_SESSION['role']) == "2"))) {
				header("Location: index.php");
			}
		}
		
		public function logout() {
			session_destroy();
			header("Location: index.php");
		}
		
		public function register() {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$mail = $_POST['mail'];
			$nama = $_POST['name'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];
			$insertinto = "`username`,`password`,`role`,`mail`,`nama`,`phone`,`address`";
			$valueinsert = "'$username','$password','2','$mail','$nama','$phone','$address'";
			$insert = DBAction::insert("user", $insertinto, $valueinsert);
			return $insert;
		}
	}
	
	class Admin {
		public function inputItem() {
			$folder = "images/";
			$itemname	= $_POST["itemname"];
			$itemdesc = $_POST['desc'];
			$price = $_POST['price'];
			$credit = $_POST['credit'];
			$type = $_FILES['nama_file']['type'];
				
			if($type=="image/jpeg" || $type=="image/jpg" || $type=="image/gif" || $type=="image/x-png")
			{
				$image_dir = $folder.basename($_FILES['nama_file']['name']);
				if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $image_dir)) {
					$insertinto = "`namabarang`,`deskripsi`,`harga`,`cicilan`,`foto`";
					$valueinsert = "'$itemname','$itemdesc','$price','$credit','{$_FILES['nama_file']['name']}'";
					$insert = DBAction::insert("barang", $insertinto, $valueinsert);
				}	
			}
			return $insert;
		}
		
		public function payment_manager() {
			Style::payment_manager();
		}
		
		public function update_payment() {
			Style::update_payment();
		}
		
		public function update_data_payment() {
			$no	= $_POST['nomor2'];
			$namapemesan = $_POST['namapemesan'];
			$namaproduk	= $_POST['nama_produk'];
			$nominal_cicilan = $_POST['cicilan'];
			$sisacicilan = $_POST['sisa'];
			$status	= $_POST['status'];
			$konfirmasi	= $_POST['konfirmasi'];
			$updatedata	= "`credit` = '$sisacicilan',`status_credit` = '$status',`confirmation` = '$konfirmasi'";
			$rs = DBAction::update("order_user",$updatedata,"nomor",$no);
			return $rs;
		}
	}
	
	class Member {
		public function memberBuy() {
			Style::memberBuy();
		}
		
		public function orderCicilan() {
			$nama = $_POST['namapemesan'];
			$namaproduk	= $_POST['namaproduk'];
			$nominal_cicilan = $_POST['nominal_cicilan'];
			$sisacicilan = $_POST['sisa_cicilan'];
			$to = $_POST['email'];
			$insertinto = "`nama`, `items`, `dp`, `credit`, `status_credit`, `confirmation`";
			$valueinsert = "'$nama', '$namaproduk', '$nominal_cicilan', '$sisacicilan', 'Belum_Lunas', 'belum_konfirmasi'";
			$insertinto1 = "`nama`, `scan_confirmation`";
			$valueinsert1 = "'$nama', 'noimage.png'";
			$rs = DBAction::insert("order_user", $insertinto, $valueinsert);
			$rs2 = DBAction::insert("confirmation", $insertinto1, $valueinsert1);
			$nokredit = DBAction::select("order_user", "nama", $nama, "nomor");
			
			if((isset($rs)) && (isset($rs2))) {
				$mail = new PHPMailer();
				$mail->IsSMTP();
				$mail->SMTPDebug = false;
				$mail->Debugoutput = "html";
				$mail->Port = 465;
				$mail->SMTPAuth = true;
				$mail->SMTPSecure = "ssl";
				$mail->Host = "smtp.gmail.com";
				$mail->Username = "plutiaaudioshop@gmail.com";
				$mail->Password = "irisheart";
				$webmaster_email = "plutiaaudioshop@gmail.com";
				$email="$to";
				$name = "$nama";
				$mail->From = $webmaster_email;
				$mail->FromName = "Plutia Audio Shop";
				$mail->AddAddress($email,$name);
				$mail->AddReplyTo($webmaster_email, $mail->FromName);
				$mail->WordWrap = 100;
				$mail->IsHTML(true);
				$mail->Subject = "Konfirmasi Order Kredit";
				$mail->Body = "Hallo $nama <br/>berikut detail orderan kredit dari Plutia Audio Shop <br/>Pemesan: $nama <br/>Nomor Kredit: $nokredit <br/>Nama Produk: $namaproduk <br/>Nominal cicilan pertama anda Rp.$nominal_cicilan <br/>dengan sisa cicilan Rp.$sisacicilan";
				if(!$mail->Send())
				{
					$rs = "Error: " . $mail->ErrorInfo;
				} else {
					$rs = "Order Sukses, Cek Email anda sekarang";
				}
			}
			return $rs;
		}
		
		public function confirmCredit() {
			Style::confirmCredit();
		}
		
		public function confirmation() {
			$no = $_POST['No'];
			$namapemesan = $_POST['namapemesan'];
			$type = $_FILES['nama_file']['type'];
			$folder = "bukti/";
				
			if($type=="image/jpeg" || $type=="image/jpg" || $type=="image/gif" || $type=="image/x-png")
			{
				$image_dir = $folder.basename($_FILES['nama_file']['name']);
				if(move_uploaded_file($_FILES['nama_file']['tmp_name'], $image_dir)) {
					$files = $_FILES['nama_file']['name'];
					$updatedata	= "`scan_confirmation` = '{$files}'";
					$rs = DBAction::update("confirmation",$updatedata,"nomor",$no);
				}
			}
			return $rs;
		}
		
	}
?>