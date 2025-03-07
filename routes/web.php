<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Area
    Route::delete('areas/destroy', 'AreaController@massDestroy')->name('areas.massDestroy');
    Route::resource('areas', 'AreaController');

    // Perusahaan
    Route::delete('perusahaans/destroy', 'PerusahaanController@massDestroy')->name('perusahaans.massDestroy');
    Route::resource('perusahaans', 'PerusahaanController');

    // Kantor
    Route::delete('kantors/destroy', 'KantorController@massDestroy')->name('kantors.massDestroy');
    Route::resource('kantors', 'KantorController');

    // Jabatan
    Route::delete('jabatans/destroy', 'JabatanController@massDestroy')->name('jabatans.massDestroy');
    Route::resource('jabatans', 'JabatanController');

    // Bank
    Route::delete('banks/destroy', 'BankController@massDestroy')->name('banks.massDestroy');
    Route::resource('banks', 'BankController');

    // Keluarga
    Route::delete('keluargas/destroy', 'KeluargaController@massDestroy')->name('keluargas.massDestroy');
    Route::resource('keluargas', 'KeluargaController');

    // Absensi
    Route::delete('absensis/destroy', 'AbsensiController@massDestroy')->name('absensis.massDestroy');
    Route::post('absensis/media', 'AbsensiController@storeMedia')->name('absensis.storeMedia');
    Route::post('absensis/ckmedia', 'AbsensiController@storeCKEditorImages')->name('absensis.storeCKEditorImages');
    Route::resource('absensis', 'AbsensiController');

    // Lembur
    Route::delete('lemburs/destroy', 'LemburController@massDestroy')->name('lemburs.massDestroy');
    Route::post('lemburs/media', 'LemburController@storeMedia')->name('lemburs.storeMedia');
    Route::post('lemburs/ckmedia', 'LemburController@storeCKEditorImages')->name('lemburs.storeCKEditorImages');
    Route::resource('lemburs', 'LemburController');

    // Absensi Setting
    Route::delete('absensi-settings/destroy', 'AbsensiSettingController@massDestroy')->name('absensi-settings.massDestroy');
    Route::resource('absensi-settings', 'AbsensiSettingController');

    // Potongan Absensi
    Route::delete('potongan-absensis/destroy', 'PotonganAbsensiController@massDestroy')->name('potongan-absensis.massDestroy');
    Route::resource('potongan-absensis', 'PotonganAbsensiController');

    // Hari Libur Nasional
    Route::delete('hari-libur-nasionals/destroy', 'HariLiburNasionalController@massDestroy')->name('hari-libur-nasionals.massDestroy');
    Route::resource('hari-libur-nasionals', 'HariLiburNasionalController');

    // Jenis Gaji
    Route::delete('jenis-gajis/destroy', 'JenisGajiController@massDestroy')->name('jenis-gajis.massDestroy');
    Route::resource('jenis-gajis', 'JenisGajiController');

    // Ref Bpjs
    Route::delete('ref-bpjs/destroy', 'RefBpjsController@massDestroy')->name('ref-bpjs.massDestroy');
    Route::resource('ref-bpjs', 'RefBpjsController');

    // Rekanan
    Route::delete('rekanans/destroy', 'RekananController@massDestroy')->name('rekanans.massDestroy');
    Route::resource('rekanans', 'RekananController');

    // Potongan Gaji
    Route::delete('potongan-gajis/destroy', 'PotonganGajiController@massDestroy')->name('potongan-gajis.massDestroy');
    Route::post('potongan-gajis/media', 'PotonganGajiController@storeMedia')->name('potongan-gajis.storeMedia');
    Route::post('potongan-gajis/ckmedia', 'PotonganGajiController@storeCKEditorImages')->name('potongan-gajis.storeCKEditorImages');
    Route::resource('potongan-gajis', 'PotonganGajiController');

    // Gaji Bulanan
    Route::delete('gaji-bulanans/destroy', 'GajiBulananController@massDestroy')->name('gaji-bulanans.massDestroy');
    Route::resource('gaji-bulanans', 'GajiBulananController');

    // Gaji Bulanan Detail
    Route::delete('gaji-bulanan-details/destroy', 'GajiBulananDetailController@massDestroy')->name('gaji-bulanan-details.massDestroy');
    Route::resource('gaji-bulanan-details', 'GajiBulananDetailController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
