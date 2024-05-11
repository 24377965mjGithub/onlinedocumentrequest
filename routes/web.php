<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\ExportReport;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TrackerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/documents', [DocumentsController::class, 'index'])->name('documents');
    Route::get('/add-document', [DocumentsController::class, 'addDocument'])->name('add-document');
    Route::post('/add-document-process', [DocumentsController::class, 'addDocumentProcess']);
    Route::get('/edit-document/{id}', [DocumentsController::class, 'editDocument']);
    Route::post('/edit-document-process/{id}', [DocumentsController::class, 'editDocumentProcess']);
    Route::get('/delete-document/{id}', [DocumentsController::class, 'deleteDocument']);
    Route::get('/delete-document-process/{id}', [DocumentsController::class, 'deleteDocumentProcess']);

    // Documents
    Route::get('/request-a-document', [RequestController::class, 'index'])->name('request-a-document');
    Route::post('/request-document-process', [RequestController::class, 'requestDocumentProcess']);
    Route::get('/track-request/{id}', [TrackerController::class, 'trackRequest']);
    Route::get('/delete-request/{id}', [RequestController::class, 'deleteRequest']);
    Route::get('/delete-request-process/{id}', [RequestController::class, 'deleteRequestProcess']);
    Route::get('/view-request/{month}', [RequestController::class, 'viewRequest']);
    Route::get('/view-details/{month}/{departmentlevelid}', [RequestController::class, 'viewDetails']);

    // Status
    Route::get('/add-status/{id}/{month}/{departmentlevelid}', [StatusController::class, 'addStatus']);
    Route::post('/add-status-process/{requestid}', [StatusController::class, 'addStatusProcess']);
    Route::get('/edit-status/{id}', [StatusController::class, 'updateStatus']);
    Route::post('/edit-status-process/{id}', [StatusController::class, 'updateStatusProcess']);
    Route::get('/delete-status/{id}', [StatusController::class, 'deleteStatus']);
    Route::get('/delete-status-process/{id}', [StatusController::class, 'deleteStatusProcess']);

    // Notif
    Route::post('/add-notify-process/{userid}', [NotificationController::class, 'sendNotification']);

    // Export report
    Route::get('/export-report', [ExportReport::class, 'exportReport'])->name('export-report');
    Route::post('/export-monthly-report-process', [ExportReport::class, 'exportMonthlyReportProcess']);
    Route::get('/export-data/{id}', [ExportReport::class, 'exportData']);

    // Search
    Route::get('/search', [SearchController::class, 'searchRequest']);
});
