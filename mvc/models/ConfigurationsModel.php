<?php
class ConfigurationsModel extends DB{
    public function getCofig() {
        // Viết câu truy vấn
        $sql = "SELECT * FROM configuration";

        // Chuẩn bị và thực thi truy vấn
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        // Lấy kết quả và trả về
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>