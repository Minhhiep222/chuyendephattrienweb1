<?php

abstract class a{
    abstract static public function b();
}

class c extends a {
    public static function b() {
        // Implement the abstract method
        // You can add your implementation here
        echo "minh";
    }
}

//phương thức con không được phép thu hẹp phạm vi của phương thức cha
//Không thể giảm mức độ truy cập xuống protected hoặc private vì điều đó làm giảm phạm vi truy cập của phương thức, vi phạm quy tắc kế thừa.

c::b();