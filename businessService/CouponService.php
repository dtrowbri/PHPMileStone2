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
                $result = "Time frame invalid!";
            }
        }
        
        if($couponType == 2){
            $couponAlreadyUsed = $service->hasOneTimeCouponBeenUsed($userid, $couponCode, $conn);
            if($couponAlreadyUsed == 1){
                $result = "Already Used!";
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
    
    public function checkCoupon_back(?string $couponCode){
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
    
    public function test2($couponCode){
        $conn = $this->database->getConnection();
        $service = new CouponsDAO();
        $result = $service->getUnlimitedCoupon($couponCode, $conn);
        $conn->close();
        return $result;
    }
}

?>