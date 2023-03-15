<?php
include("viewheader.php");
?>
              <main>
                 <h1>Lectures Record</h1>
                   <div class="tb">
                        <table  cellpadding="20"  >
                                <tr class="view_table">
                                <th>S/NO</th>
                                <th>LECTURER ID</th>
                                <th>LECTURER NAME</th>
                                <th>GENDER</th>
                                <th>DEPARTMENT</th>
                                <th>RANK</th>
                    
                            </tr>
                       </table>    
                  </div>
                            <?php
                                    $conn = mysqli_connect("localhost","root","","emoderation");
                                    $sql = "select * from lecturer";
                                    $query_run = mysqli_query($conn,$sql);
                                    while($row = mysqli_fetch_assoc($query_run)){
                                ?>
                       <div class="tb2">
                            <table cellpadding="20">            
                                    <tr>
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
               </main>
        </body>
</html>