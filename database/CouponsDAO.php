<?php

class CouponsDAO {
    
    public function getTimeBasedCoupon(?string $couponCode, $conn){      
        $query = "select DISCOUNT_PERCENTAGE from coupons where coupon_code = ? and coupon_type = 1 and now() > coupons.start_date and now() < coupons.END_DATE;";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $couponCode);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows == 1){
            $result = $result->fetch_assoc();
            $discount = $result["DISCOUNT_PERCENTAGE"];
            if($discount > 0){
                return $discount;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
        
    }
    
    public function hasOneTimeCouponBeenUsed(?int $userid, ?string $couponCode, $conn){
        $query = "select if(count(*) > 0, 1, 0) as 'COUPONUSED' from orders join coupons on coupons.id = orders.coupon_id where users_id = ? and coupons.coupon_code = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('is', $userid, $couponCode);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows == 1){
            $result = $result->fetch_assoc();
            $couponStatus = $result["COUPONUSED"];
            return $couponStatus;
        }else {
            return 0;
        }
    }

    public function getOneTimeCoupon(?string $couponCode, $conn){        
        $query = "SELECT DISCOUNT_PERCENTAGE FROM COUPONS WHERE COUPON_CODE = ? AND COUPON_TYPE = 2;";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $couponCode);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows == 1){
            $result = $result->fetch_assoc();
            $discount = $result["DISCOUNT_PERCENTAGE"];
            return $discount;
        } else {
            return 0;
        }
    }

    public function getUnlimitedCoupon(?string $couponCode, $conn){
        $query = "SELECT DISCOUNT_PERCENTAGE FROM COUPONS WHERE COUPON_CODE = ? AND COUPON_TYPE = 3;";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $couponCode);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows == 1){
            $result = $result->fetch_assoc();
            $discount = $result["DISCOUNT_PERCENTAGE"];
            return $discount;
        } else {
            return 0;
        }
    }

    public function getCouponType(?string $couponCode, $conn){
        $query = "SELECT COUPON_TYPE FROM COUPONS WHERE COUPON_CODE = ?;";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $couponCode);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows == 1){
            $result = $result->fetch_assoc();
            $couponType = $result["COUPON_TYPE"];
            return $couponType;
        } else {
            return 0;
        }
    }

    public function getCouponId(?string $couponCode, $conn){       
       $query = "SELECT ID FROM COUPONS WHERE COUPON_CODE = ?";
       $stmt = $conn->prepare($query);
       $stmt->bind_param('s', $couponCode);
       $stmt->execute();
       $result = $stmt->get_result();
       print_r($result);
       
       if($result->num_rows == 1){
           $result = $result->fetch_assoc();
           print_r($result);
           $id = $result["ID"];
           return $id;
       } else {
           return null;
       }
    }
}

?>