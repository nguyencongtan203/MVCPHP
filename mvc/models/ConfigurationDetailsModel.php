<?php
class ConfigurationDetailsModel extends DB{
    public function getConfigDetail() {
        // Viết câu truy vấn
        $sql = "SELECT cd.id_product, c.name AS configuration_name, cd.value 
                FROM configuration_details cd JOIN configuration c ON cd.id_configuration = c.id 
                ORDER BY cd.id_product";

        // Chuẩn bị và thực thi truy vấn
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        // Lấy kết quả và trả về
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getConfigById($id_product){
        $id_product = intval($id_product);
        $sql = "SELECT cd.id_product, c.name AS configuration_name, cd.value 
        FROM configuration_details cd 
        JOIN configuration c ON cd.id_configuration = c.id 
        WHERE cd.id_product = " . $id_product . " 
        ORDER BY cd.id_product";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function update($id_product){
        $id_product = intval($id_product);

        $idbrand = intval($_POST["hbrand"]);
        $idcode = intval($_POST["hcode"]);
        $iddescribe = intval($_POST["hdescribe"]);
        $idsize = intval($_POST["hsize"]);
        $idmaterial = intval($_POST["hmaterial"]);
        $idcolor = intval($_POST["hcolor"]);
        $idfeature = intval($_POST["hfeature"]);
        $idguarantee = intval($_POST["hguarantee"]);
        $listidconfig = [$idbrand,$idcode,$iddescribe,$idsize,$idmaterial,$idcolor,$idfeature,$idguarantee];

        $brand = $_POST["brand"];
        $code = $_POST["code"];
        $describe = $_POST["describe"];
        $size = $_POST["size"];
        $material = $_POST["material"];
        $color = $_POST["color"];
        $feature = $_POST["feature"];
        $guarantee = $_POST["guarantee"];
        $listconfig = [$brand,$code,$describe,$size,$material,$color,$feature,$guarantee];

        $sql_check = "SELECT COUNT(*) FROM configuration_details WHERE id_product = " . $id_product;
        $stmt = $this->conn->prepare($sql_check);
        $stmt->execute();
        $count = $stmt->fetchColumn();

        // Nếu đã có bản ghi, thực hiện update
        if ($count > 0) {
            // Cập nhật giá trị cho từng id_configuration tương ứng
            for ($i = 0; $i < count($listidconfig); $i++) {
                $id_configuration = $listidconfig[$i];
                $value = $listconfig[$i];
                $sql_update = "UPDATE configuration_details 
                                SET value = '" . $value . "' 
                                WHERE id_product = " . $id_product . " 
                                AND id_configuration = " . $id_configuration;
                $stmt_update = $this->conn->prepare($sql_update);
                if ($stmt_update->execute()) {
                    header('location: ' . URL . 'productmanage');
                } else {
                    return false;
                }
            }
        } else {
            // Nếu chưa có bản ghi, thực hiện insert
            for ($i = 0; $i < count($listidconfig); $i++) {
                $id_configuration = $listidconfig[$i];
                $value = $listconfig[$i];
                $sql_insert = "INSERT INTO configuration_details (id_product, id_configuration, value) 
                                VALUES (" . $id_product . ", " . $id_configuration . ", '" . $value . "')";
                $stmt_insert = $this->conn->prepare($sql_insert);
                if ($stmt_insert->execute()) {
                    header('location: ' . URL . 'productmanage');
                } else {
                    return false;
                }
            }
        }
    }
    public function delete($id_product){
        $sql = "DELETE FROM configuration_details WHERE id_product = '".$id_product."'";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute()) {
            header('location: ' . URL . 'productmanage');
        } else {
            return false;
        }
    }
}
?>