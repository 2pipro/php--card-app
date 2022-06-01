<?php

class cradappphp
{
    private $conn;
    public function __construct()
    {
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'cradappphp';
        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        if ($this->conn->connect_error) {
            die('DB Connection Failed : ' . $this->conn->connect_error);
        }
    }

    public function add_data($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        $sql = "INSERT INTO students (name, email, phone, image) VALUES ('$name', '$email', '$phone', '$image')";
        if ($this->conn->query($sql) === TRUE) {
            move_uploaded_file($tmp_name, 'upload/' . $image);
            echo "<script>alert('Data Inserted Successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            return "Informetion  Added Successfully";
        } else {
            echo "Error : " . $sql . "<br>" . $this->conn->error;
        }
    }
    public function get_data()
    {
        $sql = "SELECT * FROM students";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function edit_data($id)
    {
        $sql = "SELECT * FROM students WHERE id = $id";
        if (mysqli_query($this->conn, $sql)) {
            $result = mysqli_query($this->conn, $sql);
            $data = mysqli_fetch_assoc($result);
            return $data;
        }
    }

    public function update_data($data)
    {
        $name = $data['E_name'];
        $email = $data['E_email'];
        $phone = $data['E_phone'];
        $image = $_FILES['E_image']['name'];
        $tmp_name = $_FILES['E_image']['tmp_name'];
        $id = $data['E_id'];

        $sql = "UPDATE students SET name = '$name', email = '$email', phone = '$phone', image = '$image' WHERE id = $id";
        if ($this->conn->query($sql) === TRUE) {
            move_uploaded_file($tmp_name, 'upload/' . $image);
            echo "<script>alert('Data Updated Successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            return "Informetion  Updated Successfully";
        } else {
            echo "Error : " . $sql . "<br>" . $this->conn->error;
        }
    }
    public function delete_data($id)
    {
        $sql = "DELETE FROM students WHERE id = $id";
       if(mysqli_query($this->conn, $sql)){
          return "Informetion  Deleted Successfully";
       }
    }
}
