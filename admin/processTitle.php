<?php switch ($_REQUEST['act']){
	//-------------------------------------------------------------------------------------------
	case "product_category"   : $title = 'Danh mục sản phẩm';break;
	case "product_category_m" : $title = 'Hiệu chỉnh / Cập nhật : Danh mục sản phẩm';break;
	case "product"  		  : $title = 'Sản phẩm';break;
	case "product_m" 		  : $title = 'Hiệu chỉnh / Cập nhật : Sản phẩm';break;	
	case "product_new" 		  : $title = 'Sản phẩm mới';break;
	case "product_new_m"	  : $title = 'Hiệu chỉnh / Cập nhật : Sản phẩm mới';break;	
	case "product_special"	  : $title = 'Sản phẩm bán chạy';break;
	case "product_special_m"  : $title = 'Hiệu chỉnh / Cập nhật : Sản phẩm bán chạy';break;	
	
	//-------------------------------------Content----------------------------------------------
	case "intro"              : $title = 'Giới thiệu';break;
	case "intro_m"            : $title = 'Hiệu chỉnh / Cập nhật : Giới thiệu';break;
	case "contact"            : $title = 'Liên hệ';break;
	case "contact_m"          : $title = 'Hiệu chỉnh / Cập nhật : Liên hệ';break;
	case "service"            : $title = 'Dịch vụ';break;
	case "service_m"          : $title = 'Hiệu chỉnh / Cập nhật : Dịch vụ';break;
	case "download"           : $title = 'Download bảng giá';break;
	case "download_m"         : $title = 'Hiệu chỉnh / Cập nhật : Download bảng giá';break;
	case "logo"      	      : $title = 'Logo quảng cáo';break;
	case "logo_m"    	      : $title = 'Hiệu chỉnh / Cập nhật : Logo quảng cáo';break;
	//-------------------------Tin tức & Sự kiện-------------------------------------------------
	case "news"               : $title = 'Tin tức';break;
	case "news_m"             : $title = 'Hiệu chỉnh / Cập nhật : Tin tức';break;
	//-------------------------------------------------------------------------------------------	
	case "customer"           : $title = 'Khách hàng';break;
	case "customer_m"         : $title = 'Hiệu chỉnh / Cập nhật : Khách hàng';break;
	//---------------------------Hỗ trợ trực tuyến-----------------------------------------------
	case "yahoo"              : $title = 'Hỗ trợ trực tuyến (Yahoo)';break;
	case "yahoo_m"            : $title = 'Hiệu chỉnh / Cập nhật : Hỗ trợ trực tuyến (Yahoo)';break;
	case "skype"              : $title = 'Hỗ trợ trực tuyến (Skype)';break;
	case "skype_m"            : $title = 'Hiệu chỉnh / Cập nhật : Hỗ trợ trực tuyến (Skype)';break;	
	//----------------------------Advertise------------------------------------------------------
	case "advleft_top"        : $title = 'Quảng cáo trái trên';break;
	case "advleft_top_m"      : $title = 'Hiệu chỉnh / Cập nhật : Quảng cáo trái trên';break;
	case "advleft_bottom"     : $title = 'Quảng cáo trái dưới';break;
	case "advleft_bottom_m"   : $title = 'Hiệu chỉnh / Cập nhật : Quảng cáo trái dưới';break;
	case "advright_top"        : $title = 'Quảng cáo phải trên';break;
	case "advright_top_m"      : $title = 'Hiệu chỉnh / Cập nhật : Quảng cáo phải trên';break;
	case "advright_bottom"     : $title = 'Quảng cáo phải dưới';break;
	case "advright_bottom_m"   : $title = 'Hiệu chỉnh / Cập nhật : Quảng cáo phải dưới';break;	
	//----------------------------Thành viên & Đơn hàng------------------------------------------	
	case "member"             : $title = 'Thành viên';break;
	case "member_m"           : $title = 'Thêm mới / Cập nhật : Thành viên';break;
	case "order"              : $title = 'Đơn hàng';break;
	case "order_detail"       : $title = 'Chi tiết : Đơn hàng';break;
	
	//----------------------------danh mục hệ thống----------------------------------------------
	case "config"             : $title = 'Cấu hình';break;
	case "config_m"           : $title = 'Cấu hình : Cập nhật';break;
	case "changepass"         : $title = 'Đổi mật khẩu';break;
	//-----------------------------------------------------------------------------------------------
	default                   : $title = 'Thông kê truy cập';break;
}
echo $title;
?>