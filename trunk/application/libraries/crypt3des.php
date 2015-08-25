<?php

class Crypt3Des {

    private static $key = "213793812739812639897380129830138097398174918741";
    private static $iv = "0102030405060708"; //like java: private static byte[] myIV = { 50, 51, 52, 53, 54, 55, 56, 57 };

    //加密

    public static function encrypt($input) {
        $input = self::padding($input);
//        $key = base64_decode(self::$key);
//        echo strlen(pack('H48',  self::$key));
        $key = pack('H48', self::$key);
        $iv = pack('H16', self::$iv);
        $td = mcrypt_module_open(MCRYPT_3DES, '', MCRYPT_MODE_CBC, '');
        //使用MCRYPT_3DES算法,cbc模式
        mcrypt_generic_init($td, $key, $iv);
        //初始处理
        $data = mcrypt_generic($td, $input);
        //加密
        mcrypt_generic_deinit($td);
        //结束
        mcrypt_module_close($td);
//        $data = self::removeBR(base64_encode($data));
        return base64_encode($data);
    }

    //解密
    public static function decrypt($encrypted) {
        $encrypted = base64_decode($encrypted);
//        $key = base64_decode(self::$key);
        $key = pack('H48', self::$key);
        $iv = pack('H16', self::$iv);
        $td = mcrypt_module_open(MCRYPT_3DES, '', MCRYPT_MODE_CBC, '');
        //使用MCRYPT_3DES算法,cbc模式
        mcrypt_generic_init($td, $key, $iv);
        //初始处理
        $decrypted = mdecrypt_generic($td, $encrypted);
        //解密
        mcrypt_generic_deinit($td);
        //结束
        mcrypt_module_close($td);
//        $decrypted = self::removePadding($decrypted);
        return $decrypted;
    }

    //填充密码，填充至8的倍数
    private function padding($str) {
        $len = 8 - strlen($str) % 8;
        for ($i = 0; $i < $len; $i++) {
            $str .= pack('H2', '0' . $len);
        }
        return $str;
    }

}

?>