

 <tr>
                                                <td><?php echo $row['adate']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['location']; ?></td>
                                            <td><?php echo $row['clockin']; ?></td>
                                            <td><a href="map.php?lg=<?php echo $row['lg']; ?>&alt=<?php echo $row['alt']; ?>"><img width="20 rem" src="assets/img/icons/arrow.png">
                        </a></td>
                                            <td><?php echo $row['locationout']; ?></td>
                                             <td><?php echo $row['clockout']; ?></td>
                                            <td><a href="map.php?lg=<?php echo $row['lgout']; ?>&alt=<?php echo $row['altout']; ?>"><img width="20 rem" src="assets/img/icons/arrow.png">
                        </a></td>
                                            <td><a href="table.php?eid=<?php echo $row['num']; ?>"><i class="far fa-edit" ></i></a></td>
</tr>




