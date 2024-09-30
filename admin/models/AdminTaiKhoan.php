<?php
class AdminTaiKhoan
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllTaikhoan($chuc_vu_id)
    {
        try {
            $sql = "SELECT * from tai_khoans where chuc_vu_id = :chuc_vu_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':chuc_vu_id' => $chuc_vu_id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id)
    {
        try {
            $sql = "INSERT INTO tai_khoans (ho_ten, email, mat_khau, chuc_vu_id)
                    VALUES (:ho_ten, :email, :password, :chuc_vu_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':password' => $password,
                ':chuc_vu_id' => $chuc_vu_id,
            ]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getDetailTaiKhoan($id)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE id =:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'error' . $e->getMessage();
        }
    }
    public function updateTaiKhoan($id, $ho_ten, $email, $so_dien_thoai, $trang_thai)
    {
        try {
            $sql = 'UPDATE tai_khoans 
            set ho_ten=:ho_ten,
                email=:email,
                so_dien_thoai=:so_dien_thoai,
                trang_thai=:trang_thai
            where id=:id'; // Đã xóa dấu phẩy dư ở cuối
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':trang_thai' => $trang_thai,
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo 'error' . $e->getMessage();
        }
    }
    public function resetPassword($id, $mat_khau)
    {
        try {
            $sql = 'UPDATE tai_khoans SET mat_khau=:mat_khau WHERE id=:id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':mat_khau' => $mat_khau,
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo 'error' . $e->getMessage();
        }
    }
}
