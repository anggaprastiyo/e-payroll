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
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Area
    Route::delete('areas/destroy', 'AreaController@massDestroy')->name('areas.massDestroy');
    Route::post('areas/parse-csv-import', 'AreaController@parseCsvImport')->name('areas.parseCsvImport');
    Route::post('areas/process-csv-import', 'AreaController@processCsvImport')->name('areas.processCsvImport');
    Route::resource('areas', 'AreaController');

    // Perusahaan
    Route::delete('perusahaans/destroy', 'PerusahaanController@massDestroy')->name('perusahaans.massDestroy');
    Route::post('perusahaans/parse-csv-import', 'PerusahaanController@parseCsvImport')->name('perusahaans.parseCsvImport');
    Route::post('perusahaans/process-csv-import', 'PerusahaanController@processCsvImport')->name('perusahaans.processCsvImport');
    Route::resource('perusahaans', 'PerusahaanController');

    // Kantor
    Route::delete('kantors/destroy', 'KantorController@massDestroy')->name('kantors.massDestroy');
    Route::post('kantors/parse-csv-import', 'KantorController@parseCsvImport')->name('kantors.parseCsvImport');
    Route::post('kantors/process-csv-import', 'KantorController@processCsvImport')->name('kantors.processCsvImport');
    Route::resource('kantors', 'KantorController');

    // Jabatan
    Route::delete('jabatans/destroy', 'JabatanController@massDestroy')->name('jabatans.massDestroy');
    Route::post('jabatans/parse-csv-import', 'JabatanController@parseCsvImport')->name('jabatans.parseCsvImport');
    Route::post('jabatans/process-csv-import', 'JabatanController@processCsvImport')->name('jabatans.processCsvImport');
    Route::resource('jabatans', 'JabatanController');

    // Bank
    Route::delete('banks/destroy', 'BankController@massDestroy')->name('banks.massDestroy');
    Route::post('banks/parse-csv-import', 'BankController@parseCsvImport')->name('banks.parseCsvImport');
    Route::post('banks/process-csv-import', 'BankController@processCsvImport')->name('banks.processCsvImport');
    Route::resource('banks', 'BankController');

    // Keluarga
    Route::delete('keluargas/destroy', 'KeluargaController@massDestroy')->name('keluargas.massDestroy');
    Route::post('keluargas/parse-csv-import', 'KeluargaController@parseCsvImport')->name('keluargas.parseCsvImport');
    Route::post('keluargas/process-csv-import', 'KeluargaController@processCsvImport')->name('keluargas.processCsvImport');
    Route::resource('keluargas', 'KeluargaController');

    // Absensi
    Route::delete('absensis/destroy', 'AbsensiController@massDestroy')->name('absensis.massDestroy');
    Route::post('absensis/media', 'AbsensiController@storeMedia')->name('absensis.storeMedia');
    Route::post('absensis/ckmedia', 'AbsensiController@storeCKEditorImages')->name('absensis.storeCKEditorImages');
    Route::post('absensis/parse-csv-import', 'AbsensiController@parseCsvImport')->name('absensis.parseCsvImport');
    Route::post('absensis/process-csv-import', 'AbsensiController@processCsvImport')->name('absensis.processCsvImport');
    Route::resource('absensis', 'AbsensiController');

    // Lembur
    Route::delete('lemburs/destroy', 'LemburController@massDestroy')->name('lemburs.massDestroy');
    Route::post('lemburs/media', 'LemburController@storeMedia')->name('lemburs.storeMedia');
    Route::post('lemburs/ckmedia', 'LemburController@storeCKEditorImages')->name('lemburs.storeCKEditorImages');
    Route::post('lemburs/parse-csv-import', 'LemburController@parseCsvImport')->name('lemburs.parseCsvImport');
    Route::post('lemburs/process-csv-import', 'LemburController@processCsvImport')->name('lemburs.processCsvImport');
    Route::resource('lemburs', 'LemburController');

    // Absensi Setting
    Route::delete('absensi-settings/destroy', 'AbsensiSettingController@massDestroy')->name('absensi-settings.massDestroy');
    Route::post('absensi-settings/parse-csv-import', 'AbsensiSettingController@parseCsvImport')->name('absensi-settings.parseCsvImport');
    Route::post('absensi-settings/process-csv-import', 'AbsensiSettingController@processCsvImport')->name('absensi-settings.processCsvImport');
    Route::resource('absensi-settings', 'AbsensiSettingController');

    // Potongan Absensi
    Route::delete('potongan-absensis/destroy', 'PotonganAbsensiController@massDestroy')->name('potongan-absensis.massDestroy');
    Route::post('potongan-absensis/parse-csv-import', 'PotonganAbsensiController@parseCsvImport')->name('potongan-absensis.parseCsvImport');
    Route::post('potongan-absensis/process-csv-import', 'PotonganAbsensiController@processCsvImport')->name('potongan-absensis.processCsvImport');
    Route::resource('potongan-absensis', 'PotonganAbsensiController');

    // Hari Libur Nasional
    Route::delete('hari-libur-nasionals/destroy', 'HariLiburNasionalController@massDestroy')->name('hari-libur-nasionals.massDestroy');
    Route::post('hari-libur-nasionals/parse-csv-import', 'HariLiburNasionalController@parseCsvImport')->name('hari-libur-nasionals.parseCsvImport');
    Route::post('hari-libur-nasionals/process-csv-import', 'HariLiburNasionalController@processCsvImport')->name('hari-libur-nasionals.processCsvImport');
    Route::resource('hari-libur-nasionals', 'HariLiburNasionalController');

    // Jenis Gaji
    Route::delete('jenis-gajis/destroy', 'JenisGajiController@massDestroy')->name('jenis-gajis.massDestroy');
    Route::resource('jenis-gajis', 'JenisGajiController');

    // Ref Bpjs
    Route::delete('ref-bpjs/destroy', 'RefBpjsController@massDestroy')->name('ref-bpjs.massDestroy');
    Route::post('ref-bpjs/parse-csv-import', 'RefBpjsController@parseCsvImport')->name('ref-bpjs.parseCsvImport');
    Route::post('ref-bpjs/process-csv-import', 'RefBpjsController@processCsvImport')->name('ref-bpjs.processCsvImport');
    Route::resource('ref-bpjs', 'RefBpjsController');

    // Rekanan
    Route::delete('rekanans/destroy', 'RekananController@massDestroy')->name('rekanans.massDestroy');
    Route::post('rekanans/parse-csv-import', 'RekananController@parseCsvImport')->name('rekanans.parseCsvImport');
    Route::post('rekanans/process-csv-import', 'RekananController@processCsvImport')->name('rekanans.processCsvImport');
    Route::resource('rekanans', 'RekananController');

    // Potongan Gaji
    Route::delete('potongan-gajis/destroy', 'PotonganGajiController@massDestroy')->name('potongan-gajis.massDestroy');
    Route::post('potongan-gajis/media', 'PotonganGajiController@storeMedia')->name('potongan-gajis.storeMedia');
    Route::post('potongan-gajis/ckmedia', 'PotonganGajiController@storeCKEditorImages')->name('potongan-gajis.storeCKEditorImages');
    Route::post('potongan-gajis/parse-csv-import', 'PotonganGajiController@parseCsvImport')->name('potongan-gajis.parseCsvImport');
    Route::post('potongan-gajis/process-csv-import', 'PotonganGajiController@processCsvImport')->name('potongan-gajis.processCsvImport');
    Route::resource('potongan-gajis', 'PotonganGajiController');

    // Gaji Bulanan
    Route::delete('gaji-bulanans/destroy', 'GajiBulananController@massDestroy')->name('gaji-bulanans.massDestroy');
    Route::resource('gaji-bulanans', 'GajiBulananController');

    // Gaji Bulanan Detail
    Route::delete('gaji-bulanan-details/destroy', 'GajiBulananDetailController@massDestroy')->name('gaji-bulanan-details.massDestroy');
    Route::resource('gaji-bulanan-details', 'GajiBulananDetailController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::post('user-alerts/parse-csv-import', 'UserAlertsController@parseCsvImport')->name('user-alerts.parseCsvImport');
    Route::post('user-alerts/process-csv-import', 'UserAlertsController@processCsvImport')->name('user-alerts.processCsvImport');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);
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
