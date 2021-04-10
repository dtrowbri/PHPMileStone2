<?php

require_once "../../AutoLoader.php";

class CouponService {
    
    private $database;
    
    public function __construct(){
        $this->database = new database();
    }
    
    public function checkCoupon(?string $couponCode){
        $conn = $this->database->getConnection();
        $service = new CouponsDAO();
        $result = $service->getTimeBasedCoupon($couponCode, $conn);
        $conn->close();
        return $result;
    }
    
    public function test($userid, $couponCode){
        $conn = $this->database->getConnection();
        $service = new CouponsDAO();
        $result = $service->hasOneTimeCouponBeenUsed($userid, $couponCode, $conn);
        if($result == 0){
            $result = $service->getOneTimeCoupon($couponCode, $conn);
        }
        $conn->close();
        return $result;
    }
}

?>