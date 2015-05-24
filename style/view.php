<?php
Class Style {
	public function head($title) {
		echo "
			<meta charset='utf-8'>
    		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
    		<meta name='description' content=''>
    		<meta name='author' content=''>

    		<title>{$title}</title>

    		<!-- Bootstrap core CSS -->
    		<link href='style/css/bootstrap.css' rel='stylesheet'>

		    <!-- Custom CSS for the '3 Col Portfolio' Template -->
    		<link href='style/css/portfolio-item.css' rel='stylesheet'>";
		}
	
	public function javascript() {
		echo "<script src='style/js/jQuery.js'></script>  
    		 <script src='style/js/bootstrap.min.js'></script>";
	}

	public function navbar($namaweb,$linkweb,$menu1,$linkmenu1,$menu2,$linkmenu2,$menu3,$linkmenu3,$menu4,$linkmenu4) {
		echo "<nav class='navbar navbar-fixed-top navbar-inverse' role='navigation'>
		        <div class='container'>
		            <div class='navbar-header'>
		                <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-ex1-collapse'>
		                    <span class='sr-only'>Toggle navigation</span>
		                    <span class='icon-bar'></span>
		                    <span class='icon-bar'></span>
		                    <span class='icon-bar'></span>
		                </button>
		                <a class='navbar-brand' href='{$linkweb}'>{$namaweb}</a>
		            </div>
		
		            <!-- Collect the nav links, forms, and other content for toggling -->
		            <div class='collapse navbar-collapse navbar-ex1-collapse'>
		                <ul class='nav navbar-nav'>
		                    <li><a href='{$linkmenu1}'>{$menu1}</a>
		                    </li>
		                    <li><a href='{$linkmenu2}'>{$menu2}</a>
		                    </li>
		                    <li><a href='{$linkmenu3}'>{$menu3}</a>
		                    </li>
		                    <li><a href='{$linkmenu4}'>{$menu4}</a>
		                    </li>
		                </ul>
		            </div>
		            <!-- /.navbar-collapse -->
		        </div>
		        <!-- /.container -->
	    	  </nav>";
	}
	
	public function loginpage($title) {
		if((isset($_POST['myusername'])) && (isset($_POST['mypassword']))) {
			$url = PageAccess::loginvalidation();
			header("Location: $url");
		}
		echo "<div class='container'>

        <div class='row'>

            <div class='col-lg-12'>
                <h1 class='page-header'>{$title}
                    <small>Login Page</small>
                </h1>
            </div>

        </div>

        <div class='row'>
        <table width='300' border='0' align='right' cellpadding='0' cellspacing='1' bgcolor='#CCCCCC'>
		<tr>
		<form name='form1' method='post' action=''>
		<td>
		<table width='100%' border='0' cellpadding='3' cellspacing='1' bgcolor='#FFFFFF'>
		<tr>
		<td colspan='3'><strong>Member Login </strong></td>
		</tr>
		<tr>
		<td width='78'>Username</td>
		<td width='6'>:</td>
		<td width='294'><input name='myusername' type='text' id='myusername'></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		</tr>
		<tr>
		<td>Password</td>
		<td>:</td>
		<td><input name='mypassword' type='password' id='mypassword'></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		<td></td>
		<td><input type='submit' name='Submit' value='Login'></td>
		</tr>
		</table>
		</td>
		</form>
		</tr>
		</table>
        </div>

    </div>";
	}
	
	public function registerform($title) {
		if((isset($_POST["username"])) && (isset($_POST["password"])) && (isset($_POST["mail"])) && (isset($_POST["name"])) && (isset($_POST["address"])) && (isset($_POST["phone"]))) {
			echo PageAccess::register();
		}
		echo "<div class='container'>
	
		<div class='row'>
	
		<div class='col-lg-12'>
		<h1 class='page-header'>{$title}
		<small>Registration Form</small>
		</h1>
		</div>
	
		</div>
	
		<div class='row'>
		<table width='300' border='0' align='center' cellpadding='0' cellspacing='1' bgcolor='#CCCCCC'>
		<tr>
		<form name='form1' method='post' action=''>
		<td>
		<table width='100%' border='0' cellpadding='3' cellspacing='1' bgcolor='#FFFFFF'>
		<tr>
		<td colspan='3'><strong>Member Registration </strong></td>
		</tr>
		<tr>
		<td width='78'>Username</td>
		<td width='6'>:</td>
		<td width='294'><input name='username' type='text' id='username'></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		</tr>
		<tr>
		<td>Password</td>
		<td>:</td>
		<td><input name='password' type='text' id='password'></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		</tr>
		<tr>
		<td width='78'>e-mail</td>
		<td width='6'>:</td>
		<td width='294'><input name='mail' type='text' id='mail'></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		</tr>
		<tr>
		<td>Nama</td>
		<td>:</td>
		<td><input name='name' type='text' id='name'></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		</tr>
		<tr>
		<td width='78'>Alamat</td>
		<td width='6'>:</td>
		<td width='294'><input name='address' type='text' id='address'></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		</tr>
		<tr>
		<td>Phone</td>
		<td>:</td>
		<td><input name='phone' type='text' id='phone'></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><input type='submit' name='Submit' value='Register Now'></td>
		</tr>
		</table>
		</td>
		</form>
		</tr>
		</table>
		</div>
	
		</div>";
	}
	
	public function profile() {
		if($_SESSION['role'] == "1") {
			$level = "Administrator";
		} else if($_SESSION['role'] == "2") {
			$level = "Regular Member";
		}
				
		echo "<div class='container'>
		
		<div class='row'>
		
		<div class='col-lg-12'>
		<h1 class='page-header'>{$_SESSION['name']}
		<small>{$level}</small>
		</h1>
		</div>
		
		</div>
		
		<div class='row'>
		
		<div class='col-md-8'>
		<img class='img-responsive' src='images/administrator.jpg'>
		</div>
		
		<div class='col-md-4'>
		<h2>Profile Info</h2>
		<ul>
		<li>Name : {$_SESSION['name']}</li>
		<li>Mail : {$_SESSION['mail']}</li>
		<li>Phone : {$_SESSION['phone']}</li>
		<li>Address : {$_SESSION['address']}</li>
		</ul>
		</div>
		</div>";
		
	}
	
	public function item_input() {
		if((isset($_POST["itemname"])) && (isset($_POST["desc"])) && (isset($_POST["price"])) && (isset($_POST["credit"])) && (isset($_FILES['nama_file']['tmp_name']))) {
			echo Admin::inputItem();
		}
		echo "<div class='container'>
		
		<div class='row'>
		
		<div class='col-lg-12'>
		<h1 class='page-header'>Input Data
		<small>Barang</small>
		</h1>
		</div>
		
		</div>
		
		<div class='row'>
		<table width='300' border='0' align='center' cellpadding='0' cellspacing='1' bgcolor='#CCCCCC'>
		<tr>
		<form name='form1' method='post' action='' enctype='multipart/form-data'>
		<td>
		<table width='100%' border='0' cellpadding='3' cellspacing='1' bgcolor='#FFFFFF'>
		<tr>
		<td colspan='3'><strong>Item Registration </strong></td>
		</tr>
		<tr>
		<td width='78'>Item Name</td>
		<td width='6'>:</td>
		<td width='294'><input name='itemname' type='text' id='itemname'></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		</tr>
		<tr>
		<td>Description</td>
		<td>:</td>
		<td><input name='desc' type='text' id='desc'></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		</tr>
		<tr>
		<td width='78'>Price</td>
		<td width='6'>:</td>
		<td width='294'><input name='price' type='text' id='price'></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		</tr>
		<tr>
		<td>Credits</td>
		<td>:</td>
		<td><input name='credit' type='text' id='credit'></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		</tr>
		<tr>
		<td width='78'>Photo</td>
		<td width='6'>:</td>
		<td width='294'><input name='nama_file' type='file' id='nama_file' size='30' /></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td><input type='submit' name='Submit' value='Submit Now'></td>
		</tr>
		</table>
		</td>
		</form>
		</tr>
		</table>
		</div>
		
		</div>";
	}
	
	public function payment_manager() {
		$rs = mysql_query("SELECT * FROM order_user");
		echo "<div class='container'>
	
		<div class='row'>
	
		<div class='col-lg-12'>
		<h1 class='page-header'>Manage Data
		<small>Cicilan</small>
		</h1>
		</div>
	
		</div>
	
		<div class='row'>
		<table border='2' cellpadding='0' cellspacing='0'>
		<tr> 
		<th width=''>ID Kredit</th>
		<th width=''>Nama Kredit</th>
		<th width=''>Nama Produk</th>
		<th width=''>Cicilan Pertama</th>
		<th width=''>Sisa Cicilan</th>
		<th width=''>Status Kredit</th>
		<th width=''>Konfirmasi</th>
		<th width=''>?</th>";
		while($data = mysql_fetch_array($rs))
		{
		$row=$data[0];
		echo "<tr>";
		echo"<td width=''><p>$data[0]</p></td>";
		echo"<td width=''><p>$data[1]</p></td>";
		echo"<td width=''><p>$data[2]</p></td>";
		echo"<td width=''><p>$data[3]</p></td>";
		echo"<td width=''><p>$data[4]</p></td>";
		echo"<td width=''><p>$data[5]</p></td>";
		echo"<td width=''><p>$data[6]</p></td>";
		echo"<td width=''><a href=update_data.php?No=$row><font color='#000000'>Konfirmasi</font></a>";
		echo"</tr>";
		}
		echo "
		</table>		
		</div>
	
		</div>";
	}
	
	public function update_payment() {
		if(isset($_POST['nomor2']) && (isset($_POST['namapemesan'])) && (isset($_POST['nama_produk'])) && (isset($_POST['cicilan'])) && (isset($_POST['sisa'])) && (isset($_POST['status'])) && (isset($_POST['konfirmasi']))) {
			echo Admin::update_data_payment();
		}
		
		$no=$_GET['No'];
		$perintah="SELECT * FROM `order_user` WHERE nomor='$no'";
		$perintah2="SELECT * FROM `confirmation` WHERE nomor='$no'";
		
		$query=mysql_query($perintah);
		$query2=mysql_query($perintah2);
		
		while($data = mysql_fetch_array($query))
		{
				$no2=$data[0];
				$nama=$data[1];
				$namaproduk=$data[2];
				$cicilan=$data[3];
				$sisa=$data[4];
				$status=$data[5];
				$konfirmasi=$data[6];
		}
		
		while($data2 = mysql_fetch_array($query2))
		{
				$no2=$data2[0];
				$nama_pemesan=$data2[1];
				$gambar=$data2[2];
		}
		if(!$gambar) {
			$gambar="noimage.png";
		}
		echo "<div class='container'>
		
		<div class='row'>
		
		<div class='col-lg-12'>
		<h1 class='page-header'>Manage Data
		<small>Cicilan</small>
		</h1>
		</div>
		
		</div>
		
		<div class='row'>
		<div class='col-lg-8'>
		<form name='frm' method='POST' action='' enctype='multipart/form-data'>
		<table>
		<tr>
				<td>ID Order Kredit</td>
				<td><input type='text' name='nomor' value='$no2'></td>
				<td></td>
			</tr>
				<td>Nama</td>
				<td><input type='text' name='nama_pemesan' value='$nama_pemesan'></td>
				<td></td>
			</tr>
			<tr>
				<td>Bukti Pembayaran</td>
				<td><p><img src='bukti/{$gambar}' width='500'/></p>
				</td>
				<td></td>
			</tr>
		</table>
		</div>
		
		<div class='col-lg-4'>
		<table>
			<tr>
				<td>ID Order Kredit</td>
				<td><input type='text' name='nomor2' value='$no2'></td>
				<td></td>
			</tr>
				<td>Nama</td>
				<td><input type='text' name='namapemesan' value='$nama' ></td>
				<td></td>
			</tr>
			<tr>
				<td>Nama Produk</td>
				<td width='154'><input name='nama_produk' value='$namaproduk' ></td>
					<td></td>
			</tr>
			<tr>
				<td>Cicilan Pertama </td>
				<td width='154'><input name='cicilan' value='$cicilan' ></td>
					<td></td>
			</tr>
			<tr>
				<td>Sisa cicilan</td>
				<td width='154'><input name='sisa' value='$sisa' ></td>
					<td></td>
			</tr>
			<tr>
				<td>Status Kredit</td>
				<td><select name='status' id='status'>
				  <option>'$status'</option>
					  <option value='lunas'>lunas</option>
					  <option value='belum lunas'>belum lunas</option>
					</select>
			</tr>
			<tr>
				<td>Konfirmasi</td>
				<td><select name='konfirmasi' id='konfirmasi'>
				 <option>'$konfirmasi'</option>
					  <option value='sudah konfirmasi'>sudah konfirmasi</option>
					  <option value='belum konfirmasi'>belum konfirmasi</option>
					</select>
			</tr>
		</table>
		</div>
		
		<br>
		<input type=hidden name=idkredit value='$no'>
		<input type=submit name='submit' value='Simpan Perubahan'>
		</div>
		
		</div>";
	}
	
	public function container($productname,$description,$price,$imageurl) {
		echo "<div class='container'>
	
		<div class='row'>
	
			<div class='col-lg-12'>
			<h1 class='page-header'>HOT DEAL
			<small>Get it now!</small>
			</h1>
			</div>
	
		</div>
	
		<div class='row'>
	
			<div class='col-md-8'>
			<img class='img-responsive' src='images/{$imageurl}'>
			</div>
	
			<div class='col-md-4'>
			<h2>{$productname}</h2>
			{$description}
			<h2>Price</h2>
			Rp {$price},00
		
			</div>
	
		</div>
	
		";
	}
	
	public function containerMember($no,$productname,$description,$price,$imageurl) {
		echo "<div class='container'>
	
		<div class='row'>
	
		<div class='col-lg-12'>
		<h1 class='page-header'>
		<small></small>
		</h1>
		</div>
	
		</div>
	
		<div class='row'>
	
		<div class='col-md-8'>
		<img class='img-responsive' src='images/{$imageurl}'>
		</div>
	
		<div class='col-md-4'>
		<h2>{$productname}</h2>
		{$description}
		<h2>Price</h2>
		Rp {$price},00
		<br/>
		<br/>
		<br/>
		<a href='buy.php?No=$no' ><img src='images/label_black_buy.png' /></a>
		</div>
	
		</div>
	
		";
	}
	
	public function memberBuy() {
		if((isset($_POST['namapemesan'])) && (isset($_POST['namaproduk'])) && (isset($_POST['nominal_cicilan'])) && (isset($_POST['sisa_cicilan']))) {
			echo Member::orderCicilan();
		}
		
		$id=$_GET['No'];
		$nama1=$_SESSION['username'];
		
		$perintah="SELECT * FROM barang WHERE idbarang='$id'";
		$perintah2="SELECT * FROM user WHERE username='$nama1'";
		
		$query=mysql_query($perintah);
		$query2=mysql_query($perintah2);
		
		
		while($data = mysql_fetch_array($query))
		{
			$id=$data[0];
			$namaproduk=$data[1];
			$harga=$data[3];
			$gambar=$data[5];
		
		}
		
		while($data2 = mysql_fetch_array($query2))
		{
		
			$nama=$data2[4];
			$email=$data2[3];
			$notelpon=$data2[5];
			$alamat=$data2[6];
		}
		echo "<form name='frm' method='POST' action='' enctype='multipart/form-data'>
				<div class='container'>
	
				<div class='row'>
			
				<div class='col-lg-12'>
				<h1 class='page-header'>DETAIL PRODUK
				<small></small>
				</h1>
				</div>
			
				</div>
			
				<div class='row'>
			
				<div class='col-md-8'>
				
				<table width='' >
					<tr>
					<tr>
						<td>No Transaksi</td>
						<td><input type='text' name='no' value='$id'></td>
						<td></td>
					</tr>
					<tr>
						<td>Nama Produk</td>
						<td><input type='text' name='namaproduk' value='$namaproduk'></td>
						<td></td>
					</tr>
					<tr>
						<td>Harga</td>
						<td width='154'><input name='harga' value='$harga' ></td>
							<td></td>
					</tr>
					<tr>
						<td>Gambar</td>
						<td>
						<p><img src='images/{$gambar}' width='500'/></p>
						</td>
					</tr>
				</table>
				</div>
				
				<div class='col-md-4'>
				<table width='' >
				<p><strong>Form Order Pengiriman {$_SESSION['name']}</strong></p>
					<tr>
						<td>Nama</td>
						<td><input type='text' name='nama' value='$nama'></td>
						<td></td>
					</tr>
						<td>Email</td>
						<td><input type='text' name='email' value='$email' ></td>
						<td></td>
					</tr>
					<tr>
						<td>No Telpon</td>
						<td width='154'><input name='notelpon' value='$notelpon' ></td>
							<td></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td width='154'><input name='alamat' value='$alamat' ></td>
							<td></td>
					</tr>
				</table>
				
				<table width='' >
				<br />
				<br />
				
				<p><strong>Form Order Nominal Cicilan {$_SESSION['name']}</strong></p>
					<tr>
						<tr>
						<td>Nama Pemesan</td>
						<td><input type='text' name='namapemesan' value='$nama'></td>
						<td></td>
					</tr>
					<tr>
						<tr>
						<td>Nama Produk</td>
						<td><input type='text' name='namaproduk' value='$namaproduk'></td>
						<td></td>
					</tr>
					<tr>
						<td>Total Harga</td>
						<td><input type='text' name='nama' value='$harga'></td>
						<td></td>
					</tr>
					<tr>
						<td>Nominal cicilan pertama</td>
						<td><select name='nominal_cicilan' id='nominal_cicilan'>
						 <option value='0'>Pilih jumlah cicilan Pertama</option>
							  <option value='100000'>100000</option>
							  <option value='500000'>500000</option>
							</select>
						   </td>
					</tr>
					
					<tr>
						<td>Sisa Cicilan</td>
						<td><input type='text' name='sisa_cicilan'></td>
						<td></td>
					</tr>
				</table>
				
				
				<input type=submit name='submit' value='Order'>
				<br>
				</div>
				</div>";
	}
	
	public function confirmCredit() {
		if((isset($_POST['No'])) && (isset($_POST['namapemesan'])) && (isset($_FILES['nama_file']['tmp_name']))) {
			echo Member::confirmation();
		}
		echo "<form name='frm' method='POST' action='' enctype='multipart/form-data'>
		<div class='container'>
	
		<div class='row'>
			
		<div class='col-lg-12'>
		<h1 class='page-header'>Konfirmasi
		<small>Pembayaran</small>
		</h1>
		</div>
			
		</div>
			
		<div class='row'>
			
		<div class='col-md-8'>
		<table>
			<tr>
			<tr>
				<td>Masukan ID Order Kredit</td>
				<td><input type='text' name='No'></td>
				<td></td>
			<tr>
				<td>Nama</td>
				<td width='154'><input name='namapemesan' value='{$_SESSION['name']}'></td>
					<td></td>
			</tr>
			<tr>
				<td>Gambar</td>
				<td>
				    <input name='nama_file' type='file' id='nama_file' size='30' />
				</td>
				<td></td>
			</tr>
		</table>
		
		<input type='submit' name='simpan' value='Simpan'>
		</div>
		</div>";
	}
	
	public function catalog($caption,$link1,$image1,$link2,$image2,$link3,$image3) {
		echo "<div class='row'>
	
			<div class='col-lg-12'>
			<h3 class='page-header'>{$caption}</h3>
			</div>
	
			<div class='col-sm-3 col-xs-6'>
			<a href='{$link1}'>
			<img class='img-responsive portfolio-item' src='images/{$image1}'>
			</a>
			</div>
	
			<div class='col-sm-3 col-xs-6'>
			<a href='{$link2}'>
			<img class='img-responsive portfolio-item' src='images/{$image2}'>
			</a>
			</div>
			
			<div class='col-sm-3 col-xs-6'>
			<a href='{$link3}'>
			<img class='img-responsive portfolio-item' src='images/{$image3}'>
			</a>
			</div>
		</div>";
	}
	
	public function footer($author) {
		echo "<!-- /.container -->
			    <div class='container'>
			
			        <hr>
			
			        <footer>
			            <div class='row'>
			                <div class='col-lg-12'>
			                    <p>Copyright &copy; {$author}</p>
			                </div>
			            </div>
			        </footer>
			
			    </div>
			  <!-- /.container -->";
	}
}