<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border">
                <i class="fa fa-plus"></i> Employee View
            </div>
            <div class="box-body" >
                <table id="example1" class="table table-bordered table-striped">
                    <tr>
                        <th scope="row"><?= __('Name') ?></th>
                        <td><?= h($employee->name) ?></td> 
                        <th scope="row"><?= __('Mobile No') ?></th>
                        <td><?= h($employee->mobile_no) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Persent Address') ?></th>
                        <td><?= h($employee->present_add) ?></td> 
                        <th scope="row"><?= __('Father Name') ?></th>
                        <td><?= h($employee->father_name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Qualification') ?></th>
                        <td><?= h($employee->qualification) ?></td> 
                        <th scope="row"><?= __('Address') ?></th>
                        <td><?= h($employee->address) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Date of Birth') ?></th>
                        <td><?= h($employee->dob) ?></td> 
                        <th scope="row"><?= __('') ?></th>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('ESI No') ?></th>
                        <td><?= h($employee->esi_no) ?></td> 
                        <th scope="row"><?= __('PF No') ?></th>
                        <td><?= h($employee->pf_no) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Designation') ?></th>
                        <td><?= h($employee->designation) ?></td> 
                        <th scope="row"><?= __('Basic Salary') ?></th>
                        <td><?= h($employee->basicsalary) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Dearness') ?></th>
                        <td><?= h($employee->dearness) ?></td> 
                        <th scope="row"><?= __('House rent') ?></th>
                        <td><?= h($employee->houserent) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Conveyance') ?></th>
                        <td><?= h($employee->conveyance) ?></td>  
                        <th scope="row"><?= __('Phone Amount') ?></th>
                        <td><?= h($employee->phone_amnt) ?></td> 
                    </tr>
                    <tr> 
                        <th scope="row"><?= __('Medical Amount') ?></th>
                        <td><?= h($employee->medical_amnt) ?></td>
                        <th scope="row"><?= __('Professiontax') ?></th>
                        <td><?= $employee->professiontax?></td>
                    </tr>
                    <tr> 
                        <th scope="row"><?= __('Provident fund') ?></th>
                        <td><?= h($employee->providentfund) ?></td>
                        <th scope="row"><?= __('FPF') ?></th>
                        <td><?= $employee->fpf?></td>
                    </tr>
                    <tr> 
                        <th scope="row"><?= __('ESIC') ?></th>
                        <td><?= h($employee->esic) ?></td>
                        <th scope="row"><?= __('Income Tax-tds') ?></th>
                        <td><?= $employee->incometaxtds?></td>
                    </tr>
                    <tr> 
                        <th scope="row"><?= __('Bank Account Number') ?></th>
                        <td><?= h($employee->bank_account_number) ?></td>
                        <th scope="row"><?= __('Bank Name') ?></th>
                        <td><?= $employee->bank_name?></td>
                    </tr>
                    <tr> 
                        <th scope="row"><?= __('Driver Date of Joining') ?></th>
                        <td><?= h($employee->driver_doj) ?></td>
                        <th scope="row"><?= __('Blood group ') ?></th>
                        <td><?= $employee->blood_group?></td>
                    </tr> 
                    <tr> 
                        <th scope="row"><?= __('Reference Name') ?></th>
                        <td><?= h($employee->ref_name) ?></td>
                        <th scope="row"><?= __('Licence No') ?></th>
                        <td><?= $employee->lic_no ?></td>
                    </tr> 
                    <tr> 
                        <th scope="row"><?= __('Licence Issue Date') ?></th>
                        <td><?= h($employee->lic_issue_date) ?></td>
                        <th scope="row"><?= __('Licence Issue Place') ?></th>
                        <td><?= $employee->lic_issue_place?></td>
                    </tr>
                    <tr> 
                        <th scope="row"><?= __('Licence Exp. Date') ?></th>
                        <td><?= h($employee->lic_exp_date) ?></td>
                        <th scope="row"><?= __('Badge No') ?></th>
                        <td><?= $employee->badge_no?></td>
                    </tr>
                    <tr> 
                        <th scope="row"><?= __('Date of Leaveing') ?></th>
                        <td><?= h($employee->dob_leave) ?></td>
                        <th scope="row"><?= __('Leave Reason') ?></th>
                        <td><?= $employee->leave_reason?></td>
                    </tr> 
                </table>
            </div>
        </div>
    </div>
</div>
</section>
