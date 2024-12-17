<?php
class ProductsModel extends DB{
    public function getPro() {
        $sql = "SELECT * FROM products";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getProductById($id){
        $sql = "SELECT * FROM products WHERE id = '".$id."'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getProductByCate($id){
        $sql = "SELECT * FROM products WHERE id_category = '".$id."'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function search($name){

        $sql = "SELECT * FROM products WHERE name LIKE '%".$name."%'";
        $stmt = $this->conn->prepare($sql);
        
        $stmt->execute();
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function isNameExists($nameproduct) {
        $sql = "SELECT * FROM products WHERE name = '".$nameproduct."'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }
    public function insert(){
        $idcate = $_POST["category"];
        $idcate = intval($idcate);
        $nameproduct = $_POST["nameproduct"];
        $priceproduct = $_POST["priceproduct"];
        $priceproduct = intval($priceproduct);
        $imageproduct = $_FILES['imageproduct']['name'];

        if ($this->isNameExists($nameproduct)) {
            return false;
        }
        if ($idcate === 0) {
            return false;
        }
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/MVCPHP/public/images/";
        $targetFile = $targetDir . basename($imageproduct);
        move_uploaded_file($_FILES["imageproduct"]["tmp_name"],$targetFile);

        $sql = "INSERT INTO products (id_category, name, price, image) VALUES ('" . $idcate . "', '" . $nameproduct . "', '" . $priceproduct . "', '" . $imageproduct . "')";

        $stmt = $this->conn->prepare($sql);

        if($stmt->execute()){
            header('location: ' . URL . 'productmanage');
            exit;
        }else {
            return false;
		}
    }
    public function delete($id,$image){
        $sql = "DELETE FROM products WHERE id = '".$id."'";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute()) {
            $fileToDelete = $_SERVER['DOCUMENT_ROOT'] . "/MVCPHP/public/images/" . $image;
            unlink($fileToDelete);
            header('location: ' . URL . 'productmanage');
            exit;
        } else {
            return false;
        }
    }
    public function update($id,$image){
        $idcate = $_POST["category"];
        $idcate = intval($idcate);
        $nameproduct = $_POST["nameproduct"];
        $priceproduct = $_POST["priceproduct"];
        $priceproduct = intval($priceproduct);
        $imageproduct = $_FILES['imageproduct']['name'];

        // Kiểm tra username đã tồn tại
        if ($this->isNameExists($nameproduct)) {
            return false;
        }
        if ($idcate === 0) {
            return false;
        }
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/MVCPHP/public/images/";
        $targetFile = $targetDir . basename($imageproduct);
        move_uploaded_file($_FILES["imageproduct"]["tmp_name"],$targetFile);
        
        $sql = "UPDATE products SET " . "id_category = '" . $idcate . "', " . "name = '" . $nameproduct . "', " . "price = '" . $priceproduct . "', " . "image = '" . $imageproduct . "' ". "WHERE id = '" . $id . "'";
        $stmt = $this->conn->prepare($sql);

        if($stmt->execute()){
            //Xóa ảnh cũ
            $fileToDelete = $_SERVER['DOCUMENT_ROOT'] . "/MVCPHP/public/images/" . $image;
            unlink($fileToDelete);
            header('location: ' . URL . 'productmanage');
            exit;
        }else {
            return false;
		}
    }

}
?>