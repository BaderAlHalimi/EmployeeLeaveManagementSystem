<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header" style="height: 50px;margin-top: -30px">
            <i class="fa fa-users text-success me-4"></i>
            <span>ELMS</span>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item active ">
                    <a href="index.html" class='sidebar-link'>
                        <i class="fa fa-home text-success"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @if (Auth::check())
                    @if (Auth::user()->admin)
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="fa fa-plane text-success"></i>
                                <span>Leaves</span>
                            </a>
                            <ul class="submenu ">
                                <li>
                                    <a href="{{ route('employee.leave.create') }}">Leave request</a>
                                </li>
                                <li>
                                    <a href="{{ route('employee.leave.view') }}">Leaves status</a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="fa fa-building text-success"></i>
                                <span>Department</span>
                            </a>
                            <ul class="submenu ">
                                <li>
                                    <a href="add_department.html">Add Department</a>
                                </li>
                                <li>
                                    <a href="manage_department.html">Manage Department</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="fa fa-table text-success"></i>
                                <span>Designation</span>
                            </a>
                            <ul class="submenu ">
                                <li>
                                    <a href="add_designation.html">Add Designation</a>
                                </li>
                                <li>
                                    <a href="manage_designation.html">Manage Designation</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="fa fa-users text-success"></i>
                                <span>Employees</span>
                            </a>
                            <ul class="submenu ">
                                <li>
                                    <a href="{{ route('admin.create') }}">Add Employee</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.manage') }}">Manage Employee</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="fa fa-table text-success"></i>
                                <span>Leave Type</span>
                            </a>
                            <ul class="submenu ">
                                <li>
                                    <a href="{{ route('leaves.create') }}">Add Leave Type</a>
                                </li>
                                <li>
                                    <a href="{{ route('leaves.index') }}">Manage Leave Type</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="fa fa-table text-success"></i>
                                <span>Leave Management</span>
                            </a>
                            <ul class="submenu ">
                                <li>
                                    <a href="{{ route('allLeaves') }}">All Leaves</a>
                                </li>
                                <li>
                                    <a href="{{ route('pending') }}">Pending Leaves</a>
                                </li>
                                <li>
                                    <a href="{{ route('accepted') }}">Approve Leaves</a>
                                </li>
                                <li>
                                    <a href={{ route('canceled') }}>Not Approve Leaves</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="fa fa-user text-success"></i>
                                <span>Users</span>
                            </a>
                            <ul class="submenu ">
                                <li>
                                    <a href="add_user.html">Add User</a>
                                </li>
                                <li>
                                    <a href="manage_user.html">Manage Users</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item ">
                            <a href="reports.html" class='sidebar-link'>
                                <i class="fa fa-chart-bar text-success"></i>
                                <span>Reports</span>
                            </a>
                        </li>
                    @endif
                @endif

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
