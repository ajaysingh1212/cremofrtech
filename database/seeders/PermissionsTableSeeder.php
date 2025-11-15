<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 24,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 25,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 26,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 27,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 28,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 29,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 30,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 31,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 32,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 33,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 34,
                'title' => 'expense_create',
            ],
            [
                'id'    => 35,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 36,
                'title' => 'expense_show',
            ],
            [
                'id'    => 37,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 38,
                'title' => 'expense_access',
            ],
            [
                'id'    => 39,
                'title' => 'income_create',
            ],
            [
                'id'    => 40,
                'title' => 'income_edit',
            ],
            [
                'id'    => 41,
                'title' => 'income_show',
            ],
            [
                'id'    => 42,
                'title' => 'income_delete',
            ],
            [
                'id'    => 43,
                'title' => 'income_access',
            ],
            [
                'id'    => 44,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 45,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 46,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 47,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 48,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 49,
                'title' => 'course_create',
            ],
            [
                'id'    => 50,
                'title' => 'course_edit',
            ],
            [
                'id'    => 51,
                'title' => 'course_show',
            ],
            [
                'id'    => 52,
                'title' => 'course_delete',
            ],
            [
                'id'    => 53,
                'title' => 'course_access',
            ],
            [
                'id'    => 54,
                'title' => 'lesson_create',
            ],
            [
                'id'    => 55,
                'title' => 'lesson_edit',
            ],
            [
                'id'    => 56,
                'title' => 'lesson_show',
            ],
            [
                'id'    => 57,
                'title' => 'lesson_delete',
            ],
            [
                'id'    => 58,
                'title' => 'lesson_access',
            ],
            [
                'id'    => 59,
                'title' => 'test_create',
            ],
            [
                'id'    => 60,
                'title' => 'test_edit',
            ],
            [
                'id'    => 61,
                'title' => 'test_show',
            ],
            [
                'id'    => 62,
                'title' => 'test_delete',
            ],
            [
                'id'    => 63,
                'title' => 'test_access',
            ],
            [
                'id'    => 64,
                'title' => 'question_create',
            ],
            [
                'id'    => 65,
                'title' => 'question_edit',
            ],
            [
                'id'    => 66,
                'title' => 'question_show',
            ],
            [
                'id'    => 67,
                'title' => 'question_delete',
            ],
            [
                'id'    => 68,
                'title' => 'question_access',
            ],
            [
                'id'    => 69,
                'title' => 'question_option_create',
            ],
            [
                'id'    => 70,
                'title' => 'question_option_edit',
            ],
            [
                'id'    => 71,
                'title' => 'question_option_show',
            ],
            [
                'id'    => 72,
                'title' => 'question_option_delete',
            ],
            [
                'id'    => 73,
                'title' => 'question_option_access',
            ],
            [
                'id'    => 74,
                'title' => 'test_result_create',
            ],
            [
                'id'    => 75,
                'title' => 'test_result_edit',
            ],
            [
                'id'    => 76,
                'title' => 'test_result_show',
            ],
            [
                'id'    => 77,
                'title' => 'test_result_delete',
            ],
            [
                'id'    => 78,
                'title' => 'test_result_access',
            ],
            [
                'id'    => 79,
                'title' => 'test_answer_create',
            ],
            [
                'id'    => 80,
                'title' => 'test_answer_edit',
            ],
            [
                'id'    => 81,
                'title' => 'test_answer_show',
            ],
            [
                'id'    => 82,
                'title' => 'test_answer_delete',
            ],
            [
                'id'    => 83,
                'title' => 'test_answer_access',
            ],
            [
                'id'    => 84,
                'title' => 'time_management_access',
            ],
            [
                'id'    => 85,
                'title' => 'time_work_type_create',
            ],
            [
                'id'    => 86,
                'title' => 'time_work_type_edit',
            ],
            [
                'id'    => 87,
                'title' => 'time_work_type_show',
            ],
            [
                'id'    => 88,
                'title' => 'time_work_type_delete',
            ],
            [
                'id'    => 89,
                'title' => 'time_work_type_access',
            ],
            [
                'id'    => 90,
                'title' => 'time_project_create',
            ],
            [
                'id'    => 91,
                'title' => 'time_project_edit',
            ],
            [
                'id'    => 92,
                'title' => 'time_project_show',
            ],
            [
                'id'    => 93,
                'title' => 'time_project_delete',
            ],
            [
                'id'    => 94,
                'title' => 'time_project_access',
            ],
            [
                'id'    => 95,
                'title' => 'time_entry_create',
            ],
            [
                'id'    => 96,
                'title' => 'time_entry_edit',
            ],
            [
                'id'    => 97,
                'title' => 'time_entry_show',
            ],
            [
                'id'    => 98,
                'title' => 'time_entry_delete',
            ],
            [
                'id'    => 99,
                'title' => 'time_entry_access',
            ],
            [
                'id'    => 100,
                'title' => 'time_report_create',
            ],
            [
                'id'    => 101,
                'title' => 'time_report_edit',
            ],
            [
                'id'    => 102,
                'title' => 'time_report_show',
            ],
            [
                'id'    => 103,
                'title' => 'time_report_delete',
            ],
            [
                'id'    => 104,
                'title' => 'time_report_access',
            ],
            [
                'id'    => 105,
                'title' => 'client_management_setting_access',
            ],
            [
                'id'    => 106,
                'title' => 'currency_create',
            ],
            [
                'id'    => 107,
                'title' => 'currency_edit',
            ],
            [
                'id'    => 108,
                'title' => 'currency_show',
            ],
            [
                'id'    => 109,
                'title' => 'currency_delete',
            ],
            [
                'id'    => 110,
                'title' => 'currency_access',
            ],
            [
                'id'    => 111,
                'title' => 'transaction_type_create',
            ],
            [
                'id'    => 112,
                'title' => 'transaction_type_edit',
            ],
            [
                'id'    => 113,
                'title' => 'transaction_type_show',
            ],
            [
                'id'    => 114,
                'title' => 'transaction_type_delete',
            ],
            [
                'id'    => 115,
                'title' => 'transaction_type_access',
            ],
            [
                'id'    => 116,
                'title' => 'income_source_create',
            ],
            [
                'id'    => 117,
                'title' => 'income_source_edit',
            ],
            [
                'id'    => 118,
                'title' => 'income_source_show',
            ],
            [
                'id'    => 119,
                'title' => 'income_source_delete',
            ],
            [
                'id'    => 120,
                'title' => 'income_source_access',
            ],
            [
                'id'    => 121,
                'title' => 'client_status_create',
            ],
            [
                'id'    => 122,
                'title' => 'client_status_edit',
            ],
            [
                'id'    => 123,
                'title' => 'client_status_show',
            ],
            [
                'id'    => 124,
                'title' => 'client_status_delete',
            ],
            [
                'id'    => 125,
                'title' => 'client_status_access',
            ],
            [
                'id'    => 126,
                'title' => 'project_status_create',
            ],
            [
                'id'    => 127,
                'title' => 'project_status_edit',
            ],
            [
                'id'    => 128,
                'title' => 'project_status_show',
            ],
            [
                'id'    => 129,
                'title' => 'project_status_delete',
            ],
            [
                'id'    => 130,
                'title' => 'project_status_access',
            ],
            [
                'id'    => 131,
                'title' => 'client_management_access',
            ],
            [
                'id'    => 132,
                'title' => 'client_create',
            ],
            [
                'id'    => 133,
                'title' => 'client_edit',
            ],
            [
                'id'    => 134,
                'title' => 'client_show',
            ],
            [
                'id'    => 135,
                'title' => 'client_delete',
            ],
            [
                'id'    => 136,
                'title' => 'client_access',
            ],
            [
                'id'    => 137,
                'title' => 'project_create',
            ],
            [
                'id'    => 138,
                'title' => 'project_edit',
            ],
            [
                'id'    => 139,
                'title' => 'project_show',
            ],
            [
                'id'    => 140,
                'title' => 'project_delete',
            ],
            [
                'id'    => 141,
                'title' => 'project_access',
            ],
            [
                'id'    => 142,
                'title' => 'note_create',
            ],
            [
                'id'    => 143,
                'title' => 'note_edit',
            ],
            [
                'id'    => 144,
                'title' => 'note_show',
            ],
            [
                'id'    => 145,
                'title' => 'note_delete',
            ],
            [
                'id'    => 146,
                'title' => 'note_access',
            ],
            [
                'id'    => 147,
                'title' => 'document_create',
            ],
            [
                'id'    => 148,
                'title' => 'document_edit',
            ],
            [
                'id'    => 149,
                'title' => 'document_show',
            ],
            [
                'id'    => 150,
                'title' => 'document_delete',
            ],
            [
                'id'    => 151,
                'title' => 'document_access',
            ],
            [
                'id'    => 152,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 153,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 154,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 155,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 156,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 157,
                'title' => 'client_report_create',
            ],
            [
                'id'    => 158,
                'title' => 'client_report_edit',
            ],
            [
                'id'    => 159,
                'title' => 'client_report_show',
            ],
            [
                'id'    => 160,
                'title' => 'client_report_delete',
            ],
            [
                'id'    => 161,
                'title' => 'client_report_access',
            ],
            [
                'id'    => 162,
                'title' => 'contact_management_access',
            ],
            [
                'id'    => 163,
                'title' => 'contact_company_create',
            ],
            [
                'id'    => 164,
                'title' => 'contact_company_edit',
            ],
            [
                'id'    => 165,
                'title' => 'contact_company_show',
            ],
            [
                'id'    => 166,
                'title' => 'contact_company_delete',
            ],
            [
                'id'    => 167,
                'title' => 'contact_company_access',
            ],
            [
                'id'    => 168,
                'title' => 'contact_contact_create',
            ],
            [
                'id'    => 169,
                'title' => 'contact_contact_edit',
            ],
            [
                'id'    => 170,
                'title' => 'contact_contact_show',
            ],
            [
                'id'    => 171,
                'title' => 'contact_contact_delete',
            ],
            [
                'id'    => 172,
                'title' => 'contact_contact_access',
            ],
            [
                'id'    => 173,
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 174,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 175,
                'title' => 'crm_status_edit',
            ],
            [
                'id'    => 176,
                'title' => 'crm_status_show',
            ],
            [
                'id'    => 177,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 178,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 179,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 180,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 181,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 182,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 183,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 184,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 185,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 186,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 187,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 188,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 189,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 190,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 191,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 192,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 193,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 194,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 195,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 196,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 197,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 198,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 199,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 200,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 201,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 202,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 203,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 204,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 205,
                'title' => 'task_create',
            ],
            [
                'id'    => 206,
                'title' => 'task_edit',
            ],
            [
                'id'    => 207,
                'title' => 'task_show',
            ],
            [
                'id'    => 208,
                'title' => 'task_delete',
            ],
            [
                'id'    => 209,
                'title' => 'task_access',
            ],
            [
                'id'    => 210,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 211,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 212,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 213,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 214,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 215,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 216,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 217,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 218,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 219,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 220,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 221,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 222,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 223,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 224,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 225,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 226,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 227,
                'title' => 'test_seary_access',
            ],
            [
                'id'    => 228,
                'title' => 'employee_access',
            ],
            [
                'id'    => 229,
                'title' => 'student_create',
            ],
            [
                'id'    => 230,
                'title' => 'student_edit',
            ],
            [
                'id'    => 231,
                'title' => 'student_show',
            ],
            [
                'id'    => 232,
                'title' => 'student_delete',
            ],
            [
                'id'    => 233,
                'title' => 'student_access',
            ],
            [
                'id'    => 234,
                'title' => 'teacher_create',
            ],
            [
                'id'    => 235,
                'title' => 'teacher_edit',
            ],
            [
                'id'    => 236,
                'title' => 'teacher_show',
            ],
            [
                'id'    => 237,
                'title' => 'teacher_delete',
            ],
            [
                'id'    => 238,
                'title' => 'teacher_access',
            ],
            [
                'id'    => 239,
                'title' => 'other_employee_create',
            ],
            [
                'id'    => 240,
                'title' => 'other_employee_edit',
            ],
            [
                'id'    => 241,
                'title' => 'other_employee_show',
            ],
            [
                'id'    => 242,
                'title' => 'other_employee_delete',
            ],
            [
                'id'    => 243,
                'title' => 'other_employee_access',
            ],
            [
                'id'    => 244,
                'title' => 'teacher_timeing_create',
            ],
            [
                'id'    => 245,
                'title' => 'teacher_timeing_edit',
            ],
            [
                'id'    => 246,
                'title' => 'teacher_timeing_show',
            ],
            [
                'id'    => 247,
                'title' => 'teacher_timeing_delete',
            ],
            [
                'id'    => 248,
                'title' => 'teacher_timeing_access',
            ],
            [
                'id'    => 249,
                'title' => 'attendance_payroll_access',
            ],
            [
                'id'    => 250,
                'title' => 'aattendance_create',
            ],
            [
                'id'    => 251,
                'title' => 'aattendance_edit',
            ],
            [
                'id'    => 252,
                'title' => 'aattendance_show',
            ],
            [
                'id'    => 253,
                'title' => 'aattendance_delete',
            ],
            [
                'id'    => 254,
                'title' => 'aattendance_access',
            ],
            [
                'id'    => 255,
                'title' => 'payroll_create',
            ],
            [
                'id'    => 256,
                'title' => 'payroll_edit',
            ],
            [
                'id'    => 257,
                'title' => 'payroll_show',
            ],
            [
                'id'    => 258,
                'title' => 'payroll_delete',
            ],
            [
                'id'    => 259,
                'title' => 'payroll_access',
            ],
            [
                'id'    => 260,
                'title' => 'student_payroll_create',
            ],
            [
                'id'    => 261,
                'title' => 'student_payroll_edit',
            ],
            [
                'id'    => 262,
                'title' => 'student_payroll_show',
            ],
            [
                'id'    => 263,
                'title' => 'student_payroll_delete',
            ],
            [
                'id'    => 264,
                'title' => 'student_payroll_access',
            ],
            [
                'id'    => 265,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
