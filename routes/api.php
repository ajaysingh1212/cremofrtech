<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Users
    Route::apiResource('users', 'UsersApiController');

    // Courses
    Route::post('courses/media', 'CoursesApiController@storeMedia')->name('courses.storeMedia');
    Route::apiResource('courses', 'CoursesApiController');

    // Lessons
    Route::post('lessons/media', 'LessonsApiController@storeMedia')->name('lessons.storeMedia');
    Route::apiResource('lessons', 'LessonsApiController');

    // Tests
    Route::apiResource('tests', 'TestsApiController');

    // Questions
    Route::post('questions/media', 'QuestionsApiController@storeMedia')->name('questions.storeMedia');
    Route::apiResource('questions', 'QuestionsApiController');

    // Question Options
    Route::apiResource('question-options', 'QuestionOptionsApiController');

    // Test Results
    Route::apiResource('test-results', 'TestResultsApiController');

    // Test Answers
    Route::apiResource('test-answers', 'TestAnswersApiController');

    // Time Work Type
    Route::apiResource('time-work-types', 'TimeWorkTypeApiController');

    // Time Project
    Route::apiResource('time-projects', 'TimeProjectApiController');

    // Time Entry
    Route::apiResource('time-entries', 'TimeEntryApiController');

    // Crm Status
    Route::apiResource('crm-statuses', 'CrmStatusApiController');

    // Crm Customer
    Route::apiResource('crm-customers', 'CrmCustomerApiController');

    // Crm Note
    Route::post('crm-notes/media', 'CrmNoteApiController@storeMedia')->name('crm-notes.storeMedia');
    Route::apiResource('crm-notes', 'CrmNoteApiController');

    // Student
    Route::post('students/media', 'StudentApiController@storeMedia')->name('students.storeMedia');
    Route::apiResource('students', 'StudentApiController');

    // Teacher
    Route::post('teachers/media', 'TeacherApiController@storeMedia')->name('teachers.storeMedia');
    Route::apiResource('teachers', 'TeacherApiController');

    // Other Employee
    Route::post('other-employees/media', 'OtherEmployeeApiController@storeMedia')->name('other-employees.storeMedia');
    Route::apiResource('other-employees', 'OtherEmployeeApiController');

    // Teacher Timeing
    Route::apiResource('teacher-timeings', 'TeacherTimeingApiController');

    // Student Payroll
    Route::post('student-payrolls/media', 'StudentPayrollApiController@storeMedia')->name('student-payrolls.storeMedia');
    Route::apiResource('student-payrolls', 'StudentPayrollApiController');
});
