<li class="nav-item">
    <a href=""
       class="nav-link {{ Request::is('applicants*') ? 'active' : '' }}">
        <p>Applicants</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('tenantUsers.index') }}"
       class="nav-link {{ Request::is('tenantUsers*') ? 'active' : '' }}">
        <p>Tenant Users</p>
    </a>
</li>


