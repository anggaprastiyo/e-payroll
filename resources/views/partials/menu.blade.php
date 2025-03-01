<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/audit-logs*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('pengaturan_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/areas*") ? "menu-open" : "" }} {{ request()->is("admin/perusahaans*") ? "menu-open" : "" }} {{ request()->is("admin/kantors*") ? "menu-open" : "" }} {{ request()->is("admin/jabatans*") ? "menu-open" : "" }} {{ request()->is("admin/banks*") ? "menu-open" : "" }} {{ request()->is("admin/rekanans*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/areas*") ? "active" : "" }} {{ request()->is("admin/perusahaans*") ? "active" : "" }} {{ request()->is("admin/kantors*") ? "active" : "" }} {{ request()->is("admin/jabatans*") ? "active" : "" }} {{ request()->is("admin/banks*") ? "active" : "" }} {{ request()->is("admin/rekanans*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.pengaturan.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('area_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.areas.index") }}" class="nav-link {{ request()->is("admin/areas") || request()->is("admin/areas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-map-marked-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.area.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('perusahaan_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.perusahaans.index") }}" class="nav-link {{ request()->is("admin/perusahaans") || request()->is("admin/perusahaans/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-building">

                                        </i>
                                        <p>
                                            {{ trans('cruds.perusahaan.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('kantor_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.kantors.index") }}" class="nav-link {{ request()->is("admin/kantors") || request()->is("admin/kantors/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-building">

                                        </i>
                                        <p>
                                            {{ trans('cruds.kantor.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('jabatan_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.jabatans.index") }}" class="nav-link {{ request()->is("admin/jabatans") || request()->is("admin/jabatans/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-cog">

                                        </i>
                                        <p>
                                            {{ trans('cruds.jabatan.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('bank_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.banks.index") }}" class="nav-link {{ request()->is("admin/banks") || request()->is("admin/banks/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-university">

                                        </i>
                                        <p>
                                            {{ trans('cruds.bank.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('rekanan_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.rekanans.index") }}" class="nav-link {{ request()->is("admin/rekanans") || request()->is("admin/rekanans/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-home">

                                        </i>
                                        <p>
                                            {{ trans('cruds.rekanan.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('manajemen_karyawan_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/keluargas*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/users*") ? "active" : "" }} {{ request()->is("admin/keluargas*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-user-cog">

                            </i>
                            <p>
                                {{ trans('cruds.manajemenKaryawan.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('keluarga_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.keluargas.index") }}" class="nav-link {{ request()->is("admin/keluargas") || request()->is("admin/keluargas/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-friends">

                                        </i>
                                        <p>
                                            {{ trans('cruds.keluarga.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('manajemen_absensi_dan_lembur_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/absensis*") ? "menu-open" : "" }} {{ request()->is("admin/lemburs*") ? "menu-open" : "" }} {{ request()->is("admin/absensi-settings*") ? "menu-open" : "" }} {{ request()->is("admin/potongan-absensis*") ? "menu-open" : "" }} {{ request()->is("admin/hari-libur-nasionals*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/absensis*") ? "active" : "" }} {{ request()->is("admin/lemburs*") ? "active" : "" }} {{ request()->is("admin/absensi-settings*") ? "active" : "" }} {{ request()->is("admin/potongan-absensis*") ? "active" : "" }} {{ request()->is("admin/hari-libur-nasionals*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.manajemenAbsensiDanLembur.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('absensi_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.absensis.index") }}" class="nav-link {{ request()->is("admin/absensis") || request()->is("admin/absensis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-500px">

                                        </i>
                                        <p>
                                            {{ trans('cruds.absensi.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('lembur_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.lemburs.index") }}" class="nav-link {{ request()->is("admin/lemburs") || request()->is("admin/lemburs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user-clock">

                                        </i>
                                        <p>
                                            {{ trans('cruds.lembur.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('absensi_setting_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.absensi-settings.index") }}" class="nav-link {{ request()->is("admin/absensi-settings") || request()->is("admin/absensi-settings/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-clock">

                                        </i>
                                        <p>
                                            {{ trans('cruds.absensiSetting.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('potongan_absensi_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.potongan-absensis.index") }}" class="nav-link {{ request()->is("admin/potongan-absensis") || request()->is("admin/potongan-absensis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-calculator">

                                        </i>
                                        <p>
                                            {{ trans('cruds.potonganAbsensi.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('hari_libur_nasional_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.hari-libur-nasionals.index") }}" class="nav-link {{ request()->is("admin/hari-libur-nasionals") || request()->is("admin/hari-libur-nasionals/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-calendar-times">

                                        </i>
                                        <p>
                                            {{ trans('cruds.hariLiburNasional.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('manajemen_gaji_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/jenis-gajis*") ? "menu-open" : "" }} {{ request()->is("admin/ref-bpjs*") ? "menu-open" : "" }} {{ request()->is("admin/potongan-gajis*") ? "menu-open" : "" }} {{ request()->is("admin/gaji-bulanans*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/jenis-gajis*") ? "active" : "" }} {{ request()->is("admin/ref-bpjs*") ? "active" : "" }} {{ request()->is("admin/potongan-gajis*") ? "active" : "" }} {{ request()->is("admin/gaji-bulanans*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-file-invoice-dollar">

                            </i>
                            <p>
                                {{ trans('cruds.manajemenGaji.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('jenis_gaji_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.jenis-gajis.index") }}" class="nav-link {{ request()->is("admin/jenis-gajis") || request()->is("admin/jenis-gajis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-dollar-sign">

                                        </i>
                                        <p>
                                            {{ trans('cruds.jenisGaji.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('ref_bpj_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.ref-bpjs.index") }}" class="nav-link {{ request()->is("admin/ref-bpjs") || request()->is("admin/ref-bpjs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-id-card-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.refBpj.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('potongan_gaji_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.potongan-gajis.index") }}" class="nav-link {{ request()->is("admin/potongan-gajis") || request()->is("admin/potongan-gajis/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-hand-holding-usd">

                                        </i>
                                        <p>
                                            {{ trans('cruds.potonganGaji.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('gaji_bulanan_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.gaji-bulanans.index") }}" class="nav-link {{ request()->is("admin/gaji-bulanans") || request()->is("admin/gaji-bulanans/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-money-check-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.gajiBulanan.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>