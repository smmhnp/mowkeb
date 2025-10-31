<?php

    function role($inRole){
        switch ($inRole){
            case 'super_admin':
                $role = 'مدیر ارشد';
                break;
            case 'admin':
                $role = 'مدیر';
                break;
            case 'editor':
                $role = 'ویرایشگر';
                break;
            default:
                $role = 'کاربر';            
        }

        return $role;
    }

    function status($inStatus){
        switch ($inStatus){
            case 'active':
                $status = 'فعال';
                break;
            default:
                $status = 'غیرفعال';
                break;            
        }
        
        return $status;
    }

    function userCheck($users, $op, $data){
        $num = 0;
        foreach($users as $user){
            if($user->$op == $data){
                $num++;
            }
        }

        return $num;
    }