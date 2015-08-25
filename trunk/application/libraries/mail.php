<?php

require_once dirname(__FILE__) . '/mail/class.phpmailer.php';
require_once dirname(__FILE__) . '/mail/class.smtp.php';

class mail extends phpmailer {

    public function __construct() {
        $CI = get_instance();
        $this->IsSMTP(); // 使用SMTP方式发送
        $this->IsHTML(true);
        $this->Host = "smtp.yeah.net"; // 您的企业邮局域名  
        $this->SMTPAuth = true; // 启用SMTP验证功能  
        $this->Username = "nggamec@yeah.net"; // 邮局用户名(请填写完整的email地址)  
        $this->Password = "asd123"; // 邮局密码
        $this->From = 'nggamec@yeah.net';
        $this->FromName = '南瓜网';
        $this->CharSet = 'utf-8';
    }
    
    public function setSubject($str) {
        $this->Subject = $str;
        return $this;
    }
    
    public function setBody ($str) {
        $this->Body = $str;
        return $this;
    }
    
    public function error() {
        return $this->ErrorInfo;
    }

}

?>
