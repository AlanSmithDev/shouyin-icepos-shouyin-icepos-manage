<?php
/**
 * Alipay.com Inc.
 * Copyright (c) 2004-2014 All Rights Reserved.
 */



include('../AlipayMobilePublicMultiMediaClient.php');


header("Content-type: text/html; charset=gbk");

/**
 *
 * @author wangYuanWai
 * @version $Id: Test.hp, v 0.1 Aug 6, 2014 4:20:17 PM yikai.hu Exp $
 */
class TestImage{


	public $partner_public_key  = "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCitD16CypwZILTpdJL8nPV9rVFHYf5UWa/URNX6469mbQLpWfjKM/VSWRXsNVGSM3itOO/KG2Pw4x5g9xjH6iaE4LlaidjBIPpifISSlnpbyi4HxQTZYgMPv/TuiWofUN5kcwg/KQAQxB2OwTOeFu2i3LhqSCDmv6koTvHW15/hQIDAQAB";
	public $alipay_public_key   = "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDIgHnOn7LLILlKETd6BFRJ0GqgS2Y3mn1wMQmyh9zEyWlz5p1zrahRahbXAfCfSqshSNfqOmAQzSHRVjCqjsAw1jyqrXaPdKBmr90DIpIxmIyKXv4GGAkPyJ/6FTFY99uhpiq0qadD/uSzQsefWo0aTvP/65zi3eof7TcZ32oWpwIDAQAB";
		//公用变量
	public $serverUrl = 'http://publicexprod.d5336aqcn.alipay.net/chat/multimedia.do';//'http://publicexprod.d5336aqcn.alipay.net/chat/multimedia.do';//'http://i.com/works/photo-sdk/_data/1.jpg';//"http://i.com/works/photo-sdk/_data/publicexprod.php";//"http://publicexprod.d5336aqcn.alipay.net/chat/multimedia.do";
	public $appId = "2013121100055554";

	public $partner_<REDACTED_SECRET>;

	public $format = "json";
	public $charset = "GBK";



	function __construct(){

	}

	public function load() {
		$alipayClient = new AlipayMobilePublicMultiMediaClient(
			$this -> serverUrl,
			$this -> appId,
			$this -> partner_private_key,
			$this -> format,
			$this -> charset
		);
		$response = null;
		$outputStream = null;
		$request = $alipayClient -> getContents() ;

		//200
		//echo( '状态码：'. $request -> getCode() .', ');
		//echo '<hr /><br /><br /><br />';

		$fileType = $request -> getType();
		//echo( '类型：'. $fileType .', ');
		if( $fileType == 'text/plain'){
			//出错，返回 json
			echo $request -> getBody();

		}else{

			$type = $request -> getFileSuffix( $fileType );

			//echo $this -> getParams();
			//exit();

			//返回 文件流
			header("Content-type: ". $fileType ); //类型


			header("Accept-Ranges: bytes");//告诉客户端浏览器返回的文件大小是按照字节进行计算的
			header("Accept-Length: ". $request -> getContentLength() );//文件大小
			header("Content-Length: ". $request -> getContentLength() );//文件大小
			header('Content-Disposition: attachment; filename="'. time() .'.'. $type .'"'); //文件名
			echo $request -> getBody() ;
			exit ( ) ;
		}

		//echo( '内容： , '. $request -> getContentLength()  );

		//echo '<hr /><br /><br /><br />';
		//echo  '参数：<pre>';

		//echo ($request -> getParams());

		//echo '</pre>' ;
	}
}





//  测试
$test1 = new TestImage();
$test1 -> load();
