<?php
                include 'db.php';
                $json = new stdClass();
                $total = 0;
        
                $filterroomtype = $_GET['filterroomtype'] ?? 'All';
                $current_page = $_GET['page'] ?? 1;
                if($filterroomtype!='All'){
                    $sql = "SELECT count(*) FROM room where statu=0 and roomtype='$filterroomtype'";
                    $total=mysqli_fetch_array(mysqli_query($con,$sql))[0];
                }else{
                    $sql = "SELECT count(*) FROM room where statu=0";
                    $total=mysqli_fetch_array(mysqli_query($con,$sql))[0];
                }
                if($total==0){
                    echo json_encode("No data found");
                    return;
                }
                $limit = 12;
                $total_page = ceil($total / $limit);
                if ($current_page > $total_page) {
                    $current_page = $total_page;
                } else if ($current_page < 1) {
                    $current_page = 1;
                }
                $json->total_page = $total_page;
                $json->current_page = $current_page;
                $start = ($current_page - 1) * $limit;
                $sql='';
                if ($filterroomtype != 'All') {
                    $sql = "SELECT * FROM room where statu=0 and roomtype='$filterroomtype' LIMIT $start,$limit";
                } else {
                    $sql = "SELECT * FROM room where statu=0 LIMIT $start,$limit";
                }
                $json->rooms=array();
                $res = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_assoc($res)) {
                    $json->rooms[]= '<div class="col-md-3 mt-3">
                        <div class="card" style="height:100%;">
                            <img src="../Images/' . $row['nameofimage'] . '" class="card-img-top w-100" alt="...">
                            <div class="card-body">
                                <h4 class="card-title"> Tầng ' . $row['floor'] . '</h4>

                                <h4 class="card-title roomId">Phòng ' . $row['id'] . '</h4>
                                <p class="card-title roomType" style="font-style: italic;">Loại: ' . $row['roomtype'] . '</p>
                                <p class="card-text roomPrice">Giá: ' . $row['price'] . '/ngày</p>
                                <p class="card-text roomDecrip">' . $row['descrip'] . '</p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalOrderOnline">Đặt ngay</button>
                            </div>
                        </div>
                    </div>';
                }


                              
               $json->pages=array();
                
                $url = 'booking.php?filterroomtype='.$filterroomtype;
                
                if ($current_page > 1 && $total_page > 1) {
                    $json->pages[] = '<span class="page-link" onclick="showpage('.($current_page-1).')">Prev</span>';
                }
                if($total_page>=1){
                    // Lặp khoảng giữa
                    for ($i = 1; $i <= $total_page; $i++) { // Nếu là trang hiện tại thì hiển thị thẻ span
                        // ngược lại hiển thị thẻ a
                        if ($i == $current_page) {
                            $json->pages[]= '<span class="page-link active" onclick="showpage('.($i).')">'.$i.'</span>';
                        } else {
                            $json->pages[]= '<span class="page-link" onclick="showpage('.($i).')">'.$i.'</span>';
                        }
                    }
                }
                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if ($current_page < $total_page && $total_page > 1) {
                    $json->pages[]= '<span class="page-link" onclick="showpage('.($current_page+1).')">Next</span>';
                }

                echo json_encode($json);
                ?>

            
