<?php
$con = mysqli_connect("localhost","root","","db_registration") or die("connection failed");
$query = "select * FROM tbl_news ORDER BY Id DESC";
$res = mysqli_query($con,$query);
$row = mysqli_fetch_array($res);
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i> Responsive Timeline
                        </div>
                        <div class="panel-body">
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-badge"><i class="fa fa-check"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title"><?php  echo $row['Heading']; ?></h4>
                                            <!-- <p><small class="text-muted"><i class="fa fa-clock-o"></i> 11 hours ago via Twitter</small> -->
                                            </p>
                                        </div>
                                        <div class="timeline-body">
                                            <p><?php echo $row['Description'] ?></p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
