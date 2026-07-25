<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Asset Management SPA</title>
    <link href="https://cdn.jsdelivr.net/npm/quasar@1.22.10/dist/quasar.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@quasar/extras@1.16.4/material-icons/material-icons.css" rel="stylesheet">
    <style>
        body { background: #f5f7fb; }
        [v-cloak] { display: none; }
        .kbl-hero { background: linear-gradient(135deg, #0f4c81, #1f8f8b); color: white; }
        .rtl { direction: rtl; text-align: right; }
    </style>
</head>
<body>
<div id="q-app" v-cloak :class="isRtl ? 'rtl' : ''">
    <q-layout view="lHh Lpr lFf">
        <q-header elevated class="kbl-hero">
            <q-toolbar>
                <q-toolbar-title>@{{ t.appTitle }}</q-toolbar-title>
                <q-select dense outlined dark emit-value map-options v-model="locale" :options="languageOptions" style="min-width: 140px"></q-select>
            </q-toolbar>
        </q-header>

        <q-page-container>
            <q-page padding>
                <div class="q-pa-md kbl-hero rounded-borders q-mb-lg">
                    <div class="text-h4 text-weight-bold">@{{ t.dashboard }}</div>
                    <div class="text-subtitle1">@{{ t.subtitle }}</div>
                </div>

                <div class="row q-col-gutter-md q-mb-lg">
                    <div class="col-12 col-sm-6 col-md-3" v-for="card in statCards" :key="card.label">
                        <q-card bordered flat>
                            <q-card-section>
                                <div class="text-caption text-grey-7">@{{ card.label }}</div>
                                <div class="text-h4 text-primary">@{{ card.value }}</div>
                            </q-card-section>
                        </q-card>
                    </div>
                </div>

                <div class="row q-col-gutter-lg">
                    <div class="col-12 col-md-4">
                        <q-card bordered flat>
                            <q-card-section><div class="text-h6">@{{ t.addEmployee }}</div></q-card-section>
                            <q-card-section class="q-gutter-md">
                                <q-input outlined v-model="employeeForm.emp_id" :label="t.employeeId"></q-input>
                                <q-input outlined v-model="employeeForm.emp_name" :label="t.employeeName"></q-input>
                                <q-input outlined v-model="employeeForm.emp_faculty" :label="t.faculty"></q-input>
                                <q-input outlined v-model="employeeForm.emp_dep" :label="t.department"></q-input>
                                <q-input outlined v-model="employeeForm.emp_position" :label="t.position"></q-input>
                                <q-input outlined v-model="employeeForm.emp_phone" :label="t.phone"></q-input>
                                <q-btn color="primary" :label="t.save" @click="saveEmployee"></q-btn>
                            </q-card-section>
                        </q-card>
                    </div>

                    <div class="col-12 col-md-4">
                        <q-card bordered flat>
                            <q-card-section><div class="text-h6">@{{ t.addAsset }}</div></q-card-section>
                            <q-card-section class="q-gutter-md">
                                <q-input outlined v-model="assetForm.asset_tag" :label="t.assetTag"></q-input>
                                <q-input outlined v-model="assetForm.name" :label="t.assetName"></q-input>
                                <q-input outlined v-model="assetForm.category" :label="t.category"></q-input>
                                <q-input outlined v-model="assetForm.serial_number" :label="t.serialNumber"></q-input>
                                <q-input outlined type="number" v-model="assetForm.purchase_cost" :label="t.cost"></q-input>
                                <q-select outlined emit-value map-options v-model="assetForm.employee_id" :options="employeeOptions" :label="t.assignTo" clearable></q-select>
                                <q-btn color="secondary" :label="t.save" @click="saveAsset"></q-btn>
                            </q-card-section>
                        </q-card>
                    </div>

                    <div class="col-12 col-md-4">
                        <q-card bordered flat>
                            <q-card-section><div class="text-h6">@{{ t.assignAsset }}</div></q-card-section>
                            <q-card-section class="q-gutter-md">
                                <q-select outlined emit-value map-options v-model="assignmentForm.asset_id" :options="assetOptions" :label="t.asset"></q-select>
                                <q-select outlined emit-value map-options v-model="assignmentForm.employee_id" :options="employeeOptions" :label="t.employee"></q-select>
                                <q-input outlined type="textarea" v-model="assignmentForm.notes" :label="t.notes"></q-input>
                                <q-btn color="accent" :label="t.assign" @click="assignAsset"></q-btn>
                            </q-card-section>
                        </q-card>
                    </div>
                </div>

                <q-card bordered flat class="q-mt-lg">
                    <q-tabs v-model="tab" dense class="text-primary"><q-tab name="employees" :label="t.employees"></q-tab><q-tab name="assets" :label="t.assets"></q-tab></q-tabs>
                    <q-separator></q-separator>
                    <q-tab-panels v-model="tab" animated>
                        <q-tab-panel name="employees"><q-table :data="employees" :columns="employeeColumns" row-key="id"></q-table></q-tab-panel>
                        <q-tab-panel name="assets"><q-table :data="assets" :columns="assetColumns" row-key="id"></q-table></q-tab-panel>
                    </q-tab-panels>
                </q-card>
            </q-page>
        </q-page-container>
    </q-layout>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quasar@1.22.10/dist/quasar.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios@1.7.2/dist/axios.min.js"></script>
<script>
const messages = {
    en: { appTitle: 'KBL Asset Management', dashboard: 'Single Page Dashboard', subtitle: 'Manage employees, assets, and employee asset assignments.', employees: 'Employees', assets: 'Assets', assigned: 'Assigned Assets', available: 'Available Assets', addEmployee: 'Add Employee', addAsset: 'Add Asset', assignAsset: 'Assign Asset', employeeId: 'Employee ID', employeeName: 'Employee Name', faculty: 'Faculty', department: 'Department', position: 'Position', phone: 'Phone', assetTag: 'Asset Tag', assetName: 'Asset Name', category: 'Category', serialNumber: 'Serial Number', cost: 'Cost', assignTo: 'Assign to Employee', asset: 'Asset', employee: 'Employee', notes: 'Notes', save: 'Save', assign: 'Assign' },
    fa: { appTitle: 'مدیریت دارایی KBL', dashboard: 'داشبورد تک صفحه‌ای', subtitle: 'کارمندان، دارایی‌ها و واگذاری دارایی‌ها را مدیریت کنید.', employees: 'کارمندان', assets: 'دارایی‌ها', assigned: 'دارایی‌های واگذارشده', available: 'دارایی‌های موجود', addEmployee: 'افزودن کارمند', addAsset: 'افزودن دارایی', assignAsset: 'واگذاری دارایی', employeeId: 'آی‌دی کارمند', employeeName: 'نام کارمند', faculty: 'پوهنځی', department: 'دیپارتمنت', position: 'وظیفه', phone: 'تلفن', assetTag: 'کد دارایی', assetName: 'نام دارایی', category: 'دسته‌بندی', serialNumber: 'شماره سریال', cost: 'قیمت', assignTo: 'واگذاری به کارمند', asset: 'دارایی', employee: 'کارمند', notes: 'یادداشت', save: 'ذخیره', assign: 'واگذار' },
    ps: { appTitle: 'د KBL شتمنیو مدیریت', dashboard: 'یوه پاڼه ډشبورډ', subtitle: 'کارکوونکي، شتمنۍ او د شتمنیو سپارل مدیریت کړئ.', employees: 'کارکوونکي', assets: 'شتمنۍ', assigned: 'سپارل شوې شتمنۍ', available: 'شته شتمنۍ', addEmployee: 'کارکوونکی اضافه کړئ', addAsset: 'شتمني اضافه کړئ', assignAsset: 'شتمني وسپارئ', employeeId: 'د کارکوونکي ID', employeeName: 'د کارکوونکي نوم', faculty: 'پوهنځی', department: 'څانګه', position: 'دنده', phone: 'تلیفون', assetTag: 'د شتمنۍ کوډ', assetName: 'د شتمنۍ نوم', category: 'کټګوري', serialNumber: 'سریال نمبر', cost: 'قیمت', assignTo: 'کارکوونکي ته وسپارئ', asset: 'شتمني', employee: 'کارکوونکی', notes: 'یادښتونه', save: 'ثبت', assign: 'وسپارئ' },
    ar: { appTitle: 'إدارة أصول KBL', dashboard: 'لوحة صفحة واحدة', subtitle: 'إدارة الموظفين والأصول وتعيين الأصول للموظفين.', employees: 'الموظفون', assets: 'الأصول', assigned: 'الأصول المعينة', available: 'الأصول المتاحة', addEmployee: 'إضافة موظف', addAsset: 'إضافة أصل', assignAsset: 'تعيين أصل', employeeId: 'رقم الموظف', employeeName: 'اسم الموظف', faculty: 'الكلية', department: 'القسم', position: 'المنصب', phone: 'الهاتف', assetTag: 'رمز الأصل', assetName: 'اسم الأصل', category: 'الفئة', serialNumber: 'الرقم التسلسلي', cost: 'التكلفة', assignTo: 'تعيين إلى موظف', asset: 'الأصل', employee: 'الموظف', notes: 'ملاحظات', save: 'حفظ', assign: 'تعيين' }
};
new Vue({
    el: '#q-app',
    data: () => ({ locale: 'en', tab: 'employees', employees: [], assets: [], stats: {}, employeeForm: {}, assetForm: {}, assignmentForm: {}, languageOptions: [{ label: 'English', value: 'en' }, { label: 'فارسی', value: 'fa' }, { label: 'پښتو', value: 'ps' }, { label: 'العربية', value: 'ar' }] }),
    computed: {
        t() { return messages[this.locale] || messages.en; },
        isRtl() { return ['fa', 'ps', 'ar'].includes(this.locale); },
        statCards() { return [{ label: this.t.employees, value: this.stats.employees || 0 }, { label: this.t.assets, value: this.stats.assets || 0 }, { label: this.t.assigned, value: this.stats.assigned_assets || 0 }, { label: this.t.available, value: this.stats.available_assets || 0 }]; },
        employeeOptions() { return this.employees.map(e => ({ label: `${e.emp_name} (${e.emp_id})`, value: e.id })); },
        assetOptions() { return this.assets.map(a => ({ label: `${a.name} (${a.asset_tag})`, value: a.id })); },
        employeeColumns() { return [{ name: 'emp_id', label: this.t.employeeId, field: 'emp_id' }, { name: 'emp_name', label: this.t.employeeName, field: 'emp_name' }, { name: 'emp_dep', label: this.t.department, field: 'emp_dep' }, { name: 'emp_phone', label: this.t.phone, field: 'emp_phone' }]; },
        assetColumns() { return [{ name: 'asset_tag', label: this.t.assetTag, field: 'asset_tag' }, { name: 'name', label: this.t.assetName, field: 'name' }, { name: 'status', label: 'Status', field: 'status' }, { name: 'employee', label: this.t.employee, field: row => row.employee ? row.employee.emp_name : '-' }]; }
    },
    mounted() { this.fetchDashboard(); },
    methods: {
        async fetchDashboard() { const { data } = await axios.get('/api/spa/dashboard'); this.employees = data.employees; this.assets = data.assets; this.stats = data.stats; },
        async saveEmployee() { await axios.post('/api/spa/employees', this.employeeForm); this.employeeForm = {}; await this.fetchDashboard(); },
        async saveAsset() { await axios.post('/api/spa/assets', this.assetForm); this.assetForm = {}; await this.fetchDashboard(); },
        async assignAsset() { await axios.post(`/api/spa/assets/${this.assignmentForm.asset_id}/assign`, this.assignmentForm); this.assignmentForm = {}; await this.fetchDashboard(); }
    }
});
</script>
</body>
</html>
