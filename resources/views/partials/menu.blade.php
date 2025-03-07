<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="{{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.audit-logs.index") }}">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span>{{ trans('cruds.auditLog.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('pengaturan_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.pengaturan.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('area_access')
                            <li class="{{ request()->is("admin/areas") || request()->is("admin/areas/*") ? "active" : "" }}">
                                <a href="{{ route("admin.areas.index") }}">
                                    <i class="fa-fw fas fa-map-marked-alt">

                                    </i>
                                    <span>{{ trans('cruds.area.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('perusahaan_access')
                            <li class="{{ request()->is("admin/perusahaans") || request()->is("admin/perusahaans/*") ? "active" : "" }}">
                                <a href="{{ route("admin.perusahaans.index") }}">
                                    <i class="fa-fw far fa-building">

                                    </i>
                                    <span>{{ trans('cruds.perusahaan.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('kantor_access')
                            <li class="{{ request()->is("admin/kantors") || request()->is("admin/kantors/*") ? "active" : "" }}">
                                <a href="{{ route("admin.kantors.index") }}">
                                    <i class="fa-fw fas fa-building">

                                    </i>
                                    <span>{{ trans('cruds.kantor.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('jabatan_access')
                            <li class="{{ request()->is("admin/jabatans") || request()->is("admin/jabatans/*") ? "active" : "" }}">
                                <a href="{{ route("admin.jabatans.index") }}">
                                    <i class="fa-fw fas fa-user-cog">

                                    </i>
                                    <span>{{ trans('cruds.jabatan.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('bank_access')
                            <li class="{{ request()->is("admin/banks") || request()->is("admin/banks/*") ? "active" : "" }}">
                                <a href="{{ route("admin.banks.index") }}">
                                    <i class="fa-fw fas fa-university">

                                    </i>
                                    <span>{{ trans('cruds.bank.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('rekanan_access')
                            <li class="{{ request()->is("admin/rekanans") || request()->is("admin/rekanans/*") ? "active" : "" }}">
                                <a href="{{ route("admin.rekanans.index") }}">
                                    <i class="fa-fw fas fa-home">

                                    </i>
                                    <span>{{ trans('cruds.rekanan.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('manajemen_karyawan_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-user-cog">

                        </i>
                        <span>{{ trans('cruds.manajemenKaryawan.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('keluarga_access')
                            <li class="{{ request()->is("admin/keluargas") || request()->is("admin/keluargas/*") ? "active" : "" }}">
                                <a href="{{ route("admin.keluargas.index") }}">
                                    <i class="fa-fw fas fa-user-friends">

                                    </i>
                                    <span>{{ trans('cruds.keluarga.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('manajemen_absensi_dan_lembur_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.manajemenAbsensiDanLembur.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('absensi_access')
                            <li class="{{ request()->is("admin/absensis") || request()->is("admin/absensis/*") ? "active" : "" }}">
                                <a href="{{ route("admin.absensis.index") }}">
                                    <i class="fa-fw fab fa-500px">

                                    </i>
                                    <span>{{ trans('cruds.absensi.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('lembur_access')
                            <li class="{{ request()->is("admin/lemburs") || request()->is("admin/lemburs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.lemburs.index") }}">
                                    <i class="fa-fw fas fa-user-clock">

                                    </i>
                                    <span>{{ trans('cruds.lembur.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('absensi_setting_access')
                            <li class="{{ request()->is("admin/absensi-settings") || request()->is("admin/absensi-settings/*") ? "active" : "" }}">
                                <a href="{{ route("admin.absensi-settings.index") }}">
                                    <i class="fa-fw far fa-clock">

                                    </i>
                                    <span>{{ trans('cruds.absensiSetting.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('potongan_absensi_access')
                            <li class="{{ request()->is("admin/potongan-absensis") || request()->is("admin/potongan-absensis/*") ? "active" : "" }}">
                                <a href="{{ route("admin.potongan-absensis.index") }}">
                                    <i class="fa-fw fas fa-calculator">

                                    </i>
                                    <span>{{ trans('cruds.potonganAbsensi.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('hari_libur_nasional_access')
                            <li class="{{ request()->is("admin/hari-libur-nasionals") || request()->is("admin/hari-libur-nasionals/*") ? "active" : "" }}">
                                <a href="{{ route("admin.hari-libur-nasionals.index") }}">
                                    <i class="fa-fw far fa-calendar-times">

                                    </i>
                                    <span>{{ trans('cruds.hariLiburNasional.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('manajemen_gaji_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-file-invoice-dollar">

                        </i>
                        <span>{{ trans('cruds.manajemenGaji.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('jenis_gaji_access')
                            <li class="{{ request()->is("admin/jenis-gajis") || request()->is("admin/jenis-gajis/*") ? "active" : "" }}">
                                <a href="{{ route("admin.jenis-gajis.index") }}">
                                    <i class="fa-fw fas fa-dollar-sign">

                                    </i>
                                    <span>{{ trans('cruds.jenisGaji.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('ref_bpj_access')
                            <li class="{{ request()->is("admin/ref-bpjs") || request()->is("admin/ref-bpjs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.ref-bpjs.index") }}">
                                    <i class="fa-fw fas fa-id-card-alt">

                                    </i>
                                    <span>{{ trans('cruds.refBpj.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('potongan_gaji_access')
                            <li class="{{ request()->is("admin/potongan-gajis") || request()->is("admin/potongan-gajis/*") ? "active" : "" }}">
                                <a href="{{ route("admin.potongan-gajis.index") }}">
                                    <i class="fa-fw fas fa-hand-holding-usd">

                                    </i>
                                    <span>{{ trans('cruds.potonganGaji.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('gaji_bulanan_access')
                            <li class="{{ request()->is("admin/gaji-bulanans") || request()->is("admin/gaji-bulanans/*") ? "active" : "" }}">
                                <a href="{{ route("admin.gaji-bulanans.index") }}">
                                    <i class="fa-fw fas fa-money-check-alt">

                                    </i>
                                    <span>{{ trans('cruds.gajiBulanan.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('gaji_bulanan_detail_access')
                            <li class="{{ request()->is("admin/gaji-bulanan-details") || request()->is("admin/gaji-bulanan-details/*") ? "active" : "" }}">
                                <a href="{{ route("admin.gaji-bulanan-details.index") }}">
                                    <i class="fa-fw fas fa-money-bill-wave-alt">

                                    </i>
                                    <span>{{ trans('cruds.gajiBulananDetail.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                        <a href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>