<?php
class CategoriesModel extends DB{
    public function getCate() {
        // Viết câu truy vấn
        $sql = "SELECT * FROM categories";

        // Chuẩn bị và thực thi truy vấn
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        // Lấy kết quả và trả về
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findCateById($id){
        $sql = "SELECT * FROM categories WHERE id = '".$id."'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function isNameExists($namecate) {
        $sql = "SELECT * FROM categories WHERE name = '".$namecate."'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }

    public function insert(){
        $catename = $_POST["catename"];

        // Kiểm tra username đã tồn tại
        if ($this->isNameExists($catename)) {
            return false;
        }

        // Viết câu truy vấn
        $sql = "INSERT INTO categories (name) VALUES ('" . $catename . "')";

        // Chuẩn bị và thực thi truy vấn
        $stmt = $this->conn->prepare($sql);

        if($stmt->execute()){
            header('location: ' . URL . 'categorymanage');
        }else {
            return false;
		}
    }
    public function delete($id){
        $sql = "DELETE FROM categories WHERE id = '".$id."'";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute()) {
            header('location: ' . URL . 'categorymanage');
        } else {
            return false;
        }
    }
    public function update($id){
        $catename = $_POST["nameupdate"];
        if ($this->isNameExists($catename)) {
            return false;
        }
        $sql = "UPDATE categories SET name = '".$catename."' WHERE id = '".$id."'";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute()) {
            header('location: ' . URL . 'categorymanage');
        } else {
            return false;
        }
    }
}
?>