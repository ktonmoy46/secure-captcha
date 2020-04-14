<?php
class captcha {
	private $uni;
	private $unmd;
	private $unmd_cut;
	private $img;
	private $bg;
	private $stfont1;
	private $stfont;
	private $stfont6;
	private $unmd_font;
	private $star;
	private $im1;
	private $im2;
	private $im3;
	private $im4;
	private $im5;
	private $im6;
	private $imm;
	private $imgc;
	public function CaptchaImage() {
		$this->uni = uniqid();
		$this->unmd = md5($this->uni);
		$this->unmd_cut = substr($this->unmd, 0, 6);
		session_start();
		$_SESSION['captcha'] = $this->unmd_cut;
		$this->img = imagecreate(80, 35);
		$this->bg = imagecolorallocate($this->img, 255, 213, 47);
		$this->stfont1 = imagecolorallocate($this->img, 153, 255, 51);
		$this->stfont = imagecolorallocate($this->img, 145, 213, 255);
		$this->stfont6 = imagecolorallocate($this->img, 255, 102, 178);
		$this->unmd_font = imagecolorallocate($this->img, 255, 0, 0);
	    $this->star = "* * * * *";
		$this->im1 = imagestring($this->img, 11, 0, -1, $this->star, $this->stfont1);
		$this->im2 = imagestring($this->img, 11, 2, 5, $this->star, $this->stfont);
		$this->im3 = imagestring($this->img, 11, 4, 10, $this->star, $this->stfont);
		$this->im4 = imagestring($this->img, 11, 6, 15, $this->star, $this->stfont);
		$this->im5 = imagestring($this->img, 11, 8, 20, $this->star, $this->stfont);
		$this->im6 = imagestring($this->img, 11, 10, 25, $this->star, $this->stfont6);
		$this->imm = imagestring($this->img, 11, 10, 10, $this->unmd_cut, $this->unmd_font);
		header('Content-type: image/png');
		$this->imgc = imagepng($this->img);
		return $this->imgc;
	}
}
$obj = new captcha;
$obj->CaptchaImage();
?>