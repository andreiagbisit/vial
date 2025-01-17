<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Clinic Assigned</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <?php if(Yii::app()->user->hasFlash('success')):?>
                        <div class="border-bottom-success ">
                            <?php echo Yii::app()->user->getFlash('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(Yii::app()->user->hasFlash('error')):?>
                        <div class="border-bottom-danger ">
                            <?php echo Yii::app()->user->getFlash('error'); ?>
                        </div>
                    <?php endif; ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Doctor Full Name</th>
                                <th>Clinic Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($clinicAssignments as $modelValue)
                                {
                                    $doctorFullName = isset($doctorOptions[$modelValue->account_id]) ? $doctorOptions[$modelValue->account_id] : 'Unknown';
                            ?>
                                    <tr>
                                        <td><?php echo $doctorFullName; ?></td>
                                        <td><?php echo $modelValue->clinic->clinic; ?></td>
                                        <?php 
                                            echo "<td>".CHtml::link('<i class="fas fa-edit"></i>', $this->createAbsoluteUrl('clinicAssignment/update/'.$modelValue->id),array('class'=>'btn btn-success btn-circle btn-sm'))."</td>";
                                            echo "<td>".CHtml::link('<i class="fas fa-trash"></i>', $this->createAbsoluteUrl('clinic/deleteRecordAssignment/'.$modelValue->id),array('class'=>'btn btn-danger btn-circle btn-sm', 'onclick'=>'return confirm("Are you sure you want to delete this account? Deleting this account will delete all data associated with it including unpaid obligations.")'))."</td>";
                                        ?>
                                    </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
