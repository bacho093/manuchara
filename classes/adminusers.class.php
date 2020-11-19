<?php
include "dbh.class.php";

class Adminusers extends Dbh {

    function searchUser() {
        if(isset($_POST['result']))
        {
            $searchuser = $_POST['result'];
            $sql = "SELECT id, firstname, lastname, email, phone FROM users 
                WHERE email LIKE '%$searchuser%' OR phone LIKE '%$searchuser%'";
            $stmt = $this->connect()->query($sql);
            
            while($row = $stmt->fetch()) {
                $id = $row['id'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $email = $row['email'];
                $phone = $row['phone'];
    
                echo "<form action='' method='post'>
                        <input type='hidden' name='userId' value='$id'>
                      </form>
                      <tr>
                        <td>$firstname</td>
                        <td>$lastname</td>
                        <td>$email</td>
                        <td>$phone</td>
                        <td><span class='status'>აქტიური</span></td>
                        <td class='deledit'>
                            <div class='edituser'><a href='info.php'>Info</a></div>
                            <form action='' method=''>
                                <button type='submit' name='deluser' value='$id'>Lock Request</button>
                            </form>
                        </td>
                        </tr>
                        ";
            }
            echo "<div class='back'>
                    <a href='users.php'>Refresh</a>
                </div>";
        }
        
    }

    function userList() {
        if(!isset($_POST['result']) || empty($_POST['result']))
        {        // PAGINATION
            $xLimit = 9;
            $xRange = 0;
    
            if(!isset($_GET['page']))
            {
                $xRange = 0;
                $page = 0;
            }
            else {
                $page = $_GET['page'] + 1;
                $xRange = $page * 9;
            }
    
            $pagination = "SELECT * FROM users ORDER BY id";
            $pagstmt = $this->connect()->prepare($pagination);
            $pagstmt->execute();
            $pagrow = $pagstmt->fetchall();
            $count = count($pagrow);

            $sql = "SELECT id, firstname, lastname, email, phone FROM users ORDER BY id ASC LIMIT $xRange,$xLimit";
            $stmt = $this->connect()->query($sql);
    
            while($row = $stmt->fetch()) {
                $id = $row['id'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $email = $row['email'];
                $phone = $row['phone'];
    
                echo "<form action='' method='post'>
                        <input type='hidden' name='userId' value='$id'>
                      </form>
                      <tr>
                        <td>$firstname</td>
                        <td>$lastname</td>
                        <td>$email</td>
                        <td>$phone</td>
                        <td><span class='status'>აქტიური</span></td>
                        <td class='deledit'>
                            <div class='edituser'><a href='info.php?id=$id'>Info</a></div>
                            <form action='' method=''>
                                <button type='submit' name='deluser' value='$id'>Lock Request</button>
                            </form>
                        </td>
                        </tr>";
            }
            if(!isset($_GET['page']) || !($_GET['page'] == (ceil($count / 9) - 2)))
            {
                $r_num_page = "<a href='?page=$page'><i class='fas fa-angle-double-right'></i></a>";
            }
            else {
                $r_num_page = '';
            }

            if(!isset($_GET['page']))
            {
                $l_num_page = '';
            }
            elseif($_GET['page'] == 0)
            {
                $l_num_page = "<a href='users.php'><i class='fas fa-angle-double-left'></i></a>";
            }
            else {
                $page = $_GET['page'] - 1;
                $l_num_page = "<a href='?page=$page'><i class='fas fa-angle-double-left'></i></a>";
            }
            echo "<div class='pagination'>
            $l_num_page  $r_num_page
            </div>";
        }
    }
}

$admin_userlist = new Adminusers;
$admin_userlist->searchUser();