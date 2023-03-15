<?php
include("header.php");
?>
    <div class="fom">
      <form method='post'>
            <div class="head">
              <h3>Add Lectures</h3>
            </div>
            <div class="ipt">
            <p>User Id</p>
            <input type="text"  name="id" placeholder="Please enter username">
            </div>
            <br>
            <div class="ipt">
              <p>User Name</p>
              <input type="email"  name="user"  placeholder="Please enter username">
            </div>
            <br>
            <div class="ipt">
              <p>User Password</p>
              <input type="password"  name="password"  placeholder="*******">
            </div>
            <br>
            <div class="ipt">
              <p>Department</p>
              <select name = "dep">
                  <option>Select Department</option>
                  <option value="Computer Science">Computer Science</option>
            </select>
            </div>
            <br>
            <div class="ipt1">
            <ul>
                <li>
                    Male
                </li>
                <li>
                  <input type="radio" name="gender" value="male" placeholder="Male" class="">
                </li>
                <li>
                Female
              </li>
              <li>
                <input type="radio" name="gender" value="female" placeholder="Male" class="">
              </li>
            </ul>
            </div>
            <div class="ipt">
              <p>Rank</p>
              <select name = "rank">
                  <option>Select Rank</option>
                  <option value="Junior Lecturer">Junior Lecturer</option>
                  <option value="Senior Lecturer">Senior Lecturer</option>
                  <option value="Computer Science">Computer Science</option>
                  <option value="Computer Science">Computer Science</option>
                  <option value="Computer Science">Computer Science</option>
                  <option value="Computer Science">Computer Science</option>
            </select>
            </div>
            <br>
            <input type="submit" value="Add Lecturer" name="submit">
     </form>
    </div>
        <?php

        $conn = mysqli_connect("localhost","root","","emoderation");
        if(isset($_POST['submit']))
        {
        $id = $_POST['id'];
        $n = $_POST['user'];
        $pwd = $_POST['password'];
        $dep = $_POST['dep'];
        $g = $_POST['gender'];
        $r = $_POST['rank'];

        // Check if Lecturer already exists in the database
        $query = "SELECT LID, LNAME FROM lecturer WHERE LID = '$id' OR LNAME = '$n'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);

        if($count > 0) {
            // If course already exists, output an error message
            echo "Error: Lecturer already exists in the database";
        }

        else {

        $sql = "INSERT INTO lecturer (LID, LNAME, PWD,dep,gender,rank)
        VALUES ('$id', '$n', '$pwd', '$dep', '$g', '$r')";

        if (mysqli_query($conn, $sql)) {
          echo "New record created successfully";

        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        }
      }
        ?>
    <div class="view">
       <div>
        <div class="heads">
            <h3>Recently Saved Lectures</h3>
          </div>
       </div>
         <div class="tb">
            <table  cellpadding="4" >
                <tr class="view_table">
                 <th>S/NO</th>
                 <th>LECTURER ID</th>
                 <th>LECTURER NAME</th>
                 <th>GENDER</th>
                 <th>DEPARTMENT</th>
                 <th>RANK</th>
    
               </tr>
           
         </div>
        <?php

            $sql = "select * from lecturer limit 5";
            $query_run = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($query_run)){
                ?>
               
                <tr style="color:black">
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['LID']; ?></td>
                  <td><?php echo $row['LNAME']; ?></td>
                  <td><?php echo $row['gender'] ?></td>
                  <td><?php echo $row['dep'] ?></td>
                  <td><?php echo $row['rank'] ?></td>
                  <td><a href="editlecturer.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color:red">Edit</a></td>
                  </tr>
              
            <?php
            }
            ?>
            </table>
    </div>
 
</body>

</html>