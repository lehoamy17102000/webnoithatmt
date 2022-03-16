<?php switch ($_REQUEST['frame']){

	case "product" :
		$cat = 0;
		if ($_REQUEST['cat']!= '') $cat = killInjection($_REQUEST['cat']);
		$catInfo = getRecord("tbl_product_category","id=".$cat);
		$title = $catInfo['name'];
		break;	
		
	case "product_detail" : $title = $_lang=="vn" ? "Thông tin chi tiết" : "PRODUCT DETAIL";break;													
	//--------------------------------------------------------------------------------------------	
	case "cart"    		   : $title = $_lang=="vn" ? "Giỏ hàng" : "CART";	break;
	case "customer" 	   : $title = $_lang=="vn" ? "Khách hàng" : "Khách hàng";	break;
	case "contact"         : $title = $_lang=="vn" ? "Liên hệ" : "CONTACT";	break;
	case "intro"           : $title = $_lang=="vn" ? "Giới thiệu" : "INTRODUCTION";break;
	case "news"            : $title = $_lang=="vn" ? "Tin tức & Sự kiện" : "NEWS & EVENT";break;
	case "news_detail"     : $title = $_lang=="vn" ? "Thông tin chi tiết" : "NEWS DETAIL";break;
	case "service"  	   : $title = $_lang=="vn" ? "Dịch vụ" : "Service";break;
	case "checkout"  	   : $title = $_lang=="vn" ? "Thông tin đơn hàng" : "Order";break;
	case "search"          : $title = $_lang=="vn" ? "Kết quả tìm kiếm" : "RETURN SEARCH";break;
	case "registry"        : $title = $_lang=="vn" ? "Đăng ký thành viên" : "REGISTRY";break;
	case "member"          : $title = $_lang=="vn" ? "Thành viên" : "LOGIN";break;
	case "login"           : $title = $_lang=="vn" ? "Ðăng nhập" : "LOGIN";break;
	case "forgotpass"      : $title = $_lang=="vn" ? "Quên mật khẩu" : "Forgot password";break;	
	case "changepassword"  : $title = $_lang=="vn" ? "Đổi mật khẩu" : "Change password";break;		
	
	case "home"            : $title = $_lang=="vn" ? "Sản phẩm mới" : "New product";break;
	default                : $title = $_lang=="vn" ? "Sản phẩm mới" : "New product";break;

}
echo $title;
?>
