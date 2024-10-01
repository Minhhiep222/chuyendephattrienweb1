<?php

require_once 'BaseModel.php';

class UserModel extends BaseModel {

    public function findUserById($id) {
        $sql = 'SELECT * FROM users WHERE id = '.$id;
        $user = $this->select($sql);

        return $user;
    }

    public function findUser($keyword) {
        $sql = 'SELECT * FROM users WHERE user_name LIKE %'.$keyword.'%'. ' OR user_email LIKE %'.$keyword.'%';
        $user = $this->select($sql);
        return $user;
    }

    /**
     * Authentication user
     * @param $userName
     * @param $password
     * @return array
     */
    public function auth($userName, $password) {
        $md5Password = md5($password);
        $sql = 'SELECT * FROM users WHERE name = "' . $userName . '" AND password = "'.$md5Password.'"';

        $user = $this->select($sql);
        return $user;
    }

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */

     function decodeId($index) {
        $number = 0;
        $arrayNumber = [];
        $array = explode('-', $index);
        $decodeTable = [
            'Z99X' => 0,
            'A12B' => 1,
            '&BUYG' => 2,
            'PQR4' => 3,
            '%$#@!' => 4,
            '3GH6D' => 5,
            'N7OP8' => 6,
            '^&*E' => 7,
            'KLM9' => 8,
            ')(*YH' => 9,
            ];
        for ($i = 0; $i < count($array); $i++) {
            if (isset($decodeTable[$array[$i]])) { 
                $arrayNumber[$i] = $decodeTable[$array[$i]];
            } else {
                $arrayNumber[$i] = null;
            }
        }
        $index = 10;
        for ($i = 0; $i < count($arrayNumber); $i++) {
            if(isset($arrayNumber[$i])) {
                if($i !== 0){
                    $number *= $index;
                    $number += $arrayNumber[$i];
                    $index*=$index;
                }else{
                    $number += $arrayNumber[$i];
                }
            }
        }
    
        return $number;
    }
    

    public function deleteUserById($id) {
        $sql = 'DELETE FROM users WHERE id = '.$id;
        return $this->delete($sql);
    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input) {
        $sql = 'UPDATE users SET 
                 name = "' . mysqli_real_escape_string(self::$_connection, $input['name']) .'", 
                 password="'. md5($input['password']) .'"
                WHERE id = ' . $input['id'];

        $user = $this->update($sql);

        return $user;
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input) {
        $sql = "INSERT INTO `app_web1`.`users` (`name`, `password`) VALUES (" .
                "'" . $input['name'] . "', '".md5($input['password'])."')";

        $user = $this->insert($sql);

        return $user;
    }

    /**
     * Search users
     * @param array $params
     * @return array
     */
    public function getUsers($params = []) {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM users WHERE name LIKE "%' . $params['keyword'] .'%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $users = self::$_connection->multi_query($sql);

            //Get data
            $users = $this->query($sql);
        } else {
            $sql = 'SELECT * FROM users';
            $users = $this->select($sql);
        }

        return $users;
    }
}