<li>
    <a  href="index.html" class="{{  $level =="1" ? 'active-menu' : '' }}"><i class="fa fa-dashboard"></i> Dashboard</a>
</li> 
<li>
    <a href="#" class="{{  $level =="2" ? 'active-menu' : '' }}" ><i class="fa fa-line-chart"></i>Accounting System<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse {{  $level =="2" ? 'in' : '' }}">
        <li class="{{  $sublevel =="21" ? 'active' : '' }}"><a href="#" ><i class="fa fa-plus-circle"></i>Masters<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
                <li>
                    <a href="{{ route('employee.accounthead.index') }}" class="{{  $menu =="211" ? 'active-menu' : '' }}"><i class="fa fa-circle-o"></i>Accounting Heads</a>
                </li>
                <li>
                    <a href="{{ route('employee.ledger.index') }}" class="{{  $menu =="212" ? 'active-menu' : '' }}"><i class="fa fa-circle-o"></i>Ledgers</a>
                </li>
                <li>
                    <a href="morris-chart.html" class="{{  $menu =="213" ? 'active-menu' : '' }}"><i class="fa fa-circle-o"></i>Members</a>
                </li>
            </ul>
        </li>	 
        <li href="#" class="{{  $sublevel =="22" ? 'active' : '' }}">
            <a ><i class="fa fa-indent"></i>Vouchers <span class="fa arrow"></a>
            <ul class="nav nav-third-level">
                <li>
                    <a href="chart.html"><i class="fa fa-circle-o"></i>Payment Voucher</a>
                </li>
                <li>
                    <a href="morris-chart.html"><i class="fa fa-circle-o"></i>Receipt Voucher</a>
                </li>
                <li>
                    <a href="morris-chart.html"><i class="fa fa-circle-o"></i>Journal Voucher</a>
                </li>
                <li>
                    <a href="morris-chart.html"><i class="fa fa-circle-o"></i>Contra Voucher</a>
                </li>
            </ul>
        </li>  
        <li class="{{  $sublevel =="23" ? 'active' : '' }}">
            <a href="empty.html" class="{{  $menu =="231" ? 'active-menu' : '' }}"><i class="fa fa-file-text"></i>Reports<span class="fa arrow"></a>
            <ul class="nav nav-third-level">
                <li>
                    <a href="chart.html"><i class="fa fa-circle-o"></i>Payment and Receipt</a>
                </li>
                <li>
                    <a href="morris-chart.html"><i class="fa fa-circle-o"></i>Daily Cash Trail</a>
                </li>
                <li>
                    <a href="morris-chart.html"><i class="fa fa-circle-o"></i>Ledger Book</a>
                </li>
                <li>
                    <a href="morris-chart.html"><i class="fa fa-circle-o"></i>Cash Book</a>
                </li>
                <li>
                    <a href="morris-chart.html"><i class="fa fa-circle-o"></i>Income & Expenditure</a>
                </li>
                <li>
                    <a href="chart.html"><i class="fa fa-circle-o"></i>Test Report 1</a>
                </li>
                <li>
                    <a href="morris-chart.html"><i class="fa fa-circle-o"></i>Test Report 2</a>
                </li>
                <li>
                    <a href="morris-chart.html"><i class="fa fa-circle-o"></i>Test Report 3</a>
                </li>
                <li>
                    <a href="morris-chart.html"><i class="fa fa-circle-o"></i>Test Report 4</a>
                </li>
            </ul>
        </li>
    </ul>
</li> 
<li>
    <a href="empty.html" class="{{  $level =="3" ? 'active-menu' : '' }}"><i class="fa fa-sitemap"></i>Loan Management System<span class="fa arrow"></a>
    <ul class="nav nav-second-level collapse {{  $level =="3" ? 'in' : '' }}">
    <li>
            <a href="chart.html"><i class="fa fa-circle-o"></i>Payment and Receipt</a>
        </li>
        <li>
            <a href="morris-chart.html"><i class="fa fa-circle-o"></i>Daily Cash Trail</a>
        </li>
        <li>
            <a href="morris-chart.html"><i class="fa fa-circle-o"></i>Ledger Book</a>
        </li>
        <li>
            <a href="morris-chart.html"><i class="fa fa-circle-o"></i>Cash Book</a>
        </li>
        <li>
            <a href="morris-chart.html"><i class="fa fa-circle-o"></i>Income and Expenditure</a>
        </li>
		</ul>
</li>