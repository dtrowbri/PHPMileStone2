<?php

require_once "../../AutoLoader.php";

class CouponService {
    
    private $database;
    
    public function __construct(){
        $this->database = new database();
    }
    
    public function checkCoupon(?string $couponCode, ?int $userid){
        $conn = $this->database->getConnection();
        $service = new CouponsDAO();
        
        $couponType = $service->getCouponType($couponCode, $conn);
        
        $result = "Invalid";

        if($couponType == 1){
            $result = $service->getTimeBasedCoupon($couponCode, $conn);
            if($result == 0){
                $result = 'Coupon "' . $couponCode . '" cannot be used at this time. It is past the experiation date or before the promotional date.';
            }
        }
        
        if($couponType == 2){
            $couponAlreadyUsed = $service->hasOneTimeCouponBeenUsed($userid, $couponCode, $conn);
            if($couponAlreadyUsed == 1){
                $result = 'Coupon "' . $couponCode . '" has already been used';
            } else {
                $result = $service->getOneTimeCoupon($couponCode, $conn);
            }
        }
        
        if($couponType == 3){
            $result = $service->getUnlimitedCoupon($couponCode, $conn);
        }
        
        $conn->close();
        return $result;
    }
    
    public function getCouponId(?string $couponCode){
        $conn = $this->database->getConnection();
        $CouponDAO = new CouponsDAO();
        $result = $CouponDAO->getCouponId($couponCode, $conn);
        $conn->close();
        return $result;
    }
}

?>