<?php
class UsersModel extends DB{
    public function getUser() {
        // Viết câu truy vấn
        $sql = "SELECT * FROM users";

        // Chuẩn bị và thực thi truy vấn
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        // Lấy kết quả và trả về
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>