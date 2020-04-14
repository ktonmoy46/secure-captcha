<?php 
session_start();
class captcha {
	private $session;
	public $result;
	public $uscode;
	public function CaptchaCheck($uscode) {
		$this->session = $_SESSION['captcha'];
		if ($uscode = $this->session) {
			// captcha checking is complete
			$this->result = "captcha checking is success";
			echo $this->result;
		} else {
			// captcha code is worng
			$this->result = "your code is worng";
			echo $this->result;
		}
	}
}
if (isset($_POST['code'])) {
	$captchaobj = new captcha;
	$captchaobj->CaptchaCheck($_POST['code']);
}
?>
<html>
<head></head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
<img src="captcha.php">
<input type="text" name="code" maxlength="6">
<input type="submit" name="submit">
</form>
</body>
</html>